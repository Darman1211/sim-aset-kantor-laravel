@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Peminjaman Aset</h1>
    </div>

    <div class="col-lg-8">
        <form method="post" action="/borrowassets/{{ $pinjamaset->id }}" class="mb-5" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Pilih Aset</label>
                <select class="form-select" name="asset_id" id="nama" required autofocus>
                    @foreach ($assets as $asset)
                        @if (old('asset_id', $pinjamaset->asset_id) == $asset->id)
                            <option value="{{ $asset->id }}" selected>{{ $asset->nama }}</option>
                        @else
                            <option value="{{ $asset->id }}">{{ $asset->nama }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="room" class="form-label">Pilih Ruangan</label>
                <select class="form-select" name="room_id" id="room" required autofocus>
                    @foreach ($rooms as $room)
                        @if (old('room_id', $pinjamaset->room_id) == $room->id)
                            <option value="{{ $room->id }}" selected>{{ $room->nama }}</option>
                        @else
                            <option value="{{ $room->id }}">{{ $room->nama }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="pj" class="form-label">Penanggung Jawab</label>
                <input type="text" name="pj" class="form-control @error('pj') is-invalid @enderror"
                    id="pj" value="{{ old('pj', $pinjamaset->pj) }}" required>
                @error('pj')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="tgl_pinjam" class="form-label">Tanggal Pinjam</label>
                <input type="date" name="tgl_pinjam" class="form-control @error('tgl_pinjam') is-invalid @enderror"
                    id="tgl_pinjam" value="{{ old('tgl_pinjam', $pinjamaset->tgl_pinjam) }}" required>
                @error('tgl_pinjam')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="durasi" class="form-label">Durasi Pinjam</label>
                <input type="text" name="durasi" class="form-control @error('durasi') is-invalid @enderror"
                    id="durasi" value="{{ old('durasi', $pinjamaset->durasi) }}" required>
                @error('durasi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" name="status" id="status" required autofocus>
                    @if (old('status'))
                        <option value="{{ old('status') }}" hidden>{{ old('status') }}</option>
                        <option value="Dikembalikan">Dikembalikan</option>
                        <option value="Dipinjam">Dipinjam</option>
                    @else
                        <option value="{{ $pinjamaset->status }}" hidden>{{ $pinjamaset->status }}</option>
                        <option value="Dikembalikan">Dikembalikan</option>
                        <option value="Dipinjam">Dipinjam</option>
                    @endif
                </select>
            </div>
            <button type="submit" class="btn tombol">Edit Peminjaman Aset</button>
            <a href="/borrowassets" class="btn tombol">Kembali</a>
        </form>
    </div>
@endsection
