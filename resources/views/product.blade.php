@extends('layouts.app')
@section('title') Product
@stop
@section('content')
<div class="container" style="margin-top: 100px">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-database"></i> <span class="badge badge-primary">{{count($pds)}} </span>Products Availables
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-hover" id="dataTb">
                        <thead>
                        <tr>
                            <td>Id</td>
                            <td>Images</td>
                            <td>Item Name</td>
                            <td>Price</td>
                            <td>Category</td>
                            <td>Created User</td>
                            <td>Uploaded Date</td>
                            <td>Actions</td>
                        </tr>
                        </thead>

                        @foreach($pds as $pd)
                            <tr>
                                <td>{{$pd->id}}</td>
                                <td><img src="{{route('product.image',['img_name'=>$pd->image])}}" class="img-thumbnail"></td>
                                <td>{{$pd->product_name}}</td>
                                <td>{{$pd->price}}</td>
                                <td>{{$pd->category->cat_name}}</td>
                                <td>{{$pd->user->name}}</td>
                                <td>{{$pd->created_at->diffForHumans()}}</td>
                                <td><a href="{{route('delete.product',['id'=>$pd->id])}}" class="text-danger btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i></a>

                                    <a href="{{route('edit.product',['id'=>$pd->id])}}" class="btn btn-outline-primary btn-sm"><i class="fa fa-edit"></i> </a>
                                    <!-- Modal -->
                                    <div class="modal fade" id="e{{$pd->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <form method="post" action="{{route('update.product')}}">
                                                    <input type="hidden" name="id" value="{{$pd->id}}">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit {{$pd->product_name}}</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="product_name">Product Name</label>
                                                            <input value="{{$pd->product_name}}" type="text" name="product_name" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="price">Price</label>
                                                            <input value="{{$pd->price}}" type="text" name="price" class="form-control">
                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                    @csrf
                                                </form>
                                            </div>
                                                          </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            @if(Session('info')) <div class="alert alert-success">{{Session('info')}}</div> @endif
            <div class="card">
                <div class="card-header">New Product</div>
                <div class="card-body">
                    <form enctype="multipart/form-data" method="post" action="{{route('new.product')}}">
                    <div class="form-group">
                        <label for="product_name">Product Name</label>
                        <input type="text" name="product_name" id="product_name" class="form-control @if($errors->has('product_name'))is-invalid @endif">
                        @if($errors->has('product_name'))<span class="invalid-feedback">{{$errors->first('product_name')  }} </span> @endif
                    </div>
                    <div class="form_group">
                        <label for="price">Price</label>
                        <input type="number" name="price" id="price" class="form-control @if($errors->has('price'))is-invalid @endif">
                        @if($errors->has('price'))<span class="invalid-feedback">{{$errors->first('price')  }} </span> @endif
                    </div>
                    <div class="form-group">
                        <label for="image">Select Image</label>
                        <input type="file" name="image" id="image" class="form-control @if($errors->has('image'))is-invalid @endif" >
                        @if($errors->has('image')) <span class="invalid-feedback">{{$errors->first('image')}}</span> @endif
                    </div>
                    <div class="form-group">
                        <label for="category_id">Category</label>
                        <select name="category_id" id="category_id" class="custom-select @if($errors->has('category_id'))is-invalid @endif">
                            @if($errors->has('category_id'))<span class="invalid-feedback">{{$errors->first('category_id')  }} </span> @endif
                            <option valuprimarye="">Select Category</option>
                            @foreach($cats as $cat)  //from getCategory
                                <option value="{{$cat->id}}">{{$cat->cat_name}}</option>
                                @endforeach
                        </select>
                    </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg">Save</button>
                        </div>

                    @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
