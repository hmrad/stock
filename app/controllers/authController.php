<?php

class authController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function register() {
        $this->header('header');
        $this->view("auth/register_page");
        $this->footer('footer');
    }

    public function register_user() {
        $name = strip_tags($_POST['name'], FILTER_SANITIZE_ENCODED);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $password = $_POST['password'];
        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;
      
        $user = $this->model('user_model');
        // var_dump($user);
        // exit();
        
        $user_id = $user->insert($name,$email,$password);
        // var_dump($user_id);
        if($user_id != 0) {
            $_SESSION['user_id'] = $user_id;
            header('Location:'.URL.'auth/login');
            $this->alert('Register success');
        }

    }
    public function login() {
        $this->header('header');
        $this->view('auth/login_page');
        $this->footer('footer');
}

    public function login_user(){
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $password = $_POST['password'];

        $user = $this->model('user_model');
        $result = $user->is_user_exists_login($email,$password);
        if($result['status']) {
            $_SESSION['user_id'] = $result['result']['user_id'];
            $_SESSION['name'] = $result['result']['name'];
            $this->alert('Login success');
            header('Location:'.URL.'dashboard/profile_page');
        } else {
            $this->alert('Login failed');
            header('Location:'.URL.'auth/login');
        }
        $_SESSION['email'] = $email;
        $company = $this->model('company_model');
        $yep = $company->get_data($_SESSION['user_id']);
        $_SESSION['company_name'] = $yep['name'];

}

    public function logout() {
        session_destroy();
        session_start();
        header('Location:'.URL);
    }
}
