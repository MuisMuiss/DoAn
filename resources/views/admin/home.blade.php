@include('admin.autth.head')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <!-- Content Row -->
    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Sản phẩm</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $soLuongSP }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Tổng doanh thu</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ number_format($tongDoanhThu, 0, ',', '.') }} VNĐ</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Đơn hàng
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $soLuongDH }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Nhập hàng</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $soLuongNH }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-box-open fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->

    <div class="row">
        <!-- Bar Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Tổng doanh thu</h6>
                    <div class="dropdown no-arrow">
                        {{-- <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a> --}}
                        {{-- <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                            aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Doanh thu theo:</div>
                            <a class="dropdown-item" href="#day">Tháng</a>
                            <hr>
                            <a class="dropdown-item" href="#month">Tháng</a>
                            <a class="dropdown-item" href="#year">Năm</a>
                        </div> --}}
                        {{-- <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Doanh thu theo:</div>
                            @foreach ($doanhThuNam as $year => $months)
                                <a class="dropdown-item" href="#" data-type="year" data-key="{{ $year }}">Năm {{ $year }}</a>
                            @endforeach
                            @foreach ($doanhThuThang as $monthKey => $days)
                                <a class="dropdown-item" href="#" data-type="month" data-key="{{ $monthKey }}">Tháng {{ $monthKey }}</a>
                            @endforeach
                        </div> --}}
                        <select id="yearDropdown" class="form-control">
                            @foreach ($years as $year)
                                <option value="{{ $year }}">Năm {{ $year }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-bar">
                        <canvas id="myBarChart"></canvas>
                    </div>
                    <button id="backButton" class="btn btn-secondary"><i class="fas fa-arrow-left"></i></button>
                </div>

            </div>
        </div>

        <!-- Thống kê -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Thống kê theo danh mục sản phẩm</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                    </div>
                </div>

                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <canvas id="myPieChart"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                        <!-- Các phân loại sản phẩm -->
                        @foreach ($categories as $category)
                            <span class="mr-2">
                                <i class="fas fa-circle"
                                    style="color: {{ $loop->iteration % 2 == 0 ? '#1cc88a' : '#4e73df' }};"></i>
                                {{ $category->ten_danh_muc }} ({{ $category->total_san_phams }})
                            </span>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->


<!-- End of Main Content -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var categories = @json($categories);
    var labels = categories.map(function(category) {
        return category.ten_danh_muc || 'Chưa xác định';
    });
    var data = categories.map(function(category) {
        return category.total_san_phams || 0;
    });
    // Biểu đồ tròn
    var ctx = document.getElementById("myPieChart");
    var myPieChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: labels,
            datasets: [{
                data: data,
                backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc', '#f6c23e', '#e74a3b'],
                hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf', '#e0a800', '#e74a3b'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
        },
        options: {
            maintainAspectRatio: false,
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
            },
            legend: {
                display: false
            },
            cutoutPercentage: 80,
        },
    });
</script>
{{-- <script>
    var doanhThuNgay = @json($doanhThuNgay);
    var doanhThuThang = @json($doanhThuThang);
    var doanhThuNam = @json($doanhThuNam);
    var myBarChart;

    function updateChart(type) {
        let labels = [];
        let data = [];

        if (type === 'day') {
            labels = Object.keys(doanhThuNgay);
            data = Object.values(doanhThuNgay);
        } else if (type === 'month') {
            labels = doanhThuThang.map(item => item.nam + '-' + item.thang);
            data = doanhThuThang.map(item => item.doanh_thu);
        } else if (type === 'year') {
            labels = Object.keys(doanhThuNam);
            data = Object.values(doanhThuNam);
        }

        console.log('Labels:', labels);
        console.log('Data:', data);

        // Cập nhật biểu đồ
        updateChartData(labels, data);
    }

    function updateChartData(labels, data) {
        var ctx = document.getElementById("myBarChart");
        if (myBarChart) {
            myBarChart.destroy();
        }
        myBarChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: "Doanh thu",
                    backgroundColor: "#4e73df",
                    hoverBackgroundColor: "#2e59d9",
                    borderColor: "#4e73df",
                    data: data,
                }],
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                },
                scales: {
                    x: {
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            maxTicksLimit: 6
                        },
                        maxBarThickness: 25,
                    },
                    y: {
                        ticks: {
                            min: 0,
                            maxTicksLimit: 5,
                            padding: 10,
                            callback: function(value) {
                                return '$' + value.toLocaleString(); // Định dạng giá trị
                            }
                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        }
                    },
                },
                legend: {
                    display: false
                },
                tooltips: {
                    titleMarginBottom: 10,
                    titleFontColor: '#6e707e',
                    titleFontSize: 14,
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                    callbacks: {
                        label: function(tooltipItem, chart) {
                            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                            return datasetLabel + ': ' + tooltipItem.yLabel.toLocaleString() +
                            'VNĐ'; // Định dạng tooltip
                        }
                    }
                },
            }
        });
    }
    updateChart('day'); // Mặc định là doanh thu theo ngày
    document.querySelectorAll('.dropdown-menu .dropdown-item').forEach(item => {
        item.addEventListener('click', (event) => {
            const type = event.target.getAttribute('href')?.replace('#', '');
            if (type) {
                updateChart(type);
            }
        });
    });
