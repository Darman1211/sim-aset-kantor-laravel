@extends('dashboard.report.main1')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Label QR Code Aset</h1>
        <div class="btn-group btn-group-sm">
          {{-- <button class="btn tombol">Print PDF</button> --}}
          <a href="/reportqr/print" target="_blank" class="btn tombol print">Print QR Code</a>
        </div>
        {{-- <a href="" @click.prevent="printme" target="_blank" class="btn tombol print">Cetak QR Code</a> --}}
    </div>
    <div class="container">
        <div class="row">
            @foreach ($assets as $asset)
                @if ($asset->gambar_qr)
                    <div class="col-lg-3 col-md-4 col-sm-5 col-xs-2 mb-3">
                        <div class="card" style="width: 9rem;">
                            <div class="cut">
                                <img src="{{ asset('storage/' . $asset->gambar_qr) }}" alt="{{ $asset->nama }}"
                                    class="img-fluid">
                            </div>
                            <small class="text-muted">
                                <b>Nama Aset : {{ $asset->nama }}</b><br>
                                Kode : {{ $asset->slug }}<br>
                                Ruangan : {{ $asset->room->nama }}<br>
                            </small>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>

    {{-- <div class="row">
        <div class="column">
          <img src="{{ asset('storage/assets-images/1RKpURuDiYKDN6uO3WZXaHrfw1lH8944n4GCYSjc.jpg')}}" alt="Snow" style="width:200px">
        </div>
        <div class="column">
          <img src="{{ asset('storage/assets-images/OjU16koNeZIm8x7dLsXjLMcokV8Q6nn6trpdhM2N.jpg')}}" alt="Forest" style="width:200px">
        </div>
        <div class="column">
          <img src="{{ asset('storage/assets-images/tJ2aIpr2lSRswttO2wkgcjKncu6mLYyb504UgH0c.jpg')}}" alt="Mountains" style="width:200px">
        </div> --}}
    {{-- </div> --}}
    {{-- Buat gambar qr code dalam table show horizontal --}}

    {{-- <div class="card-body">
          <div class="table-responsive col-lg-12 mb-3">
              <table id="myTable" class="table table-striped" style="width:100%">
                  <thead>
                      <tr>
                          <th scope="col">No</th>
                          <th scope="col">Nama</th>
                          <th scope="col">QR Code</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach ($assets as $asset)
                          <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td>{{ $asset->nama }}</td>
                              <td><img src="{{ asset('storage/' . $asset->gambar_qr) }}" width="50%" height="50%" /></td>
                          </tr>
                      @endforeach
                  </tbody>
              </table>
          </div>
      </div> --}}
@endsection
