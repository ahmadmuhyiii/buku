<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purchases;
use PDF;

class PurchasesController extends Controller
{
    public function index()
    {
        $purchases = Purchases::all();
        return view('purchases.index', compact('purchases'));
    }

    public function adminpPDF()
    {
        $purchases = Purchases::all();
        $pdf = PDF::loadView('purchases.adminp_pdf', compact('purchases'));

        return $pdf->download('purchases.pdf');
    }

    public function create()
    {
        return view('purchases.create');
    }

    public function store(Request $request)
    {
        // Validasi data dari form
        $validatedData = $request->validate([
            'number' => 'required|unique:purchases',
            'date' => 'required|date',
            'qty' => 'required|integer',
            'price' => 'required|numeric',
            'inventory_id' => 'required|exists:inventories,id',
            'user_id' => 'required|exists:users,id',
        ]);

        Purchases::create($validatedData);

        return redirect()->route('purchases.index')->with('success', 'Data pembelian berhasil ditambahkan');
    }

    public function show($id)
    {
        $purchase = Purchases::findOrFail($id);
        return view('purchases.show', compact('purchase'));
    }

    public function edit($id)
    {
        $purchase = Purchases::findOrFail($id);
        return view('purchases.edit', compact('purchase'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'number' => 'required|unique:purchases,number,' . $id,
            'date' => 'required|date',
            'qty' => 'required|integer',
            'price' => 'required|numeric',
            'inventory_id' => 'required|exists:inventories,id',
            'user_id' => 'required|exists:users,id',
        ]);

        // $sale->update($validatedData);
        Purchases::whereId($id)->update($validatedData);


        return redirect()->route('purchases.index')->with('success', 'Data Pembelian berhasil diperbarui');
    }

    public function destroy($id)
    {
        Purchases::findOrFail($id)->delete();
        return redirect()->route('purchases.index')
            ->with('success', 'Data Pembelian berhasil dihapus');
    }
}
