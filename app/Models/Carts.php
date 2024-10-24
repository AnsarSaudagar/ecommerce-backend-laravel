<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carts extends Model
{
    use HasFactory;

    // The table associated with the model (optional if the table follows the naming convention)
    protected $table = 'carts';

    // Specify the fillable fields to allow mass assignment
    protected $fillable = [
        'user_id',
        'product_id',
        'count'
    ];

    /**
     * Get the user that owns the cart.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the product associated with the cart.
     */
    public function product()
    {
        return $this->belongsTo(Products::class, 'product_id');
    }
}
