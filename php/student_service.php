<?php
	header('Content-type: application/json');
	header("Access-Control-Allow-Origin: *");
	header('Access-Control-Allow-Headers: X-Requested-With, content-type, access-control-allow-origin, access-control-allow-methods, access-control-allow-headers');

    require('student.php');
    
    if(array_key_exists('service', $_GET)&&!empty($_GET['service'])){
		$service = $_GET['service'];
        $student = new Student();
        
        switch($service){
            case "add_student":
                $fname = $_GET['fname'];
                $lname = $_GET['lname'];
                $join_date = $_GET['join_date'];
                $password = $_GET['password'];
                $subject = $_GET['subject'];
                $mobile = $_GET['mobile'];
                $gender = $_GET['gender'];
                $admission_no = $_GET['admission_no'];
                $birth_date = $_GET['birth_date'];
                $student_id = $_GET['student_id'];
                $class = $_GET['class'];
                $section = $_GET['section'];
                $religion = $_GET['religion'];
                $father_name = $_GET['father_name'];
                $mother_name = $_GET['mother_name'];
                $father_occupation = $_GET['father_occupation'];
                $mother_occupation = $_GET['mother_occupation'];
                $parents_mobile = $_GET['parents_mobile'];
                $nationality = $_GET['nationality'];
                $present_address = $_GET['present_address'];
                $parmanent_address = $_GET['parmanent_address'];

                $data = 
                $student->add_student($fname,$lname,$join_date,$password,$subject,$mobile,$gender,$admission_no,$birth_date,$student_id,$class,$section,$religion,$father_name,$mother_name,$father_occupation,$mother_occupation,$parents_mobile,$nationality, $present_address,$parmanent_address);
                echo json_encode($data);
                break;
            
            case "edit_student":
                $id = $_GET['id'];
                $fname = $_GET['fname'];
                $lname = $_GET['lname'];
                $join_date = $_GET['join_date'];
                $password = $_GET['password'];
                $subject = $_GET['subject'];
                $mobile = $_GET['mobile'];
                $gender = $_GET['gender'];
                $admission_no = $_GET['admission_no'];
                $birth_date = $_GET['birth_date'];
                $student_id = $_GET['student_id'];
                $class = $_GET['class'];
                $section = $_GET['section'];
                $religion = $_GET['religion'];
                $father_name = $_GET['father_name'];
                $mother_name = $_GET['mother_name'];
                $father_occupation = $_GET['father_occupation'];
                $mother_occupation = $_GET['mother_occupation'];
                $parents_mobile = $_GET['parents_mobile'];
                $nationality = $_GET['nationality'];
                $present_address = $_GET['present_address'];
                $parmanent_address = $_GET['parmanent_address'];

                $data = 
                $student->add_student($id, $fname,$lname,$join_date,$password,$subject,$mobile,$gender,$admission_no,$birth_date,$student_id,$class,$section,$religion,$father_name,$mother_name,$father_occupation,$mother_occupation,$parents_mobile,$nationality, $present_address,$parmanent_address);
                echo json_encode($data);
                break;
        }
    }
    