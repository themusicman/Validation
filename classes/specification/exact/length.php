<?php defined('SYSPATH') or die('No direct script access.');

class Specification_Exact_Length extends Specification_Base {
	
	/**
	 * @var  integer  the exact length the string must be
	 */
	protected $_exactlen			= NULL;
	
	/**
	 * __construct
	 *
	 * @access public
	 * @param  $exactlen
	 * @return void
	 * 
	 **/
	
	public function __construct($exactlen = NULL) 
	{
		$this->_exactlen = $exactlen;
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
		return UTF8::strlen($candidate) === $this->_exactlen;
	} 
}

?>