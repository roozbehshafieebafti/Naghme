@extends('Masters.Admin')
@section('title','نمودار سازمانی')
@section('content')
    <div>
        <div class="container" style="direction: rtl;padding: 20px 0px;">
            <div>
                <h2>نمودار سازمانی</h2>
                <br />
            </div>
            @if(session('success'))
                <div id="ErorrDiv" class="alert alert-success" >{{ session('success') }}</div>
            @elseif(session('error'))
                <div id="ErorrDiv" class="alert alert-danger" >{{ session('error') }}</div>
            @endif
            @if(count($errors)>0)
                <div id="ErorrDiv" class="alert alert-danger" >
                    @foreach($errors->all() as $val)
                        {{ $val }}
                    @endforeach
                </div>
            @endif
            <div class="text-left">
                @if ($DataChart != null)
                    <a title="کلیک کنید" target="_blank" href="{{ config('app.url').'/'.$DataChart['attributes']['chart_picture'] }}"><img style="height:70px" src="{{ config('app.url').'/'.$DataChart['attributes']['chart_picture'] }}" /></a>    
                @else
                    <div class="alert alert-warning">تاکنون نمودار سازمانی اضافه نشده است</div>
                @endif               
            </div>

            <div style="margin-top:30px">
                <h3>بروزرسانی نمودار</h3>
                <br />
            </div>
            <form id="HistoryForm" class="col-12" action="" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div>
                    <label for="exampleInputEmail1">تصویر نمودار : </label>
                    <input class="form-control" type="file" name="Chart_Picture" />
                </div>
                <div class="bg-success text-light col-12 rounded-top" style="font-size:20px;height:50px;padding-top: 7px;margin-top:40px;">توضیحات نمودار سازمانی</div>
                @if ($DataChart != null)    
                    <textarea id="Chart_data" name="Chart_data" class="col-12 card" style="height:80px;text-align: right;resize: none;">{{ $DataChart['attributes']['chart_description'] }}</textarea>
                @else
                <textarea placeholder="توضیحات را اینجا وارد کنید" id="Chart_data" name="Chart_data" class="col-12 card" style="height:80px;text-align: right;resize: none;"></textarea>    
                @endif
                <div style="margin-top: 20px">
                    <button name="send_data" class="btn btn-info">به روز رسانی</button>
                    <a href="{{ route('Get_Representation') }}" class="btn btn-danger text-light" style="margin-right: 20px">&nbsp;بازگشت &nbsp;<i class="fas fa-arrow-circle-left"></i></a>
                </div>
            </form>
        </div>
    </div>
@endsection