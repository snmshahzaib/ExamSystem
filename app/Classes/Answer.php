<?php

namespace App\Classes;


use App\Classes\UnsetToken;
use App\Models\AttemptExam;
use App\Models\Paper;
use App\Models\RegisterSubject;
use Illuminate\Support\Facades\Auth;

class Answer{

    public $student_id, $paper_id, $question_id, $type, $answer, $answers;

    public function __construct()
    {
        $this->student_id = Auth::user()->id;
        $this->answers = new AttemptExam();
    }
    
    public function store($request){
        if($request->isMethod('post')) {
            $data = $request->all();
            unset($data['_token']);
            $paper_id = $data['paper_id'];
            if (array_key_exists("mcq", $data)) {
                $this->createOrUpdate($data['mcq'], $paper_id, 'mcq', $request);
            }
            if (array_key_exists("truefalse", $data)) {
                $this->createOrUpdate($data['truefalse'], $paper_id, 'truefalse', $request);
            }
            if (array_key_exists("subjective", $data)) {
                $this->createOrUpdate($data['subjective'], $paper_id, 'subjective', $request);
            }
            $this->update($paper_id);
        }
    }
    public function update($id){
        $status = Paper::findOrFail($id);
        $status->update(["status" => "attempted"]);
    }
    public function createOrUpdate(array $data, int $paper_id, $type, $request){
        foreach ($data as $key => $answer) {
            $input['student_id'] = $this->student_id;
            $input['paper_id'] = $paper_id;
            $input['question_id'] = $key;
            $input['type'] = $type;
            $input['answer'] = $answer;
            if($request->isMethod('post')) {
                $this->answers->create($input);
            }
        }
      
    }
}