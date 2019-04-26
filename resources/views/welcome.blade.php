@extends('layouts.app')
@section('title') Welcome to ... @stop

@section('content')

    <div class="container">

        <div class="row" >
            <div class="col-md-10 offset-md-1" style="margin-top: 80px">

                <div id="carouselExampleIndicators" class="carousel slide mb-3" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="{{URL::to('images/one.jpg')}}" alt="First slide">
                            <div class="carousel-caption">
                                <h5>Hello World</h5>
                                <p>Welcome to our Shopping </p>
                                <a href="{{route('products')}}" class="btn btn-outline-success btn-lg">Go to Product Page</a>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{URL::to('images/four.jpg')}}" alt="Second slide">
                            <div class="carousel-caption">
                                <h5>Hello World</h5>
                                <p>Welcome to our Shopping </p>
                                <a href="{{route('products')}}" class="btn btn-outline-success btn-lg">Go to Product Page</a>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{URL::to('images/three.png')}}" alt="Third slide">
                            <div class="carousel-caption">
                                <h5>Hello World</h5>
                                <p>Welcome to our Shopping </p>
                                <a href="{{route('products')}}" class="btn btn-outline-success btn-lg">Go to Product Page</a>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach($pds as $pd)
            <div class="col-sm-6 col-md-3 mb-2">
                <div class="card shadow">
                    <div class="card-body">
                        <img src="{{route('front.product.image',['image_name'=>$pd->image])}}" class="card-img-top img-thumbnail" >
                        <p class="card-text text-center" style="font-size: 20px">{{$pd->product_name}}</p>
                        <div class="row">
                            <div class="col-md-6">
                                <p> <i class="fa fa-money"></i> {{$pd->price}} MMK
                            </div>
                            <div class="col-md-6">
                                <a href="#" class="btn btn-outline-primary btn-sm shadow">Add Cart</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                @endforeach
        </div>
    </div>


        <div class="pagination justify-content-center mt-3 mb-3">{{$pds->links()}}</div>

    <div class="container mb-5">
        <div class="row">
            <div class="col-md-6">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3817.2082738054905!2d97.36328264981469!3d16.915015520652915!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c2e9242c7048dd%3A0x5c81995dd8d6d8f0!2sMCC+Thaton!5e0!3m2!1sen!2smm!4v1549783473108" width="500" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>

            <div class="col-md-6">
                @if(Session('info'))<div class="alert alert-success">{{Session('info')}}</div>  @endif
                @if(Session('err'))<div class="alert alert-danger"> {{Session('err')}}</div> @endif

                <h4>Contact Our Support team.</h4>
                <form id="contactForm" method="post" action="{{route('post.message')}}">
                    <div class="form-divgroup">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control @if($errors->has('email')) is-invalid  @endif">
                        @if($errors->has('email'))<span class="invalid-feedback">{{$errors->first('email')}}</span> @endif
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="tel" id="phone" name="phone" class="form-control @if($errors->has('phone')) is-invalid @endif">
                        @if($errors->has('phone'))<span class="invalid-feedback">{{$errors->first('phone')}}</span> @endif
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea name="message" id="message" class="form-control @if($errors->has('message')) is-invalid @endif"></textarea>
                        @if($errors->has('message'))<span class="invalid-feedback">{{$errors->first('message')}}</span> @endif
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-outline-dark btn-lg">Send</button>
                    </div>
                        @csrf
                </form>
            </div>
        </div>
    </div>
    @include('layouts/footer')
    @stop
