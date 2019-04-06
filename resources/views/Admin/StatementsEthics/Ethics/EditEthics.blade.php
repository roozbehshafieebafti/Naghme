@extends('Masters.Admin')

@section('title','ویریاش منشور اخلاقی')

@section('content')
	<div class="container" style="overflow: hidden;padding: 20px 0">
		<h2>ویرایش منشور</h2>
		<div>
			@if(count($errors)>0)
				<div class="alert alert-danger" style="margin-top: 20px">
					@foreach($errors->all() as $val)
						{{ $val }}
					@endforeach
				</div>
			@endif
			<form class="form" method="post" action="" style="padding: 20px 0">
				{{ csrf_field() }}
				 <div class="form-group">
				    <label >:منشور</label>
				    <input type="text" name="New_Ethics" class="form-control text-left" value=" {{ $EditableEthic['attributes']['set_title'] }} ">
				    <small id="" class="form-text text-muted">بدون محدودیت کارکتری</small>
				  </div>
				<a href="{{ route('Get_Ethics') }}" class="btn btn-danger text-light" style="margin-right: 20px;">&nbsp;بازگشت &nbsp;<i class="fas fa-arrow-circle-left"></i></a>
				<button class="btn btn-success">ثبت منشور</button>
			</form>
		</div>
	</div>
@endsection