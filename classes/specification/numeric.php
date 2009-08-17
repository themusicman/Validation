<?php defined('SYSPATH') or die('No direct script access.');

class Specification_Numeric extends Specification_Base {
	
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
		// Get the decimal point for the current locale
		list($decimal) = array_values(localeconv());

		return (bool) preg_match('/^-?[0-9'.$decimal.']++$/D', (string) $candidate);
	} 
}

?>