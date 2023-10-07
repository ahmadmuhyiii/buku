<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;

class AdminController extends Controller
{
    public function adminHome()
    {
        return view('adminHome', [
            // 'inventories' => Inventory::all(),
        ]);
    }

    // public function index()
    // {
    //     return view('pelanggan.toko.index', [
    //         'tokos' => Toko::all(),
    //         'transaksi' => Transaksi::all()
    //     ]);
    // }
}
