@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><b>Add New Client</b></div>
                <div class="card-body">
                    <div class="row">
                        {{ Form::open(array('route' => 'users.store', 'class' => 'col-md-12')) }}
                            <div class="form-group">
                                {{ Form::label('name', 'Name', array('for' => 'exampleInputName1')) }}
                                {{ Form::text('name', '', array('class' => 'form-control', 'id' => 'exampleInputName1', 'aria-describedby' => 'NameHelp', 'placeholder' => 'Enter your name')) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('email', 'E-Mail Address', array('for' => 'exampleInputEmail1')) }}
                                {{ Form::text('email', '', array('class' => 'form-control', 'id' => 'exampleInputEmail1', 'aria-describedby' => 'EmailHelp', 'placeholder' => 'Enter your email')) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('password', 'Password', array('for' => 'exampleInputPassword1')) }}
                                {{ Form::password('password', array('class' => 'form-control', 'id' => 'exampleInputEmail1', 'aria-describedby' => 'EmailHelp', 'placeholder' => 'Enter your email')) }}
                            </div>
                            {{ Form::button('Submit', array('type' => 'submit', 'class' => 'btn btn-primary')) }}
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
