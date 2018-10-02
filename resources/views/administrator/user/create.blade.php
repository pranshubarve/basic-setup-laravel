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

                            <!-- section for name -->
                            <div class="form-group">
                                {{ Form::label('name', 'Name', array('for' => 'exampleInputName1')) }}
                                @if ($errors->has('name'))
                                    {{ Form::text('name', '', array('class' => 'form-control  is-invalid', 'id' => 'exampleInputName1', 'aria-describedby' => 'NameHelp', 'placeholder' => 'Enter your name')) }}
                                    <div class="text-danger">{{ $errors->first('name') }}</div>
                                @else
                                    {{ Form::text('name', '', array('class' => 'form-control', 'id' => 'exampleInputName1', 'aria-describedby' => 'NameHelp', 'placeholder' => 'Enter your name')) }}
                                @endif
                            </div>

                            <!-- section for email -->
                            <div class="form-group">
                                {{ Form::label('email', 'E-Mail Address', array('for' => 'exampleInputEmail1')) }}
                                @if ($errors->has('email'))
                                    {{ Form::text('email', '', array('class' => 'form-control is-invalid', 'id' => 'exampleInputEmail1', 'aria-describedby' => 'EmailHelp', 'placeholder' => 'Enter your email')) }}
                                    <div class="text-danger">{{ $errors->first('email') }}</div>
                                @else
                                    {{ Form::text('email', '', array('class' => 'form-control ', 'id' => 'exampleInputEmail1', 'aria-describedby' => 'EmailHelp', 'placeholder' => 'Enter your email')) }}
                                @endif
                            </div>

                            <!-- section for password -->
                            <div class="form-group">
                                {{ Form::label('password', 'Password', array('for' => 'exampleInputPassword1')) }}
                                @if ($errors->has('password'))
                                    <div class="text-danger">{{ $errors->first('password') }}</div>
                                    {{ Form::password('password', array('class' => 'form-control is-invalid', 'id' => 'exampleInputEmail1', 'aria-describedby' => 'EmailHelp', 'placeholder' => 'Enter your email')) }}
                                @else
                                    {{ Form::password('password', array('class' => 'form-control', 'id' => 'exampleInputEmail1', 'aria-describedby' => 'EmailHelp', 'placeholder' => 'Enter your email')) }}
                                @endif
                            </div>

                            <!-- section for button submit -->
                            {{ Form::button('Submit', array('type' => 'submit', 'class' => 'btn btn-primary')) }}

                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
