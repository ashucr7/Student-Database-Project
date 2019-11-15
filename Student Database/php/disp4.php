   <html>
   <head>
    
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    </head>
    <body>
    <?php
$conn = new mysqli("localhost","root","","college");
$pr = "SELECT * FROM salary";
$results=$conn->query($pr);
        ?>
        <table class="table"> 
        <thead>
    <tr>
      <th scope="col">eid</th>
      <th scope="col">basic_sal</th>
      <th scope="col">hra</th>
       <th scope="col">da</th>
      <th scope="col">gross_sal</th>
    </tr>
  </thead>
   <?php
            
while($row = $results->fetch_assoc())   {
    echo "

   
  <tbody>
  <tr>
      <td>".$row['eid']."</td>
      <td>".$row['basic_sal']."</td>
      <td>".$row['hra']."</td>
      <td>".$row['da']."</td>
      <td>".$row['gross_sal']."</td>
      
      
   </tr>
   ";}
           
  echo "</tbody>
</table>";

   
?> 