@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if (Session::has('message'))
                <div class="alert alert-info">{{ Session::get('message') }}</div>
            @endif

            <div class="card">
                <div class="card-header">
                    <!-- will be used to show any messages -->
                    <span class="font-weight-bold">{{ __('Users') }}</span>
                    <span class="float-right">
                        <a href="{{ URL::to('admin/users/create') }}" class="btn btn-sm btn-primary">{{ __('Add User') }}</a>
                    </span>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            @foreach($users as $user)
                            <div class="row">
                                <div class="col-md-1">
                                    <sub class="text-info font-weight-bold">{{ __('Id') }}</sub></br>
                                        {{ $user->id }}
                                </div>
                                <div class="col-md-4">
                                    <sub class="text-info font-weight-bold">{{ __('E-mail Address') }}</sub></br>
                                        {{ $user->email }}
                                </div>
                                <div class="col-md-4">
                                    <sub class="text-info font-weight-bold">{{ __('Name') }}</sub></br>
                                        {{ $user->name }}
                                    </br>
                                    <sub class="text-info font-weight-bold">{{ __('Role') }}</sub></br>
                                        @foreach ($user->roles as $role)
                                        {{ $role->name }}
                                        @endforeach

                                </div>
                                <div class="col-md-3">

                                    <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->

                                    <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
                                    <a class="btn btn-sm btn-info" href="{{ URL::to('admin/users/' . $user->id) }}">{{ __('Show') }}</a>

                                    <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                                    <a class="btn btn-sm btn-primary" href="{{ URL::to('admin/users/' . $user->id . '/edit') }}">{{ __('Edit') }}</a>

                                </div>
                            </div>
                          <div class="col"><hr/></div>

                            @endforeach
                        </div>
                    </div>
                     {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
