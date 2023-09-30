@extends('dashboard.report.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Laporan Data Aset</h1>  
    </div>

    <div class="card-body">
        <div class="table-responsive col-lg-12 mb-3">
            <table id="myTable" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kode</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Merek</th>
                        <th scope="col">Ruangan</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Tahun</th>
                        <th scope="col">Garansi</th>
                        <th scope="col">Harga</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($assets as $asset)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $asset->slug }}</td>
                            <td>{{ $asset->nama }}</td>
                            <td>{{ $asset->merek }}</td>
                            <td>{{ $asset->room->nama }}</td>
                            <td>{{ $asset->category->nama }}</td>
                            <td>{{ $asset->jumlah }}</td>
                            <td>{{ $asset->tahun }}</td>
                            <td>{{ $asset->garansi }}</td>
                            <td>{{ $asset->harga }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
