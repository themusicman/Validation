<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Validation Library
 *
 * This based on the code from PHP In Action authored by Dagfinn Reiersol, Marcus Baker, and Chris Shifflett  
 * published by Manning.
 * 
 * @package Validation
 * @author Thomas Brewer
 **/

class Validate {

	protected $_coordinator				= NULL;
	
	protected $_pre_filters				= array();
	
	protected $_post_filters 			= array();
	
	protected $_validators				= array();
		
	protected $_has_validated 		= FALSE;
	
	//Constructor
	
	public function __construct($data)
	{
		$this->_coordinator = new Validation_Coordinator($data);
	}
	
	
	/**
	 * add_not_empty_validation
	 *
	 * @access public
	 * @param  void	
	 * @return void
	 * 
	 **/
	
	public function add_not_empty_validation() 
	{
		$validator = new Validator(
								new Specification_Single_Field(
										new Specification_Not_Empty
															  )
										 );
		
		$this->add_validator($validator);
		
		return $validator;
		
	} 
	
	/**
	 * add_regex_validation
	 *
	 * @access public
	 * @param  void	
	 * @return void
	 * 
	 **/
	
	public function add_regex_validation($regex = NULL) 
	{
		$validator = new Validator(
								new Specification_Single_Field(
										new Specification_Regex($regex)
															  )
										 );
	
		$this->add_validator($validator);
		
		return $validator;
		
	} 
	
	/**
	 * add_min_length_validation
	 *
	 * @access public
	 * @param  void	
	 * @return void
	 * 
	 **/
	
	public function add_min_length_validation($minlen) 
	{	
		$validator = new Validator(
								new Specification_Single_Field(
										new Specification_Min_Length($minlen)
															  )
										 );
		
		$this->add_validator($validator);
		
		return $validator;
		
	} 
	
	
	/**
	 * add_max_length_validation
	 *
	 * @access public
	 * @param  void	
	 * @return void
	 * 
	 **/
	
	public function add_max_length_validation($maxlen) 
	{	
		$validator = new Validator(
								new Specification_Single_Field(
										new Specification_Max_Length($maxlen)
															  )
										 );
		
		$this->add_validator($validator);
		
		return $validator;
		
	} 
	
	
	/**
	 * add_max_length_validation
	 *
	 * @access public
	 * @param  void	
	 * @return void
	 * 
	 **/
	
	public function add_exact_length_validation($exactlen) 
	{	
		$validator = new Validator(
								new Specification_Single_Field(
										new Specification_Max_Length($exactlen)
															  )
										 );
		
		$this->add_validator($validator);
		
		return $validator;
		
	} 
	
	/**
	 * add_url_validation
	 *
	 * @access public
	 * @param  void	
	 * @return void
	 * 
	 **/
	
	public function add_url_validation() 
	{	
		$validator = new Validator(
								new Specification_Single_Field(
										new Specification_Url
															  )
										 );
		
		$this->add_validator($validator);
		
		return $validator;
		
	} 
	
	/**
	 * add_phone_validation
	 *
	 * @access public
	 * @param  void	
	 * @return void
	 * 
	 **/
	
	public function add_phone_validation() 
	{	
		$validator = new Validator(
								new Specification_Single_Field(
										new Specification_Phone
															  )
										 );
		
		$this->add_validator($validator);
		
		return $validator;
		
	} 
	
	/**
	 * add_date_validation
	 *
	 * @access public
	 * @param  void	
	 * @return void
	 * 
	 **/
	
	public function add_date_validation() 
	{	
		$validator = new Validator(
								new Specification_Single_Field(
										new Specification_Date
															  )
										 );
		
		$this->add_validator($validator);
		
		return $validator;
		
	} 
	
	/**
	 * add_alpha_validation
	 *
	 * @access public
	 * @param  void	
	 * @return void
	 * 
	 **/
	
	public function add_alpha_validation($utf8 = FALSE) 
	{	
		$validator = new Validator(
								new Specification_Single_Field(
										new Specification_Alpha($utf8)
															  )
										 );
		
		$this->add_validator($validator);
		
		return $validator;
		
	} 
	
	/**
	 * add_alpha_numeric_validation
	 *
	 * @access public
	 * @param  void	
	 * @return void
	 * 
	 **/
	
	public function add_alpha_numeric_validation($utf8 = FALSE) 
	{
		$validator = new Validator(
								new Specification_Single_Field(
										new Specification_Alpha_Numeric($utf8)
															  )
										 );
		$this->add_validator($validator);
		
		return $validator;
		
	} 
	
	
	/**
	 * add_alpha_dash_validation
	 *
	 * @access public
	 * @param  void	
	 * @return void
	 * 
	 **/
	
	public function add_alpha_dash_validation($utf8 = FALSE) 
	{
		$validator = new Validator(
								new Specification_Single_Field(
										new Specification_Alpha_Dash($utf8)
															  )
										 );
		$this->add_validator($validator);
		
		return $validator;
		
	} 
	
	
	/**
	 * add_numeric_validation
	 *
	 * @access public
	 * @param  void	
	 * @return void
	 * 
	 **/
	
	public function add_numeric_validation() 
	{
		$validator = new Validator(
								new Specification_Single_Field(
										new Specification_Numeric
															  )
										 );
		$this->add_validator($validator);
		
		return $validator;
		
	}
	
