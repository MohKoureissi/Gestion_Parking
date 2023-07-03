<?php
require 'connexion.php';
//insertion
if(isset($_POST['enregistrer'])){
    if(isset($_POST['matricule'],$_POST['marque'],$_POST['model'],$_POST['photo'],$_POST['prix_vente'],$_POST['prix_location'])){
        $req=$bd->prepare('insert into voiture(matricule,marque,model,photo,prix_vente,prix_location) values(?,?,?,?,?,?)');
        $req->bindValue(1,$_POST['matricule']);
        $req->bindValue(2,$_POST['marque']);
        $req->bindValue(3,$_POST['model']);
        $req->bindValue(4,$_POST['photo']);
        $req->bindValue(5,$_POST['prix_vente']);
        $req->bindValue(6,$_POST['prix_location']);
        $req->execute();
        header('Location:voiture_list.php');
    }
}

//Edition
if(isset($_GET['idm'])){
    $req= $bd->query('select * from voiture where idv='.$_GET['idm']);
    if($ligne = $req->fetch()){
        $_POST['idv'] = $ligne['idv'];
        $_POST['matricule'] = $ligne['matricule'];
        $_POST['marque'] = $ligne['marque'];
        $_POST['model'] = $ligne['model'];
        $_POST['photo'] = $ligne['photo'];
        $_POST['prix_vente'] = $ligne['prix_vente'];
        $_POST['prix_location'] = $ligne['prix_location'];
    }
}

//Modification
if(isset($_POST['modifier'])){
    if(isset($_POST['matricule'],$_POST['marque'],$_POST['model'],$_POST['photo'],$_POST['prix_vente'],$_POST['prix_location']));
        $req=$bd->prepare('update voiture set matricule=?,marque=?,model=?,photo=?,prix_vente=?,prix_location=? where idv=?');
        $req->bindValue(1,$_POST['matricule']);
        $req->bindValue(2,$_POST['marque']);
        $req->bindValue(3,$_POST['model']);
        $req->bindValue(4,$_POST['photo']);
        $req->bindValue(5,$_POST['prix_vente']);
        $req->bindValue(6,$_POST['prix_location']);
        $req->bindValue(7,$_POST['idv']);
        $req->execute();
        header('Location:voiture_list.php');
    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="CSS.css">
    <title>Document</title>
</head>
<body>
<?php include("header.php"); ?>
<fieldset>
        <legend>Voiture</legend>
        <form action="voiture.php" method="POST">
        <div>
            <label for="matricule">Matricule</label>
            <input type="text" name="matricule" value="<?php if(isset($_POST['matricule'])) echo $_POST['matricule'] ?>">
        </div>
        <div>
            <label for="marque">Marque</label>
            <input type="text" name="marque" value="<?php if(isset($_POST['marque'])) echo $_POST['marque'] ?>">
        </div>
        <div>
            <label for="model">Model</label>
            <input type="text" name="model" value="<?php if(isset($_POST['model'])) echo $_POST['model'] ?>">
        </div>
        <div>
            <label for="photo">Photo</label>
            <input type="text" name="photo" value="<?php if(isset($_POST['photo'])) echo $_POST['photo'] ?>">
        </div>
        <div>
            <label for="prix_vente">Prix de Vente</label>
            <input type="text" name="prix_vente" value="<?php if(isset($_POST['prix_vente'])) echo $_POST['prix_vente'] ?>">
        </div>
        <div>
            <label for="prix_location">Prix de Location</label>
            <input type="text" name="prix_location" value="<?php if(isset($_POST['prix_location'])) echo $_POST['prix_location'] ?>">
        </div>
        
        <?php 
            if(isset($_GET['idm'])){
        ?>
        <div>
            <input type="submit" name="modifier" value="Modifier">
            <input type="hidden" name="idv" value="<?php if(isset($_POST['idv'])) echo $_POST['idv'] ?>">
        </div>
        <?php } else{ ?>
        <div>
            <input type="submit" name="enregistrer" value="Enregistrer">
        </div>
        <?php } ?>

    </form>
</fieldset>
<?php include("footer.php"); ?>
</body>
</html>