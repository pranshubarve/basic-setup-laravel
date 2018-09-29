@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

                <div class="jumbotron text-center">
                    <h2>{{ $user->name }}</h2>
                    <p>
                        <strong>Email:</strong> {{ $user->email }}<br>
                        <strong>Name:</strong> {{ $user->name }}
                    </p>
                </div>
        </div>
    </div>
</div>
@endsection
