<?php
// ------------Bai 2----------------
echo "Bai 2<br>";
// Khởi tạo chuỗi st1
$st1 = "ABDBA";
$st1_rev = strrev($st1);
// Kiểm tra st1 là chuỗi đối xứng hay không và in ra
if ($st1 == $st1_rev) 
    echo "Kết quả: Chuỗi $st1 là chuỗi đối xứng";
else{
    echo "Kết quả: Chuỗi $st1 là chuỗi không đối xứng";
}
echo "<br><br>";

// ------------Bai 3----------------
echo "Bai 3<br>";
// Khởi tạo chuỗi st3
$st3 = 'nguyenthanh@husc.edu.vn';
// Tách str3 thành arr phân cách bởi '@' và đưa vào 2 chuỗi user_name và provider 
$arr_st3 = explode("@", $st3);
$user_name = $arr_st3[0];
$provider = $arr_st3[1];
// Hiển thị user_name và procider
echo "$user_name <br>";
echo "$provider";
echo "<br><br>";

// ------------Bai 4----------------
echo "Bai 4<br>";
// Khởi tạo chuỗi st4
$st4 = "https://w3schools.com/web/learn_php/index.php";
// Tìm vị trí cuối cùng của '/' trong đường link
$i = strrpos($st4,"/");
// Lấy chuỗi thành phần cuối cùng của đường link trên 
// substr(string,start,length)
//strlen(string)
$st4_endpart = substr($st4,$i+1,strlen($st4));
// In ra thành phần cuối cùng
echo "$st4_endpart <br>";
//In ra tên file và phần mở rộng
    // Tách st4_endpart thành arr
$file = explode(".",$st4_endpart);
echo "Tên file: $file[0] <br>";
echo "Phần mở rộng: $file[1]";
echo "<br><br>";
// ------------Bai 5----------------
echo "Bai 5<br>";
// Khởi tạo chuỗi st5
$st5 = "aabcccccaaa";
$st5_result = ""; // Chuỗi kết quả nén
$count = 1; // Biến đếm số ký tự lặp lại

// Lặp qua từng ký tự trong chuỗi
for ($d1 = 0; $d1 < strlen($st5); $d1++) {
    // Kiểm tra xem có ký tự tiếp theo không
    if ($d1 < strlen($st5) - 1 && $st5[$d1] == $st5[$d1 + 1]) {
        // Nếu ký tự tiếp theo giống ký tự hiện tại, tăng biến đếm
        $count++;
    } else {
        // Nếu không, thêm ký tự và số lần lặp vào kết quả
        $st5_result .= $st5[$d1] . $count;
        $count = 1; // Reset biến đếm cho ký tự tiếp theo
    }
}
// Hiển thị chuỗi sau khi nén
echo "Chuỗi sau khi nén: $st5_result";
echo "<br><br>";
?>
