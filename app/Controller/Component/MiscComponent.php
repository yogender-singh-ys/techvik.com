<?php

App::uses('Component', 'Controller');


class MiscComponent extends Component {
	
	public function slugify($text)
	{
	  // replace non letter or digits by -
	  $text = preg_replace('~[^\pL\d]+~u', '-', $text);

	  // transliterate
	  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

	  // remove unwanted characters
	  $text = preg_replace('~[^-\w]+~', '', $text);

	  // trim
	  $text = trim($text, '-');

	  // remove duplicate -
	  $text = preg_replace('~-+~', '-', $text);

	  // lowercase
	  $text = strtolower($text);

	  if (empty($text)) {
	    return 'n-a';
	  }

	  return $text;
	}
	
	public function validateData($data,$emptyData=array(),$numericData=array(),$emailChecks=array())
	{
		$error_msg = array();
		// empty data check
		if(count($emptyData)>0){
			foreach ($data as $key => $value ){
			
			if( array_key_exists($key,$emptyData) && ( trim($data[$key]) == "" ) )
			{
				$error_msg[] = $emptyData[$key]." must have value.";
			}
		  }
		} 
		
	    // numeric data check 
	    if(count($numericData)>0){
			foreach ($data as $key => $value ){
			
			if( array_key_exists($key,$emptyData) && (!is_numeric($data[$key])))
			{
				$error_msg[] = $emptyData[$key]." must have numeric value";
			}
		   } 
		}
		
		// numeric data check 
		foreach ($emailChecks as $key => $value ){
			if (!filter_var($data[$key], FILTER_VALIDATE_EMAIL)) { 
			  $error_msg[] = $emailChecks[$key]." must have be valid.";
			}
		}
		
		return $error_msg;
	}
}

?>
