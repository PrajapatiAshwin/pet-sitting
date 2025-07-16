<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderDetailController extends Controller
{
    //
    public function display(){
        $orderDetails = DB::table('orders')->leftjoin('pet_manages','pet_manages.id','orders.pet_type')
                        ->select('pet_manages.pet_name as pname','orders.*')->paginate(10);
        return view('admin.order-detail.list',compact('orderDetails'));
    }
}