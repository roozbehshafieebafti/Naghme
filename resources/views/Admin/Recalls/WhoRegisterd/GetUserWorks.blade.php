@extends('Masters.Admin')
@section('title','فراخوان عکس')

@section('content')
    <div class="container" style="overflow: hidden;padding: 20px 0">
        <h2>آثار {{ $name.' '.$family }}</h2>
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