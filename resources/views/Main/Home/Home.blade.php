@extends('Masters.Main')
@section('title','صفحه اصلی')
@section('content')
    {{-- Slide Show --}}
        <div class="SlideShow mt-0">
            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <?php $i=1; ?>
                @foreach ($Slides as $item)                    
                <div class="carousel-item <?php echo $i==1 ? 'active' : '' ?>">
                    <img src="{{ config('app.url').$item->picture }}" class="d-block w-100" style="z-index:">
                    <div class="carousel-caption d-none d-md-block" style="height: 100px">
                        <a class="text-white pb-2 pt-2" id="sliderLink" href="{{$item->link}}">
                            <span class="ml-3 font-weight-bold">ادامه مطلب</span><i style="font-size:15" class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <?php $i++; ?>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="next">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button"  data-slide="prev" >
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
            </div>
        </div>
    
        <div class="rotate-background"></div>
        <div class="main-part">
            <div class="sweing-container">
                <div class="sweing-news flip-card col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12 mt-2 ">
                    <div class="flip-card-inner">
                        <div class="flip-card-front">
                            <div class="front-label">
                                <div class="label-text1">
                                    خبر
                                </div>
                            </div>                     
                        </div>
                        <div class="flip-card-back">
                            <div class="back-label">
                                <div class="label-text1">
                                    خبر
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
        
                <div class="sweing-register flip-card col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12 mt-2">
                    <div class="flip-card-inner">
                        <div class="flip-card-front">
                            <div class="front-label">
                                <div class="label-text1">
                                    عضویت
                                </div>
                            </div>                     
                        </div>
                        <div class="flip-card-back">
                            <div class="back-label">
                                <div class="label-text1">
                                    عضویت
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
        
                <div class="sweing-activity flip-card col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12 mt-2">
                    <div class="flip-card-inner">
                        <div class="flip-card-front">
                            <div class="front-label">
                                <div class="label-text1">
                                    فعالیت‌ها
                                </div>
                            </div>                     
                        </div>
                        <div class="flip-card-back">
                            <div class="back-label">
                                <div class="label-text1">
                                        فعالیت‌ها
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
        
                <div class="sweing-representation flip-card col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12 mt-2">
                    <div class="flip-card-inner">
                        <div class="flip-card-front">
                            <div class="front-label">
                                <div class="label-text1">
                                    نمایندگی‌ها
                                </div>
                            </div>                     
                        </div>
                        <div class="flip-card-back">
                            <div class="back-label">
                                <div class="label-text1">
                                    نمایندگی‌ها
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection