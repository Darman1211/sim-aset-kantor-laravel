<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous" />
    <title>Print Label QR Code</title>
</head>
<body>
    <div class="container mt-5">
        <h4 class="text-center">Label QR Code Aset Meetup</h4><br>
        <div class="row">
            @foreach ($assets as $asset)
                @if ($asset->gambar_qr)
                    <div class="col-lg-2 col-md-4 col-sm-5 col-xs-2 mb-3">
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

    {{-- JS Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

</body>
</html>