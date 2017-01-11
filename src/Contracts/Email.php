<?php

namespace Bronanza\Emailer\Contracts;

use Illuminate\Mail\Message;

/**
 * An interface to represent email
 * @author Bobby Sutriadi <bobbysutriadi@gmail.com>
 */
interface Email
{
    /**
     * Get email template path
     * @return string
     */
    public function template();

    /**
     * Get email template data
     * @return mixed
     */
    public function templateData();

    /**
     * Setup the current email
     * @return mixed
     */
    public function setup();
}