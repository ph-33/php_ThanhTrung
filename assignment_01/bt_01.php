<?php
    //$a = 5;
    //$b = 10;
    $a = filter_input(INPUT_POST, 'a');
    $b = filter_input(INPUT_POST, 'b');
    //swap
    $c = $a;
    $a = $b;
    $b = $c;

    //echo 'Bien a = ' . $a .' va bien b = ' .$b;
?>

<html>
    <head>
        <title>Bài 1</title>
    </head>
    <body>
        <form action="" method="post">
            <input type="text" name="a" placeholder="nhập số a" value="<?php echo $a; ?>"><br><br>
            <input type="text" name="b" placeholder="nhập số b" value="<?php echo $b; ?>"><br><br>
            <input type="submit" value="SWAP"><br><br>
        </form>
    </body>
</html>
