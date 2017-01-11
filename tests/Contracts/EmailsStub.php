<?php

namespace Tests\Contracts;

use Tests\Models\User;
use Bronanza\Emailer\Contracts\Email;
use Illuminate\Mail\Message;

class EmailStub implements Email
{
    protected $user;

    public function __construct()
    {
        $this->user = new User;
    }

    public function template()
    {
        return 'some string';
    }

    public function templateData()
    {
        return [
            'user' => $this->user,
        ];
    }

    public function setup()
    {
        return function (Message $message) {
            $customerSupport = [
                'email' => 'apeng@example.com',
                'name' => 'apeng'
            ];

            $subject = 'Test Sending Email';

            return $message
                ->from($customerSupport['email'], $customerSupport['name'])
                ->to($this->user->email, $this->user->first_name)
                ->bcc($customerSupport['email'])
                ->subject($subject);
        };
    }
}