<?php defined('SYSPATH') or die('No direct script access.');

class Specification_Decimal extends Specification_Base {
	
	
	protected $_places			= 2;
	
	/**
	 * __construct
	 *
	 * @access public
	 * @param  
	 * @return void
	 * 
	 **/
	
	public function __construct($places = 2) 
	{
		$this->_places = $places;
		
	} 
	
	
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

		return (bool) preg_match('/^[0-9]+'.preg_quote($decimal).'[0-9]{'.(int) $this->_places.'}$/', $candidate);
	} 
	
	
}

?>