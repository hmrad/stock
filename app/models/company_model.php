<?php

class company_model extends model {

    public function __construct() {
        parent::__construct();
    }

    public function is_company_exists($user_id,) {
        $query = 'SELECT * FROM company WHERE user_id=?';
        $data = [
            ['type'=>'i', 'value'=>$user_id]
        ];
        $result = $this->exeQuery($query, $data);

        if($result->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function insert($name,$user_id) {
        $query = "INSERT INTO company(name,user_id) VALUES (?,?)";
        $data = [
            ['type'=>'s','value'=>$name],
            ['type'=>'i','value'=>$user_id]
        ];
        if(!$this->exeQuery($query,$data)) {
            return $this->connection->insert_id;
        }   
    }

    public function get_data($user_id) {
        $query = 'SELECT * FROM company where user_id =?';

        $data = [
            ['type'=>'i', 'value'=>$user_id]
        ];

        $result = $this->exeQuery($query, $data);

        if($result->num_rows > 0) {
            return $result->fetch_assoc(); 
        }
    }




    // public function is_user_exists($email,$password) {
    //     $query = "SELECT * FROM user WHERE email=? LIMIT 0,1";

    //     $data = [
    //         ['type'=>'s','value'=>$email],
    //     ];

    //     $result = $this->exeQuery($query,$data);
    //     if($result->num_rows > 0) {
    //         $user = $result->fetch_assoc();
    //         if($user['password'] === $password || $user['email'] ===$email) {
    //             header('Location:'.URL.'dashboard/main_page');
    //         } else {
    //             echo "login failed";
    //         }
    //     }
    // }
}