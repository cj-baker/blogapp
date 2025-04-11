<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view("Home/index");
    }

    private function sendTestEmail()
    {
        $email = \Config\Services::email();

        $email->setTo("casey_abc_123@hotmail.com");
        $email->setSubject("Test Email");
        $email->setMessage("Hello from <i>Blog App</i>");

        if ($email->send()){

            echo "Email sent";
        } else {

            echo "Email was NOT sent.";
        }
    }
}
