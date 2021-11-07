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

    if (isset($id)) {
        $idr = mysqli_real_escape_string($obj->mycon, $id);
        $sql = "select * from hr_cpa_mission WHERE mission_id = '$idr'";
        $querya = mysqli_query($obj->mycon, $sql);
        while ($row = mysqli_fetch_array($querya)) {
            $mission_id = $row['mission_id'];
            $mission_name  = $row['mission_name'];
        }
    }
    ?>
    <div class="container">
        <div class="card mt-3">
            <div class="card-body">
                <?php if ($id != '') { ?>
                    <h2 class="card-title"> แก้ไข รายชื่อบุคลากร <?php echo 'id : ' . $id; ?></h2>
                <?php } else { ?>
                    <h2 class="card-title"> เพิ่ม รายชื่อบุคลากร </h2>
                    <label for="" class="form-label">&nbsp; person</label>
                <?php } ?>

                <div style="float:right;" id="thumbnail"></div>

                
                <form method="post" action="<?php echo $id == '' ? "./manageperson" : "../manageperson" ?>">
                    <div class="">
                        <div class="row mb-3">
                            <div class="col-lg-12 mt-5">
                                <label for="pname" class="form-label mt-2">ภาพ</label>
                                <input id="file_upload" name="file_upload[]" type="file" multiple="true">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-2">
                                <label for="pname" class="form-label mt-2">คำนำหน้า</label>
                                <select class="form-control" name="pname" id="pname" require>
                                    <option value="" <?php echo !empty($_POST['pname']) ? "selected" : "" ?>>-กรุณาเลือก-</option>
                                    <option value="นาย" <?php echo $_POST['pname'] == "นาย" ? "selected" : "" ?>>นาย</option>
                                    <option value="นาง" <?php echo $_POST['pname'] == "นาง" ? "selected" : "" ?>>นาง</option>
                                    <option value="นางสาว" <?php echo $_POST['pname'] == "นางสาว" ? "selected" : "" ?>>นางสาว</option>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <label for="fname" class="form-label mt-2">ชื่อ</label>
                                <input type="text" class="form-control" placeholder="โชคดี" name="fname" value="<?= $fname != '' ? $fname : ""; ?>" id="fname" required>
                            </div>
                            <div class="col-lg-4">
                                <label for="lname" class="form-label mt-2">สกุล</label>
                                <input type="text" class="form-control" placeholder="มีชัย"  name="lname" value="<?= $lname != '' ? $lname : ""; ?>" id="lname" required>
                            </div>
                            <div class="col-lg-2">
                                <label for="birthday" class="form-label mt-2">วันเกิด</label>
                                <input type="date" class="form-control" name="birthday" value="<?= $birthday != '' ? $birthday : ""; ?>" id="birthday" required>
                            </div>

                        </div>


                        <div class="mb-3">
                            <div class="row">
                                <div class="col-lg-2">
                                    <label for="cid" class="form-label mt-2">เลขบัตรประชาชน</label>
                                    <input type="text" class="form-control" placeholder="9999999999999" maxlength="13" name="cid" value="<?= $cid != '' ? $cid : ""; ?>" id="cid" required>
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
                                echo " <div class='col-3'>  <label for='ตำแหน่ง' class='form-label mt-2'>กลุ่มภารกิจ Mission  </label><select id='brand' name='mission_id' class='form-control' >";
                                echo "<option value=''>-Select-</option>";
                                while ($row = mysqli_fetch_array($sqlmission)) {
                                    echo "<option value='$row[mission_id]'>" . $row["mission_name"] . "</option>";
                                }
                                echo "</select>";
                                echo '</div>';

                                echo "<div class='col-4'> <label for='ตำแหน่ง' class='form-label mt-2'>หน่วยงาน  workgroup</label>  <select id='model' name='workgroupid' class='form-control'>";
                                echo "<option value=''>-Select-</option>";
                                echo "</select>";
                                echo '</div>';
                                ?>
                            </div>
                        </div>


                        <?php if ($id == '') { ?>
                            <button type="submit" class="btn btn-primary">บันทึก</button>
                            <a href="./tableperson" class="btn btn-secondary"> ย้อนกลับ</a>
                            <input type="hidden" name="status" value="insert">
                        <?php } else { ?>
                            <button type="submit" class="btn btn-warning">แก้ไข</button>
                            <a href="../tableperson" class="btn btn-secondary"> ย้อนกลับ</a>
                            <input type="hidden" name="status" value="update">
                            <input type="hidden" name="mission_id" value="<?php echo $id ?>">
                        <?php } ?>

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

            </div>
        </div>
    </div>
</body>

</html>