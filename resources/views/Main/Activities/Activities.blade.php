@extends('Masters.Main')
@section('title',$name)
@section('content')
    @include('Partials.GeneralHeader')
    <div class="container activities-container" style="direction:rtl;">
            <div class="col-12">
                <div style="min-height:300px">
                    <div class="more-news-title-container">
                        <div  style="text-align:center">
                            <img class="activities-head-pic" src="{{config('app.url').'picture/assets/head2.png'}}" alt="">
                        </div>
                        <div class="purpose-titel text-center mt-4">
                            <h2 id="purpose" style="text-align:center"> <b>{{ $name }}</b></h2>
                            <img class="seprator-image" src="{{config('app.url').'picture/assets/seprator.svg'}}"/>
                        </div>
                    </div>
                    @if(count($Posts) > 0)
                    <div class="row" >
                        @foreach ($Posts as $Value)
                            <div class="activities_col">
                                <a  href=" {{route('Get_Read_Activity',$Value->id)}} " style="text-decoration:none;height:250px;">
                                    @if ($Value->apst_is_cover_picture_landscape > 0)
                                        <img class="activities-landescape-picture" src={{ config('app.url').$Value->apst_picture_of_cover }} />                                        
                                        <div class="activities-title">{{$Value->apst_title}}</div>
                                    @else
                                        <img class="activities-portrait-picture" src={{ config('app.url').$Value->apst_picture_of_cover }} />
                                        <div class="activities-portrait-title">{{$Value->apst_title}}</div>
                                    @endif
                                </a>                                     
                            </div> 
                        @endforeach
                    </div>
                        @else
                            <div class="alert alert-warning">
                                فعالیتی ثبت نشده است
                            </div>                        
                        @endif
                </div>
                @if(isset($Count))
                    <div class="pagination-container text-center mt-5">
                        <div class="d-flex justify-content-center">
                            <div class="pagination-number-container d-flex justify-content-center" ></div>
                        </div>
                        <img src="{{config('app.url').'/picture/assets/pageNumberLine.svg'}}" />
                    </div>
                @endif
            </div>
            <script>
                const paginationCount = "<?php echo $Count; ?>",
                    paginationPage = "<?php echo $Page; ?>", 
                    paginationRoute = "<?php echo config('app.url').'activities/'.$name.'/' ?>",
                    paginationLimit = "<?php echo $Limit; ?>";
                // const paginationCount = 40, paginationPage =2 , paginationRoute= "<?php echo config('app.url').'activities/'.$name.'/' ?>", paginationLimit = "<?php echo $Limit; ?>";
            </script>
        </div>
    @include('Partials.GeneralFooter')
@endsection