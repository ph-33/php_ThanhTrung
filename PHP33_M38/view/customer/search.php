<form action="." id="form_search">
    <input type="text" name="s" value="<?php echo htmlentities(filter_input(INPUT_GET, 's')); ?>">
    <button>Search</button>
</form>