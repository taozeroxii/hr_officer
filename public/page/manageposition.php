<!DOCTYPE html>
<html lang="en">
<?php require_once "components/head.php" ?>

<body>

    <?php
    $page = 'edit';
    include "components/navbar.php";
    require_once "service/officermanage.php";
    $position_id = '';
    $mission_id = '';
    $obj = new manage_officer();

    if (isset($id)) {
        $idr = mysqli_real_escape_string($obj->mycon, $id);
        $sql = "select * from hrd_cpa_position WHERE id = '$idr'";
        $querya = mysqli_query($obj->mycon, $sql);
        while ($row = mysqli_fetch_array($querya)) {
            $position_id = $row['id'];
            $position  = $row['position_name'];
        }
    }
    ?>

    <div class="container">
        <div class="card mt-3">
            <div class="card-body">
                <?php if ($id != '') { ?>
                    <h2 class="card-title"> แก้ไข ตำแหน่ง <?php echo 'id : ' . $id; ?></h2>
                <?php } else { ?>
                    <h2 class="card-title"> เพิ่ม ตำแหน่ง </h2>
                <?php } ?>
                <form method="post" action="<?php echo $id == '' ? "./manageposition" : "../manageposition" ?>">
                    <div class="mb-3">
                        <label for="position" class="form-label mt-2">position</label>
                        <input type="text" class="form-control" name="position_name" value="<?= $position != '' ? $position : ""; ?>" id="position" required>
                    </div>
                    <?php if ($id == '') { ?>
                        <button type="submit" class="btn btn-primary">บันทึก</button>
                        <a href="./tableposition" class="btn btn-secondary"> ย้อนกลับ</a>
                        <input type="hidden" name="status" value="insert">
                    <?php } else { ?>
                        <button type="submit" class="btn btn-warning">แก้ไข</button>
                        <a href="../tableposition" class="btn btn-secondary"> ย้อนกลับ</a>
                        <input type="hidden" name="status" value="update">
                        <input type="hidden" name="position_id" value="<?php echo $id ?>">
                    <?php } ?>

                </form>


            </div>
        </div>
    </div>


    <?php
    if (isset($_POST['position_name']) && $_POST['status'] == 'insert') {
        $position_name  = $_POST['position_name'];
        $queryInsert = $obj->insert_position($position_name);
        if ($queryInsert) {
            echo '<script>
                Swal.fire({
                    title: "เพิ่มข้อมูลสำเร็จ!",
                    text: "Insert data successfuly!",
                    type: "success"
                }).then(function() {
                    window.location = "./manageposition";
                });
                </script>';
        } else {
            echo "<script>alert failer to insert !<script>";
        }
    } else if (isset($_POST['position_name']) && isset($_POST['position_id']) && $_POST['status'] == 'update') {
        $position  = $_POST['position_name'];
        $position_id  = $_POST['position_id'];
        $queryupdate = $obj->update_position($position, $position_id);
        if ($queryupdate) {
            echo '<script>
            Swal.fire({
                title: "แก้ไขข้อมูลสำเร็จ!",
                text: "Update data successfuly!",
                type: "success"
            }).then(function() {
                window.location = "./tableposition";
            });
            </script>';
        } else {
            echo "<script>alert failer to update !<script>";
        }
    }

    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>