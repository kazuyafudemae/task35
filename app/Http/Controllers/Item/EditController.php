<?php

namespace App\Http\Contrrollers\Address;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EditController extends Controller
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
    public function edit($id)
    {
		$address = Address::find($id);
		return view('Address.edit', $address);
    }
}
