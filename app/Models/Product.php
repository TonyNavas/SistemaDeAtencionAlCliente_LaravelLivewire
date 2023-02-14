<?php

namespace App\Models;

use Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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

    protected $withCount = ['reviews'];

    public function getRatingAttribute(){

        if($this->reviews_count){
            return round($this->reviews->avg('rating'), 1);
        }else{
            return 5;
        }
    }

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    // Reviews, relacion uno a muchos

    public function reviews(){
        return $this->hasMany(Review::class);
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
