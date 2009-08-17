<?php defined('SYSPATH') or die('No direct script access.');

class Specification_Alpha_Dash extends Specification_Base {
	
	
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
		if ($this->_utf8 === TRUE)
		{
			$regex = '/^[-\pL\pN_]++$/uD';
		}
		else
		{
			$regex = '/^[-a-z0-9_]++$/iD';
		}

		return (bool) preg_match($regex, $candidate);
		
	} 
	
	
}

?>