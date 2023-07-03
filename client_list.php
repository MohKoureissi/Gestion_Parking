<?php 
require 'connexion.php'; 
//suppressioon
if(isset($_GET['ids'])){
   $bd->query('delete from client where idclt='.$_GET['ids']);
   header("Location:client_list.php");
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
               <h2>Table Client</h2>
            </div>
         </div>
         <div class="table_section padding_infor_info">
            <div class="table-responsive-sm">
               <table class="table" >
                  <thead class="thead-dark">
                     <tr>
                        <th>Numero</th>
                        <th>Prenom</th>
                        <th>Nom</th>
                        <th>Sexe</th>
                        <th>Telephone</th>
                        <th>Adresse</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <?php 
                     //selection
                     $i = 1;
                     $req = $bd->query('select * from client ');
                     while($ligne=$req->fetch()){
                        echo '<tr>';
                        echo '<td>'.$i.'</td>';
                        echo '<td>'.$ligne['prenom'].'</td>';
                        echo '<td>'.$ligne['nom'].'</td>';
                        echo '<td>'.$ligne['sexe'].'</td>';
                        echo '<td>'.$ligne['telephone'].'</td>';
                        echo '<td>'.$ligne['adresse'].'</td>';
                        echo '<td>
                        <div class="tooltip_section">
                        <a  href="client.php?idm='.$ligne['idclt'].'" ><i class="fa fa-pencil"></i></a>
                        <a  href="client_list.php?ids='.$ligne['idclt'].'"><i class="fa fa-trash"></i></a>
                        </div>   
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

