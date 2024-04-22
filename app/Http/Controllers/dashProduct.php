<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class dashProduct extends Controller
{
    //
    public function showProductPage()
    {
        $products = Product::all();

        return view("products",compact("products"));
    }

    public function addProduct(Request $request)
    {

        // アップロードされたファイル名を取得
        $file_name = $request->file('image')->getClientOriginalName();

        // 取得したファイル名で保存
        $request->file('image')->storeAs('public/img', $file_name);

        //データベースに製品名と画像パスを保存
        $products = new Product();
        $products->p_name = $request->p_name;
        $products->path = 'storage/img/'.$file_name;
        $products->link = $request->link;
        $products->save();


        // 元のページに戻る
        return redirect()->route('show-product');
    }

    public function updateProduct(Request $request, Product $product)
    {
        $file_name =null;

        if($request->image!=null){
            $file_name = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/img', $file_name);
            $file_name = 'storage/img/'.$file_name;
            $str = $product->path;
            $str = str_replace('storage/img/', '', $str);
            Storage::disk('public')->delete('img/' . $str);
        }else{
            $file_name = $product->path;
        }



        $product->update([
            "p_name" => $request->p_name,
            "path" => $file_name,
            "link"=>$request->link
        ]);

        return redirect()->route('show-product');
    }
}
