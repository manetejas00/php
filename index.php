<?php

require_once("config.php");

$cond = array();
if(isset($_GET['department']) && !empty($_GET['department'])){
    $cond[] = 'department = "'.$_GET['department'].'"';
}

$cond = !empty($cond) ? ' WHERE '.implode(' AND ', $cond) : '';

$record = mysqli_query($con,"SELECT * FROM users ".$cond);

//$response = array();
//
//if(mysqli_num_rows($record) > 0){
//    $row = mysqli_fetch_assoc($record);
//    $response = array(
//        "id" => $row['id'],
//        "name" => $row['name'],
//        "email" => $row['email'],
//        "mobile" => $row['mobile'],
//        "department" => $row['department'],
//        "designation" => $row['designation'],
//        "date" => $row['date'],
//    );
//
//    echo json_encode( array("status" => 1,"data" => $response) );
//    exit;
//}else{
//    echo json_encode( array("status" => 0) );
//    exit;
//}

?>


<form>
    <label for="cars">Choose a department:</label>
    <select id="department" name="department">
        <option value="IT Analyst">IT Analyst</option>
        <option value="IT Coordinator">IT Coordinator</option>
        <option value="Network Administrator">Network Administrator</option>
        <option value="Computer Systems Manager">Computer Systems Manager</option>
    </select>
    <input type="submit" value="Search">
</form>

<table>
    <tr>
        <th>id</th>
        <th>Name</th>
        <th>Email</th>
        <th>mobile</th>
        <th>department</th>
        <th>designation</th>
        <th>Joining Date</th>
        <th>Action</th>
    </tr>
    <?php
     while ($row = mysqli_fetch_assoc($record)) {
        ?>
    <tr>
        <td><?php echo $row['id'] ?></td>
        <td><?php echo $row['name'] ?></td>
    </tr>
        <?php
     }
    ?>
</table>

