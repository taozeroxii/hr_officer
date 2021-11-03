<!DOCTYPE html>
<html lang="en">
<?php require_once "components/head.php" ?>

<body>
    <?php

    $page = 'login';
    include "components/navbar.php";
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
                $_SESSION['fullname'] =  $querylogin['pname'] .'  '. $querylogin['fname'] . ' ' . $querylogin['lname'];
                $_SESSION['role'] = $querylogin['user_role_id'];
                echo "<script>window.location.href = './'</script>";
            } else echo "<script>window.location.href = './login'</script>";
        }
    }

    ?>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <form action="./login" method="POST" autocomplete="off">
                    <style>
                        p {
                            color: red;
                        }
                    </style>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="เลขบัตร ปปช 13 หลัก">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" name="InputPassword" id="exampleInputPassword1" placeholder="หากเข้าใช้งานครั้งแรกไม่ต้องกรอกรหัส">
                        <?php if (isset($_POST['submit'])) echo "<p>กรอก Username หรือ Password ผิดพลาด</p>" ?>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Login</button>
                    <!-- <a href="./register" style="color:black;" class="btn btn-warning">Register</a> -->
                </form>
            </div>
        </div>
    </div>

    <?php require_once "components/footer.php" ?>
</body>

</html>