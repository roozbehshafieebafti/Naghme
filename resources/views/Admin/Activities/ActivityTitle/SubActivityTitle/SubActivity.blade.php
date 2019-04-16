@extends('Masters.Admin')
@section('title','زیر فعالیت‌ها')

@section('content')
	<div class="container" style="overflow: hidden;padding: 20px 0">
		<h2>زیر فعالیت‌های {{$title}}</h2>
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

		@if(count($subActivityTitle) > 0)
		<table class="table table-hover border" style="margin-top: 30px">
			    <thead class=" bg-success text-light">
				    <th scope="col" >عنوان فعالیت</th>
					<th scope="col" >توضیحات</th>
			    	<th scope="col" class="text-center">عملیات</th>
			    </thead>
			@foreach($subActivityTitle as $val)
				<tr >					
					<td >
						<a href="" style="text-decoration: none">
							{{ $val->sat_title }}
						</a>
					</td> 
					<td>
						{{ $val->sat_description }}
					</td>
					<td class="text-center">
						<span>
							<a href="{{ route('Edit_Sub_Activity',$val->id) }}" data-toggle="tooltip" data-placement="top" title="ویرایش" ><i class="far fa-edit"></i></a>
						</span>
						&nbsp;&nbsp;&nbsp;&nbsp;
						<span>
							<a href="{{ route('Delete_Sub_Activity',$val->id) }}" data-toggle="tooltip" data-placement="top" title="حذف"><i class="fas fa-trash-alt"></i></a>
						</span>
					</td>
				</tr>
			@endforeach			 
		</table>
		@else
			<div class="alert alert-warning" style="margin-top: 30px">
				تاکنون هیچ "زیر فعالیتی" ثبت نشده است
			</div>
		@endif
		<div>
			<br/>
			<a href="{{ route('New_Sub_Activity',$id) }}" class="btn btn-primary" style="margin-right: 20px"><i class="fas fa-plus-circle"></i>&nbsp;زیر فعالیت جدید</a>
			<a href="{{ route('Get_Activity') }}" class="btn btn-danger text-light" style="margin-right: 20px;">&nbsp;بازگشت &nbsp;<i class="fas fa-arrow-circle-left"></i></a>
		</div>
	</div>
@endsection