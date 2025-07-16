<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\GalleryManagement;
use App\Models\Order;
use App\Models\PetManage;
use App\Models\PlanManagement;
use App\Models\Service;
use App\Models\Veterinarian;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    //
    public function index(Request $request)
    {
        //doctor count
        $veterinarian = Veterinarian::all();

        //gallery count
        $records = GalleryManagement::get();

        $allGalleryImage = [];

        foreach ($records as $record) {
            $images = json_decode($record->image, true);

            if (is_array($images)) {
                foreach ($images as $img) {
                    $allGalleryImage[] = [
                        'path' => $img,
                    ];
                }
            }
        }

        //Blogs count
        $blogs = Blog::all();
        $PlanManagement = PlanManagement::count();
        $Services = Service::count();
        $orders = Order::get();
        $pets_manage = PetManage::get();

        //monthly data get
        // $monthlyData = [
        //     'labels' => [],
        //     'doctors' => [],
        //     'gallerys' => [],
        //     'blogs' => [],
        //     'plans' => [],
        //     'services' => [],
        // ];

        // for ($i = 1; $i <= 12; $i++) {
        //     $monthName = Carbon::create()->month($i)->format('F');
        //     $monthlyData['labels'][] = $monthName;

        //     $monthlyData['doctors'][] = Veterinarian::whereMonth('created_at', $i)->count();
        //     $monthlyData['gallerys'][] = GalleryManagement::whereMonth('created_at', $i)->count();
        //     $monthlyData['blogs'][] = Blog::whereMonth('created_at', $i)->count();
        //     $monthlyData['plans'][] = PlanManagement::whereMonth('created_at', $i)->count();
        //     $monthlyData['services'][] = Service::whereMonth('created_at', $i)->count();
        // }
        return view('admin.home', compact('veterinarian', 'allGalleryImage', 'blogs', 'PlanManagement', 'Services', 'orders','pets_manage'));
    }
}
