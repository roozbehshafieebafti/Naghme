@extends('Masters.Admin')
@section('title','لیست وظایف')

@section('content')
	<div class="container" style="direction: rtl;padding: 20px 0">
		<h2>لیست وظایف    {{ $dutyTitle }}</h2>
		<div>
			<div id="Alert" class="alert alert-danger" style="display: none;">
				
			</div>
			@if(count($errors)>0)
				<div class="alert alert-danger" style="margin-top: 20px">
					@foreach($errors->all() as $val)
						{{ $val }}
					@endforeach
				</div>
			@endif
			<form class="form" method="post" action="" style="padding: 20px 0" enctype="multipart/form-data">
				{{ csrf_field() }}
				@if(count($Duties) > 0)
					<?php
						$i=0;
						foreach ($Duties as $value) {
							?>
							<input name="Duty_{{ $i }}" value="{{ $value->ad_authorities_duty }}" style="margin:5px" class="form-control col-8" />
							<?php
						$i++;
						}

						for($j=$i;$j<30;$j++)
						{
							?>
							<input name="Duty_{{ $j }}" style="margin:5px" class="form-control col-8" />
							<?php
						}
					?>
				@else
					<?php
						for($j=1;$j<=30;$j++)
						{
							?>
							<input name="Duty_{{ $j }}" style="margin:5px" class="form-control col-8" />
							<?php
						}
					?>
				@endif
				
			<button style="margin:20px 30px" id="Authorities_Submit" class="btn btn-success">ویرایش وظایف</button>
			<a href="{{ route('Get_Representation') }}" class="btn btn-danger text-light" style="margin-right: 20px;">&nbsp;بازگشت &nbsp;<i class="fas fa-arrow-circle-left"></i></a>
			</form>
		</div>
	</div>	
@endsection