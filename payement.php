<?php
require 'connexion.php';
//insertion
if(isset($_POST['enregistrer'])){
    if(isset($_POST['voiture_id'],$_POST['client_id'],$_POST['montant'],$_POST['statut'])){
        $req=$bd->prepare('insert into payement(voiture_id,client_id,montant,statut) values(?,?,?,?)');
        $req->bindValue(1,$_POST['voiture_id']);
        $req->bindValue(2,$_POST['client_id']);
        $req->bindValue(3,$_POST['montant']);
        $req->bindValue(4,$_POST['statut']);
        $req->execute();
        header('Location:payement_list.php');
    }
}

//Edition
if(isset($_GET['idm'])){
    $req= $bd->query('select * from payement where idp='.$_GET['idm']);
    if($ligne = $req->fetch()){
        $_POST['idp'] = $ligne['idp'];
        $_POST['voiture_id'] = $ligne['voiture_id'];
        $_POST['client_id'] = $ligne['client_id'];
        $_POST['montant'] = $ligne['montant'];
        $_POST['statut'] = $ligne['statut'];
    }
}

//Modification
if(isset($_POST['modifier'])){
    if(isset($_POST['voiture_id'],$_POST['client_id'],$_POST['quantite'],$_POST['montant']));
        $req=$bd->prepare('update payement set voiture_id=?,client_id=?,montant=?,statut=? where idp=?');
        $req->bindValue(1,$_POST['voiture_id']);
        $req->bindValue(2,$_POST['client_id']);
        $req->bindValue(3,$_POST['montant']);
        $req->bindValue(4,$_POST['statut']);
        $req->bindValue(5,$_POST['idp']);
        $req->execute();
        header('Location:payement_list.php');
    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <!-- <link rel="stylesheet" href="CSS.css"> -->
    <link rel="stylesheet" href="style2.css">
    <title>Document</title>
</head>
<body>
<?php include("header.php"); ?>
<div class="container">
<fieldset>
        <legend>Payement</legend>
        <form action="payement.php" method="POST">
        <div class="form-group"> 
                <label for="">Matricule:</label>
                <select name="idv" id="">
                    <option></option>
                    <?php
                     $req = $bd->query('SELECT * FROM voiture');
                     
                     while($ligne=$req->fetch()){
                    if(isset($_POST['idv'])&& $ligne['idv']==$_POST['idv']){
                        echo '<option value="'.$ligne['idv'].'" selected>'.$ligne['matricule'].'</option>';
                    }
                    else{
                        echo '<option value="'.$ligne['idv'].'">'.$ligne['matricule'].'</option>';
                    }
                    
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="">Client:</label>
                <select name="idclt" id="">
                    <option></option>
                    <?php
                     $req = $bd->query('SELECT * FROM client');
                     
                     while($ligne=$req->fetch()){
                    if(isset($_POST['idclt'])&& $ligne['idclt']==$_POST['idclt']){
                        echo '<option value="'.$ligne['idclt'].'" selected>'.$ligne['prenom'].
                        ' '.$ligne['nom'].'</option>';
                    }
                    else{
                        echo '<option value="'.$ligne['idclt'].'">'.$ligne['prenom'].
                    ' '.$ligne['nom'].'</option>';
                    }
                    
                    }
                    ?>
                </select>
            </div>

        <div class="form-group">
            <label for="montant">Montant</label>
            <input type="text" name="montant" value="<?php if(isset($_POST['montant'])) echo $_POST['montant'] ?>">
        </div>
        <div class="form-group">
            <label for="statut">Statut</label>
            <input type="text" class="control-label" name="statut" value="<?php if(isset($_POST['statut'])) echo $_POST['statut'] ?>">
        </div>

        <?php 
            if(isset($_GET['idm'])){
        ?>
        <div class="form-group">
            <input type="submit" name="modifier" value="Modifier">
            <input type="hidden" class="control-label" name="idp" value="<?php if(isset($_POST['idp'])) echo $_POST['idp'] ?>">
        </div>
        <?php } else{ ?>
        <div>
            <input type="submit" class="control-label" name="enregistrer" value="Enregistrer">
        </div>
        <?php } ?>

    </form>
</fieldset>
</div>
<?php include("footer.php"); ?>
</body>
</html>