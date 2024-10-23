<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class Product_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function viewProduct()
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
         $cate_product= DB::table ('loai_sp')->orderByDesc('loai_sp_id')->get();
         $brand_product= DB::table ('nha_cung_cap')->orderByDesc('nha_cung_cap_id')->get();
        return view('admin.curdproduct.addproduct')->with('cate_product',$cate_product)->with('brand_product',$brand_product);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function addProduct(Request $request)
    {
        $messages = [
            'ten_san_pham.required' => 'Tên sản phẩm không được để trống.',
            'gia.required' => 'Giá không được để trống.',
            'mo_ta.required' => 'Mô tả không được để trống.',
            'so_luong_kho.required' => 'Số lượng không được để trống.',
        ];
    
        $validatedData = $request->validate([
            'ten_san_pham' => 'required',
            'gia' => 'required',
            'mo_ta' => 'required',
            'so_luong_kho' => 'required',

        ], $messages);
        $product= new Product();
        $product->ten_san_pham=$request->input('ten_san_pham');
        
        $product->loai_sp_id=$request->input('loai_sp_id');
        $product->gia=$request->input('gia');
        $product->mo_ta=$request->input('mo_ta');
        $product->so_luong_kho=$request->input('so_luong_kho');
        $product->nha_cung_cap_id=$request->input('nha_cung_cap_id');
        if($request->hasFile('hinh_anh')){
            $file=$request->file('hinh_anh');
            $extension=$file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('images/product/', $filename);
            $product->hinh_anh=$filename;
        }
        $product->save();
        return redirect()->back()->with('status','Thêm sản phẩm thành công');
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
