<html>
    <head>

    </head>
    <body>
    <?php
$conn = new mysqli("localhost","root","","college");
$pr = "SELECT * FROM library";
$results=$conn->query($pr);
        ?>
        <table class="table"> 
        <thead>
    <tr>
      <th scope="col">dname</th>
      <th scope="col">book_title</th>
      <th scope="col">book_price</th>
        <th scope="col">book_author</th>
    </tr>
  </thead>
   <?php
            
while($row = $results->fetch_assoc())   {
    echo "

   
  <tbody>
  <tr>
      <td>".$row['dname']."</td>
      <td>".$row['book_title']."</td>
      <td>".$row['book_price']."</td>
      <td>".$row['book_author']."</td>
     
      
   </tr>
   ";}
           
  echo "</tbody>
</table>";
   
?> 

