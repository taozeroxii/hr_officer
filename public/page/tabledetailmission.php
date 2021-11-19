<!DOCTYPE html>
<html lang="th">
<?php require "./public/components/head.php"; ?>

<body>
    <?php
    $page = 'tabledetail';
    require "./public/components/navbar.php";
    include "service/officermanage.php";
    ?>

    <div class="container">
        <hr>
        <div class="row">
            <div class="col-2"> <a href="./managemission"> <button class="btn btn-success"><i class="fas fa-plus f-16"></i> เพิ่มรายการ</button></a></div>
            <div class="col-10">
                <h2 class="text-right mr-5">กลุ่มภารกิจ</h2>
            </div>
        </div>
        <hr>
        <div class="card">
            <div class="card-body">
                <table id="mytable" class="table table-bordered table-striped">
                    <thead class="thead-light">
                        <th>mission_name</th>
                        <th>mission_id</th>
                        <th>edit</th>
                        <th>delete</th>
                    </thead>

                    <tbody>
                        <?php
                        $obj = new manage_officer();
                        $sql =  $obj->fetchdata_mission();
                        while ($row = mysqli_fetch_array($sql)) {
                        ?>
                            <tr>
                                <td><?php echo $row['mission_name'] ?></td>
                                <td><?php echo $row['mission_id'] ?></td>
                                <td><a href="managemission/<?php echo $row['mission_id'] ?>" class="btn btn-primary d-grid gap-2"><i class="fas fa-pencil-alt f-16"> แก้ไข</i> </a></td>
                                <td><a class="btn btn-danger d-grid gap-2 text-white" onclick="test(<?php echo $row['mission_id'] ?>)"><i class="fas fa-trash f-16"> ลบ</i></a></td>
                            </tr>

                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>


    </div>

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
                    window.location.href = './delete/mission/' + value; //ส่งค่า page และ id ไปเช็คเพื่อทำการลบค่า 
                }
            })
        }
    </script>


    <?php include './public/components/footer.php'; ?>
</body>

</html>