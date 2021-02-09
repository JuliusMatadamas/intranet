@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Planes</h1>
    <p>{{ $usuario }}</p>
    <form action="{{ route('logout')  }}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-4">
                <button type="submit" class="btn btn-block btn-dark">Log-out</button>
            </div>
        </div>
    </form>
</div>
@endsection
