<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class HomeController extends Controller
{
    public function welcome()
    {
        $data = Schema::hasTable('products')
            ? DB::table('products')->get()
            : collect();
        return view('welcome', compact('data'));
    }

    public function index(): RedirectResponse
    {
        return redirect()->route('account.edit');
    }

    public function products()
    {
        return view('pages.productpage');
    }

    public function product()
    {
        return view('pages.product1');
    }

    public function saveProduct(Request $request)
    {
      
        if ($request->file('image')) {
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('/upload'), $fileName);
           
            DB::table('products')->insert([
                'product_name' => $request->product_name,
                'description' => $request->description,
                'price' => '10000',
                'image_url' => $fileName,
                'created_at' => Carbon::now(),
                'brand_name' => 'Jinnion'
            ]);
        }

 
        return redirect()->back()->with('Amjilttai hadgallaa');
    }

    public function detailProduct($id)
    {
        $product = DB::table('products')->where('product_id', $id)->first();
        return view('pages.product1', compact('product'));
    }
}
