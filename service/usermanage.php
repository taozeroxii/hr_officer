<?php
include './config/dbcon.php';

class manage_user extends Dbcon
{
    public function insert($cpu)
    {
        $result = mysqli_query($this->mycon, "insert into com_cpu (cpu) value ('$cpu') ");
        return $result;
    }

    public function fetchdata()
    {
        $result = mysqli_query($this->mycon, "select * from hrd_cpa_mission");
        return $result;
    }

    public function findOne($id)
    {
        $result = mysqli_query($this->mycon, "select * from com_cpu where id  = '$id'");
        return $result;
    }

    public function update($cpu, $id)
    {
        $result = mysqli_query($this->mycon, "UPDATE com_cpu SET cpu = '$cpu' where id = '$id'");
        return $result;
    }

    public function delete($id)
    {
        $result = mysqli_query($this->mycon, "DELETE FROM com_cpu where id = '$id'");
        return $result;
    }
    public function escape($v)
    {
        $result = mysqli_real_escape_string($this->mycon, $v);
        return $result;
    }

    public function login_user($u)
    {
        $result = mysqli_query($this->mycon, "SELECT * FROM hr_user WHERE username = '$u'");
        return mysqli_fetch_assoc($result);
    }
    public function check_username($v)
    {
        $result = mysqli_fetch_assoc(mysqli_query($this->mycon, "SELECT username FROM hr_user WHERE username = '$v'"));
        return $result;
    }
    public function insert_user($username, $pass, $pname, $fname, $lname)
    {
        $result = mysqli_query($this->mycon, "INSERT INTO hr_user (username ,password ,pname ,fname ,lname ,user_role_id ) VALUES ('$username', '$pass', '$pname', '$fname', '$lname' ,0)");
        return $result;
    }




    // USER GROUP กลุ่มผู้ใช้งาน
    public function fetchUser_group()
    {
        $result = mysqli_query($this->mycon, "select * from hr_user_role");
        return $result;
    } 


    
} 
