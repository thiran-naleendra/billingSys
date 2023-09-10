<?php
namespace App\Http\Controllers;
use App\Models\Item;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public function index()
    {   
        $item = Item::get();
        return view('Welcome')->with('item', $item );
    }
}