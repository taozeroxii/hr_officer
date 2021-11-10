<?php
include_once './config/dbcon.php';

class manage_officer extends Dbcon
{

     //MISSION  -----------------------------------------------------------------------------------
    public function fetchdata_mission(){
        $result = mysqli_query($this->mycon, "select * from hr_cpa_mission");
        return $result;
    }
    public function insert_mission($v1) {
        $value = mysqli_real_escape_string($this->mycon, $v1);
        $v2 = mysqli_query($this->mycon, "select MAX(mission_id)+1 from hr_cpa_mission");
        if ($value != null && $v2 != null)
            $result = mysqli_query($this->mycon, "INSERT INTO hr_cpa_mission (mission_name, mission_id) VALUES ('$value', '" . mysqli_fetch_array($v2)[0] . "')");
        return $result;
    }
    public function update_mission($v1, $v2)
    {
        if ($v1 != null && $v2 != null)
            $result = mysqli_query($this->mycon, "UPDATE hr_cpa_mission SET mission_name = '$v1' WHERE mission_id = '$v2';");
        return $result;
    }
    public function delete_mission($id)
    {
        $qisuse = mysqli_query($this->mycon, "SELECT * FROM hr_cpa_workgroup where mission_id = '$id'");
        $rowcount=mysqli_num_rows($qisuse);
        if($rowcount == 0){
            $result = mysqli_query($this->mycon, "DELETE FROM hr_cpa_mission WHERE mission_id = '$id'");
        }
        return $result;
    }

 
    // ของหน้าแสดงผล detail โชวแค่ชื่ออย่างเดียว
    public function fetchdata_mission_all_byid($id)
    {
        $result = mysqli_query($this->mycon, "select * from hr_cpa_workgroup where id = '$id'");
        return  $result;
    }
    public function fetchdata_mission_byid($id)
    {
        $result = mysqli_query($this->mycon, "select * from hr_cpa_mission where mission_id = '$id'");
        while ($row = mysqli_fetch_array($result)) {
            $mission = $row['mission_name'];
        }
        if( $mission == '') { $mission = 'ไม่ได้เลือกกลุ่มภารกิจ';}
        return  $mission;
    }
    public function fetchdata_workgroup_byid($id)
    {
        $result = mysqli_query($this->mycon, "select * from hr_cpa_workgroup where id = '$id'");
        while ($row = mysqli_fetch_array($result)) {
            $workgroup = $row['workgroup'];
        }
        if( $workgroup == '') { $workgroup = 'ไม่ได้เลือกหน่วยงาน';}
        return  $workgroup;
    }


   //department WORKGROUP -------------------------------------------------------------------------
    public function fetchdata_department(){
        $result = mysqli_query($this->mycon, "select * from hr_cpa_workgroup");
        return $result;
    }
    public function fetchdata_department_byworkgroup($idworkgroup){
        $result = mysqli_query($this->mycon, "select * from hr_cpa_workgroup WHERE mission_id = '$idworkgroup'");
        return $result;
    }
    public function insert_workgroup($workgroup,$mission_id)
    {
        $searchid = "select max(id) as id  from hr_cpa_workgroup";//หาไอดีล่าสุดใน db
        $queryid = mysqli_query($this->mycon, $searchid );
        while ($row = mysqli_fetch_array($queryid)) {
            $maxid = $row['id'];
        }
        $maxid += 1;
        $result = mysqli_query($this->mycon, "insert into hr_cpa_workgroup (id,workgroup ,mission_id ) value ('$maxid','$workgroup','$mission_id') ");
        return  $result;
    }
    public function update_workgroup($workgroup_id,$workgroupname,$mission_id)
    {
       $result = mysqli_query($this->mycon, "UPDATE  hr_cpa_workgroup SET workgroup = '$workgroupname' , mission_id = '$mission_id'  WHERE id = '$workgroup_id'");
       return $result;
    }
    public function delete_workgroup($workgroup_id)
    {
        $qisuse = mysqli_query($this->mycon, "SELECT * FROM hr_cpa_person_main where workgroup = '$workgroup_id'");
        $rowcount=mysqli_num_rows($qisuse);
        if($rowcount == 0){
            $result = mysqli_query($this->mycon, "DELETE FROM hr_cpa_workgroup WHERE id = '$workgroup_id'");
        }
        else{
            return false;
        }

        return $result;
    }

    

