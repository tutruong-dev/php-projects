<?php
// Bài 2
// Khởi tạo chuỗi st1

$st1 = "14092023";

// Kiểm tra độ dài của chuỗi st1
if (strlen($st1) == 8) {
    // Tách các phần của chuỗi ngày, tháng, năm
    $day = substr($st1, 0, 2);
    $month = substr($st1, 2, 2);
    $year = substr($st1, 4, 4);

    // Tạo chuỗi ngày tháng năm theo định dạng dd/mm/yyyy
    $formatted_date = $day . '/' . $month . '/' . $year;

    // Hiển thị kết quả
    echo $formatted_date;
} else {
    echo "Chuỗi không hợp lệ!";
}

?>