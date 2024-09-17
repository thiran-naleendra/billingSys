<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Customer;
use App\Models\Invoices;
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
        $customer = Customer::get();
        return view('Create_invioce')->with(['item' => $item, 'customer' => $customer]);
    }



    public function Session(Request $request)
    {
        $item = Item::find($request->input('item_id'));
        $qty = $request->input('qty');
        $item_price = $request->input('item_price');
        $item_description = $request->input('item_description');
        $item_serial = $request->input('serial_no');

        if ($item && $qty > 0) {
            // Create or update a session variable to store the selected items
            $selectedItems = session('selectedItems', []);

            // Add the selected item to the session array
            $selectedItems[] = [
                'item_id' => $item->id,
                'item_name' => $item->item_name,
                'qty' => $qty,
                'item_price' => $item_price,
                'item_description' => $item_description,
                'serial_no' => $item_serial


            ];

            session(['selectedItems' => $selectedItems]);
        }

        return redirect()->back();
    }

    public function customerSession(Request $request)
    {
        $customerId = $request->input('id');
        $customer = Customer::find($customerId);

        if ($customer) {
            $selectedCustomer = [
                'name' => $customer->name,
                'address' => $customer->address, // Get the address from the form input
            ];

            $request->session()->put('selectedCustomer', $selectedCustomer);
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
    public function invoicelist_view()
    {
        return view('invoice');
    }
    public function invoce_li()
    {
        // Fetch all invoices from the database
        $invoices = Invoices::all();

        // Pass the invoices data to the view
        return view('invoiceList', compact('invoices'));
    }



    public function storeInvoice()
    {
        // Get the selected customer from session
        $selectedCustomer = session('selectedCustomer');

        // Get selected items from session
        $selectedItems = session('selectedItems', []);

        // Ensure that there is a customer and items to save
        if ($selectedCustomer && !empty($selectedItems)) {

            // Prepare data for storing in a single row
            $itemNames = [];
            $itemQuantities = [];
            $itemPrices = [];
            $itemSerials = [];

            foreach ($selectedItems as $selectedItem) {
                $itemNames[] = $selectedItem['item_name'];
                $itemQuantities[] = $selectedItem['qty'];
                $itemPrices[] = $selectedItem['item_price'];
                $itemSerials[] = $selectedItem['serial_no'];
            }

            // Concatenate arrays into strings for saving in a single row
            $itemsString = implode(', ', $itemNames);
            $quantitiesString = implode(', ', $itemQuantities);
            $pricesString = implode(', ', $itemPrices);
            $serialsString = implode(', ', $itemSerials);

            // Set the timezone to GMT+5:30
            $timezone = new \DateTimeZone('Asia/Kolkata'); // GMT+5:30
            $datetime = new \DateTime('now', $timezone);
            $formattedDate = $datetime->format('Y-m-d H:i:s');

            // Insert the customer and concatenated item data into the invoice table in one row
            Invoices::create([
                'customer_name'   => $selectedCustomer['name'],
                'customer_address' => $selectedCustomer['address'],
                'item_name'       => $itemsString,
                'qty'             => $quantitiesString,
                'item_price'      => $pricesString,
                'serial_no'       => $serialsString,
                'created_at'        => $formattedDate,
            ]);
        }

        return redirect()->back()->with('success', 'Invoice saved successfully!');
    }

    public function view($id)
    {
        // Fetch the invoice from the database
        $invoice = Invoices::findOrFail($id);

        // Split the comma-separated strings into arrays
        $items = explode(', ', $invoice->item_name);
        $quantities = explode(', ', $invoice->qty);
        $prices = explode(', ', $invoice->item_price);
        $serials = explode(', ', $invoice->serial_no);

        // Ensure all arrays have the same length
        $maxCount = min(count($items), count($quantities), count($prices), count($serials));

        // Pass the invoice data to the view
        return view('invoiceDetail', compact('invoice', 'items', 'quantities', 'prices', 'serials', 'maxCount'));
    }
    public function delete($id)
    {
        // Find the invoice by its ID
        $invoice = Invoices::findOrFail($id);

        // Delete the invoice
        $invoice->delete();

        // Redirect back with a success message
        return back()->with('success', 'Invoice deleted successfully.');
    }
}
