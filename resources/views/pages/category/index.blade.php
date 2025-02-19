@extends('layout')
@section('content')
<div class="container">
    <h3 align="center">Category</h3>
    <br>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="form-area">
                <form action="{{ route('category.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Category Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label for="">Status</label>
                            <select class="form-control" name="status" id="">
                                <option selected>Select Menu</option>
                                <option value="1">true</option>
                                <option value="2">false</option>
                            </select>
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
                        <th scope="col">Category Name</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $key => $category )
                    <tr>
                        <td scope="col">
                            {{ ++$key }}
                        </td>

                        <td scope="col">{{ $category->name }}</td>
                        <td scope="col">
                            @if ($category->status == 1)
                            true
                            @else
                            false
                            @endif
                        </td>
                        <td scope="col">
                            <a href="{{ route('category.edit , $category->id') }}">

                            <button class="btn btn-primary btn-sm">
                                <li class="fa fa-pencil-square-o" aria-hidden="true"></li>
                                Edit
                            </button>
                            </a>
                            <form action="{{ route('category.destroy , $category->id') }}" method="post" style="display: inline;">
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