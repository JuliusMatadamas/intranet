@extends('layouts.app')

@section('content')
    <login-view url="{{ route('login')  }}" redirect="{{ route('inicio') }}"></login-view>
@endsection
