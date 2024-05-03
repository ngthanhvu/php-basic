<?php
class carts {
     public $id;
     public $soluong;

     function __construct($id,$soluong)
     {
          $this->id = $id;
          $this->soluong = $soluong;
     }
     #get
     function get_id() {
          return $this->id;
     }
     function get_soluong() {
          return $this->soluong;
     }
     #get
     function set_id($id) {
          return $this->id = $id;
     }
     function set_soluong($soluong) {
          return $this->soluong = $soluong;
     }
     #validate
     function validate() {
          $errors = [];
          if (empty($this->id)) {
               $errors[] = "ID là bắt buộc";
          }
          if (empty($this->soluong)) {
               $errors[] = "Số lượng là bắt buộc";
          } else if (!is_numeric($this->soluong)) {
               $errors[] = "Số lượng phải là số";
          }
          return $errors;
     }
}
// use
$giohang = new carts(1,5454);
$errors = $giohang->validate();
if (empty($errors)) {
     echo "ID giỏ hàng: " . $giohang->get_id() . "<br>";
     echo "Số lượng hàng: " . $giohang->get_soluong() . "<br>";
} else {
     foreach ($errors as $error) {
          echo $error . "<br>";
     }
}
?>