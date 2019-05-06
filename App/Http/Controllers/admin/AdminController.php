<?php

namespace App\Http\Controllers\admin;

use Core\Views;

class AdminController
{
	public function dashboard()
	{
		echo Views::bladeRender('admin.dashboard');
	}
}