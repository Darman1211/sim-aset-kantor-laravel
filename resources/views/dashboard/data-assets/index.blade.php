@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Aset</h1>
        <a href="/assets/create" class="btn tombol mb-3">Tambah Aset Baru</a>   
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success col-lg-12" role="alert">
            {{ session('success') }}
        </div>
    @endif
    @if ($errors->count() > 0)
        <div class="alert alert-danger col-lg-12" role="alert">
            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach
        </div>
    @endif

    <div class="card-body">
        <div class="table-responsive col-lg-12 mb-3">
            <table id="myTable" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Merek</th>
                        <th scope="col">Ruangan</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Tahun</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($assets as $asset)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $asset->nama }}</td>
                            <td>{{ $asset->merek }}</td>
                            <td>{{ $asset->room->nama }}</td>
                            <td>{{ $asset->category->nama }}</td>
                            <td>{{ $asset->tahun }}</td>
                            <td>
                                <a href="/assets/{{ $asset->slug }}" class="badge bg-info"><span
                                        data-feather="eye"></span></a>
                                {{-- /assets/{{ $asset->slug }}/edit = aturan default dari route resource untuk edit --}}
                                <a href="/assets/{{ $asset->slug }}/edit" class="badge bg-warning"><span
                                        data-feather="edit"></span></a>
                                <form action="/assets/{{ $asset->slug }}" method="post" class="d-inline">
                                    {{-- karena method pd form hnya bisa get dan post maka @method('delete') agar method jadi delete --}}
                                    @method('delete')
                                    @csrf
                                    <button class="badge bg-danger border-0" onclick="return confirm('Are you Sure?')">
                                        <span data-feather="x-circle"></span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- Pagination --}}
            {{-- <div class="d-flex justify-content-end mt-3">
                    {{ $assets->links() }}
                </div> --}}

        </div>
    </div>

@endsection
