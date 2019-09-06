@extends('Masters.Main')

@section('title','نغمه ماندگار کیست')

@section('content')
    @include('Partials.GeneralHeader')
    <div class="History-Main container-fluid">
        <div class="HPP-content history">            
            <div class="HPP-content-container history-content">
                @foreach ($History as $item)
                    <div class="mt-3" style="text-align:justify">
                        {{ $item->hpp_data }}
                    </div>
                @endforeach
            </div>
        </div>

        <div class="HPP-content plane mt-5">
            <div class="text-center"> 
                <img class="head-image" src="{{config('app.url').'picture/assets/head.svg'}}" alt="">
            </div>
            <div class="purpose-titel text-center">
                <h2 id="purpose" style="text-align:center"> <b>اهداف</b></h2>
                <img class="seprator-image" src="{{config('app.url').'picture/assets/seprator.svg'}}" alt="">
            </div>
            <div class="">
                <ul class="">
                    @foreach ($Purpose as $item)
                        <li class="HPP-li">
                            {{ $item->hpp_data }}
                        </li>
                    @endforeach
                </ul>
            </div>


            
        </div>

        <div class="HPP-content purpose mt-5">
            <div class="d-flex justify-content-center mt-5">
                <img class="plane-image-seprator" src="{{config('app.url').'picture/assets/sec_seprator.svg'}}" alt="">
                <h2 id="plane" style="text-align:center;margin:0px 20px 0px 20px;"><b>برنامه‌ها</b></h2>
                <img class="plane-image-seprator" src="{{config('app.url').'picture/assets/sec_seprator.svg'}}" alt="" style="transform: rotate(180deg);">
            </div>
            <div class="" >
                <ul class="mt-5">
                    @foreach ($Plane as $item)
                        <li class="HPP-li">
                            {{ $item->hpp_data }}
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="HPP-content Statemants mt-5">
            <img class="statement-image" src="{{config('app.url').'picture/assets/middel_hpp.svg'}}" alt="" >
            <h2 id="statement" class="statement-title" style="text-align:center"><b>بیانیه‌ها</b></h2>
            <div>
                <div class="statemants-accordion" id="accordionExample">
                    <?php $index=0; ?>
                    @foreach ($Statement as $key => $item)
                        <?php $index++; ?>
                        <div class="">
                            <div class="statemants-accordion-content" id="headingOne" style="margin-top:30px" data-toggle="collapse" data-target="<?php echo '#collapseOne'.$index; ?>" aria-expanded="true" aria-controls="collapseOne">
                                <span style="color:#f6a619;font-size:20px;">&#9670;</span>
                                <span class="statemants-accordion-key" >
                                    <b>{{ $key }}</b>
                                </span>
                                <span style="float:left;">
                                    <img src="{{config('app.url').'picture/assets/moreicon.svg'}}" alt="" style="width:20px;">                                        
                                </span>
                            </div>                        
                            <div id="<?php echo 'collapseOne'.$index; ?>" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <ol class="">
                                    @foreach ($item as $Colection)
                                            <?php 
                                                if($Colection == '') continue;
                                                echo '<li class="HPP-li" style="margin-right: 30px;">'.$Colection.'</li>';
                                            ?>
                                    @endforeach
                                </ol>
                            </div>
                        </div>                        
                    @endforeach
                </div>
            </div>
            <div class="" style="margin-top:100px;">
                <ul class="">
                    
                </ul>
            </div>
        </div>
    </div>
    @include('Partials.GeneralFooter')
@endsection