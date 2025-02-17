@extends('layout')
@section('content')
<div class="container">
    <h3 align="center">Product</h3>
    <br>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="form-area">
                <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Product Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="">Category</label>
                            <select class="form-control" name="cat_id" id="">
                               @foreach ($categories as $id => $name)
                               <option value="{{ $id }}">{{ $name }}</option>
                               @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Description</label>
                            <input type="text" name="description" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="">Price</label>
                            <input type="text" name="price" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Photo</label>
                            <input type="file" name="photo" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <input type="submit" class="btn btn-primary" value="Submit">
                        </div>
                    </div>
                </form>
            </div>
            <table class="table mt-5">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Category</th>
                        <th scope="col">Price</th>
                        <th scope="col">Photo</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $key => $product)
                    <tr>
                        <td scope="col">{{ ++$key }}</td>
                        <td scope="col">{{ $product->name }}</td>
                        <td scope="col">{{ $product->category->name }}</td>
                        <td scope="col">{{ $product->price }}</td>
                        <td scope="col">
                            @if ($product->photo)
                            <img src="{{ asset('images/' . $product->photo) }}" height="100">
                            @else
                            <img src="{{ asset('images/def.jpg') }}" height="100">
                            @endif
                        </td>
                        <td scope="col">
                            <a href="{{ route('product.edit', ['product' => $product->id]) }}">
                                <button class="btn btn-primary btn-sm">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    Edit
                                </button>
                            </a>
                            <form action="{{ route('product.destroy', ['product' => $product->id]) }}" method="post" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@push('css')
<style>
    .form-area{
        padding: 20px;  
        margin-top: 20px;
        background-color: white;
    }
</style>
@endpush
@endsection