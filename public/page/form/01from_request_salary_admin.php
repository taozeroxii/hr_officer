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
        <br>
        <h1>รายการขอใบรับรองเงินเดือนของท่าน</h1>
        <p class="text-light">ผู้ใช้งานนะ <?php echo $_SESSION['fullname']; ?></p>
        <div class="card">
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped text-center">
                    <thead>
                        <th>วันเวลาที่ขอ</th>
                        <th>หมายเหตุ</th>
                        <th>สถานะ</th>
                        <th>พิมพ์</th>
                    </thead>

                    <tbody>
                        <?php
                        function statusCheck($status)
                        {
                            if ($status == null || $status == '')
                                return 'รอดำเนินการ';
                            else if ($status == 1)
                                return 'ผ่านการอนุมัติ';
                            else
                                return 'ไม่ผ่านการอนุมัติ';
                        }
                        function statusCheckColor($status)
                        {
                            if ($status == null || $status == '')
                                return 'btn-warning';
                            else if ($status == 1)
                                return 'btn-success';
                            else
                                return 'btn-danger';
                        }
                        $sql =  $obj->fetct_byadmin();
                        while ($row = mysqli_fetch_array($sql)) {

                        ?>

                            <tr>
                                <td class="text-left"><?php echo $row['timestamp'] ?></td>
                                <td class="text-left"><?php echo $row['note'] ?></td>
                                <!-- <td><?php //echo statusCheck($row['status']) 
                                            ?></td> -->
                                <td><button style="line-height: 100%;" class="btn <?php echo statusCheckColor($row['status']) ?> btn-block" onclick="approveUser(<?php echo $row['id'] ?>)"><?php echo statusCheck($row['status']) ?></button></td>
                                <td>
                                    <a href="./print_salary?<?php //echo " "; 
                                                            ?>">
                                        <button style="line-height: 10%;" class="btn btn-info btn-block"><i class="fa fa-print" aria-hidden="true"></i>
                                        </button>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>


    </div>

    <script>
        function approveUser(value) {
            Swal.fire({
                title: 'อนุมัติหรือไม่',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonColor: '#28A745',
                confirmButtonText: 'อนุมัติ',
                denyButtonText: `ไม่อนุมัติ`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    Swal.fire('อนุมัติ', '', 'success')
                    $obj => approve(value, 1)
                } else if (result.isDenied) {
                    Swal.fire('ไม่อนุมัติ', '', 'error')
                    $obj => approve(value, 0)
                }
                $.ajax({
                    type: "POST",
                    url: './post',
                    data: {
                        id: value,
                        status: 33
                    }

                });
                console.log(value);

            })
        }
    </script>



    <?php include './public/components/footer.php'; ?>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>