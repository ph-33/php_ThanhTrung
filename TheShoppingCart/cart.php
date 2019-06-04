<?php
    //add item to the cart
    function add_item($key, $quantity) {
        global $products;
        if ($quantity<1) return;

        //if item already exists in cart, update quantity
        if (isset($_SESSION['cart12'][$key])) {
            $quantity += $_SESSION['cart12'][$key]['qty'];
            update_item($key, $quantity);
            return;
        }

        //add item
        $cost = $products[$key]['cost'];
        $total = $cost * $quantity;
        $item = array(
            'name' => $products[$key]['name'],
            'cost' => $cost,
            'qty' => $quantity,
            'total' => $total
        );
        $_SESSION['cart12'][$key] = $item;
    }

    //update an item in the cart
    function update_item($key, $quantity) {
        $quantity = (int) $quantity;
        if (isset($_SESSION['cart12'][$key])) {
            if ($quantity <= 0) {
                unset($_SESSION['cart12'][$key]);
            } else {
                $_SESSION['cart12'][$key]['qty'] = $quantity;
                $total = $_SESSION['cart12'][$key]['cost'] * $_SESSION['cart12'][$key]['qty'];
                $_SESSION['cart12'][$key]['total'] = $total;
            }
        }
    }

    //get cart subtotal
    function get_subtotal() {
        $sub_total = 0;
        foreach ($_SESSION['cart12'] as $item) {
            $sub_total += $item['total'];
        }
        $subtotal_f = number_format($sub_total, 2);
        return $subtotal_f;
    }
?>