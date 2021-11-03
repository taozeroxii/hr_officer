<!DOCTYPE html>
<html lang="en">

<?php include "components/head.php" ?>

<body>
    <?php
    $page = 'edit';
    include "components/navbar.php";
    include "service/usermanage.php";
    ?>
    <br>
    <div class="container">



        <div class="card" style="width: 100%;">
            <div class="card-body">
                <h5 class="card-title"> แก้ไขรายการข้อมูล <?php echo 'id : ' . $id; ?></h5>
                <form action="" class="form-control" method="post">
                    <div class="row">
                        <div class="col-12 mb-1"> <input type="text" class="form-control" placeholder="test"></div>
                        <div class="col-12 mb-1"> <input type="text" class="form-control" placeholder="test"></div>
                        <div class="col-12 mb-1"><button type="submit" class="btn btn-warning">แก้ไข</button></div>
                    </div>
                </form>
            </div>
        </div>



        <a href="../tabledepartment"> <button class="btn btn-secondary mt-3">ย้อนกลับ</button></a>
    </div>
</body>
<?php require_once "components/footer.php" ?>

</html>



<!DOCTYPE html>
<html lang="en">
<?php include "components/head.php" ?>