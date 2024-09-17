<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $item = Item::get();

        return view('ItemList')->with('item', $item);
    }

    public function itemstore(Request $request)
    {


        $itemstore = Item::create(
            [
                'item_name' => request('item'),
                'item_price' => request('price'),
                'item_description' => request('description'),
                'item_category' => $request->input('category'),
                'serial_no'  => request('serialNo'),
            ]
        );
        return back()->with('success', 'Successfully placed reservation!');
    }

    public function edit($id)
    {
        $item = Item::find($id); // Replace 'Item' with your actual model name
        return view('editItems', compact('item'));
    }
    public function update(Request $request, $id)
{
    // Validate the incoming request data
    

    // Find the existing item by ID
    $item = Item::findOrFail($id);

    // Update the item with new data
    $item->update([
        'item_name' => $request->input('item'),
        'item_price' => $request->input('price'),
        'item_description' => $request->input('description'),
        'item_category' => $request->input('category'),
        'serial_no'  => $request->input('serialNo'),
    ]);

    // Redirect back with a success message
    return redirect()->back()->with('success', 'Item updated successfully!');
}

    // Delete an item
    public function delete($id)
    {
        $item = Item::findOrFail($id);
        $item->delete();

        return back()->with('success', 'Item deleted successfully!');
    }
}
