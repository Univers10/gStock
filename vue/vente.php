<?php 
    include 'header.php';
    if(!empty($_GET['id'])){
        
        $article = getArticle($_GET['id']);
    }
    ?>
<div class="home-content">
    <div class="overview-boxes">
        <?php 
?>
        <div class="box">
            <form action="<?=!empty($_GET['id']) ? "../model/modifVente.php" : "../model/ajoutVente.php"?>" method="post">
                <div>
                    
                    <label for="id_article">Article</label>
                    <select onchange="setPrix()" name="id_article" id="id_article">
                        <?php 
                        $articles = getArticle();
                        if (!empty($articles) && is_array($articles)) {
                            foreach ($articles as $key => $value){
                                ?>
                                <option data_prix ="<?= $value['prix_unitaire']?>" value="<?= $value['id']?>" ><?= $value['nom_article']." - ".$value['quantite']. "disponible"?></option>
                                <?php
                                
                            }
                        }
                        
                    ?>
                    </select>        
        
                    <label for="id_client">Client</label>
                    <select name="id_client" id="id_client">
                    <?php 
                        $clients = getClient();
                        if (!empty($clients) && is_array($clients)) {
                            foreach ($clients as $key => $value){
                                ?>
                                <option value="<?= $value['id']?>" ><?= $value['nom']." ".$value['prenom']?></option>
                                <?php 
                            }
                        }
                        
                    ?>
                    </select>        
        
                </div>
                <div>

                    <label for="quantite">Quantité</label>
                    <input onkeyup="setPrix()" value="<?= !empty($_GET['id']) ? $article['quantite'] : ""?>" type="number" name="quantite" id="quantite" placeholder="">
                    
                </div>
                <div>

                    <label for="prix">Prix</label>
                    <input onloadstart="setPrix()" value="<?= !empty($_GET['id']) ? $article['prix'] : ""?>" type="number" name="prix" id="prix" placeholder="">
                    
                </div>
               
                <button type="sibmit"><?= !empty($_GET['id']) ? 'Modifier' : "Valider"?></button>

                <?php 
                    if(!empty($_SESSION['message']['text'])){
                ?>
                    <div class="alert <?= $_SESSION['message']['type']?>">
                    <?=$_SESSION['message']['text'];?>
                    </div>
                <?php 
                    }
                ?>
            
            </form>
        </div>
        <div class="box">
            <table class="mtable">
                <tr class="table_head">
                    <td>Non article</td>
                    <td>Client</td>
                    <td>Quantite</td>
                    <td>Prix</td>
                    <td>Date</td>
                    <td>Action</td>
                </tr>
                <?php 
                    $ventes = getVente();
                    if(!empty($ventes) && is_array($ventes)){
                        foreach ($ventes as $key => $value) {
                        
                ?>
                    <tr class="tr">
                        <td><?= $value['nom_article']?></td>
                        <td><?= $value['nom']." ". $value['prenom']?></td>
                        <td><?= $value['quantite']?></td>
                        <td><?= $value['prix']?></td>
                        <td><?= date('d/m/Y H:i', strtotime($value['date_vente']))?></td>
                        <td>
                            <a href="recuVente.php?id=<?=$value['id']?>"><i class="bx bx-receipt"></i></a>
                            <a onclick="annuleVente(<?=$value['id']?>,<?=$value['idArticle']?>,<?=$value['quantite']?>)" style="color: red;"><i class="bx bx-stop-circle"></i></a>
                    </td>
                    </tr>
                <?php 
                        }
                    }
                ?> 
            </table>
        </div>
            <?php 
            // var_dump($_SESSION['message']['text']);
                    
            //     ?>
    </div>
</div>
</section>
<?php 
    include 'footer.php';
?>
<script>
    function annuleVente(id_vente, id_article, quantite){
        if(confirm("Voulez-vous vraiment annnuler cette vente ?")){
            window.location.href = "../model/annuleVente.php?id_vente="+ id_vente + "&id_article="+ id_article + "&quantite="+quantite
        }
    }
    function setPrix(){

        var article = document.querySelector('#id_article');
        var quantite = document.querySelector('#quantite');
        var prix = document.querySelector('#prix');
    
        var prixUnitaire = article.options[article.selectedIndex].getAttribute('data_prix');
        prix.value = Number(quantite.value) * Number(prixUnitaire)
    }
</script>