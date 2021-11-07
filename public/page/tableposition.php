<!DOCTYPE html>
<html lang="th">

<?php require_once "./public/components/head.php"; ?>

<body>
    <?php
    $page = 'tabledetail';
    require_once "./public/components/navbar.php";
    include "service/officermanage.php";
    ?>

    <section class="content">
        <div class="container">
            <hr>
            <div class="row">
            <div class="col-2"> <a href="./manageposition"> <button class="btn btn-success"><i class="fas fa-plus f-16"></i>  เพิ่มรายการ</button></a></div>
                <div class="col-10">
                    <h2 class="text-right mr-5">ตำแหน่ง</h2>
                </div>
            </div>

            <hr>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>ตำแหน่ง position_name</th>
                                        <th>edit</th>
                                        <th>delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $obj = new manage_officer();
                                    $sql =  $obj->fetchdata_position();
                                    while ($row = mysqli_fetch_array($sql)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $row['id'] ?></td>
                                            <td><?php echo $row['position_name'] ?></td>
                                            <td><a href="manageposition/<?php echo $row['id'] ?>" class="btn btn-primary d-grid gap-2"><i class="fas fa-pencil-alt f-16"> แก้ไข</i> </a></td>
                                            <td><a class="btn btn-danger d-grid gap-2 text-white" onclick="test(<?php echo $row['id'] ?>)"><i class="fas fa-trash f-16"> ลบ</i></a></td>
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
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->


    <script>
        function test(value) {
            Swal.fire({
                title: 'ลบข้อมูล?',
                text: "คุณต้องการลบข้อมูลนี้หรือไม่",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = './delete/position/' + value; //ส่งค่า page และ id ไปเช็คเพื่อทำการลบค่า 
                }
            })
        }
    </script>

    <?php include './public/components/footer.php'; ?>
</body>

</html>