<?php
include './config/dbcon.php';

class manage_user extends Dbcon
{

    public function fetchdata()
    {
        $result = mysqli_query($this->mycon, "select * from hrd_cpa_mission");
        return $result;
    }
    
    public function escape($v)
    {
        $result = mysqli_real_escape_string($this->mycon, $v);
        return $result;
    }

    public function login_user($u)
    {
        $result = mysqli_query($this->mycon, "SELECT hru.id,hru.username,hru.password,hru.pname,
        hru.fname,hru.lname,hru.cid,hpm.id as person_id,hpm.position,hpm.typeposition ,hru.user_role_id
        FROM hr_user hru
        LEFT JOIN hr_cpa_person_main hpm on hru.cid = hpm.cid
        WHERE username = '$u'");
        return mysqli_fetch_assoc($result);
    }
    public function check_username($v)
    {
        $result = mysqli_fetch_assoc(mysqli_query($this->mycon, "SELECT username FROM hr_user WHERE username = '$v'"));
        return $result;
    }
    public function check_cid($v)
    {
        $result = mysqli_fetch_assoc(mysqli_query($this->mycon, "SELECT cid FROM hr_user WHERE cid = '$v'"));
        return $result;
    }

    public function check_cid_changepassword($person_id){
        $result = mysqli_fetch_assoc(mysqli_query($this->mycon, "SELECT cid FROM hr_cpa_person_main WHERE id = '$person_id' LIMIT 1"));
        $cid = $result['cid'];
        return $cid;
    }
    public function insert_user($username, $pass, $pname, $fname, $lname,$cid)
    {
        $result = mysqli_query($this->mycon, "INSERT INTO hr_user (username ,password ,pname ,fname ,lname ,user_role_id ,cid) VALUES ('$username', '$pass', '$pname', '$fname', '$lname' ,0,'$cid')");
        return $result;
    }
    public function changePassword($user_id,$password){
        $query =  mysqli_query($this->mycon,"UPDATE hr_user SET  password = '$password' WHERE id = '$user_id'");
        return $query;
    }





    // USER GROUP กลุ่มผู้ใช้งาน
    public function fetchUser_group()
    {
        $result = mysqli_query($this->mycon, "select * from hr_user_role");
        return $result;
    } 


    
} 
