<!DOCTYPE html>
<html lang="th">
<?php require "./public/components/head.php";
require "./public/components/func_datethai.php";

?>

<body>
    <?php
    $page = 'form';
    include "./public/components/navbar.php";
    $formname = 'หนังสือรับรองเงินเดือน';
    $form_id = '001';
    require("./service/formmanage.php");
    $obj  = new manage_form();
    $buttonclick   =  $_POST['submit']  ?? null; //default

    if (isset($_POST['submit'])) {
        if ($_POST['submit'] === 'wait') {
            $buttonclick = null;
            $sql =  $obj->fetct_byadmin($buttonclick);
        } else if ($_POST['submit'] === 'acp') {
            $buttonclick = 1;
            $sql =  $obj->fetct_byadmin($buttonclick);
        } else if ($_POST['submit'] === 'nacp') {
            $buttonclick = 0;
            $sql =  $obj->fetct_byadmin($buttonclick);
        } else if ($_POST['submit'] === 'all') {
            $sql =  $obj->fetct_byadmin($buttonclick);
        }
    } else {
        $sql =  $obj->fetct_byadmin($buttonclick);
    }

    ?>

    <div class="container-fulid mr-3 ml-3">
        <br>
        <h1 class="text-light">รายการขอหนังสือรับรอง limit 1000 รายการ</h1>
        <form action="./form_request_salary_admin#" method="post">
            <button type="submit" name="submit" value="wait" class="btn btn-lg btn-warning">รอดำเนินการ</button>
            <button type="submit" name="submit" value="acp" class="btn btn-lg btn-success">อนุมัติ</button>
            <button type="submit" name="submit" value="all" class="btn btn-lg btn-secondary">ทั้งหมด</button>
        </form>
        <hr>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead class="text-center">
                                <th>วันเวลาที่ขอ</th>
                                <th>ผู้ขอ</th>
                                <th>แผนก</th>
                                <th>หน่วยงาน</th>
                                <th>ประสงค์ขอหนังสือรับรองเพื่อ</th>
                                <th>วันเวลาอัพเดทข้อมูลล่าสุด</th>
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
                                        return 'อนุมัติ';
                                    else
                                        return 'ไม่อนุมัติ';
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

                                while ($row = mysqli_fetch_array($sql)) {

                                ?>

                                    <tr>
                                        <td class="text-left"><?php echo DateThai($row['insert_datetime']) . " " . TimeThai($row['insert_datetime']); ?></td>
                                        <td class="text-left"><?php echo $row['fullname'] ?></td>
                                        <td class="text-left"><?php echo $row['mission_name'] ?></td>
                                        <td class="text-left"><?php echo $row['workgroup'] ?></td>
                                        <td class="text-left"><?php echo $row['note'] ?></td>
                                        <td class="text-left"><?php echo DateThai($row['timestamp']) . " " . TimeThai($row['timestamp']); ?></td>
                                        <td><button style="line-height: 100%;" class="btn <?php echo statusCheckColor($row['status']) ?> btn-block" onclick="approveUser(<?php echo $row['id'] ?>, <?php echo $_SESSION['user_id'] ?>)" <?php echo statusCheck($row['status']) === 'อนุมัติ' ? 'disabled' :""; ?>><?php echo statusCheck($row['status'])  ?></button></td>

                                        <td>
                                            <!-- <a> -->
                                                <!-- href="./form_request_salary_admin_test" -->
                                                <button style="line-height: 10%;" class="btn btn-info btn-block" onclick="printUser(
                                                    <?php echo $row['id'] ?>
                                                    )">
                                                    <i class="fa fa-print" aria-hidden="true"></i>
                                                </button>
                                            <!-- </a> -->
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

    </div>

    <script>
        function approveUser(value, user_id) {
            Swal.fire({
                title: 'อนุมัติหรือไม่',
                showDenyButton: false,
                showCancelButton: true,
                confirmButtonColor: '#28A745',
                confirmButtonText: 'อนุมัติ',
                denyButtonText: `ไม่อนุมัติ`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    Swal.fire('อนุมัติ', '', 'success').then((result) => {
                        post('./post', {
                            id: value,
                            status: 1,
                            userupdate: user_id
                        });
                    })
                } else if (result.isDenied) {

                    Swal.fire('ไม่อนุมัติ', '', 'error').then((result) => {
                        post('./post', {
                            id: value,
                            status: 0,
                            userupdate: user_id
                        });
                    })
                }
            });
        }


        function printUser(id, insert_datetime) {
            post('./form_request_salary_admin_test', {
                id: id
            });

        }

        function post(path, params, method = 'post') {

            // The rest of this code assumes you are not using a library.
            // It can be made less verbose if you use one.
            const form = document.createElement('form');
            form.method = method;
            form.action = path;

            for (const key in params) {
                if (params.hasOwnProperty(key)) {
                    const hiddenField = document.createElement('input');
                    hiddenField.type = 'hidden';
                    hiddenField.name = key;
                    hiddenField.value = params[key];

                    form.appendChild(hiddenField);
                }
            }

            document.body.appendChild(form);
            form.submit();
        }
    </script>



    <?php include './public/components/footer.php'; ?>
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
</body>

</html>