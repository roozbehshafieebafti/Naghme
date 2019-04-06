@extends('Masters.Admin')
@section('title','بیانیه | زیر بیانیه')

@section('content')
	<div class="container" style="direction: rtl;padding: 20px 0px;">
		<h2>{{ $StatementsTitle[0]['attributes']['set_title'] }}</h2>
		<br />
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
		
		<div>
			@if(count($StatementsList)>0)
				<table class="table border table-hover">
					<thead>
						<tr class="bg-success text-light">
							<th>لیست</th>
							<th class="text-center" >عملیات</th>
						</tr>
					</thead>
					<tbody>
						@foreach($StatementsList as $Value)
							<tr>
								<td>{{ $Value->sel_description }}</td>
								<td class="text-center" >
									<span>
										<a href=" {{ route('Edit_statements_List',$Value->id) }} " data-toggle="tooltip" data-placement="top" title="ویرایش" ><i class="far fa-edit"></i></a>
									</span>
									&nbsp;&nbsp;&nbsp;&nbsp;
									<span>
										<a href=" {{ route('Delete_Statements_List',$Value->id) }} " data-toggle="tooltip" data-placement="top" title="حذف"><i class="fas fa-trash-alt"></i></a>
									</span>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			@else
				<div class="alert alert-warning">
					تا کنون زیرمجموعه ای برای این بیانیه ثبت نشده است
				</div>
			@endif
		</div>
		<div>
			<a href="{{ route('Create_New_Statement',$id) }}" class="btn btn-primary text-light" style="margin-right: 20px;">&nbsp; زیر بیانیه جدید &nbsp;<i class="fas fa-plus-circle"></i></a>
			<a href="{{ route('Statements_Title') }}" class="btn btn-danger text-light" style="margin-right: 20px;">&nbsp;بازگشت &nbsp;<i class="fas fa-arrow-circle-left"></i></a>
		</div>
	</div>
@endsection