<?php


namespace Controller;

use Model\ProductDB;

class Cart
{
    public function add($product_id, $quantity) {
        $product_id = filter_input(INPUT_POST, 'product_id');
        $quantity = filter_input(INPUT_POST, 'quantity');
        if (!is_numeric($quantity) || $quantity <= 0) {
            display_error('Quantity one or more than one');
        }
        $product = ProductDB::get_product($product_id);
        if (empty($product)) {
            redirect('index.php');
        }
        $_SESSION['cart'][$product_id] = $quantity;
        $_SESSION['last_category_id'] = $product['categoryID'];
        $_SESSION['last_category_name'] = $product['categoryName'];
    }

    public function update($product_id, $quantity) {
        $product_id = filter_input(INPUT_POST, 'product_id');
        $quantity = filter_input(INPUT_POST, 'quantity');
        //$items = filter_input(INPUT_POST, 'items');
        $items = $_POST['items'];
        foreach ($items as $product_id => $quantity) {
            if (!is_numeric($quantity) || $quantity < 0) {
                display_error('Quantity zero, one or more than one');
            }

            if ($quantity == 0) {
                self::remove($product_id);
            } else {
                $_SESSION['cart'][$product_id] = $quantity;
            }
        }
    }

    public function remove($product_id){
        $product_id = filter_input(INPUT_POST, 'product_id');
        unset($_SESSION['cart'][$product_id]);
    }

    public function destroy(){
        unset($_SESSION['cart']);
    }
}