<?php

namespace App\Services;

use App\Mail\Introduce;
use Mail;

Class SendEmailService
{
    protected $email;
    
    public function __construct(Mail $email) {
        $this->email = $email;
    }
    
    public function sendEmail()
    {
        $this->email::to('vansonbmt1993@gmail.com')->send(new Introduce());
    }
}