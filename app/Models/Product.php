<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

//    private static $product;
//    private static $image;
//    private static $imageName;
//    private static $imageUrl;
//    private static $directory;
//
//
//    public static function getImageUrl($request)
//    {
//        self::$image = $request->file('image');
//        self::$imageName = self::$image->getClientOriginalName();
//        self::$directory = 'product-images/';
//        self::$image->move(self::$directory, self::$imageName);
//        self::$imageUrl = self::$directory.self::$imageName;
//        return self::$imageUrl;
//    }
//
//
//    public static function newProduct($request)
//    {
//        self::$product = new Product();
//        self::$product->name = $request->name;
//        self::$product->price = $request->price;
//        self::$product->image = self::getImageUrl($request);
//        self::$product->save();
//    }
}
