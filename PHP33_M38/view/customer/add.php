<?php include 'view/layouts/header.php'; ?>
    <main>
        <h1>Add Customer</h1>
        <form action="index.php" method="post" id="add_customer_form">
            <input type="hidden" name="action" value="add" />
            <label>Customer ID:</label>
            <input type="text" name="customer_id">
            <br>

            <label>Email Address:</label>
            <input type="text" name="email_address">
            <br>

            <label>Name:</label>
            <input type="text" name="name">
            <br>

            <label>Password:</label>
            <input type="password" name="password">
            <br>

            <label>Phone:</label>
            <input type="text" name="phone">
            <br>

            <label>&nbsp;</label>
            <input type="submit" value="Add Customer">
            <br>
        </form>
        <p><a href="index.php">View customer List</a></p>
    </main>
<?php include 'view/layouts/footer.php'; ?>