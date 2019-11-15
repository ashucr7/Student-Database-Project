<?php
$hostName="localhost";
$userName="root";
$password="";
$dbName="college";

$sname="";
$usn="";
$sem="";
$dname="";
$dob="";
$sgender="";
$sphn="";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$connect=mysqli_connect("localhost","root","");
mysqli_select_db($connect,"college");




function getPosts()
{
    $posts = array();
    $posts[0] = $_POST['sname'];
    $posts[1] = $_POST['usn'];
    $posts[2] = $_POST['sem'];
    $posts[3] = $_POST['dname'];
    $posts[4] = $_POST['dob'];
    $posts[5] = $_POST['sgender'];
    $posts[6] = $_POST['sphn'];
    return $posts;
}

// Search


if(isset($_POST['search']))
{
   $res=mysqli_query($connect,"select * from student where usn = '$_POST[usn]'");
    echo "<table border=1>";
    echo "<tr>";
    echo"<th>"; echo "sname"; echo "</th>";
         echo"<th>"; echo "usn"; echo "</th>";
              echo"<th>"; echo "sem"; echo "</th>";
                   echo"<th>"; echo "dname"; echo "</th>";
            echo"<th>"; echo "dob"; echo "</th>";
            echo"<th>"; echo "sgender"; echo "</th>";
            echo"<th>"; echo "sphn"; echo "</th>";
                       echo "</tr>";
    
    while($row=mysqli_fetch_array($res))
    {
       echo "<tr>";
        echo "<td>"; echo $row["sname"]; echo "</td>";
        echo "<td>"; echo $row["usn"]; echo "</td>";
        echo "<td>"; echo $row["sem"]; echo "</td>";
        echo "<td>"; echo $row["dname"]; echo "</td>";
        echo "<td>"; echo $row["dob"]; echo "</td>";
                echo "<td>"; echo $row["sgender"]; echo "</td>";
                echo "<td>"; echo $row["sphn"]; echo "</td>";
        
        echo "</tr>";
        
        
    }
    
    
    
    
}

/*if(isset($_POST['search']))
{
    $data = getPosts();
    
    $search_Query = "SELECT * FROM student WHERE sname= '$data[0]'";
    
    $search_Result = mysqli_query($connect, $search_Query);
    
    if($search_Result)
    {
        if(mysqli_num_rows($search_Result))
        {
            while($row = mysqli_fetch_array($search_Result))
            {
                $sname = $row['sname'];
                $usn = $row['usn'];
                $sem = $row['sem'];
                $dname = $row['dname'];
            }
        }else{
     
     echo 'No Data For This Id';
        }
    }else{
        echo 'Result Error';
    }
}*/



if(isset($_POST['insert']))
{
    $data = getPosts();
    $insert_Query = "INSERT INTO student(sname,usn,sem,dname,dob,sgender,sphn) VALUES ('$data[0]','$data[1]',$data[2],'$data[3]','$data[4]','$data[5]',$data[6])";
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
    $delete_Query = "DELETE FROM student WHERE usn = '$data[1]'";
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
    $update_Query = "UPDATE student SET sname='$data[0]',sem=$data[2],dname='$data[3]',dob='$data[4]',sgender='$data[5]',sphn=$data[6] 
    WHERE usn = '$data[1]'";
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
   $res=mysqli_query($connect,"select * from student ");
    
    echo "<table border=1>";
    
    echo "<tr>";
    echo"<th>"; echo "sname"; echo "</th>";
         echo"<th>"; echo "usn"; echo "</th>";
              echo"<th>"; echo "sem"; echo "</th>";
                   echo"<th>"; echo "dname"; echo "</th>";
         echo"<th>"; echo "dob"; echo "</th>";
         echo"<th>"; echo "sgender"; echo "</th>";
    echo"<th>"; echo "sphn"; echo "</th>";
            
                       echo "</tr>";
    
    while($row=mysqli_fetch_array($res))
    {
        echo "<tr>";
        echo "<td>"; echo $row["sname"]; echo "</td>";
        echo "<td>"; echo $row["usn"]; echo "</td>";
        echo "<td>"; echo $row["sem"]; echo "</td>";
        echo "<td>"; echo $row["dname"]; echo "</td>";
        echo "<td>"; echo $row["dob"]; echo "</td>";
        echo "<td>"; echo $row["sgender"]; echo "</td>";
        echo "<td>"; echo $row["sphn"]; echo "</td>";
        echo "</tr>";
        
        
    }
    
    
    
    
}


?>
    