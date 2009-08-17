<?php defined('SYSPATH') or die('No direct script access.');

class Specification_Callback extends Specification_Base {

	protected $_callback			= NULL;
	
	protected $_data				= NULL;
	
	
	/**
	 * __construct
	 *
	 * @access public
	 * @param  void	
	 * @return void
	 * 
	 **/
	
	public function __construct($callback = NULL, $data = NULL) 
	{
		$this->_callback = $callback;
		$this->_data = $data;
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
		if (is_string($this->_callback) AND strpos($this->_callback, '::') !== FALSE)
		{
			// Make the static callback into an array
			$this->_callback = explode('::', $this->_callback, 2);
		}
		
		if (is_array($this->_callback))
		{
			// Separate the object and method
			list ($object, $method) = $this->_callback;

			try 
			{	
				// Use a method in the given object
				$method = new ReflectionMethod($object, $method);
							
				if ( ! is_object($object))
				{
					// The object must be NULL for static calls
					$object = NULL;
				}

				$result = (bool) $method->invoke($object, $candidate, $this->_data);
				
				return $result;
				
			} 
			catch (ReflectionException $e)
			{
				/*
					TODO Throw a validation exception
				*/
				
				echo Kohana::debug($e);
			}
		}
	} 
}

?>