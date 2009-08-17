<?php defined('SYSPATH') or die('No direct script access.');

class Validator {

	protected $_specification			= NULL;
	
	protected $_message					= NULL;
	
	protected $_message_values			= array();
		
	protected $_on_events				= array('*');
	
	protected $_has_run					= FALSE;
	
	public function __construct($specification, $message=NULL)
	{
		$this->_specification = $specification;
		
		if ($message !== NULL)
		{
			$this->_message = $message;
		}
		
	}
	
	/**
	 * factory
	 *
	 * @access public
	 * @param  void	
	 * @return void
	 * 
	 **/
	
	public static function factory($specification, $field_name = '', $message = '') 
	{		
		$validator =  new Validator($specification);
		
		if ($field_name != '')
		{
			$validator->for_field($field_name);
		}
		
		if ($message != '')
		{
			$validator->with_message($message);
		}
		
		return $validator;
	} 
	
	/**
	 * with_message
	 *
	 * @access public
	 * @param  void	
	 * @return void
	 * 
	 **/
	
	public function with_message($message, $message_values = array()) 
	{
		$this->_message = $message;
		$this->_message_values = $message_values;
		
		return $this;
		
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
		$this->_specification->for_field($field_name);
		
		return $this;
		
	} 
	
	
	/**
	 * on
	 *
	 * @access public
	 * @param  void	
	 * @return void
	 * 
	 **/
	
	public function on() 
	{
		if (($position = array_search('*', $this->_on_events)) !== FALSE)
		{
			unset($this->_on_events[$position]);
		}
		
		$on_events = func_get_args();

		$this->_on_events = array_merge($this->_on_events, $on_events);
		
		return $this;
	}

	
	/**
	 * validate
	 *
	 * @access public
	 * @param  void	
	 * @return void
	 * 
	 **/
	
	public function validate($coordinator, $event = '*') 
	{

		if (in_array($event, $this->_on_events) OR in_array('*', $this->_on_events))
		{
			$this->_has_run = TRUE;
			
			if ($this->_specification->is_satisfied_by($coordinator))
			{
				return TRUE;
			}
			else
			{
				$coordinator->add_error($this->_specification->get_validated_field(), $this->_message, $this->_message_values);
				return FALSE;
			}
		}
		return FALSE;
	} 

	/**
	 * get_events
	 *
	 * @access public
	 * @param  void	
	 * @return void
	 * 
	 **/
	
	public function get_events() 
	{
		return $this->_on_events;
	}
	
	/**
	 * has_run
	 *
	 * @access public
	 * @param  void	
	 * @return void
	 * 
	 **/
	
	public function has_run() 
	{
		return $this->_has_run;
	}		
	
	
}

?>