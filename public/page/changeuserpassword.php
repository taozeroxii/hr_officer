<!DOCTYPE html>
<html lang="th">
<?php require "./public/components/head.php"; ?>

<body>
    <?php
    $page = 'changeuser-password';
    include "./public/components/navbar.php";
    include "service/usermanage.php";

    if (isset($_POST['submit'])) {
        $errors = array();
        $obj = new manage_user();
        $cid = $obj->escape($_POST['cid']);

        $InputPassword1 = $obj->escape($_POST['InputPassword1']);
        $InputPassword2 = $obj->escape($_POST['InputPassword2']);

        if (empty($InputPassword1)) $errors[4] =  "กรุณากรอกพาสเวิร์ด";
        if (empty($InputPassword2)) $errors[5] =  "กรุณากรอกพาสเวิร์ดยืนยันให้ตรงกับด้านบน";
        if ($InputPassword1 != $InputPassword2 and !empty($InputPassword1) and !empty($InputPassword2)) $errors[6] =  "กรุณากรอกพาสเวิร์ดให้ตรงกัน";
        if (empty($cid)) $errors[9] =  "กรุณากรอก หมายเลขบัตรประชาชน";
        $user_checkcid = $obj->check_cid_changepassword($_SESSION['person_id']);
        if($user_checkcid != $cid) $errors[2] =  "โปรดกรอก cid ให้ตรงกับที่ให้ไว้ในข้อมูลบุคลากร";

        if (count($errors) == 0) {
            $pass = md5($InputPassword1);
            $pass = password_hash($pass, PASSWORD_DEFAULT);
            $queryPassword = $obj->changePassword($_SESSION['user_id'],$pass);
            if ($queryPassword) {
                echo '<script>
                Swal.fire({
                    title: "เปลี่ยน password สำเร็จ ",
                    text: "โปรดทำการ login เข้าสู่ระบบใหม่อีกครั้ง !! ",
                    type: "success"
                }).then(function() {
                    window.location = "./logout";
                });
                </script>';
            }
        }
    }
    ?>
    <div class="container mt-3">
        <div class="card">
            <div class="card-body">
                <form action="./changeuser-password" method="POST" autocomplete="off">
                    <div class="row  ">
                        <div class="mb-3">
                            <label class="form-label">เลขบัตรประชาชน</label>
                            <input type="text" class="form-control" name="cid" id="cid" maxlength="13" value="<?php echo empty($_POST['cid']) ? "" : $_POST['cid'] ?>" placeholder="เลขบัตรประชาชน" require>
                            <?php if (!empty($errors[9])) echo "<p>" . $errors[9] . "</p>";
                                   elseif (!empty($errors[2])) echo "<p>" .  $errors[2] . "</p>";
                            ?>
                        </div>
                        
                        <div class="mb-3">
                            <label for="InputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control" name="InputPassword1" id="InputPassword1" placeholder="กรอกรหัสผ่าน" require>
                            <?php if (!empty($errors[4])) echo "<p>" . $errors[4] . "</p>";
                            elseif (!empty($errors[6])) echo "<p>" . $errors[6] . "</p>";
                            ?>
                        </div>
                        <div class="mb-3">
                            <label for="InputPassword2" class="form-label">Password-Confirm</label>
                            <input type="password" class="form-control" name="InputPassword2" id="InputPassword2" placeholder="กรอกรหัสผ่านอีกครั้ง" require>
                            <?php if (!empty($errors[5])) echo "<p>" . $errors[5] . "</p>" ?>
                        </div>
                        <button type="submit" style="color:black;" name="submit" id="submit" class="btn btn-warning">เปลี่ยน Password </button>
                </form>
            </div>
        </div>
    </div>

    <?php require "./public/components/footer.php" ?>
    <style>
        p {
            color: red;
        }
    </style>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>