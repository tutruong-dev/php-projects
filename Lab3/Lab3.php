<?php
  $dthu="10000000    12000000    15000000    11000000    16000000    17000000    14000000    11000000    12500000    16500000    13000000    10000000";

  $arr_doanhthu = explode("    ", $dthu);
  // print_r($arr_doanhthu);
  echo "Bài 1 <br>";
  echo"Cau a <br>";
  // đổi chuỗi str về số
  for ($i = 0; $i < count($arr_doanhthu); $i++){
      $arr_doanhthu[$i] = (float) $arr_doanhthu[$i];  
  }
  $min_doanhthu = $arr_doanhthu[0];
  $max_doanhthu = $arr_doanhthu[0];
  $sum_doanhthu = 0;
  $min_thang = 1;
  $max_thang = 1;

  for ($i = 0; $i < count($arr_doanhthu); $i++){
    //Tính tổng doanh thu 12 tháng
    $sum_doanhthu += $arr_doanhthu [$i];

    //Tim doanh thu cao nhat va luu lai chi so
    if ($arr_doanhthu[$i]>$max_doanhthu){
      $max_doanhthu = $arr_doanhthu[$i];
      $max_thang = $i+1;}

    //Tim doanh thu thap nhat va luu lai chi so
    if ($arr_doanhthu[$i]<$min_doanhthu){
      $min_doanhthu = $arr_doanhthu[$i];
      $min_thang = $i+1;
    }
  }
  
  //Tim doanh thu trung binh
  $avg_doanhthu = (float)$sum_doanhthu/(float)sizeof($arr_doanhthu);
  
  echo "Thống kê doanh thu như sau: <br>doanh thu thấp nhất (tháng ".$min_thang."), <br>doanh thu cao nhất (tháng ".$max_thang."), <br>doanh thu trung bình ".$avg_doanhthu."<br><br>";

  echo"Cau b <br>";
  $b_arr = array("Jan"=> 10000000,
  "Feb" => 12000000,
  "Mar:" => 15000000,
  "Apr:" => 11000000,
  "May:" => 16000000,
  "Jun:" => 17000000,
  "Jul:" => 14000000,
  "Aug" => 11000000,
  "Sep" => 12500000,
  "Oct" => 16500000,
  "Nov" => 13000000,
  "Dec" => 10000000);

  $minb_doanhthu = 0;
  $maxb_doanhthu = 0;
  $sumb_doanhthu = 0;
  $minb_thang = 1;
  $maxb_thang = 1;

  foreach ($b_arr as $month => $doanhthu){
    $sumb_doanhthu += $doanhthu;

    //Tim doanh thu cao nhat va luu lai chi so
    if ($doanhthu>$maxb_doanhthu){
      $maxb_doanhthu = $doanhthu;
      $maxb_thang = $month;}

    //Tim doanh thu thap nhat va luu lai chi so
    if ($doanhthu<$minb_doanhthu){
      $minb_doanhthu = $doanhthu;
      $minb_thang = $month;
    }
  }
   
  //Tim doanh thu trung binh
  $avgb_doanhthu = (float)$sumb_doanhthu/(float)sizeof($b_arr);
  echo "Thống kê doanh thu như sau: <br>doanh thu thấp nhất (tháng ".$minb_thang."), <br>doanh thu cao nhất (tháng ".$maxb_thang."), <br>doanh thu trung bình ".$avgb_doanhthu."<br><br>";

//Bài 2. (Function)

echo "Cau 2 <br>";
echo "Cau a <br>";
function doanhThuThapNhat($arr_doanhthu){
  $min_doanhthu = $arr_doanhthu[0];
  $min_thang = 1;
   //Tim doanh thu thap nhat va luu lai chi so
   for ($i = 0; $i < count($arr_doanhthu); $i++){
      if ($arr_doanhthu[$i]<$min_doanhthu){
        $min_doanhthu = $arr_doanhthu[$i];
        $min_thang = $i+1;
      }
     
  }
  return $min_thang;
}
function doanhThuCaoNhat($arr_doanhthu){
  $max_doanhthu = $arr_doanhthu[0];
  $max_thang = 1;
   //Tim doanh thu thap nhat va luu lai chi so
   for ($i = 0; $i < count($arr_doanhthu); $i++){
      if ($arr_doanhthu[$i]>$max_doanhthu){
        $max_doanhthu = $arr_doanhthu[$i];
        $max_thang = $i+1;
      }
      
  }
  return $max_thang;

}

function doanhThuTrungBinh($arr_doanhthu){
  
  $sum_doanhthu = 0;
  for ($i = 0; $i < count($arr_doanhthu); $i++){
     //Tính tổng doanh thu 12 tháng
     $sum_doanhthu += $arr_doanhthu [$i];
  }
  $avg_doanhthu = (float)$sum_doanhthu/(float)sizeof($arr_doanhthu);
  return $avg_doanhthu;
}
//In ra cau a
echo "Thống kê doanh thu như sau: <br>doanh thu thấp nhất (tháng ".doanhThuThapNhat($arr_doanhthu)."), <br>doanh thu cao nhất (tháng ".doanhThuCaoNhat($arr_doanhthu)."), <br>doanh thu trung bình ".doanhThuTrungBinh($arr_doanhthu)."<br><br>";

//b. Đối với dữ liệu được cho ở Bài 1b, thiết kế các hàm tenThangDoanhThuThapNhat(), tenThangDoanhThuCaoNhat() để hiển thị tên tháng có doanh thu thấp nhất, tên tháng có doanh thu cao nhất.
function tenThangDoanhThuThapNhat($b_arr){
  $minb_doanhthu = 0;
  $minb_thang = 1;
 
  foreach ($b_arr as $month => $doanhthu){
    //Tim doanh thu thap nhat va luu lai chi so
    if ($doanhthu<$minb_doanhthu){
      $minb_doanhthu = $doanhthu;
      $minb_thang = $month;
    }
  }
  return $minb_thang;
}
echo "cau b <br>";
function tenThangDoanhThuCaoNhat($b_arr){
  $maxb_doanhthu = 0;
  $maxb_thang = 1;
  foreach ($b_arr as $month => $doanhthu){
    //Tim doanh thu thap nhat va luu lai chi so
    if ($doanhthu>$maxb_doanhthu){
      $maxb_doanhthu = $doanhthu;
      $maxb_thang = $month;
    }
  }
  return $maxb_thang;
}
echo "Thống kê doanh thu như sau: <br>doanh thu thấp nhất (tháng ".tenThangDoanhThuThapNhat($b_arr).") <br>doanh thu cao nhất(tháng ".tenThangDoanhThuCaoNhat($b_arr).")<br><br>";


// Câu 3

?>