<?php
	header('Content-type: application/json');
	header("Access-Control-Allow-Origin: *");
    header('Access-Control-Allow-Headers: X-Requested-With, content-type, access-control-allow-origin, access-control-allow-methods, access-control-allow-headers');

    include('connection.php');

    class Student{ 
        public $db;

        function __construct() {
            $pdo_all = database::getInstance()->getConnection();
            $this->db = $pdo_all['pdo_sct_hr'];
        }

        function add_student($fname, $lname,$password,$subject,$mobile,$gender,$admission_no,$birth_date,$student_id,$class,$section,$religion,$father_name,$mother_name,$father_occupation,$mother_occupation,$parents_mobile,$nationality, $present_address,$parmanent_address){
            
            $fname = $this->db->quote($fname);
            $lname = $this->db->quote($lname);
            $password = $this->db->quote($password);
            $subject = $this->db->quote($subject);
            $gender = $this->db->quote($gender);
            $class = $this->db->quote($class);
            $religion = $this->db->quote($religion);
            $father_name = $this->db->quote($father_name);
            $mother_name = $this->db->quote($mother_name);
            $father_occupation = $this->db->quote($father_occupation);
            $mother_occupation = $this->db->quote($mother_occupation);
            $nationality =$this->db->quote($nationality);
            $present_address = $this->db->quote($present_address);
            $parmanent_address = $this->db->quote($parmanent_address);
            
            
            
            $sql = "INSERT INTO `s_infos`( `firstname`, `lastname`, `joining_date`, `password`, `subject`, `mobile`, `gender`, `admission_no`, `birth_date`, `student_id`, `class`, `section`, `religion`, `father_name`, `mother_name`, `father_occupation`, `mother_occupation`, `parents_mobile`, `nationality`, `present_address`, `parmanent_address`) VALUES
             ( $fname, $lname,
              NOW() , $password, 
              $subject, $mobile, 
              $gender, $admission_no, 
              $birth_date,  $student_id, 
              $class, $section,
               $religion, $father_name, 
               $mother_name, $father_occupation, 
               $mother_occupation, $parents_mobile,  $nationality, 
               $present_address, $parmanent_address)";

			$result=$this->db->prepare($sql);
            // $result->execute();
            if($result->execute()) {
                return "1";
            } else{
                $result = "error in inserting into table s_info";
                return $result;
            } 
        }

        function edit_student($id, $fname, $lname,$password,$subject,$mobile,$gender,$admission_no,$birth_date,$student_id,$class,$section,$religion,$father_name,$mother_name,$father_occupation,$mother_occupation,$parents_mobile,$nationality, $present_address,$parmanent_address){
            $fname = $this->db->quote($fname);
            $lname = $this->db->quote($lname);
            $password = $this->db->quote($password);
            $subject = $this->db->quote($subject);
            $gender = $this->db->quote($gender);
            $class = $this->db->quote($class);
            $religion = $this->db->quote($religion);
            $father_name = $this->db->quote($father_name);
            $mother_name = $this->db->quote($mother_name);
            $father_occupation = $this->db->quote($father_occupation);
            $mother_occupation = $this->db->quote($mother_occupation);
            $nationality =$this->db->quote($nationality);
            $present_address = $this->db->quote($present_address);
            $parmanent_address = $this->db->quote($parmanent_address);

            $sql = "UPDATE `s_infos` SET `firstname`=$fname,`lastname`=$lname,`password`=$password,`subject`=$subject,`mobile`=$mobile,`gender`=$gender,`admission_no`=$admission_no,`birth_date`=$birth_date,`student_id`=$student_id,`class`=$class,`section`=$section,`religion`=$religion,`father_name`=$father_name,`mother_name`=$mother_name,`father_occupation`=$father_occupation,`mother_occupation`=$mother_occupation,`parents_mobile`=$parents_mobile,`nationality`=$nationality,`present_address`=$present_address,`parmanent_address`=$parmanent_address  WHERE id = $id";

			$result=$this->db->prepare($sql);
            if($result->execute()) {
                return "1";
            } else{
                $result = "error in Updating table s_info";
                return $result;
            } 
        }

        function get_all_student($take, $skip){
            if($take == "all"){
	            $query ="SELECT * from s_infos";
	        }else{
	            $query ="SELECT * from s_infos LIMIT $skip,$take";
	        }
            $data = $this->db->prepare($query);
            $data->execute();
            $data->setFetchMode(PDO::FETCH_ASSOC);
            $result = $data->fetchAll();
            $total = sizeof($result);
            $data_result = array('records' => $result, 'total' => $total);
            // echo $data_result;die();
            return $data_result;
    }
    }
