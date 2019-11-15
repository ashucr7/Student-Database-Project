<?php
$hostName="localhost";
$userName="root";
$password="";
$dbName="college";

$b_no="";
$bname="";
$address="";
$usn="";


mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$connect=mysqli_connect("localhost","root","");
mysqli_select_db($connect,"college");

// get values from the form
function getPosts()
{
    $posts = array();
    $posts[0] = $_POST['b_no'];
    $posts[1] = $_POST['bname'];
    $posts[2] = $_POST['address'];
    $posts[3] = $_POST['usn'];

    
    return $posts;
}


// Insert
if(isset($_POST['insert']))
{
    $data = getPosts();
    $insert_Query = "INSERT INTO hostel(b_no,bname,address,usn) VALUES ($data[0],'$data[1]','$data[2]','$data[3]')";
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
    $delete_Query = "DELETE FROM hostel WHERE b_no = '$data[0]'";
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
    $update_Query = "UPDATE hostel SET bname='$data[1]',address='$data[2]',usn='$data[3]'
    WHERE b_no = '$data[0]'";
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

if(isset($_POST['search']))
{
   $res=mysqli_query($connect,"select * from hostel where b_no = '$_POST[b_no]'");
    echo "<table border=1>";
    echo "<tr>";
    echo"<th>"; echo "b_no"; echo "</th>";
         echo"<th>"; echo "bname"; echo "</th>";
              echo"<th>"; echo "address"; echo "</th>";
                   echo"<th>"; echo "usn"; echo "</th>";
        
            
            
                       echo "</tr>";
    
    while($row=mysqli_fetch_array($res))
    {
       echo "<tr>";
        echo "<td>"; echo $row["b_no"]; echo "</td>";
        echo "<td>"; echo $row["bname"]; echo "</td>";
        echo "<td>"; echo $row["address"]; echo "</td>";
        echo "<td>"; echo $row["usn"]; echo "</td>";
    
        echo "</tr>";
        
        
    }
    
    
    
    
}
if(isset($_POST['display']))
{
   $res=mysqli_query($connect,"select * from hostel ");
    echo "<table border=1>";
    echo "<tr>";
    echo"<th>"; echo "b_no"; echo "</th>";
         echo"<th>"; echo "bname"; echo "</th>";
              echo"<th>"; echo "address"; echo "</th>";
                   echo"<th>"; echo "usn"; echo "</th>";
        
    
    
            
                       echo "</tr>";
    
    while($row=mysqli_fetch_array($res))
    {
        echo "<tr>";
        echo "<td>"; echo $row["b_no"]; echo "</td>";
        echo "<td>"; echo $row["bname"]; echo "</td>";
        echo "<td>"; echo $row["address"]; echo "</td>";
        echo "<td>"; echo $row["usn"]; echo "</td>";

       
       
        echo "</tr>";
        
        
    }
    
    
    
    
}

?>


<!

