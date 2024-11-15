<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\ProductType;

class ManageController extends Controller
{
    //Danh mục
    public function viewCate(){
        $category = Category::all();
        return view('admin.category',compact('category'));
    }
    public function themcate(){
        $category = Category::all();
        return view('admin.curd.addcate',compact('category'));
    }
    public function addcate(Request $request){
        $messages = [
            'ten_danh_muc.required' => 'Tên danh mục không được để trống.',

        ];
    
        $validatedData = $request->validate([
            'ten_danh_muc' => 'required',
        ], $messages);
        $category= new Category();
        $category->ten_danh_muc=$request->input('ten_danh_muc');
        $category->save();
        return redirect()->back()->with('status','Thêm danh mục thành công');
    }
    public function editcate($danh_muc_id){
        $category=Category::find($danh_muc_id);
        return view('admin.curd.editcate',compact('category'));
    }
    public function updatecate(Request $request,$danh_muc_id){
        $messages = [
            'ten_danh_muc.required' => 'Tên danh mục không được để trống.',

        ];
    
        $validatedData = $request->validate([
            'ten_danh_muc' => 'required',
        ], $messages);
        $category=Category::find($danh_muc_id);
        $category->ten_danh_muc=$request->input('ten_danh_muc');
        $category->save();
        return redirect()->back()->with('status','Cập nhật danh mục thành công');
    }
    public function deletecate($danh_muc_id){
        $category=Category::find($danh_muc_id);
        
        $category->delete();
        return redirect()->back()->with('status','Xóa danh mục thành công');
    }
    //
    //
    //Thương hiệu
    public function viewbrand(){
        $brand = Brand::all();
        return view('admin.brand',compact('brand'));
    }
    public function thembrand(){
        $brand = Brand::all();
        return view('admin.curd.addbrand',compact('brand'));
    }
    public function addbrand(Request $request){
        $messages = [
            'ten_thuong_hieu.required' => 'Tên thương hiệu không được để trống.',
            'mo_ta.required' => 'Mô tả thương hiệu không được để trống.',
        ];
    
        $validatedData = $request->validate([
            'ten_thuong_hieu' => 'required',
            'mo_ta' => 'required',
        ], $messages);
        $brand= new Brand();
        $brand->ten_thuong_hieu=$request->input('ten_thuong_hieu');
        $brand->mo_ta=$request->input('mo_ta');
        $brand->save();
        return redirect()->back()->with('status','Thêm thương hiệu thành công');
    }
    public function editbrand($thuong_hieu_id){
        $brand=Brand::find($thuong_hieu_id);
        return view('admin.curd.editbrand',compact('brand'));
    }
    public function updatebrand(Request $request,$thuong_hieu_id){
        $messages = [
            'ten_thuong_hieu.required' => 'Tên thương hiệu không được để trống.',
            'mo_ta.required' => 'Mô tả thương hiệu không được để trống.',
        ];
    
        $validatedData = $request->validate([
            'ten_thuong_hieu' => 'required',
            'mo_ta' => 'required',
        ], $messages);
        $brand=Brand::find($thuong_hieu_id);
        $brand->ten_thuong_hieu=$request->input('ten_thuong_hieu');
        $brand->mo_ta=$request->input('mo_ta');
        $brand->save();
        return redirect()->back()->with('status','Cập nhật thương hiệu thành công');
    }
    public function deletebrand($thuong_hieu_id){
        $brand=Brand::find($thuong_hieu_id);
        
        $brand->delete();
        return redirect()->back()->with('status','Xóa thương hiệu thành công');
    }
    //
    //
    //Loai sản phẩm
    public function viewtype(){
        $typeproduct = ProductType::all();
        $category = Category::all();
        return view('admin.typeproduct',compact('typeproduct','category'));
    }
    public function themtype(){
        
        $typeproduct = ProductType::all();
        $category = Category::all();
        return view('admin.curd.addtype',compact('typeproduct','category'));
    }
    public function addtype(Request $request){
        $messages = [
            'ten_loaisp.required' => 'Tên loại sản phẩm không được để trống.',
        ];
    
        $validatedData = $request->validate([
            'ten_loaisp' => 'required',  
        ], $messages);
        $typeproduct= new ProductType();
        $typeproduct->ten_loaisp=$request->input('ten_loaisp');
        $typeproduct->danh_muc_id=$request->danh_muc_id ?? 1;
        $typeproduct->save();
        return redirect()->back()->with('status','Thêm loại sản phẩm thành công');
    }
    public function edittype($loai_sp_id){
        $typeproduct=ProductType::find($loai_sp_id);
        $category = Category::all();
        return view('admin.curd.edittype',compact('typeproduct','category'));
    }
    public function updatetype(Request $request,$loai_sp_id){
        $messages = [
            'ten_loaisp.required' => 'Tên loại sản phẩm không được để trống.',
        ];
    
        $validatedData = $request->validate([
            'ten_loaisp' => 'required',
        ], $messages);
        $typeproduct=ProductType::find($loai_sp_id);
        $typeproduct->ten_loaisp=$request->input('ten_loaisp');
        $typeproduct->danh_muc_id=$request->danh_muc_id ?? 1;
        $typeproduct->save();
        return redirect()->back()->with('status','Cập loại sản phẩm thành công');
    }
    public function deletetype($loai_sp_id){
        $typeproduct=ProductType::find($loai_sp_id);
        
        $typeproduct->delete();
        return redirect()->back()->with('status','Xóa loại sản phẩm thành công');
    }

}
