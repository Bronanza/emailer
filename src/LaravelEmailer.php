<?php

namespace Bronanza\Emailer\Emails;

use Mail;
use Bronanza\Emailer\Contracts\Emailer;
use Bronanza\Emailer\Contracts\Email;

/**
 * An emailer that uses laravel Mail facade
 * @author Sendy Halim <sendyhalim93@gmail.com>
 */
class LaravelEmailer implements Emailer
{
    /**
     * @inheritDoc
     */
    public function send(Email $email)
    {
        Mail::send($email->template(), $email->templateData(), $email->setup());
    }
}