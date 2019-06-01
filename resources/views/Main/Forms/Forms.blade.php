@extends('Masters.Main')

@section('title','فرم ها')

@section('content')
    <div class="container-fluid">
        <div class="container mt-3">
            <h3>فرم‌ها</h3>
        </div>
        <div class="m-3">
            <div class="accordion" id="accordionExample">
                @if (count($Form)>0)
                    @foreach ($Form as $key=>$item)
                    <div class="card">
                            <div class="card-header" id="heading{{$key}} ">
                                <h2 class="mb-0">
                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse{{$key}}" aria-expanded="true" aria-controls="collapseOne">
                                        {{$item->form_title}}
                                    </button>
                                </h2>
                            </div>
                        
                            <div id="collapse{{$key}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">
                                    <div>
                                        {{$item->form_description}}
                                    </div>
                                    <div class="mt-3">
                                        <a class="btn btn-info" href=" {{ config('app.url').'/'.$item->form_file1}} ">فایل pdf</a>
                                        <?php
                                        echo  $item->form_file2 == null ?  '' :  '<a class="btn btn-info" href="'.config('app.url').'/'.$item->form_file2.'">فایل word</a>';
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="alert alert-danger  text-center h4 ">
                        فرمی برای نمایش وجود ندارد
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection