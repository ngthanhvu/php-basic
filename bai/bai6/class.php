<?php

class sinhVien
{
     public $mssv;
     public $ten;
     public $sdt;
     public $nganh;
     public $diemtb;

     // hàm khởi tạo
     function __construct($mssv, $ten, $sdt, $nganh, $diemtb)
     {
          $this->mssv = $mssv;
          $this->ten = $ten;
          $this->sdt = $sdt;
          $this->nganh = $nganh;
          $this->diemtb = $diemtb;
     }

     function get_diemtb()
     {
          return $this->diemtb;
     }

     function set_diemtb($diemtb)
     {
          return $this->diemtb = $diemtb;
     }

     function insinhvien()
     {
          echo "Thông tin sinh viên: <br>";
          echo "mssv = " . $this->mssv . "<br>";
          echo "tên = " . $this->ten . "<br>";
     }
}


// sử dụng
$van = new sinhVien("pk43", 'Văn A', '0434943', 'CNTT', 7.6);
echo $van->get_diemtb();
$van->set_diemtb(10);
echo $van->get_diemtb();
$van->insinhvien();


$test = new sinhVien("pk0443", "Nguyen van a", "940349049", "cntt", 7.5);
$test->insinhvien();


?>
