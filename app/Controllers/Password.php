<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;
use CodeIgniter\Shield\Commands\User;

class Password extends BaseController
{
    public function set()
    {
      return view("Password/set");
    }

    public function update()
    {
        $rules = [
            "password" => [
                "label" => "Password",
                "rules" => "required|strong_password"
            ],
            "password_confirmation" => [
                "label" => "Password Confirmation",
                "rules" => "required|matches[password]"
            ]
            ];

            if ( ! $this->validate($rules)) {

                return redirect() ->back()
                                  ->with("errors", $this->validator->getErrors());
            }

            $user = auth()->user();

            $user->password = $this->request->getPost("password");

            $model = new UserModel;

            $model->save($user);

            session()-> removeTempdata(("magicLogin"));

            return redirect() -> to("/")
                              -> with("message", "Password has been changed successfully!");
    }
}
