<?php include("../include/menu.inc.php");
require("../assets/helper.php");
?>
<div class="container">
  <h4>Liste des assurances: </h4>
  <table class="table">
   <thead> <!-- En-tête du tableau -->
       <tr>
           <th>Nom</th>
           <th>Prix à l'année</th>
           <th>Type</th>
           <th>Actions</th>
       </tr>
   </thead>

   <tbody> <!-- Corps du tableau -->
      <?php
        $db = connect();
        if($db){
          $sql = "SELECT * FROM assurance";
          $result = mysqli_query($db,$sql);
          if($result)
          {
          while($row = mysqli_fetch_array($result))
          {
            $res = '<tr>';
            $res .= ('<td>'.$row['name'].'</td>');
            $res .= ('<td>'.$row['price'].'</td>');
            $res .= ('<td>');
            $res .= findTypeInsurance($row['idType']);
            $res.= ('</td>');
            $res .= ('<td><a class="btn-success btn-sm" href="../view/updateInsurance.php?id='.$row['id'].'">Modifier </a></td>');
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
<a class="btn btn-primary" href="../view/addInsurance.php">Ajouter assurance</a>
</div>
</body>
</html>
