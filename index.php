<?php

use AltoRouter as Router;

require_once  __DIR__ . '/vendor/autoload.php';
$router = new Router();
$router->setBasePath('/hr_officer');
session_start();

// กำหนด route ในเว็บหน้าปกติ
$router->map("GET", "/", function () {
    require __DIR__ . "./public/page/index.php";
});

$router->map("GET", "/about", function () {
    require __DIR__ . "./public/page/about.php";
});

$router->map("GET", "/leave_form", function () {
    require __DIR__ . "./public/page/leave_form.php";
});

$router->map("GET", "/calendar_leave", function () {
    require __DIR__ . "./public/page/calendar_leave.php";
});

$router->map("GET", "/detail", function () {
    require __DIR__ . "./public/page/detail.php";
});

// Delete
$router->map("GET|post", "/delete/[a:page]/[i:id]", function ($page, $id) {
    require __DIR__ . "./public/page/delete.php";
});




//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> ส่วน admin (ข้อมูลพื้นฐาน)<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
// Workgroup
if(isset($_SESSION['fullname']) && ( $_SESSION['role'] == 1 ||  $_SESSION['role'] == 2) ){
    $router->map("GET", "/tabledepartment", function () {
        // return 'homepage';
        require __DIR__ . "./public/page/tabledepartment.php";
    });
    $router->map("GET|post", "/manageworkgroup", function () {
        require __DIR__ . "./public/page/manageworkgroup.php";
    });
    $router->map("GET|post", "/manageworkgroup/[i:id]", function ($id) {
        require __DIR__ . "./public/page/manageworkgroup.php";
    });

    // Mission
    $router->map("GET", "/tabledetailmission", function () {
        require __DIR__ . "./public/page/tabledetailmission.php";
    });
    $router->map("GET|post", "/managemission/[i:id]", function ($id) {
        require __DIR__ . "./public/page/managemission.php";
    });
    $router->map("GET|post", "/managemission", function () {
        require __DIR__ . "./public/page/managemission.php";
    });

    // position
    $router->map("GET", "/tableposition", function () {
        require __DIR__ . "./public/page/tableposition.php";
    });
    $router->map("GET|post", "/manageposition", function () {
        require __DIR__ . "./public/page/manageposition.php";
    });
    $router->map("GET|post", "/manageposition/[i:id]", function ($id) {
        require __DIR__ . "./public/page/manageposition.php";
    });

    // person
    $router->map("GET", "/tableperson", function () {
        require __DIR__ . "./public/page/tableperson.php";
    });
    $router->map("GET", "/manageperson", function () {
        require __DIR__ . "./public/page/manageperson.php";
    });
    $router->map("GET|post", "/manageperson/[i:id]", function ($id) {
        require __DIR__ . "./public/page/manageperson.php";
    });

    // persontype
    $router->map("GET", "/tablepersontype", function () {
        require __DIR__ . "./public/page/tablepersontype.php";
    });

    $router->map("GET", "/updatedepart/[i:id]", function ($id) {
        require __DIR__ . "./public/page/updatedepart.php";
    });
    

}
//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> End ส่วน admin (ข้อมูลพื้นฐาน)<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<






//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>  ส่วน admin (USER ROLE)<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
if(isset($_SESSION['fullname']) && ( $_SESSION['role'] == 1 ||  $_SESSION['role'] == 2 || $_SESSION['role'] == 3 ) ){
    $router->map("GET", "/tableusergroup", function () {
        require __DIR__ . "./public/page/tableusergroup.php";
    });
    $router->map("GET|POST", "/register", function () {
        require __DIR__ . "./public/page/register.php";
    });
}
//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> End ส่วน admin (ข้อมูลพื้นฐาน)<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<








//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>  ส่วน User ทั่วไป หรือต้องมีการเข้าสู่ระบบ<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
if(isset($_SESSION['fullname']) && (isset($_SESSION['role'] )) ){
    $router->map("GET", "/form", function () {
        require __DIR__ . "./public/page/listform.php";
    });
    $router->map("GET", "/form_request_salary", function () {
        require __DIR__ . "./public/page/form/01from_request_salary.php";
    });
}
//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>  ส่วน User ทั่วไป หรือต้องมีการเข้าสู่ระบบ <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<














$router->map("GET", "/logout", function () {
    require __DIR__ . "./public/page/logout.php";
});

$router->map("GET|POST", "/login", function () {
    // return 'homepage';
    require __DIR__ . "./public/page/login.php";
});


function check_userrole( ){
    // $user_role_id = $_SESSION['role'];
    $user_fullname = $_SESSION['fullname'];
    return $user_fullname ;
}




$match = $router->match();
if (is_array($match) && is_callable($match['target'])) {
    call_user_func_array($match['target'], $match['params']);
} else {
    // echo "ไม่พบหน้าที่ต้องการ";
    require __DIR__ . "./public/page/404.php";
}
