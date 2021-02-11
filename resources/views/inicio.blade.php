@extends('layouts.app')

@section('content')
    <form action="{{ route('logout')  }}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-4">
                <button type="submit" class="btn btn-block btn-dark">Log-out</button>
            </div>
        </div>
    </form>
@endsection
