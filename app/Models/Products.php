<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    // Specify the table if it's not the plural form of the model name
    // protected $table = 'products';

    // Specify which fields are fillable via mass assignment
    protected $fillable = ['name', 'price', 'description', 'category_id', 'created_by', 'updated_by'];

    // If you want to disable timestamps (created_at, updated_at)
    // public $timestamps = false;

    // Relationships with other models (e.g., Product belongs to a Category)
    public function category()
    {
        return $this->belongsTo(ProductsCategory::class);
    }
    
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
