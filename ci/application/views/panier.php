
<h1 class="offset-5 ">Mon panier</h1>



<?php

if ($this->session->panier != null) // équivaut a $_SESSION['panier'];
{
    ?>
    <div class="row panier_position_contenu">
        <div class="col">
            <div class="">
            <table class="border_radius_20 offset-md-5">
               <thead>
                    <tr>
                        <th>&nbsp;Photo</th>
                        <th>&nbsp;Produit</th>
                        <th>&nbsp;&nbsp;Prix</th>
                        <th>&nbsp;Quantité</th>
                        <th>&nbsp;&nbsp;Prix total</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                  <?php
                        $total = 0;
                        foreach ($this->session->panier as $produit) {
                            ?>
                        <tr  class="border_white">
                            <td><img src="<?= base_url('assets/images/').$produit['pro_id'].".".$produit['pro_photo'] ?>" class="image_panier"></td>
                            <td>&nbsp;<?= $produit['pro_libelle']; ?></td>
                            <td>&nbsp;&nbsp;<?= str_replace('.', ',', $produit['pro_prix']); ?> <sup>€</sup></td>
                            <td class="">
                            
                                <div class="panier_qte">
                       
                                    <div class="panier_qte_valeur">
                                    &nbsp;&nbsp;&nbsp;
                                        <a href="<?= site_url('produits/qtemoins/' . $produit['pro_id']); ?>" type="button" role="button"> - </a>
                                        <?php if ($produit['pro_qte'] < 1) {
                                                    $produit['pro_qte'] = 0;
                                                    echo $produit['pro_qte'];
                                                } else {
                                                    echo $produit['pro_qte'];
                                                } ?>
                                        <a href="<?= site_url('produits/qteplus/' . $produit['pro_id']); ?>" type="button" role="button">+</a>
                                    </div>
                                </div>
                            </td>
                           <td><span class="offset-3"><?= str_replace('.', ',', ($produit['pro_qte'] * $produit['pro_prix'])); ?></span> <sup>€</sup></td>
                            <td>
                           
                                <?php
                                        $total += $produit['pro_qte'] * $produit['pro_prix']; ?>
                                &nbsp;<a href="<?= site_url('produits/effaceProduit/' . $produit['pro_id']); ?>" class="btn btn-danger">Suppimer</a>
                            </td>
                        </tr>
                    <?php
                        }
                        ?>
                </tbody>
            </table>
                    </div>
        </div>
        <div>
            <div class="alert alert-danger ml-8">
                <h3>Récapitulatif</h3>
                <div>
                    <h5>TOTAL : <?= str_replace('.', ',', $total); ?> <sup>€</sup></h5>
                    <a href="<?= site_url("produits/efface"); ?>">Supprimer le panier</a> -
                    <a href="<?= site_url("produits/liste"); ?>">Retour boutique</a>
                </div>
            </div>
        </div>
    </div>
<?php
   // var_dump($this->session->panier);
} else {
    ?>
    <div class="alert alert-danger">Votre panier est vide. Pour le remplir, vous pouvez visiter notre <a href="<?= site_url("produits/liste"); ?>">boutique</a>.</div>
<?php
}
?>