



    

    <div class="container col-10 mt-5">

    

<table class="table table-responsive  table-striped rounded_corners mb-0" id="table">
<caption class ="bug_titre_detail col-2 bordered white">&nbsp;Liste des produits</caption>

    <thead class="table-dark dark-blue white">

    
       <tr>
        <th>Panier</th>
        <th>Photo</th>
        <th>Libelle</th>
        <th>Catégorie</th>
        <th>Reference</th>       
        <th>description</th>
        <th>prix</th>
        <th>bloque</th>
        <th>action</th>
        
       </tr>
</thead>

<tbody >




    <?php

foreach ($pagination as $row) 
{
    echo form_open('produits/ajoutePanier');
    ?>

<tr>
    <td>
    
	
    <input class="form-control rounded_corners" name="pro_qte" id="pro_qte" value="1">
     
    <input type="hidden" name="pro_prix" value="<?= $row->pro_prix ?>">
     
    <input type="hidden" name="pro_id" value="<?= $row->pro_id ?>">
     
     <input type="hidden" name="pro_libelle" value="<?= $row->pro_libelle ?>">

     <input type="hidden" name="pro_photo" value="<?= $row->pro_photo ?>">
     
     <div class="form-group">
     
        <input class="btn btn-default btn-sm offset-1" type="image"  src="<?= base_url('assets/images')?>/shopping_cart.png" alt="Logo"  >              
     </div>
     
  </form>
      </td>
      


    
     <td> <img class ="icons rounded_corners" src="<?= base_url('assets/images/').$row->pro_id.".".$row->pro_photo ?>"></td>
    
     <td><?=  $row->pro_libelle ?></td> 

     <td><?=  $row->cat_nom ?></td> 

     <td><?= $row->pro_ref ?></td>      
    
     <td><?= $row->pro_description ?></td>

     <td><?= $row->pro_prix ?></td>
     
     <td><?php if($row->pro_bloque == 0){echo "non";}else{echo "oui";} ?></td>
     
     <td><a href="<?=site_url("produits/details/$row->pro_id")?>">  <input type="button"  id="details" value=" Details "class='bouton_details btn btn-primary '></a> <!-- btn-outline-warning -->
     <?php if($this->session->userdata("access_level") > 1)
     {
     ?>
     
     <a href="<?=site_url("produits/modif/$row->pro_id")?>">  <input type="button"  id="suppr" value=" Modifier "class='bouton_modifier btn btn-warning '></a> <a href="<?=site_url("produits/suppr/$row->pro_id")?>">  <input type="button"  id="suppr" value="Supprimer"class='bouton_supprimer btn btn-danger '></a>
     <?php } ?>
    </td>
    </tr>

</tbody>

    <?php       
}
?>
</table>
</div>
<br>
<div class="offset-md-5 offset-1">
<?php if($this->session->userdata("access_level") > 1)
     {
     ?>
<a href="<?=site_url("produits/ajout")?>">  <input type="button"  id="suppr" value="Ajouter un produit dans la liste"class='btn btn-success btn-lg'>   </a>
<?php } ?>
<div class="offset-1 pagination"><?php echo $links; ?></div>
</div>
<br>
