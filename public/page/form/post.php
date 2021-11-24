
    <?php
    require "./service/formmanage.php";
    $obj  = new manage_form();
    $sql = $obj->approve($_POST['id'], $_POST['status'], $_POST['userupdate']);
    if ($sql)
        header("location: ./form_request_salary_admin");
