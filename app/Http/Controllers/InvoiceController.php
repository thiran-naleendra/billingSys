<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {

        return view('invoice');
    }

    public function setInvoice()
    {
        $item = Item::get();
        return view('Create_invioce')->with('item', $item);
    }

    public function Session(Request $request)
    {
        $item = Item::find($request->input('item_id'));
        $qty = $request->input('qty');
        $item_price = $request->input('item_price');
        $item_description = $request->input('item_description');

        if ($item && $qty > 0) {
            // Create or update a session variable to store the selected items
            $selectedItems = session('selectedItems', []);

            // Add the selected item to the session array
            $selectedItems[] = [
                'item_id' => $item->id,
                'item_name' => $item->item_name,
                'qty' => $qty,
                'item_price' => $item_price,
                'item_description' => $item_description

            ];

            session(['selectedItems' => $selectedItems]);
        }

        return redirect()->back();
    }

    public function clearSession()
    {
        // Remove the 'selectedItems' session variable
        session()->forget('selectedItems');

        return redirect()->back();
    }
    public function deleteSelectedItem($index)
    {
        // Get the current selectedItems array from the session
        $selectedItems = session('selectedItems', []);

        // Check if the item at the specified index exists before attempting to delete it
        if (isset($selectedItems[$index])) {
            // Remove the item from the selectedItems array
            unset($selectedItems[$index]);

            // Reindex the array to ensure sequential keys
            $selectedItems = array_values($selectedItems);

            // Update the session data with the modified selectedItems array
            session(['selectedItems' => $selectedItems]);
        }

        return redirect()->back();
    }
}
