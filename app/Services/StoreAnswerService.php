<?php

namespace App\Services;

use App\Models\Answer;
use App\Models\Paper;
use Illuminate\Support\Facades\Auth;

class StoreAnswerService{

    public $student_id, $paper_id, $question_id, $type, $answer, $answers;

    public function __construct()
    {
        $this->student_id = Auth::user()->id;
        $this->answers = new Answer();
    }
    
    public function store($answers){
        $paper_id = $answers['paper_id'];
        if (array_key_exists("mcq", $answers)) {
            $this->createOrUpdate($answers['mcq'], $paper_id, 'mcq');
        }
        if (array_key_exists("truefalse", $answers)) {
            $this->createOrUpdate($answers['truefalse'], $paper_id, 'truefalse');
        }
        if (array_key_exists("subjective", $answers)) {
            $this->createOrUpdate($answers['subjective'], $paper_id, 'subjective');
        }
    }   
    public function createOrUpdate(array $answers, int $paper_id, $type){
        foreach ($answers as $key => $answer) {
            $input['student_id'] = $this->student_id;
            $input['paper_id'] = $paper_id;
            $input['question_id'] = $key;
            $input['type'] = $type;
            $input['answer'] = $answer;
            $this->answers->create($input);
        }
    }
}