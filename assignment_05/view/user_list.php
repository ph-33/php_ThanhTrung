<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>User Management</title>
    </head>
    <body>
        <h1>LIST OF USERS</h1>
        <main style="text-align: center;">
            <table>
                <thead>
                    <tr>
                        <td colspan="5">
                            <form action="." method="get">
                                <input type="text" name="s"
                                       value="<?php echo htmlentities(filter_input(INPUT_GET, 's')); ?>"
                                       style="width: 300px;" placeholder="Enter your Email, First Name or LastName">
                                <button style="width: 105px;">Search</button>
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th colspan="2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(empty($result)): ?>
                        <tr><td colspan="6" style="text-align: center">No data</td></tr>
                    <?php else: ?>
                        <?php foreach ($result as $user) :?>
                            <tr>
                                <td><?php echo $user->getEmail();?></td>
                                <td><?php echo $user->getFName();?></td>
                                <td><?php echo $user->getLName();?></td>
                                <td>
                                    <form action="view/edit_user.php" method="post">
                                        <input type="hidden" name="email" value="<?php echo $user->getEmail();?>">
                                        <button>Edit</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="." method="post">
                                        <input type="hidden" name="email" value="<?php echo $user->getEmail();?>">
                                        <input type="submit" value="Delete">
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </main>
    </body>
</html>