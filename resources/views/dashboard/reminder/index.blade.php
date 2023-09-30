@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Pengingat Meetup Aset</h1>
    </div>

    @if (session()->has('message'))
        <div class="alert alert-success col-lg-12">
            {{ session('message') }}
        </div>
    @endif

    <div class="card-body mb-5 col-lg-8">
        <form action="/reminder" method="POST">
            @csrf
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
                <button type="submit" class="btn tombol float-end mt-3">Buat Pengingat</button>
            </div>
        </form>
    </div>

    <!-- Start Modal tambah data -->
    {{-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Pengingat Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body"> --}}
                    {{-- <form action="/reminder" method="POST">
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
                    </form> --}}
                {{-- </div>
            </div>
        </div>
    </div> --}}
    <!-- End Modal -->

    {{-- <div class="card-body">
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
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div> --}}
@endsection
