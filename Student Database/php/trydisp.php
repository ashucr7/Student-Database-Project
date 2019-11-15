   <html>
   <head>
    
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    </head>
    <body>
    <?php
$conn = new mysqli("localhost","root","","college");
$pr = "SELECT * FROM student";
$results=$conn->query($pr);
        ?>
        <table class="table"> 
        <thead>
    <tr>
      <th scope="col">sname</th>
      <th scope="col">usn</th>
      <th scope="col">sem</th>
       <th scope="col">dname</th>
      <th scope="col">dob</th>
      <th scope="col">sgender</th>
       <th scope="col">sphn</th>
    </tr>
  </thead>
   <?php
            
while($row = $results->fetch_assoc())   {
    echo "

   
  <tbody>
  <tr>
      <td>".$row['sname']."</td>
      <td>".$row['usn']."</td>
      <td>".$row['sem']."</td>
      <td>".$row['dname']."</td>
      <td>".$row['dob']."</td>
      <td>".$row['sgender']."</td>
      <td>".$row['sphn']."</td>
     
      
     
      
   </tr>
   ";}
           
  echo "</tbody>
</table>";

   
?> 