@extends('Masters.Main')

@section('title','منشور اخلاقی')

@section('content')
    <div style="direction: rtl" class="container-fluid">
        <div class="Statemants container mt-3">
            <h3 id="statement">بیانیه‌ها</h3>
            <div class="">
                <ul class="alert alert-danger">
                    @foreach ($Ethics as $key => $item)
                        <li class="mt-2">
                            {{ $key }}
                        </li>
                        <ol class="">
                            @foreach ($item as $Colection)
                                    <?php 
                                        if($Colection == '') continue;
                                        echo '<li>'.$Colection.'</li>';
                                    ?>
                            @endforeach
                        </ol>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection