<?php
    require_once 'vendor/autoload.php';
    use App\classes\Student;
    $result = '';
    if( isset($_POST['btn'])){
        $result = Student::saveStudentInfo($_POST);
    }

?>
    <hr/>
        <a href="add-student.php">Add Student</a>||
        <a href="view-student.php">View Student</a>
    <hr/>
    <h3 style="color: green;"><?php echo $result?></h3>
    <form action="" method="post">
        <table>
            <tr>
                <th>Name:</th>
                <td><input type="text" name="name"></td>
            </tr>
            <tr>
                <th>Email Address:</th>
                <td><input type="text" name="email"></td>
            </tr>
            <tr>
                <th>Mobile Number:</th>
                <td><input type="number" name="mobile"></td>
            </tr>
            <tr>
                <th></th>
                <td><input type="submit" name="btn" value="submit"></td>
            </tr>
        </table>
    </form>
