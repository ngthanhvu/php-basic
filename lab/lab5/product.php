<?php
class Product
{
     public $id;
     public $name;
     public $price;
     public $description;

     function __construct($id, $name, $description, $price)
     {
          $this->id = $id;
          $this->name = $name;
          $this->description = $description;
          $this->price = $price;
     }

     #get
     function get_id()
     {
          return $this->id;
     }

     function get_name()
     {
          return $this->name;
     }

     function get_price()
     {
          return $this->price;
     }

     function get_description()
     {
          return $this->description;
     }

     #set
     function set_id($id)
     {
          return $this->id = $id;
     }

     function set_name($name)
     {
          return $this->name = $name;
     }

     function set_description($description)
     {
          return $this->description = $description;
     }

     function set_price($price)
     {
          $this->price = $price;
     }

     #Validate
     function validate()
     {
          $errors = array();

          if (empty($this->id)) {
               $errors[] = "ID là bắt buộc.";
          }

          if (empty($this->name)) {
               $errors[] = "Tên là bắt buộc.";
          }

          if (empty($this->price)) {
               $errors[] = "Giá là bắt buộc.";
          } elseif (!is_numeric($this->price)) {
               $errors[] = "Giá phải là số";
          }

          return $errors;
     }
}

// Sử dụng:
$apple = new Product("1", "grg", "Đây là trái táo", 199000);
$errors = $apple->validate();
if (empty($errors)) {
     echo "ID: " . $apple->get_id() . "<br>";
     echo "Tên sản phẩm: " . $apple->get_name() . "<br>";
     echo "Mô tả sản phẩm: " . $apple->get_description() . "<br>";
     echo "Giá sản phẩm: " . $apple->get_price() . "<br>";
} else {
     foreach ($errors as $error) {
          echo $error . "<br>";
     }
}
