<?php

namespace Controller;

use Model\ProductDB;

class Home
{
    public function index()
    {
        $product_id = filter_input(INPUT_GET, 'product_id');
        if ($product_id !== null) {
            $product = ProductDB::get_product($product_id);
            if (empty($product)) {
                redirect('index.php');
            }
            include 'view/product.php';
            exit;
        }

        $category_id = filter_input(INPUT_GET, 'category_id');
        if ($category_id !== null) {
            $products = ProductDB::get_products_by_category($category_id);
        } else {
            $products = ProductDB::get_feature_products();
        }
        include 'view/home.php';
    }
}
