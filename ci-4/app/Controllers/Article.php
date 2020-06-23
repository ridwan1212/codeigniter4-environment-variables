<?php

namespace App\Controllers;

use App\Models\Article_model;

class Article extends BaseController
{
    public function __construct()
    {
        helper(['form', 'date']);
    }

    public function index()
    {
        $article = new Article_model();

        $data['pageTitle'] = 'CI-4 | Article';

        // load table
        $data['table'] = $article->getList();

        // load view
        echo view('templates/header', $data);
        echo view('templates/topbar');
        echo view('article/index', $data);
        echo view('templates/footer');
    }

    public function newPost()
    {
        $data['pageTitle'] = 'Create a New Post';

        echo view('templates/header', $data);
        echo view('templates/topbar');
        echo view('article/newpost', $data);
        echo view('templates/footer');
    }

    public function create()
    {
        // load validation
        $validation = \Config\Services::validation();

        // load model
        $article = new Article_model();

        $data['pageTitle'] = 'Create a New Post';

        if ($validation->run($_POST, 'new') == false) {
            echo view('templates/header', $data);
            echo view('templates/topbar');
            echo '<div class="alert alert-danger" role="alert">' . $validation->listErrors() . '</div>';
            echo view('article/newpost', $data, $_POST);
            echo view('templates/footer');
        } else {
            $article->createNew();
            return $this->response->redirect(site_url('article'));
        }
    }

    public function edit($id)
    {
        $article = new Article_model();

        $data['forEdit'] = $article->getForEdit($id);

        $data['pageTitle'] = 'Edit Post';

        echo view('templates/header', $data);
        echo view('templates/topbar');
        echo view('article/edit', $data);
        echo view('templates/footer');
    }

    public function update()
    {
        $article = new Article_model();

        $article->update($_POST['id'], $_POST);
        return $this->response->redirect(site_url('article'));
    }

    public function delete($id)
    {
        $article = new Article_model();

        $article->delete($id);
        return $this->response->redirect(site_url('article'));
    }

    public function publish($id)
    {
        $article = new Article_model();

        $article->update($id, ['status' => 1, 'publish_date' => date('D, d M H:i:s')]);
        return $this->response->redirect(site_url('article'));
    }

    public function unpublish($id)
    {
        $article = new Article_model();

        $article->update($id, ['status' => 0, 'publish_date' => 'Unpublished']);
        return $this->response->redirect(site_url('article'));
    }
}
