<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once "./public/page/components/head.php"; ?>
</head>

<body class="hold-transition sidebar-mini">

    <?php
    $page = 'tabledetail';
    require_once "./public/page/components/navbar.php";
    include "service/officermanage.php";
    ?>
    <section class="content">

        <div class="container">
            <hr>
            <div class="row">
                <div class="col-2"> <button class="btn btn-success"><i class="fas fa-plus f-16"></i> เพิ่มรายการ</button></div>
                <div class="col-10">
                    <h2 class="text-right mr-5">ประเภทการจ้าง</h2>
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
                                        <th>ประเภทการจ้าง person_name</th>
                                        <th>person_typecode</th>
                                        <th>person_type</th>
                                        <th>edit</th>
                                        <th>delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $obj = new manage_officer();
                                    $sql =  $obj->fetchdata_persontype();
                                    while ($row = mysqli_fetch_array($sql)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $row['id'] ?></td>
                                            <td><?php echo $row['person_name'] ?></td>
                                            <td><?php echo $row['person_typecode'] ?></td>
                                            <td><?php echo $row['person_type'] ?></td>
                                            <td><a href="managepersontype/<?php echo $row['id'] ?>" class="btn btn-primary d-grid gap-2"><i class="fas fa-pencil-alt f-16"> แก้ไข</i> </a></td>
                                            <td><a href="managepersontype/<?php echo $row['id'] ?>" class="btn btn-danger d-grid gap-2"><i class="fas fa-trash f-16"> ลบ</i></a></td>
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


    <?php require_once "./public/page/components/footer.php" ?>
</body>

</html>