<?php
require_once "functions.php";
require_once "DB.php";
class Account extends DB{

    public function __construct(){
        parent::__construct();
    }

    public function genID(){
        $id = randInt(5);
        // $email = $_SESSION['email'];
        while(true){
            $query = $this->select("account", "acc_id", "acc_id='$id'");
            if(count($query) == 0) break;
            else $id = randInt(5);
        }
        return $id;
    }
    
    public function register($regData, $acc_id){
        $name = $regData['name'];
        $email = $regData['email'];
        $birthday = $regData['birthday'];
        $password = $regData['password'];
        $password1 = $regData['password1'];
        $gender = $regData['gender'];
        #$role = $regData['role'];

        $care = $regData['care'];
        // print_r($care);

        $check_email = $this->select("account", "email", "email='$email'");
        if(count($check_email) != 0){
            echo "Email đã được sử dụng. Vui lòng nhập lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
            exit();
        }
        if(strlen($password) < 8){
            echo "Mật khẩu yếu. Vui lòng nhập lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
        }
        if($password != $password1){
            echo "Mật khẩu không trùng khớp. Vui lòng nhập lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
            exit();
        }
        if (!$password || !$email || !$name || !$birthday || !$gender || !$password1 || !$care){
            echo "Vui lòng nhập đầy đủ thông tin. <a href='javascript: history.go(-1)'>Trở lại</a>";
            exit;
        }
        if (!filter_var(trim($email), FILTER_VALIDATE_EMAIL)){
            echo "Email không hợp lệ. Vui lòng nhập email khác. <a href='javascript: history.go(-1)'>Trở lại</a>";
            exit;
        }
              
        //Kiểm tra email đã có người dùng chưa
        // $checkEmail = $this->select("account", "*", "email='$email");
        // if (mysqli_num_rows($checkEmail) > 0){
        //     while($row =  mysqli_fetch_assoc($checkEmail)):
        //         echo "Email này đã có người dùng. Vui lòng chọn Email khác. <a href='javascript: history.go(-1)'>Trở lại</a>";
        //     exit;
        // }
        //Kiểm tra dạng nhập vào của ngày sinh
        // if (!ereg("^[0-9]+/[0-9]+/[0-9]{2,4}", $birthday)){
        //         echo "Ngày tháng năm sinh không hợp lệ. Vui long nhập lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
        //         exit;
        //     }
        if($gender === 'female'){ $gender=0; }
        else $gender = 1;

        try {
            $this->insert("account", array('acc_id' => $acc_id,
                                        'name' => $name,
                                        'password' => _hash($password),
                                        'birthday' => $birthday,
                                        'gender' => $gender,
                                        'stt' => 0,
                                        'email' => $email));
            
            echo "Đăng ký thành công. <a href='?link=home'>Về trang chủ</a>";
            return true;
        }
        catch(Exception $e){
            echo "Lỗi đăng ký. Vui lòng nhập lại.";
            return false;
        }
    }

    public function login($email, $password){
        sessionInit();
        $_SESSION['email'] = $email;
        $_SESSION['pass'] = $password; // hashed password
    }

    public function checkLoggedIn(){
        sessionInit();
        if(!isset($_SESSION['email']) || !isset($_SESSION['pass'])) return false;
        $check = $this->select("account", "*", "email='{$_SESSION['email']}' AND password='{$_SESSION['pass']}'");
        if(count($check) == 1) return true;
        else return false;
    }

    public function checkLock(){
        sessionInit();
        if(!isset($_SESSION['email']) || !isset($_SESSION['pass'])) return false;
        $check = $this->select("account", "*", "email='{$_SESSION['email']}' AND password='{$_SESSION['pass']}'");
        $check = (array)$check[0];
        if($check['stt'] == 1) return true;
        else return false;
    }

    public function logout(){
        sessionInit();
        unset($_SESSION['email']);
        unset($_SESSION['pass']);
    }

    public function UpdateUserInfo($regData){
        $name = $regData['name'];
        $email = $regData['email'];
        $birthday = $regData['birthday'];
        $gender = $regData['gender'];
        sessionInit();
        $email1=$_SESSION['email'];
        try {
            $this->update("account", array(
                                        'name' => $name,
                                        'email' => $email,
                                        'gender' => $gender,
                                        'birthday' => $birthday),"email = '$email1'");
        
            echo "Đăng ký thành công. <a href='?link=home'>Về trang chủ</a>";
            return true;
        }
        catch(Exception $e){
            echo "Lỗi đăng ký. Vui lòng nhập lại.";
            return false;
        }

    }

    public function getUserInfo($email){
        $value = $this->select('account', "*", "email='$email'");
        if(count($value) == 1){
            return (array)$value[0];
        }
        else {
            return false;
        }
    }
}
?>