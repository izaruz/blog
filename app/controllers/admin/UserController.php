<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\User;
use Sirius\Validation\Validator;

class UserController extends BaseController{

    public function getIndex() {
        $users = User::all();
        return $this->renderAdmin('admin-users.twig',[
            'users' => $users
        ]);
    }

    public function getCreate() {
        $pageTitle = 'Add User';
        return $this->renderAdmin('admin-add-user.twig', [
            'pageTitle' => $pageTitle
        ]);
    }

    public function postCreate() {
        $errors = [];
        $result = false;

        $validator = new Validator();
        $validator->add('name', 'required');
        $validator->add('email', 'required');
        $validator->add('email', 'email');
        $validator->add('pass', 'required');

        if ( $validator->validate($_POST) ){
            $user = new User();

            $user->name = $_POST['name'];
            $user->email = $_POST['email'];
            $user->password = password_hash( $_POST['pass'], PASSWORD_DEFAULT );

            $user->save();
            $result = true;

        } else{
            $errors = $validator->getMessages();
        }

        $pageTitle = 'Add User';

        return $this->renderAdmin('admin-add-user.twig', [
            'pageTitle' => $pageTitle, 
            'result' => $result,
            'errors' => $errors
        ]);
    }

}