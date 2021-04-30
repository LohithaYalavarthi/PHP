<form method="post">
    <div class="<?php echo $_SESSION['errmsg'] ? "error" : "" ?>">
        <?php echo $_SESSION['errmsg']; ?>
        <?php echo $_SESSION['errmsg'] = ""; ?>
    </div>
    <div class="mb-3">
        <label class="form-label">Course Code</label>
        <input type="text" class="form-control" name="coursecode" value="<?php echo $coursecode ?>">
    </div>
    <div class="mb-3">
        <label class="form-label">Department</label>
        <div class="input-group mb-3">
            <select class="form-select" name="departmentcode">
                <option value="" selected>Select Department</option>
                <?php
                $sql = mysqli_query($con, "select * from department
                            ");
                while ($row = mysqli_fetch_array($sql)) {
                ?>
                    <option value="<?php echo $row['dcode']; ?>"><?php echo $row['dname']; ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label">Course Name</label>
        <input type="text" class="form-control" name="coursename" value="<?php echo $coursename?>">
    </div>
    <div class="mb-3">
        <label class="form-label">Assign Professor</label>
        <input type="text" class="form-control" name="assignprofessor" value="<?php echo $assignprofessor?>">
    </div>
    <div class="mb-3">
        <label class="form-label">Course Credits</label>
        <input type="text" class="form-control" name="credits" value="<?php echo $credits?>">
    </div>
    <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea class="form-control" name="description"><?php echo $description ?></textarea>
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Add Course</button>
</form>