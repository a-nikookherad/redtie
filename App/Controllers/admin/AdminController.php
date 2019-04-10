<?php
/**
 * Created by PhpStorm.
 * User: RedTie
 * Date: 04/10/2019
 * Time: 09:47 PM
 */

namespace App\Controllers\admin;


use Core\View;

class AdminController
{
	public function dashboard()
	{
		echo View::bladeRender('admin.dashboard');
	}
}