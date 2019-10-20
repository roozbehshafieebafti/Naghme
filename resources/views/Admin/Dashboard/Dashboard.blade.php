@extends('Masters.Admin')

@section('title','داشبورد')

@section('content')
    <div class="container">
        <div class="row">
            <table class="table col-6 mt-5 bg-white">
                <thead class="thead-dark">
                    <tr style="font-size:14px;">
                        <th scope="col">نام</th>
                        <th scope="col">نام‌خانوادگی</th>
                        <th scope="col">ایمیل</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($registerdUser as $item)
                        <tr style="font-size:14px;">
                            <td>{{ $item['name'] }}</td>
                            <td>{{ $item['family'] }}</td>
                            <td>{{ $item['email'] }}</td>
                        </tr>
                    @endforeach
                    @if (($count/$limit)>1)
                        <tr>
                            <td style="font-size:14px;"  colspan="3">
                                <div class="d-flex justify-content-between">
                                    <a href="{{route('Admin_Dashboard',1)}}"><i class="fas fa-step-forward"></i></a>
                                    <a href="{{route('Admin_Dashboard',($id-1>0 ? $id-1 : 1))}}"><i class="fas fa-chevron-right"></i></a>
                                    <span>{{$id .'   از   '.$pages }}</span>
                                    <a href="{{route('Admin_Dashboard',($id+1<=$pages ? $id+1 : $pages))}}"><i class="fas fa-chevron-left"></i></a>
                                    <a href="{{route('Admin_Dashboard',$pages)}}"><i class="fas fa-step-backward"></i></a>
                                </div>
                            </td>
                        </tr> 
                    @endif
                                   
                </tbody>
            </table>
        </div>
        <div style="height:50px">
            @if (session("success"))
                <div class="alert alert-success">
                    {{session("success")}}
                </div>
            @endif
        </div>
        <div>
            @if (count($comments)>0)
                <table class="table col-12 mt-5 table-striped">
                    <thead class="text-white text-center" style="background-color:#17a2b8">
                        <tr style="font-size:14px;">
                            <th scope="col">ردیف</th>
                            <th scope="col">نام</th>
                            <th scope="col">نام‌خانوادگی</th>
                            <th scope="col">فعالیت</th>
                            <th scope="col">دیدگاه</th>
                            <th scope="col">پاسخ</th>
                            <th scope="col">عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($comments as $key => $value)
                            <tr class="text-center"
                                style="font-size:15px;">
                                <td style="width :40px;">{{ $key+1 }}</td>
                                <td style="width :100px;">{{ $value->name }}</td>
                                <td style="width :100px;">{{ $value->family }}</td>
                                <td style="width :100px;">{{ $value->apst_title }}</td>
                                <td style="width :300px;">{{ $value->comment }}</td>
                                <form method="POST" action="{{ route("Check_Comment") }}" autocomplete="off">
                                    {{ csrf_field() }}
                                    <td style="width :300px;">
                                        <input type="text" name="answer" style="width:100%">
                                        <input style="display: none" name="id"  value="{{$value->id}}"/>
                                    </td>
                                    <td style="width :80px;">
                                        <span>
                                            <button 
                                                type="submit" 
                                                data-toggle="tooltip" 
                                                data-placement="top" 
                                                title="تایید"
                                                class="text-primary"
                                                style="border: none;background-color:inherit;cursor: pointer; width:16px;"
                                                >
                                            <i class="fas fa-check"></i>
                                        </button>
                                        </span>
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                        <span>
                                            <a href="{{route("Delete_Comment",$value->id)}}" data-toggle="tooltip" data-placement="top" title="حذف"><i class="fas fa-trash-alt"></i></a>
                                        </span>
                                    </td>
                                </form>
                            </tr>
                        @endforeach                                       
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection