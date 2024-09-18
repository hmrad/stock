<?php 

class Model {
    public $connection = "";
    public function __construct() {
        $this->connection = new mysqli('localhost','root','','stock');
    }

    public function exeQuery($query,$data) {
        $prepare = $this->connection->prepare($query);

        $types = '';
        $values = [];

        if(count($data) > 0) {
            foreach($data as $index => $item) {
                $types .= $item['type'];
                $values[$index] = $item['value'];

             }
             $prepare->bind_param($types ,...$values);
             try {
                $prepare->execute();
             } catch(Exception $e) {
                echo "DatabaseProblem";
                exit();
             }
            
             return $prepare->get_result();
        }
    }

}