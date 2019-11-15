 <html>
   <head>
    
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    </head>
    <body>
    <?php
$conn = new mysqli("localhost","root","","college");
$pr = "SELECT * FROM fee";
$results=$conn->query($pr);
        ?>
        <table class="table"> 
        <thead>
    <tr>
      <th scope="col">bill_no</th>
      <th scope="col">usn</th>
      <th scope="col">date_of_payment</th>
       <th scope="col">total</th>
       <th scope="col">paid</th>
       <th scope="col">bal</th>
    </tr>
  </thead>
   <?php
            
while($row = $results->fetch_assoc())   {
    echo "

   
  <tbody>
  <tr>
      <td>".$row['bill_no']."</td>
      <td>".$row['usn']."</td>
      <td>".$row['date_of_payment']."</td>
      <td>".$row['total']."</td> 
      <td>".$row['paid']."</td>
      <td>".$row['bal']."</td> 
   </tr>
   ";}
           
  echo "</tbody>
</table>";

   
?> 