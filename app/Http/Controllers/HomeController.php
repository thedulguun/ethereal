<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        return view('home');
    }

    public function product()
    {
        return view('pages.product1');
    }

    public function saveMovie(Request $request)
    {
        if ($request->file('image')) {
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $fileName);
           
            // return response()->json(['path' => Storage::url($path)], 200);
            DB::table('movie')->insert([
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
