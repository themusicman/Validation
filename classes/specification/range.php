<?php defined('SYSPATH') or die('No direct script access.');

class Specification_Range extends Specification_Base {

	protected $_min			= NULL;
	
	protected $_max			= NULL;
	
	
	/**
	 * __construct
	 *
	 * @access public
	 * @param  void	
	 * @return void
	 * 
	 **/
	
	public function __construct($min = NULL, $max = NULL) 
	{
		$this->_min = $min;
		$this->_max = $max;
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
		return ($candidate >= $this->_min AND $candidate <= $this->_max);
	}
	
}

?>