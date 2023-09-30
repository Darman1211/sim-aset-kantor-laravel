@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Pengingat Meetup Aset</h1>
        <button type="button" class="btn tombol" data-bs-toggle="modal" data-bs-target="#exampleModal"
            data-bs-whatever="@mdo">Tambah Pengingat Ke Kalender</button>
    </div>

    @if (session()->has('message'))
        <div class="alert alert-success col-lg-12">
            {{ session('message') }}
        </div>
    @endif

    <!-- Start Modal tambah data -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Pengingat Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/reminder" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Aset</label>
                            <select class="form-select" name="asset_id" id="kategori" required autofocus>
                                @foreach ($assets as $asset)
                                    @if (old('asset_id') == $asset->id)
                                        <option value="{{ $asset->id }}" selected>{{ $asset->nama }}</option>
                                    @else
                                        <option value="{{ $asset->id }}">{{ $asset->nama }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul Pengingat</label>
                            <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror"
                                id="judul" value="{{ old('judul') }}" required>
                            @error('judul')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea type="text" name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi"
                                rows="2" required>{{ old('deskripsi') }}</textarea>
                            @error('deskripsi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="tgl" class="form-label">Tanggal</label>
                                <input type="date" name="tgl" class="form-control @error('tgl') is-invalid @enderror"
                                    id="tgl" rows="2" value="{{ old('tgl') }}" required>
                                @error('tgl')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="waktu" class="form-label">Waktu</label>
                                <input type="time" name="waktu"
                                    class="form-control @error('waktu') is-invalid @enderror" id="waktu" rows="2"
                                    value="{{ old('waktu') }}" required>
                                @error('waktu')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 mt-3">
                            <button type="submit" class="btn tombol float-end">Buat Pengingat</button>
                            <button type="button" class="btn btn-secondary mx-2 float-end"
                                data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->

    <div class="card-body">
        <div class="table-responsive">
            <table id="myTable" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Aset</th>
                        <th scope="col">Judul Pengingat</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Waktu</th>
                        {{-- <th scope="col">Aksi</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reminders as $reminder)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $reminder->asset->nama }}</td>
                            <td>{{ $reminder->judul }}</td>
                            <td>{{ $reminder->deskripsi }}</td>
                            <td>{{ $reminder->tgl }}</td>
                            <td>{{ $reminder->waktu }}</td>
                            {{-- <td>
                                    <a href="" class="badge bg-info" data-bs-toggle="modal"
                                        data-bs-target="#show"><span
                                            data-feather="eye"></span></a>
                                    <div class="modal fade" id="show" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <form>
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Detail Kategori</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label class="form-label">Nama Kategori</label>
                                                            <input type="text" class="form-control" readonly value="{{ $reminder->nama }}">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Created</label>
                                                            <input type="text" class="form-control" readonly value="{{ $reminder->created_at }}">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Updated</label>
                                                            <input type="text" class="form-control" readonly value="{{ $reminder->updated_at }}">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="" class="badge bg-warning" data-bs-toggle="modal"
                                        data-bs-target="#editModal{{ $reminder->id }}"><span data-feather="edit"></span></a>
                                    <div class="modal fade" id="editModal{{ $reminder->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <form method="post" action="/categories/{{ $reminder->id }}" id="editForm" class="mb-5">
                                                    @method('put')
                                                    @csrf
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Kategori</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="nama" class="form-label">Nama Kategori</label>
                                                            <input autofocus type="text" name="nama"
                                                                class="form-control @error('nama') is-invalid @enderror"
                                                                id="nama" required autofocus
                                                                value="{{ old('nama', $reminder->nama) }}">
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
                                    <form action="/categories/{{ $reminder->id }}" method="post" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="badge bg-danger border-0" onclick="return confirm('Are you Sure?')">
                                            <span data-feather="x-circle"></span></button>
                                    </form>
                                </td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
