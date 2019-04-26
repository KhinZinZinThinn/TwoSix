@extends('layouts.app')
@section('title') Edit Product @stop
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header">Edit Product</div>
                <div class="card-body">
                    <form enctype="multipart/form-data" method="post" action="{{route('update.product')}}">
                        <input type="hidden" name='id' value="{{$pd->id}}">
                        <div class="form-group">
                            <label for="product_name">Product Name</label>
                            <input type="text" value="{{$pd->product_name}}" name="product_name" id="product_name" class="form-control @if($errors->has('product_name'))is-invalid @endif">
                            @if($errors->has('product_name'))<span class="invalid-feedback">{{$errors->first('product_name')  }} </span> @endif
                        </div>
                        <div class="form_group">
                            <label for="price">Price</label>
                            <input type="number"  value="{{$pd->price}}" name="price" id="price" class="form-control @if($errors->has('price'))is-invalid @endif">
                            @if($errors->has('price'))<span class="invalid-feedback">{{$errors->first('price')  }} </span> @endif
                        </div>
                        <div class="form-group">
                            <label for="image">Select Image</label>
                            <input type="file"  value="{{$pd->image}}" name="image" id="image" class="form-control @if($errors->has('image'))is-invalid @endif" >
                            @if($errors->has('image')) <span class="invalid-feedback">{{$errors->first('image')}}</span> @endif
                        </div>
                        <div class="form-group">
                            <label for="category_id">Category</label>
                            <select name="category_id" id="category_id" class="custom-select @if($errors->has('category_id'))is-invalid @endif">
                                @if($errors->has('category_id'))<span class="invalid-feedback">{{$errors->first('category_id')  }} </span> @endif
                                <option valuprimarye="">Select Category</option>
                                @foreach($cats as $cat)  //from getCategory
                                <option @if($cat->id==$pd->category_id) selected @endif value="{{$cat->id}}">{{$cat->cat_name}}</option>
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