
<body>



<div class ="container col-md-10 col-xs-12 row offset-md-1 details ">






<h1 class="offset-md-5">Details produit</h1>
    <div class="col-6 d-none d-md-block datails_gauche ">
<img class ="image_detail offset-2" src="<?= base_url('assets/images/').$produits->pro_id.".".$produits->pro_photo ?>">

<label for="description" rows="7" class="row offset-5 description">Description du produit</label>
    <textarea name="pro_description"  class="form-control col-8 offset-4 textarea_details" disabled><?= $produits->pro_description; ?></textarea> 
    </div>
 

    

<div class="form-group col-md-5 col-xs-10 div_modif">


<label for="categorie">Categorie du produit</label>
  <select name ="pro_cat_id"  class="form-control" disabled>
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
    <input type="text" name="pro_libelle"  class="form-control input-lg" value="<?= $produits->pro_libelle; ?>" disabled>

    <br>
  
    <label for="ref">Reference du produit</label>
    <input type="text" name="pro_ref"  class="form-control input-lg" value="<?= $produits->pro_ref; ?>" disabled>

    
    <br>

    <label for="prix">Prix du produit</label>
    <input type="text" name="pro_prix"  class="form-control input-lg" value="<?= $produits->pro_prix; ?>" disabled>
   
    <br>

    <label for="stock">Stock restant du produit</label>
    <input type="text" name="pro_stock"  class="form-control input-lg" value="<?= $produits->pro_stock; ?>" disabled>
    
    <br>

    <label for="couleur">Couleur du produit</label>
    <input type="text" name="pro_couleur"  class="form-control input-lg" value="<?= $produits->pro_couleur; ?>" disabled>
  
    <br>
    
    <input type="hidden" name="pro_id"  class="form-control input-lg" value="<?= $produits->pro_id; ?>">
  
    <br>
	





    
	
</div>
    



</div>
