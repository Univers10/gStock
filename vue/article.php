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
            <form action="<?=!empty($_GET['id']) ? "../model/modifArticle.php" : "../model/ajoutArticle.php"?>" method="post">
                <label for="nom_article">Nom de l'article</label>
                <input value="<?= !empty($_GET['id']) ? $article['nom_article'] : "" ?>" type="text" name="nom_article" id="nom_article" placeholder="">
                <input value="<?= !empty($_GET['id']) ? $article['id'] : "" ?>" type="hidden" name="id" id="id">
                <div>

                    <label for="categorie">Catégorie</label>
                    <select name="categorie" id="categorie">
                        <option <?= !empty($_GET['id']) && $article['categorie']== "Ordinateur" ? "selected" : "" ?> value="Ordinateur">Ordinateur</option>
                        <option <?= !empty($_GET['id']) && $article['categorie']== "Imprimante" ? "selected" : "" ?> value="Imprimante">Imprimante</option>
                        <option <?= !empty($_GET['id']) && $article['categorie']== "Accessoir" ? "selected" : "" ?> value="Accessoir">Accessoire</option>
                    </select>        
        
                </div>
                <div>

                    <label for="quantite">Quantité</label>
                    <input value="<?= !empty($_GET['id']) ? $article['quantite'] : ""?>" type="number" name="quantite" id="quantite" placeholder="">
                    
                </div>
                <div>

                    <label for="prix_unitaire">Prix unitaire</label>
                    <input value="<?= !empty($_GET['id']) ? $article['prix_unitaire'] : ""?>" type="number" name="prix_unitaire" id="prix_unitaire" placeholder="">
                    
                </div>
                <div>

                    <label for="date_fabrication">Date de fabrication</label>
                    <input value="<?= !empty($_GET['id']) ? $article['date_fabrication'] : ""?>" type="datetime-local" name="date_fabrication" id="date_fabrication" placeholder="">
                    
                </div>
                <div>

                    <label for="date_expiration">Date d'expiration</label>
                    <input value="<?= !empty($_GET['id']) ? $article['date_expiration'] : ""?>" type="datetime-local" name="date_expiration" id="date_expiration" placeholder="">
                
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
                    <td>Catégorie</td>
                    <td>Quantité</td>
                    <td>Prix unitaire</td>
                    <td>Date fabrication</td>
                    <td>Date expiration</td>
                    <td>Action</td>
                </tr>
                <?php 
                    $articles = getArticle();
                    if(!empty($articles) && is_array($articles)){
                        foreach ($articles as $key => $value) {
                        
                ?>
                    <tr class="tr">
                        <td><?= $value['nom_article']?></td>
                        <td><?= $value['categorie']?></td>
                        <td><?= $value['quantite']?></td>
                        <td><?= $value['prix_unitaire']?></td>
                        <td><?= date('d/m/Y H:i', strtotime($value['date_fabrication']))?></td>
                        <td><?= date('d/m/Y H:i', strtotime($value['date_expiration']))?></td>
                        <td><a href="?id=<?=$value['id']?>"><i class="bx bx-edit-alt"></i></a></td>
                    </tr>
                <?php 
                        }
                    }
                ?>
            </table>
        </div>
            <?php 
            // var_dump($_SESSION['message']['type']);
            // var_dump($_SESSION['message']['text']);
                    
            //     ?>
    </div>
</div>
</section>
<?php 
    include 'footer.php';
?>