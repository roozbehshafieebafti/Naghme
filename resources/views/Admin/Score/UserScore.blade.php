@extends('Masters.Admin')
@section('title','مزایا و امتیازات')
@section('content')
	<div class="container" style="overflow: hidden;padding: 20px 0">
		<h2>مزایا و امتیازات</h2>
		@if(session('success'))
			<div class="alert alert-success" style="margin-top: 30px">
				{{ session('success') }}
			</div>
		@endif
		@if(session('error'))
			<div class="alert alert-danger" style="margin-top: 30px">
				{{ session('error') }}
			</div>
		@endif

		@if(count($UserScore) > 0)
		<table class="table table-hover border" style="margin-top: 30px">
			    <thead class=" bg-success text-light">
				    <th scope="col" >مزایا</th>
			    	<th scope="col" class="text-center">عملیات</th>
			    </thead>			 
			@foreach($UserScore as $val)
				<tr >
					<td >{{ $val->score_description }}</td>
					<td class="text-center">
						<span>
							<a href="{{ route('Edit_Score',$val->id) }}" data-toggle="tooltip" data-placement="top" title="ویرایش" ><i class="far fa-edit"></i></a>
						</span>
						&nbsp;&nbsp;&nbsp;&nbsp;
						<span>
							<a href="{{ route('Delete_Score',$val->id) }}" data-toggle="tooltip" data-placement="top" title="حذف"><i class="fas fa-trash-alt"></i></a>
						</span>
					</td>					
				</tr>
			@endforeach
		</table>
		@else
			<div class="alert alert-warning" style="margin-top: 30px">
				تاکنون مزایایی در سیستم ثبت نشده است
			</div>
		@endif
		<div>
			<br/>
			<a href="{{ route('New_Score') }}" class="btn btn-primary" style="margin-right: 20px"><i class="fas fa-plus-circle"></i>&nbsp; ایجاد امتیاز جدید</a>
		</div>
	</div>
@endsection