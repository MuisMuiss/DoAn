<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Login</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('assets/admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('assets/admin/css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->

                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Cập nhật thương hiệu</h1>
                            </div>
                            @if (session('status'))
                                <h5 class="alert alert-success">{{ session('status') }}</h5>
                            @endif
                            <form
                                action="{{ route('admin.updatebrand', ['thuong_hieu_id' => $brand->thuong_hieu_id]) }}"
                                class="user" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="">Tên danh mục:</label>
                                    <input type="text" class="form-control" style="font-size: 20px;"
                                        name="ten_thuong_hieu"
                                        value="{{ $brand->ten_thuong_hieu, old('ten_thuong_hieu') }}">
                                    @error('ten_thuong_hieu')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="">Mô tả:</label>
                                    {{-- <input type="text" name="mo_ta" id="" class="form-control" value="{{$product->mo_ta,old('mo_ta')}}"> --}}
                                    <textarea name="mo_ta" class="form-control description" placeholder="Product content">{{ $brand->mo_ta, old('mo_ta') }}</textarea>
                                    @error('mo_ta')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group row">
                                    <button class="btn btn-primary btn-user btn-block" style="width: 40%; margin: 0 auto;" type="submit">Cập nhật</button>
                                <a href="{{ route('brand.all') }}"
                                    class="btn btn-danger btn-user btn-block float-end" style="width: 40%; margin: 0 auto;">Back</a>
                                </div>
                                
                            </form>
                        </div>


                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('assets/admin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('assets/admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('assets/admin/js/sb-admin-2.min.js') }}"></script>

</body>

</html>
