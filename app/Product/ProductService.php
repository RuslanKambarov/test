<?php

namespace App\Product;

use App\Events\ProductEvent;
use App\Models\Product;
use App\Product\Contract\Product as PInterface; 

Class ProductService implements PInterface
{
    public static function create($request)
    {
        if($product = Product::create($request)){
            $product->categories()->attach($product->categories()->attach($request["categoryEId"]));
            event(new ProductEvent($product));
            return [
                "type" => "success",
                "message" => "success"
            ];
        }else{
            return [
                "type" => "warning",
                "message" => "warning"
            ];
        }        
    }

    
    public function remove($id)
    {
        $product = Product::find($id);
        $product->categories()->detach();
        if($product->delete()){
            return [
                "type" => "success",
                "message" => "success"
            ];
        }else{
            return [
                "type" => "warning",
                "message" => "warning"
            ];
        }
    }
}