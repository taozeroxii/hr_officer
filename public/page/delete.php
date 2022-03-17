<?php
// echo 'page :'.$page;
// echo "<br>";
// echo "test : ".$id;
require "./service/officermanage.php";
$obj = new manage_officer;

if($page === 'workgroup'){
    $deleteitem = $obj->delete_workgroup($id);
    if( $deleteitem){
        echo "<script>window.location.href = '../../tabledepartment';</script>";
    }else {
        echo "<script>alert('พบข้อผิดพลาดไม่สามารถลบได้ ข้อมูลหน่วยงานถูกใช้งานอยู่');window.location.href = '../../tabledepartment';</script>";
    }

}else if($page === 'mission'){
    $deleteitem = $obj->delete_mission($id);
    if( $deleteitem){
        echo "<script>window.location.href = '../../tabledetailmission';</script>";
    }else {
        echo "<script>alert('พบข้อผิดพลาดไม่สามารถลบได้ ข้อมูลหน่วยงานถูกใช้งานอยู่');window.location.href = '../../tabledetailmission';</script>";
    }
}else if($page === 'position'){
    $deleteitem = $obj->delete_postition($id);
    if( $deleteitem){
        echo "<script>window.location.href = '../../tableposition';</script>";
    }else {
        echo "<script>alert('พบข้อผิดพลาดไม่สามารถลบได้ ข้อมูลหน่วยงานถูกใช้งานอยู่');window.location.href = '../../tableposition';</script>";
    }
}else if($page === 'person'){
    $deleteitem = $obj->delete_person($id);
    if( $deleteitem){
        echo "<script>window.location.href = '../../tableperson';</script>";
    }else {
        echo "<script>alert('พบข้อผิดพลาดไม่สามารถลบได้ ข้อมูลหน่วยงานถูกใช้งานอยู่');window.location.href = '../../tableperson';</script>";
    }
}

//เพิ่มผู้ใช้งานระบบ ผ่านหน้า รายการบุคลากร
if($page === 'addUserperson'){
    $role = '';
    $role = ($_GET['role']);
    $adduser = $obj->add_user($id,$role);
     if( $adduser){
        echo "<script>alert('เพิ่มข้อมูลสำเร็จ');window.location.href = '../../tableperson';</script>";
    }else {
        echo "<script>alert('พบข้อผิดพลาดไม่สามารถเพิ่มข้อมูลได้');window.location.href = '../../tableperson';</script>";
    }
}





?>