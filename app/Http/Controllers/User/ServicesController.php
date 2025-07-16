<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    //
    public function index(Request $request){
        $dataServices = Service::latest()->get();
        $request->session()->put('dataServices', $dataServices);
        return view('user.services.list',compact('dataServices'));
    }
}
