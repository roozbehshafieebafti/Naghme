@extends('Masters.Admin')
@section('title','نتیجه')

@section('content')
    <div class="container" style="overflow: hidden;padding: 20px 0">
        <h2 class="pr-2 pl-2">نتیجه</h2>
        <div>
            <div class="pr-5 pl-5">
                <b>تعداد افراد شرکت کننده در پرسشنامه : {{ count($COUNT) }} نفر</b>
            </div>
            @if (count($COUNT)> 0)                            
                <div class="pr-5 pl-5 mt-5">
                    <table class="table table-striped">
                        <tr class="row">
                            <th class="col-9">سوال</th>
                            <th class="col-3 text-center">امتیاز</th>
                        </tr>
                        @foreach ($questions as $key => $item)
                            @if ($item[1]==1)  
                                <tr class="row">
                                    <td class="col-9">{{$item[0]}}</td>
                                    <td class="col-3 text-center">{{ $result[$key]["sum"]/$result[$key]["count"] }}</td>
                                </tr>
                            @endif                        
                        @endforeach
                    </table>
                </div>

                <div>
                    <div class="pr-5 pl-5 mt-5">
                        <b>پاسخ‌های تشریحی:</b>                        
                    </div>
                    <div class="pr-5 pl-5 mt-3">
                        <ul>
                            @foreach ($textAnswer as $item)
                                <li>{{ $item->answer }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection