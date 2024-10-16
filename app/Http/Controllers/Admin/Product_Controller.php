<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class Product_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product= DB::table ('san_pham')->get();
        $cate_product= DB::table ('loai_sp')->get();
        $brand_product= DB::table ('nha_cung_cap')->get();
       return view('admin.product')->with('product',$product)->with('cate_product',$cate_product)->with('brand_product',$brand_product);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function themsp()
    {
         $cate_product= DB::table ('loai_sp')->orderByDesc('loai_sp_id')->get();$brand_product= DB::table ('nha_cung_cap')->orderByDesc('nha_cung_cap_id')->get();
        return view('admin.addproduct')->with('cate_product',$cate_product)->with('brand_product',$brand_product);
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
