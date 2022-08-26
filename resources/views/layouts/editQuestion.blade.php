@extends('layouts.app')

@section('content')

<div class="row justify-content-center">

    <form action="{{ route('update', ['id'=>$question->id,'page'=>$page])}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-secondary"><h2> <b>تعديل سؤال</b></h2></div>
                @if (\Session::has('success'))
                    <div class="alert alert-success">
                        <p>{{\Session::get('success')}}</p>
                    </div>
                @endif
                @if (\Session::has('error'))
                    <div class="alert alert-danger">
                        <p>{{\Session::get('error')}}</p>
                    </div>
                @endif
                <br>  

                <div class="container">
                    <div class="row" style="margin-top:8px">
                        <div class="row mb-3">
                            <label class="col-md-2">رقم السؤال</label>
                            <label class="col-md-2">{{$question->id}}</label>
                        </div>
                    </div>   
                    <div class="row" style="margin-top:8px">
                        <div class="row mb-3">
                            <label class="col-md-2">مستوى السؤال</label>
                            <div class="col-md-4">
                                <select class="form-select" name =question_level aria-label="Default select example">
                                    @if ($question->question_level=="hard")
                                        <option value="easy">easy</option>
                                        <option value="medium">medium</option>
                                        <option selected value="hard">hard</option>
                                    @else 
                                        @if ($question->question_level=="medium")
                                            <option value="easy">easy</option>
                                            <option selected value="medium">medium</option>
                                            <option value="hard">hard</option>
                                        @else  {{-- $question->question_level=="easy"  --}}
                                            <option selectedvalue="easy">easy</option>
                                            <option value="medium">medium</option>
                                            <option value="hard">hard</option>
                                        @endif
                                    @endif
                                </select>                             
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="row mb-3">
                                <label class="col-md-2" for="exampleFormControlInput1">السؤال الأساسي</label>
                                @if (old('question_text')==null)
                                    <textarea class="col-md-9" name="question_text" id="question_text" placeholder="نص السؤال الأساسي" rows="3">{{$question->question_text}}</textarea>
                                @else
                                    <textarea class="col-md-9" name="question_text" id="question_text" placeholder="نص السؤال الأساسي" rows="3">{{old('question_text')}}</textarea>
                                @endif
                                @error('question_text')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>     
                            <div class="row">
                                <div class="col-md-2 mt-3">
                                    الخيارات
                                </div>
                                <div class="col-md-8 mt-3">
                                    الخيار
                                </div>
                                <div class="col-md-2 mt-3">
                                    الجواب
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-2 mt-3">
                                الأول
                                </div>
                                <div class="col-md-8 mt-3">
                                    <input type="text" class="form-control" name="answer1" id="answer1" value="{{$question->answer1}}" placeholder="نص الخيار الأول">
                                    @error('answer1')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="col-md-2 mt-4">
                                    <div class="form-check">                                       
                                        @if ($question->correct_answer=="1")
                                            <input checked="checked" class="form-check-input" type="radio" name="correct_answer" value="1">
                                        @else
                                            <input  class="form-check-input" type="radio" name="correct_answer" value="1">
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-2 mt-3">
                                الثاني
                                </div>
                                <div class="col-md-8 mt-3">
                                    <input type="text" class="form-control" name="answer2" id="answer2"value="{{$question->answer2}}" placeholder="نص الخيار الثاني">
                                    @error('answer2')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="col-md-2 mt-4">
                                    <div class="form-check">
                                        @if ($question->correct_answer=="2")
                                            <input checked="checked" class="form-check-input" type="radio" name="correct_answer" value="2">
                                        @else
                                            <input  class="form-check-input" type="radio" name="correct_answer" value="2">
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-2 mt-3">
                                الثالث
                                </div>
                                <div class="col-md-8 mt-3">
                                    <input type="text" class="form-control" name="answer3" id="answer3" value="{{$question->answer3}}" placeholder="نص الخيار الثالث">
                                    @error('answer3')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="col-md-2 mt-4">
                                    <div class="form-check">                                        
                                        @if ($question->correct_answer=="3")
                                            <input checked="checked" class="form-check-input" type="radio" name="correct_answer" value="3">
                                        @else
                                            <input  class="form-check-input" type="radio" name="correct_answer" value="3">
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-2 mt-3">
                                الرابع
                                </div>
                                <div class="col-md-8 mt-3">
                                    <input type="text" class="form-control" name="answer4" id="answer4" value="{{$question->answer4}}" placeholder="نص الخيار الرابع">
                                    @error('answer4')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="col-md-2 mt-4">
                                    <div class="form-check">
                                        @if ($question->correct_answer=="4")
                                            <input checked="checked" class="form-check-input" type="radio" name="correct_answer" value="4">
                                        @else
                                            <input  class="form-check-input" type="radio" name="correct_answer" value="4">
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @error('correct_answer')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mt-4">
                    <div class="form-group row mb-0 ">
                        <div class="col-md-12 text-center my-2">
                            <button type="submit" class="btn btn-outline-primary">
                                <a> <i class="fas fa-edit"> </i></a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</form>
@endsection
