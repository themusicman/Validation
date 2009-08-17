<?php defined('SYSPATH') or die('No direct script access.');


class Validation_Coordinator {

	protected $_data				= NULL;
	
	protected $_errors				= array();
	
	
	public function __construct($data=array())
	{
		$this->_data = new Validation_Data($data);
	}
	
	
	/**
	 * get
	 *
	 * @access public
	 * @param  void	
	 * @return void
	 * 
	 **/
	
	public function get($key) 
	{
		return $this->_data->get($key);
	}
	
	
	/**
	 * set_raw
	 *
	 * @access public
	 * @param  void	
	 * @return void
	 * 
	 **/
	
	public function set($key, $value) 
	{
		$this->_data->set($key, $value);
	}
	
	/**
	 * add_error
	 *
	 * @access public
	 * @param  void	
	 * @return void
	 * 
	 **/
	
	public function add_error($key, $error_message, $message_values) 
	{
		$message_values = array_merge(array(':label' => $key), $message_values);
		
		$this->_errors[$key] = __($error_message, $message_values);
	} 
	
	
	/**
	 * get_errors
	 *
	 * @access public
	 * @param  void	
	 * @return void
	 * 
	 **/
	
	public function get_errors() 
	{
		return $this->_errors;
	} 
	
	/**
	 * get_error
	 *
	 * @access public
	 * @param  void	
	 * @return void
	 * 
	 **/
	
	public function get_error($field_name) 
	{
		return (array_key_exists($field_name, $this->_errors)) ? $this->_errors[$field_name] : NULL;
	} 
	
	
	/**
	 * as_array
	 *
	 * @access public
	 * @param  void	
	 * @return void
	 * 
	 **/
	
	public function as_array() 
	{
		return $this->_data->as_array();
	} 
	
	
}

?>