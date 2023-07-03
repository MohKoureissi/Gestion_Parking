<?php
require 'connexion.php';
//insertion
if(isset($_POST['enregistrer'])){
    if(isset($_POST['prenom'],$_POST['nom'],$_POST['sexe'],$_POST['telephone'],$_POST['adresse'])){
        $req=$bd->prepare('insert into client(prenom,nom,sexe,telephone,adresse) values(?,?,?,?,?)');
        $req->bindValue(1,$_POST['prenom']);
        $req->bindValue(2,$_POST['nom']);
        $req->bindValue(3,$_POST['sexe']);
        $req->bindValue(4,$_POST['telephone']);
        $req->bindValue(5,$_POST['adresse']);
        $req->execute();
        header('Location:client_list.php');
    }
}

//Edition
if(isset($_GET['idm'])){
    $req= $bd->query('select * from client where idclt='.$_GET['idm']);
    if($ligne = $req->fetch()){
        $_POST['idclt'] = $ligne['idclt'];
        $_POST['prenom'] = $ligne['prenom'];
        $_POST['nom'] = $ligne['nom'];
        $_POST['sexe'] = $ligne['sexe'];
        $_POST['telephone'] = $ligne['telephone'];
        $_POST['adresse'] = $ligne['adresse'];
    }
}

//Modification
if(isset($_POST['modifier'])){
    if(isset($_POST['prenom'],$_POST['nom'],$_POST['sexe'],$_POST['telephone'],$_POST['adresse']));
        $req=$bd->prepare('update client set prenom=?,nom=?,sexe=?,telephone=?,adresse=? where idclt=?');
        $req->bindValue(1,$_POST['prenom']);
        $req->bindValue(2,$_POST['nom']);
        $req->bindValue(3,$_POST['sexe']);
        $req->bindValue(4,$_POST['telephone']);
        $req->bindValue(5,$_POST['adresse']);
        $req->bindValue(6,$_POST['idclt']);
        $req->execute();
        header('Location:client_list.php');
    
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
    <div class="form">
    <fieldset class="fi">
        <legend class="le">Formulaire des Client</legend>
    <form action="client.php" method="POST">
        
        <div>
            <label class="lab" for="">Prenom :</label>
            <input type="text" name="prenom" value="<?php if(isset($_POST['prenom'])) echo $_POST['prenom'] ?>">
        </div>
        <div>
            <label for="nom">Nom :</label>
            <input type="text" name="nom" value="<?php if(isset($_POST['nom'])) echo $_POST['nom'] ?>">
        </div>
        <div>
            <label for="sexe">Sexe :</label>
            <input type="text" name="sexe" value="<?php if(isset($_POST['sexe'])) echo $_POST['sexe'] ?>">
        </div>
        <div>
            <label for="telephone">Telephone :</label>
            <input type="text" name="telephone" value="<?php if(isset($_POST['telephone'])) echo $_POST['telephone'] ?>">
        </div>
        <div>
            <label for="adresse">Adresse :</label>
            <input type="text" name="adresse" value="<?php if(isset($_POST['adresse'])) echo $_POST['adresse'] ?>">
        </div>
        <?php if(isset($_GET['idm'])){ ?>
        <div>
            
            <input type="hidden" name="idclt" value="<?php if(isset($_POST['idclt'])) echo $_POST['idclt'] ?>">
            <input type="submit" name="modifier" value="Modifier">
        </div>
        <?php } else{ ?>
        <div>
            <input type="submit" name="enregistrer" value="Enregistrer">
        </div>
        <?php } ?>

    </form>
    </fieldset>
    </div>
    <?php include("footer.php"); ?>
</body>
</html>