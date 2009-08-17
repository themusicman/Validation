<?php defined('SYSPATH') or die('No direct script access.');

class Specification_Alpha extends Specification_Base {
	
	
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
		$candidate = (string) $candidate;

		if ($this->_utf8 === TRUE)
		{
			return (bool) preg_match('/^\pL++$/uD', $candidate);
		}
		else
		{
			return ctype_alpha($candidate);
		}
	} 	
}

?>