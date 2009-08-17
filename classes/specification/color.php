<?php defined('SYSPATH') or die('No direct script access.');

class Specification_Color extends Specification_Base {
	
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
		return (bool) preg_match('/^#?+[0-9a-f]{3}(?:[0-9a-f]{3})?$/iD', $candidate);
	} 	
}

?>