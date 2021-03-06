@extends('Masters.Admin')
@section('title','ایجاد فراخوان عکس جدید')

@section('content')
	<div class="container" style="direction: rtl;padding: 20px 0">
        <h2>ایجاد فراخوان عکس جدید</h2>
		<div>
			@if(count($errors)>0)
				<div  style="margin-top: 20px">
					<ul class="alert alert-danger">
					@foreach($errors->all() as $val)
						<li>{{ $val }}</li>
					@endforeach
					</ul>
				</div>
			@endif
			@if(session("error"))
				<div class="alert alert-danger" style="margin-top: 20px" >					
					{{session("error")}}
				</div>
			@endif
			<form class="form" method="post" action="" style="padding: 20px 0">
                {{ csrf_field() }}
                <div class="form-group">
				    <label >نام فراخوان:</label>
                    <input type="text"  name="New_Recall" class="form-control col-8 text-left" placeholder="نام فراخوان را اینجا وارد کنید">
                    <small class="pl-2">حداکثر 100 کارکتر</small>
                </div>
                <div>
                    <button class="btn btn-success">ثبت فراخوان</button>
				    <a href="{{ route('Get_Recalls') }}" class="btn btn-danger text-light" style="margin-right: 20px;">&nbsp;بازگشت &nbsp;<i class="fas fa-arrow-circle-left"></i></a>
                </div>
            </form>
        </div>
	</div>
@endsection