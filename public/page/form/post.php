
    <?php
    require "./service/formmanage.php";
    $obj  = new manage_form();
    $sql = $obj->approve($_POST['id'], $_POST['status']);
    echo $_POST['id'];
    echo $_POST['status'];
    header("location: ./form_request_salary_admin");
