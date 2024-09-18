<?php

class product_model extends model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function is_product_exists($name)
    {
        $query = 'SELECT * FROM product WHERE product_name=? LIMIT 0,1';

        $data = [
            ['type' => 's', 'value' => $name]
        ];

        $result = $this->exeQuery($query, $data);

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if ($user['name'] === $name) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function insert($name, $price, $capacity, $input, $output, $inventory_id) {
        $query = "INSERT INTO product(product_name,price,capacity,date_enter,date_exit,inventory_id) VALUES (?,?,?,?,?,?)";

        $data = [
            ['type' => 's', 'value' => $name],
            ['type' => 'i', 'value' => $price],
            ['type' => 'i', 'value' => $capacity],
            ['type' => 's', 'value' => $input],
            ['type' => 's', 'value' => $output],
            ['type' => 'i', 'value' => $inventory_id],
        ];
        if(!$this->exeQuery($query,$data)) {
            return $this->connection->insert_id;
        }
    }

    public function get_products($company_id) {
        $query = 'SELECT product.product_name,product.price,product.capacity,inventory.name
        FROM ((product inner JOIN inventory ON product.inventory_id = inventory.inventory_id) inner JOIN company ON inventory.company_id = company.company_id)
        WHERE company.company_id =?';

        $data = [
            ['type' => 'i', 'value' => $company_id]
        ];
        $result = $this->exeQuery($query, $data)->fetch_all($s = MYSQLI_ASSOC);
        return $result;
    }

}
