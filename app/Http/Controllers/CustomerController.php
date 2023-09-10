<?php
namespace App\Http\Controllers;
use App\Models\Customer;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    public function index()
    {   
        $customer = Customer::get();
        return view('AddCustomer')->with('customer', $customer);
    }

    public function addCustomer()
    {
        $store = Customer::create(
            [
                'name' => request('name'),
                'mobile_no' => request('number'),
                'email' => request('email'),
                'address' => request('address'),
                
            ]
        );
        return back()->with('success', 'Successfully placed reservation!');
    }
}