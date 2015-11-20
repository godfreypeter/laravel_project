<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
	public function about()
	{
		$first='Alex';
		$last='Royy';
		return view('pages.about', compact('first'))->with('last',$last);
	}

	public function contact()
	{
		return view('pages.contact');
	}
}


