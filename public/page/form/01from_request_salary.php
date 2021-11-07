<!DOCTYPE html>
<html lang="th">
<?php require_once "./public/components/head.php" ?>

<body>
    <?php $page = 'form'; include "./public/components/navbar.php" ?>

    <div class="container">
        <h5 class="mt-5">แบบฟอร์มขอใบรับรองเงินเดือน</h5>
        <form action="#" method="post">
            <p>โปรดกรอกหมายเหตุที่ต้องการขอใบรับรอง</p>
            <input class="form-control" type="text" name="note" placeholder="ระบุเหตุผลที่ต้องการขอใบรับรอง" value="" required>
            <button type="submit" class="btn btn-success btn-lg mt-3">บันทึก</button>
            <a href="./form" class="btn btn-secondary btn-lg mt-3">ย้อนกลับ</a>
        </form>

        <hr>
        <h3>รายการขอใบรับรองเงินเดือนของท่าน</h3>
        <p>ผู้ใช้งาน <?php echo $_SESSION['fullname'];?></p>
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <th>#</th>
                <th>วันเวลาที่ขอ</th>
                <th>หมายเหตุ</th>
                <th>print</th>
            </thead>

            <tbody>
                <?php
                //$obj = new manage_officer();
                // $sql =  $obj->fetchdata_all_person();
                // while ($row = mysqli_fetch_array($sql)) {
                ?>
                    <tr>
                        <td><?php // echo $row['id'] ?></td>
                        <td><?php //echo $row['pname'] ?></td>
                        <td><?php //echo $row['fname'] ?></td>
                        <td><button class="btn btn-warning btn-block"><i class="fa fa-print" aria-hidden="true"></i> </button> </td>
                    </tr>
                <?php //} ?>
            </tbody>
        </table>


    </div>





    <?php include './public/components/footer.php'; ?>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>