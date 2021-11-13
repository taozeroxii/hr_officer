<!DOCTYPE html>
<html lang="th">
<?php require "./public/components/head.php"; ?>

<body>
    <?php
    $page = 'register';
    include "./public/components/navbar.php";
    include "service/usermanage.php";

    if (isset($_POST['submit'])) {
        $errors = array();
        $obj = new manage_user();
        $pname = $obj->escape($_POST['pname']);
        $fname = $obj->escape($_POST['fname']);
        $lname = $obj->escape($_POST['lname']);
        $cid = $obj->escape($_POST['cid']);
        $username = $obj->escape($_POST['username']);
        $InputPassword1 = $obj->escape($_POST['InputPassword1']);
        $InputPassword2 = $obj->escape($_POST['InputPassword2']);

        if (empty($pname)) $errors[0] =  "กรุณากรอกคำนำหน้า";
        if (empty($fname)) $errors[1] =  "กรุณากรอกชื่อ";
        if (empty($lname)) $errors[2] =  "กรุณากรอกนามสกุล";
        if (empty($username)) $errors[3] =  "กรุณากรอก Username";
        if (empty($InputPassword1)) $errors[4] =  "กรุณากรอกพาสเวิร์ด";
        if (empty($InputPassword2)) $errors[5] =  "กรุณากรอกพาสเวิร์ดตามด้านบน";
        if ($InputPassword1 != $InputPassword2 and !empty($InputPassword1) and !empty($InputPassword2)) $errors[6] =  "กรุณากรอกพาสเวิร์ดให้ตรงกัน";
        $user_check = $obj->check_username($username);
        $user_checkcid = $obj->check_cid($cid);

        if ($user_check) $errors[7] =  "ชื่อนี้มีอยู่ในระบบแล้ว";
        if ($user_checkcid) $errors[8] =  "cidนี้มีอยู่ในระบบแล้ว";
        if (empty( $cid)) $errors[9] =  "กรุณากรอก หมายเลขบัตรประชาชน";

        if (count($errors) == 0) {
            $pass = md5($InputPassword1);
            $pass = password_hash($pass, PASSWORD_DEFAULT);
            $queryInsert = $obj->insert_user($username, $pass, $pname, $fname, $lname,$cid);
            if ($queryInsert) {
                echo "<script>window.location.href = './login'</script>";
            }
        }
    }
    ?>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <form action="./register" method="POST" autocomplete="off">
                    <div class="row  mt-5">
                        <style>
                            p {
                                color: red;
                            }
                        </style>
                        <h3 class="mb-3">*เพิ่มข้อมูลบุคลากรก่อนทำการเพิ่ม user ทุกครั้ง* </h3>
                        <div class="col-lg-2">
                            <div class="mb-3">
                                <label for="Inputpname" class="form-label">คำนำหน้า</label>
                                <select class="form-control" name="pname" id="pname" require>
                                    <option value="" <?php echo !empty($_POST['pname']) ? "selected" : "" ?>>กรุณาเลือก</option>
                                    <option value="นาย" <?php echo $_POST['pname'] == "นาย" ? "selected" : "" ?>>นาย</option>
                                    <option value="นาง" <?php echo $_POST['pname'] == "นาง" ? "selected" : "" ?>>นาง</option>
                                    <option value="นางสาว" <?php echo $_POST['pname'] == "นางสาว" ? "selected" : "" ?>>นางสาว</option>
                                </select>
                                <?php if (!empty($errors[0])) echo "<p>" . $errors[0] . "</p>" ?>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="mb-3">
                                <label for="Inputfname" class="form-label">ชื่อ</label>
                                <input type="text" class="form-control" name="fname" id="fname" value="<?php echo empty($_POST['fname']) ? "" : $_POST['fname'] ?>" placeholder="ชื่อ" require>
                                <?php if (!empty($errors[1])) echo "<p>" . $errors[1] . "</p>" ?>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="mb-3">
                                <label for="Inputlname" class="form-label">นามสกุล</label>
                                <input type="text" class="form-control" name="lname" id="lname" value="<?php echo empty($_POST['lname']) ? "" : $_POST['lname'] ?>" placeholder="นามสกุล" require>
                                <?php if (!empty($errors[2])) echo "<p>" . $errors[2] . "</p>" ?>
                            </div>
                        </div>
                    </div>



                    <div class="mb-3">
                        <label  class="form-label">เลขบัตรประชาชน</label>
                        <input type="text" class="form-control" name="cid" id="cid" maxlength="13" value="<?php echo empty($_POST['cid']) ? "" : $_POST['cid'] ?>" placeholder="เลขบัตรประชาชน" require>
                        <?php if (!empty($errors[9])) echo "<p>" . $errors[9] . "</p>";
                        elseif (!empty( $errors[8])) echo "<p>" .  $errors[8] . "</p>";
                        ?>
                    </div>


                    <div class="mb-3">
                        <label for="InputEmail1" class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" id="username" value="<?php echo empty($_POST['username']) ? "" : $_POST['username'] ?>" placeholder="username" require>
                        <?php if (!empty($errors[3])) echo "<p>" . $errors[3] . "</p>";
                        elseif (!empty($errors[7])) echo "<p>" . $errors[7] . "</p>";
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
                    <button type="submit" style="color:black;" name="submit" id="submit" class="btn btn-warning">Register</button>
                </form>
            </div>
        </div>
    </div>

    <?php require "./public/components/footer.php" ?>
</body>

</html>