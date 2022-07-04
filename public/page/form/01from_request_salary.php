<!DOCTYPE html>
<html lang="th">
<?php
require "./public/components/head.php";
require "./public/components/func_datethai.php";
?>

<body>
    
    <?php
    $page = 'form';
    include "./public/components/navbar.php";
    $formname = 'หนังสือรับรอง';
    $form_id = '001';
    require("./service/formmanage.php");
    $obj  = new manage_form();

    if (isset($_POST['submit'])) {
        $note =   $_POST['note'];
        $mobilephone =   filter_var($_POST['mobilephone'], FILTER_SANITIZE_NUMBER_INT);
        $inphone =   filter_var($_POST['inphone'], FILTER_SANITIZE_NUMBER_INT);
        $cert_type_id = $_POST['cert_type_id'];
        $now_dep_id =  $_POST['depid'];
        
        $insert =  $obj->insert($form_id, $_SESSION['user_id'], $_SESSION['person_id'], $formname, $_SESSION['fullname'], $mobilephone, $inphone, $cert_type_id, $note,$now_dep_id);
        if ($insert === true) {
            echo '<script>
                    Swal.fire({
                        title: "เพิ่มข้อมูลสำเร็จ!",
                        text: "Insert data successfuly!",
                        type: "success"
                    }).then(function() {
                        window.location = "./form_request_salary";
                    });
                    </script>';
            $errormesssage = null;
        } else {
            $errormesssage =  "<p class='mt-2 alert alert-danger'> " . $insert . '</p>';
        }
    }
    ?>

    <div class="container">
        <div class="card mt-5">
            <div class="card-body">
                <h5>แบบฟอร์มขอหนังสือรับรอง</h5>
                <form action="#" method="post">

                    ประเภทใบรับรอง
                    <select class="form-control" name="cert_type_id" id="cert_type_id" required>
                        <option value="">โปรดเลือก .. </option>
                        <?php
                        $cert_type =  $obj->fetch_cert_type();
                        while ($row = mysqli_fetch_array($cert_type)) { ?>
                            <option value="<?php echo $row['id']; ?>"><?php echo $row['cert_type_name']; ?> </option>
                        <?php } ?>
                    </select>

                    หน่วยงานที่อยู่ ณ ปัจจุบัน
                    <select class="form-control "  name="depid" id="depid" required>
                        <option value="">โปรดเลือก .. </option>
                        <?php
                        $depid =  $obj->fetch_dep();
                        while ($row = mysqli_fetch_array($depid)) { ?>
                            <option value="<?php echo $row['id']; ?>"><?php echo $row['workgroup']; ?> </option>
                        <?php } ?>
                    </select>



                    <div class="row">
                        <div class="col-6"> เบอร์โทรมือถือ<input class="form-control" type="number" name="mobilephone" placeholder="เบอร์โทรมือถือ" value="" required></div>
                        <div class="col-6"> เบอร์โทรภายใน<input class="form-control" type="number" name="inphone" placeholder="เบอร์โทรภายใน" value="" required></div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-12">เหตุผล <input class="form-control" type="text" name="note" placeholder="ระบุเหตุผลที่ต้องการขอใบรับรอง" value="" required></div>
                    </div>

                    <button type="submit" name="submit" value="submit" class="btn btn-success btn-lg mt-3">บันทึก</button>
                    <a href="./form" class="btn btn-secondary btn-lg mt-3">ย้อนกลับ</a>
                </form>

                <?php if (isset($errormesssage)) echo $errormesssage; ?>
            </div>
        </div>

        <hr>
        <h4 class="text-light">รายการขอหนังสือรับรองของท่าน 10 รายการล่าสุด</h4>
        <p class="text-light">ผู้ใช้งาน <?php echo $_SESSION['fullname']; ?></p>
        <div class="card">
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead class="text-center">
                        <th>วันเวลาที่ขอ</th>
                        <th>ประเภทใบรับรอง</th>
                        <th>หน่วยงานปัจจุบัน</th>
                        <th>ประสงค์ขอหนังสือรับรองเพื่อ</th>
                        <th>สถานะ</th>
                    </thead>

                    <tbody>
                        <?php
                        function statusCheck($status)
                        {
                            if ($status == null || $status == '')
                                return '<p class="text-info"><i class="fa fa-genderless" aria-hidden="true"></i>&nbsp;รอดำเนินการ</p>';
                            else if ($status == 1)
                                return '<p class="text-success"><i class="fa fa-check" aria-hidden="true"></i>&nbsp;ผ่านการอนุมัติ</p>';
                            else
                                return '<p class="text-danger"><i class="fa fa-times" aria-hidden="true"></i>&nbsp;ไม่ผ่านการอนุมัติ</p>';
                        }
                        $sql =  $obj->fetct_byuser($_SESSION['user_id']);
                        while ($row = mysqli_fetch_array($sql)) {
                        ?>
                            <tr>
                                <td><?php echo DateTimeThai($row['insert_datetime']); ?></td>
                                <td><?php echo $row['cert_type_name']; ?></td>
                                <td><?php echo $row['workgroup']; ?></td>
                                <td><?php echo $row['note']; ?></td>
                                <td><?php echo statusCheck($row['status']); ?></td> 
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>


    </div>





    <?php include './public/components/footer.php'; ?>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>