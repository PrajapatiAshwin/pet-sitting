<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PetManage;
use Illuminate\Http\Request;

class PetManageController extends Controller
{
    //
    public function index()
    {
        return view('admin.pet.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'pet_name' => 'required|string|max:255',
        ]);

        PetManage::create([
            'pet_name' => $request->pet_name,
        ]);

        return redirect()->route('admin.pet.list')->with('success', 'Pet added successfully.');
    }

    public function display(Request $request)
    {
        $pets = PetManage::latest()->paginate(10);
        return view('admin.pet.list', compact('pets'));
    }
    
    public function destroy(Request $request, $id)
    {
        $pet = PetManage::findOrFail($id);

        // Delete the pet record
        if (!empty($pet)){
            $pet->delete();
        }
        $request->session()->forget('pet');

        return redirect()->route('admin.pet.list')->with('success', 'Pet deleted successfully.');
    }

    public function edit($id)
    {
        $pet = PetManage::findOrFail($id);
        return view('admin.pet.edit', compact('pet'));
    }

    public function update(Request $request, $id)
    {
        $pet = PetManage::findOrFail($id);

        $request->validate([
            'pet_name' => 'required|string|max:255',
        ]);

        $pet->update([
            'pet_name' => $request->pet_name,
        ]);

        return redirect()->route('admin.pet.list')->with('success', 'Pet updated successfully.');
    }

}
