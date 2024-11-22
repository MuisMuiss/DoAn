<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Brand;
use App\Models\Detailimport;
use App\Models\Import;
use App\Models\nguoiDung;
use App\Models\NhapHang;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\ProductType;

class ManageController extends Controller
{
    //Danh mục
    public function viewCate()
    {
        $category = Category::paginate(5);
        return view('admin.category', compact('category'));
    }
    public function themcate()
    {
        $category = Category::all();
        return view('admin.curd.addcate', compact('category'));
    }
    public function addcate(Request $request)
    {
        $messages = [
            'ten_danh_muc.required' => 'Tên danh mục không được để trống.',

        ];

        $validatedData = $request->validate([
            'ten_danh_muc' => 'required',
        ], $messages);
        $category = new Category();
        $category->ten_danh_muc = $request->input('ten_danh_muc');
        $category->save();
        return redirect()->back()->with('status', 'Thêm danh mục thành công');
    }
    public function editcate($danh_muc_id)
    {
        $category = Category::find($danh_muc_id);
        return view('admin.curd.editcate', compact('category'));
    }
    public function updatecate(Request $request, $danh_muc_id)
    {
        $messages = [
            'ten_danh_muc.required' => 'Tên danh mục không được để trống.',

        ];

        $validatedData = $request->validate([
            'ten_danh_muc' => 'required',
        ], $messages);
        $category = Category::find($danh_muc_id);
        $category->ten_danh_muc = $request->input('ten_danh_muc');
        $category->save();
        return redirect()->back()->with('status', 'Cập nhật danh mục thành công');
    }
    public function deletecate($danh_muc_id)
    {
        $category = Category::find($danh_muc_id);

        $category->delete();
        return redirect()->back()->with('status', 'Xóa danh mục thành công');
    }
    //
    //
    //Thương hiệu
    public function viewbrand()
    {
        $brand = Brand::paginate(5);
        return view('admin.brand', compact('brand'));
    }
    public function thembrand()
    {
        $brand = Brand::all();
        return view('admin.curd.addbrand', compact('brand'));
    }
    public function addbrand(Request $request)
    {
        $messages = [
            'ten_thuong_hieu.required' => 'Tên thương hiệu không được để trống.',
            'mo_ta.required' => 'Mô tả thương hiệu không được để trống.',
        ];

        $validatedData = $request->validate([
            'ten_thuong_hieu' => 'required',
            'mo_ta' => 'required',
        ], $messages);
        $brand = new Brand();
        $brand->ten_thuong_hieu = $request->input('ten_thuong_hieu');
        $brand->mo_ta = $request->input('mo_ta');
        $brand->save();
        return redirect()->back()->with('status', 'Thêm thương hiệu thành công');
    }
    public function editbrand($thuong_hieu_id)
    {
        $brand = Brand::find($thuong_hieu_id);
        return view('admin.curd.editbrand', compact('brand'));
    }
    public function updatebrand(Request $request, $thuong_hieu_id)
    {
        $messages = [
            'ten_thuong_hieu.required' => 'Tên thương hiệu không được để trống.',
            'mo_ta.required' => 'Mô tả thương hiệu không được để trống.',
        ];

        $validatedData = $request->validate([
            'ten_thuong_hieu' => 'required',
            'mo_ta' => 'required',
        ], $messages);
        $brand = Brand::find($thuong_hieu_id);
        $brand->ten_thuong_hieu = $request->input('ten_thuong_hieu');
        $brand->mo_ta = $request->input('mo_ta');
        $brand->save();
        return redirect()->back()->with('status', 'Cập nhật thương hiệu thành công');
    }
    public function deletebrand($thuong_hieu_id)
    {
        $brand = Brand::find($thuong_hieu_id);

        $brand->delete();
        return redirect()->back()->with('status', 'Xóa thương hiệu thành công');
    }
    //
    //
    //Loai sản phẩm
    public function viewtype()
    {
        $typeproduct = ProductType::paginate(5);
        $category = Category::all();
        return view('admin.typeproduct', compact('typeproduct', 'category'));
    }
    public function themtype()
    {

        $typeproduct = ProductType::all();
        $category = Category::all();
        return view('admin.curd.addtype', compact('typeproduct', 'category'));
    }
    public function addtype(Request $request)
    {
        $messages = [
            'ten_loaisp.required' => 'Tên loại sản phẩm không được để trống.',
        ];

        $validatedData = $request->validate([
            'ten_loaisp' => 'required',
        ], $messages);
        $typeproduct = new ProductType();
        $typeproduct->ten_loaisp = $request->input('ten_loaisp');
        $typeproduct->danh_muc_id = $request->danh_muc_id ?? 1;
        $typeproduct->save();
        return redirect()->back()->with('status', 'Thêm loại sản phẩm thành công');
    }
    public function edittype($loai_sp_id)
    {
        $typeproduct = ProductType::find($loai_sp_id);
        $category = Category::all();
        return view('admin.curd.edittype', compact('typeproduct', 'category'));
    }
    public function updatetype(Request $request, $loai_sp_id)
    {
        $messages = [
            'ten_loaisp.required' => 'Tên loại sản phẩm không được để trống.',
        ];

        $validatedData = $request->validate([
            'ten_loaisp' => 'required',
        ], $messages);
        $typeproduct = ProductType::find($loai_sp_id);
        $typeproduct->ten_loaisp = $request->input('ten_loaisp');
        $typeproduct->danh_muc_id = $request->danh_muc_id ?? 1;
        $typeproduct->save();
        return redirect()->back()->with('status', 'Cập nhật loại sản phẩm thành công');
    }
    public function deletetype($loai_sp_id)
    {
        $typeproduct = ProductType::find($loai_sp_id);

        $typeproduct->delete();
        return redirect()->back()->with('status', 'Xóa loại sản phẩm thành công');
    }

