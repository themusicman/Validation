<?php defined('SYSPATH') or die('No direct script access.');

class Filter_Remove_Dashes extends Filter_Base {
	
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
		return preg_replace('/-/', '', (string) $data);
	}

}// end of Filter_Trim

?>