<?php



class nguoiDung
{
     public $username;
     public $email;
     public $password;
     public $role;



     function __construct($username, $email, $password, $role)
     {
          $this->username = $username;
          $this->email = $email;
          $this->password = $password;
          $this->role = $role;
     }

     function xuatthongtin()
     {
          echo "Thông tin user<br>";
          echo "Username: " . $this->username . "<br>";
          echo "Email: " . $this->email . "<br>";
          echo "Password: " . $this->password . "<br>";
          echo "Role: " . $this->role . "<br>";
     }

     function get_role()
     {
          return $this->role;
     }

     function set_role($role)
     {
          return $this->role = $role;
     }

     function login($username, $password)
     {
          if ($this->username == $username && $this->password == $password) {
               echo "Login thành công<br>";
               return true;
          } else {
               echo "Login thất bại<br>";
               return false;
          }
     }
}
// use

$newUser = new nguoiDung("admin", "admin@gmail.com", "12321323", "Admin");
$newUser->xuatthongtin();
echo "Role cũ: " . $newUser->get_role() . "<br>";
$newUser->set_role('User');
echo "Role mới: " . $newUser->get_role() . "<br>";

// kiểm tra login
$newUser->login("admin","12321323");

