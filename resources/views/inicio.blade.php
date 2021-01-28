@extends('layouts.app')

@section('content')
<div class="container">
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi, facere facilis nemo non odio placeat sequi. Ad amet culpa distinctio eligendi excepturi, impedit ipsum obcaecati provident, repudiandae similique voluptas, voluptate?</p>
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
