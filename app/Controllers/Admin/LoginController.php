<?php

require_once('app/Controllers/Admin/BackendController.php');
// require_once('app/Requests/Admin/AuthRequest.php');
require_once('app/Models/Admin/User.php');
require_once('app/Models/Role.php');
require_once('core/Flash.php');
require_once('core/Auth.php');

class LoginController extends BackendController
{
    public function index()
    {
        if(!empty( Auth::loggedIn('user')) && Auth::getUser('user')['role_id'] == 1)  // đã đăng nhập
        {
            return redirect('admin/dashboard');
        } else {    // chưa đăng nhập
            return $this->view('login/index.php');
        }
    }

    public function handleLogin()
    {
        $user = new User();
        $user = $user->authenticate($_POST);
        if($user && $user['role_id'] == 1)
        {
            if(isset($_POST['remember_me']) == on ) {    // $_COOKIE = true
                Auth::setUser('user', $user, true);
                return redirect('admin/dashboard');
            } else {                                      // $_SESSION = false
                Auth::setUser('user', $user);
                return redirect('admin/dashboard');
            }
        }

        Flash::set('error','Sai tài khoản hoặc mật khẩu');
        return redirect('admin/login');
    }

    public function logout()
    {
        Auth::logout('user');
        return redirect('admin/login');
    }

}