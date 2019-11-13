@extends('Masters.Main')
@section('title',"فعالیت‌ها")
@section('content')
<div class="all-activity-container">
    @include('Partials.activitiesHeader')
    <div class="allAct-main-posts">
    @foreach ($Posts as $key => $item)    
        <div id="{{$key}}" class="col-12">
            <div style="min-height:300px">
                <div class="more-news-title-container">
                    <div  style="text-align:center">
                        <img class="activities-head-pic" src="{{config('app.url').'picture/assets/head2.png'}}" alt="">
                    </div>
                    <div class="purpose-titel text-center mt-4">
                        <h2 id="purpose" class="activities-main-titles"  style="text-align:center"> <b>{{ $titleIds[$key] }}</b></h2>
                        <img class="seprator-image" src="{{config('app.url').'picture/assets/seprator.svg'}}"/>
                    </div>
                </div>
                @if(count($item) > 0)
                    <div class="container">
                        <div class="activities-flex-row row" style="direction: rtl">
                            @foreach ($item as $k => $Value)
                            @if ($Value->apst_is_cover_picture_landscape > 0)
                                <div class="offset-xl-1 ">
                                    <div class="activities_col-1" >
                                        <a  href=" {{route('Get_Read_Activity',$Value->id)}} " style="text-decoration:none;height:250px;">
                                            <img class="activities-landescape-picture" src={{ config('app.url').$Value->apst_picture_of_cover }} />                                        
                                            <div class="activities-title">{{$Value->apst_title}}</div>
                                        </a>
                                    </div>
                                </div>    
                                @else
                                    <div class="offset-xl-1 {{'order-'.((-1*$k)+5)}}">
                                        <div class="activities_col">
                                            <a  href=" {{route('Get_Read_Activity',$Value->id)}} " style="text-decoration:none;height:250px;">
                                                <img class="activities-portrait-picture" src={{ config('app.url').$Value->apst_picture_of_cover }} />
                                                <div class="activities-portrait-title">{{$Value->apst_title}}</div>
                                            </a>                                     
                                        </div> 
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>                      
                @endif
            </div>
        </div>
    @endforeach
    </div>
</div>
@include('Partials.GeneralFooter')
@endsection