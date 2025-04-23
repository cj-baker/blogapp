<?php

namespace App\Database\Seeds;

use App\Models\UserModel;
use CodeIgniter\Database\Seeder;
use CodeIgniter\Shield\Entities\User;



class AddAdminAccount extends Seeder

{
    public function run()
    {
        $user = new User([ //create a user with the following information
            "email" => "prestonmobley01@gmail.com",
            "password" => "ChangeMe99",
            "username" => "DryerAverage"
        ]);
        $model = new UserModel;

        $model->save($user); //create the UserModel object and pass in the user to save the information

        $user = $model->findById($model->getInsertID()); //retrieve the ID of the user we just created so we can use it to assign a group

        $user->activate(); //auto activate the account so they do not have to go through activation steps to login

        $user->addGroup("admin"); //add the user to the groups Admin and Superadmin
    }
}
