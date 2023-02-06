<?php

namespace App\Policies;

use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {

    }
    public function valued(User $user, Product $product){
        if (Review::where('user_id', $user->id)->where('product_id', $product->id)->count()) {
            return false;
        }else{
            return true;
        }
    }
}
