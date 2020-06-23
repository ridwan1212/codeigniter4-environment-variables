<?php

namespace App\Controllers;

use App\Models\Home_model;

class Home extends BaseController
{
	public function index()
	{
		$data['pageTitle'] = 'CI-4 | Home';

		echo view('templates/header', $data);
		echo view('templates/topbar');
		echo view('home/index', $data);
		echo view('templates/footer');
	}

	//--------------------------------------------------------------------

}
