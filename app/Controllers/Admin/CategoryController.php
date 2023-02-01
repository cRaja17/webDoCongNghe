<?php 

require_once('app/Controllers/Admin/BackendController.php');
require_once('app/Models/Model.php');
require_once('core/Auth.php');
require_once('app/Models/Admin/Category.php');

class CategoryController extends BackendController
{
    public function index()
    {
        $category = new Category;
        $categories = $category->findAll();
        return $this->view('category/index.php',$categories);
    }

    public function create()
    {
        return $this->view('category/create.php');
    }

    public function store()
    {
        $category = new Category();
        $category = $category->create($_POST);
        return redirect('admin/category');
    }

    public function viewCategory()
    {
        return $this->view('category/view.php');
    }

    public function edit()
    {
        return $this->view('category/edit.php');
    }

    public function update()
    {
        $id = $_GET['id'];
        $category = new Category();
        $category = $category->update($_POST,$id);
        if($category)
        {
            return redirect('admin/category');
        }
    }

    public function delete()
    {
        $id = $_GET['id'];
        $category = new Category();
        $category = $category->delete($id);
        return redirect('admin/category');
    }
}