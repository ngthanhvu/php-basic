<?php
class orders {
     public $id;
     public $trangthai;
     public $thoigian_tao;
     public $tonggia;

     function __construct($id,$trangthai,$thoigian_tao,$tonggia)
     {
          $this->id = $id;
          $this->trangthai = $trangthai;
          $this->tonggia = $tonggia;
          $this->thoigian_tao = $thoigian_tao;
     }
     #get
     function get_id() {
          return $this->id;
     }
     function get_trangthai() {
          return $this->trangthai;
     }
     function get_tonggia() {
          return $this->tonggia;
     }
     function get_thoigian_tao() {
          return $this->thoigian_tao;
     }
     #get
     function set_id($id) {
          return $this->id = $id;
     }
     function set_trangthai($trangthai) {
          return $this->trangthai = $trangthai;
     }
     function set_tonggia($tonggia) {
          return $this->tonggia = $tonggia;
     }
     function set_thoi_gian_tao($thoigian_tao) {
          return $this->thoigian_tao = $thoigian_tao;
     }
     #validate
     function validate() {
          $errors = [];
          if (empty($this->id)) {
               $errors[] = "ID là bắt buộc";
          }
          if (empty($this->trangthai)) {
               $errors[] = "Trạng thái là bắt buộc";
          }
          if (empty($this->thoigian_tao)) {
               $errors[] = "Thời gian đặt hàng là bắt buộc";
          }
          if (empty($this->tonggia)) {
               $errors[] = "Tổng giá là bắt buộc";
          }
          else if (!is_numeric($this->tonggia)) {
               $errors[] = "Tổng giá phải là số";
          }
          return $errors;
     }
}

// use
$oder = new orders(1,"Đã mua","2024-02-03",43000);
$errors = $oder->validate();
if (empty($errors)) {
     echo "ID đặt hàng: " . $oder->get_id(). "<br>";
     echo "Trạng đặt hàng: " . $oder->get_trangthai(). "<br>";
     echo "Thời gian đặt hàng: " . $oder->get_thoigian_tao(). "<br>";
     echo "Tổng tiền đặt hàng: " . $oder->get_tonggia(). "<br>";
} else {
     foreach ($errors as $error) {
          echo $error . "<br>";
     }
}
?>