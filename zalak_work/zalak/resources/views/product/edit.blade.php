@extends('admin.app.layout')
@section('content')
<div class="row"  style="padding-top:80px;">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Product</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('product.index') }}"> Back</a>
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
   
<form action="{{ route('product.update',$product->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
  @method('PUT')
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Product Name:</strong>
                <input type="text" name="name" class="form-control" value="{{ $product->name }}" placeholder="Enter Product Name">
             
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Categories :</strong>               
                <select class="form-control" name="category_id">  
                @foreach($jay as $key => $value) 
                <option value="{{$value->cname}}" {{$product->category_id==$value->cname ? "selected":""}}>{{$value->cname}}</option>
                    @endforeach
                   
                </select>
               
            </div>
        </div>   
       
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Product Image</strong>:</strong>
                <input type="file" name="image" class="form-control">
               
            </div>
       
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Add By:</strong>
                <input type="text"  class="form-control" value="{{ Auth::user()->email }}" disabled>
                <input type="text" name="user_id" class="form-control" value="{{ Auth::user()->email }}" hidden>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Active:</strong>               
                <select class="form-control" name="active">   
                    <option value="">Select</option>
                    <option name="active" value="yes"{{ $product->active=="yes"? "selected" : "" }}>Yes</option>
                    <option name="active" value="no"{{ $product->active=="no"? "selected" : "" }}>No</option>
                </select>
               
            </div>
        </div>       
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>
@endsection