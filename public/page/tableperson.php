<!DOCTYPE html>
<html lang="th">
<?php require "./public/components/head.php"; ?>

<body>
    <?php
    $page = 'tabledetail';
    require "./public/components/navbar.php";
    include "service/officermanage.php";
    ?>

    <style>
        #overlay {
            position: fixed;
            top: 0px;
            left: 0px;
            background: #ccc;
            width: 100%;
            height: 100%;
            opacity: .75;
            filter: alpha(opacity=75);
            -moz-opacity: .75;
            z-index: 999;
            background: #fff url(http://i.imgur.com/KUJoe.gif) 50% 50% no-repeat;
        }
    </style>
    <div class="container">
        <!-- id ใช้แสดงตัวโหลดหมุนๆบนหน้าจอ -->
        <div id="overlay"></div>
        <!-- --------------------------- -->
        <hr>
        <div class="row">
            <div class="col-2">
                <a href="./manageperson"> <button class="btn btn-success "><i class="fas fa-plus f-16"></i> เพิ่มรายการ</button></a>
            </div>
            <div class="col-10 ">
                <h2 class="text-right mr-5 text-light">รายการบุคลากร</h2>
            </div>
        </div>

        <hr>
       <p class="text-light">   * การสร้างรหัสเข้าใช้งาน จะนำข้อมูลพื้นฐานมาทำเป็นรหัสเข้าใช้งานระบบ User : เลขบัตรประจำตัวประชาชน Password : 1234 *</p>
     
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered">
                            <thead>
                                <th>#</th>
                                <th>คำนำหน้า pname</th>
                                <th>ชื่อ</th>
                                <th>สกุล</th>
                                <th>สิทธิเข้าถึง</th>
                                <th>แก้ไขข้อมูลบุคลากร</th>
                                <!-- <th>delete</th> -->
                                <th>สร้างรหัสเข้าใช้งาน</th>
                            </thead>

                            <tbody>
                                <?php
                                $obj = new manage_officer();
                                $sql =  $obj->fetchdata_all_person();
                                while ($row = mysqli_fetch_array($sql)) {
                                ?>
                                    <tr>
                                        <td><?php echo $row['id'] ?></td>
                                        <td><?php echo $row['pname'] ?></td>
                                        <td><?php echo $row['fname'] ?></td>
                                        <td><?php echo $row['lname'] ?></td>
                                        <td><?php echo $row['user_role_id'] ?></td>
                                        <td><a href="manageperson/<?php echo $row['id'] ?>" class="btn btn-primary d-grid gap-2"><i class="fas fa-pencil-alt f-16"> แก้ไข</i> </a></td>
                                        <!-- <td><a class="btn btn-danger d-grid gap-2 text-white" onclick="test(<?php echo $row['mission_id'] ?>)"><i class="fas fa-trash f-16"> ลบ</i></a></td> -->
                                        <td><button class="btn btn-success d-grid gap-2 text-white" onclick="addUser(<?php echo $row['id'] ?>)" <?php if (isset($row['haveuser_yet'])) {echo 'disabled';} ?>><i class="fas fa-plus   f-16"> สร้างรหัสเข้าใช้งาน</i></button></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <script>
            // function test(value) {
            //     Swal.fire({
            //         title: 'ลบข้อมูล?',
            //         text: "คุณต้องการลบข้อมูลนี้หรือไม่",
            //         icon: 'warning',
            //         showCancelButton: true,
            //         confirmButtonColor: '#3085d6',
            //         cancelButtonColor: '#d33',
            //         confirmButtonText: 'Yes'
            //     }).then((result) => {
            //         if (result.isConfirmed) {
            //             window.location.href = './delete/person/' + value; //ส่งค่า page และ id ไปเช็คเพื่อทำการลบค่า 
            //         }
            //     })
            // }

            function addUser(value) {
                Swal.fire({
                    title: 'เพิ่มข้อมูล USER ระดับใช้งานทั่วไป ',
                    text: " ยืนยันการเพิ่มข้อมูล  ?",
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = './delete/addUserperson/' + value; //ส่งค่า page และ id ไปเช็คเพื่อทำการเพิ่ม user ให้บุคลากร
                    }
                })
            }
        </script>


        <?php include './public/components/footer.php'; ?>
        <script type="text/javascript">
            $(function() {
                $("#overlay").fadeOut();
                $(".main-contain").removeClass("main-contain");
            });
        </script>
</body>

</html>