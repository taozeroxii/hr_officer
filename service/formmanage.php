<?php
include './config/dbcon.php';

class manage_form extends Dbcon
{
    public function insert($formid, $user_id, $person_main_id, $formname, $fullname, $mobilephone, $inphone, $cert_type_id, $note,$now_dep_id)
    {
        mysqli_real_escape_string($this->mycon, $note);
        $insertdate = date('Y-m-d H:i:s');
        $sql = "INSERT INTO hr_form_list (form_id,user_id,person_main_id,form_name,fullname,mobilephone,inphone,note,cert_type_id,insert_datetime,now_dep_id) VALUE ('$formid','$user_id','$person_main_id','$formname',' $fullname','$mobilephone','$inphone','$note','$cert_type_id','$insertdate','$now_dep_id')";
        $result = mysqli_query($this->mycon, $sql);
        if ($result)  return $result;
        else return mysqli_error($this->mycon);
    }

    public function fetct_byuser($userid)
    {
        $result = mysqli_query($this->mycon, "SELECT hl.*,ht.cert_type_name  FROM hr_form_list hl LEFT JOIN hr_cert_type ht on hl.cert_type_id = ht.id where user_id = '$userid' ORDER BY insert_datetime DESC LIMIT 10");
        return $result;
    }

    public function fetctprint_byuser($userid)
    {
        $result = mysqli_query($this->mycon, "select hfl.*,pm.mobile_phone_number,pm.typeposition_id,hpt.person_name,pm.position_id,position_name,
            pm.workgroup as workgroupid ,wg.workgroup,wg.mission_id,hcm.mission_name
            from hr_form_list hfl
            LEFT JOIN hr_cpa_person_main pm ON hfl.person_main_id  = pm.id
            LEFT JOIN hrd_cpa_position hrp on hrp.id = pm.position_id
            LEFT JOIN hr_cpa_person_type   hpt on hpt.id = pm.typeposition_id
            LEFT JOIN hr_cpa_workgroup wg on wg.id = pm.workgroup
            LEFT JOIN hr_cpa_mission hcm on hcm.mission_id = wg.mission_id
            where hfl.id = '$userid'
            ORDER BY timestamp DESC LIMIT 1");
        return $result;
    }
    public function fetct_byadmin($buttonclick)
    {
        $status = mysqli_real_escape_string($this->mycon, $buttonclick);
        if ($status == null || $status == '') {
            $result = mysqli_query($this->mycon, "select hfl.*,pm.typeposition_id,hpt.person_name,pm.position_id,position_name,
            pm.workgroup as workgroupid ,wg.workgroup,wg.mission_id,hcm.mission_name,pm.cid
            from hr_form_list hfl
            LEFT JOIN hr_cpa_person_main pm ON hfl.person_main_id  = pm.id
            LEFT JOIN hrd_cpa_position hrp on hrp.id = pm.position_id
            LEFT JOIN hr_cpa_person_type   hpt on hpt.id = pm.typeposition_id
            LEFT JOIN hr_cpa_workgroup wg on wg.id = pm.workgroup
            LEFT JOIN hr_cpa_mission hcm on hcm.mission_id = wg.mission_id
            where status is null
            ORDER BY timestamp DESC LIMIT 1000");
        } else if ($status === 'all') {
            $result = mysqli_query($this->mycon, "select hfl.*,pm.typeposition_id,hpt.person_name,pm.position_id,position_name,
            pm.workgroup as workgroupid ,wg.workgroup,wg.mission_id,hcm.mission_name,pm.cid
            from hr_form_list hfl
            LEFT JOIN hr_cpa_person_main pm ON hfl.person_main_id  = pm.id
            LEFT JOIN hrd_cpa_position hrp on hrp.id = pm.position_id
            LEFT JOIN hr_cpa_person_type   hpt on hpt.id = pm.typeposition_id
            LEFT JOIN hr_cpa_workgroup wg on wg.id = pm.workgroup
            LEFT JOIN hr_cpa_mission hcm on hcm.mission_id = wg.mission_id
            ORDER BY timestamp DESC LIMIT 1000");
        } else {
            $result = mysqli_query($this->mycon, "select hfl.*,pm.typeposition_id,hpt.person_name,pm.position_id,position_name,
            pm.workgroup as workgroupid ,wg.workgroup,wg.mission_id,hcm.mission_name,pm.cid
            from hr_form_list hfl
            LEFT JOIN hr_cpa_person_main pm ON hfl.person_main_id  = pm.id
            LEFT JOIN hrd_cpa_position hrp on hrp.id = pm.position_id
            LEFT JOIN hr_cpa_person_type   hpt on hpt.id = pm.typeposition_id
            LEFT JOIN hr_cpa_workgroup wg on wg.id = pm.workgroup
            LEFT JOIN hr_cpa_mission hcm on hcm.mission_id = wg.mission_id
            where status = '$status'
            ORDER BY timestamp DESC LIMIT 1000");
        }

        return $result;
    }
    public function fetch_leave() // query ประเภทการลา
    {
        $result = mysqli_query($this->mycon, "select * from hr_cpa_leave where form_type = '1'");
        return $result;
    }
    public function approve($id, $statusapprove, $userupdate)
    {
        $result = mysqli_query($this->mycon, "UPDATE hr_form_list SET status = '$statusapprove' , user_appove_status = '$userupdate'  WHERE id = $id");
        return $result;
    }


    // ปุ่มตัวเลือกประเภทใบรับรอง
    public function fetch_cert_type()
    {
        $result = mysqli_query($this->mycon, "select * from hr_cert_type where status = '1'");
        return $result;
    }
    //ปุ่มแผนก
    public function fetch_dep()
    {
        $result = mysqli_query($this->mycon, "select * from hr_cpa_workgroup ");
        return $result;
    }
}
