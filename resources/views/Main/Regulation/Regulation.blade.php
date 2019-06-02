@extends('Masters.Main')
@section('title','آئین‌نامه‌ها')
    
@section('content')
    <div class="container-fluid">
        <div class="container  mt-3">
            <h3>
                آیین‌نامه‌ها
            </h3>
        </div>
        <div class="m-3">
            <div class="accordion" id="accordionExample">
                @if (count($Regulation )>0)
                    @foreach ($Regulation as $key=>$item)
                        <div class="card">
                            <div class="card-header" id="heading{{$key}} ">
                                <h2 class="mb-0">
                                    <button style="direction: rtl" class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse{{$key}}" aria-expanded="true" aria-controls="collapseOne">
                                        {{$item->regulations_title}}
                                    </button>
                                </h2>
                            </div>
                        
                            <div id="collapse{{$key}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">
                                    <div>
                                        {{$item->regulations_description}}
                                    </div>
                                    <div class="mt-3">
                                        <a class="btn btn-info" href=" {{ config('app.url').'/'.$item->regulations_file_name}} ">فایل pdf</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="alert alert-danger  text-center h4 ">
                        آئین‌نامه‌ای برای نمایش وجود ندارد
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection