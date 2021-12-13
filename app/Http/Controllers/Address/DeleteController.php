<?php

namespace App\Http\Contrrollers\Address;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
		$data = Address::findOrFail($id);
		$data->delete();
		return redirect('/address/home');
    }
}
