<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purchases;
use App\Models\Inventory;

class UserPurchasesController extends Controller
{
    public function userindex()
    {
        $purchases = Purchases::all();
        return view('purchases.userindex', compact('purchases'));
    }

    public function usercreate()
    {
        $inventories = Inventory::all();
        return view('purchases.usercreate', compact('inventories'));
    }

    public function userstore(Request $request)
    {
        // Validasi data dari form
        $validatedData = $request->validate([
            'date' => 'required|date',
            'qty' => 'required|integer',
            'price' => 'required|numeric',
            'inventory_id' => 'required|exists:inventories,id',
            'user_id' => 'required|exists:users,id',
        ]);

        // Buat number hanya berupa timestamp (strtotime)
        $validatedData['number'] = strtotime($validatedData['date']) . $validatedData['user_id'];

        // Ambil data inventories berdasarkan inventory_id
        $inventory = Inventory::findOrFail($validatedData['inventory_id']);

        // Kurangi qty dari stok inventories
        $inventory->stock -= $validatedData['qty'];

        // Simpan perubahan stok inventories ke database
        $inventory->save();

        Purchases::create($validatedData);

        return redirect()->route('purchases.userindex')->with('success', 'Data pembelian berhasil ditambahkan');
    }


    public function usershow($id)
    {
        $purchase = Purchases::findOrFail($id);
        return view('purchases.usershow', compact('purchase'));
    }

    public function useredit($id)
    {
        $inventories = Inventory::all();
        $purchase = Purchases::findOrFail($id);
        return view('purchases.useredit', compact('purchase', 'inventories'));
    }

    public function userupdate(Request $request, $id)
    {
        // Validasi data dari form
        $validatedData = $request->validate([
            'number' => 'required|unique:purchases,number,' . $id,
            'date' => 'required|date',
            'qty' => 'required|integer',
            'price' => 'required|numeric',
            'inventory_id' => 'required|exists:inventories,id',
            'user_id' => 'required|exists:users,id',
        ]);

        $purchase = Purchases::findOrFail($id);

        $qtyDifference = $validatedData['qty'] - $purchase->qty;

        $inventory = Inventory::findOrFail($validatedData['inventory_id']);

        $inventory->stock -= $qtyDifference;

        $inventory->save();

        $purchase->update($validatedData);

        return redirect()->route('purchases.userindex')->with('success', 'Data Pembelian berhasil diperbarui');
    }

    public function userdestroy($id)
    {
        Purchases::findOrFail($id)->delete();
        return redirect()->route('purchases.userindex')
            ->with('success', 'Data Pembelian berhasil dihapus');
    }
}
