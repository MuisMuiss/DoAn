<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PayController extends Controller
{
    public function pay(Request $request)
    {
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://127.0.0.1:8000/index"; // URL sau khi thanh toán thành công
        $vnp_TmnCode = "AN54XGW0"; // Mã Merchant tại VNPAY
        $vnp_HashSecret = "4CN8EAHR7GRTJH3T8807C8L1U3OE386L"; // Chuỗi bí mật
    
        $vnp_TxnRef = "10000000"; // Mã đơn hàng (bạn có thể tạo mã này động)
        $vnp_OrderInfo = "Thanh toán hóa đơn"; // Mô tả thanh toán
        $vnp_OrderType = "Sua&Ta"; // Loại đơn hàng
        $vnp_Amount = $request->input('amount'); // Số tiền, tính bằng VND (nhân với 100)
        $vnp_Locale = "VN"; // Ngôn ngữ (Việt Nam)
        $vnp_BankCode = $request->input('bank_code'); // Mã ngân hàng (ví dụ: "NCB")
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR']; // Địa chỉ IP của người dùng
    
        // Chuẩn bị dữ liệu cho VNPAY
        $inputData = [
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        ];
    
        if (!empty($vnp_BankCode)) {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
    
        // Sắp xếp dữ liệu để tạo hash
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
    
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }
    
        // Tạo mã hash bảo mật
        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
    
        // Chuyển hướng tới VnPay
        return redirect()->to($vnp_Url);
    }
}
