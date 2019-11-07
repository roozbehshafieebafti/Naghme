@extends('Masters.Main')
@section('title',"نمایندگی‌ها")
@section('content')
@include('Partials.GeneralHeader')
    <div class="Representaion-container">
        <div class="container">
            <div class="row">
                @foreach ($Represent as $item)
                    <div class="col-xl-6 col-lg-8 col-md-8 col-12 main-representaion-content">
                        <div class="Representaion-border row">
                            <div class="Representaion-content-container">
                                <a class="representation-link" href="{{ route("Representaion_Read_More",$item->representation_title) }}">
                                    <div>
                                        <img class="representaion-element " src="{{ config('app.url').'picture/assets/representation.svg'}}" alt="">
                                        <p class="Representaion-title">{{ $item->representation_title }}</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-xl-6 col-lg-7 col-md-6 col-6 Representaion-content-container-2" style="position:relative;bottom: 10px;">
                                <div class="Representaion-info-container text-white pl-3 pr-3">
                                    <p>
                                        <span style="color:#f6a619">سرپرست نمایندگی:</span>
                                        <span >{{$item->representation_leader}}</span>
                                    </p>
                                    <div>
                                        <i class="fas fa-map-marker-alt mr-3"></i>
                                        <span style="color:#f6a619">آدرس:</span>
                                        <span class=" ml-3">{{substr($item->representation_address,0,40).'...'}}</span>
                                    </div>
                                    <div>
                                        <i class="fas fa-phone-volume  mr-3"></i>
                                        <span style="color:#f6a619">تلفن:</span>
                                        <span  class=" ml-3" >{{$item->representation_telephone}}</span>
                                    </div>
                                </div>
                                <div class="Representaion-read-more">
                                    <a class="text-dark" href="{{ route("Representaion_Read_More",$item->representation_title) }}">ادامه مطلب</a>
                                    <i class="fas fa-long-arrow-alt-left pt-1 mr-5"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@include('Partials.GeneralFooter')
@endsection