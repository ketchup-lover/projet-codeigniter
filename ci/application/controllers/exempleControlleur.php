<?php


defined('BASEPATH') OR  exit('no direct script access allowed');



class Produits extends CI_Controller
{

    public function liste()
    {
     
        $monTab = array();


        $aProduits = ["Aramis", "Athos", "Clatronic", "Camping", "Green"];   


        $info['nom'] = "toto";




        $monTab['noms'] = $aProduits;


        $this->load->helper('url');  //ceci permet d'utiliser les 'helpers' sur l'url, en gros on peut appeller une partie de l'url grace a site_url(index) et base_url(ressource)


//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------        


        $this->load->database();  // IMPORTANT Celle-ci crée une instance d'objet représentée par $this->db, qu'il faudra toujours utiliser pour réaliser une opération (C.R.U.D.) sur la base. 
                                  // NB: + Pour effectuer une requête de sélection, il faut utiliser la méthode query() : ($resultat = $this->db->query('SELECT * FROM produits')->result();)


                                     
	     $results = $this->db->query("SELECT * FROM produits");     // Exécute la requête 


         $aListe = $results->result();    // Récupération des résultats
	
            

         $aView["liste_produits"] = $aListe;   // Ajoute des résultats de la requête au tableau des variables à transmettre à la vue



         // $this->load->view('liste', $aView);             ---            // Appel de la vue avec transmission du tableau  


//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------                                          

        $this->load->view('liste', $monTab + $info); // permet de charger la vue qui est nommée liste, les deuxiemes arguments sont les variables 

    }




}

?>