    //PERSON  MAIN-------------------------------------------------------------------------
    public function fetchdata_person_by_mission($mission_id){
        $result = mysqli_query($this->mycon, 
        "SELECT hpm.*,hcw.id as workgroup_id,hcw.workgroup as workgroup_name,hcw.mission_id 
        FROM hr_cpa_person_main hpm
        LEFT JOIN hr_cpa_workgroup hcw on hcw.id = hpm.workgroup
        WHERE hcw.mission_id = '$mission_id'
        ");
        return $result;
    }
    public function fetchdata_person_by_workgroup($workgroup){
        $result = mysqli_query($this->mycon, 
        "SELECT hpm.*,hcw.id as workgroup_id,hcw.workgroup as workgroup_name,hcw.mission_id ,hrt.person_name as typeposition_name
        FROM hr_cpa_person_main hpm
        LEFT JOIN hr_cpa_workgroup hcw on hcw.id = hpm.workgroup
        LEFT JOIN hr_cpa_person_type hrt on hrt.id = hpm.typeposition_id
        WHERE hcw.id = '$workgroup'
        ");
        return $result;
    }
    public function fetchdata_person_by_name($fname,$lname){
        $rfname= mysqli_real_escape_string($this->mycon,$fname);
        $rlname= mysqli_real_escape_string($this->mycon,$lname);
        
        if($rfname != '' && $rlname == ''){
            $result = mysqli_query($this->mycon, 
            "SELECT hpm.*,hcw.id as workgroup_id,hcw.workgroup as workgroup_name,hcw.mission_id ,hrt.person_name as typeposition_name
            FROM hr_cpa_person_main hpm
            LEFT JOIN hr_cpa_workgroup hcw on hcw.id = hpm.workgroup
			LEFT JOIN hr_cpa_person_type hrt on hrt.id = hpm.typeposition_id
            WHERE hpm.fname like '%$rfname%'");
        }
        else if($rfname == '' && $rlname != ''){
            $result = mysqli_query($this->mycon, 
            "SELECT hpm.*,hcw.id as workgroup_id,hcw.workgroup as workgroup_name,hcw.mission_id ,hrt.person_name as typeposition_name
            FROM hr_cpa_person_main hpm
            LEFT JOIN hr_cpa_workgroup hcw on hcw.id = hpm.workgroup
			LEFT JOIN hr_cpa_person_type hrt on hrt.id = hpm.typeposition_id
            WHERE hpm.lname like '%$rlname%'");
        }
        else if($rfname != '' && $lname != ''){
            $result = mysqli_query($this->mycon, 
            "SELECT hpm.*,hcw.id as workgroup_id,hcw.workgroup as workgroup_name,hcw.mission_id ,hrt.person_name as typeposition_name
            FROM hr_cpa_person_main hpm
            LEFT JOIN hr_cpa_workgroup hcw on hcw.id = hpm.workgroup
			LEFT JOIN hr_cpa_person_type hrt on hrt.id = hpm.typeposition_id
            WHERE hpm.fname like '%$rfname%' AND hpm.lname like '%$rlname%' ");
        }
        return $result;
    }
    public function fetchdata_all_person(){
        $result = mysqli_query($this->mycon, 
        "SELECT hrm.*,hru.user_role_id,hru.cid as haveuser_yet
        FROM hr_cpa_person_main hrm 
        LEFT JOIN hr_user hru on hru.cid = hrm.cid ");
        return $result;
    }
    public function fetchdata_person_byid($id){
        $result = mysqli_query($this->mycon, "SELECT * FROM hr_cpa_person_main where id = '$id'");
        return $result;
    }
    public function insert_person($pname,$fname,$lname,$cid,$workgroup_id,$position,$typeposition,$birthday,$userupdate,$position_id){
        $ipaddress =  $this-> get_client_ip();
        $result = mysqli_query($this->mycon, "INSERT INTO  hr_cpa_person_main  (id,workgroup ,mission_id ) 
        value ('$pname','$fname','$lname','$cid','$workgroup_id','$position','$typeposition','$birthday','$userupdate','$ipaddress','$position_id')");
        return $result;
    }

    public function delete_person($id){
        $result = mysqli_query($this->mycon, "DELETE FROM hr_cpa_person_main WHERE id = '$id'");
        return $result;
    }
    
    //persontype  -------------------------------------------------------------------------
    public function fetchdata_person_type(){
        $result = mysqli_query($this->mycon, "SELECT * FROM hr_cpa_person_type");
        return $result;
    }





    //position  -------------------------------------------------------------------------
    public function fetchdata_position(){
        $result = mysqli_query($this->mycon, "select * from hrd_cpa_position");
        return $result;
    }
    public function delete_postition($id){
        $qisuse = mysqli_query($this->mycon, "SELECT * FROM hr_cpa_person_main where position_id = '$id'");
        $rowcount=mysqli_num_rows($qisuse);
        if($rowcount == 0){
            $result = mysqli_query($this->mycon, "DELETE FROM hrd_cpa_position WHERE id = '$id'");
        }
        return $result;
    }
    public function insert_position($name){
        $valuename = mysqli_real_escape_string($this->mycon, $name);
        $v2 = mysqli_query($this->mycon, "select MAX(id)+1 from hrd_cpa_position");
        if ($valuename != null && $v2 != null)
            $result = mysqli_query($this->mycon, "INSERT INTO hrd_cpa_position (position_name, id) VALUES ('$valuename', '" . mysqli_fetch_array($v2)[0] . "')");
        return $result;
    }
    public function update_position($name,$id){
        $result = mysqli_query($this->mycon, "UPDATE  hrd_cpa_position SET position_name = '$name'   WHERE id = '$id'");
        return $result;
    }



    //person_type  -------------------------------------------------------------------------
    public function fetchdata_persontype(){
        $result = mysqli_query($this->mycon, "select * from hr_cpa_person_type");
        return $result;
    }
    




    // Function to get the client IP address
    function get_client_ip() {
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if(isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }

    public function check_cid($v)
    {
        $result = mysqli_fetch_assoc(mysqli_query($this->mycon, "SELECT cid FROM hr_user WHERE cid = '$v'"));
        return $result;
    }

    public function escape($v)
    {
        $result = mysqli_real_escape_string($this->mycon, $v);
        return $result;
    }
    
    public function person_count(){
        $result = mysqli_query($this->mycon, " SELECT 'จำนวนเจ้าหน้าที่ทั้งหมด' AS pn, 'bg-info' AS bg_color,SUM(person_total) AS person_total
        FROM hr_cpa_person_type 
        UNION
        SELECT person_name AS pn,bg_color AS ii,person_total
        FROM hr_cpa_person_type ");
        return $result;
    }
    public function person_sum(){
        $result = mysqli_query($this->mycon, " SELECT SUM(person_total) AS person_sum FROM hr_cpa_person_type "); 
        return $result;
    }
    
}//end class
