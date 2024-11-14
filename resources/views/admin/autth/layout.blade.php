<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MandD Admin 2</title>

    <link href="{{asset('assets/admin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="{{asset('assets/admin/css/sb-admin-2.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <script src="https://cdn.ckeditor.com/ckeditor5/37.1.0/classic/ckeditor.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            ClassicEditor
                .create(document.querySelector('#editor'), {
                    removeFormat: {
                        elements: 'p',
                        attributes: false,
                        styles: false
                    }
                })
                .then(editor => {
                    // Lấy nội dung khi người dùng nhấn lưu
                    document.getElementById('saveButton').addEventListener('click', function() {
                        let content = editor.getData(); // Lấy dữ liệu từ CKEditor
                        
                        // Loại bỏ thẻ <p> khỏi nội dung
                        content = content.replace(/<\/?p>/g, ''); // Loại bỏ thẻ <p>
                        
                        // Gửi dữ liệu đã xử lý đến máy chủ
                        // Ví dụ sử dụng fetch hoặc AJAX để gửi dữ liệu
                        console.log(content); // Kiểm tra kết quả

                        // Tiến hành gửi content qua AJAX hoặc form submit
                    });
                })
                .catch(error => {
                    console.error(error);
                });
        });
    </script>
</script>
</head>


