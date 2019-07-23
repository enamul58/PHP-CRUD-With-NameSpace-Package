    <?php
    require_once 'vendor/autoload.php';
    use App\classes\Student;

    $id = $_GET['id'];
    $queryResult = Student::editInformationById( $id );
    $student = mysqli_fetch_assoc($queryResult);

    if( isset($_POST['btn'])){
        Student::updateStudentInfo( $_POST );
    }




    ?>
<hr/>
<a href="add-student.php">Add Student</a>||
<a href="view-student.php">View Student</a>
<hr/>
<form action="" method="post">
    <table>
        <tr>
            <th>Name:</th>
            <td><input type="text" name="name" value="<?php echo $student['name'];?>">
                <input type="hidden" name="id" value="<?php echo $student['id'];?>"></td>
        </tr>
        <tr>
            <th>Email Address:</th>
            <td><input type="text" name="email" value="<?php echo $student['email'];?>"></td>
        </tr>
        <tr>
            <th>Mobile Number:</th>
            <td><input type="number" name="mobile" value="<?php echo $student['mobile'];?>"></td>
        </tr>
        <tr>
            <th></th>
            <td><input type="submit" name="btn" value="update"></td>
        </tr>
    </table>
</form>

