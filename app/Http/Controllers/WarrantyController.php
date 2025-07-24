<?php

namespace App\Http\Controllers;

use App\Models\Warranty;
use Illuminate\Http\Request;

class WarrantyController extends Controller
{
        public function showClient()
    {
        return view('client.warranty');
    }

    public function showAdmin()
    {
        return view('admin.warranty_admin');
    }

    public function lookup(Request $request)
    {
        $warranty = Warranty::where('warranty_code', $request->warranty_code)->first();

        if (auth()->check() && auth()->user()->role === 'admin') {
            return view('admin.warranty_admin', compact('warranty'));
        }

        return view('client.warranty', compact('warranty'));
    }

}
