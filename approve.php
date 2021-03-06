<?php session_start();

if(!isset($_SESSION['admin']) || (isset($_SESSION['admin']) && $_SESSION['admin'] !== '1'))
{
   die('You cannot directly access this page!'); // kill the page display error
}
    define('DB_SERVER', 'panther.cs.middlebury.edu');
    define('DB_USERNAME', 'jcepeda');
    define('DB_PASSWORD', 'ForRealThough');
    define('DB_DATABASE', 'jcepeda_middCal');
    
    $con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE) or die ("Could not connect");

    //if submission
    if (isset($_POST[id])) {
        $event_id = substr($_POST[id], 1);

        //if approve
        if (substr($_POST[id], 0, 1) == 1) {
            $sql = "SELECT original_version FROM Events WHERE eventid = $event_id;";
            if (!mysqli_query($con, $sql)) {
                die('Error: ' . mysqli_error());
            }
            else {
                $result = mysqli_query($con, $sql);
                $row = mysqli_fetch_array($result);
            }

            //if edit
            if ($row[original_version] != 0) {
                $sql = "DELETE FROM Events WHERE eventid = $row[original_version];";
                if (!mysqli_query($con, $sql)) {
                    die('Error: ' . mysqli_error());
                }
                else {
                    mysqli_query($con, $sql);
                }
            }
            $sql = "UPDATE Events SET waiting_for_approval = 0 WHERE eventid = $event_id;";
        }

        //if delete
        else
            $sql = "DELETE FROM Events WHERE eventid = $event_id;";
        
        if (!mysqli_query($con, $sql)) {
            die('Error: ' . mysqli_error());
        }
        else {
            mysqli_query($con, $sql);
        }    
    }

    //get data for table
    $sql = "SELECT title, location, start_time, start_date, end_time, end_date, edit, description, eventid FROM Events WHERE waiting_for_approval = '1'";

    if (!mysqli_query($con, $sql)) {
        die('Error: ' . mysqli_error());
    }
    else {
        $result = mysqli_query($con, $sql);
    }
?>

<html>
<head>

<?php include 'include/header.php'; ?>

</head>

<body>
    
<?php include 'include/navbar.php'; ?>

<br><br><br>
    <div>
    <table class="table table-striped custab center">
    <thead>
        <tr>
            <th>Title</th>
            <th>Location</th>
            <th>Created By</th>
            <th>Start Time</th>
            <th>End Time</th>
            <th nowrap>New Event/Edit</th>
            <th>Description</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
        <?php while($row = mysqli_fetch_array($result)) { //loop over each event

            //get data from created_by
            $sql = "SELECT email, time_of_creation FROM CREATED_BY WHERE eventid = '$row[eventid]';";

            if (!mysqli_query($con, $sql)) {
                die('Error: ' . mysqli_error());
            }
            else {
                $created = mysqli_query($con, $sql);
                $createdi = mysqli_fetch_array($created);
            }

            //get data from users
            $sql = "SELECT first_name, last_name FROM Users WHERE email = '$createdi[email]';";
            if (!mysqli_query($con, $sql)) {
                die('Error: ' . mysqli_error());
            }
            else {
                $user = mysqli_query($con, $sql);
                $useri = mysqli_fetch_array($user);
            }
        ?>
        <tr>
            <td class = "title"> <?php echo "$row[title]"; ?> </td>
            <td class = "title"> <?php echo "$row[location]"; ?> </td>
            <td nowrap> <?php echo "$useri[first_name] $useri[last_name] <br> $createdi[email]"; ?> </td>
            <td nowrap> <?php $date = new DateTime($row[start_date]); echo date_format($date, 'F j, Y'); echo "<br>"; echo date("g:i a", strtotime($row[start_time])); ?> </td>
            <td nowrap> <?php $date = new DateTime($row[end_date]); echo date_format($date, 'F j, Y'); echo "<br>"; echo date("g:i a", strtotime($row[end_time])); ?> </td>
            <td> <?php if ($row[edit] == 0) { echo "New Event"; } else { echo "Edit"; } ?>
            <td class = "desc"> <?php echo "$row[description]"; ?> </td>
            <td nowrap class="text-center">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <button class='btn btn-info btn-xs' type="submit" value= <?php echo "1$row[eventid]" ?> name="id"><span class="glyphicon glyphicon-edit"></span> Approve</a>
                    <button class="btn btn-danger btn-xs" type="submit" value= <?php echo "0$row[eventid]" ?> name="id"><span class="glyphicon glyphicon-remove"></span> Delete</a>
                </form>
            </td>
        </tr>
        <?php } mysql_close($con); ?>
    </table>
</div>

</body>
</html>