<?php include("../include/menu.inc.php");
require("../include/config.inc.php");
?>
<div class="container">
  <h4>Liste des clients: </h4>
  <table class="table">
   <thead> <!-- En-tête du tableau -->
       <tr>
           <th>Nom</th>
           <th>Age</th>
           <th>Actions</th>
       </tr>
   </thead>

   <tbody> <!-- Corps du tableau -->
      <?php
        $db = connect();
        if($db){
          $sql = "SELECT * FROM client";
          $result = mysqli_query($db,$sql);
          if($result)
          {
          while($row = mysqli_fetch_array($result))
          {
            $res = '<tr>';
            $res .= ('<td>'.$row['name'].'</td>');
            $res .= ('<td>'.$row['age'].'</td>');
            $res .= ('<td>');
            $res .= '<a class="btn-info btn-sm" href="../view/detailsClient.php?id='.$row['id'].'">Details</a> ';
            $res .= '<a class="btn-success btn-sm" href="../view/updateClient.php?id='.$row['id'].'">Modifier</a>';
            $res .= '</td>';
            $res .= ('</tr>');
            echo $res;
          }
          }
          else
          {
            echo "Erreur result";
          }
        }
        else
        {
          echo "Erreur db";
        }

      ?>
   </tbody>
</table>
<a class="btn btn-primary" href="../view/addClient.php">Ajouter client</a>
</div>
</body>
</html>
