<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Veterinarian;
use Illuminate\Http\Request;

class VeterinarianController extends Controller
{
    //
    public function index(Request $request){

        $veterinarian = Veterinarian::all();
        return view('user.veterinarian.list',compact('veterinarian'));
    }
}
