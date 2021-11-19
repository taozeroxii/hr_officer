<!DOCTYPE html>
<html lang="th">
<?php require "./public/components/head.php"; ?>

<body style="background-color: blueviolet;">
    <?php

    $page = 'login';
    require "./public/components/navbar.php";
    include "service/usermanage.php";

    if (isset($_POST['submit'])) {
        $obj = new manage_user();
        $username = $obj->escape($_POST['username']);
        $InputPassword = $obj->escape($_POST['InputPassword']);
        if (!empty($username) and !empty($InputPassword)) {
            $pass = md5($InputPassword);
            $querylogin = $obj->login_user($username);
            if ($querylogin != 0 and password_verify($pass, $querylogin['password'])) {
                $_SESSION['username'] = $querylogin['username'];
                $_SESSION['user_id'] = $querylogin['id'];
                $_SESSION['person_id'] = $querylogin['person_id'];
                $_SESSION['fullname'] =  $querylogin['pname'] . '  ' . $querylogin['fname'] . ' ' . $querylogin['lname'];
                $_SESSION['role'] = $querylogin['user_role_id'];
                echo "<script>window.location.href = './'</script>";
            } else echo '<script>
            Swal.fire({
                title: "Login ผิดพลาด!",
                text: "Username Or Password is not Defind !!!",
                type: "Error"
            }).then(function() {
                window.location = "./login";
            });
            </script>';
        }
    }

    ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">   </div>
            <div class="col-lg-6">
                <div class="card mt-5" style="box-shadow: 2px 2px 2px 2px rgb(0 0 0 / 25%); border-radius: 50px;">
                    <center><img src="./uploads/img_icon/la.jpg" width="150px" height="150px" id="logo"></center>
                    <h5 class="title text-center"><b>ข้อมูลบุคลากรรายบุคคล</b><sub> Cpa hospital</sub> </h5>
                    <div class="card-body">
                        <form action="./login" method="POST" autocomplete="off">
                            <style>
                                p {
                                    color: red;
                                }
                            </style>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Username</label>
                                <input type="text" class="form-control" name="username" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="ค่าตั้งต้น เลขบัตร ปปช 13 หลัก">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" class="form-control" name="InputPassword" id="exampleInputPassword1" placeholder="รหัสผ่านเข้าใช้งาน">
                            </div>

                            <button type="submit" name="submit" class="btng btng-glow btng-gradient btng-gradient-border mt-1 btn-block">เข้าสู่ระบบ</button>
                            <!-- <a href="./register" style="color:black;" class="btn btn-warning">Register</a> -->
                        </form>
                    </div>
                </div>
                <!-- <div class="mt-3" style="color: red; padding:25px;">
                    โปรดอ่าน : ผู้ใดเข้าถึงโดยมิชอบซึ่งข้อมูลคอมพิวเตอร์ที่มีมาตรการป้องกัน
                    การเข้าถึงโดยเฉพาะและมาตรการนั้นมิได้มีไว้สําหรับตน ต้องระวางโทษจําคุกไม่เกินสองปี หรือปรับไม่เกินสี่หมื่นบาท
                    หรือทั้งจําทั้งปรับ (มาตรา 7 พระราชบัญญัติว่าด้วยการกระทําความผิดเกี่ยวกับคอมพิวเตอร์ พ.ศ.2550)
                </div> -->
            </div>
        </div>
    </div>

    <?php require "./public/components/footer.php" ?>
</body>

</html>