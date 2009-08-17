<?php defined('SYSPATH') or die('No direct script access.');

abstract class Filter_Base {
	
	protected $_field_names		= array();
	
	protected $_on_events 		= array('*');
	
	protected $_has_run			= FALSE;
	
	/**
	 * This method should be implemented in a subclass.  It is the only one that must be.
	 *
	 * @access public
	 * @param  void	
	 * @return void
	 * 
	 **/
	
	abstract public function filter($candidate);
	
	
	/**
	 * __construct
	 *
	 * @access public
	 * @param  void	
	 * @return void
	 * 
	 **/
	
	public function __construct() 
	{
		$this->_field_name = func_get_args();
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
		if (! in_array($field_name, $this->_field_names))
		{
			$this->_field_names[] = $field_name;
		}
		
		return $this;
	}
	
	
	/**
	 * for_fields
	 *
	 * @access public
	 * @param  void	
	 * @return void
	 * 
	 **/
	
	public function for_fields() 
	{
		$field_names = func_get_args();
		$this->_field_name = array_merge($this->_field_names, $field_names);
		
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
	 * execute
	 *
	 * @access public
	 * @param  void	
	 * @return void
	 * 
	 **/
	
	public function execute($candidate, $event = '*') 
	{
		if (in_array($event, $this->_on_events) OR in_array('*', $this->_on_events))
		{
			$this->_has_run = TRUE;
			
			foreach ($this->_field_names as $field_name) 
			{
				//get and filter the field data
				$field_data = $this->filter($candidate->get($field_name));
				$candidate->set($field_name, $field_data);
			}
		}
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