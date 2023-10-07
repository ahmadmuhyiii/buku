<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sales;
use PDF;


class SalesController extends Controller
{
    public function index()
    {
        $sales = Sales::all();
        return view('sales.index', compact('sales'));
    }

    public function adminsPDF()
    {
        $sales = Sales::all();
        $pdf = PDF::loadView('sales.admins_pdf', compact('sales'));

        return $pdf->download('sales.pdf');
    }

    public function create()
    {
        return view('sales.create');
    }

    public function store(Request $request)
    {
        // Validasi data dari form
        $validatedData = $request->validate([
            'number' => 'required|unique:sales',
            'date' => 'required|date',
            'qty' => 'required|integer',
            'price' => 'required|numeric',
            'inventory_id' => 'required|exists:inventories,id',
            'user_id' => 'required|exists:users,id',
        ]);

        Sales::create($validatedData);

        return redirect()->route('sales.index')->with('success', 'Data penjualan berhasil ditambahkan');
    }

    public function show($id)
    {
        $sale = Sales::findOrFail($id);
        return view('sales.show', compact('sale'));
    }

    public function edit($id)
    {
        $sale = Sales::findOrFail($id);
        return view('sales.edit', compact('sale'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'number' => 'required|unique:sales,number,' . $id,
            'date' => 'required|date',
            'qty' => 'required|integer',
            'price' => 'required|numeric',
            'inventory_id' => 'required|exists:inventories,id',
            'user_id' => 'required|exists:users,id',
        ]);

        // $sale->update($validatedData);
        Sales::whereId($id)->update($validatedData);


        return redirect()->route('sales.index')->with('success', 'Data penjualan berhasil diperbarui');
    }

    public function destroy($id)
    {
        Sales::findOrFail($id)->delete();
        return redirect()->route('sales.index')
            ->with('success', 'Data penjualan berhasil dihapus');
    }
}
