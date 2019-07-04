<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Bank of VietNam</title>
        <style>
            label {float: left; width:120px;}
            label, input {margin: 3px 0;}
            #input {width:200px;}
            #input_action {width:100px;}
        </style>
    </head>
    <body style="width: 500px; margin: 0 auto;">
        <header>
            <h1>Login</h1>
            <hr>
        </header>
        <main>
            <form action="" method="post">
                <label>Account No:</label>
                <input type="text" name="account_no" id="input"><br>

                <label>Password:</label>
                <input type="password" name="password" id="input"><br>

                <label>&nbsp;</label>
                <input type="reset" value="Reset" id="input_action">
                <input type="submit" value="Login" id="input_action">
            </form>
        </main>
        <footer style="text-align: center;">
            <hr>
            <h1>Bank of VietNam &copy; <?php echo date("Y"); ?></h1>
        </footer>
    </body>
</html>