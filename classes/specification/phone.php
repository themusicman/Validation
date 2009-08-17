<?php defined('SYSPATH') or die('No direct script access.');

class Specification_Phone extends Specification_Base {
	
	/**
	 * is_satisfied_by
	 *
	 * @access public
	 * @param  void	
	 * @return void
	 * 
	 **/
	
	public function is_satisfied_by($candidate) 
	{
		$lengths = array(7,10,11);

		// Remove all non-digit characters from the number
		$candidate = preg_replace('/\D+/', '', $candidate);

		// Check if the number is within range
		return in_array(strlen($candidate), $lengths);
	} 
}

?>