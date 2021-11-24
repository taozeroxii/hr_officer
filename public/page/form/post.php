
    <?php
    require "./service/formmanage.php";
    $obj  = new manage_form();
    $sql = $obj->approve($_POST['id'], $_POST['status']);
    if ($sql)
        header("location: ./form_request_salary_admin");
