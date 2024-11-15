@include("admin.autth.head")
<div class="row">
    <div class="col-md-6">

        <div class="form-group">
            <label for="name">Tên Sản Phẩm</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>

        <div class="form-group">
            <label for="example">Loại Sản Phẩm</label>
            <select name="product_cate" class="form-control input-sm m-bot15">
            @foreach($cate_product as $key => $cate)
                <option Value="1">{{ $cate->ten_loaisp}}</option>
            @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="price">Giá Sản Phẩm</label>
            <input type="text" class="form-control" id="price" name="price"
                value="">
        </div>

        <div class="form-group">
            <label for="price">Mô Tả</label>
            <input type="text" class="form-control" id="price" name="price"
                value="">
        </div>

        <div class="form-group">
            <label for="price">Số Lượng Kho</label>
            <input type="text" class="form-control" id="price" name="price"
                value="">
        </div>

        <div class="form-group">
            <label for="price">Nhà Cung Cấp</label>
            <input type="text" class="form-control" id="price" name="price"
                value="">
        </div>

        <div class="form-group">
            <label for="price">Hình Ảnh</label>
            <input type="text" class="form-control" id="price" name="price"
                value="">
        </div>

        <div class="form-group">
            <label for="price">Ngày Tạo</label>
            <input type="text" class="form-control" id="price" name="price"
                value="">
        </div>
    </div>