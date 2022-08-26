@extends('layouts.app')

@section('content')

<div class="row justify-content-center">

    <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-secondary"><h2> <b>إضافة سؤال</b></h2></div>
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
                            <label class="col-md-2">مستوى السؤال</label>
                            <div class="col-md-4">
                                <select class="form-select" name =question_level aria-label="Default select example">
                                    @if (old('question_level')=="hard")
                                        <option value="easy">easy</option>
                                        <option value="medium">medium</option>
                                        <option selected value="hard">hard</option>
                                    @else 
                                        @if (old('question_level')=="medium")
                                            <option value="easy">easy</option>
                                            <option selected value="medium">medium</option>
                                            <option value="hard">hard</option>
                                        @else {{-- $question->question_level=="easy"  --}}
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
                                <textarea class="col-md-9" name="question_text" id="question_text" placeholder="نص السؤال الأساسي" rows="3">{{ old('question_text') }}</textarea>
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
                                    <input type="text" class="form-control" name="answer1" id="answer1" value="{{ old('answer1') }}" placeholder="نص الخيار الأول">
                                    @error('answer1')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="col-md-2 mt-4">
                                    <div class="form-check">                                       
                                        @if (old('correct_answer')=="1")
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
                                    <input type="text" class="form-control" name="answer2" id="answer2" value="{{ old('answer2') }}" placeholder="نص الخيار الثاني">
                                    @error('answer2')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="col-md-2 mt-4">
                                    <div class="form-check">
                                        @if (old('correct_answer')=="2")
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
                                    <input type="text" class="form-control" name="answer3" id="answer3" value="{{ old('answer3') }}" placeholder="نص الخيار الثالث">
                                    @error('answer3')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="col-md-2 mt-4">
                                    <div class="form-check">                                        
                                        @if (old('correct_answer')=="3")
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
                                    <input type="text" class="form-control" name="answer4" id="answer4" value="{{ old('answer4') }}" placeholder="نص الخيار الرابع">
                                    @error('answer4')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="col-md-2 mt-4">
                                    <div class="form-check">
                                        @if (old('correct_answer')=="4")
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
                            <button type="submit" class="btn btn-outline-dark">
                                <a> <i class="fa fa-plus"> </i></a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</form>
<br>
<br>
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header text-secondary"><h2> <b>الأسئلة المضافة</b></h2></div>
            @if ($questions->count()>0)
                <table class="table table-striped table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">الرقم</th>
                                <th scope="col">اسم المستخدم</th>
                                <th scope="col">نص السؤال </th>
                                <th scope="col">الإجابة 1</th>
                                <th scope="col">الإجابة 2</th>
                                <th scope="col">الإجابة 3</th>
                                <th scope="col">الإجابة 4</th>
                                <th scope="col">الإجابة الصحيحة</th>
                                <th scope="col">مستوى السؤال</th>
                                <th scope="col"><pre>        </pre></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($questions as $question)  
                            <tr class="text-center">                         
                                <td scope="row">{{$question->id}} </td>
                                <td scope="row">{{$question->user->user_name}} </td>
                                <td scope="row">{{$question->question_text}}</td>
                                <td scope="row">{{$question->answer1}}</td>
                                <td scope="row">{{$question->answer2}}</td>
                                <td scope="row">{{$question->answer3}}</td>
                                <td scope="row">{{$question->answer4}}</td>
                                <td scope="row">{{$question->correct_answer}}</td>
                                <td scope="row">{{$question->question_level}}</td>
                                <td class="text-center">
                                    <div class="row" >
                                        <div class="col">
                                            <a href="{{route('edit', ['id'=>$question->id,'page'=>$questions->currentpage()])}}" > <i class="fas fa-edit"></i></a>
                                        </div>
                                        <div class="col">
                                            <a class="text-danger" href="{{route('delete',['id'=>$question->id])}}" > <i class="fas fa-trash-alt"></i></a>
                                        </div>
                                    </div>
                                </td>
                            </tr> 
                        @endforeach 
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center" class="text-secondary">
                        {!! $questions->links() !!}
                    </div>
                </div>
                @else
                    <div class="alert alert-info">
                        <p>لا يوجد أسئلة مضافة ضمن بنك الأسئلة الدينية</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
