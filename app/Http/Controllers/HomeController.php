<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function index()
    {
        return view('home');
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
            $file->move(public_path('images'), $fileName);
           
            // return response()->json(['path' => Storage::url($path)], 200);
            DB::table('products')->insert([
                'title' => $request->title,
                'description' => $request->desc,
                'image' => $fileName,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
 
        return response()->json(['status' => true, 'path' => url('images/', $fileName)]);
    }
}
