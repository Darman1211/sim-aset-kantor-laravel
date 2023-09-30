@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 border-bottom">
        <h1 class="h2">Welcome Back, {{ auth()->user()->name }}</h1>
    </div>

    <div class="info-data col-lg-12 mt-3 mb-3">
        <div class="card asset">
            <div class="head">
                <div>
                    <h5><b>Total Aset</b></h5>
                    <h2 class="warna-meetup">{{ $totalaset }}</h2>
                </div>
                <i class='bx bxs-folder-open icon-data'></i>
            </div>
        </div>
        <div class="card rusak">
            <div class="head">
                <div>
                    <h5><b>Total Ruangan</b></h5>
                    <h2 class="warna-meetup">{{ $totalruangan }}</h2>
                </div>
                <i class='bx bxs-error-alt icon-data'></i>
            </div>
        </div>
        <div class="card maintenance">
            <div class="head">
                <div>
                    <h5><b>Total Kategori</b></h5>
                    <h2 class="warna-meetup">{{ $totalkategori }}</h2>
                </div>
                <i class='bx bxs-calendar-check icon-data'></i>
            </div>
        </div>
    </div>

    <div class="responsive-iframe-container mb-5">
        <iframe class="embed-responsive-item"
            src="https://calendar.google.com/calendar/embed?src=699h931qk9n2hu61age422c6lk%40group.calendar.google.com&ctz=Asia%2FJakarta"
            style="border: 0" width="800" height="600" frameborder="0" scrolling="no"></iframe>
    </div>
@endsection
