<?php

namespace Admin\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;
use CodeIgniter\Shield\Entities\User;
use CodeIgniter\Exceptions\PageNotFoundException;

class Users extends BaseController
{

    private UserModel $model;

    public function __construct()
    {
        $this->model = new UserModel;
    }
    public function index()
    {
        helper("admin"); //calling in any functions within the admin_helper file
        //helpers can also be loaded to ALL controllers by adding to the BaseController or to the AutoLoad config file
       
        $users = $this->model->findAll();
        
        return view("Admin\Views\Users\index", [ //pathing within the module requires back slash in the path rather than forward slashes.
            "users" =>$users,
        ]);
    }

    public function show($id) // provides one article based on the id of the article within the Articles table
    {
        
       $user = $this->getUserOr404($id); //grabs one article by id OR spits out error if the id does not exist

        return view("Admin\Views\Users\show", [ //inputs the data for the given article into the show view.
            "user" => $user
        ]);
    }

    public function toggleBan($id) 
    {
        $user = $this->getUserOr404($id);

        if ($user->isBanned()) {
            $user->unBan();
        } else {
            $user->ban();
        }
        return redirect()->back()
                         ->with("message", "User ban status updated");
    }

    public function groups($id)
    {
        $user = $this->getUserOr404($id);

        if ($this->request->is("post")) {

            $groups = $this->request->getPost("groups") ?? []; //?? [] will set the value to the empty array if the update is equal to null (if there are no groups selected)

            $user->syncGroups(...$groups); //syncs all changes, which adds or removes groups as necessary to the changes made.

            return redirect()->to("admin/users/$id")
                             ->with("message", "User groups have been updated.");
        }

        return view ("Admin\Views\Users\groups", [
            "user" => $user
        ]);
    }

    public function permissions($id)
    {
        $user = $this->getUserOr404($id);

        if ($this->request->is("post")) {

            $permissions = $this->request->getPost("permissions") ?? []; //?? [] will set the value to the empty array if the update is equal to null (if there are no permissions selected)

            $user->syncPermissions(...$permissions); //syncs all changes, which adds or removes permissions as necessary to the changes made.

            return redirect()->to("admin/users/$id")
                             ->with("message", "User permissions have been updated.");
        }

        return view ("Admin\Views\Users\permissions", [
            "user" => $user
        ]);
    }


    private function getUserOr404($id): User
        {
            $user = $this->model->find($id); //grabs one article by ID OR spits out error if the ID does not exist
    
           if ($user === null){ //if the ID does not exist it will show the built in PageNotFoundException, otherwise it will return the article via id as normal
            throw new PageNotFoundException("User with id $id not found");
           }
    
            return $user;
        }
    }

