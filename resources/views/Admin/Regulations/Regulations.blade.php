@extends('Masters.Admin')

@section('title','آئین نامه ها')

@section('content')
	<div class="container" style="direction: rtl;padding: 20px 0px;">
		<h2>آئین نامه ها</h2>

		<div style="margin-top: 40px;">
			@if(session('success'))
				<div id="ErorrDiv" class="alert alert-success" >{{ session('success') }}</div>
			@elseif(session('error'))
				<div id="ErorrDiv" class="alert alert-danger" >{{ session('error') }}</div>
			@elseif(session('warning'))
				<div id="ErorrDiv" class="alert alert-warning" >{{ session('error') }}</div>
			@endif
			@if(count($Regule)>0)
				<table class="table table-hover">
					<thead>
						<tr class="bg-success text-light">
							<th>آئین نامه</th>
							<th >توضیحات</th>
							<th class="text-center ">عملیات</th>
						</tr>
					</thead>
					<tbody>
						@foreach($Regule as $value)
							<tr>
								<td>{{ $value->regulations_title }}</td>
								<td>{{ $value->regulations_description }}</td>
								<td class="text-center">
									<span>
										<a href="{{ route('Edit_Regulation',$value->id ) }}" data-toggle="tooltip" data-placement="top" title="ویرایش" ><i class="far fa-edit"></i></a>
									</span>
									&nbsp;&nbsp;&nbsp;&nbsp;
									<span>
										<a href="{{ route('Delete_Regulation',$value->id) }}" data-toggle="tooltip" data-placement="top" title="حذف" ><i class="fas fa-trash-alt"></i></a>
									</span>
									&nbsp;&nbsp;&nbsp;&nbsp;
									<span>
										<a href="{{ config('app.url').$value->regulations_file_name }}" data-toggle="tooltip" target="_blank" data-placement="top" title="فایل" ><i class="fas fa-file-powerpoint"></i></a>
									</span>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			@else
				<div class="alert alert-warning">
					تاکنون آئین نامه ای ثبت نشده است	
				</div>
			@endif
		</div>
		<div>
			<a href=" {{ route('New_Regulations') }} " class="btn btn-primary text-light" style="margin-right: 20px;">&nbsp;آئین نامه جدید &nbsp;<i class="fas fa-plus-circle"></i></a>
		</div>
	</div>
@endsection