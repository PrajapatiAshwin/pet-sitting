<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileManagementController extends Controller
{
    //
    public function profileDetails(){
        $profileManage = Auth::guard('admin')->user();
        return view('admin.profile-mange.profile-list',compact('profileManage'));
    }
}
