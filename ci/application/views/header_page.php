<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="author" content="site">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css')?>">
        <link rel="stylesheet" href="<?= base_url('assets/css/style.css')?>">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark navbar_color nav_change ">  <!-- #2C3E50      navbar-dark bg-primary   -->
            <a class="navbar-brand " href="#"><img src="<?= base_url('assets/images')?>/logo_site.png" alt="Logo" class="logo_img"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse " id="navbarColor01">
                <ul class="navbar-nav ">
                    <li class="nav-item ">
                        <a class="nav-link" href="<?= site_url('user/index'); ?>">Connexion<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="<?= site_url('produits/liste'); ?>">Boutique</a>
                    </li>
                </ul>
        
            </div>     
         
                <span class="navbar-brand titre_navbar offset-3" ><img src="<?= base_url('assets/images')?>/basket_icon.png" alt="Cart" class="logo_img_title mr-3"><em class="white font_1"> e-cart !</em><img src="<?= base_url('assets/images')?>/basket_icon.png" alt="Cart" class="logo_img_title ml-3"></span>
                


           

           
<div class="offset-md-5 ml-auto">
            <?php
                        
        if($this->session->userdata("user")) // verification de la connection, il ne faut pas oublier de l'inclure dans les pages qui nécéssitent d'être connectées
        {
            ?>
        
        <div class="btn-group">
          <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Utilisateur : &nbsp;<?= $this->session->userdata("user")?>
          </button>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="#">Profil<img src="<?= base_url('assets/images')?>/profile.png" alt="Profile" class="offset-7 cart_img"></a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="<?= site_url("produits/affiche/");?>">Panier<img src="<?= base_url('assets/images')?>/cart.jfif" alt="Cart" class="offset-6 cart_img"></a>
          
            <div class="dropdown-divider"></div>
            <a class="dropdown-item btn" href="<?= site_url('user/logout');?>">Deconnexion<img src="<?= base_url('assets/images')?>/logout.jfif" alt="Logout" class="offset-1 cart_img"></a>
          </div>
        </div>
        
        <?php 
        } 
        else{?> 
        <a class="btn btn-success" href="<?= site_url()?>">Se connecter</a>
        
        <?php 
        }?>
                    
                    </div>
                </nav>