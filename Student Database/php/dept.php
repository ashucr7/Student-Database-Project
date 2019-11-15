<?php
$hostName="localhost";
$userName="root";
$password="";
$dbName="college";

$dname="";
$no_staff="";
$no_stud="";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$connect=mysqli_connect("localhost","root","");
mysqli_select_db($connect,"college");



// get values from the form
function getPosts()
{
    $posts = array();
    $posts[0] = $_POST['dname'];
    $posts[1] = $_POST['no_staff'];
    $posts[2] = $_POST['no_stud'];
    return $posts;
}

// Search


if(isset($_POST['search']))
{
   $res=mysqli_query($connect,"select * from department where dname = '$_POST[dname]'");
    echo "<table border=1>";
    echo "<tr>";
    echo"<th>"; echo "dname"; echo "</th>";
         echo"<th>"; echo "no_staff"; echo "</th>";
              echo"<th>"; echo "no_stud"; echo "</th>";
                       echo "</tr>";
    
    while($row=mysqli_fetch_array($res))
    {
       echo "<tr>";
        echo "<td>"; echo $row["dname"]; echo "</td>";
        echo "<td>"; echo $row["no_staff"]; echo "</td>";
        echo "<td>"; echo $row["no_stud"]; echo "</td>";
        
        echo "</tr>";
        
        
    }
    
    
    
    
}


// Insert
if(isset($_POST['insert']))
{
    $data = getPosts();
    $insert_Query = "INSERT INTO department(dname,no_staff,no_stud) VALUES ('$data[0]',$data[1],$data[2])";
    try{
        $insert_Result = mysqli_query($connect,$insert_Query);
        
        if($insert_Result)
        {
            if(mysqli_affected_rows($connect) > 0)
            {
                echo 'Data Inserted';
            }else{
                echo 'Data Not Inserted';
            }
        }
    } catch (Exception $ex) {
        echo 'Error Insert '.$ex->getMessage();
    }
}

// Delete
if(isset($_POST['delete']))
{
    $data = getPosts();
    $delete_Query = "DELETE FROM department WHERE dname = '$data[0]'";
    try{
        $delete_Result = mysqli_query($connect, $delete_Query);
        
        if($delete_Result)
        {
            if(mysqli_affected_rows($connect) > 0)
            {
                echo 'Data Deleted';
            }else{
                echo 'Data Not Deleted';
            }
        }
    } catch (Exception $ex) {
        echo 'Error Delete '.$ex->getMessage();
    }
}

// Edit
if(isset($_POST['update']))
{
    $data = getPosts();
    $update_Query = "UPDATE department SET no_staff=$data[1],no_stud=$data[2] WHERE dname = '$data[0]'";
    try{
        $update_Result = mysqli_query($connect, $update_Query);
        
        if($update_Result)
        {
            if(mysqli_affected_rows($connect) > 0)
            {
                echo 'Data Updated';
            }else{
                echo 'Data Not Updated';
            }
        }
    } catch (Exception $ex) {
        echo 'Error Update '.$ex->getMessage();
    }
}


if(isset($_POST['display']))
{
   $res=mysqli_query($connect,"select * from department ");
    echo "<table border=1>";
    echo "<tr>";
    echo"<th>"; echo "dname"; echo "</th>";
         echo"<th>"; echo "no_staff"; echo "</th>";
              echo"<th>"; echo "no_stud"; echo "</th>";
                   
                       echo "</tr>";
    
    while($row=mysqli_fetch_array($res))
    {
        echo "<tr>";
        echo "<td>"; echo $row["dname"]; echo "</td>";
        echo "<td>"; echo $row["no_staff"]; echo "</td>";
        echo "<td>"; echo $row["no_stud"]; echo "</td>";
        echo "</tr>";
        
        
    }
    
    
    
    
}



?>




    