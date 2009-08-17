<?php defined('SYSPATH') or die('No direct script access.');

class Specification_Alpha_Numeric extends Specification_Base {
	
	protected $_utf8			= FALSE;
	
	/**
	 * __construct
	 *
	 * @access public
	 * @param  
	 * @return void
	 * 
	 **/
	
	public function __construct($utf8 = FALSE) 
	{
		$this->_utf8 = $utf8;
		
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
		return ($this->_utf8 === TRUE)
			? (bool) preg_match('/^[\pL\pN]++$/uD', (string) $candidate)
			: ctype_alnum((string) $candidate); 
			
	} 
	
	
}

?>