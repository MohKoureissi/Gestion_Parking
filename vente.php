<?php
require 'connexion.php';
//insertion
if(isset($_POST['enregistrer'])){
    if(isset($_POST['voiture_id'],$_POST['client_id'],$_POST['quantite'],$_POST['montant'])){
        $req=$bd->prepare('insert into vente(voiture_id,client_id,quantite,montant) values(?,?,?,?)');
        $req->bindValue(1,$_POST['voiture_id']);
        $req->bindValue(2,$_POST['client_id']);
        $req->bindValue(3,$_POST['quantite']);
        $req->bindValue(4,$_POST['montant']);
        $req->execute();
        header('Location:vente_list.php');
    }
}

//Edition
if(isset($_GET['idm'])){
    $req= $bd->query('select * from vente where idvente='.$_GET['idm']);
    if($ligne = $req->fetch()){
        $_POST['idvente'] = $ligne['idvente'];
        $_POST['voiture_id'] = $ligne['voiture_id'];
        $_POST['client_id'] = $ligne['client_id'];
        $_POST['quantite'] = $ligne['quantite'];
        $_POST['montant'] = $ligne['montant'];
    }
}

//Modification
if(isset($_POST['modifier'])){
    if(isset($_POST['voiture_id'],$_POST['client_id'],$_POST['quantite'],$_POST['montant']));
        $req=$bd->prepare('update vente set voiture_id=?,client_id=?,quantite=?,montant=? where idvente=?');
        $req->bindValue(1,$_POST['voiture_id']);
        $req->bindValue(2,$_POST['client_id']);
        $req->bindValue(3,$_POST['quantite']);
        $req->bindValue(4,$_POST['montant']);
        $req->bindValue(5,$_POST['idvente']);
        $req->execute();
        header('Location:vente_list.php');
    
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
        <legend>Vente</legend>
        <form action="vente.php" method="POST">
        <div>
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

            <div>
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

        <div>
            <label for="quantite">Quantite</label>
            <input type="text" name="quantite" value="<?php if(isset($_POST['quantite'])) echo $_POST['quantite'] ?>">
        </div>
        
        <div>
            <label for="montant">Montant</label>
            <input type="text" name="montant" value="<?php if(isset($_POST['montant'])) echo $_POST['montant'] ?>">
        </div>
        
        <?php 
            if(isset($_GET['idm'])){
        ?>
        <div>
            <input type="submit" name="modifier" value="Modifier">
            <input type="hidden" name="idvente" value="<?php if(isset($_POST['idvente'])) echo $_POST['idvente'] ?>">
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