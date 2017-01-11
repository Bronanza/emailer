<?php

namespace Wovv\Modules\Common\Contracts\Emails;

use Illuminate\Mail\Message;

/**
 * An interface to represent email
 * @author Sendy Halim <sendyhalim93@gmail.com>
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