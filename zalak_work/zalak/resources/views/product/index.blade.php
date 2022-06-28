@extends('admin.layout')

@section('content')
<style>
    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        padding: 12px 16px;
        z-index: 1;
    }

    .dropdown:hover .dropdown-content {
        display: block;
    }
</style>
<div class="row" style="margin-top:5rem;">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Product Details</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-warning" href="product/create">Add New Product</a>
            <a class="btn btn-primary" href="{{ route('admin.index') }}"> Back</a>
            <div class="dropdown">
                <span class="btn btn-info">Select a Category</span>
                <div class="dropdown-content">
                    @foreach($jay as $key => $value)
                    <option value=" {{ $value->cname }}"> {{ $value->cname }}</option>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
<br>
<br>
<div class="w3-container">
        <table class="table table-bordered" > 
            <tr style="background-color:#B955CF ; color:#080808;"> 
        <th>No</th>
        <th>Product Name</th>
        <th>Category Name</th>
        <th>Product Image</th>
        <th>Add By</th>
        <th>Active</th>
        <th width="">Action</th>
    </tr>
    @foreach($data as $key => $value)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $value->name }}</td>
        <td>{{ $value->category_id }}</td>

        <td><img src=" {{ asset('public/images/' . $value->image)}}" width="160" height="80"></td>

        <td>{{ $value->user_id }}</td>
        <td>{{ $value->active }}</td>
        <td>
            <form action="{{ route('product.destroy',$value->id) }}" method="POST">

                <a class="btn btn-primary" href="{{ route('product.edit',$value->id) }}">Edit</a>
                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">Delete</button>

            </form>
        </td>
    </tr>
    @endforeach
</table>

{!! $data->links() !!}

@endsection