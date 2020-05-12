<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;

class MainController extends Controller
{
    public function __construct(Request $request)
    {
    	function ReceiveData($request)
    	{
    		if(!$request->session()->has('data'))
    		{
				$file_lines = file('public/metocean.txt');
				$base_properties = preg_split("/[\s]+/",trim($file_lines[1])); 

				$data = array();

				for ($index=2; $index <count($file_lines); $index++) 
				{ 
					$values = preg_split("/[\s]+/",trim($file_lines[$index])); 
					
					if(count($values)<count($base_properties))
					{
						break; 
					}

					$object = new \stdClass();

					$key = $base_properties[0]; 
					$object->$key = $values[0].' '.$values[1]; 

					for ($i=2; $i <count($values) ; $i++) 
					{ 
						$key = $base_properties[$i-1]; 
						$object->$key = $values[$i]; 
					}

					array_push($data, $object); 
				}

				$request->session()->put('data', $data);
    		} 
    	}

    	ReceiveData($request);

    }
}
