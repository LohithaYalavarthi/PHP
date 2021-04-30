<form method="post">
    <div class="<?php echo $_SESSION['errmsg'] ? "error" : "" ?>">
        <?php echo $_SESSION['errmsg']; ?>
        <?php echo $_SESSION['errmsg'] = ""; ?>
    </div>
    <div class="mb-3">
        <label class="form-label">Semester Code</label>
        <?php 
        $checkCondition = (isset($_GET['id']) and !empty($_GET['id'])) ? "disabled" : "";
        ?>
        <input type="text" class="form-control" name="semcode" value="<?php echo $semcode ?>" <?php echo $checkCondition?>>
    </div>
    <div class="mb-3">
        <label class="form-label">Semester Name</label>
        <input type="text" class="form-control" name="sname" value="<?php echo $sname ?>">
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Add Semester</button>
</form>