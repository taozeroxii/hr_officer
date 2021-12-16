<!DOCTYPE html>
<html lang="th">
<?php require "./public/components/head.php"; ?>


<body >
    <?php
    $page = 'detail';
    require "./public/components/navbar.php";
    include_once "service/officermanage.php";

    ?>

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



    <div class="container mt-3">
        <form class="form-horizontal ">
            <h4 class="text-glow text-gradient mt-2">ค้นหาด้วย ชื่อ-นามสกุล หรือ ค้นหาจากหน่วยงาน</h4>
            <div class="form-group">
                <div class="input-group mt-3">
                    <span class="input-group-text">ชื่อ </span>
                    <input type="text" aria-label="First name" name="fname" value="" class="form-control">
                    <span class="input-group-text"> นามสกุล</span>
                    <input type="text" aria-label="Last name" name="lname" value="" class="form-control">
                </div>
                <br>
                <?php
                $obj = new manage_officer();
                $sqlmission = $obj->fetchdata_mission();
                echo " <div class='row'><div class='col-5 '><p class = 'text-gradient '> Mission : </p><select id='brand' name='mission_id' class='form-control' >";
                echo "<option value=''>-Select-</option>";
                while ($row = mysqli_fetch_array($sqlmission)) {
                    echo "<option value='$row[mission_id]'>" . $row["mission_name"] . "</option>";
                }
                echo "</select>";
                echo '</div>';

                echo "<div class='col-5  '><p class = 'text-gradient '>หน่วยงาน : </p><select id='model' name='workgroupid' class='form-control'>";
                echo "<option value=''>-Select-</option>";
                echo "</select></div>";
                ?>
                <div class='col-2 d-grid gap-2'><label for=""></label> <button type="submit" class="btng btng-glow btng-gradient btng-gradient-border mt-1"> ค้นหา </button> </div>
            </div>
        </form>

        <hr>

        <section id="team" class="pb-5">
            <div class="container">
                <?php

                if ((isset($_GET['mission_id']) || isset($_GET['mission_id'])) && isset($_GET['workgroupid']) || (isset($_GET['fname'])  || isset($_GET['lname']))) {
                    $mission_id  =  preg_replace('/[^a-z0-9\_\- ]/i', '', ($_GET['mission_id']));
                    $workgroupid =  preg_replace('/[^a-z0-9\_\- ]/i', '', ($_GET['workgroupid']));
                    $fname =  ($_GET['fname']);
                    $lname =  ($_GET['lname']);
                    if ($mission_id != '' &&  $workgroupid != '') {
                        $fetctperson = $obj->fetchdata_person_by_workgroup($workgroupid);
                    }
                    if ($fname != '' || $lname != '') {
                        $fetctperson = $obj->fetchdata_person_by_name($fname, $lname);
                    }
                ?>

                    <?php if ($mission_id != '' &&  $workgroupid != '') { ?>
                        <h5 class="  text-light text-glow">กลุ่มงาน: <?php echo $mission = $obj->fetchdata_mission_byid($mission_id); ?> </h5>
                        <h6 class="  text-light">หน่วยงาน: <?php echo $workgroup = $obj->fetchdata_workgroup_byid($workgroupid); ?> </h6>
                        <hr>
                    <?php } ?>
                    <div class="row">
                        <?php if (!empty($fetctperson)) {
                            while ($result = mysqli_fetch_array($fetctperson)) { ?>
                                <div class="col-xs-12 col-sm-6 col-md-4">
                                    <div class="image-flip">
                                        <div class="mainflip flip-0">
                                            <div class="frontside">
                                                <div class="card">
                                                    <div class="card-body text-center">
                                                        <?php
                                                        $imagePath = "uploads/image/" . $result['image_path'];
                                                        if (!file_exists($imagePath)) {
                                                            $imagePath = "uploads/image/noimage.jpg";
                                                        } // เช็คห่ไม่เจอภาพในโฟลเดอร์ให้แสดง default
                                                        ?>
                                                        <div class="text-center"><img class="img-fluid " style="width:200;height:200px;object-fit: cover;" src="<?php echo $imagePath ?>"></div>
                                                        <h4 class="card- text-center mt-3"><?php echo $result['pname'] . $result['fname'] . ' ' . $result['lname']; ?></h4>
                                                        <p class="card-text"> <?php echo $result['workgroup_name']; ?></p>
                                                        <p class="card-text"> <?php echo $result['position_type_name'] != null ? 'ประเภท '.$result['position_type_name'] : "";?></p>
                                                        <p class="card-text"> <?php echo $result['position'] != null ? 'ตำแหน่ง '.$result['position'] : "";?></p>
                                                        <p class="card-text"> <?php echo $result['position_level_name'] != null ? 'ระดับ '.$result['position_level_name'] : "";?></p>
                                                        <a href="<?php if (isset($_SESSION['username'])) { echo "./manageperson/" . $result['id'];   } else ""; ?>" class="btn btn-primary btn-sm"> <i class="fa fa-edit"> <?php echo  $result['typeposition_name'] ?></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    <?php
                            }
                        }
                    }

                    ?>


                    </div>
            </div>
        </section>
    </div>
<a href="https://play.google.com/store/apps/details?id=th.go.dms.teleconsult">asdasd</a>
<script>
var url = "https://itunes.apple.com/us/app/snapchat/id447188370?mt=8"
window.open(url,'_blank');
</script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>