<?php defined('SYSPATH') or die('No direct script access.');

class Specification_Equal_Field {

	protected $_field_one		= NULL;
	
	protected $_field_two		= NULL;
	
	
	public function __construct($field_one, $field_two)
	{
		$this->_field_one = $field_one;

		$this->_field_two = $field_two;
	}
	
	
	/**
	 * validate
	 *
	 * @access public
	 * @param  void	
	 * @return void
	 * 
	 **/
	
	public function is_satisfied_by($candidate) 
	{
		return $candidate->get($this->_field_one) == $candidate->get($this->_field_two);
	}
	
	/**
	 * get_validated_field
	 *
	 * @access public
	 * @param  void	
	 * @return void
	 * 
	 **/
	
	public function get_validated_field() 
	{
		return FALSE;
	}
		
	
	
}// end of Specification_Equal_Field

?>