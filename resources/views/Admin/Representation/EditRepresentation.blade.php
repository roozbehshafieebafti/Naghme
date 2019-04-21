@extends('Masters.Admin')

@section('title','ویرایش نمایندگی')

@section('content')
	<div class="container" style="direction: rtl;padding: 20px 0px;">
		<h2>ویرایش نمایندگی</h2>
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
				    <input value=" {{ $Representation['attributes']['representation_title'] }} " type="text" name="New_Representation" class="form-control text-left"  >
				  </div>
				
				<button class="btn btn-success">ویرایش</button>
			</form>
		</div>
	</div>
@endsection