<?php

namespace Controller\Admin;


class Base
{
    public function __construct()
    {
        if (!isset($_SESSION['admin'])) {
            redirect('/admin?action=login');
        }
    }
}
