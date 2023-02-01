<?php 

require('app/Controllers/Controller.php');

class BackendController extends Controller
{
    public function view($view, $data = []) 
    {
        return render("admin/$view", $data);
    }
}