<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArrayController extends Controller
{
    public function findDuplicates(Request $request)
    {
        $input = $request->input('inputArray'); // Assuming the input is passed as a POST parameter named 'inputArray'
        
        $duplicates = [];
        $frequency = array_count_values($input);
        
        foreach ($frequency as $element => $count) {
            if ($count > 1) {
                $duplicates[] = $element;
            }
        }
        
        return view('duplicates', ['duplicates' => $duplicates]);
    }    
}
