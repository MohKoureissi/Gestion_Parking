<?php
require 'connexion.php';
//suppressioon
if(isset($_GET['ids'])){
   $bd->query('delete from voiture where idv='.$_GET['ids']);
   header("Location:voiture_list.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<?php include("header.php"); ?>
   
      <div class="col-md-12">
      <div class="white_shd full margin_bottom_30">
         <div class="full graph_head">
            <div class="heading1 margin_0">
               <h2>Table Vente</h2>
            </div>
         </div>
         <div class="table_section padding_infor_info">
            <div class="table-responsive-sm">
               <table class="table" >
                  <thead class="thead-dark">
                     <tr>
                     <th>N°</th>
                        <th>Matricule</th>
                        <th>Marque</th>
                        <th>Model</th>
                        <th>Photo</th>
                        <th>Prix de Vente</th>
                        <th>Prix de Location</th>
                        <th class="text-left">Action</th>
                     </tr>
                  </thead>
                  <?php 
                     //selection
                     $i = 1;
                     $req = $bd->query('select * from voiture ');
                     while($ligne=$req->fetch()){
                        echo '<tr>';
                        echo '<td>'.$i.'</td>';
                        echo '<td>'.$ligne['matricule'].'</td>';
                        echo '<td>'.$ligne['marque'].'</td>';
                        echo '<td>'.$ligne['model'].'</td>';
                        echo '<td>'.$ligne['photo'].'</td>';
                        echo '<td>'.$ligne['prix_vente'].'</td>';
                        echo '<td>'.$ligne['prix_location'].'</td>';
                        echo '<td>
                        <a  href="voiture.php?idm='.$ligne['idv'].'">Editer</a>
                        <a  href="voiture_list.php?ids='.$ligne['idv'].'">Delete</a>
                        </td>';
                        echo '</tr>';
                        $i++;
                     }
                  ?>
               </table>
            </div>
         </div>
      </div>
   </div>

      <?php include("footer.php"); ?>
</body>
</html>
