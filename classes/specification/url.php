<?php defined('SYSPATH') or die('No direct script access.');

class Specification_Url extends Specification_Base {
	
	/**
	 * is_satisfied_by
	 *
	 *
	 * @access public
	 * @param  string URL	
	 * @return void
	 * 
	 **/
	
	public function is_satisfied_by($candidate) 
	{
		return (bool) filter_var($candidate, FILTER_VALIDATE_URL, FILTER_FLAG_HOST_REQUIRED);

	} 
	
	
}

?>
