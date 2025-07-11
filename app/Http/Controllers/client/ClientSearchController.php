<?php

namespace App\Http\Controllers\client;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ClientSearchController extends Controller
{
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        $products = Product::where('name', 'LIKE', '%' . $keyword . '%')->get();

        return view('client.search', compact('products', 'keyword'));
    }

}
