<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('questions')->insert([
            'question_text' => '0+1',
            "answer1" => "1",
            "answer2" => "2",
            "answer3" => "3",
            "answer4" => "4",
            "correct_answer" => "1",
            "question_level" => "easy",
            "user_id" => 1
        ]);  
        DB::table('questions')->insert([
            'question_text' => '1+1',
            "answer1" => "1",
            "answer2" => "2",
            "answer3" => "3",
            "answer4" => "4",
            "correct_answer" => "2",
            "question_level" => "easy",
            "user_id" => 1
        ]);    
        DB::table('questions')->insert([
            'question_text' => '2+1',
            "answer1" => "1",
            "answer2" => "2",
            "answer3" => "3",
            "answer4" => "4",
            "correct_answer" => "3",
            "question_level" => "easy",
            "user_id" => 1
        ]);      
        DB::table('questions')->insert([
            'question_text' => '2+0',
            "answer1" => "1",
            "answer2" => "2",
            "answer3" => "3",
            "answer4" => "4",
            "correct_answer" => "2",
            "question_level" => "easy",
            "user_id" => 1
        ]);      
        DB::table('questions')->insert([
            'question_text' => '3+1',
            "answer1" => "1",
            "answer2" => "2",
            "answer3" => "3",
            "answer4" => "4",
            "correct_answer" => "4",
            "question_level" => "easy",
            "user_id" => 1
        ]);      
        DB::table('questions')->insert([
            'question_text' => '4+2',
            "answer1" => "1",
            "answer2" => "5",
            "answer3" => "3",
            "answer4" => "4",
            "correct_answer" => "2",
            "question_level" => "easy",
            "user_id" => 1
        ]);      
        DB::table('questions')->insert([
            'question_text' => '5+1',
            "answer1" => "1",
            "answer2" => "2",
            "answer3" => "6",
            "answer4" => "4",
            "correct_answer" => "3",
            "question_level" => "easy",
            "user_id" => 1
        ]);  
        DB::table('questions')->insert([
            'question_text' => '5-1',
            "answer1" => "1",
            "answer2" => "2",
            "answer3" => "6",
            "answer4" => "4",
            "correct_answer" => "4",
            "question_level" => "medium",
            "user_id" => 1
        ]);   
        DB::table('questions')->insert([
            'question_text' => '5-2',
            "answer1" => "1",
            "answer2" => "2",
            "answer3" => "3",
            "answer4" => "4",
            "correct_answer" => "3",
            "question_level" => "medium",
            "user_id" => 1
        ]);   
        DB::table('questions')->insert([
            'question_text' => '5-3',
            "answer1" => "1",
            "answer2" => "2",
            "answer3" => "3",
            "answer4" => "4",
            "correct_answer" => "2",
            "question_level" => "medium",
            "user_id" => 1
        ]);    
        DB::table('questions')->insert([
            'question_text' => '5-4',
            "answer1" => "1",
            "answer2" => "2",
            "answer3" => "3",
            "answer4" => "4",
            "correct_answer" => "1",
            "question_level" => "medium",
            "user_id" => 1
        ]);     
        DB::table('questions')->insert([
            'question_text' => '50-10',
            "answer1" => "1",
            "answer2" => "2",
            "answer3" => "3",
            "answer4" => "40",
            "correct_answer" => "4",
            "question_level" => "medium",
            "user_id" => 1
        ]); 
        DB::table('questions')->insert([
            'question_text' => '40-10',
            "answer1" => "1",
            "answer2" => "2",
            "answer3" => "30",
            "answer4" => "40",
            "correct_answer" => "3",
            "question_level" => "medium",
            "user_id" => 1
        ]);   
        DB::table('questions')->insert([
            'question_text' => '20-10',
            "answer1" => "10",
            "answer2" => "2",
            "answer3" => "3",
            "answer4" => "40",
            "correct_answer" => "1",
            "question_level" => "medium",
            "user_id" => 1
        ]);         
        DB::table('questions')->insert([
            'question_text' => '20*10',
            "answer1" => "200",
            "answer2" => "2",
            "answer3" => "3",
            "answer4" => "40",
            "correct_answer" => "1",
            "question_level" => "hard",
            "user_id" => 1
        ]);      
        DB::table('questions')->insert([
            'question_text' => '20*20',
            "answer1" => "200",
            "answer2" => "2",
            "answer3" => "3",
            "answer4" => "400",
            "correct_answer" => "4",
            "question_level" => "hard",
            "user_id" => 1
        ]);      
        DB::table('questions')->insert([
            'question_text' => '30*20',
            "answer1" => "200",
            "answer2" => "2",
            "answer3" => "3",
            "answer4" => "600",
            "correct_answer" => "4",
            "question_level" => "hard",
            "user_id" => 1
        ]);     
        DB::table('questions')->insert([
            'question_text' => '30*30',
            "answer1" => "200",
            "answer2" => "900",
            "answer3" => "3",
            "answer4" => "600",
            "correct_answer" => "2",
            "question_level" => "hard",
            "user_id" => 1
        ]);    
        DB::table('questions')->insert([
            'question_text' => '300*30',
            "answer1" => "200",
            "answer2" => "9000",
            "answer3" => "3",
            "answer4" => "600",
            "correct_answer" => "2",
            "question_level" => "hard",
            "user_id" => 1
        ]);    
        DB::table('questions')->insert([
            'question_text' => '30*2',
            "answer1" => "200",
            "answer2" => "900",
            "answer3" => "60",
            "answer4" => "600",
            "correct_answer" => "3",
            "question_level" => "hard",
            "user_id" => 1
        ]);    
        DB::table('questions')->insert([
            'question_text' => '40*2',
            "answer1" => "80",
            "answer2" => "900",
            "answer3" => "3",
            "answer4" => "600",
            "correct_answer" => "1",
            "question_level" => "hard",
            "user_id" => 1
        ]);        
    }
}