    //Quản lý đơn hàng
    public function vieworder()
    {
        $order = Order::paginate(5);
        
        $user = nguoiDung::all();
        $order_item = OrderItem::all();
        return view('admin.donhang.order', compact('order', 'user', 'order_item'));
    }
    public function editorder($don_hang_id)
    {
        $order = Order::find($don_hang_id);
        $user = nguoiDung::all();
        $order_item = OrderItem::all();
        return view('admin.donhang.editorder', compact('order', 'user', 'order_item'));;
    }
    public function updateorder(Request $request, $don_hang_id)
    {
        $messages = [
            'nguoi_dung_id.required' => 'Vui lòng chọn người dùng.',
            'nguoi_dung_id.exists' => 'Người dùng không tồn tại.',
            'trang_thai_don_hang.required' => 'Vui lòng chọn trạng thái đơn hàng.',
            'phuong_thuc_thanh_toan.required' => 'Vui lòng chọn phương thức thanh toán.',
        ];
        $validatedData = $request->validate([
            'nguoi_dung_id' => 'required|exists:nguoi_dungs,nguoi_dung_id',
            'trang_thai_don_hang' => 'required',
            'phuong_thuc_thanh_toan' => 'required',
        ], $messages);
        $order = Order::find($don_hang_id);

        if (!$order) {
            return redirect()->back()->withErrors('Đơn hàng không tồn tại.');
        }
        $order->nguoi_dung_id = $request->nguoi_dung_id;
        $order->trang_thai_don_hang = $request->trang_thai_don_hang ?? 'dang_xu_ly';
        $order->phuong_thuc_thanh_toan = $request->phuong_thuc_thanh_toan ?? 'COD';
        
        $order->save();
        return redirect()->back()->with('success', 'Cập nhật đơn hàng thành công');
    }
    public function deleteorder($don_hang_id)
    {
        $order = Order::find($don_hang_id);

        $order->delete();
        return redirect()->back()->with('success', 'Xóa loại sản phẩm thành công');
    }
    public function viewctorder($don_hang_id)
    {
        $product = Product::all();
    
        $order = Order::find($don_hang_id);
        if (!$order) {
            return redirect()->route('ctorder.all')->with('error', 'Không tìm thấy chi tiết nhập hàng');
        }
        $ct_order = DB::table('chi_tiet_don_hang')
            ->where('don_hang_id', $don_hang_id)
            ->paginate(5);
        // Trả về view với dữ liệu
        return view('admin.donhang.ctorder', compact('order', 'ct_order', 'product',));
    }









