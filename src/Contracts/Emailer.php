<?php

namespace Wovv\Modules\Common\Contracts\Emails;

/**
 * An interface to send email
 * @author Sendy Halim <sendyhalim93@gmail.com>
 */
interface Emailer
{
    /**
     * Send the given email
     * @param Email $email
     * @return void
     */
    public function send(Email $email);
}
