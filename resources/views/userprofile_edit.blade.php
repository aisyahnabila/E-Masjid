@extends('layouts.app_adminkit')

@section('content')
    <h1 class="h3 mb-3">Ubah Data User</h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    {!! Form::model(auth()->user(), [
                        'route' => ['userprofile.update', 0],
                        'method' => 'PUT',
                    ]) !!}
                    <div class="form-group mb-3">
                        <label for="name">Nama</label>
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                        <span class="text-danger">{!! $errors->first('name') !!}</span>
                    </div>
                    <div class="form-group mb-3">
                        <label for="email">email</label>
                        {!! Form::text('email', null, ['class' => 'form-control']) !!}
                        <span class="text-danger">{!! $errors->first('email') !!}</span>
                    </div>
                    <div class="form-group mb-3">
                        <label for="password">Password</label>
                        {!! Form::password('password', ['class' => 'form-control']) !!}
                        <span class="text-danger">{!! $errors->first('password') !!}</span>
                    </div>

                    {!! Form::submit('simpan Perubahan', ['class' => 'btn btn-primary']) !!}
                    {!! form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
