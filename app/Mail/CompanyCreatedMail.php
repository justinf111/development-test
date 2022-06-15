<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class CompanyCreatedMail extends Mailable
{
    public $company;

    public function __construct($company)
    {
        $this->company = $company;
    }

    public function build()
    {
        return $this->view('emails.company-created', ['company' => $this->company]);
    }
}
