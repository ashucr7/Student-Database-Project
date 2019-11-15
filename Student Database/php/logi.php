<html>
      <head>
            <meta http-equiv="refresh" content="7;url=index.html">
    </head>
</html>


<?php
error_reporting(E_ALL & ~E_NOTICE);
$errMsg="Username or password incorrect";
$usrid=null;
$passwd=null;

if($_SERVER['REQUEST_METHOD'] == 'POST')    {
    
    if(!empty($_POST["usr_id"]) && !empty($_POST["paswd"])) {
        $usrid = $_POST["usr_id"];
        $passwd = $_POST["paswd"];
        $serverName="localhost";
        $userName="root";
        $password="";
        $dbName="college";
        
        $conn = new mysqli($serverName , $userName,$password,$dbName);
        
         if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        $sql = "SELECT * FROM ADMIN WHERE AD_ID = '$usrid'";
        $result = $conn->query($sql);
        
        if($result->num_rows > 0)   {
            while($row = $result->fetch_assoc())    {
                $uid = $row["ad_id"];
                $passwrd = $row["ad_passwd"];
                $aname = $row["ad_name"];
                if($passwrd === $passwd)    {
                    $errMsg = null;
                    session_start();
                    $_SESSION["authenticated"] = 'true';
                    $_SESSION["username"] = $aname;
                    header("Location: index1.html");
                }
                else {
                    echo "Incorrect Password";
                
                    
                }
                }
            }
        }   else {
                   $errMsg = "User not found";
                    header("Location: index.html");
    }
    }
     else {
         header('Location: index.html');
     }



?>






























