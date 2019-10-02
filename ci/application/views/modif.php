<html>
	
<head>
	
    <title>Formulaire de modification</title>
	
</head>
	
<body>
	


<?php echo form_open_multipart(); ?>
    


<div class="form-group offset-3 col-4 div_modif">


<label for="categorie">Categorie du produit</label>
  <select name ="pro_cat_id"  class="form-control">
<?php
foreach($select as $ligne)
{
?>

<option value="<?=$ligne->cat_id?>"<?= $ligne->cat_id==$produits->pro_cat_id? "selected": "" ?>><?=$ligne->cat_nom;?></option>

<?php
}
?>
  </select>


<br>

      <label for="libelle">Libelle/Nom du produit</label>
    <input type="text" name="pro_libelle"  class="form-control" value="<?= $produits->pro_libelle; ?>">
    <?php echo form_error('pro_libelle');?>
    <br>
  
    <label for="ref">Reference du produit</label>
    <input type="text" name="pro_ref"  class="form-control" value="<?= $produits->pro_ref; ?>">
    <?php echo form_error('pro_ref');?>
    <br>

    <label for="description">Description du produit</label>
    <input type="text" name="pro_description"  class="form-control" value="<?= $produits->pro_description; ?>">
    <?php echo form_error('pro_description');?>
    <br>

    <label for="prix">Prix du produit</label>
    <input type="text" name="pro_prix"  class="form-control" value="<?= $produits->pro_prix; ?>">
    <?php echo form_error('pro_pro_prix');?>
    <br>

    <label for="stock">Stock restant du produit</label>
    <input type="text" name="pro_stock"  class="form-control" value="<?= $produits->pro_stock; ?>">
    <?php echo form_error('pro_stock');?>
    <br>

    <label for="couleur">Couleur du produit</label>
    <input type="text" name="pro_couleur"  class="form-control" value="<?= $produits->pro_couleur; ?>">
    <?php echo form_error('pro_couleur');?>
    <br>
  
    <label for="photo">Photo du produit</label><br>
    <input type="file" name="fichier" id="fichier" class="" >
    <?php echo form_error('fichier');?>
    

    <input type="hidden" name="pro_id"  class="form-control" value="<?= $produits->pro_id; ?>">
  
    <br>
	
    <input type="submit" class="btn btn-primary offset-4" value="Modifier"><br>




    
	
</form>
    

</div>


