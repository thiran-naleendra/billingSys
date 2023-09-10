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
        return view('items.edit', compact('item'));
    }
}
