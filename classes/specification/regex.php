<?php defined('SYSPATH') or die('No direct script access.');

class Specification_Regex extends Specification_Base {
	
	protected $_regex				= NULL;
	
	/**
	 * __construct
	 *
	 * @access public
	 * @param  void	
	 * @return void
	 * 
	 **/
	
	public function __construct($regex = NULL) 
	{
		$this->_regex = $regex;
	} 
	
	
	
	/**
	 * is_satisfied_by
	 *
	 * @access public
	 * @param  mixed	the parameter to be tested	
	 * @return boolean
	 * 
	 **/
	
	public function is_satisfied_by($candidate) 
	{
		return (bool) preg_match($this->_regex, (string) $candidate);
	} 
	
	
}

?>