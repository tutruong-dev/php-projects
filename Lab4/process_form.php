<?php include "layout.php"; ?>


<?php define("PAGE_TITLE", "About us");?>
<?php // "opening" HTML for the template ?>
<?php template_header();?>
<?php
// Dữ liệu doanh thu cho mỗi tháng
$doanhThu = [
    "Jan" => 10000000,
    "Feb" => 12000000,
    "Mar" => 15000000,
    "Apr" => 13000000,
    "May" => 14000000,
    "Jun" => 17000000,
    "Jul" => 16000000,
    "Aug" => 11000000,
    "Sep" => 12500000,
    "Oct" => 13500000,
    "Nov" => 14500000,
    "Dec" => 15500000,
];

// Nhận dữ liệu từ form
$month = isset($_GET['month']) ? $_GET['month'] : '';
$stat = isset($_GET['stat']) ? $_GET['stat'] : '';

// Xử lý kết quả theo tháng được chọn
if ($month != '') {
    if (array_key_exists($month, $doanhThu)) {
        $monthNumber = date('n', strtotime($month)); // Lấy số tháng
        echo "Tháng $monthNumber - " . ucfirst(strtolower($month)) . ": doanh thu " . $doanhThu[$month] . "<br>";
    } else {
        echo "Không có thông tin doanh thu cho tháng này.<br>";
    }
}

// Xử lý kết quả thống kê doanh thu
if ($stat == 'max') {
    $maxMonth = array_search(max($doanhThu), $doanhThu); // Tìm tháng có doanh thu cao nhất
    $maxDoanhThu = max($doanhThu);  // Doanh thu cao nhất
    $maxMonthNumber = date('n', strtotime($maxMonth)); // Số tháng cao nhất
    echo "Doanh thu cao nhất - Tháng $maxMonthNumber ($maxMonth): " . $maxDoanhThu . "<br>";
} elseif ($stat == 'min') {
    $minMonth = array_search(min($doanhThu), $doanhThu); // Tìm tháng có doanh thu thấp nhất
    $minDoanhThu = min($doanhThu);  // Doanh thu thấp nhất
    $minMonthNumber = date('n', strtotime($minMonth)); // Số tháng thấp nhất
    echo "Doanh thu thấp nhất - Tháng $minMonthNumber ($minMonth): " . $minDoanhThu . "<br>";
}
?>

<?php // "closing" HTML for the template ?>
<?php template_footer();?>