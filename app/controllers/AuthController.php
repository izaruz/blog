<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;
use Sirius\Validation\Validator;

class AuthController extends BaseController{

    public function getLogin(){
        $pageTitle = 'Login Blog';
        return $this->renderAdmin('admin-login.twig', [
            'pageTitle' => $pageTitle
        ]);
    }

    public function postLogin(){
        $pageTitle = 'Login Blog';

        $validator = new Validator();
        $validator->add('email', 'required');
        $validator->add('pass','required');

        if ( $validator->validate($_POST) ) {
            $user = User::where('email', $_POST['email'])->first();
            if ($user) {
                if (password_verify($_POST['pass'], $user->password)) {
                    $_SESSION['userId'] = $user->id;
                    header('Location:' . BASE_URL . 'admin');
                    return null;
                }
            }

            $validator->addMessage('email','User name and password does not match');
        }

        $errors = $validator->getMessages();
        
        return $this->renderAdmin('admin-login.twig', [
            'pageTitle' => $pageTitle,
            'errors' => $errors
        ]);
    }

    public function getLogout(){
        unset($_SESSION['userId']);
        header('Location:' . BASE_URL . 'auth/login');
    }

}