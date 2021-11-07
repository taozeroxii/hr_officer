<!DOCTYPE html>
<html lang="th">
<?php require_once "./public/components/head.php"; ?>

<body>

    <?php
    $page = 'edit';
    require_once "./public/components/navbar.php";
    require_once "service/officermanage.php";
    $workgroup = '';
    $mission_id = '';
    $obj = new manage_officer();
    session_start();
    if( $_SESSION['username'] == null ||  $_SESSION['fullname'] == null  ){
        echo "<script>window.location.href = './login'</script>";
    }
    
    if (isset($id)) {
        $sqlms = $obj->fetchdata_mission_all_byid($id);
        while ($row = mysqli_fetch_array($sqlms)) {
            $mission_id = $row['mission_id'];
            $workgroup  = $row['workgroup'];
        }
    }
    ?>

    <div class="container">
        <div class="card mt-3">
            <div class="card-body">
                <?php if ($id != '') { ?>
                    <h2 class="card-title"> แก้ไข ข้อมูลหน่วยงาน <?php echo 'id : ' . $id; ?></h2>
                    <form method="post" action="../manageworkgroup/<?= $id ?>">
                    <?php } else { ?>
                        <h2 class="card-title"> เพิ่ม ข้อมูลหน่วยงาน </h2>
                        <form method="post" action="./manageworkgroup">
                        <?php } ?>

                        <div class="mb-3">
                            <?php $sqlmission = $obj->fetchdata_mission();  ?>
                            <div class='row mt-5'>
                                <div class='col-12'>กลุ่มภารกิจ ( Mission ): <select id='brand' name='mission_id' class='form-control' required>";
                                        <option value=''>-โปรดเลือกกลุ่มภารกิจ-</option>
                                        <?php
                                        while ($row = mysqli_fetch_array($sqlmission)) {          ?>
                                            <option value="<?= $row['mission_id']; ?>" <?php if ($mission_id == $row['mission_id']) {
                                                                                            echo 'selected';
                                                                                        } ?>> <?= $row['mission_name']; ?></option>
                                        <?php   }  ?>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="workgroup_name" class="form-label mt-2">ข้อมูลหน่วยงาน</label>
                                <input type="text" class="form-control" name="workgroup_name" value="<?php if ($workgroup != '' || $workgroup != null) {
                                                                                                            echo $workgroup;
                                                                                                        } else {
                                                                                                            echo '';
                                                                                                        } ?>" id="workgroup_name" required>
                            </div>
                            <?php if ($id == '') { ?>
                                <button type="submit" name="save" value="save" class="btn btn-primary">บันทึก</button>
                                <a href="./tabledepartment" class="btn btn-secondary"> ย้อนกลับ</a>
                            <?php } ?>
                            <?php if ($id != '') { ?>
                                <button type="submit" name="edit" value="edit" class="btn btn-warning">แก้ไข</button>
                                <a href="../tabledepartment" class="btn btn-secondary"> ย้อนกลับ</a>
                            <?php } ?>

                        </form>


            </div>
        </div>
    </div>


    <?php
    if ($_POST['save'] === 'save') {
        if (isset($_POST['mission_id']) && isset($_POST['workgroup_name'])) {
            $workgroup  = $_POST['workgroup_name'];
            $mission_id = $_POST['mission_id'];

            $queryInsert = $obj->insert_workgroup($workgroup, $mission_id);
            if ($queryInsert) {
                echo '<script>
                Swal.fire({
                    title: "เพิ่มข้อมูลสำเร็จ!",
                    text: "Insert data successfuly!",
                    type: "success"
                }).then(function() {
                    window.location = "./manageworkgroup";
                });
                </script>';
                // echo "<script>Swal.fire('เพิ่มข้อมูลสำเร็จ').then(window.location.href = './manageworkgroup')</script>";
            } else {
                echo '<script>
                Swal.fire({
                    title: "ไม่สามารถเพิ่มข้อมูลได้!",
                    text: "โปรดลองใหม่อีกครั้ง!",
                    type: "success"
                }).then(function() {
                    window.location = "./manageworkgroup";
                });
                </script>';
            }
        }
    } else if ($_POST['edit'] === 'edit') {
        if (isset($_POST['mission_id']) && isset($_POST['workgroup_name'])) {
            $workgroup  = $_POST['workgroup_name'];
            $mission_id = $_POST['mission_id'];

            $update = $obj->update_workgroup($id, $workgroup, $mission_id);
            if ($update) {
                echo '<script>
                Swal.fire({
                    title: "แก้ไขข้อมูลเรียบร้อยแล้ว!",
                    text: "Update data successfuly!",
                    type: "success"
                }).then(function() {
                    window.location = "../tabledepartment";
                });
                </script>';
            } else {
                echo '<script>
                Swal.fire({
                    title: "ผิดพลาดด !",
                    text: "ไม่สามารถแก้ไขข้อมูลได้!",
                    type: "success"
                }).then(function() {
                    window.location = "./manageworkgroup";
                });
                </script>';
            }
        }
    }
    ?>

    <script>

    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>