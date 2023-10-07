<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;
use PDF;

class InventoryController extends Controller
{
    // public function index()
    // {
    //     $inventories = Inventory::all();
    //     return view('inventories.index', compact('inventories'));
    // }

    public function index()
    {
        $inventories = Inventory::all();
        return view('inventories.index', [
            'inventories' => Inventory::all(),
        ]);
    }

    public function adminiPDF()
    {
        $inventories = Inventory::all();
        $pdf = PDF::loadView('inventories.admini_pdf', compact('inventories'));

        return $pdf->download('inventories.pdf');
    }

    public function show($id)
    {
        $inventory = Inventory::findOrFail($id);
        return view('inventories.show', compact('inventory'));
    }

    public function create()
    {
        return view('inventories.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'code' => 'required',
            'name' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        Inventory::create($validatedData);

        return redirect()->route('inventories.index')
            ->with('success', 'Inventory item created successfully.');
    }

    public function edit($id)
    {
        $inventory = Inventory::findOrFail($id);
        return view('inventories.edit', compact('inventory'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'code' => 'required',
            'name' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        Inventory::whereId($id)->update($validatedData);

        return redirect()->route('inventories.index')
            ->with('success', 'Inventory item updated successfully.');
    }

    public function destroy($id)
    {
        Inventory::findOrFail($id)->delete();
        return redirect()->route('inventories.index')
            ->with('success', 'Inventory item deleted successfully.');
    }
}
