<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;



class Product_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function viewProduct()
    {
        $product= DB::table ('san_pham')->get();
        $cate_product= DB::table ('loai_sp')->get();
        $brand_product= DB::table ('thuong_hieu')->get();
       return view('admin.product')->with('product',$product)->with('cate_product',$cate_product)->with('brand_product',$brand_product);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function themsp()
    {
         $cate_product= DB::table ('loai_sp')->orderByDesc('loai_sp_id')->get();
         $brand_product= DB::table ('thuong_hieu')->orderByDesc('thuong_hieu_id')->get();
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
        $product->loai_sp_id=$request->loai_sp_id ?? 1;
        $product->gia=$request->input('gia');
        $editorData = $request->input('mo_ta');  // Dữ liệu nhận được từ CKEditor

        // Loại bỏ tất cả thẻ <p> (bao gồm thẻ <p> có thuộc tính và thẻ đóng <p>)
        $editorData = preg_replace('/<\/?p[^>]*>/i', '', $editorData);
        
        // Lưu vào cơ sở dữ liệu
        $product->mo_ta = $editorData;
        $product->so_luong_kho=$request->input('so_luong_kho');
        $product->thuong_hieu_id=$request->thuong_hieu_id ?? 1;
        if($request->hasFile('hinh_anh')){
            $file=$request->file('hinh_anh');
            $extension=$file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('images/product/', $filename);
            $product->hinh_anh=$filename;
        }
        $product->save();
        
        if ($request->has('album')) {
            foreach ($request->album as $img) {
                $album_name = $img->hashName();
                $img->move(public_path('images/product'), $album_name);
        
                DB::table('album_anh')->insert([
                    'album_sp' => $album_name,
                    'album_sp_id' => $product->san_pham_id // Sử dụng san_pham_id từ sản phẩm vừa tạo
                ]);
            }
        }
        return redirect()->back()->with('status','Thêm sản phẩm thành công');
    }

    public function editsp($san_pham_id){
        $product=Product::find($san_pham_id);
        $cate_product= DB::table ('loai_sp')->orderByDesc('loai_sp_id')->get();
        $brand_product= DB::table ('thuong_hieu')->orderByDesc('thuong_hieu_id')->get();
        return view('admin.curdproduct.editproduct',compact('product','cate_product','brand_product'));
    }
    public function updatesp(Request $request, $san_pham_id){
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
        $product= Product::find($san_pham_id);
        $product->ten_san_pham=$request->input('ten_san_pham');
        $product->loai_sp_id=$request->loai_sp_id ?? 1;
        $product->gia=$request->input('gia');
        $product->mo_ta=$request->input('mo_ta');
        $product->so_luong_kho=$request->input('so_luong_kho');
        $product->thuong_hieu_id=$request->thuong_hieu_id ?? 1;
        if ($request->hasFile('hinh_anh')) {
            $anhcu = public_path('images/product/' . $product->hinh_anh);
    
            if (File::exists($anhcu)) {
                File::delete($anhcu);
            }
    
            $file = $request->file('hinh_anh');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path('images/product'), $filename);
    
            $product->hinh_anh = $filename;
        }
        $product->save();
        if ($request->has('album')) {
            foreach ($request->album as $img) {
                $album_name = $img->hashName();
                $img->move(public_path('images/product'), $album_name);
        
                DB::table('album_anh')->insert([
                    'album_sp' => $album_name,
                    'album_sp_id' => $product->san_pham_id // Sử dụng san_pham_id từ sản phẩm vừa tạo
                ]);
            }
        }
        return redirect()->back()->with('status', 'Cập nhật sản phẩm thành công');
    }
    public function deletesp($san_pham_id){
        $product=Product::find($san_pham_id);
        $anhcu = public_path('images/product/' . $product->hinh_anh);
    
            if (File::exists($anhcu)) {
                File::delete($anhcu);
            }
        // Xóa các hình ảnh trong album liên quan đến sản phẩm
        $albumImages = DB::table('album_anh')->where('album_sp_id', $san_pham_id)->get();
        foreach ($albumImages as $image) {
            $albumImagePath = public_path('images/product/' . $image->album_sp);
            if (File::exists($albumImagePath)) {
                File::delete($albumImagePath);
            }
        }

        // Xóa các bản ghi trong bảng album_anh liên quan đến sản phẩm
        DB::table('album_anh')->where('album_sp_id', $san_pham_id)->delete();
        $product->delete();
        return redirect()->back()->with('status','Xóa san phẩm thành công');
    }
    public function deleteImage(ProductImage $image)
    {
        $img_name = $image->album_sp;
        if ($image->delete()) {
            $image_path = public_path('images/product').'/'.$img_name;
            if (file_exists($image_path)) {
                unlink($image_path);
            }

            return redirect()->back()->with('ok','Xóa ảnh thành công');
        }

        return redirect()->back()->with('no','Đã xảy ra lỗi, vui lòng thử lại');

    }
}
