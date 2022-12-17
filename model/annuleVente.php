<?php
include_once 'function.php';
if(
    !empty($_GET['id_vente'])
    && !empty($_GET['id_article'])
    && !empty($_GET['quantite'])
    ) {
        
            $sql = "UPDATE vente SET etat = ? WHERE id = ?";
           
            $req = $connexion->prepare($sql);
           
            $req->execute(array(0,$_GET['id_vente']));

            if($req->rowCount()!=0){
                $sql = "UPDATE article SET quantite = quantite+? WHERE id = ?";
                $req = $connexion->prepare($sql);
                $req->execute(array(
                    $_GET['quantite'],
                    $_GET['id_article']
                ));
                header('Location: ../vue/vente.php');
            }
        }