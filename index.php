<?php
$serveur='mysql-boulbayem.alwaysdata.net';
        $db='boulbayem_web';
        $utilisateur='boulbayem';
        $mot_passe='steloi123';
        try
        {
            $connexion=new PDO("mysql:host=$serveur;dbname=$db",$utilisateur,$mot_passe);
            if($connexion) echo 'Connexion réussie';     
        }
        catch (PDOException $event)
        {
            die('Erreur :'.$event->getMessage());
        }

        $user= $_POST["user"];
        $password= $_POST["password"];
        
        $inserer="INSERT INTO user VALUES ('$user','$password')";
        $inserer=$connexion->exec($inserer);


        
?>