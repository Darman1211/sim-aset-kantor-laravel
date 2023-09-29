@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah Aset Rusak</h1>
    </div>

    <div class="col-lg-8">
        <form method="post" action="/damagedassets" class="mb-5" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Aset</label>
                <select class="form-select" name="asset_id" id="nama" required autofocus>
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
                <label for="kondisi" class="form-label">Kondisi Aset</label>
                <textarea type="text" name="kondisi" class="form-control @error('kondisi') is-invalid @enderror" id="kondisi"
                    rows="2" required>{{ old('kondisi') }}</textarea>
                @error('kondisi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="solusi" class="form-label">Solusi</label>
                <select class="form-select" name="solusi" id="solusi" required autofocus>
                    @if (old('solusi'))
                        <option value="{{ old('solusi') }}" hidden>{{ old('solusi') }}</option>
                        <option value="Perbaiki/Maintenance">Perbaiki/Maintenance</option>
                        <option value="Hapus Dari Sistem">Hapus Dari Sistem</option>
                    @else
                        <option value="Perbaiki/Maintenance">Perbaiki/Maintenance</option>
                        <option value="Hapus Dari Sistem">Hapus Dari Sistem</option>
                    @endif
                </select>
            </div>
            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah Aset Rusak</label>
                <input type="text" name="jumlah" class="form-control @error('jumlah') is-invalid @enderror"
                    id="jumlah" value="{{ old('jumlah') }}" required>
                @error('jumlah')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn tombol">Tambah Aset Rusak</button>
            <a href="/damagedassets" class="btn tombol">Kembali</a>
        </form>
    </div>
@endsection
