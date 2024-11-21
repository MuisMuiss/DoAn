 @include('user.layout.header')

 <div class="container-fluid py-5">
     <div class="container py-5">
         <div class="table-responsive" style="margin-top:100px">
             <table class="table">
                 <thead>
                     <tr>
                         <th scope="col">Products</th>
                         <th scope="col">Name</th>
                         <th scope="col">Price</th>
                         <th scope="col">Quantity</th>
                         <th scope="col">Total</th>
                         <th scope="col">Handle</th>
                     </tr>
                 </thead>
                 <tbody>
                     @foreach($cartItems as $item)
                     <!-- <tr>
         <td>
             <img src=" {{asset('images/product/' .$item->product->hinh_anh) }}" style="width: 80px;">
         </td>
         <td>{{ $item->product->ten_san_pham }}</td>
         <td>{{ number_format($item->price) }} đ</td>
         <td>
             <form action="" method="POST">
                 @csrf
                 <input type="number" name="quantity" value="{{ $item->so_luong }}" min="1" class="form-control w-50">
                 <button type="submit" class="btn btn-primary btn-sm mt-2">Cập Nhật</button>
             </form>
         </td>
         <td>{{ number_format($item->price * $item->quantity, 0, ',', '.') }} đ</td>
         <td>
             <form action="" method="POST">
                 @csrf
                 @method('DELETE')
                 <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
             </form>
         </td>
     </tr> -->
                     <tr>
                         <th scope="row">
                             <div class="d-flex align-items-center">
                                 <img src=" {{asset('images/product/' .$item->product->hinh_anh) }}" style="width: 80px; height: 80px;" alt="">
                             </div>
                         </th>
                         <td>
                             <p class="mb-0 mt-4">{{ $item->product->ten_san_pham }}</p>
                         </td>
                         <td>
                             <p class="mb-0 mt-4">{{ number_format ($item->product->gia, 0, ',', '.') }} đ</p>
                         </td>
                         <td>
                             <p class="mb-0 mt-4">{{ number_format ($item->product->gia * $item->so_luong, 0, ',', '.') }}đ</p>
                         </td>
                         <td>
                             <div class="input-group quantity mt-4" style="width: 100px;">
                                 <div class="input-group-btn">
                                     <button class="btn btn-sm btn-minus rounded-circle bg-light border">
                                         <i class="fa fa-minus"></i>
                                     </button>
                                 </div>
                                 <input type="text" class="form-control form-control-sm text-center border-0" value="{{$item->so_luong}}">
                                 <div class="input-group-btn">
                                     <button class="btn btn-sm btn-plus rounded-circle bg-light border">
                                         <i class="fa fa-plus"></i>
                                     </button>
                                 </div>
                             </div>
                         </td>

                         <td>
                             <button class="btn btn-md rounded-circle bg-light border mt-4">
                                 <i class="fa fa-times text-danger"></i>
                             </button>
                         </td>

                     </tr>
                     @endforeach
                 </tbody>

             </table>
         </div>
     </div>
 </div>
 @include('user.layout.footer')