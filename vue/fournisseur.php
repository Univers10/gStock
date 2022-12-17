<?php 
    include 'header.php';
    if(!empty($_GET['id'])){
        $fournisseur = getFournisseur($_GET['id']);
    }
?>
<div class="home-content">
    <div class="overview-boxes">
    <?php 
?>
        <div class="box">
            <form action="<?=!empty($_GET['id']) ? "../model/modifFournisseur.php" : "../model/ajoutFournisseur.php"?>" method="post">
                <label for="nom">Nom</label>
                <input value="<?= !empty($_GET['id']) ? $fournisseur['nom'] : "" ?>" type="text" name="nom" id="nom" placeholder="">
                <input value="<?= !empty($_GET['id']) ? $fournisseur['id'] : "" ?>" type="hidden" name="id" id="id">
                
                <label for="prenom">Prénom</label>
                <input value="<?= !empty($_GET['id']) ? $fournisseur['prenom'] : "" ?>" type="text" name="prenom" id="prenom" placeholder="">
                
                <label for="telephone">N° de téléphone</label>
                <input value="<?= !empty($_GET['id']) ? $fournisseur['telephone'] : "" ?>" type="text" name="telephone" id="telephone" placeholder="">
                
                <label for="adresse">Adresse</label>
                <input value="<?= !empty($_GET['id']) ? $fournisseur['adresse'] : "" ?>" type="text" name="adresse" id="adresse" placeholder="">
                
                

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
                    <td>Non</td>
                    <td>Prénom</td>
                    <td>Tel</td>
                    <td>Adresse</td>
                    <td>Action</td>
                </tr>
                <?php 
                    $fournisseurs = getFournisseur();
                    if(!empty($fournisseurs) && is_array($fournisseurs)){
                        foreach ($fournisseurs as $key => $value) {
                        
                ?>
                    <tr class="tr">
                        <td><?= $value['nom']?></td>
                        <td><?= $value['prenom']?></td>
                        <td><?= $value['telephone']?></td>
                        <td><?= $value['adresse']?></td>
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