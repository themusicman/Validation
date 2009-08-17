<?php defined('SYSPATH') OR die('No direct access allowed.');

class UnitTest_Validate extends UnitTest_Case {

	public static $disabled = FALSE;

	public $setup_has_run = FALSE;


	public function setup()
	{
		$this->setup_has_run = TRUE;
	}
	
	
	/**
	 * test_notempty
	 *
	 * @access public
	 * @param  void	
	 * @return void
	 * 
	 **/
	
	public function test_not_empty() 
	{
		$data = new Validate(array('username' => 'testing123'));
		
		$data->add_not_empty_validation()
			->for_field('username')
			->with_message('The :label field cannot be empty.');
			
		$this->assert_true($data->check());
		
	} 
	
	
	/**
	 * test_regex
	 *
	 * @access public
	 * @param  void	
	 * @return void
	 * 
	 **/
	
	public function test_regex() 
	{
		
		$data = new Validate(array('username' => 'abc'));
		
		$data->add_regex_validation('/[a-z]/')
			->for_field('username')
			->with_message('The :label field contains invalid characters.');
			
		$this->assert_true($data->check());
		
		
	} 
	
	/**
	 * test_minlen
	 *
	 * @access public
	 * @param  void	
	 * @return void
	 * 
	 **/
	
	public function test_min_length() 
	{
		$data = new Validate(array('username' => 'testing123'));
		
		$data->add_min_length_validation(3)
			->for_field('username')
			->with_message('The :label field must be :len characters.', array(':len' => 3));
		
		$this->assert_true($data->check());

	} 
	
	
	/**
	 * test_maxlen
	 *
	 * @access public
	 * @param  void	
	 * @return void
	 * 
	 **/
	
	public function test_max_length() 
	{
		
		$data = new Validate(array('username' => 'abc'));
		
		$data->add_max_length_validation(3)
			->for_field('username')
			->with_message('The :label field must have :len characters.', array(':len' => 3));
	
		$this->assert_true($data->check());
		
	} 
	
	
	/**
	 * test_maxlen
	 *
	 * @access public
	 * @param  void	
	 * @return void
	 * 
	 **/
	
	public function test_exact_length() 
	{
		
		$data = new Validate(array('username' => 'abc'));
		
		$data->add_exact_length_validation(3)
			->for_field('username')
			->with_message('The :label field must be :len characters.', array(':len' => 3));
	
		$this->assert_true($data->check());
		
		
	} 
	
	/**
	 * test_url
	 *
	 * @access public
	 * @param  void	
	 * @return void
	 * 
	 **/
	
	public function test_url() 
	{
		
		$data = new Validate(array('url' => 'http://google.com'));
		
		$data->add_url_validation()
			->for_field('url')
			->with_message('The :label field must be valid url.');
	
		$this->assert_true($data->check());		
	} 
	
	/**
	 * test_phone
	 *
	 * @access public
	 * @param  void	
	 * @return void
	 * 
	 **/
	
	public function test_phone() 
	{
		
		$data = new Validate(array('phone' => '123-123-1234'));
		
		$data->add_phone_validation()
			->for_field('phone')
			->with_message('The :label field must be valid phone number.');
	
		$this->assert_true($data->check());
	} 
	
	
	/**
	 * test_date
	 *
	 * @access public
	 * @param  void	
	 * @return void
	 * 
	 **/
	
	public function test_date() 
	{
		
		$data = new Validate(array('date' => '12-01-09'));
		
		$data->add_date_validation()
			->for_field('date')
			->with_message('The :label field must be valid date.');
	
		$this->assert_true($data->check());
	} 
	
	
	/**
	 * test_alpha
	 *
	 * @access public
	 * @param  void	
	 * @return void
	 * 
	 **/
	
	public function test_alpha() 
	{
		
		$data = new Validate(array('alpha' => 'abc'));
		
		$data->add_alpha_validation()
			->for_field('alpha')
			->with_message('The :label field contains invalid characters.');
	
		$this->assert_true($data->check());
	} 
	
	/**
	 * test_alphanumeric
	 *
	 * @access public
	 * @param  void	
	 * @return void
	 * 
	 **/
	
