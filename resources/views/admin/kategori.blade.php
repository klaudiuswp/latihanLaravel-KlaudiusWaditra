@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3">
            @auth
                <h1>Selamat Datang {{auth()->user()->name}}</h1>
            @endauth

            @guest
            <h1>Selamat Datang, silahkan melakukan login</h1>
            @endguest
        </div>
        <div class="col-9">
            @yield('formkategori')
        </div>
    </div>
</div>
@endsection
