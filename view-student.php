<?php
    require_once 'vendor/autoload.php';
    use App\classes\Student;

    $massage = "Student about info";
    if(isset($_GET['delete'])){
        $id = $_GET['id'];
        $massage = Student::deleteStudentInfo( $id );
    }
    $resultQuery= Student::getAllStudentInfo();
    $student = mysqli_fetch_assoc($resultQuery);

?>
    <hr/>
        <a href="add-student.php">Add Student</a>||
        <a href="view-student.php">View Student</a>
    <hr/>
    <h3 style="color: green;"><?php echo $massage ?></h3>
    <table border="1" width="700">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email Address</th>
            <th>Mobile Number</th>
            <th>Action</th>
        </tr>
        <?php while ( $student = mysqli_fetch_assoc( $resultQuery ) ){?>
            <tr>
                <td><?php echo $student['id'];?></td>
                <td><?php echo $student['name'];?></td>
                <td> <?php echo $student['email'];?></td>
                <td> <?php echo $student['mobile'];?></td>
                <td>
                    <a href="edit-student.php?id=<?php echo $student['id'];?>">Edit</a>||
                    <a href="?delete=true&id=<?php echo $student['id'];?>" onclick="return confirm('Are you sure you delete this!!!');">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>


