<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use App\Models\Datatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WelcomeController extends Controller
{
    //Database
    public function index()
    {
        $data = Datatable::all();
        return view('welcome', ['data' => $data]);
    }

    // Add new product
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'nameitem' => 'required',
            'price' => 'required|numeric',
            'details' => 'required',
            'publish' => 'required|boolean',
        ]);

        // If validation fails, redirect back with errors
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Create a new item using the validated data
        Datatable::create([
            'nameitem' => $request->input('nameitem'),
            'price' => $request->input('price'),
            'details' => $request->input('details'),
            'publish' => $request->input('publish'),
        ]);

        // Redirect back to the create page with success message
        return redirect('/create')->with('success', 'Item added successfully');
    }

    //Display 
    public function show($id)
    {
        $item = Datatable::findOrFail($id);
        return view('show', compact('item'));
    }

    //Update
    public function edit($id)
    {
        $item = Datatable::findOrFail($id);
        return view('edit', compact('item'));
    }

    //Delete
    public function destroy($id)
    {
        $item = Datatable::findOrFail($id);
        $item->delete();
        return redirect('/create')->with('success', 'Item deleted successfully');
    }

    //Search
    public function search(Request $request)
    {
        $name = $request->input('name');
        $item = Datatable::where('nameitem', 'like', '%' . $name . '%')->first();
        if ($item) {
            return redirect()->route('show', $item->id);
        } else {
            return redirect()->back()->with('error', 'Item not found.');
        }
    }

    public function update(Request $request, $id)
    {
    // Validate the incoming request data
    $validator = Validator::make($request->all(), [
        'nameitem' => 'required',
        'price' => 'required|numeric',
        'details' => 'required',
        'publish' =>'required|boolean',
    ]);

    // If validation fails, redirect back with errors
    if ($validator->fails()) {
        return back()->withErrors($validator)->withInput();
    }

    try {
        // Find the item by ID
        $item = Datatable::findOrFail($id);

        // Update the item with the new data
        $item->update([
            'nameitem' => $request->input('nameitem'),
            'price' => $request->input('price'),
            'details' => $request->input('details'),
            'publish' => $request->input('publish'),
        ]);

        // Redirect back to the edit page with success message
        return redirect()->route('edit', $id)->with('success', 'Item updated successfully');
        } catch (\Exception $e) {
        // Log the error and redirect back with error message
        Log::error('Error updating item: ' . $e->getMessage());
        return back()->with('error', 'An error occurred while updating the item.');
    }
}

}
