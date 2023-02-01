<?php 

require_once('app/Controllers/Controller.php');

class ErrorsController extends Controller
{
    public function notFound()
    {
        return render('errors/NotFound.php');
    }
}