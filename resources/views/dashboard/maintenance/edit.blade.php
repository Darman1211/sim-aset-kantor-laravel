@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Maintenance</h1>
    </div>

    <div class="col-lg-8">
        <form method="post" action="/maintenances/{{ $maintenance->id }}" class="mb-5">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Aset</label>
                <select class="form-select" name="asset_id" id="kategori" required autofocus>
                    @foreach ($assets as $asset)
                        @if (old('asset_id', $maintenance->asset_id) == $asset->id)
                            <option value="{{ $asset->id }}" selected>{{ $asset->nama }}</option>
                        @else
                            <option value="{{ $asset->id }}">{{ $asset->nama }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea type="text" name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" rows="2" required>{{ old('deskripsi', $maintenance->deskripsi) }}</textarea>
                @error('deskripsi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah</label>
                <input type="text" name="jumlah" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah" value="{{ old('jumlah', $maintenance->jumlah) }}" required>
                @error('jumlah')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3 col-md-4">
                <label for="tgl" class="form-label">Tanggal</label>
                <input type="date" name="tgl" class="form-control @error('tgl') is-invalid @enderror" id="tgl" value="{{ old('tgl', $maintenance->tgl) }}" required>
                @error('tgl')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="biaya" class="form-label">Biaya</label>
                <input type="text" name="biaya" class="form-control @error('biaya') is-invalid @enderror" id="biaya" value="{{ old('biaya', $maintenance->biaya) }}">
                @error('biaya')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn tombol">Edit Maintenance</button>
            <a href="/maintenances" class="btn tombol">Kembali</a>
        </form>
    </div>

@endsection
