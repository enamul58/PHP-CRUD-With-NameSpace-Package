<?php


namespace App\classes;


class Student
{

    private function dbConnection(){
        $hostName = 'localhost';
        $user      = 'root';
        $password  = '';
        $database  = 'mydatabase';
        $link =  mysqli_connect( $hostName, $user, $password,$database);
        return $link;
    }

    public function saveStudentInfo( $data){
            $name = $data['name'];
            $email = $data['email'];
            $mobile = $data['mobile'];

            //db connection

            $sql = "INSERT INTO students (name, email, mobile)
                     VALUES ('$name','$email','$mobile')";

        if( mysqli_query(Student::dbConnection(), $sql ) ){
            $massage = "Student info save successfully";
            return $massage;
        }else{
            die('Query problem'.mysqli_error( Student::dbConnection()));
        }
    }

    public function getAllStudentInfo(){
        //DB Connection

        //query
        $sql = "SELECT * FROM students";

        if( mysqli_query( Student::dbConnection(), $sql ) ){
            $resultQuery = mysqli_query(Student::dbConnection(), $sql);
            return $resultQuery;
        }else{
            die('Query problem'.mysqli_error( Student::dbConnection() ));
        }
    }

    public function editInformationById( $id ){
        $sql = "SELECT * FROM students WHERE id = '$id'";

        if( mysqli_query( Student::dbConnection(), $sql ) ){
            $resultQuery = mysqli_query(Student::dbConnection(), $sql);
            return $resultQuery;
        }else{
            die('Query problem'.mysqli_error( Student::dbConnection() ));
        }
    }

    public function updateStudentInfo( $data ){
        $sql = "UPDATE students SET name ='$data[name]', email = '$data[email]', mobile = '$data[mobile]' where id = '$data[id]'";

        if( mysqli_query( Student::dbConnection(), $sql ) ){
             header('Location: view-student.php');
        }else{
            die('Query problem'.mysqli_error( Student::dbConnection() ));
        }
    }
    public function deleteStudentInfo( $id ){
        $sql = "DELETE FROM students WHERE id = '$id'";
        if( mysqli_query( Student::dbConnection(), $sql ) ){
            $message = "Delete student info successfully.";
            return $message;
        }else{
            die('Query problem'.mysqli_error( Student::dbConnection() ));
        }
    }

}