<?php

namespace App\Classes;

class UnsetToken{

    public function __construct()
    {
        
    }
    public function unset(&$data){
        $unset = ['ConfirmPassword','q','_token'];
        foreach ($unset as $value) {
            if(array_key_exists ($value,$data))  {
                unset($data[$value]);
            }
        }
    }
}