</script> --}}

<script>
    var doanhThuNam = @json($doanhThuNam);
    var doanhThuThang = @json($doanhThuThang);
    var myBarChart;

    // Hàm cập nhật dữ liệu biểu đồ
    function updateChart(type, key = null) {
        let labels = [];
        let data = [];
        let yearSelected = key || years[0];
        let monthSelected = key ? key.split('-')[1] : '1';
        if (type === 'year') {
            const months = doanhThuNam[key] || [];
            labels = Array.from({length: 12}, (_, i) => (i + 1) + '/' + yearSelected); // 12 tháng
            data = Array.from({length: 12}, (_, i) => {
                const monthData = months.find(item => item.thang === i + 1);
                return monthData ? monthData.doanh_thu : 0; // Nếu không có dữ liệu thì trả về 0
            });
        } else if (type === 'month') {
            const days = doanhThuThang[key] || [];
            labels = days.map(item => 'Ngày ' + item.ngay + '/' + monthSelected);
            data = days.map(item => item.doanh_thu);
        }

        updateChartData(labels, data);
    }

    // Hàm vẽ biểu đồ
    function updateChartData(labels, data) {
        const ctx = document.getElementById("myBarChart");
        if (myBarChart) {
            myBarChart.destroy();
        }
        myBarChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: "Doanh thu",
                    backgroundColor: "#4e73df",
                    hoverBackgroundColor: "#2e59d9",
                    borderColor: "#4e73df",
                    data: data,
                }],
            },
            options: {
                maintainAspectRatio: false,
                scales: {
                    x: {
                        ticks: {
                            maxTicksLimit: 12
                        }
                    },
                    y: {
                        ticks: {
                            callback: value => value.toLocaleString() + ' VNĐ'
                        }
                    }
                },
                tooltips: {
                    callbacks: {
                        label: (tooltipItem, chart) => {
                            const label = chart.datasets[tooltipItem.datasetIndex].label || '';
                            const value = tooltipItem.yLabel || 0;
                            return label + ': ' + value.toLocaleString() + ' VNĐ';
                        }
                    }
                }
            }
        });
    }

    // Mặc định hiển thị năm đầu tiên (nếu có dữ liệu)
    const defaultYear = Object.keys(doanhThuNam)[0] || currentYear.toString();
    yearDropdown.value = defaultYear;
    updateChart('year', defaultYear);

    // Lắng nghe sự kiện chọn năm
    yearDropdown.addEventListener('change', function() {
        updateChart('year', this.value);
    });
    document.getElementById('backButton').addEventListener('click', function() {
        const selectedYear = yearDropdown.value;
        //updateChart('year', selectedYear); // Quay lại doanh thu theo năm
        location.reload(); // Tải lại trang
        
    })
    
    // Lắng nghe click vào cột tháng (Chỉ cho phép click vào cột tháng, không cho click vào ngày)
    document.getElementById('myBarChart').onclick = function(evt) {
        // Lấy các điểm gần nhất được click
        const activePoints = myBarChart.getElementsAtEventForMode(evt, 'nearest', {
            intersect: true
        }, true);
        if (activePoints.length > 0) {
            const index = activePoints[0].index; // Chỉ số cột
            const selectedMonth = index + 1; // Tháng được chọn
            const selectedYear = yearDropdown.value;

            // Kiểm tra nếu cột được click là cột tháng, tránh click vào cột ngày
            if (index < 12) { // Giới hạn chỉ cho phép click vào 12 cột (12 tháng)
                const key = `${selectedYear}-${selectedMonth}`;
                // Cập nhật doanh thu theo ngày của tháng đó
                updateChart('month', key);
            }
        }
    };
</script>


<!-- Footer -->
@include('admin.autth.footer')
