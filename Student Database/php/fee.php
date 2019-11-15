<?php
$hostName="localhost";
$userName="root";
$password="";
$dbName="college";


$bill_no = "";
$usn = "";
$date_of_payment = "";
$total = "";
$paid = "";
$bal = "";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);


$connect=mysqli_connect("localhost","root","");
mysqli_select_db($connect,"college");

// get values from the form
function getPosts()
{
    $posts = array();
    $posts[0] = $_POST['bill_no'];
    $posts[1] = $_POST['usn'];
    $posts[2] = $_POST['date_of_payment'];
    $posts[3] = $_POST['total'];
    $posts[4] = $_POST['paid'];
    $posts[5] = $_POST['bal'];
    return $posts;
}

// Search

/*if(isset($_POST['search']))
{
    $data = getPosts();
    
    $search_Query = "SELECT * FROM fee WHERE bill_no= '$data[0]'";
    
    $search_Result = mysqli_query($connect, $search_Query);
    
    if($search_Result)
    {
        if(mysqli_num_rows($search_Result))
        {
            while($row = mysqli_fetch_array($search_Result))
            {
                $bill_no = $row['bill_no'];
                $usn = $row['usn'];
                $dname = $row['dname'];
                $date_of_payment = $row['date_of_payment'];
                $total = $row['total'];
                $paid = $row['paid'];
                $bal = $row['bal'];
            }
        }else{
            echo 'No Data For This Id';
        }
    }else{
        echo 'Result Error';
    }
}*/

if(isset($_POST['search']))
{
   $res=mysqli_query($connect,"select * from fee where bill_no = '$_POST[bill_no]'");
    echo "<table border=1>";
    echo "<tr>";
    echo"<th>"; echo "bill_no"; echo "</th>";
         echo"<th>"; echo "usn"; echo "</th>";
                   echo"<th>"; echo "date_of_payment"; echo "</th>";
            echo"<th>"; echo "total"; echo "</th>";
            echo"<th>"; echo "paid"; echo "</th>";
            echo"<th>"; echo "bal"; echo "</th>";
                       echo "</tr>";
    
    while($row=mysqli_fetch_array($res))
    {
       echo "<tr>";
        echo "<td>"; echo $row["bill_no"]; echo "</td>";
        echo "<td>"; echo $row["usn"]; echo "</td>";
        echo "<td>"; echo $row["date_of_payment"]; echo "</td>";
        echo "<td>"; echo $row["total"]; echo "</td>";
                echo "<td>"; echo $row["paid"]; echo "</td>";
                echo "<td>"; echo $row["bal"]; echo "</td>";
        
        echo "</tr>";
        
        
    }
    
    
    
    
}


// Insert
if(isset($_POST['insert']))
{
    $data = getPosts();
    $insert_Query = "INSERT INTO fee(bill_no,usn,date_of_payment,total,paid,bal) VALUES ($data[0],'$data[1]','$data[2]',$data[3],$data[4],$data[5])";
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
    $delete_Query = "DELETE FROM fee WHERE bill_no = '$data[0]'";
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
    $update_Query = "UPDATE fee SET usn='$data[1]',date_of_payment='$data[2]',total=$data[3],paid=$data[4],bal=$data[5] WHERE bill_no = '$data[0]'";
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
   $res=mysqli_query($connect,"select * from fee ");
    echo "<table border=1>";
    echo "<tr>";
    echo"<th>"; echo "bill_no"; echo "</th>";
         echo"<th>"; echo "usn"; echo "</th>";
                   echo"<th>"; echo "date_of_payment"; echo "</th>";
         echo"<th>"; echo "total"; echo "</th>";
         echo"<th>"; echo "paid"; echo "</th>";
    echo"<th>"; echo "bal"; echo "</th>";
            
                       echo "</tr>";
    
    while($row=mysqli_fetch_array($res))
    {
        echo "<tr>";
        echo "<td>"; echo $row["bill_no"]; echo "</td>";
        echo "<td>"; echo $row["usn"]; echo "</td>";
        echo "<td>"; echo $row["date_of_payment"]; echo "</td>";
        echo "<td>"; echo $row["total"]; echo "</td>";
        echo "<td>"; echo $row["paid"]; echo "</td>";
        echo "<td>"; echo $row["bal"]; echo "</td>";
        echo "</tr>";
        
        
    }
    
    
    
    
}





?>


<!