<?php
class categories {
     public $id;
     public $name;

     function __construct($id,$name)
     {
          $this->id = $id;
          $this->name = $name;
     }
     #get
     function get_id() {
          return $this->id;
     }
     function get_name() {
          return $this->name;
     }
     #get
     function set_id($id) {
          return $this->id = $id;
     }
     function set_name($name) {
          return $this->name = $name;
     }
     #validate
     function validate() {
          $errors = [];
          if (empty($this->id)) {
               $errors[] = "ID là bắt buộc";
          }
          if (empty($this->name)) {
               $errors[] = "Tên là bắt buộc";
          }
          return $errors;
     }
}

// sử dungj
$danhmuc = new categories("1","thuc pham sach");
$errors = $danhmuc->validate();
if (empty($errors)) {
     echo "ID danh mục: " . $danhmuc->get_id() . "<br>";
     echo "Tên danh mục: " . $danhmuc->get_name() . "<br>";
} else {
     foreach ($errors as $error) {
          echo $error . "<br>";
     }
}


?>