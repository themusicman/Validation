<?php defined('SYSPATH') or die('No direct script access.');

class Specification_Single_Field {

	protected $_field_name			= NULL;
	
	protected $_value_specification = NULL;
	
	
	public function __construct($value_specification, $field_name = NULL)
	{
		$this->_value_specification = $value_specification;
		
		if ($field_name !== NULL)
		{
			$this->_field_name = $field_name;
		}
	}
	
	/**
	 * for_field
	 *
	 * @access public
	 * @param  void	
	 * @return void
	 * 
	 **/
	
	public function for_field($field_name) 
	{
		$this->_field_name = $field_name;
		
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
		return $this->_field_name;
		
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
		return $this->_value_specification->is_satisfied_by($candidate->get($this->_field_name));
		
	} 
	
}

?>