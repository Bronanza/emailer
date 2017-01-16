<?php

namespace Tests;

use PHPUnit_Framework_TestCase;
use Illuminate\Mail\Message;
use Bronanza\Emailer\LaravelEmailer;
use Tests\Contracts\EmailStub;
use Mockery;


class LaravelEmailerTest extends PHPUnit_Framework_TestCase
{
	protected $email;
	protected $emailer;

	public function setup()
	{
		$this->email = new EmailStub();
	}

	public function test_get_template_data()
	{	
		$templateData = $this->email->templateData();
		$this->assertInternalType('array',$templateData);	
	}

	public function test_get_setup_data()
	{
		$this->isInstanceof('Message', $this->email->setup());
	}

	public function test_send_email()
	{
		$this->emailer = \Mockery::mock('Emailer', function ($mock) {
			$mock->shouldReceive('send');
		});

		$this->emailer->send($this->email);
	}
}

