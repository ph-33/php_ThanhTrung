<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Bank of VietNam</title>
    <style>
        aside, section {margin-bottom: 5px;}

        aside {float: right; width:149px; border-left: 1px solid darkgray;}
        aside #aside_form_btn {float: right; width:145px; height: 35px; margin: 5px 0;}

        section {width:550px; border-right: 1px solid darkgray;}
        label{float: left; width: 120px;}
        input {width: 200px;}
        label, input {margin: 4px 0;}
        select {width: 204px;}
        #show {width: 325px; height: 35px;}
        #submit {width: 125px; height: 35px;}
        #cancel {width: 75px; height: 35px;}
        footer {clear: both;}
    </style>
</head>
<body style="width: 700px; margin: 0 auto;">
<header>
    <h1>Welcome to Vietnam Bank</h1>
    <hr>
</header>
<main>
    <h2>Your Account</h2>
    <aside>
        <form action="" method="post">
            <button id="aside_form_btn" type="submit" name="action" value="view_transfer">Transfer</button>
            <button id="aside_form_btn" type="submit" name="action" value="view_change_pass">Change Password</button>
            <button id="aside_form_btn" type="submit" name="action" value="logout">Logout</button>
        </form>
    </aside>