	/**
	 * add_range_validation
	 *
	 * @access public
	 * @param  void	
	 * @return void
	 * 
	 **/
	
	public function add_range_validation($min, $max) 
	{
		$validator = new Validator(
								new Specification_Single_Field(
										new Specification_Range($min, $max)
															  )
										 );
		$this->add_validator($validator);
		
		return $validator;
		
	}
	
	
	/**
	 * add_decimal_validation
	 *
	 * @access public
	 * @param  void	
	 * @return void
	 * 
	 **/
	
	public function add_decimal_validation($places) 
	{
		$validator = new Validator(
								new Specification_Single_Field(
										new Specification_Decimal($places)
															  )
										 );
		$this->add_validator($validator);
		
		return $validator;
		
	}
	
	
	/**
	 * add_decimal_validation
	 *
	 * @access public
	 * @param  void	
	 * @return void
	 * 
	 **/
	
	public function add_color_validation() 
	{
		$validator = new Validator(
								new Specification_Single_Field(
										new Specification_Color
															  )
										 );
										
		$this->add_validator($validator);
		
		return $validator;
		
	}
	
	/**
	 * add_email_validation
	 *
	 * @access public
	 * @param  void	
	 * @return void
	 * 
	 **/
	
	public function add_email_validation($strict = FALSE) 
	{
		$validator = new Validator(
								new Specification_Single_Field(
										new Specification_Email($strict)
															  )
										 );
	
		$this->add_validator($validator);
		
		return $validator;
		
	} 
	
	/**
	 * add_callback_validation
	 *
	 * @access public
	 * @param  void	
	 * @return void
	 * 
	 **/
	
	public function add_equals_validation($item_to_equal) 
	{	
		$validator = new Validator(
								new Specification_Single_Field(
										new Specification_Equals($item_to_equal)
															  )
										 );
		
		$this->add_validator($validator);
		
		return $validator;
		
	}
	
	
	
	/**
	 * add_callback_validation
	 *
	 * @access public
	 * @param  void	
	 * @return void
	 * 
	 **/
	
	public function add_callback_validation($callback, $data=array()) 
	{	
		$validator = new Validator(
								new Specification_Single_Field(
										new Specification_Callback($callback, $data)
															  )
										 );
		
		$this->add_validator($validator);
		
		return $validator;
		
	} 
	
	/**
	 * add_pre_filter
	 *
	 * @access public
	 * @param  void	
	 * @return void
	 * 
	 **/
	
	public function add_pre_filter($pre_filter) 
	{
		return $this->_pre_filters[] = $pre_filter;
	}
	
	/**
	 * add_pre_filter
	 *
	 * @access public
	 * @param  void	
	 * @return void
	 * 
	 **/
	
	public function add_post_filter($post_filter) 
	{
		return $this->_post_filters[] = $post_filter;
	}
	
	
	
	/**
	 * add_validator
	 *
	 * @access public
	 * @param  void	
	 * @return void
	 * 
	 **/
	
	public function add_validator($validator) 
	{
		$this->_validators[] = $validator;
		
	} 
	
	
	/**
	 * validate
	 *
	 * @access public
	 * @param  void	
	 * @return void
	 * 
	 **/
	
	public function check($event_name = '*') 
	{
		foreach ($this->_pre_filters as $filter) 
		{
			$filter->execute($this->_coordinator, $event_name);
		}
		
		foreach ($this->_validators as $validator) 
		{
			$validator->validate($this->_coordinator, $event_name);
		}
		
		
		foreach ($this->_post_filters as $filter) 
		{
			$filter->execute($this->_coordinator, $event_name);
		}
		
		$this->_has_validated = TRUE;
		
		return $this->is_valid();
		
	} 
	
	
	/**
	 * is_valid
	 *
	 * @access public
	 * @param  void	
	 * @return void
	 * 
	 **/
	
	public function is_valid() 
	{
		if ($this->_has_validated === FALSE)
		{
			$this->validate();
		}
		
		return count($this->_coordinator->get_errors()) == 0;
		
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
		if ($this->is_valid() === FALSE)
		{
			return FALSE;
		}
		
		return $this->_coordinator->as_array();
		
	} 
	
	
	/**
	 * reset
	 *
	 * @access public
	 * @param  void	
	 * @return void
	 * 
	 **/
	
	public function reset() 
	{
		
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
		if ($this->is_valid())
		{
			return NULL;
		}

		return $this->_coordinator->get_errors();
	
	} 
	
	
	/**
	 * get_error
	 *
	 * @access public
	 * @param  $field_name	used to retrieve the error message for specific field
	 * @return string
	 * 
	 **/
	
	public function get_error($field_name) 
	{
		if ($this->is_valid())
		{
			return NULL;
		}
			
		return $this->_coordinator->get_error($field_name);
		
	}
	
	/**
	 * get_pre_filters
	 *
	 * @access public
	 * @param  void	
	 * @return void
	 * 
	 **/
	
	public function get_pre_filters() 
	{
		return $this->_pre_filters;
	}
	
	
	/**
	 * get_post_filters
	 *
	 * @access public
	 * @param  void	
	 * @return void
	 * 
	 **/
	
	public function get_post_filters() 
	{
		return $this->_post_filters;
	}
	
	
	/**
	 * get_validators
	 *
	 * @access public
	 * @param  void	
	 * @return void
	 * 
	 **/
	
	public function get_validators() 
	{
		return $this->_validators;
	}
	
	
}

?>