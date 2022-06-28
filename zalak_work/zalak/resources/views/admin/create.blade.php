@extends('admin.app.layout')
  
@section('content')
<div class="row" style="padding-top:80px;">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Admin</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('admin.index') }}"> Back</a>
        </div>
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('admin.store') }}" method="POST">
    @csrf
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control" value="{{old('name')}}" placeholder="Enter Name">
                @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                <input type="text" name="email" class="form-control" value="{{old('email')}}" placeholder="Enter Email">
                @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Password:</strong>
                <input type="password" name="password" class="form-control" value="{{old('password')}}" placeholder="Enter password">
                @if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group form-control">
                <strong>Gender:</strong>
                
                <input type="radio" name="gender" value="male" checked value="{{old('gender')}}">Male
                <input type="radio" name="gender" value="female" value="{{old('gender')}}">Female
            
                @if ($errors->has('gender'))
                    <span class="text-danger">{{ $errors->first('gender') }}</span>
                @endif
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group form-control">
                        <br>
                        <strong>Hobbies:</strong><br>
                        <input type="checkbox" name="hobbies[]" value="Cricket">Cricket<br>
                        <input type="checkbox" name="hobbies[]" value="Singing">Singing<br>
                        <input type="checkbox" name="hobbies[]" value="Swimming">Swimming<br>
                        <input type="checkbox" name="hobbies[]" value="Shopping">Shopping<br>
                @if ($errors->has('hobbies'))
                    <span class="text-danger">{{ $errors->first('hobbies') }}</span>
                @endif
            </div>
        </div>
    
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>
@endsection