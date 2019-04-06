@extends('Masters.Admin')

@section('title','ویرایش زیرمجموعه')

@section('content')
	<div class="container" style="overflow: hidden;padding: 20px 0">
		<h2>ویرایش زیرمجموعه</h2>
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
				    <label >:زیرمجموعه</label>
				    <input type="text" name="New_Ethics_List" class="form-control text-left" value=" {{$EthicsList['attributes']['sel_description']}} ">
				    <small id="" class="form-text text-muted">بدون محدودیت کارکتری</small>
				  </div>
				<button class="btn btn-success">ویرایش زیرمجموعه</button>

			</form>
		</div>
	</div>
@endsection