<?php 
use LDAP\Result;


class dashboardController extends controller {
    public function __construct() {
        parent::__construct();
    }

    public function dashboard(){
        $this->header('header');
        $this->view("dashboard/main_page",$this->inventory_products_display());
        $this->footer('footer');
    }

    public function dashboard_profile(){
        $this->header("header");
        $this->view("dashboard/profile_page");
        $this->footer("footer");
    }

    public function dashboard_inventory(){
        $this->header("header");
        $this->view("dashboard/inventory_page",$this->inventory_products_display());
        $this->footer("footer");
    }

    public function dashboard_product(){
        $this->header("header");
        $this->view("dashboard/product_page",$this->inventory_products_display());
        $this->footer("footer");
    }

    public function inventory_products_display() {
        $company = $this->model('company_model');
        $result = $company->get_data($_SESSION['user_id']);
        $inventories = $this->model('inventory_model');
        $result1 = $inventories->get_inventory($result['company_id']);
        $products = $this->model('product_model');
        $result2 = $products->get_products($result['company_id']);

        $data = [
            'inventories' => $result1,
            'products' => $result2
        ];
        return $data;
    }

    public function company_set(){
        $company_name = strip_tags($_POST['company_name']);
        $user_id = $_SESSION['user_id'];
        
        $company = $this->model('company_model');

        if(!$company->is_company_exists($user_id,$company_name)) {
            $insert_id_company = $company->insert($company_name,$user_id);
            $_SESSION['company_name'] = $company_name;
            header('Location:'.URL.'dashboard/profile_page');
            $this->alert('Company setted successfully');
        } else {
            $this->alert('there is already a company name, you cant change it');
        }
    }

    public function inventory_set() {
        $inventory_name = strip_tags($_POST['name']);
        $inventory_address = strip_tags($_POST['address']);
        $inventory_capacity = strip_tags($_POST['capacity']);

        $company = $this->model('company_model');
        // var_dump($_SESSION['user_id']);
        // return;
        $result = $company->get_data($_SESSION['user_id']);
        // var_dump($result);
        // return;
        $inventory = $this->model('inventory_model');


        if(!$inventory->is_inventory_exists($inventory_name)) {
            $insert_id_inventory = $inventory->insert($inventory_name,$inventory_address,$inventory_capacity,$result['company_id']);
            // $company_id;
            header('Location:'.URL.'dashboard/inventory_page');
            $this->alert('Inventory setted successfully');
        } else {
            header('Location:'.URL.'dashboard/inventory_page');
            $this->alert('there is another inventory with this name, change it');
        }   
    }
    public function product_set() {

        $product_name = strip_tags($_POST['name']);
        $product_price = strip_tags($_POST['price']);
        $product_capacity = strip_tags($_POST['count']);
        $date_input = strip_tags($_POST['date_input']);
        $date_output = strip_tags($_POST['date_output']);
        $inventory_name = strip_tags($_POST['inventory_name']);

        $inventory = $this->model('inventory_model');
        $result = $inventory->get_inventory_byname($inventory_name);


        $product = $this->model('product_model');
        if(!$product->is_product_exists($product_name)) {

            $update_inventory = $inventory->inventory_update($product_capacity, $result['0']['inventory_id']);
            if($update_inventory['result'] == 0) {
                $insert_id_product = $product->insert($product_name,$product_price,$product_capacity,$date_input,$date_output,$result['0']['inventory_id']);
            } else {

            }
            header('Location:'.URL.'dashboard/product_page');
            $this->alert('Product setted successfully');
        } else {
            header('Location:'.URL.'dashboard/product_page');
            $this->alert('there is another product with this name, change it');
        }
    }
}