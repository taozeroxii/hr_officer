<!DOCTYPE html>
<html lang="th">

<?php require_once "./public/components/head.php"; ?>

<body>
    <?php
    $page = 'tabledetailuser';
    require_once "./public/components/navbar.php";
    include "service/usermanage.php";
    ?>

    <section class="content">
        <div class="container">
            <hr>
            <div class="row">
            <!-- <div class="col-2"> <a href="./manageposition"> <button class="btn btn-success"><i class="fas fa-plus f-16"></i>  เพิ่มรายการ</button></a></div> -->
                <div class="col-10">
                    <h2 class="text-right ">กลุ่มผู้ใช้งาน</h2>
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
                                        <th>กลุ่มใช้งาน</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $obj = new manage_user();
                                    $sql =  $obj->fetchUser_group();
                                    while ($row = mysqli_fetch_array($sql)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $row['user_role_id'] ?></td>
                                            <td><?php echo $row['name'] ?></td>
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


    <?php include './public/components/footer.php'; ?>
</body>

</html>