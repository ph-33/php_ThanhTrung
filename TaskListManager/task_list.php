<!DOCTYPE html>
<html>
    <head>
        <title>Task List Manager</title>
        <link rel="stylesheet" type="text/css" href="main.css">
    </head>
    <body>
        <header>
            <h1>Task List Manager</h1>
        </header>
        <main>
            <!-- Part 1: Te errors -->
            <?php if (count($error) > 0) : ?>
            <h2>Errors</h2>
            <ul>
                <?php foreach ($error as $error) : ?>
                <li><?php echo htmlspecialchars($error)?></li>
                <?php endforeach; ?>
            </ul>
            <?php endif; ?>

            <!-- Part 2: The task -->
            <h2>Task</h2>
            <?php if (count($task_list) == 0) : ?>
                <p>There are no tasks in the task list.</p>
            <?php else: ?>
                <ul>
                <?php foreach ($task_list as $id => $task) : ?>
                    <li><?php echo $id + 1 . '. ' . htmlspecialchars($task); ?></li>
                <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            <!-- Part 3: The add form -->
            <h2>Add Task</h2>
            <form action="." method="post">
                <?php foreach ($task_list as $task): ?>
                    <input type="hidden" name="tasklist[]" value="<?php echo htmlspecialchars($task); ?>">
                <?php endforeach; ?>
                <input type="hidden" name="action" value="add">
                <label>Taks:</label>
                <input type="text" name="task"> <br>
                <label>&nbsp;</label>
                <input type="submit" value="Add Task"><br>
            </form>
            <br>

            <!-- Part 4: The delete form -->
            <?php if (count($task_list) > 0) : ?>
                <h2>Delete Task</h2>
                <form action="." method="post" >
                    <?php foreach( $task_list as $task ) : ?>
                        <input type="hidden" name="tasklist[]" value="<?php echo htmlspecialchars($task); ?>">
                    <?php endforeach; ?>
                    <input type="hidden" name="action" value="delete">
                    <label>Task:</label>
                    <select name="taskid">
                        <?php foreach( $task_list as $id => $task ) : ?>
                            <option value="<?php echo $id; ?>">
                                <?php echo htmlspecialchars($task); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <br>
                    <label>&nbsp;</label>
                    <input type="submit" value="Delete Task">
                </form>
            <?php endif; ?>
        </main>
    </body>
</html>