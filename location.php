<?php
require 'connexion.php';
//insertion
if(isset($_POST['enregistrer'])){
    if(isset($_POST['voiture_id'],$_POST['client_id'],$_POST['numpermis'],$_POST['date_debut'],$_POST['date_fin'],$_POST['cout_journalie'],$_POST['montant'])){
        $req=$bd->prepare('insert into location(voiture_id,client_id,numpermis,date_debut,date_fin,cout_journalie,montant) values(?,?,?,?,?,?,?)');
        $req->bindValue(1,$_POST['voiture_id']);
        $req->bindValue(2,$_POST['client_id']);
        $req->bindValue(3,$_POST['numpermis']);
        $req->bindValue(4,$_POST['date_debut']);
        $req->bindValue(5,$_POST['date_fin']);
        $req->bindValue(6,$_POST['cout_journalie']);
        $req->bindValue(7,$_POST['montant']);
        $req->execute();
        header('Location:location_list.php');
    }
}

//Edition
if(isset($_GET['idm'])){
    $req= $bd->query('select * from location where idl='.$_GET['idm']);
    if($ligne = $req->fetch()){
        $_POST['idl'] = $ligne['idl'];
        $_POST['voiture_id'] = $ligne['voiture_id'];
        $_POST['client_id'] = $ligne['client_id'];
        $_POST['numpermis'] = $ligne['numpermis'];
        $_POST['date_debut'] = $ligne['date_debut'];
        $_POST['date_fin'] = $ligne['date_fin'];
        $_POST['cout_journalie'] = $ligne['cout_journalie'];
        $_POST['montant'] = $ligne['montant'];
    }
}

//Modification
if(isset($_POST['modifier'])){
    if(isset($_POST['voiture_id'],$_POST['client_id'],$_POST['numpermis'],$_POST['date_debut'],$_POST['date_fin'],$_POST['cout_journalie'],$_POST['montant']));
        $req=$bd->prepare('update location set voiture_id=?,client_id=?,numpermis=?,date_debut=?,date_fin=?,cout_journalie=?,montant=? where idl=?');
        $req->bindValue(1,$_POST['voiture_id']);
        $req->bindValue(2,$_POST['client_id']);
        $req->bindValue(3,$_POST['numpermis']);
        $req->bindValue(4,$_POST['date_debut']);
        $req->bindValue(5,$_POST['date_fin']);
        $req->bindValue(6,$_POST['cout_journalie']);
        $req->bindValue(7,$_POST['montant']);
        $req->bindValue(8,$_POST['idl']);
        $req->execute();
        header('Location:location_list.php');
    
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
<fieldset>
        <legend>Location</legend>
        <form action="location.php" method="POST">
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
            <label for="numpermis">Numero de Permis</label>
            <input type="text" name="numpermis" value="<?php if(isset($_POST['numpermis'])) echo $_POST['numpermis'] ?>">
        </div>
        <div>
            <label for="date_debut">Date de Debut</label>
            <input type="date" name="date_debut" value="<?php if(isset($_POST['date_debut'])) echo $_POST['date_debut'] ?>">
        </div>
        <div>
            <label for="date_fin">Date de Fin</label>
            <input type="date" name="date_fin" value="<?php if(isset($_POST['date_fin'])) echo $_POST['date_fin'] ?>">
        </div>
        <div>
            <label for="cout_journalie">Cout Journalie</label>
            <input type="text" name="cout_journalie" value="<?php if(isset($_POST['cout_journalie'])) echo $_POST['cout_journalie'] ?>">
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
            <input type="hidden" name="idl" value="<?php if(isset($_POST['idl'])) echo $_POST['idl'] ?>">
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