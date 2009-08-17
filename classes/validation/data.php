<?php defined('SYSPATH') or die('No direct script access.');

class Validation_Data extends ArrayObject  {

	public function __construct($data=array())
	{
		ArrayObject::__construct($data, ArrayObject::ARRAY_AS_PROPS);	
	}
	
	
	/**
	 * Return the raw array that is being used for this object.
	 *
	 * @return  array
	 */	
	public function as_array()
	{
		return $this->getArrayCopy();
	}

	/**
	 * Get a variable from the configuration or return the default value.
	 *
	 * @param   string   array key
	 * @param   mixed    default value
	 * @return  mixed
	 */
	public function get($key, $default = NULL)
	{
		return $this->offsetExists($key) ? $this->offsetGet($key) : $default;
	}

	/**
	 * Sets a value in the configuration array.
	 *
	 * @param   string   array key
	 * @param   mixed    array value
	 * @return  mixed
	 */
	public function set($key, $value)
	{
		return $this->offsetSet($key, $value);
	}

	
}

?>