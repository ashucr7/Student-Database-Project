<?php
$hostName="localhost";
$userName="root";
$password="";
$dbName="college";

$eid = "";
$ename = "";
$dname = "";
$ephn = "";
$gender="";
$eaddress="";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$connect=mysqli_connect("localhost","root","");
mysqli_select_db($connect,"college");

// get values from the form
function getPosts()
{
    $posts = array();
    $posts[0] = $_POST['eid'];
    $posts[1] = $_POST['ename'];
    $posts[2] = $_POST['dname'];
    $posts[3] = $_POST['ephn'];
    $posts[4] = $_POST['gender'];
    $posts[5] = $_POST['eaddress'];
    return $posts;
}

// Search

/*if(isset($_POST['search']))
{
    $data = getPosts();
    
    $search_Query = "SELECT * FROM faculty WHERE eid= '$data[0]'";
    
    $search_Result = mysqli_query($connect, $search_Query);
    
    if($search_Result)
    {
        if(mysqli_num_rows($search_Result))
        {
            while($row = mysqli_fetch_array($search_Result))
            {
                $eid = $row['eid'];
                $ename = $row['ename'];
                $dname = $row['dname'];
                $book_author = $row['ephn'];
                $gender = $row['gender'];
                $eaddress = $row['eaddress'];
            }
        }else{
            echo 'No Data For This Id';
        }
    }else{
        echo 'Result Error';
    }
}*/


// Insert
if(isset($_POST['insert']))
{
    $data = getPosts();
    $insert_Query = "INSERT INTO faculty(eid,ename,dname,ephn,gender,eaddress) VALUES ('$data[0]','$data[1]','$data[2]',$data[3],'$data[4]','$data[5]')";
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
    $delete_Query = "DELETE FROM faculty WHERE eid = '$data[0]'";
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
    $update_Query = "UPDATE faculty SET ename='$data[1]',dname='$data[2]',ephn=$data[3],gender='$data[4]',eaddress='$data[5]'
    WHERE eid = '$data[0]'";
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
   $res=mysqli_query($connect,"select * from faculty where eid = '$_POST[eid]'");
    echo "<table border=1>";
    echo "<tr>";
    echo"<th>"; echo "eid"; echo "</th>";
         echo"<th>"; echo "ename"; echo "</th>";
              echo"<th>"; echo "dname"; echo "</th>";
                   echo"<th>"; echo "ephn"; echo "</th>";
            echo"<th>"; echo "gender"; echo "</th>";
            echo"<th>"; echo "eaddress"; echo "</th>";
            
                       echo "</tr>";
    
    while($row=mysqli_fetch_array($res))
    {
       echo "<tr>";
        echo "<td>"; echo $row["eid"]; echo "</td>";
        echo "<td>"; echo $row["ename"]; echo "</td>";
        echo "<td>"; echo $row["dname"]; echo "</td>";
        echo "<td>"; echo $row["ephn"]; echo "</td>";
        echo "<td>"; echo $row["gender"]; echo "</td>";
                echo "<td>"; echo $row["eaddress"]; echo "</td>";
                
        
        echo "</tr>";
        
        
    }
    
    
    
    
}
if(isset($_POST['display']))
{
   $res=mysqli_query($connect,"select * from faculty ");
    echo "<table border=1>";
    echo "<tr>";
    echo"<th>"; echo "eid"; echo "</th>";
         echo"<th>"; echo "ename"; echo "</th>";
              echo"<th>"; echo "dname"; echo "</th>";
                   echo"<th>"; echo "ephn"; echo "</th>";
         echo"<th>"; echo "gender"; echo "</th>";
         echo"<th>"; echo "eaddress"; echo "</th>";
    
            
                       echo "</tr>";
    
    while($row=mysqli_fetch_array($res))
    {
        echo "<tr>";
        echo "<td>"; echo $row["eid"]; echo "</td>";
        echo "<td>"; echo $row["ename"]; echo "</td>";
        echo "<td>"; echo $row["dname"]; echo "</td>";
        echo "<td>"; echo $row["ephn"]; echo "</td>";
        echo "<td>"; echo $row["gender"]; echo "</td>";
        echo "<td>"; echo $row["eaddress"]; echo "</td>";
       
        echo "</tr>";
        
        
    }
    
    
    
    
}

?>


<!

