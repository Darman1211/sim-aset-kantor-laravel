@extends('dashboard.layouts.main')

@section('container')

    <div class="container">
    {{-- justify-content-center = agar posisi row ditengah --}}
    <div class="row my-3">
        <div class="col-lg-8">
            <h1 class="mb-3">Aset : {{ $asset->nama }}</h1>

            <a href="/assets" class="btn btn-success">
                <span data-feather="arrow-left"></span> Kembali</a>
            <a href="/assets/{{ $asset->slug }}/edit" class="btn btn-warning"><span data-feather="edit"></span> Edit</a>
            <form action="/assets/{{ $asset->slug }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-danger" onclick="return confirm('Are you Sure?')">
                    <span data-feather="x-circle"></span> Delete</button>
            </form>

            <div class="row gx-2">
                <div class="col-md-4">
                    @if ($asset->foto)
                        <div style="max-height: 350px; overflow:hidden;">
                            <img width="250" src="{{ asset('storage/' . $asset->foto) }}"
                            alt="{{ $asset->nama }}" class="img-fluid mt-3 img-thumbnail">
                        </div>
                    @endif
                </div>
                <div class="col-md-4">
                    @if ($asset->gambar_qr)
                        <div style="max-height: 350px; overflow:hidden;">
                            <img width="150" src="{{ asset('storage/' . $asset->gambar_qr) }}" class="img-fluid mt-3 img-thumbnail">
                        </div>
                    @endif
                </div>
            </div>
            
            <table class="table table-striped mt-3">
            <tbody>
                <tr>
                    <td>Kode Aset</td>
                    <td>{{ $asset->slug }}</td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>{{ $asset->nama }}</td>
                </tr>
                <tr>
                    <td>Merek</td>
                    <td>{{ $asset->merek }}</td>
                </tr>
                <tr>
                    <td>Kategori</td>
                    <td>{{ $asset->category->nama }}</td>
                </tr>
                <tr>
                    <td>Ruangan</td>
                    <td>{{ $asset->room->nama }}</td>
                </tr>
                <tr>
                    <td>Jumlah</td>
                    <td>{{ $asset->jumlah }}</td>
                </tr>
                <tr>
                    <td>Tahun</td>
                    <td>{{ $asset->tahun }}</td>
                </tr>
                <tr>
                    <td>Garansi</td>
                    <td>{{ $asset->garansi }}</td>
                </tr>
                <tr>
                    <td>Harga</td>
                    <td>Rp {{ $asset->harga }}</td>
                </tr>
            </tbody>
            </table>

        </div>
    </div>
    </div>

@endsection