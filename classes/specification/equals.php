<?php defined('SYSPATH') or die('No direct script access.');

class Specification_Equals extends Specification_Base {
	
	
	protected $_item_to_equal			= NULL;
	
	/**
	 * __construct
	 *
	 * @access public
	 * @param  
	 * @return void
	 * 
	 **/
	
	public function __construct($item_to_equal = NULL) 
	{
		$this->_item_to_equal = $item_to_equal;
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
		return $candidate == $this->_item_to_equal;
	} 	
}

?>