    //
    //Quản lý nhập hàng
    public function viewnhap()
    {
        $nhaphang = Import::paginate(5);
        $brand = Brand::all();
        return view('admin.nhaphang.import', compact('nhaphang', 'brand'));
    }
    public function themnhap()
    {
        $brand = Brand::all();
        $nhaphang = Import::all();
        return view('admin.nhaphang.addnh', compact('nhaphang', 'brand'));
    }
    public function addnhap(Request $request)
    {
        $messages = [
            'nhap_hang_id.required' => 'Mã nhập không được để trống.',
            'nhap_hang_id.unique' => 'Mã nhập đã tồn tại.',
            'ngay_nhap.required' => 'Ngày nhập không được để trống.',
            'ngay_nhap.date' => 'Ngày nhập phải là một ngày hợp lệ.'
        ];

        $validatedData = $request->validate([
            'nhap_hang_id' => 'required|unique:nhap_hang,nhap_hang_id',
            'ngay_nhap' => 'required|date',
        ], $messages);
        $import = new Import();
        $import->nhap_hang_id = $request->nhap_hang_id;
        $import->thuong_hieu_nhap = $request->thuong_hieu_nhap ?? 1;
        $import->ngay_nhap = $request->ngay_nhap;
        $import->tong_tien = $request->tong_tien ?? 0;
        $import->save();

        return redirect()->back()->with('success', 'Nhập hàng thành công!');
    }
    //Edit nhập
    public function editnhap($nhap_hang_id)
    {
        $nhaphang = Import::find($nhap_hang_id);
        $brand = Brand::all();
        return view('admin.nhaphang.editnh', compact('nhaphang', 'brand'));
    }
    public function updatenhap(Request $request, $nhap_hang_id)
    {
        $messages = [
            // 'nhap_hang_id.required' => 'Mã nhập không được để trống.',
            // 'nhap_hang_id.unique' => 'Mã nhập đã tồn tại.',
            'ngay_nhap.required' => 'Ngày nhập không được để trống.',
            'ngay_nhap.date' => 'Ngày nhập phải là một ngày hợp lệ.'
        ];

        $validatedData = $request->validate([
            // 'nhap_hang_id' => 'required|unique:nhap_hang,nhap_hang_id,' . $nhap_hang_id . ',nhap_hang_id',
            'ngay_nhap' => 'required|date',
        ], $messages);
        $nhaphang = Import::find($nhap_hang_id);
        $nhaphang->nhap_hang_id = $request->nhap_hang_id;
        $nhaphang->thuong_hieu_nhap = $request->thuong_hieu_nhap ?? 1;
        $nhaphang->ngay_nhap = $request->ngay_nhap;
        $nhaphang->tong_tien = $request->tong_tien ?? 0;
        $nhaphang->save();
        return redirect()->back()->with('success', 'Cập nhập hàng thành công');
    }
    public function deletenhap($nhap_hang_id)
    {
        $nhaphang = Import::find($nhap_hang_id);

        $nhaphang->delete();
        return redirect()->back()->with('success', 'Xóa loại sản phẩm thành công');
    }











