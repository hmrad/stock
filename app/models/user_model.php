<?php

class user_model extends model {
    public function __construct() {
        parent::__construct();
    }

    public function insert($name,$email,$password) {

        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO user(name,email,password) VALUES (?,?,?)";

        $data = [
            ['type'=>'s','value'=>$name],
            ['type'=>'s','value'=>$email],
            ['type'=>'s','value'=>$password_hash],
        ];
        
        if(!$this->exeQuery($query,$data)) {
            return $this->connection->insert_id;
        }
    }

    public function is_user_exists_login($email,$password) {
        $query = "SELECT * FROM user WHERE email=? LIMIT 0,1";

        $data = [
            ['type'=>'s','value'=>$email],
        ];
        $result = $this->exeQuery($query,$data);
        if($result->num_rows > 0) {
            $user = $result->fetch_assoc();

            if(password_verify($password,$user['password'])) {
                return ['status'=>true,'result'=> $user];
            } else {
                echo "login failed";
                return ['status'=>false,'result'=> "ERROR"];
            }
        }
    }


}