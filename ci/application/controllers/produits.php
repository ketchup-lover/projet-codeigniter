<?php


defined('BASEPATH') OR  exit('no direct script access allowed');

class Produits extends CI_Controller // classe
{

  public function __construct() {
    parent::__construct();
          $this->load->helper(array('url', 'form'));
          $this->load->model("login_model");
          $this->load->library('session');	
          $this->load->model('pagination_model');  
          $this->load->library("pagination");

  }




public function liste()  // methode
	
{

  

  $this->load->helper('form');  // this load helper form permet de charger l'appel d'un formulaire sécurisé dans la vue avec form_open
/*
    // Execute la requete 	
      $results = $this->db->query("SELECT * FROM produits");    
    
      // Recuperation des resultats    	
    $aListe = $results->result();    
	
  */


  $this->load->model('produits_model');  // $this->load->model('produits_model'); permet de charger les "modèles" qui contienent les requêtes sous forme de fonctions (produits_model) se trouve dans application/models

  $aListe = $this->produits_model->liste(); // cette ligne correspond a la récupération du retour de la fonction liste (qui se trouve dans produits model) revient a faire un include et a faire $aListe = liste();

	
    // Ajoute des resultats de la requete au tableau des variables a transmettre a la vue      
	
    $aView["liste_produits"] = $aListe; // on met la variable $aListe (qui contient la requete) dans un tableau qu'on va envoyer dans la vue grace a $this->load->view('liste', $aView);
	
 

    $this->load->helper('url'); // this load helper sert a appeller les fonctions base url et site url, permettant une création des liens plus rapide


    // Appel de la vue avec transmission du tableau  
    if($this->session->userdata("user"))
    {


      $config = array();	
      $config["base_url"] = site_url() . "/pagination";
      $config["total_rows"] = $this->pagination_model->get_counter();
      $config["per_page"] = 5;
      $config["uri_segment"] = 2;
      $this->pagination->initialize($config);
      $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
      $aView["links"] = $this->pagination->create_links();
      $aView['pagination'] = $this->pagination_model->get_prod($config["per_page"], $page);




    $this->load->view('header_page');  //ce this load view me permet d'appeller le header
    $this->load->view('liste', $aView); // $this-load-view permet de charger une vue (un fichier dans le dossier views) et de lui envoyer une variable en deuxieme paramètre
    $this->load->view("footer");
    }
    else
    {
      $this->load->view('header_page');
      $this->load->view("auth/login");
      $this->load->view("footer");
    }  
  
}






//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------






public function details($id)
{
     $this->load->helper('url');
     $this->load->model('produits_model');

    $model["select"] = $this->produits_model->ajout_select_un(); 
  
    
     $monResult = $this->produits_model->recharge_vue_modif($id);
    $model["produits"] = $monResult->row();

    
      $this->load->view('header_page');
      $this->load->view('details', $model);
      $this->load->view("footer");

// acces: <a href="<=site_url("produits/details/$row->pro_id")>">  <input type="button"  id="suppr" value=" Details "class='bouton_modifier btn btn-outline-warning '></a>
}






//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------









public function Ajout()
{

  $this->load->database();

  $this->load->helper('url');

  $this->load->helper('form');

  $this->load->library('upload');   // On charge la librairie 'upload' de CodeIgniter en lui envoyant la config

  $this->load->library('form_validation'); //je vais chercher une librairie qui s'apelle form_validation, ATTENTION exceptionellement cette librairie se trouve dans ci/app/config et NON ci/app/librairies

  $this->form_validation->set_error_delimiters('<div class="error">', '</div>'); // cela encadre les messages d'erreurs qui correspondent a form_validation

  $this->form_validation->run('ajout'); // cette ligne permet initialiser AJOUT qui se trouve dans form_validation, donc ajout ne correspond pas au formulaire ou au controlleur ici MAIS BIEN AU NOM DU TABLEAU ASSOCIATIF QUI SE TROUVE DANS form_validation !!!

  $this->load->model('produits_model'); // $this->load->model('produits_model'); permet de charger les "modèles" qui contienent les requêtes sous forme de fonctions (produits_model) se trouve dans application/models

// ------------------------------------------------------------------------------------------



$select = $this->produits_model->ajout_select_un(); // appel d'une fonction qui se trouve dans produits_model, il faut d'abbord appeler produits_model plus haut ---> $this->load->model('produits_model');

$aVariables["select"] = $select;            // cette portion (avec le select) me sert uniquement a afficher les options du select lors d'un ajout ou d'une modif

 

  

if($this->input->post())  // SI LE FORMULAIRE EST POSTE .......   2ème appel de la page: traitement du formulaire
{
// --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

  $id_photo = $this->produits_model->ajout_photo();  // cette ligne correspond a une requete qui se trouve dans produits_model --> ne pas oublier $this->load->model('produits_model');
  

/*
$stock = get_object_vars($id_photo[0]);              // ICI,,,, VOIR L AJOUT DE PHOTO >>>>>>>>>>>>>>>>>>>> GET_OBJECT_VARS permet de manipuler une variable de type objet
 (int)$nom_photo = (int)$stock['MAX(pro_id)'] + (int)1;   // CETTE SECTION EN COMM A ETE AJOUTEE AUX MODELS.
*/
 //$config = $this->upload->data();
 //$extension=$this->upload->data('file_ext');



 // NOTE IMPORTANTE .... -> LORS DE L'UPLOAD DE FICHIER, L'EXTENSION EST PRISE AUTOMATIQUEMENT LORS DU DEPLACEMENT DU FICHIER

 $config['overwrite'] = TRUE;  // permet de réécrire sur les fichiers

  $config['upload_path'] = './assets/images/'; // chemin où sera stocké le fichier

  $config['file_name'] = $id_photo; // nom du fichier final

  $config['allowed_types'] = 'gif|jpg|png'; // Types autorisés (ici pour des images)

   $this->upload->initialize($config); // On initialise la config $this->upload->initialize() initializes the CI file upload class using the upload.php
     

 // -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- 
  if (empty($_FILES['fichier']['name']))
  {
  $this->form_validation->set_rules('fichier','Image','required', array('required' => 'Vous devez inserer une photo'));  // ces lignes sont la pour l'upload  if (empty($_FILES['fichier']['name'])) permet de vérifier si une image est présente grace a la présence d'un nom
  }
// --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

if($this->form_validation->run() == FALSE || !$this->upload->do_upload('fichier'))  // en gros, cela veut dire SI le test effectué dans form_validation est FAUX (donc si il y'a un paramère saisi par l'utilisateur qui correspond pas avec les param dans form_validation) voir config/form_validation.php
{                                                                                   // ou si pas d'upload sur le champ nommé 'fichier'

// Echec : on récupère les erreurs dans une variable (une chaîne)
$errors = "Le fichier photo est vide ou ne correspond pas au type requis.";    // en cas d'erreur on stocke un message dans une variable qui sera ajoutée a la vue 
$aVariables["errors"] = $errors;


 // on réaffiche la vue du formulaire en passant les erreurs 
 $this->load->view('header_page');               // ci ça correspond pas recharge la page (les messages d'erreurs s'affichent grace a echo form_error('pro_pro_prix') donc grace a  form error)
 $this->load->view('ajout', $aVariables);
 $this->load->view("footer");

}
else // si pas d'erreurs a la validation
{
  $this->produits_model->insert();

/*  
  $data = $this->input->post();      // on met les données postés (this input post) dans une variable afin d'insérer cette variable dans la DB

      $this->db->insert('produits', $data); // voila l'insert, on met $data (le this input post) dedans
*/
      $this->load->helper('url'); // je rapelle le helper url pour faire un redirect en dessous (je doute de l'utilité de cette ligne, a essayer sans)
 
redirect(site_url("produits/liste")) ;
}
//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

 
} 
else 
{ // 1er appel de la page: affichage du formulaire
  if($this->session->userdata("access_level") > 1)
  {
  $this->load->view('header_page');
  $this->load->view('ajout', $aVariables);
  $this->load->view("footer");
  }
  else
  {
  $this->load->view('header_page');
  $this->load->view("errors/private_content.php"); //un this load view sur une page qui indique que l'utilisateur n'a pas accès a ce contenu
  $this->load->view("footer");
  }  
}

} // fin ajout















//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

















public function Modif($id)	
{
	
  $this->load->database();	
  $this->load->helper('url');
  $this->load->helper('form');
  $this->load->library('upload');   // On charge la librairie 'upload' de CodeIgniter en lui envoyant la config
  $this->load->library('form_validation');
  $this->load->model('produits_model');
  $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
  $this->form_validation->run('ajout'); // ceci initialise le dossier form_validation que j'ai appelé plus haut, le paramètre n'est autre que le NOM du tableau DANS LE FICHIER config/form_validation.php



  $model["select"] = $this->produits_model->ajout_select_un();



  if ($this->input->post()) 
  {
//------------------------------------------------------------------------------------------------------------
    $id_photo = $this->produits_model->modif_photo($id);
    $stock = get_object_vars($id_photo[0]);              // ICI, VOIR L AJOUT DE PHOTO ----> GET_OBJECT_VARS permet de manipuler une variable de type objet


//$ext_photo = $this->input->post("pro_photo");

  
  $config['overwrite'] = TRUE;  // permet de réécrire sur les fichiers
  $config['upload_path'] = './assets/images/'; // chemin où sera stocké le fichier
  $config['file_name'] = $stock['pro_id']; // nom du fichier final
  $config['allowed_types'] = 'gif|jpg|png'; // Types autorisés (ici pour des images)
  $this->upload->initialize($config); // On initialise la config
     

    if ($this->form_validation->run() == FALSE || !$this->upload->do_upload('fichier'))
    {

    $monResult = $this->produits_model->recharge_vue_modif($id);
    $model["produits"] = $monResult->row();
      
    // Echec : on récupère les erreurs dans une variable (une chaîne)
	
   $errors = $this->upload->display_errors();    
   $model["errors"] = $errors;

      $this->load->view('header_page');
      $this->load->view('modif', $model);
      $this->load->view("footer");
    }
    else
    {

      $this->produits_model->insert_modif();

     /* $data = $this->input->post();
      $id = $this->input->post("id");
      $this->db->where('pro_id', $id);
      $this->db->update('produits', $data);
      */
}
//-------------------------------------------------------------------------------------------------------------

$this->load->helper('url'); // je rapelle le helper url pour faire un redirect en dessous (je doute de l'utilité de cette ligne, a essayer sans)
 
redirect( site_url("produits/liste")) ;
  
  }
  else 
  {
//------------------------------------------------------------------------------------------------------------
   

    $liste = $this->produits_model->recharge_vue_modif($id);	
       
    
    // Teste s'il y a un résultat à la requête effectué. // Ici, si il n'y a pas de formulaire posté, on vérifie ce qu'il s'est passé, if (!$liste->row())  signifie qu'il n'y a pas de résultat pour l'id donné, c'est dont qu'il n'existe pas
    if (!$liste->row()) 
    {
        echo"<p>L'id ".$id." n'existe pas dans la base de données.</p>";    
        exit;             
    }            


//------------------------------------------------------------------------------------------------------------
    $model["produits"] = $liste->row(); // première ligne du résultat
    if($this->session->userdata("access_level") > 1)
  {
    $this->load->view('header_page');
    $this->load->view('modif', $model);
    $this->load->view("footer");
  }
  else
  {
  $this->load->view('header_page');
  $this->load->view("errors/private_content.php");
  $this->load->view("footer");
  } 
  } 
	
}// fin modif






//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------








public function Suppr($id)
{
  if($this->session->userdata("access_level") > 1)
  {
  $this->load->model('produits_model');
  $this->produits_model->suppression_ligne($id);

  $this->load->helper('url');
  redirect('produits/liste');
}
else
{
$this->load->view('header_page');
$this->load->view("errors/private_content.php");
$this->load->view("footer");
} 
}// fin suppression




//------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------




