@extends('Masters.Admin')

@section('title','ویرایش آئین نامه')

@section('content')
	<div class="container" style="overflow: hidden;padding: 20px 0">
		<h2>ویرایش آئین نامه</h2>
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
			<form class="form" method="post" action="" style="padding: 20px 0">
				{{ csrf_field() }}
				<div class="form-group">
				    <label >:عنوان</label>
				    <input type="text" name="Regulation_Title" class="form-control text-left" value="{{ $EditableRecord->regulations_title }}">
				</div>
				<div class="form-group">
				    <label >:توضیحات</label>
				    <textarea style="resize:none;" type="text" name="Regulation_Description" class="form-control text-left" >{{ $EditableRecord->regulations_description }}</textarea>
				</div>
				<a href="{{ route('Get_Regulations') }}" class="btn btn-danger text-light" style="margin-right: 20px;">&nbsp;بازگشت &nbsp;<i class="fas fa-arrow-circle-left"></i></a>
				<button type="submit" class="btn btn-success">ثبت آئین نامه</button>
			</form>
		</div>
	</div>
@endsection