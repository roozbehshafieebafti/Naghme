@extends('Masters.Admin')
@section('title','سوالات پرسشنامه')

@section('content')
	<div class="container" style="overflow: hidden;padding: 20px 0">
		<h2>سوالات پرسشنامه {{ count($questions)>0 ? "«".$questions[0]->Rname."»" : null }}</h2>
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

        </div>
            <div class="d-flex justify-content-end">
                <a class="btn btn-success text-white mr-4" href="{{route("Create_New_Questions" ,$id)}}">سوالات جدید</a>
                <a class="btn btn-danger text-white mr-4" href="{{route("Get_All_Reports")}}">بازگشت</a>
            </div>
        @if (count($questions)>0)
            <div class="mt-5">
                <table class="table table-striped border border-dark">
                    <thead class="bg-dark text-light">
                        <th class="text-center" style="width:100px">ردیف</th>
                        <th class="text-left">سوال</th>
                        <th class="text-center" style="width:100px">نوع</th>
                        <th class="text-center" style="width:100px">عملیات</th>
                    </thead>
                    <tbody>
                        @foreach ($questions as $key => $item)
                            <tr>                                
                                <td class="text-center" >{{$key+1}}</td>
                                <td class="text-left" > {{ $item->Qname}} </td>
                                <td class="text-center" > {{ $item->kind === 1 ? "تستی" : "تشریحی" }} </td>                                
                                <td class="text-center" >
                                    <span>
                                        <a href="{{ route('Edit_Questions',[$item->id , $item->questionnaire_id]) }}" data-toggle="tooltip" data-placement="top" title="ویرایش" ><i class="far fa-edit"></i></a>
                                    </span>
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    <span>
                                        <a href="{{ route('Delete_Questions',[$item->id , $item->questionnaire_id]) }}" data-toggle="tooltip" data-placement="top" title="حذف"><i class="fas fa-trash-alt"></i></a>
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="alert alert-warning mt-5">
                تاکنون سوالی ثبت نشده است
            </div>
        @endif    
	</div>
@endsection