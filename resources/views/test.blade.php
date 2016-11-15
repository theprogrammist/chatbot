@extends('layouts.material')
@section('content')
    <div class="android-be-together-section mdl-typography--text-center">
        <div class="logo-font android-slogan">Здравствуйте, {{ Auth::user()->name }}</div>
    </div>
@endsection