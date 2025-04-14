<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        if (session("magicLogin")) { //Will detect if they have gone through the magic login process, and direct them to reset password if so.
            return redirect()->to("set-password")
                             ->with("message", "Please update your password.");
        }
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
