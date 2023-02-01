<?php

require_once('app/Controllers/Web/WebController.php');
require_once('app/Requests/Web/AuthRequest.php');
require_once('app/Models/Web/User.php');
require_once('app/Models/Role.php');
require_once('app/Models/Web/Cart.php');
require_once('core/Flash.php');
require_once('core/Auth.php');

class AuthController extends WebController
{
    public function login()
    {
        return $this->view('auth/login.php');
    }

    public function register()
    {
        return $this->view('auth/register.php');
    }

    public function handleRegister()
    {
        $checkUser = new User;
        $checkUsers = $checkUser->findAll();
        $authRequest = new AuthRequest();
        $errors = $authRequest->validateRegister($_POST,$checkUsers);
        if(count($errors) == 0)
        {
            $user = new User();
            $_POST['role_id'] = Role::USER;
            $_POST['password'] = md5($_POST['password']);
            $isCreated = $user->create($_POST);
            if($isCreated)
            {
            return redirect('auth/login'); 
            }
        }      

        return $this->view('auth/register.php' , ['errors' => $errors, 'data' => $_POST]);
    }

    public function handleLogin()
    {
        // print_r($_POST);die();
        $user = new User(); 
        $user = $user->authenticate($_POST);
        if($user && $user['role_id'] == 2)
        {
            if(isset($_POST['remember_me'])) {
                Auth::setUser('user', $user, true);
            } else {
                Auth::setUser('user', $user);
            }

            return redirect('Auth/updateCart');
        }

        Flash::set('error','Đăng nhập thất bại');
        return redirect('auth/login'); 
    }

    public function updateCart()
    {
        if(Auth::getUser('user')['id']) {
            $cart = new Cart;
            $carts = $cart->cart_client($_SERVER['HTTP_USER_AGENT']);
            foreach ($carts as $cart) {
                if($cart['client_id'] != $_SERVER['HTTP_USER_AGENT']) {
                    exit();
                } else {
                    $data = [
                        'client_id' => NULL,
                        'users_id' => Auth::getUser('user')['id']
                    ];
                    $updateCart = new Cart;
                    $updateCart = $updateCart->update($data,$cart['id']);
                    continue;
                }
            }
            return redirect('');
        }
    }

    public function logout()
    {
        Auth::logout('user');
        return redirect('auth/login');
    }

}