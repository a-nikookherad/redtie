<?php

namespace App\Http\Controllers\admin;

use Core\Views;

class AdminController
{
	public function dashboard()
	{
		Views::bladeRender('admin.dashboard');
	}

	public function who()
	{
		Views::bladeRender('admin.whoAmI.whoAmI');
	}
}