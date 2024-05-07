<?php

namespace App\Http\Controllers;

use App\Models\Navget;
use Illuminate\Http\Request;

class NavgetController extends Controller
{
    public function index()
    {
        $emp = Navget::all();
        return view("navget.index", compact('emp'));
    }

    public function create()
    {
        return view("navget.create");
    }

    public function store(Request $request)
    {
        $request->validate([
            'empName' => 'required|string|min:3|max:20|unique:navgets,name',
            'empQuantity' => 'required|numeric',
            'empImage' => 'required|image|mimes:jpeg,png,jpg,gif|max:10000', // Validate that empImage is required and image type
            'empPrice' => 'required|numeric',
        ]);

        $emp = new Navget();
        $emp->name = $request->input('empName');
        $emp->quantity = $request->input('empQuantity');
        $emp->price = $request->input('empPrice');

        // Handle file upload and store the image path
        if ($request->hasFile('empImage')) {
            $imagePath = $request->file('empImage')->store('images'); // Store image in 'storage/app/images'
            $emp->image = $imagePath;
        }

        $emp->save();

        return redirect('/emp')->with('done', 'Add Navget Done');
    }

    public function show($id)
    {
        $emp = Navget::findOrFail($id);
        return view("navget.layout.show", compact('emp'));
    }

    public function edit($id)
    {
        $emp = Navget::find($id);
        return view("navget.layout.edit")->with("emp", $emp);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'empName' => "required|string|min:3|max:20|unique:navgets,name,$id",
            'empQuantity' => "required|numeric",
            'empImage' => "image|mimes:jpeg,png,jpg,gif|max:10000", // Validate image type if provided
            'empPrice' => "required|numeric",
        ]);

        $emp = Navget::find($id);
        $emp->name = $request->input('empName');
        $emp->quantity = $request->input('empQuantity');
        $emp->price = $request->input('empPrice');

        // Update image if a new image is uploaded
        if ($request->hasFile('empImage')) {
            $imagePath = $request->file('empImage')->store('images'); // Store image in 'storage/app/images'
            $emp->image = $imagePath;
        }

        $emp->save();
        return redirect('/emp')->with("done", "Update Navget Done");
    }

    public function destroy($id)
    {
        $emp = Navget::find($id);
        $emp->delete();
        return redirect('/emp')->with("done", "Delete Navget Done");
    }
}