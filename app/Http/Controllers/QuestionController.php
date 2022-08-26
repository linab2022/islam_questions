<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Question;

class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        try
        {
            $questions =Question::where('id','<>',null)
            ->orderbyDesc('id')
            ->paginate(10);

            return view('layouts.question')->with(['questions'=>$questions]);
        } catch (\Exception $th) {
           //
        }
    } 

    public function store(Request $request) {
        try {   
            $user_id = Auth::id();
            $input = $request->all();
            $validator = Validator::make($input,[
                'question_text'=>'required|unique:questions,question_text',
                'answer1'=>'required',
                'answer2'=>'required',
                'answer3'=>'required',
                'answer4'=>'required',
                'correct_answer'=>'required',
                'question_level'=>'required'                
            ]);

            if( $validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }
            else {
                    $addQuestion=Question::create([
                        'question_text'=>$request->question_text,
                        'answer1'=>$request->answer1,
                        'answer2'=>$request->answer2,
                        'answer3'=>$request->answer3,
                        'answer4'=>$request->answer4,
                        'correct_answer'=>$request->correct_answer,
                        'question_level'=>$request->question_level,
                        'user_id'=>$user_id
                    ]);
            return redirect()->route('home')->with('success','تم إضافة السؤال بنجاح');
            }
        } catch (\Exception $th) {           
            //
        }
    }

    public function edit($id,$page) {
        try
        {
            $question=Question::find($id);

            return view('layouts.editQuestion')->with(['question'=>$question,'page'=>$page]);
        } catch (\Exception $th) {
           // return redirect()->back()->with('error',$th->getMessage());
        }
    }

    public function update(Request $request, $id,$page)
    {
        try
        {
            $question=Question::find($id);
            $input = $request->all();
            $validator = Validator::make($input,[
                'question_text'=>'required',
                'answer1'=>'required',
                'answer2'=>'required',
                'answer3'=>'required',
                'answer4'=>'required',
                'correct_answer'=>'required',
                'question_level'=>'required',
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }
            else
            {
                $question->question_text=$input['question_text'];
                $question->answer1=$input['answer1'];
                $question->answer2=$input['answer2'];
                $question->answer3=$input['answer3'];
                $question->answer4=$input['answer4'];
                $question->correct_answer=$input['correct_answer'];
                $question->correct_answer=$input['correct_answer'];
                $question->question_level=$input['question_level'];
                $question->save();

                $questions =Question::where('id','<>',null)
                ->orderbyDesc('id')
                ->paginate(10);
                return redirect('/'.'?page='.$page)->with(['questions'=>$questions])->with('success','تم تعيل السؤال رقم '.$id.' بنجاح');
            }
        } catch (\Exception $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    public function delete( $id)
    {
        try
        {
            $question = Question::where('id' , $id )->first();
            $question->delete();
            return redirect()->back()->with('success','تم حذف السؤال رقم '.$id.' بنجاح');
        } catch (\Exception $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

}
