<!DOCTYPE html>
<html lang="th">
<?php require_once "./public/components/head.php"; ?>

<body>

    <?php
    $page = 'edit';
    require_once "./public/components/navbar.php";
    require_once "service/officermanage.php";
    $mission_name = '';
    $mission_id = '';
    $obj = new manage_officer();

    if (isset($id)) {
        $idr = mysqli_real_escape_string($obj->mycon,$id);
        $sql ="select * from hr_cpa_mission WHERE mission_id = '$idr'";
        $querya = mysqli_query($obj->mycon,$sql);
        while ($row = mysqli_fetch_array($querya)) {
            $mission_id = $row['mission_id'];
            $mission_name  = $row['mission_name'];
        }
    }
    ?>

    <div class="container">
        <div class="card mt-3">
            <div class="card-body">
                <?php if (isset($id)) { ?>
                    <h2 class="card-title"> แก้ไข กลุ่มภารกิจ <?php echo 'id : ' . $id; ?></h2>
                <?php } else { ?>
                    <h2 class="card-title"> เพิ่ม กลุ่มภารกิจ </h2>
                <?php } ?>
                <form method="post" action="<?php echo !isset($id) ? "./managemission" : "../managemission" ?>">
                    <div class="mb-3">
                        <label for="mission_name" class="form-label mt-2">Mission</label>
                        <input type="text" class="form-control" name="mission_name" value="<?= $mission_name !='' ? $mission_name : ""; ?>" id="mission_name" required>
                    </div>
                    <?php if (!isset($id)) { ?>
                        <button type="submit" class="btn btn-primary">บันทึก</button>
                        <a href="./tabledetailmission" class="btn btn-secondary"> ย้อนกลับ</a>
                        <input type="hidden" name="status" value="insert">
                    <?php } else { ?>
                        <button type="submit" class="btn btn-warning">แก้ไข</button>
                        <a href="../tabledetailmission" class="btn btn-secondary"> ย้อนกลับ</a>
                        <input type="hidden" name="status" value="update">
                        <input type="hidden" name="mission_id" value="<?php echo $id ?>">
                    <?php } ?>

                </form>


            </div>
        </div>
    </div>


    <?php
    if (isset($_POST['mission_name']) && $_POST['status'] == 'insert') {
        $mission_name  = $_POST['mission_name'];
        $queryInsert = $obj->insert_mission($mission_name);
        if ($queryInsert) {
            echo '<script>
                Swal.fire({
                    title: "เพิ่มข้อมูลสำเร็จ!",
                    text: "Insert data successfuly!",
                    type: "success"
                }).then(function() {
                    window.location = "./managemission";
                });
                </script>';
        } else {
            echo "<script>alert failer to insert !<script>";
        }
    } else if (isset($_POST['mission_name']) && isset($_POST['mission_id']) && $_POST['status'] == 'update') {
        $mission_name  = $_POST['mission_name'];
        $mission_id  = $_POST['mission_id'];
        $queryupdate = $obj->update_mission($mission_name, $mission_id);
        if ($queryupdate) {
            echo '<script>
            Swal.fire({
                title: "แก้ไขข้อมูลสำเร็จ!",
                text: "Update data successfuly!",
                type: "success"
            }).then(function() {
                window.location = "./tabledetailmission";
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