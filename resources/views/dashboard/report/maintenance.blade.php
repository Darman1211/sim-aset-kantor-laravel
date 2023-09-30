@extends('dashboard.report.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Laporan Data Maintenance</h1>  
    </div>

    <div class="card-body">
        <div class="table-responsive col-lg-12 mb-3">
            <table id="myTable" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Biaya</th>
                        <th scope="col">Created</th>
                        <th scope="col">Updated</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($maintenances as $maintenance)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $maintenance->asset->nama }}</td>
                            <td>{{ $maintenance->deskripsi }}</td>
                            <td>{{ $maintenance->jumlah }}</td>
                            <td>{{ $maintenance->tgl }}</td>
                            <td>{{ $maintenance->biaya }}</td>
                            <td>{{ $maintenance->created_at }}</td>
                            <td>{{ $maintenance->updated_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
