@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Ruangan Aset</h1>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success col-lg-12" role="alert">
            {{ session('success') }}
        </div>
    @endif
    @if ($errors->count() > 0)
        <div class="alert alert-danger col-lg-12" role="alert">
            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach
        </div>
    @endif

    <div class="card mb-3 col-lg-12">
        <div class="card-header">
            <h5 class="card-title">Tambah Ruangan Baru</h5>
        </div>
        <div class="card-body">
            <div class="col-lg-12">
                <form method="post" action="/rooms" enctype="multipart/form-data">
                    @csrf
                    <label for="nama" class="form-label">Nama Ruangan</label>
                    <div class="row">
                        <div class="col">
                            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                                id="nama" required autofocus value="{{ old('nama') }}">
                            @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col">
                            <button type="submit" class="btn tombol">Tambah Ruangan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="card mb-3 col-lg-12">
        <div class="card-header">
            <h5 class="card-title">Data Ruangan</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="myTable" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Ruangan</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rooms as $room)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $room->nama }}</td>
                                <td>
                                    <a href="" class="badge bg-info" data-bs-toggle="modal"
                                        data-bs-target="#showModal{{ $room->id }}"><span data-feather="eye"></span></a>
                                    <!-- Start Modal -->
                                    <div class="modal fade" id="showModal{{ $room->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <form>
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Detail Ruangan</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label class="form-label">Nama Ruangan</label>
                                                            <input type="text" class="form-control" readonly
                                                                value="{{ $room->nama }}">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Created</label>
                                                            <input type="text" class="form-control" readonly
                                                                value="{{ $room->created_at }}">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Updated</label>
                                                            <input type="text" class="form-control" readonly
                                                                value="{{ $room->updated_at }}">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Modal -->
                                    <a href="" class="badge bg-warning" data-bs-toggle="modal"
                                        data-bs-target="#editModal{{ $room->id }}"><span
                                            data-feather="edit"></span></a>
                                    <!-- Start Modal -->
                                    <div class="modal fade" id="editModal{{ $room->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <form method="post" action="/rooms/{{ $room->id }}" id="editForm"
                                                    class="mb-5">
                                                    @method('put')
                                                    @csrf
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Ruangan</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="nama" class="form-label">Nama Ruangan</label>
                                                            <input autofocus type="text" name="nama"
                                                                class="form-control @error('nama') is-invalid @enderror"
                                                                id="nama" required autofocus
                                                                value="{{ old('nama', $room->nama) }}">
                                                            @error('nama')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">Simpan
                                                            Perubahan</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Modal -->
                                    <form action="/rooms/{{ $room->id }}" method="post" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="badge bg-danger border-0"
                                            onclick="return confirm('Are you Sure?')">
                                            <span data-feather="x-circle"></span></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
