<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Inventory;

class Sales extends Model
{
    use HasFactory;

    protected $fillable = ['number', 'date', 'qty', 'price', 'inventory_id', 'user_id'];

    public function Getuser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function Getinventories()
    {
        return $this->belongsTo(Inventory::class, 'inventory_id');
    }
}
