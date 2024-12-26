<?php

namespace App\Http\Controllers;

class Controller
{
	public function dashboard($request)
    {
        // return view('dashboard', ['modules' => ['dashboard'], 'components' => ['dashboard']]);
    }

	public function welcome($request)
    {
        return "view('welcome', ['title' => '', 'modules' => ['welcome'], 'components' => ['welcome']]);";
    }
}
