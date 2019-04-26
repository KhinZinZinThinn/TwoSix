@extends('layouts.app')
@section('title') Category
@stop
@section('content')
    <div class="container" style="margin-top: 100px">
        <div class="row">
            <div class="col-md-8">
                @if(Session('info')) <div class="alert alert-success">{{Session('info')}}</div> @endif
                <div class="card shadow">
                    <div class="card-header"> <i class="fas fa-list-alt"></i> Categories</div>
                    <div class="card-body table-responsive">
                        <table class="table">
                            <tr>
                                <td>ID</td>
                                <td>Barcode</td>
                                <td>Category Name</td>
                                <td>Created Date</td>
                                <td>Actions</td>
                            </tr>
                            @foreach($cats as $cat)
                                <tr>
                                    <td>{{$cat->id}}</td>
                                    <td><?php echo DNS2D::getBarcodeSVG($cat->id, "DATAMATRIX"); ?></td>
                                    <td>{{$cat->cat_name}}</td>
                                    <td>{{$cat->created_at->diffForHumans()}}</td>
                                    <td>
                                        <a href="#" data-toggle="modal" data-target="#e{{$cat->id}}"><i class="fa fa-edit"></i> </a>

                                        <!-- Modal -->
                                        <div class="modal fade" id="e{{$cat->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <form method="post" action="{{route('update.category')}}">
                                                        <input type="hidden" name="id" value="{{$cat->id}}">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit {{$cat->cat_name}}</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="cat_name">Category Name</label>
                                                            <input value="{{$cat->cat_name}}" type="text" name="cat_name" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                        @csrf
                                                    </form>
                                                </div>
                         ;                   </div>
                                        </div>
                                        <a href="{{route('remove.category',['id'=>$cat->id])}}" class="text-danger"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                        </table>
                        {{$cats->links()}}

                    </div>
                </div>

            </div>
            <div class="col-md-4">
                @if(Session('alert')) <div class="alert alert-success">{{Session('alert')}}</div> @endif
                <div class="card shadow">
                    <div class="card-header"><i class="fas fa-plus"></i> New Category</div>
                    <div class="card-body">
                        <form method="post" action="{{route('new.category')}}">
                            <div class="form-group">
                                <label for="cat_name">Category Name</label>
                                <input type="text" name="cat_name" id="cat_name" class="form-control @if ($errors->has('cat_name')) is-invalid @endif">
                                @if ($errors->has('cat_name'))<span class="invalid-feedback">{{$errors->first('cat_name')}}</span> @endif
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
@endsection
