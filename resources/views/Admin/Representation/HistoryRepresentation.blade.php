@extends('Masters.Admin')

@section('title','تاریخچه نمایندگی‌')

@section('content')
	<div class="container" style="direction: rtl;padding: 20px 0px;">
        <h2>تاریخچه</h2>
        @if(count($errors)>0)
            <div class="alert alert-danger" style="margin-top: 20px">
                @foreach($errors->all() as $val)
                    {{ $val }}
                @endforeach
            </div>
        @endif
		<div>
            <div style="margin-top: 40px;">
                <form class="container" action="" method="POST">
                    {{csrf_field()}}
                    <textarea style="resize:none" name="HistoryData" placeholder="تاکنون مقداری ثبت نشده است" class="form-control">{{ count($history)>0 ? $history[0]['attributes']['hpp_data'] : ''}}</textarea>
                    <button style="margin-top:20px" class="btn btn-success">ثبت تاریخچه</button>
                    <a href="{{ route('Get_Representation') }}" class="btn btn-danger text-light" style="margin-right: 20px;margin-top:20px">&nbsp;بازگشت &nbsp;<i class="fas fa-arrow-circle-left"></i></a>
                </form>
            </div>       
		</div>
	</div>
@endsection