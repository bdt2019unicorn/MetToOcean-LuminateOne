<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataController extends MainController
{
    public function FullData(Request $request)
    {
    	$data = $request->session()->get("data"); 
    	echo json_encode($data);
    }

    public function RandomData(Request $request)
    {
    	$data = $request->session()->get("data"); 
    	$number_of_data = rand(1,count($data)); 

    	$count = 0; 
    	$random_data = array();
    	$random_index = array(); 

    	while($count<$number_of_data)
    	{
    		$random_number = rand(1, count($data)-1); 
    		if(!in_array($random_number, $random_index))
    		{
    			$object = $data[$random_number]; 
    			array_push($random_data, $object); 
    			array_push($random_index, $random_number); 
    			$count++; 
    		}
    	}
    	echo json_encode($random_data);
    }
}
