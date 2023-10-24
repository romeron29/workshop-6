<?php
include ('connection.php');
include_once ('student2.php');



/* verify that one or more records exist */


/*Connect to Dababase and get the information about students*/

function verifyRecords(){
    $conn = getConnect();
    $sql = "call sp_studentsAmount;";
    $studentsQuery = mysqli_query($conn,$sql); 
    $row1 = mysqli_fetch_array($studentsQuery);
    $numberOfRecords = $row1['id'];
    mysqli_free_result($studentsQuery);
    mysqli_close($conn);
    return $numberOfRecords;
}


function chargeStudents($rows){
    $numberOfRecords = verifyRecords();
    $conn = getConnect();
    
    if($numberOfRecords > 0 && $rows < $numberOfRecords){
        $studentsSql = "call sp_studentsList($rows);";
        $studentsList = [];
        $studentsQuery2 = mysqli_query($conn,$studentsSql); 
        
        while($row = $studentsQuery2->fetch_assoc()){
            $id = $row['id'];
            $name = $row['name'];
            $lastname = $row['lastname'];
            $cedula = $row['cedula'];
            $age = $row['age'];
           
            $studen = new Student2($id,$name,$lastname,$cedula,$age);
            $studentsList[]= $studen;
        }

       
          mysqli_free_result($studentsQuery2);
          mysqli_close($conn);
          return $studentsList;
    }
    else{
        return false;
    }
   
}

function showStudents($rows){
    $students = chargeStudents($rows);
    if(!$students){
        echo 'Error connecting to database or number out of range.';
    }else{
        foreach($students as $s){
            echo "\n";
            echo $s->getId().','.$s->getName().','.$s->getLastname().','.$s->getCedula().' '.$s->getAge();
        }
        echo "\n ";
    }
    
}

?>