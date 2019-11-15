<?php
$hostName="localhost";
$userName="root";
$password="";
$dbName="college";

$eid="";
$basic_sal="";
$hra="";
$da="";
$gross_sal="";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$connect=mysqli_connect("localhost","root","");
mysqli_select_db($connect,"college");


// get values from the form
function getPosts()
{
    $posts = array();
    $posts[0] = $_POST['eid'];
    
    $posts[1] = $_POST['basic_sal'];
    $posts[2] = $_POST['hra'];
    $posts[3] = $_POST['da'];
    $posts[4] = $_POST['gross_sal'];
    return $posts;
}

// Search

/*if(isset($_POST['search']))
{
    $data = getPosts();
    
    $search_Query = "SELECT * FROM salary WHERE eid= '$data[0]'";
    
    $search_Result = mysqli_query($connect, $search_Query);
    
    if($search_Result)
    {
        if(mysqli_num_rows($search_Result))
        {
            while($row = mysqli_fetch_array($search_Result))
            {
                $eid = $row['eid'];
                $ename = $row['ename'];
                $basic_sal = $row['basic_sal'];
                $hra = $row['hra'];
                $da = $row['da'];
                $gross_sal = $row['gross_sal'];
            }
        }else{
            echo 'No Data For This Id';
        }
    }else{
        echo 'Result Error';
    }
}
*/

// Insert
if(isset($_POST['insert']))
{
    $data = getPosts();
    $insert_Query = "INSERT INTO salary(eid,basic_sal,hra,da,gross_sal) VALUES ('$data[0]',$data[1], $data[2],$data[3],$data[4])";
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
    $delete_Query = "DELETE FROM salary WHERE eid = '$data[0]'";
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
    $update_Query = "UPDATE salary SET basic_sal=$data[1],hra=$data[2],da=$data[3],gross_sal=$data[4]
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
   $res=mysqli_query($connect,"select * from salary where eid = '$_POST[eid]'");
    echo "<table border=1>";
    echo "<tr>";
    echo"<th>"; echo "eid"; echo "</th>";
              echo"<th>"; echo "basic_sal"; echo "</th>";
                   echo"<th>"; echo "hra"; echo "</th>";
            echo"<th>"; echo "da"; echo "</th>";
            echo"<th>"; echo "gross_sal"; echo "</th>";
            
                       echo "</tr>";
    
    while($row=mysqli_fetch_array($res))
    {
       echo "<tr>";
        echo "<td>"; echo $row["eid"]; echo "</td>";
        echo "<td>"; echo $row["basic_sal"]; echo "</td>";
        echo "<td>"; echo $row["hra"]; echo "</td>";
        echo "<td>"; echo $row["da"]; echo "</td>";
                echo "<td>"; echo $row["gross_sal"]; echo "</td>";
                
        
        echo "</tr>";
        
        
    }
    
    
    
    
}
if(isset($_POST['display']))
{
   $res=mysqli_query($connect,"select * from salary");
    echo "<table border=1>";
    echo "<tr>";
    echo"<th>"; echo "eid"; echo "</th>";
              echo"<th>"; echo "basic_sal"; echo "</th>";
                   echo"<th>"; echo "hra"; echo "</th>";
         echo"<th>"; echo "da"; echo "</th>";
         echo"<th>"; echo "gross_sal"; echo "</th>";
    
            
                       echo "</tr>";
    
    while($row=mysqli_fetch_array($res))
    {
        echo "<tr>";
        echo "<td>"; echo $row["eid"]; echo "</td>";
        echo "<td>"; echo $row["basic_sal"]; echo "</td>";
        echo "<td>"; echo $row["hra"]; echo "</td>";
        echo "<td>"; echo $row["da"]; echo "</td>";
        echo "<td>"; echo $row["gross_sal"]; echo "</td>";
       
        echo "</tr>";
        
        
    }
    
    
    
    
}



?>


