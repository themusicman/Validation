<?php defined('SYSPATH') or die('No direct script access.');

class Filter_Trim extends Filter_Base {
	
	/**
	 * filter
	 *
	 * @access public
	 * @param  void	
	 * @return void
	 * 
	 **/
	
	public function filter($data) 
	{		
		$data = (string) $data;	
		return trim($data);
	}

}// end of Filter_Trim

?>