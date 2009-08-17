<?php defined('SYSPATH') or die('No direct script access.');

abstract class Specification_Base {
	
	/**
	 * is_satisfied_by
	 *
	 * @access public
	 * @param  void	
	 * @return void
	 * 
	 **/
	
	abstract public function is_satisfied_by($candidate);
	
}

?>