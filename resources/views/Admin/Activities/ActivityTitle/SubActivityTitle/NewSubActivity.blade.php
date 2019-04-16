@extends('Masters.Admin')
@section('title','زیر فعالیت جدید')

@section('content')
	<div class="container" style="direction: rtl;padding: 20px 0">
		<h2>زیر فعالیت جدید </h2>
		<div>
			@if (session('error'))
				<div class="alert alert-danger" style="margin-top: 30px">
						{{ session('error') }}
					</div>
			@endif
			@if(count($errors)>0)
				<div  style="margin-top: 20px">
					<ul class="alert alert-danger">
					@foreach($errors->all() as $val)
						<li>{{ $val }}</li>
					@endforeach
					</ul>
				</div>
			@endif
			<form class="form" method="post" action="" style="padding: 20px 0">
                {{ csrf_field() }}
                <input type="hidden" name="Parent_id" value="{{ $id }}" />
				 <div class="form-group">
				    <label >نام زیر فعایت:</label>
				    <input type="text" name="New_Activities" class="form-control text-left" placeholder="زیر فعالیت را اینجا وارد کنید">
				  </div>
				<div class="form-group">
				    <label >توضیحات</label>
				    <textarea style="resize:none" type="text" name="Activities_Text" class="form-control"></textarea>
				  </div>
				<button class="btn btn-success">ثبت  زیر فعالیت</button>
				<a href="{{ route('Get_Activity') }}" class="btn btn-danger text-light" style="margin-right: 20px;">&nbsp;بازگشت &nbsp;<i class="fas fa-arrow-circle-left"></i></a>
			</form>
		</div>
	</div>
@endsection