	public function test_alphanumeric() 
	{

		$data = new Validate(array('username' => 'testing123'));
		
		$data->add_alpha_numeric_validation()
			->for_field('username')
			->with_message('The :label field contains invalid characters.');
		
		$this->assert_true($data->check());
	}
	
	/**
	 * test_alphadash
	 *
	 * @access public
	 * @param  void	
	 * @return void
	 * 
	 **/
	
	public function test_alphadash() 
	{
		$data = new Validate(array('alpha' => 'ab-c'));

		$data->add_alpha_dash_validation()
			->for_field('alpha')
			->with_message('The :label field contains invalid characters.');

		$this->assert_true($data->check());
		
	} 
	
	/**
	 * test_digit
	 *
	 * @access public
	 * @param  void	
	 * @return void
	 * 
	 **/
	
	public function test_digit() 
	{
		$data = new Validate(array('digit' => 1));

		$data->add_alpha_dash_validation()
			->for_field('digit')
			->with_message('The :label field contains invalid characters.');

		$this->assert_true($data->check());
		
	}
	
	
	/**
	 * test_numeric
	 *
	 * @access public
	 * @param  void	
	 * @return void
	 * 
	 **/
	
	public function test_numeric() 
	{
		$data = new Validate(array('numeric' => 1.00));

		$data->add_alpha_dash_validation()
			->for_field('numeric')
			->with_message('The :label field contains invalid characters.');

		$this->assert_true($data->check());
		
	}
	
	/**
	 * test_range
	 *
	 * @access public
	 * @param  void	
	 * @return void
	 * 
	 **/
	
	public function test_range() 
	{
		$data = new Validate(array('number' => 5));
		
		$min = 0;
		$max = 10;
		
		$data->add_range_validation($min, $max)
			->for_field('number')
			->with_message('The :label field must be between :min and :max.', array(':min' => $min, ':max' => $max));

		$this->assert_true($data->check());
		
	}
	
	/**
	 * test_decimal
	 *
	 * @access public
	 * @param  void	
	 * @return void
	 * 
	 **/
	
	public function test_decimal() 
	{
		$data = new Validate(array('number' => 5.012));
		
		$data->add_decimal_validation(3)
			->for_field('number')
			->with_message('The :label field must be a decimal.');

		$this->assert_true($data->check());
		
	}
	
	
	/**
	 * test_color
	 *
	 * @access public
	 * @param  void	
	 * @return void
	 * 
	 **/
	
	public function test_color() 
	{
		$data = new Validate(array('color' => '#333333'));
		
		$data->add_color_validation()
			->for_field('color')
			->with_message('The :label field must be a valid color.');

		$this->assert_true($data->check());
		
	}
	
	/**
	 * test_equals
	 *
	 * @access public
	 * @param  void	
	 * @return void
	 * 
	 **/
	
	public function test_equals() 
	{
		$data = new Validate(array('item' => '#333333'));
		
		$item = '#333333';
		$data->add_equals_validation($item)
			->for_field('item')
			->with_message('The :label field must be equal to :item.', array(':item' => $item));

		$this->assert_true($data->check());
		
	}
	
	/**
	 * test_callback
	 *
	 * @access public
	 * @param  void	
	 * @return void
	 * 
	 **/
	
	public function test_callback() 
	{
		$data = new Validate(array('username' => 'testing123'));
		
		$data->add_callback_validation(array($this, 'callback_test'))
			 ->for_field('username')
			 ->with_message('The :label field must be unique.');
		
		$this->assert_true($data->check());
	} 
	
	/**
	 * callback_test
	 *
	 * @access public
	 * @param  void	
	 * @return void
	 * 
	 **/
	
	public function callback_test($value, $data) 
	{		
		$usernames = array('testing', 'testing12');
		return (in_array($value, $usernames)) ? FALSE : TRUE;
	} 
	
	
	/**
	 * test_on_events
	 *
	 * @access public
	 * @param  void	
	 * @return void
	 * 
	 **/
	
