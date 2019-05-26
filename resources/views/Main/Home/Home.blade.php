@extends('Masters.Main')
@section('title','صفحه اصلی')
@section('content')
    <div class="container-fluid">
        <div class="SlideShow">
            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="{{ config('app.url').'/picture/slider/1.jpg' }}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>First slide label</h5>
                    <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                </div>
                </div>
                <div class="carousel-item">
                <img src="{{ config('app.url').'/picture/slider/2.jpg' }}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Second slide label</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
                </div>
                <div class="carousel-item">
                <img src="{{ config('app.url').'/picture/slider/3.jpg' }}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Third slide label</h5>
                    <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
            </div>
        </div>
    
        <div class="">
            <div class="row">
                <div class="flip-card col-xl-3 col-lg-3 col-md-6 col-sm-12 mt-2">
                    <div class="flip-card-inner">
                        <div class="flip-card-front">
                            <h2>salam</h2>                     
                        </div>
                        <div class="flip-card-back">
                            <h2>khobi?</h2> 
                        </div>
                    </div>
                </div>
        
                <div class="flip-card col-xl-3 col-lg-3 col-md-6 col-sm-12 mt-2">
                    <div class="flip-card-inner">
                        <div class="flip-card-front">
                            <h2>salam</h2>                     
                        </div>
                        <div class="flip-card-back">
                            <h2>khobi?</h2> 
                        </div>
                    </div>
                </div>
        
                <div class="flip-card col-xl-3 col-lg-3 col-md-6 col-sm-12 mt-2">
                    <div class="flip-card-inner">
                        <div class="flip-card-front">
                            <h2>salam</h2>                     
                        </div>
                        <div class="flip-card-back">
                            <h2>khobi?</h2> 
                        </div>
                    </div>
                </div>
        
                <div class="flip-card col-xl-3 col-lg-3 col-md-6 col-sm-12 mt-2">
                    <div class="flip-card-inner">
                        <div class="flip-card-front">
                            <h2>salam</h2>                     
                        </div>
                        <div class="flip-card-back">
                            <h2>khobi?</h2> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection