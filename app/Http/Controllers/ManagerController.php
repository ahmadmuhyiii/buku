<?php

namespace App\Http\Controllers;

use App\Models\Purchases;
use Illuminate\Http\Request;
use App\Models\Sales;
use PDF;

class ManagerController extends Controller
{
    public function managerHome()
    {
        return view('managerHome');
    }

    public function managerindex()
    {
        $sales = Sales::all();
        return view('sales.managerindex', compact('sales'));
    }

    public function generatPDF()
    {
        $sales = Sales::all();
        $pdf = PDF::loadView('sales.sales_pdf', compact('sales'));

        return $pdf->download('sales.pdf');
    }

    public function managerrindex()
    {
        $purchases = Purchases::all();
        return view('purchases.managerrindex', compact('purchases'));
    }

    public function generatePDF()
    {
        $purchases = Purchases::all();
        $pdf = PDF::loadView('purchases.purchases_pdf', compact('purchases'));

        return $pdf->download('purchases.pdf');
    }
}