                                                                            // OPERATIONS LIEES AU PANIER






public function affiche()
	
{	
    // pas de requete ?
    $this->load->view('header_page');
    $this->load->view('panier');	
    $this->load->view('footer');
}


//------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

public function ajoutePanier() //ajoute un produit au panier   
{
        $data=$this->input->post(); //je mets les données postés dans $data

        if ($this->session->panier == null) // création du panier s'il n'existe pas // équivaut a $_SESSION['panier'];
        {
            $this->session->panier = array(); //je fais de la session un panier 

            $tab=$this->session->panier; // je stocke la session transformée en panier dans une variable 

            //On ajoute le produit

            array_push($tab,$data); // array push consiste a ajouter des éléments a la fin d'un tableau en créeant de nouveaux index si nécéssaire, donc en gros, on met les données colléctés dans $data a la fin d'un tableau qui contient déjà la session

            $this->session->panier = $tab; //une fois qu'on a mis la session dans un tableau,puis qu'on a ajouté les données de l'input posté a ce même tableau on remet ce tableau dans la session panier (maintenant elle contient le contenu de l'input)
                             //je précise que tout ceci fonctionne grace aux inputs présents sur la liste qui permettent d'ajouter un produit, grace a form_open('produits/ajoutePanier'); (a chaque fois qu'on clique sur ajouter un produit c'st cette méthode qui se déclenche)

            $this->liste(); // charge la liste

        }
        else //si le panier existe
        {

            $tab=$this->session->panier; // met le contenu de la session existante dans une variable $tab

            $idProduit=$this->input->post('pro_id'); //prends le pro_id du produit ajouté au panier

            $sortie = false;

            foreach ($tab as $produit) //on cherche si le produit existe déjà dans le panier  
            {
                if ($produit['pro_id'] == $idProduit) //on compare: les ID des produits présents dans le panier ($produit['pro_id']) avec le dernier produit posté pour savoir si il y'a occurence
                {
                    $sortie = true;   //sortie est un nom peu approprié, en réalité il permet uniqueement de vérifier si un produit est présent, si c'est le cas l'utilisateur est averti 
                }
            }

    

            if ($sortie) //si le produit existe déjà, l'utilisateur est averti
            {
                echo '<div class="alert alert-danger">Ce produit est déjà dans le panier.</div>';
                $this->liste();
            }
            else //sinon même opération qu'au début, on met les données postés au bout d'un tableau QUI CONTIENT DEJA LA SESSION, on pousse les données au fond du tableau grace a array push 
            { //sinon le produit est ajouté dans le panier
                array_push($tab,$data);

                $this->session->panier = $tab;

                $this->liste();

            }
        }
}








	
	
public function efface()	
{	
    $this->session->panier = array(); // vide le panier
	
    $this->affiche();	
}
	


public function qteplus($id)
	
{	
    $tab = $this->session->panier;	
    $temp = array();	
	
    for ($i=0; $i<count($tab); $i++) //on parcourt le tableau produit après produit --> Pour i allant de 0 a la taille totale du tableau	
    {	
      
        if ($tab[$i]['pro_id'] !== $id)  //on vérifie le pro_id dans chaque index du tableau (qui contient la session panier)
        {
	
            array_push($temp, $tab[$i]); 
	
        }
        else
        {
	
            $tab[$i]['pro_qte']++;
            array_push($temp, $tab[$i]);
	
        }
    }
		
    $tab = $temp;	
    unset($temp);	
    $this->session->panier=$tab;	
    $this->affiche();	

}




public function qtemoins($id)	
{	
    $tab = $this->session->panier;
	
    $temp = array();
		
    for ($i=0; $i<count($tab); $i++) //on parcourt le tableau produit après produit	
    {	
        if ($tab[$i]['pro_id'] !== $id)	
        {	
            array_push($temp, $tab[$i]);	
        }	
        else	
        {	

        $tab[$i]['pro_qte']--;

            if($tab[$i]['pro_qte']<1)
            {
              $tab[$i]['pro_qte'] = 0;
             
            }	

        array_push($temp, $tab[$i]);
	
        }	
    }
	
 
	
    $tab = $temp;	
    unset($temp);	
    $this->session->panier=$tab;	
    $this->affiche();
	
}



public function effaceProduit($id)	
{	
    $tab = $this->session->panier;
	
    $temp = array(); //création d'un tableau temporaire vide
		
    for($i=0; $i<count($tab); $i++) //on cherche dans le panier les produits à ne pas supprimer	
    {	
        if ($tab[$i]['pro_id'] !== $id)	
        {	
             array_push($temp, $tab[$i]); // ces produits sont ajoutés dans le tableau temporaire	
        }
    }
	
 	
   $tab = $temp;	
   unset($temp);
   $this->session->panier = $tab; // le panier prend la valeur du tableau temporaire et ne contient donc plus le produit à supprimer
		
   $this->affiche();
	
}

//------------------------------------------------------------------------------------------------------------------------------------------------------------------------------



//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------







}


?>
