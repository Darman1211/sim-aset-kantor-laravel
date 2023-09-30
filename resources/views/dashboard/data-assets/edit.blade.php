@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Aset</h1>
    </div>

    <div class="col-lg-8">
        <form method="post" action="/assets/{{ $asset->slug }}" class="mb-5" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Aset</label>
                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama"
                    required autofocus value="{{ old('nama', $asset->nama) }}">
                @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label">Kode Aset</label>
                <input type="text" name="slug" class="form-control" id="slug" value="{{ $asset->slug }}" readonly>
            </div>
            <div class="mb-3">
                <label for="merek" class="form-label">Merek</label>
                <input type="text" name="merek" class="form-control @error('merek') is-invalid @enderror"
                    id="merek" required autofocus value="{{ old('merek', $asset->merek) }}">
                @error('merek')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="kategori" class="form-label">Kategori</label>
                <select class="form-select" name="category_id" id="kategori">
                    @foreach ($categories as $category)
                        @if (old('category_id', $asset->category_id) == $category->id)
                            <option value="{{ $category->id }}" selected>{{ $category->nama }}</option>
                        @else
                            <option value="{{ $category->id }}">{{ $category->nama }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="ruangan" class="form-label">Ruangan</label>
                <select class="form-select" name="room_id" id="ruangan">
                    @foreach ($rooms as $room)
                        @if (old('room_id', $asset->room_id) == $room->id)
                            <option value="{{ $room->id }}" selected>{{ $room->nama }}</option>
                        @else
                            <option value="{{ $room->id }}">{{ $room->nama }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah</label>
                <input type="text" name="jumlah" class="form-control @error('jumlah') is-invalid @enderror"
                    id="jumlah" required autofocus value="{{ old('jumlah', $asset->jumlah) }}">
                @error('jumlah')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="tahun" class="form-label">Tahun</label>
                <input type="text" name="tahun" class="form-control @error('tahun') is-invalid @enderror"
                    id="tahun" required autofocus value="{{ old('tahun', $asset->tahun) }}">
                @error('tahun')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="garansi" class="form-label">Garansi</label>
                <input type="text" name="garansi" class="form-control @error('garansi') is-invalid @enderror"
                    id="garansi" required autofocus value="{{ old('garansi', $asset->garansi) }}">
                @error('garansi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <label for="harga" class="form-label">Harga Beli</label>
            <div class="input-group mb-3">
                <span class="input-group-text">Rp</span>
                <input type="text" name="harga" class="form-control @error('harga') is-invalid @enderror"
                    id="harga" required autofocus value="{{ old('harga', $asset->harga) }}">
                <span class="input-group-text">/ Satuan</span>
                @error('harga')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <label class="form-label" for="generate">Generate QR Code</label>
            <div class="input-group mb-3">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="make_qr" id="inlineRadio1" value="1" {{ old('make_qr', $asset->make_qr) == '1' ? 'checked' : '' }}>
                    <label class="form-check-label" for="inlineRadio1">Yes</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="make_qr" id="inlineRadio2" value="0" {{ old('make_qr', $asset->make_qr) == '0' ? 'checked' : '' }}>
                    <label class="form-check-label" for="inlineRadio2">No</label>
                </div>
            </div>
            <div class="mb-3">
                <label for="foto" class="form-label">Ganti Foto</label>
                <input type="hidden" name="oldImage" value="{{ $asset->foto }}">
                @if ($asset->foto)
                    <img src="{{ asset('storage/' . $asset->foto) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                @else
                    <img class="img-preview img-fluid mb-3 col-sm-5">
                @endif
                <input type="file" id="foto" name="foto" class="form-control @error('foto') is-invalid @enderror" onchange="previewImage()">
                @error('foto')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn tombol">Edit Asset</button>
            <a href="/assets" class="btn tombol">Kembali</a>
        </form>
    </div>

    <script>
        function previewImage() {
            const image = document.querySelector('#foto');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>

@endsection