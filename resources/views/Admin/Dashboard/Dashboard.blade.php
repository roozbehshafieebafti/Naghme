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
                    @foreach ($users as $item)
                        <tr style="font-size:14px;">
                            <td>{{ $item['attributes']['name'] }}</td>
                            <td>{{ $item['attributes']['family'] }}</td>
                            <td>{{ $item['attributes']['email'] }}</td>
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
    </div>
@endsection