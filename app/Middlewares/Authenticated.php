<?php 

require_once('app/Middlewares/BaseMiddleware.php');
require_once('core/Auth.php');

class Authenticated extends BaseMiddleware
{
    public function handle($parameters)
    {
        if (!Auth::loggedIn('user')) {
            return redirect('authentication');
        }
        return true;
    }
}