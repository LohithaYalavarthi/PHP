<form method="post">
    <div class="<?php echo $_SESSION['errmsg'] ? "error" : "" ?>">
        <?php echo $_SESSION['errmsg']; ?>
        <?php echo $_SESSION['errmsg'] = ""; ?>
    </div>
    <div class="mb-3">
        <label class="form-label">Department Code</label>
        <?php 
        $checkCondition = (isset($_GET['id']) and !empty($_GET['id'])) ? "disabled" : "";
        ?>
        <input type="text" class="form-control" name="dcode" value="<?php echo $dcode ?>" <?php echo $checkCondition?>>
    </div>
    <div class="mb-3">
        <label class="form-label">Department Name</label>
        <input type="text" class="form-control" name="name" value="<?php echo $name ?>">
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Add Department</button>
</form>