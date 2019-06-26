<?php
    require_once ('model/fields.php');
    require_once ('model/validate.php');

    $validate = new Validate();
    $fields = $validate->getFields();
    $fields->addField('first_name');
    $fields->addField('last_name');
    $fields->addField('phone', 'Use 333-333-1234 format.');
    $fields->addField('email', 'Must be a valid email address.');

    $action = filter_input(INPUT_POST, 'action');
    if ($action===NULL) {$action = 'reset';}
    else {$action = strtolower($action);}

    switch ($action) {
        case 'reset':
            $first_name = '';
            $last_name = '';
            $phone = '';
            $email = '';
            include 'view/register.php';
            break;
        case 'register':
            $first_name = trim(filter_input(INPUT_POST, 'first_name'));
            $last_name = trim(filter_input(INPUT_POST, 'last_name'));
            $phone = trim(filter_input(INPUT_POST, 'phone'));
            $email = trim(filter_input(INPUT_POST, 'email'));

            $validate->text('first_name', $first_name);
            $validate->text('last_name', $last_name);
            $validate->text('phone', $phone);
            $validate->text('email', $email);

            if ($fields->hasErrors()) {include 'view/register.php';}
            else {include 'view/success.php';}
            break;
    }
?>