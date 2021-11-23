<?php
include './config/dbcon.php';

class manage_form extends Dbcon
{
    public function insert($formid, $user_id, $person_main_id, $formname, $fullname, $note)
    {
        mysqli_real_escape_string($this->mycon, $note);
        $sql = "INSERT INTO hr_form_list (form_id,user_id,person_main_id,form_name,fullname,note) VALUE ('$formid','$user_id','$person_main_id','$formname','$fullname','$note')";
        $result = mysqli_query($this->mycon, $sql);
        if ($result)  return $result;
        else return mysqli_error($this->mycon);
    }

    public function fetct_byuser($userid)
    {
        $result = mysqli_query($this->mycon, "select * from hr_form_list where user_id = '$userid'");
        return $result;
    }
    public function fetct_byadmin()
    {
        $result = mysqli_query($this->mycon, "select * from hr_form_list ORDER BY timestamp DESC LIMIT 1000 ");
        return $result;
    }
    public function fetch_leave()
    {
        $result = mysqli_query($this->mycon, "select * from hr_cpa_leave");
        return $result;
    }
    public function approve($id, $statusapprove)
    {
        $result = mysqli_query($this->mycon, "UPDATE hr_form_list SET status = '$statusapprove' WHERE id = $id");
        return $result;
    }
}
