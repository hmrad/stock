<?php

class inventory_model extends model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function is_inventory_exists($name) {
        $query = 'SELECT * FROM inventory WHERE name=? LIMIT 0,1';

        $data = [
            ['type'=>'s', 'value'=>$name]
        ];

        $result = $this->exeQuery($query, $data);

        if($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if($user['name'] === $name) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function insert($name,$address,$capacity,$company_id) {
        $query = "INSERT INTO inventory(name,address,capacity,company_id) VALUES (?,?,?,?)";

        $data = [
            ['type'=>'s','value'=>$name],
            ['type'=>'s','value'=>$address],
            ['type'=>'s','value'=>$capacity],
            ['type'=>'i','value'=>$company_id]
        ];
        if(!$this->exeQuery($query,$data)) {
            return $this->connection->insert_id;
        }
    }

    public function get_inventory($company_id) {
        $query = 'SELECT * FROM inventory where company_id=?';
        $data = [
            ['type' => 'i', 'value' => $company_id]
        ];

        $result = $this->exeQuery($query, $data)->fetch_all($s = MYSQLI_ASSOC);
        return $result;
    }

    public function get_inventory_byname($inventory_name) {
        $query = 'SELECT * FROM inventory where name=?';
        $data = [
            ['type' => 's', 'value' => $inventory_name]
        ];

        $result = $this->exeQuery($query, $data)->fetch_all($s = MYSQLI_ASSOC);
        return $result;
    }

    public function get_capacity($inventory_id) {
        $query = 'SELECT * from inventory where inventory_id=?';
        $data = [
            ['type' => 'i', 'value' => $inventory_id]
        ];

        $result = $this->exeQuery($query, $data)->fetch_all($s = MYSQLI_ASSOC);;
        return $result['0']['capacity'];
    }

    public function inventory_update($count,$inventory_id) {
        $query = 'UPDATE inventory SET capacity=? WHERE inventory_id=?';
        $p = $this->get_capacity($inventory_id) - $count;
        
        $data = [
            ['type'=>'i','value'=>$p],
            ['type'=>'i','value'=>$inventory_id]
        ];
        if($p>=0) {
            $result = $this->exeQuery($query, $data);
            return ['result' => 0];
        } else {
            return ['result' => 1];
        }
    }
}