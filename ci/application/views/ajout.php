<html>
    
<!-- AJOUTER DATE AJOUT ET PRODUIT BLOQUE -->  
    
<?php echo form_open_multipart(); ?>

    <div class="form-group offset-3 col-4 div_modif">

    <label for="categorie">Categorie du produit</label>
    <select name ="pro_cat_id" class="form-control">
<?php
foreach($select as $ligne)
{
?>

 <option value="<?= $ligne->cat_id ?>"> <?= $ligne->cat_nom ?></option>

<?php
}
?>
  </select>


<br>


     <label for="libelle">Libelle/Nom du produit</label>  
    <input type="text" name="pro_libelle" class="form-control" value="<?php echo set_value('pro_libelle'); ?>">
    <?php echo form_error('pro_libelle');?>
    <br>
  
     <label for="ref">Reference du produit</label>
    <input type="text" name="pro_ref" class="form-control" value="<?php echo set_value('pro_ref'); ?>">
    <?php echo form_error('pro_ref');?>
    <br>

    <label for="description">Description du produit</label>
    <input type="text" name="pro_description" class="form-control" value="<?php echo set_value('pro_description'); ?>">
    <?php echo form_error('pro_description');?>
    <br>

    <label for="prix">Prix du produit</label>
    <input type="text" name="pro_prix" class="form-control" value="<?php echo set_value('pro_prix'); ?>">
    <?php echo form_error('pro_pro_prix');?>
    <br>

    <label for="stock">Stock restant du produit</label>
    <input type="text" name="pro_stock" class="form-control" value="<?php echo set_value('pro_stock'); ?>">
    <?php echo form_error('pro_stock');?>
    <br>

    <label for="couleur">Couleur du produit</label>
    <input type="text" name="pro_couleur" class="form-control" value="<?php echo set_value('pro_couleur'); ?>">
    <?php echo form_error('pro_couleur');?>
    <br>
 
    <label for="bloque">Le produit sera t-il bloqué a la vente ?</label>&nbsp;<input type="radio" name="pro_bloque" value="1">Oui &nbsp;<input type="radio" name="pro_bloque" value="0" checked>Non<br>

    <br>

    <label for="photo">Photo du produit</label><br>
    <input type="file" name="fichier" id="fichier" >
    <?php echo form_error('fichier');?>
 
    <br>
    <div class="row">
    <span class="msg_erreur_photo"><?php if(isset($erreurs)){echo $erreurs;} ?></span>
    </div>


    <br>

	
    <input type="submit" class="bouton_ajout btn btn-primary offset-4 " value="Ajouter"><br>
  
  
</form>




