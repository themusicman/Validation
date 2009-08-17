<?php defined('SYSPATH') or die('No direct script access.');

class Specification_Min_Length extends Specification_Base {
	
	/**
	 * @var  integer  the minimum length the string must be
	 */
	protected $_minlen			= NULL;
	
	/**
	 * __construct
	 *
	 * @access public
	 * @param  $minlen
	 * @return void
	 * 
	 **/
	
	public function __construct($minlen = NULL) 
	{
		$this->_minlen = $minlen;
	} 


	/**
	 * is_satisfied_by
	 *
	 * @access public
	 * @param  $candidate	the string to be tested
	 * @return boolean 
	 * 
	 **/
	
	public function is_satisfied_by($candidate) 
	{
		return UTF8::strlen($candidate) >= $this->_minlen;
		
	} 
	
}

?>