@extends('layouts.app')

@section('content')
    <button type="button" class="modal_btn" data-bs-toggle="modal"
            data-bs-target="#modal-form-create">New Product
    </button>
    <div class="modal fade" id="modal-form-create" tabindex="-1" role="dialog" aria-labelledby="modal-form-create"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card card-plain">
                        <div class="card-header pb-0 text-left">
                            <h3 class="font-weight-bolder text-info text-gradient">CREATE NEW Product</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <label for="image">Image</label>
                                <div class="input-group mb-3">
                                    <input type="file" name="image" id="image" class="form-control" placeholder="Image"
                                           aria-label="Image" aria-describedby="image-addon">
                                </div>

                                <label for="name">Name</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Name"
                                           aria-label="Name" aria-describedby="name-addon">
                                </div>

                                <label for="description">Description</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="description" id="description" class="form-control" placeholder="Description"
                                           aria-label="Description" aria-describedby="description-addon">
                                </div>

                                <label for="category">Category</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="category" id="category" class="form-control" placeholder="Category"
                                           aria-label="Category" aria-describedby="category-addon">
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-round bg-gradient-info btn-lg w-100 mt-4 mb-0">
                                        Create
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Image</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Category</th>
            <th scope="col">Action</th>
        </tr>
        </thead>

        <tbody>
        @foreach($products as $product)
            <tr>
                <th scope="row">{{$product->id}}</th>
                <th>{{$product->image}}</th>
                <td>{{$product->name}}</td>
                <td>{{$product->description}}</td>
                <td>{{$product->category}}</td>
                <td>
                    <!-- Button trigger modal -->
                    <button type="button" class="trigger-editButton-modal" data-bs-toggle="modal" data-bs-target="#modal-form-edit-{{ $product->id }}"
                            data-id="{{ $product->id }}">
                        Edit
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="modal-form-edit-{{ $product->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Post</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{route("product.update", ['id'=>$product->id])}}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <label for="name">Name</label>
                                        <div class="input-group mb-3">
                                            <input type="text" name="name" value="{{ old('name', $product->name) }}" id="name" class="form-control" placeholder="Name" aria-label="Name" aria-describedby="name-addon">
                                        </div>

                                        <label for="description">Description</label>
                                        <div class="input-group">
                                            <textarea type="text" name="description" id="description" class="form-control" placeholder="Description"
                                                      aria-label="Description" aria-describedby="Description-addon">{{ old('description', $product->description) }}</textarea>
                                        </div>

                                        <label for="inputImage">Photo</label>
                                        <div class="input-group mb-3">
                                            <input type="file" name="image" value="{{ old('image', $product->image) }}" id="inputImage" class="form-control"
                                                   aria-label="inputImage">
                                        </div>

                                        <label for="category">Category</label>
                                        <div class="input-group mb-3">
                                            <input type="text" name="category" value="{{ old('category', $product->category) }}" id="category" class="form-control" placeholder="Category" aria-label="Category" aria-describedby="category-addon">
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="button-in-modal">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <form action="{{route("product.destroy", ['id'=>$product->id])}}"
                          method="post">
                        @csrf
                        @method('delete')
                        <input class="trigger-deleteButton-modal" type="submit" value="delete">
                    </form>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
@endsection
