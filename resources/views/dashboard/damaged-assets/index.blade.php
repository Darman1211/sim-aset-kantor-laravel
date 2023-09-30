@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Aset Rusak</h1>
        <a href="/damagedassets/create" class="btn tombol">Tambah Aset Rusak</a>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success col-lg-12" role="alert">
            {{ session('success') }}
        </div>
    @endif


    <div class="card-body">
        <div class="table-responsive col-lg-12">
            <table id="myTable" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Aset</th>
                        <th scope="col">Kondisi</th>
                        <th scope="col">Solusi</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $asetrusak)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $asetrusak->asset->nama }}</td>
                            <td>{{ $asetrusak->kondisi }}</td>
                            <td>{{ $asetrusak->solusi }}</td>
                            <td>{{ $asetrusak->jumlah }}</td>
                            <td>
                                <a href="" class="badge bg-primary" data-bs-toggle="modal"
                                    data-bs-target="#showModal{{ $asetrusak->id }}"><span data-feather="eye"></span></a>
                                <!-- Start Modal -->
                                <div class="modal fade" id="showModal{{ $asetrusak->id }}" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <form>
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Detail Aset Rusak</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="mb-2">
                                                        <label class="form-label">Nama Aset</label>
                                                        <input type="text" class="form-control" readonly
                                                            value="{{ $asetrusak->asset->nama }}">
                                                    </div>
                                                    <div class="mb-2">
                                                        <label class="form-label">Kondisi</label>
                                                        <textarea type="text" class="form-control" readonly>{{ $asetrusak->kondisi }}</textarea>
                                                    </div>
                                                    <div class="mb-2">
                                                        <label class="form-label">Solusi</label>
                                                        <input type="text" class="form-control" readonly
                                                            value="{{ $asetrusak->solusi }}">
                                                    </div>
                                                    <div class="mb-2">
                                                        <label class="form-label">Jumlah</label>
                                                        <input type="text" class="form-control" readonly
                                                            value="{{ $asetrusak->jumlah }}">
                                                    </div>
                                                    <div class="mb-2">
                                                        <label class="form-label">Created</label>
                                                        <input type="text" class="form-control" readonly
                                                            value="{{ $asetrusak->created_at }}">
                                                    </div>
                                                    <div class="mb-2">
                                                        <label class="form-label">Updated</label>
                                                        <input type="text" class="form-control" readonly
                                                            value="{{ $asetrusak->updated_at }}">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Modal -->
                                <a href="/damagedassets/{{ $asetrusak->id }}/edit" class="badge bg-warning"><span
                                        data-feather="edit"></span></a>
                                <form action="/damagedassets/{{ $asetrusak->id }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="badge bg-danger border-0" onclick="return confirm('Are you Sure?')">
                                        <span data-feather="x-circle"></span>
                                    </button>
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
