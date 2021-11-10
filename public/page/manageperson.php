<!DOCTYPE html>
<html lang="th">
<?php require_once "./public/components/head.php"; ?>
<style type="text/css">
    #thumbnail img {
        border-radius: 25px;
        width: 100px;
        height: 100px;
        object-fit: cover;
    }
</style>

<!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> -->
<!-- Font Awesome -->
<link rel="stylesheet" href="./adminltes/AdminLTE-master/plugins/fontawesome-free/css/all.min.css">
<!-- daterange picker -->
<link rel="stylesheet" href="./adminltes/AdminLTE-master/plugins/daterangepicker/daterangepicker.css">
<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="./adminltes/AdminLTE-master/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
<!-- Bootstrap Color Picker -->
<link rel="stylesheet" href="./adminltes/AdminLTE-master/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet" href="./adminltes/AdminLTE-master/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
<!-- Select2 -->
<link rel="stylesheet" href="./adminltes/AdminLTE-master/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="./adminltes/AdminLTE-master/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<!-- Bootstrap4 Duallistbox -->
<link rel="stylesheet" href="./adminltes/AdminLTE-master/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
<!-- BS Stepper -->
<link rel="stylesheet" href="./adminltes/AdminLTE-master/plugins/bs-stepper/css/bs-stepper.min.css">
<!-- dropzonejs -->
<link rel="stylesheet" href="./adminltes/AdminLTE-master/plugins/dropzone/min/dropzone.min.css">
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

    <?php
    $page = 'edit';
    require_once "./public/components/navbar.php";
    require_once "service/officermanage.php";
    $mission_name = '';
    $mission_id = '';
    $obj = new manage_officer();
    ?>


    <div class="container">
        <div class="card mt-3">
            <div class="card-body">
                <?php if (isset($id)) { ?>
                    <h2 class="card-title"> แก้ไข รายชื่อบุคลากร <?php echo 'id : ' . $id; ?></h2>
                <?php } else { ?>
                    <h2 class="card-title"> เพิ่ม รายชื่อบุคลากร </h2>
                    <label for="" class="form-label">&nbsp; person</label>
                <?php } ?>

                <div style="float:right;" id="thumbnail"></div>


                <form method="post" action="<?php echo !isset($id) ? "./manageperson" : "../manageperson" ?>">
                    <div class="">
                        <div class="row mb-3">
                            <div class="col-lg-12 mt-5">
                                <label for="pname" class="form-label mt-2">ภาพ</label>
                                <input id="file_upload" name="file_upload[]" type="file" multiple="true">
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-lg-4 col-12">
                                <div class="form-group">
                                    <label>ตำแหน่ง</label>
                                    <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;">
                                        <option value="" <?php echo !empty($_POST['position_name']) ? "selected" : "" ?>>-กรุณาเลือก-</option>
                                        <?php
                                        $persontype =  $obj->fetchdata_position();
                                        while ($row = mysqli_fetch_array($persontype)) {
                                        ?>
                                            <option value="" <?php echo $row['id']; ?>> <?php echo  $row['id'] . ' : ' . $row['position_name']; ?> </option>
                                        <?php }   ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-12">
                                <label for="stjob" class="form-label ">วันที่เข้าทำงาน</label>
                                <input type="date" class="form-control" name="stjob" value="<?= isset($birthstjobday)  ? $stjob : ""; ?>" id="stjob" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-2">
                                <label for="pname" class="form-label mt-2">คำนำหน้า</label>
                                <select class="form-control" name="pname" id="pname" require>
                                    <option value="" <?php echo !empty($_POST['pname']) ? "selected" : "" ?>>-กรุณาเลือก-</option>
                                    <option value="นาย" <?php echo isset($_POST['pname']) && $_POST['pname'] == "นาย" ? "selected" : "" ?>>นาย</option>
                                    <option value="นาง" <?php echo isset($_POST['pname']) && $_POST['pname'] == "นาง" ? "selected" : "" ?>>นาง</option>
                                    <option value="นางสาว" <?php echo isset($_POST['pname']) && $_POST['pname'] == "นางสาว" ? "selected" : "" ?>>นางสาว</option>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <label for="fname" class="form-label mt-2">ชื่อ</label>
                                <input type="text" class="form-control" placeholder="โชคดี" name="fname" value="<?= isset($fname) ? $fname : ""; ?>" id="fname" required>
                            </div>
                            <div class="col-lg-4">
                                <label for="lname" class="form-label mt-2">สกุล</label>
                                <input type="text" class="form-control" placeholder="มีชัย" name="lname" value="<?= isset($lname)  ? $lname : ""; ?>" id="lname" required>
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
                                </div>
                                <div class="col-lg-3">
                                    <label for="ตำแหน่ง" class="form-label mt-2">ประเภทการจ้าง</label>
                                    <select class="form-control" name="pname" id="pname" require>
                                        <option value="" <?php echo !empty($_POST['pname']) ? "selected" : "" ?>>-กรุณาเลือก-</option>
                                        <?php
                                        $persontype =  $obj->fetchdata_person_type();
                                        while ($row = mysqli_fetch_array($persontype)) {
                                        ?>
                                            <option value="" <?php echo $row['id']; ?>> <?php echo $row['person_name']; ?> </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>

                            <?php
                            $sqlmission = $obj->fetchdata_mission();
                            echo " <div class='col-lg-3 col-12'>  <label for='ตำแหน่ง' class='form-label mt-2'>กลุ่มภารกิจ Mission  </label><select id='brand' name='mission_id' class='form-control' >";
                            echo "<option value=''>-กรุณาเลือก-</option>";
                            while ($row = mysqli_fetch_array($sqlmission)) {
                                echo "<option value='$row[mission_id]'>" . $row["mission_name"] . "</option>";
                            }
                            echo "</select>";
                            echo '</div>';

                            echo "<div class='col-lg-4 col-12'> <label for='ตำแหน่ง' class='form-label mt-2'>หน่วยงาน  workgroup</label>  <select id='model' name='workgroupid' class='form-control'>";
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
                    <?php } ?>
            </div>
            </form>



            <?php



            if ( @$_POST['status'] == 'insert') {
                echo 'asdasd';
            }

            ?>






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