   <html>
   <head>
    
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    </head>
    <body>
    <?php
$conn = new mysqli("localhost","root","","college");
$pr = "SELECT * FROM department";
$results=$conn->query($pr);
        ?>
        <table class="table"> 
        <thead>
    <tr>

      <th scope="col">dname</th>
      <th scope="col">no_staff</th>
       <th scope="col">no_stud</th>

     
    </tr>
  </thead>
   <?php
            
while($row = $results->fetch_assoc())   {
    echo "

   
  <tbody>
  <tr>
    
      <td>".$row['dname']."</td>
      <td>".$row['no_staff']."</td>
      <td>".$row['no_stud']."</td>


      
     
      
   </tr>
   ";}
           
  echo "</tbody>
</table>";

   
?> 