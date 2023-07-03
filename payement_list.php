<?php 
require 'connexion.php'; 
//suppressioon
if(isset($_GET['ids'])){
   $bd->query('delete from payement where idp='.$_GET['ids']);
   header("Location:payement_list.php");
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
               <h2>Table Payement</h2>
            </div>
         </div>
         <div class="table_section padding_infor_info">
            <div class="table-responsive-sm">
               <table class="table" >
                  <thead class="thead-dark">
                     <tr>
                     <th>Numero</th>
                        <th>Matricule</th>
                        <th>Client</th>
                        <th>Montant</th>
                        <th>statut</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <?php 
                     //selection
                     $i = 1;
                     $req = $bd->query('select * from payement ');
                     while($ligne=$req->fetch()){
                        echo '<tr>';
                        echo '<td>'.$i.'</td>';
                        echo '<td>'.$ligne['voiture_id'].'</td>';
                        echo '<td>'.$ligne['client_id'].'</td>';
                        echo '<td>'.$ligne['montant'].'</td>';
                        echo '<td>'.$ligne['statut'].'</td>';
                        echo '<td>
                        <a  href="payement.php?idm='.$ligne['idp'].'">Editer</a>
                        <a  href="payement_list.php?ids='.$ligne['idp'].'">Delete</a>
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