	public function test_on_events() 
	{
		
		$specification = new Specification_Single_Field(new Specification_Alpha_Numeric);

		$validator = Validator::factory($specification)
						->for_field('username')
						->with_message('The :label contains invalid character.');
		
		$this->assert_equal(array('*'), $validator->get_events());

		
		$validator = Validator::factory($specification)
						->for_field('username')
						->with_message('The :label contains invalid character.')
						->on('test');
		
		$this->assert_equal(array('test'), $validator->get_events());
		
		
		$validator = Validator::factory($specification)
						->for_field('username')
						->with_message('The :label contains invalid character.')
						->on('update', 'test')
						->on('create');
		
		$this->assert_equal(array('update', 'test', 'create'), $validator->get_events());
		
		
	}
	
	
	/**
	 * test_pre_filters
	 *
	 * @access public
	 * @param  void	
	 * @return void
	 * 
	 **/
	
	public function test_pre_filters() 
	{
		
		$data = new Validate(array('item' => '  #333333'));
		
		$item = '#333333';
		
		$data->add_pre_filter(new Filter_Trim)
			 ->for_field('item');
		
		$data->add_equals_validation($item)
			 ->for_field('item')
			 ->with_message('The :label field must be equal to :item.', array(':item' => $item));
		
		$this->assert_true($data->check());
		
		foreach ($data->get_pre_filters() as $filter) 
		{
			$this->assert_true($filter->has_run());
		}
	}
	
	/**
	 * test_pre_filters_on_events
	 *
	 * @access public
	 * @param  void	
	 * @return void
	 * 
	 **/
	
	public function test_pre_filters_on_events() 
	{
		$data = new Validate(array('item' => '  #333333'));
		
		$item = '#333333';
		
		$data->add_pre_filter(new Filter_Trim)
			 ->for_field('item')
			 ->on('update');
		
		$data->add_equals_validation($item)
			 ->for_field('item')
			 ->with_message('The :label field must be equal to :item.', array(':item' => $item));
		
		$this->assert_false($data->check());
		
		$this->assert_true($this->did_all_validators_run(1, $data->get_validators()));
		
		//rerun the validators with the udpate event
		$data = new Validate(array('item' => '  #333333'));
		
		$item = '#333333';
		
		$data->add_pre_filter(new Filter_Trim)
			 ->for_field('item')
			 ->on('update');
		
		$data->add_equals_validation($item)
			 ->for_field('item')
			 ->with_message('The :label field must be equal to :item.', array(':item' => $item));
		
		$this->assert_true($data->check('update'));
		
		$this->assert_true($this->did_all_validators_run(1, $data->get_validators()));
	}
	
	
	/**
	 * test_post_filter
	 *
	 * @access public
	 * @param  void	
	 * @return void
	 * 
	 **/
	
	public function test_post_filter() 
	{
		
		//rerun the validators with the udpate event
		$data = new Validate(array('item' => '123-123-1234'));
		
		$item = '123-123-1234';
		
		$data->add_post_filter(new Filter_Remove_Dashes)
			 ->for_field('item');
		
		$data->add_equals_validation($item)
			 ->for_field('item')
			 ->with_message('The :label field must be equal to :item.', array(':item' => $item));
	
		$this->assert_true($data->check());
		
		$this->assert_true($this->did_all_validators_run(1, $data->get_validators()));
		
		foreach ($data->get_post_filters() as $filter) 
		{
			$this->assert_true($filter->has_run());
		}
		
		$data = $data->as_array();
		
		$this->assert_equal('1231231234', $data['item']);
		
		
	}
	
	/**
	 * _did_all_validator_run
	 *
	 * @access public
	 * @param  void	
	 * @return void
	 * 
	 **/
	
	public function did_all_validators_run($expected, $validators) 
	{
		$count = 0;		
		foreach ($validators as $validator) 
		{
			if ($validator->has_run())
			{
				$count++;
			}
		}
		return $expected == $count;
	}
	
	
	
	/**
	 * test_validator_factory
	 *
	 * @access public
	 * @param  void	
	 * @return void
	 * 
	 **/
	
	public function test_validator_factory() 
	{
		$data = array('username' => 'testing123');

		$data = new Validate($data);
		
		$specification = new Specification_Single_Field(new Specification_Alpha_Numeric);
		
		$validator = Validator::factory($specification)
						->for_field('username')
						->with_message('The :label contains invalid character.');
		
		
		$this->assert_instance($validator, 'Validator');
		
		$data->add_validator($validator);
		
		$this->assert_true($data->check());
		
	} 
	
	
	
	
}