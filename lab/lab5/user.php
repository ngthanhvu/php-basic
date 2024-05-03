<?php

class User
{
     public $id;
     public $username;
     public $email;
     public $password;

     function __construct($id, $username, $email, $password)
     {
          $this->id = $id;
          $this->username = $username;
          $this->email = $email;
          $this->password = $password;
     }
     // get
     function get_id()
     {
          return $this->id;
     }

     function get_username()
     {
          return $this->username;
     }

     function get_email()
     {
          return $this->email;
     }

     function get_password()
     {
          return $this->password;
     }

     // set
     function set_id($id)
     {
          return $this->id = $id;
     }
     function set_username($username)
     {
          return $this->username = $username;
     }
     function set_email($email)
     {
          return $this->email = $email;
     }
     function set_password($password)
     {
          return $this->password = $password;
     }
     // validate
     function login($username, $email, $password)
     {
          if ($this->username == $username && $this->email == $email && $this->password == $password) {
               echo "Đăng nhập thành công";
               return true;
          } else {
               echo "Đăng nhập thất bại";
               return false;
          }
     }
}
// get thông tin
$thanhvu = new User(1, "admin", "vu@gmail.com", "12345");
echo "ID: " . $thanhvu->get_id() . "<br>";
echo "Username: " . $thanhvu->get_username() . "<br>";
echo "Email: " . $thanhvu->get_email() . "<br>";
echo "Password: " . $thanhvu->get_password() . "<br><br>";
// set thông tin
$thanhvu->set_email("tvu@gmail.com");
$thanhvu->set_password("11111");
#kiểm tra
echo "New Email: " . $thanhvu->get_email() . "<br>";
echo "New Password: " . $thanhvu->get_password() . "<br>";
// validate
$thanhvu->login("admin", "tvu@gmail.com", "11111");


