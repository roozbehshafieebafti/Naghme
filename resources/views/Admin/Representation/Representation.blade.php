@extends('Masters.Admin')

@section('title','نمایندگی‌ها')

@section('content')
	<div class="container" style="direction: rtl;padding: 20px 0px;">
		<h2>نمایندگی‌ها</h2>
		<div>
            <div style="margin-top: 40px;">
                    @if(session('success'))
                        <div id="ErorrDiv" class="alert alert-success" >{{ session('success') }}</div>
                    @elseif(session('error'))
                        <div id="ErorrDiv" class="alert alert-danger" >{{ session('error') }}</div>
                    @elseif(session('warning'))
                        <div id="ErorrDiv" class="alert alert-warning" >{{ session('error') }}</div>
                    @endif
                    @if(count($Representation)>0)
                        <table class="table table-hover">
                            <thead>
                                <tr class="bg-success text-light">
                                    <th>نمایندگی‌</th>
                                    <th>تاریخچه‌</th>
                                    <th>نمودار سازمانی</th>
                                    <th>مسئولین</th>
                                    <th class="text-center ">عملیات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($Representation as $value)
                                    <tr>
                                        <td>{{ $value->representation_title }}</td>
                                        <td>
                                            <a href="{{route('Get_Representation_History',['id'=>$value->id])}}"><i class="fas fa-landmark"></i></a>
                                        </td>
                                        <td>
                                            <a href="{{ route('Get_Representation_Chart',['id'=>$value->id]) }}"><i class="fas fa-chart-line"></i></a>
                                        </td>
                                        <td>
                                            <a href=""><i class="fas fa-users"></i></a>
                                        </td>
                                        <td class="text-center">
                                            <span>
                                                <a href="{{ route('Edit_Regulation',$value->id ) }}" data-toggle="tooltip" data-placement="top" title="ویرایش" ><i class="far fa-edit"></i></a>
                                            </span>
                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                            <span>
                                                <a href="{{ route('Delete_Regulation',$value->id) }}" data-toggle="tooltip" data-placement="top" title="حذف" ><i class="fas fa-trash-alt"></i></a>
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="alert alert-warning">
                            تاکنون نمایندگی ثبت نشده است	
                        </div>
                    @endif
                </div>
                <div>
                    <a href=" {{ route('Create_Representation') }} " class="btn btn-primary text-light" style="margin-right: 20px;">&nbsp;نمایندگی جدید &nbsp;<i class="fas fa-plus-circle"></i></a>
                </div>
		</div>
	</div>
@endsection