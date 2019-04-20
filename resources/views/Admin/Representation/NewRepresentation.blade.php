@extends('Masters.Admin')

@section('title','نمایندگی‌ جدید')

@section('content')
	<div class="container" style="direction: rtl;padding: 20px 0px;">
		<h2>نمایندگی‌ جدید</h2>
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
				    <label for="exampleInputEmail1">نمایندگی:‌</label>
				    <input type="text" name="New_Representation" class="form-control text-left"  >
				  </div>
				
				<button class="btn btn-success">ثبت نمایندگی‌</button>
			</form>
		</div>
	</div>
@endsection