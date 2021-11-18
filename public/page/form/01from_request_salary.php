<!DOCTYPE html>
<html lang="th">
<?php require "./public/components/head.php" ?>

<body>
    <?php
    $page = 'form';
    include "./public/components/navbar.php";
    $formname = 'หนังสือรับรองเงินเดือน';
    $form_id = '001';
    require("./service/formmanage.php");
    $obj  = new manage_form();

    if (isset($_POST['submit'])) {
        $note =   $_POST['note'];
        $insert =  $obj->insert($form_id, $_SESSION['user_id'], $_SESSION['person_id'], $formname, $_SESSION['fullname'], $note);
        if ($insert) {
            echo '<script>
                    Swal.fire({
                        title: "เพิ่มข้อมูลสำเร็จ!",
                        text: "Insert data successfuly!",
                        type: "success"
                    }).then(function() {
                        window.location = "./form_request_salary";
                    });
                    </script>';
        } else {
            echo "<script>alert failer to insert !<script>";
        }
    }
    ?>

    <div class="container">
        <h5 class="mt-5">แบบฟอร์มขอใบรับรองเงินเดือน</h5>
        <form action="#" method="post">
            <p>โปรดกรอกหมายเหตุที่ต้องการขอใบรับรอง</p>
            <input class="form-control" type="text" name="note" placeholder="ระบุเหตุผลที่ต้องการขอใบรับรอง" value="" required>
            <button type="submit" name="submit" value="submit" class="btn btn-success btn-lg mt-3">บันทึก</button>
            <a href="./form" class="btn btn-secondary btn-lg mt-3">ย้อนกลับ</a>
        </form>

        <hr>
        <h3>รายการขอใบรับรองเงินเดือนของท่าน</h3>
        <p>ผู้ใช้งาน <?php echo $_SESSION['fullname']; ?></p>
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <th>วันเวลาที่ขอ</th>
                <th>หมายเหตุ</th>
                <th>print</th>
            </thead>

            <tbody>
                <?php
                $sql =  $obj->fetct_byuser($_SESSION['user_id']);
                while ($row = mysqli_fetch_array($sql)) {
                ?>
                    <tr>
                        <td><?php echo $row['timestamp'] ?></td>
                        <td><?php echo $row['note'] ?></td>
                        <td>
                            <a href="./print_salary?<?php echo " ";?>">
                                <button class="btn btn-warning btn-block"><i class="fa fa-print" aria-hidden="true"></i>
                                </button>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>


    </div>





    <?php include './public/components/footer.php'; ?>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>