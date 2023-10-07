<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;
use App\Models\Sales;
use Illuminate\Support\Facades\Auth;

class UserSalesController extends Controller
{
    public function userindex()
    {
        $sales = Sales::where('user_id', Auth::user()->id)->get();
        return view('sales.userindex', compact('sales'));
    }

    public function usercreate()
    {
        $inventories = Inventory::all();
        return view('sales.usercreate', compact('inventories'));
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

        // Tambahkan qty ke stok inventories
        $inventory->stock += $validatedData['qty'];

        // Simpan perubahan stok inventories ke database
        $inventory->save();

        // Cek apakah number sudah ada dalam database, jika ya, tambahkan angka unik
        $number = $validatedData['number'];
        $count = Sales::where('number', $number)->count();
        if ($count > 0) {
            $validatedData['number'] = $number . '-' . ($count + 1);
        }

        Sales::create($validatedData);

        return redirect()->route('sales.userindex')->with('success', 'Data penjualan berhasil ditambahkan');
    }

    public function usershow($id)
    {
        $sale = Sales::findOrFail($id);
        return view('sales.usershow', compact('sale'));
    }

    public function useredit($id)
    {
        $inventories = Inventory::all();
        $sale = Sales::findOrFail($id);
        return view('sales.useredit', compact('sale', 'inventories'));
    }

    public function userupdate(Request $request, $id)
    {
        // Validasi data dari form
        $validatedData = $request->validate([
            'number' => 'required|unique:sales,number,' . $id,
            'date' => 'required|date',
            'qty' => 'required|integer',
            'price' => 'required|numeric',
            'inventory_id' => 'required|exists:inventories,id',
            'user_id' => 'required|exists:users,id',
        ]);

        // Ambil data penjualan yang akan diubah
        $sale = Sales::findOrFail($id);

        // Hitung selisih qty baru dengan qty yang lama
        $qtyDifference = $validatedData['qty'] - $sale->qty;

        // Ambil data inventories yang sesuai dengan inventory_id
        $inventory = Inventory::findOrFail($validatedData['inventory_id']);

        // Tambahkan selisih qty ke stok inventories
        $inventory->stock += $qtyDifference;

        // Simpan perubahan stok inventories ke database
        $inventory->save();

        // Update data penjualan
        $sale->update($validatedData);

        return redirect()->route('sales.userindex')->with('success', 'Data penjualan berhasil diperbarui');
    }


    // public function userupdate(Request $request, $id)
    // {
    //     $validatedData = $request->validate([
    //         'number' => 'required|unique:sales,number,' . $id,
    //         'date' => 'required|date',
    //         'qty' => 'required|integer',
    //         'price' => 'required|numeric',
    //         'inventory_id' => 'required|exists:inventories,id',
    //         'user_id' => 'required|exists:users,id',
    //     ]);

    //     // $sale->update($validatedData);
    //     Sales::whereId($id)->update($validatedData);


    //     return redirect()->route('sales.userindex')->with('success', 'Data penjualan berhasil diperbarui');
    // }

    public function userdestroy($id)
    {
        Sales::findOrFail($id)->delete();
        return redirect()->route('sales.userindex')
            ->with('success', 'Data penjualan berhasil dihapus');
    }
}
