@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Maintenance</h1>
        <a href="/maintenances/create" class="btn tombol">Tambah Maintenance Baru</a>
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
                            <th scope="col">Ruangan</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Tgl Maintenance</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($maintenances as $maintenance)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $maintenance->asset->nama }}</td>
                                <td>{{ $maintenance->asset->room->nama }}</td>
                                <td>{{ $maintenance->deskripsi }}</td>
                                <td>{{ $maintenance->tgl }}</td>
                                <td>
                                    <a href="" class="badge bg-info" data-bs-toggle="modal"
                                        data-bs-target="#showModal{{ $maintenance->id }}"><span data-feather="eye"></span></a>
                                    <!-- Start Modal -->
                                    <div class="modal fade" id="showModal{{ $maintenance->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <form>
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Detail Maintenance</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="mb-1">
                                                            <label class="form-label">Nama Aset</label>
                                                            <input type="text" class="form-control" readonly
                                                                value="{{ $maintenance->asset->nama }}">
                                                        </div>
                                                        <div class="mb-1">
                                                            <label class="form-label">Deskripsi</label>
                                                            <textarea type="text" class="form-control" rows="2" readonly>{{ $maintenance->deskripsi }}</textarea>
                                                        </div>
                                                        <div class="mb-1">
                                                            <label class="form-label">Jumlah</label>
                                                            <input type="text" class="form-control" readonly
                                                                value="{{ $maintenance->jumlah }}">
                                                        </div>
                                                        <div class="mb-1">
                                                            <label class="form-label">Tanggal Maintenance</label>
                                                            <input type="text" class="form-control" readonly
                                                                value="{{ $maintenance->tgl }}">
                                                        </div>
                                                        <div class="mb-1">
                                                            <label class="form-label">Tanggal Maintenance Selanjutnya</label>
                                                            <input type="text" class="form-control" readonly
                                                                value="{{ $maintenance->tgl_next_m }}">
                                                        </div>
                                                        <div class="mb-1">
                                                            <label class="form-label">Biaya</label>
                                                            <input type="text" class="form-control" readonly
                                                                value="{{ $maintenance->biaya }}">
                                                        </div>
                                                        <div class="mb-1">
                                                            <label class="form-label">Created</label>
                                                            <input type="text" class="form-control" readonly
                                                                value="{{ $maintenance->created_at }}">
                                                        </div>
                                                        <div class="mb-1">
                                                            <label class="form-label">Updated</label>
                                                            <input type="text" class="form-control" readonly
                                                                value="{{ $maintenance->updated_at }}">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Modal -->
                                    <a href="/maintenances/{{ $maintenance->id }}/edit" class="badge bg-warning"><span
                                            data-feather="edit"></span></a>
                                    <form action="/maintenances/{{ $maintenance->id }}" method="post" class="d-inline">
                                        {{-- karena method pd form hnya bisa get dan post maka @method('delete') agar method jadi delete --}}
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

                {{-- Pagination --}}
                {{-- <div class="d-flex justify-content-end mt-3">
                    {{ $assets->links() }}
                </div> --}}

            </div>
        </div>
    </div>
@endsection
