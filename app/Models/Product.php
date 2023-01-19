<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
        'category_id'
    ];

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    //Route Model Bindings

    public function getRouteKeyName()
    {
        return 'name';
    }

    public function scopeFilter($query, $filters){
        $query->when($filters['category'] ?? null, function ($query, $category){
            $query->whereIn('category_id', $category);

        })->when($filters['order'] ?? 'new', function($query, $order){

            $sort = $order == 'new' ? 'desc' : 'asc';
            $query->orderBy('created_at', $sort);

        });
    }
}
