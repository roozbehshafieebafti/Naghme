@extends('Masters.Admin')
@section('title','فراخوان عکس')

@section('content')
    <div class="container" style="overflow: hidden;padding: 20px 0">
        <h2>آثار {{ $name.' '.$family }}</h2>
        <div class="mt-4 ml-4">
            <div class="row" >
                <div class="col-6">کدملی : {{$userInfo[0]->national_code}}</div>              
                <div class="col-6">تاریخ تولد : {{$userInfo[0]->birth_date}}</div>              
            </div>
            <div class="row">
                <div class="col-6">محل تولد : {{$userInfo[0]->birth_location}}</div>
                <div class="col-6">شماره تلفن : {{$userInfo[0]->phone_number}}</div>                              
            </div>
            <div class="row" >
                <div class="col-6">شماره ثابت : {{$userInfo[0]->constant_number}}</div>              
                <div class="col-6">رشته تحصیلی: {{$userInfo[0]->major}}</div>                            
            </div>
            <div class="row" >
                <div class="col-6">مقطع تحصیلی: {{$userInfo[0]->education_level}}</div>              
                <div class="col-6">دانشگاه : {{$userInfo[0]->univercity}}</div>              
            </div>
            <div class="row">
                <div class="col-12">خلاصه سوابق هنری: {{$userInfo[0]->brife_art_expirences}}</div>
            </div>
            <div class="row">
                <div class="col-12">آدرس : {{$userInfo[0]->address}}</div>  
            </div>
        </div>
        <hr />
        <ul class="mt-5">
            <li  class="d-flex justify-content-between mt-2" style="width:180px">
                <span>عکس ثبت نهایی شده</span>
                <span class="bg-success" style="display:inline-block;width:20px;height:20px"></span>
            </li>
            <li  class="d-flex justify-content-between mt-2" style="width:180px">
                <span>عکس ثبت شده</span>
                <span class="bg-light" style="display:inline-block;width:20px;height:20px"></span>
            </li> 
            <li class="d-flex justify-content-between mt-2" style="width:180px">
                <span>عکس حذف شده</span>
                <span class="bg-danger" style="display:inline-block;width:20px;height:20px"></span>
            </li>
        </ul>
        <div class="mt-5">
            @foreach ($Works as $item)
                <div class="alert <?php if($item->is_deleted==1) {echo 'alert-danger';} else { if($IsSubmited){echo 'alert-success';} else{echo 'alert-light';} } ?>">
                    <div class="row">
                        <div class="col-2">
                            <a href="{{config('app.url').$item->picture}}" target="_blank">
                                <img src="{{config('app.url').$item->picture}}" style="width:150px;height:150px;"/>
                            </a>                        
                        </div>
                        <div class="col-8">
                            <ul>
                                <li class="d-flex justify-content-start">
                                    <span style="width:80px;font-weight:bold">عنوان:&nbsp;&nbsp;</span>
                                    <span>{{$item->title}}</span>
                                </li>
                                <li class="d-flex justify-content-start">
                                    <span style="width:80px;font-weight:bold">سال تولید:&nbsp&nbsp;;</span>
                                    <span>{{$item->production_date}}</span>
                                </li>
                                <li class="d-flex justify-content-start">
                                    <span style="width:80px;font-weight:bold">سایز:&nbsp;&nbsp;</span>
                                    <span>{{$item->size}}</span>
                                </li>
                                <li class="d-flex justify-content-start">
                                    <span style="width:80px;font-weight:bold">تکنیک:&nbsp;&nbsp;</span>
                                    <span>{{$item->technique}}</span>
                                </li>
                                <li class="d-flex justify-content-start">
                                    <span style="width:80px;font-weight:bold">بیانیه: &nbsp;&nbsp;</span>
                                    <span>{{$item->statements}}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection