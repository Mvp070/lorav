<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductsController extends Controller
{
    public function getProducts()
    {
        $prod = Product::get();
        return response()->json($prod);
    }
    
    public function addProducts(Request $req)
    {
        $prod = new Product();

        $prod->name_product=$req->name_product;
        $prod->number=$req->number;
        $prod->prise=$req->prise;


        $a = $prod->save();

        if($a)
            return "Биг сенкитч";
           return"ББ бро";
    }
    
    public function deleteProducts(Request $req)
    {
        $prod = Product::where("name_product", $req->name_product)->first();
        $prod->delete();
        return response()->json("Товар бб");
      }

}
