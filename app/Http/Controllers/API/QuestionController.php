<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Models\Question;

class QuestionController extends BaseController
{
    public function getRandomQuestion() {
        try {
            $questions1=Question::where('question_level','easy')->inRandomOrder()->take(6)->get();
            $questions2=Question::where('question_level','medium')->inRandomOrder()->take(6)->get();
            $questions3=Question::where('question_level','hard')->inRandomOrder()->take(5)->get();
            $questions=$questions1->merge($questions2)->merge($questions3);
            return $this->SendResponse($questions, 'Questions is retrieved successfully');
        } catch (\Exception $th) {
            return $this->SendError('Error',$th->getMessage());
        } 
    }

    public function store(Request $request) {
        try {   
            //$user_id = Auth::id();
            $user_id = 1;
            $input = $request->all();
            $validator = Validator::make($input,[
                'question_text'=>'required|unique:questions,question_text',
                'answer1'=>'required',
                'answer2'=>'required',
                'answer3'=>'required',
                'answer4'=>'required',
                'correct_answer' => ['required',Rule::in(['1','2','3','4'])],
                'question_level' => ['required',Rule::in(['easy','medium', 'hard'])]
            ]);

            if( $validator->fails()) {
                return $this->SendError('Validate Error', $validator->errors()); 
            }
            else {
                    $question=Question::create([
                        'question_text'=>$request->question_text,
                        'answer1'=>$request->answer1,
                        'answer2'=>$request->answer2,
                        'answer3'=>$request->answer3,
                        'answer4'=>$request->answer4,
                        'correct_answer'=>$request->correct_answer,
                        'question_level'=>$request->question_level,
                        'user_id'=>1
                    ]);
                    return $this->SendResponse($question, 'Question is created successfully');
            }
        } catch (\Exception $th) {           
            return $this->SendError('Error',$th->getMessage());
        }
    }
}
