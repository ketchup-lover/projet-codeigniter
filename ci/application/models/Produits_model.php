<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
	
 
	
class Produits_model extends CI_Model
	
{
    

    public function liste() 
	
    {
   
        $this->load->database();
   
        $requete1 = $this->db->query("SELECT * FROM produits LEFT JOIN categories on pro_cat_id = cat_id");
   
        $aProduits = $requete1->result();  
   
      

   
        return $aProduits;            
   
    }  

    public function insert()
    {

        $data = $this->input->post();      // on met les données postés (this input post) dans une variable afin d'insérer cette variable dans la DB


        $this->load->database();

        $extension=$this->upload->data('file_ext');

        
        $data['pro_photo']=substr($extension,1);

      $this->db->insert('produits', $data); // voila l'insert, on met $data (le this input post) dedans

    }




    public function insert_modif()
    {
        $data = $this->input->post();      // on met les données postés (this input post) dans une variable afin d'insérer cette variable dans la DB


        $this->load->database();

        $extension=$this->upload->data('file_ext');

        

        $data['pro_photo']=substr($extension,1);


        $id = $this->input->post("pro_id");

   

      $this->db->where('pro_id', $id);

      $this->db->update('produits', $data);

      
    }




    public function ajout_select_un()
    {
        $this->load->database();
   
        $requete2 = $this->db->query('SELECT DISTINCT cat_nom, pro_cat_id, cat_id FROM produits JOIN categories on pro_cat_id = cat_id'); 
        $aSelect = $requete2->result();  
   

   
        return $aSelect;

    }

    public function ajout_photo()
    {
        $this->load->database();
   
        


        $requete3 = $this->db->query("SELECT MAX(pro_id) FROM produits");
        
        $aIncr = $requete3->result(); 
 
        $resultat = get_object_vars($aIncr[0]);

        (int)$retour = (int)$resultat['MAX(pro_id)'] + (int)1;


        


         $this->db->query("ALTER TABLE produits AUTO_INCREMENT =".$retour); 
   

   
        return $retour;

    }

    public function modif_photo($id)
    {
        $this->load->database();

        $requeteID = $this->db->query("SELECT pro_id FROM produits where pro_id= ?", array($id));

        $id_photo = $requeteID->result();   

        return $id_photo;


    }
    
    public function recharge_vue_modif($id)
    {
       $this->load->database();

       $maRequete = $this->db->query("SELECT * FROM produits WHERE pro_id= ?", array($id));

     

       return $maRequete;

    }

    public function suppression_ligne($id)
    {
        $this->load->database();


        $this->db->where('pro_id', $id);
  $this->db->delete('produits');
    }



    public function requete_login($pseudo)
    {
        $this->load->database();
        $req= $this->db->query("SELECT pseudo, pass, id from membres WHERE pseudo = ?", array($pseudo));
        $retour = $req->result();
        return $retour;
    }




    






    /*

    -recap -> je crée une fonction (je lui donne le nom que je veux) 

    -Au début de chaque fonction DANS LE CONTROLLEUR j'appelle le fichier qui se trouve dans application/models qui contient les modèles -> this->load->model('produits_model'); 

    - une fois que c'est fait, this->produits_model->NOM_DE_LA_CLASSE_DANS_MODELES(); CECI ME DONNE LE RETOUR DE LA FONCTION QUI FAIT LA REQUETE

    - voilà.

    */


    /*
    id_photo = this->produits_model->modif_photo($id);

stock = get_object_vars(id_photo[0]);              // ICI,,,, VOIR L AJOUT DE PHOTO >>>>>>>>>>>>>>>>>>>> GET_OBJECT_VARS permet de manipuler une variable de type objet
    */


}       