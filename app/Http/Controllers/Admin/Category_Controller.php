<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class Category_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cate_cate= DB::table ('loai_sp')->get();
        $brand_cate= DB::table ('nha_cung_cap')->get();
       return view('admin.category')->with('cate_cate',$cate_cate)->with('brand_cate',$brand_cate);
    }


    public function themcategory()
    {
         $cate_cate= DB::table ('loai_sp')->get();$brand_cate= DB::table ('nha_cung_cap')->get();
        return view('admin.addcate')->with('cate_cate',$cate_cate)->with('brand_cate',$brand_cate);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
