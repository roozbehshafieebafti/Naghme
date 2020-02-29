@extends('Masters.Main')
@section('title', $name)
@section('content')
    <script>
        const QuestionnaireId="<?php echo $questionnaireId; ?>";
    </script>
    @include('Partials.GeneralHeader')
    <div class="Reports-main-container container">
        {{-- آیا پرسشنامه فعال است --}}
        @if ($Active && $Active[0]->activation== 1)
            {{-- نام پرسشنامه --}}
            <h2>{{ $name }}</h2>            
            <div id="report_content" class="p-3">
                <form onsubmit="reportSubmition(event,this,'<?php echo $questionnaireId; ?>')" action="{{ route('Questionnaire_Submition') }}" method="POST">
                    {{ csrf_field() }}
                    {{-- سوالات --}}
                    @foreach ($questions as $item)
                        <div class="report-question-main-container">
                            {{-- سوال --}}
                            <div class="">
                                {{-- المان سمت راست سوال --}}
                                <span class="Reports-question-element">
                                    &#9672;
                                </span>
                                <span class="Reports-question-text">
                                    <b>{{$item->name}}</b>
                                </span>
                            </div>
                            {{-- پاسخ‌ها --}}
                            @if ($item->kind == 1)                            
                                    <div class="container d-flex justify-content-center mt-2">
                                        <div class="report-radio-container">
                                            <span>عالی</span>
                                            <span>
                                                <input name="Q_{{$item->id}}" value="4" class="report-radio-btn" type="radio" name="radio{{$item->id}}" id="Q_{{$item->id}}">
                                            </span>
                                        </div>
                                        <div class="report-radio-container">
                                            <span>خوب</span>
                                            <span>
                                                <input name="Q_{{$item->id}}" value="3" class="report-radio-btn" type="radio" name="radio{{$item->id}}" id="Q_{{$item->id}}">
                                            </span>
                                        </div>
                                        <div class="report-radio-container">
                                            <span>متوسط</span>
                                            <span>
                                                <input name="Q_{{$item->id}}" value="2" class="report-radio-btn" type="radio" name="radio{{$item->id}}" id="Q_{{$item->id}}">
                                            </span>
                                        </div>
                                        <div class="report-radio-container">
                                            <span>ضعیف</span>
                                            <span>
                                                <input name="Q_{{$item->id}}" value="1" class="report-radio-btn" type="radio" name="radio{{$item->id}}" id="Q_{{$item->id}}">
                                            </span>
                                        </div>
                                    </div>                                
                            @else
                                <div class="container d-flex justify-content-center mt-2">                                        
                                    <textarea style="resize:off" class="col-10 textArea"  id="textArea{{$item->id}}"></textarea>                                        
                                </div>
                            @endif                        
                        </div> 
                    @endforeach
                    <div class="d-flex justify-content-center">
                        <button id="report_submit" class="btn btn-primary" style="width:100px" type="submit">ثبت نظر</button>
                    </div>
                </form>                
            </div>
        @else
        {{-- پرسشنامه غیر فعال --}}
            <div class="alert alert-info text-center p-3">
                با تشکر از حُسن نظر شما جهت شرکت در نظرسنجی، اما این نظرسنجی درحال حاضر فعال نمی‌باشد.
            </div>
        @endif
    </div>    
    @include('Partials.GeneralFooter')
    <script>
        const postUrl = "<?php echo route('Questionnaire_Submition') ?>";        
    </script>
@endsection