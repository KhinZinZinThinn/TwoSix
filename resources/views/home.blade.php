@extends('layouts.app')
@section('title') Dashboard
    @stop

@section('content')
<div class="container">


                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!

</div>
@endsection