    //Chi tiết đơn hàng
    public function viewctnhap($nhap_hang_id)
    {
        $product = DB::table('san_pham')->get();
        $brand = DB::table('thuong_hieu')->orderByDesc('thuong_hieu_id')->get();
        $nhaphang = Import::find($nhap_hang_id);
        if (!$nhaphang) {
            return redirect()->route('ctimport.all')->with('error', 'Không tìm thấy chi tiết nhập hàng');
        }
        $ct_nhap = DB::table('chi_tiet_nhap_hang')
            ->where('nhap_hang_id', $nhap_hang_id)
            ->paginate(5);
        // Trả về view với dữ liệu
        return view('admin.nhaphang.detailnh', compact('nhaphang', 'ct_nhap', 'product', 'brand'));
    }
    public function themctnhap($nhap_hang_id)
    {
        $nhaphang = Import::find($nhap_hang_id);
        $brand = Brand::all();

        $product = Product::all();
        return view('admin.nhaphang.addct', compact('nhaphang', 'brand', 'product'));
    }
    public function addctnhap(Request $request)
    {
        $messages = [
            'so_luong.required' => 'Số lượng không được để trống.',
            'so_luong.integer' => 'Số lượng phải là số nguyên.',
            'so_luong.min' => 'Số lượng phải lớn hơn hoặc bằng 1.',
            'gia_nhap.required' => 'Giá nhập không được để trống.',
            'gia_nhap.numeric' => 'Giá nhập phải là một số hợp lệ.',
            'gia_nhap.min' => 'Giá nhập phải lớn hơn hoặc bằng 0.',
        ];

        $validatedData = $request->validate([
            'nhap_hang_id' => 'required|exists:nhap_hang,nhap_hang_id', // Đảm bảo mã nhập hàng tồn tại
            'san_pham_id' => 'required|exists:san_pham,san_pham_id', // Đảm bảo mã sản phẩm tồn tại
            'thuong_hieu_id' => 'required|exists:thuong_hieu,thuong_hieu_id', // Đảm bảo thương hiệu tồn tại
            'so_luong' => 'required|integer|min:1', // Số lượng phải là số nguyên và lớn hơn 0
            'gia_nhap' => 'required|numeric|min:0',
        ], $messages);
        $detail = new Detailimport();
        $detail->nhap_hang_id = $request['nhap_hang_id'];
        $detail->san_pham_id = $request->san_pham_id ?? 1;
        $detail->thuong_hieu_id = $request->thuong_hieu_id ?? 1;
        $detail->so_luong = $request['so_luong'];
        $detail->gia_nhap = $request['gia_nhap'];
        $detail->save();
        return redirect()
            ->route('ctimport.all', ['nhap_hang_id' => $request['nhap_hang_id']])
            ->with('success', 'Thêm chi tiết nhập hàng thành công!');
    }
    public function editctnhap($id)
    {
        $ct_nhap = Detailimport::find($id);
        $product = Product::all(); // Lấy danh sách sản phẩm
        $brand = Brand::all();
        return view('admin.nhaphang.editct', compact('ct_nhap', 'brand', 'product'));
    }
    public function updatectnhap(Request $request, $id)
    {
        $messages = [
            'so_luong.required' => 'Số lượng không được để trống.',
            'so_luong.integer' => 'Số lượng phải là số nguyên.',
            'so_luong.min' => 'Số lượng phải lớn hơn hoặc bằng 1.',
            'gia_nhap.required' => 'Giá nhập không được để trống.',
            'gia_nhap.numeric' => 'Giá nhập phải là một số hợp lệ.',
            'gia_nhap.min' => 'Giá nhập phải lớn hơn hoặc bằng 0.',
        ];

        $validatedData = $request->validate([
            'so_luong' => 'required|integer|min:1', // Số lượng phải là số nguyên và lớn hơn 0
            'gia_nhap' => 'required|numeric|min:0',
        ], $messages);
        $ct_nhap = Detailimport::find($id);
        $ct_nhap->san_pham_id = $request->san_pham_id ?? 1;
        $ct_nhap->thuong_hieu_id = $request->thuong_hieu_id ?? 1;
        $ct_nhap->so_luong = $request->so_luong;
        $ct_nhap->gia_nhap = $request->gia_nhap;
        $ct_nhap->save();
        return redirect()->back()->with('success', 'Cập nhập chi tiết hàng thành công');
    }
    public function deletectnhap($id)
    {
        $ct_nhap = Detailimport::find($id);
        $ct_nhap->delete();
        return redirect()->back()->with('success', 'Xóa loại chi tiết nhập hàng thành công');
    }
    public function searchTH(Request $request)
    {
        $keyword = $request->input('keyword');
        $brand = Brand::where('ten_thuong_hieu', 'LIKE', "%$keyword%")
            ->orWhere('mo_ta', 'LIKE', "%$keyword%")
            ->paginate(5);

        return view('admin.brand', compact('brand', 'keyword'));
    }
    public function searchDH(Request $request)
    {
        $keyword = $request->input('keyword');
        $user = nguoiDung::all();
        $order = Order::with('User')
        ->where('don_hang_id', 'LIKE', "%$keyword%")
        ->orWhere('trang_thai_don_hang', 'LIKE', "%$keyword%")
        ->orWhere('phuong_thuc_thanh_toan', 'LIKE', "%$keyword%")
        ->orWhereHas('User', function ($query) use ($keyword) {
            $query->where('ho_ten', 'LIKE', "%$keyword%");
        })
        ->paginate(5);

        return view('admin.donhang.order', compact('keyword', 'order','user'));
    }
    public function searchNH(Request $request)
    {
        $keyword = $request->input('keyword');
        $nhaphang = Import::with(['brand'])
            ->where('nhap_hang_id', 'LIKE', "%$keyword%")
            ->orWhereHas('brand', function ($query) use ($keyword) {
                $query->where('ten_thuong_hieu', 'LIKE', "%$keyword%");
            })
            ->paginate(5);

        return view('admin.nhaphang.import', compact('keyword', 'nhaphang'));
    }
}
