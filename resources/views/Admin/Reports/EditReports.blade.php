@extends('Masters.Admin')
@section('title','ویرایش پرسشنامه')

@section('content')
	<div class="container" style="direction: rtl;padding: 20px 0">
        <h2>ویرایش پرسشنامه</h2>
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
				    <label >نام پرسشنامه:</label>
                    <input type="text"  name="New_Report" class="form-control col-8 text-left" placeholder="نام پرسشنامه را اینجا وارد کنید" value="{{$editableReports[0]->name}}">
                    <small class="pl-2">حداکثر 100 کارکتر</small>
                </div>
                <div>
                    <button class="btn btn-success">ویرایش پرسشنامه</button>
				    <a href="{{ route('Get_All_Reports') }}" class="btn btn-danger text-light" style="margin-right: 20px;">&nbsp;بازگشت &nbsp;<i class="fas fa-arrow-circle-left"></i></a>
                </div>
            </form>
        </div>
	</div>
@endsection