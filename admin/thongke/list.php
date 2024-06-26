<?php
// Gọi hàm và truyền vào tham số mặc định
$date = date('Y-m-d');
$now = date('d/m/Y', strtotime($date)); // Sử dụng ngày hiện tại

// Gọi hàm và truyền vào số ngày trước đó
date_default_timezone_set('Asia/Ho_Chi_Minh'); // timezone Việt Nam
$subDays = date('Y-m-d', strtotime('-365 days')); // Lấy ngày 365 ngày trước

function thongke_donhthu($subDays, $now){
    $sql = "SELECT * FROM bill WHERE ngaydat BETWEEN '$subDays' AND '$now' ORDER BY ngaydat ASC";
    $result = pdo_query($sql);
    return $result;
}

$thongkedt = thongke_donhthu($subDays, $now);

$chart_data = array(); // Khởi tạo mảng chart_data trước khi sử dụng
foreach ($thongkedt as $tkdt) {
    if ($tkdt['trangthaitt'] == 1) {
        $chart_data[] = array(
            'date' => date('d/m/Y', strtotime($tkdt['ngaydat'])), // Chuyển định dạng ngày
            'doanhthu' => $tkdt['tongbill']
        );
    }
}
$data = json_encode($chart_data);
?>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {'packages':['bar']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var jsonData = <?php echo $data; ?>; // Dữ liệu từ PHP cần được in ra

        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Date');
        data.addColumn('number', 'Sales');

        for (var i = 0; i < jsonData.length; i++) {
            data.addRow([jsonData[i].date, jsonData[i].doanhthu]);
        }

        var options = {
            chart: {
                title: 'Company Performance',
                subtitle: 'Sales by Date',
            }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));
        chart.draw(data, google.charts.Bar.convertOptions(options));
    }
</script>

<div id="columnchart_material" style="width: 800px; height: 500px;"></div>
