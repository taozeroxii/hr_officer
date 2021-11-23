<!DOCTYPE html>
<html lang="th">
<?php require "./public/components/head.php"; ?>

<body>
    <?php
    require "./public/components/navbar.php";
    include "service/usermanage.php";
    ?>

    <div class="container ">
        <div class=" boxs text-center text-dark center-page" style="border-radius: 10px;">
            <h1><b>Error 404 403</b> </h1>
            <p><br>ไม่พบหน้าที่ค้นหา <br> หรือ<br> ไม่มีสิทธิการเข้าใช้งานหน้านี้</p>
        </div>
    </div>
    <?php require "./public/components/footer.php" ?>
</body>


<style>
    .boxs {
        padding: 5px;
        background-color: white;
        border-style: solid ;
    }

    .center-page {
        display: flex;
        width: 200px;
        height: 200px;
        position: absolute;
        top: 50%;
        left: 50%;
        margin-top: -100px;
        margin-left: -100px;
        justify-content: center;
        align-items: center;
        vertical-align: middle;
    }


    p {
        font-size: 13px;
    }
</style>

</html>