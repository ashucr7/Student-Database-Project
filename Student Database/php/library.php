<?php
$hostName="localhost";
$userName="root";
$password="";
$dbName="college";

$book_id="";
$dname="";
$book_title="";
$book_price="";
$book_author="";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$connect=mysqli_connect("localhost","root","");
mysqli_select_db($connect,"college");




function getPosts()
{
    $posts = array();
    $posts[0] = $_POST['book_id'];
    $posts[1] = $_POST['dname'];
    $posts[2] = $_POST['book_title'];
    $posts[3] = $_POST['book_price'];
    $posts[4] = $_POST['book_author'];
    return $posts;
}

// Search

/*if(isset($_POST['search']))
{
    $data = getPosts();
    
    $search_Query = "SELECT * FROM library WHERE dname= '$data[0]'";
    
    $search_Result = mysqli_query($connect, $search_Query);
    
    if($search_Result)
    {
        if(mysqli_num_rows($search_Result))
        {
            while($row = mysqli_fetch_array($search_Result))
            {
                $dname = $row['dname'];
                $book_title = $row['book_title'];
                $book_price = $row['book_price'];
                $book_author = $row['book_author'];
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
   $res=mysqli_query($connect,"select * from library where book_id = '$_POST[book_id]'");
    echo "<table border=1>";
    echo "<tr>";
    echo"<th>"; echo "book_id"; echo "</th>";
    echo"<th>"; echo "dname"; echo "</th>";
         echo"<th>"; echo "book_title"; echo "</th>";
              echo"<th>"; echo "book_price"; echo "</th>";
                   echo"<th>"; echo "book_author"; echo "</th>";
                       echo "</tr>";
    
    while($row=mysqli_fetch_array($res))
    {
       echo "<tr>";
        echo "<td>"; echo $row["book_id"]; echo "</td>";
        echo "<td>"; echo $row["dname"]; echo "</td>";
        echo "<td>"; echo $row["book_title"]; echo "</td>";
        echo "<td>"; echo $row["book_price"]; echo "</td>";
        echo "<td>"; echo $row["book_author"]; echo "</td>";
        echo "</tr>";
        
        
    }
    
    
    
    
}

if(isset($_POST['insert']))
{
    $data = getPosts();
    $insert_Query = "INSERT INTO library(book_id,dname,book_title,book_price,book_author) VALUES ($data[0],'$data[1]','$data[2]',$data[3],'$data[4]')";
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
    $delete_Query = "DELETE FROM library WHERE book_id = '$data[0]'";
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
    $update_Query = "UPDATE library SET dname='$data[1]',book_title='$data[2]',book_price=$data[3],book_author='$data[4]' WHERE book_id = '$data[0]'";
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
   $res=mysqli_query($connect,"select * from library ");
    echo "<table border=1>";
    echo "<tr>";
    echo"<th>"; echo "book_id"; echo "</th>";
    echo"<th>"; echo "dname"; echo "</th>";
         echo"<th>"; echo "book_title"; echo "</th>";
              echo"<th>"; echo "book_price"; echo "</th>";
                   echo"<th>"; echo "book_author"; echo "</th>";
                       echo "</tr>";
    
    while($row=mysqli_fetch_array($res))
    {
        echo "<tr>";
        echo "<td>"; echo $row["book_id"]; echo "</td>";
        echo "<td>"; echo $row["dname"]; echo "</td>";
        echo "<td>"; echo $row["book_title"]; echo "</td>";
        echo "<td>"; echo $row["book_price"]; echo "</td>";
        echo "<td>"; echo $row["book_author"]; echo "</td>";
        echo "</tr>";
        
        
    }
    
    
    
    
}


?>
    