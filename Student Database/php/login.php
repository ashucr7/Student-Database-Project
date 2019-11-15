    
<?php
$hostName="localhost";
$userName="root";
$password="";
$dbName="college";

$conn=new mysqli($hostName,$userName,$password,$dbName);

if($_SERVER['REQUEST_METHOD'] == 'POST')    {
    $adminname=$_POST['admin'];

    $adminpswd=$_POST['passwd'];

    
    $djh = "INSERT INTO login VALUES('$admin','$passwd')";
    
    if($conn->query($djh) == true)
        echo "Done";
    else
        echo "Insertion Failed";
}
?>