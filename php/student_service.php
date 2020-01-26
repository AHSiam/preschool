<?php
	header('Content-type: application/json');
	header("Access-Control-Allow-Origin: *");
	header('Access-Control-Allow-Headers: X-Requested-With, content-type, access-control-allow-origin, access-control-allow-methods, access-control-allow-headers');

    require('student.php');
    
    if(array_key_exists('service', $_POST)&&!empty($_POST['service'])){
		$service = $_POST['service'];
        $student = new Student();
        
        switch($service){
            case "add_student":
                $fname = $_POST['fname'];
                $lname = $_POST['lname'];
                // $join_date = $_POST['join_date'];
                $password = $_POST['password'];
                $subject = $_POST['subject'];
                $mobile = $_POST['mobile'];
                $gender = $_POST['gender'];
                $admission_no = $_POST['admission_no'];
                $birth_date = $_POST['birth_date'];
                $student_id = $_POST['student_id'];
                $class = $_POST['class'];
                $section = $_POST['section'];
                $religion = $_POST['religion'];
                $father_name = $_POST['father_name'];
                $mother_name = $_POST['mother_name'];
                $father_occupation = $_POST['father_occupation'];
                $mother_occupation = $_POST['mother_occupation'];
                $parents_mobile = $_POST['parents_mobile'];
                $nationality = $_POST['nationality'];
                $present_address = $_POST['present_address'];
                $parmanent_address = $_POST['parmanent_address'];

                $data = 
                $student->add_student($fname,$lname,$password,$subject,$mobile,$gender,$admission_no,$birth_date,$student_id,$class,$section,$religion,$father_name,$mother_name,$father_occupation,$mother_occupation,$parents_mobile,$nationality, $present_address,$parmanent_address);
                echo json_encode($data);
                break;
            
            case "edit_student":
                $id = $_POST['id'];
                $fname = $_POST['fname'];
                $lname = $_POST['lname'];
                // $join_date = $_POST['join_date'];
                $password = $_POST['password'];
                $subject = $_POST['subject'];
                $mobile = $_POST['mobile'];
                $gender = $_POST['gender'];
                $admission_no = $_POST['admission_no'];
                $birth_date = $_POST['birth_date'];
                $student_id = $_POST['student_id'];
                $class = $_POST['class'];
                $section = $_POST['section'];
                $religion = $_POST['religion'];
                $father_name = $_POST['father_name'];
                $mother_name = $_POST['mother_name'];
                $father_occupation = $_POST['father_occupation'];
                $mother_occupation = $_POST['mother_occupation'];
                $parents_mobile = $_POST['parents_mobile'];
                $nationality = $_POST['nationality'];
                $present_address = $_POST['present_address'];
                $parmanent_address = $_POST['parmanent_address'];

                $data = 
                $student->edit_student($id, $fname,$lname,$password,$subject,$mobile,$gender,$admission_no,$birth_date,$student_id,$class,$section,$religion,$father_name,$mother_name,$father_occupation,$mother_occupation,$parents_mobile,$nationality, $present_address,$parmanent_address);
                echo json_encode($data);
                break;

            case "get_all_student":

	            if(isset($_GET['skip']) && isset($_GET['take'])){
	                $skip = $_GET['skip'];
	                $take = $_GET['take'];
	            } else{
	                $take = "all";
	                $skip =0;
                }
                
                $data = 
                $student->get_all_student($take, $skip);
                echo json_encode($data);
                break;
        }
    }
    