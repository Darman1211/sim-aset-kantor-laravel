@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Peminjaman Aset</h1>
        <a href="/borrowassets/create" class="btn tombol">Tambah Peminjaman Aset</a>
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
                        <th scope="col">P. Jawab</th>
                        <th scope="col">Nama Aset</th>
                        <th scope="col">Ruangan</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Durasi</th>
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pinjamaset as $pinjam)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pinjam->pj }}</td>
                            <td>{{ $pinjam->asset->nama }}</td>
                            <td>{{ $pinjam->room->nama }}</td>
                            <td>{{ $pinjam->tgl_pinjam }}</td>
                            <td>{{ $pinjam->durasi }}</td>
                            <td>
                                @if ($pinjam->status == 'Dipinjam')
                                    <form action="/borrowassets/return/{{ $pinjam->id }}" method="post" class="d-inline">
                                        @csrf
                                        <input type="hidden" name="status" value="Dikembalikan">
                                        <button class="badge bg-danger border-0"
                                            onclick="return confirm('Kembalikan aset ?')">
                                            Dipinjam
                                        </button>
                                    </form>
                                @else
                                    <div class="badge bg-success">Dikembalikan</div>
                                @endif
                            </td>
                            <td>
                                <a href="" class="badge bg-info" data-bs-toggle="modal"
                                    data-bs-target="#showModal{{ $pinjam->id }}"><span data-feather="eye"></span></a>
                                <!-- Start Modal -->
                                <div class="modal fade" id="showModal{{ $pinjam->id }}" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <form>
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Detail Peminjaman Aset</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="mb-2">
                                                        <label class="form-label">Penanggung Jawab</label>
                                                        <input type="text" class="form-control" readonly
                                                            value="{{ $pinjam->pj }}">
                                                    </div>
                                                    <div class="mb-2">
                                                        <label class="form-label">Nama Aset</label>
                                                        <textarea type="text" class="form-control" readonly>{{ $pinjam->asset->nama }}</textarea>
                                                    </div>
                                                    <div class="mb-2">
                                                        <label class="form-label">Ruangan</label>
                                                        <input type="text" class="form-control" readonly
                                                            value="{{ $pinjam->room->nama }}">
                                                    </div>
                                                    <div class="mb-2">
                                                        <label class="form-label">Tanggal Pinjam</label>
                                                        <input type="text" class="form-control" readonly
                                                            value="{{ $pinjam->tgl_pinjam }}">
                                                    </div>
                                                    <div class="mb-2">
                                                        <label class="form-label">Durasi Pinjam</label>
                                                        <input type="text" class="form-control" readonly
                                                            value="{{ $pinjam->durasi }}">
                                                    </div>
                                                    <div class="mb-2">
                                                        <label class="form-label">Status</label>
                                                        <input type="text" class="form-control" readonly
                                                            value="{{ $pinjam->status }}">
                                                    </div>
                                                    <div class="mb-2">
                                                        <label class="form-label">Created</label>
                                                        <input type="text" class="form-control" readonly
                                                            value="{{ $pinjam->created_at }}">
                                                    </div>
                                                    <div>
                                                        <label class="form-label">Updated</label>
                                                        <input type="text" class="form-control" readonly
                                                            value="{{ $pinjam->updated_at }}">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Modal -->
                                <a href="/borrowassets/{{ $pinjam->id }}/edit" class="badge bg-warning"><span
                                        data-feather="edit"></span></a>
                                <form action="/borrowassets/{{ $pinjam->id }}" method="post" class="d-inline">
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
