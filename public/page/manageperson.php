<!DOCTYPE html>
<html lang="th">
<?php require "./public/components/head.php"; ?>
<style type="text/css">
    #thumbnail img {
        border-radius: 25px;
        width: 100px;
        height: 100px;
        object-fit: cover;
    }

    img {
        border-radius: 25px;
        width: 100px;
        height: 100px;
        object-fit: cover;
    }
</style>

<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet" href="./adminltes/AdminLTE-master/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
<!-- Select2 -->
<link rel="stylesheet" href="./adminltes/AdminLTE-master/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="./adminltes/AdminLTE-master/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="./adminltes/AdminLTE-master/dist/css/adminlte.min.css">

<body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>
        $(document).ready(function() { //
            $("#brand").change(function() { //
                $.ajax({
                    url: "selectmenudetail.php", //ทำงานกับไฟล์นี้
                    data: "bid=" + $("#brand").val(), //ส่งตัวแปร
                    type: "POST",
                    async: false,
                    success: function(data, status) {
                        $("#model").html(data);

                    },

                    error: function(xhr, status, exception) {
                        alert(status);
                    }
                });
                //return flag;
            });
        });
    </script>
    <style>
        p {
            color: red;
        }
    </style>
    <?php
    $page = 'edit';
    require "./public/components/navbar.php";
    require "service/officermanage.php";
    $mission_name = '';
    $mission_id = '';
    $obj = new manage_officer();


    if (isset($_POST['status'])) {
        if ($_POST['status'] == 'insert') {
            $pname = $_POST['pname'];
            $fname = $obj->escape($_POST['fname']);
            $lname = $obj->escape($_POST['lname']);
            $cid   = $obj->escape($_POST['cid']);
            $stjob = $obj->escape($_POST['stjob']);
            $birthday = $obj->escape($_POST['birthday']);
            $mission_id = $_POST['mission_id']; //id กลุ่มภารกิจ
            $workgroup_id = $_POST['workgroupid']; //id หน่วยงาน
            $position_id = $_POST['position_id']; //ตำแหน่ง
            $typeposition_id =  $_POST['typeposition']; //ประเภทการจ้าง
            $updateuser = $_SESSION['user_id'];

            if (empty($pname)) $errors[0] =  "กรุณากรอกคำนำหน้า";
            if (empty($fname)) $errors[1] =  "กรุณากรอกชื่อ";
            if (empty($lname)) $errors[2] =  "กรุณากรอกนามสกุล";
            if (empty($birthday)) $errors[3] =  "กรุณากรอกวันเดือนปีเกิด";
            if (empty($stjob)) $errors[4] =  "กรุณากรอกวันที่เข้าทำงาน";
            $checkcid = $obj->check_cid($cid);
            if ($checkcid) $errors[8] =  "cidนี้มีอยู่ในระบบแล้ว";
            if (empty($cid)) $errors[9] =  "กรุณากรอก หมายเลขบัตรประชาชน";

            if (count($errors) == 0) {

                if (isset($_FILES['file_upload']) && $_FILES['file_upload']['tmp_name'] != '') { // เช็คว่ามีการอัพไฟล์เข้ามารึเปล่า
                    $errorsImgs = array();
                    $file_name = $_FILES['file_upload']['name'];
                    $file_size = $_FILES['file_upload']['size'];
                    $file_tmp = $_FILES['file_upload']['tmp_name'];
                    $file_type = $_FILES['file_upload']['type'];
                    $file_ext = strtolower(end(explode('.', $_FILES['file_upload']['name'])));
                    $file_name = md5(md5(date("his"))) . rand(10, 100) . '.' . $file_ext; //ตั้งชื่อไฟล์ใหม่
                    $extensions = array("jpeg", "jpg", "png");

                    if (in_array($file_ext, $extensions) === false) {
                        $errorsImgs[] = "extension not allowed, please choose a JPEG or PNG file.";
                    }

                    if ($file_size > 2097152) {
                        $errorsImgs[] = 'File size must be excately 2 MB';
                    }

                    if (empty($errorsImgs) == true) {
                        move_uploaded_file($file_tmp, "./uploads/image/" . $file_name);
                        $queryInsert = $obj->insert_person($pname, $fname, $lname, $cid, $stjob, $birthday, $mission_id, $workgroup_id, $position_id, $typeposition_id, $updateuser, $file_name);
                        if ($queryInsert) {
                            echo '<script>
                                    Swal.fire({
                                        title: "เพิ่มข้อมูลสำเร็จ!",
                                        text: "Insert data successfuly!",
                                        type: "success"
                                    }).then(function() {
                                        window.location = "./manageperson";
                                    });
                                    </script>';
                        } else {
                            echo '<script>
                                Swal.fire({
                                    title: "เพิ่มข้อมูลลงฐานข้อมูลไม่สำเร็จ",
                                    text: "Insert data Fail!",
                                    type: "error"
                                }).then(function() {
                                    window.location = "./manageperson";
                                });
                                </script>';
                        }
                    } else {
                        echo '<script>
                        Swal.fire({
                            title: "ไม่สามารถอัพไฟล์รูปภาพได้ !",
                            text: "โปรดลองอีกครั้งหรือเพิ่มข้อมูลโดยไม่อัพรูปภาพ!",
                            type: "error"
                        })</script>';
                    }
                } else { // หากไม่มีการอัพรูปภาพให้ insert ไปเลย
                    $queryInsert = $obj->insert_person($pname, $fname, $lname, $cid, $stjob, $birthday, $mission_id, $workgroup_id, $position_id, $typeposition_id, $updateuser, '');
                    if ($queryInsert) {
                        echo '<script>
                            Swal.fire({
                                title: "เพิ่มข้อมูลสำเร็จ!",
                                text: "Insert data successfuly!",
                                type: "success"
                            }).then(function() {
                                window.location = "./manageperson";
                            });
                            </script>';
                    }
                }
            }
        }
    }



    if (isset($id)) {
        $ps_id = $obj->escape($id);
        $query_person_byid = $obj->fetchdata_person_byid($ps_id);
        $row = mysqli_fetch_assoc($query_person_byid);
        if ($row) {
            $old_img =  $row['image_path'];
            $pname  =  $row['pname'];
            $fname  =  $row['fname'];
            $lname  =  $row['lname'];
            $cid    =  $row['cid'];
            $stjob  =  $row['date_start_job'];
            $birthday = $row['birthdate'];
            $typeposition_id = $row['typeposition_id'];

            if (isset($_POST['status'])) {
                $pname = $_POST['pname'];
                $fname = $obj->escape($_POST['fname']);
                $lname = $obj->escape($_POST['lname']);
                $cid   = $obj->escape($_POST['cid']);
                $stjob = $obj->escape($_POST['stjob']);
                $birthday = $obj->escape($_POST['birthday']);
                $mission_id = $_POST['mission_id']; //id กลุ่มภารกิจ
                $workgroup_id = $_POST['workgroupid']; //id หน่วยงาน
                $position_id = $_POST['position_id']; //ตำแหน่ง
                $typeposition_id =  $_POST['typeposition']; //ประเภทการจ้าง
                $updateuser = $_SESSION['user_id'];

                if ($_POST['status'] == 'edit') {
                    echo 'edit';
                }


            }
        } else {
            echo '<script> Swal.fire({title: "ไม่พบข้อมูล id ดังกล่าว !!! ",  text: "ดำเนินการเปลี่ยนไปหน้าเพิ่มข้อมูล", type: "error" }).then(function() {
                window.location = "../manageperson";
            });</script>';
        }
    }
    ?>


    <div class="container">
        <div class="card mt-3">
            <div class="card-body">
                <?php if (isset($id)) { ?>
                    <h1 class="card-title"> แก้ไข รายชื่อบุคลากร <?php echo 'id : ' . $id; ?></h1>
                <?php } else { ?>
                    <h1 class="card-title"> เพิ่ม รายชื่อบุคลากร </h1>
                    <label for="" class="form-label">&nbsp; person</label>
                <?php } ?>

                <div style="float:right;" id="thumbnail"></div>

                <?php if (isset($id)) { ?>
                    <img src="../uploads/image/<?php echo $old_img; ?>" style="float:right;">
                <?php } ?>

                <form method="post" enctype="multipart/form-data" action="<?php echo !isset($id) ? "./manageperson" : "../manageperson" ?>">
                    <div class="">
                        <div class="row mb-3">
                            <div class="col-lg-12 mt-5">
                                <label for="person_image" class="form-label mt-2">ภาพ</label>
                                <input id="file_upload" name="file_upload" type="file" multiple="true">
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-lg-4 col-12">
                                <div class="form-group">
                                    <label for="position_id">ตำแหน่ง</label>
                                    <select class="form-control select2 select2-danger" name="position_id" data-dropdown-css-class="select2-danger" style="width: 100%;" required>
                                        <option value="">-กรุณาเลือก-</option>
                                        <?php
                                        $persontype =  $obj->fetchdata_position();
                                        while ($row = mysqli_fetch_array($persontype)) {
                                        ?>
                                            <option value="<?php echo $row['id']; ?>"> <?php echo  $row['id'] . ' : ' . $row['position_name']; ?> </option>
                                        <?php }   ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-12">
                                <label for="stjob" class="form-label ">วันที่เข้าทำงาน</label>
                                <input type="date" class="form-control" name="stjob" value="<?= isset($stjob)  ? $stjob : ""; ?>" id="stjob" required>
                                <?php if (!empty($errors[3])) echo "<p>" . $errors[3] . "</p>" ?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-2 mt-2">
                                <label for="pname" class="form-label">คำนำหน้า</label>
                                <select class="form-control" name="pname" id="pname" require>
                                    <option value="" <?php echo !empty($pname) ? "selected" : "" ?>>กรุณาเลือก</option>
                                    <option value="นาย" <?php echo (isset($pname) && $pname == "นาย") ? "selected" : "" ?>>นาย</option>
                                    <option value="นาง" <?php echo (isset($pname) && $pname == "นาง") ? "selected" : "" ?>>นาง</option>
                                    <option value="นางสาว" <?php echo (isset($pname) && $pname == "นางสาว") ? "selected" : "" ?>>นางสาว</option>
                                </select>
                                <?php if (!empty($errors[0])) echo "<p>" . $errors[0] . "</p>" ?>
                            </div>
                            <div class="col-lg-4">
                                <label for="fname" class="form-label mt-2">ชื่อ</label>
                                <input type="text" class="form-control" placeholder="โชคดี" name="fname" value="<?= isset($fname) ? $fname : ""; ?>" id="fname" required>
                                <?php if (!empty($errors[1])) echo "<p>" . $errors[1] . "</p>" ?>
                            </div>
                            <div class="col-lg-4">
                                <label for="lname" class="form-label mt-2">สกุล</label>
                                <input type="text" class="form-control" placeholder="มีชัย" name="lname" value="<?= isset($lname)  ? $lname : ""; ?>" id="lname" required>
                                <?php if (!empty($errors[2])) echo "<p>" . $errors[2] . "</p>" ?>
                            </div>
                            <div class="col-lg-2">
                                <label for="birthday" class="form-label mt-2">วันเกิด</label>
                                <input type="date" class="form-control" name="birthday" value="<?= isset($birthday)  ? $birthday : ""; ?>" id="birthday" required>
                            </div>

                        </div>


                        <div class="mb-3">
                            <div class="row">
                                <div class="col-lg-2">
                                    <label for="cid" class="form-label mt-2">เลขบัตรประชาชน</label>
                                    <input type="text" class="form-control" placeholder="9999999999999" maxlength="13" name="cid" value="<?= isset($cid)  ? $cid : ""; ?>" id="cid" required>
                                    <?php if (!empty($errors[9])) echo "<p>" . $errors[9] . "</p>";
                                    elseif (!empty($errors[8])) echo "<p>" .  $errors[8] . "</p>";
                                    ?>
                                </div>
                                <div class="col-lg-3">
                                    <label for="typeposition" class="form-label mt-2">ประเภทการจ้าง</label>
                                    <select class="form-control" name="typeposition" id="typeposition" required>
                                        <option value="" <?php echo empty($_POST['typeposition']) ? "selected" : "" ?>>-กรุณาเลือก-</option>
                                        <?php
                                        $persontype =  $obj->fetchdata_person_type();
                                        while ($row = mysqli_fetch_array($persontype)) {
                                        ?>
                                            <option value=" <?php echo $row['id']; ?>" <?php echo (isset($_POST['typeposition']) && $_POST['typeposition'] == $row['id']) ? "selected" : "" ?>> <?php echo $row['person_name']; ?> </option>
                                        <?php  }   ?>
                                    </select>
                                </div>

                                <?php
                                $sqlmission = $obj->fetchdata_mission();
                                echo " <div class='col-lg-3 col-12'>  <label for='ตำแหน่ง' class='form-label mt-2'>กลุ่มภารกิจ Mission  </label><select id='brand' name='mission_id' class='form-control' required>";
                                echo "<option value=''>-กรุณาเลือก-</option>";
                                while ($row = mysqli_fetch_array($sqlmission)) {
                                    echo "<option value='$row[mission_id]'>" . $row["mission_name"] . "</option>";
                                }
                                echo "</select>";
                                echo '</div>';

                                echo "<div class='col-lg-4 col-12'> <label for='ตำแหน่ง' class='form-label mt-2'>หน่วยงาน  workgroup</label>  <select id='model' name='workgroupid' class='form-control' required>";
                                echo "<option value=''>-กรุณาเลือก-</option>";
                                echo "</select>";
                                echo '</div>';
                                ?>
                            </div>
                        </div>


                        <hr class="mt-5">

                        <?php if (!isset($id)) { ?>
                            <button type="submit" class="btn btn-primary">บันทึก</button>
                            <a href="./tableperson" class="btn btn-secondary"> ย้อนกลับ</a>
                            <input type="hidden" name="status" value="insert">
                        <?php } else { ?>
                            <button type="submit" class="btn btn-warning" name="status" value="update">แก้ไข</button>
                            <a href="../tableperson" class="btn btn-secondary"> ย้อนกลับ</a>
                            <input type="hidden" name="mission_id" value="<?php echo $id ?>">
                        <?php }
                        if (isset($errorsImgs)) {
                            print_r($errorsImgs);
                        }  ?>
                    </div>
                </form>




                <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
                <script type="text/javascript">
                    $(function() {
                        $("#upload").on("click", function(e) {
                            $("#file_upload").show().click().hide();
                            e.preventDefault();
                        });
                        $("#file_upload").on("change", function(e) {
                            var files = this.files
                            showThumbnail(files)
                        });

                        function showThumbnail(files) {
                            $("#thumbnail").html("");
                            for (var i = 0; i < files.length; i++) {
                                var file = files[i]
                                var imageType = /image.*/
                                if (!file.type.match(imageType)) {
                                    //     console.log("Not an Image");
                                    continue;
                                }

                                var image = document.createElement("img");
                                var thumbnail = document.getElementById("thumbnail");
                                image.file = file;
                                thumbnail.appendChild(image)

                                var reader = new FileReader()
                                reader.onload = (function(aImg) {
                                    return function(e) {
                                        aImg.src = e.target.result;
                                    };
                                }(image))

                                var ret = reader.readAsDataURL(file);
                                var canvas = document.createElement("canvas");
                                ctx = canvas.getContext("2d");
                                image.onload = function() {
                                    ctx.drawImage(image, 100, 100)
                                }
                            } // end for loop

                        } // end showThumbnail
                    });
                </script>

                <script src="./adminltes/AdminLTE-master/plugins/jquery/jquery.min.js"></script>
                <!-- Bootstrap 4 -->
                <script src="./adminltes/AdminLTE-master/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
                <!-- Select2 -->
                <script src="./adminltes/AdminLTE-master/plugins/select2/js/select2.full.min.js"></script>
                <!-- Bootstrap4 Duallistbox -->
                <script src="./adminltes/AdminLTE-master/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
                <!-- InputMask -->
                <script src="./adminltes/AdminLTE-master/plugins/moment/moment.min.js"></script>
                <script src="./adminltes/AdminLTE-master/plugins/inputmask/jquery.inputmask.min.js"></script>
                <!-- date-range-picker -->
                <script src="./adminltes/AdminLTE-master/plugins/daterangepicker/daterangepicker.js"></script>
                <!-- bootstrap color picker -->
                <script src="./adminltes/AdminLTE-master/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
                <!-- Tempusdominus Bootstrap 4 -->
                <script src="./adminltes/AdminLTE-master/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
                <!-- Bootstrap Switch -->
                <script src="./adminltes/AdminLTE-master/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
                <!-- BS-Stepper -->
                <script src="./adminltes/AdminLTE-master/plugins/bs-stepper/js/bs-stepper.min.js"></script>
                <!-- dropzonejs -->
                <script src="./adminltes/AdminLTE-master/plugins/dropzone/min/dropzone.min.js"></script>
                <!-- AdminLTE App -->
                <script src="./adminltes/AdminLTE-master/dist/js/adminlte.min.js"></script>
                <!-- AdminLTE for demo purposes -->
                <script src="./adminltes/AdminLTE-master/dist/js/demo.js"></script>
                <!-- Page specific script -->
                <script>
                    $(function() {
                        //Initialize Select2 Elements
                        $('.select2').select2()

                        //Initialize Select2 Elements
                        $('.select2bs4').select2({
                            theme: 'bootstrap4'
                        })

                        //Timepicker
                        $('#timepicker').datetimepicker({
                            format: 'LT'
                        })


                    })
                </script>

            </div>
        </div>
    </div>
</body>

</html>