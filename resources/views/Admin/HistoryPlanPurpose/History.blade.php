@extends('Masters.Admin')

@section('title','تاریخچه')

@section('content')
	<div class="container" style="direction: rtl;padding: 20px 0px;">
		<div>
			<h2>تاریخچه نغمه ماندگار</h2>
			<br />
		</div>
		@if(session('success'))
			<div id="ErorrDiv" class="alert alert-success" >{{ session('success') }}</div>
		@elseif(session('error'))
			<div id="ErorrDiv" class="alert alert-danger" >{{ session('error') }}</div>
		@endif
		@if(count($errors)>0)
			<div id="ErorrDiv" class="alert alert-danger" >
				@foreach($errors->all() as $val)
					{{ $val }}
				@endforeach
			</div>
		@endif
		<form id="HistoryForm" class="col-12" action="" method="post">
			{{ csrf_field() }}
			<div class="bg-success text-light col-12 rounded-top" style="font-size:20px;height:50px;padding-top: 7px">تاریخچه</div>
			<textarea id="History_data" name="History_data" class="col-12 card" style="height:450px;text-align: right;resize: none;">{{ $History[0]['attributes']['hpp_data'] }}</textarea>
			<div style="margin-top: 20px">
				<button name="send_data" class="btn btn-info">به روز رسانی</button>
			</div>
		</form>
	</div>
@endsection()