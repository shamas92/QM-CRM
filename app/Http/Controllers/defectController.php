<?php

namespace App\Http\Controllers;

use App\Models\defect;
use Illuminate\Http\Request;

class defectController extends Controller
{
    //
    function getData()
    {

        return defect::all();
    }
    function defectlist()

    {
        $data = defect::all();

        return view('pages.app.product-defects', ["defects" => $data]);
    }
    function delete($id)
    {

        $data = defect::find($id);

        $data->delete();

        return redirect('light-menu/app/product-defects');
    }
    public function index()
    {
        $defects = Defect::all();
        return view('pages.app.product-defects', compact('defects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'defect_title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Defect::create([
            'defect_title' => $request->defect_title,
            'description' => $request->description,
        ]);

        return redirect('light-menu/app/product-defects');
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'defect_title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $defect = Defect::findOrFail($id);
        $defect->defect_title = $request->input('defect_title');
        $defect->description = $request->input('description');
        $defect->save();

        return redirect()->back()->with('success', 'Defect updated successfully');
    }
}
