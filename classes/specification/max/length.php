<?php defined('SYSPATH') or die('No direct script access.');

class Specification_Max_Length extends Specification_Base {
	
	/**
	 * @var  integer  the max length the string can be
	 */
	protected $_maxlen			= NULL;
	
	/**
	 * __construct
	 *
	 * @access public
	 * @param  $maxlen
	 * @return void
	 * 
	 **/
	
	public function __construct($maxlen = NULL) 
	{
		$this->_maxlen = $maxlen;
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
		return UTF8::strlen($candidate) <= $this->_maxlen;
	} 
}

?>