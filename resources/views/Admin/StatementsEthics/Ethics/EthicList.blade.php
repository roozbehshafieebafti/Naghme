@extends('Masters.Admin')

@section('title','لیست منشور اخلاقی')

@section('content')
	<div class="container" style="direction: rtl;padding: 20px 0px;">
		<h2>{{ $EthicTitle[0]['attributes']['set_title'] }}</h2>
		<br />
		<div>
			@if(session('success'))
				<div id="ErorrDiv" class="alert alert-success" >{{ session('success') }}</div>
			@elseif(session('error'))
				<div id="ErorrDiv" class="alert alert-danger" >{{ session('error') }}</div>
			@endif
			@if(count($EthicLists)>0)
			<table class="table border table-hover ">
				<thead>
					<tr class="bg-success text-light">
						<th class="">منشور</th>
						<th class="text-center">عملیات</th>
						
					</tr>
				</thead>
				<tbody>
					@foreach($EthicLists as $value)
						<tr>
							<td>{{ $value->sel_description }}</td>
							<td class="text-center" >
								<span>
									<a href=" {{ route('Edit_Ethics_List',$value->id) }} " data-toggle="tooltip" data-placement="top" title="ویرایش" ><i class="far fa-edit"></i></a>
								</span>
								&nbsp;&nbsp;&nbsp;&nbsp;
								<span>
									<a href=" {{ route('Delete_Ethics_List',$value->id) }} " data-toggle="tooltip" data-placement="top" title="حذف"><i class="fas fa-trash-alt"></i></a>
								</span>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
			@else
				<div class="alert alert-warning">
					تاکنون زیر مجموعه ای برای این منشور ثبت نشده است
				</div>
			@endif
			<div>
				<a href=" {{ route('New_Ethics_List',$id) }} " class="btn btn-primary text-light" style="margin-right: 20px;">&nbsp;زیر مجموعه جدید &nbsp;<i class="fas fa-plus-circle"></i></a>

				<a href="{{ route('Get_Ethics') }}" class="btn btn-danger text-light" style="margin-right: 20px;">&nbsp;بازگشت &nbsp;<i class="fas fa-arrow-circle-left"></i></a>
			</div>
		</div>
	</div>
@endsection