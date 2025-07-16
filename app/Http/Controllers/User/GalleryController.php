<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\GalleryManagement;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class GalleryController extends Controller
{
    //
    // public function index(Request $request)
    // {
    //     $galleryManagement = GalleryManagement::get();
    //     dd($galleryManagement);
    //     $request->session()->put('gallery_management', $galleryManagement);
    //     return view('user.gallery.list',compact('galleryManagement'));
    // }

    public function index(Request $request)
    {
        $records = GalleryManagement::get();

        $allImages = [];

        foreach ($records as $record) {
            $images = json_decode($record->image, true);

            if (is_array($images)) {
                foreach ($images as $img) {
                    $allImages[] = [
                        'path' => $img,
                        'record_id' => $record->id,
                        'title' => $record->title ?? '',
                    ];
                }
            }
        }

        $perPage = 6;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentItems = array_slice($allImages, ($currentPage - 1) * $perPage, $perPage);
        $paginatedImages = new LengthAwarePaginator($currentItems, count($allImages), $perPage);
        $paginatedImages->setPath($request->url());

        $request->session()->put('gallery_management', $paginatedImages);

        return view('user.gallery.list', compact('paginatedImages'));
    }
}
