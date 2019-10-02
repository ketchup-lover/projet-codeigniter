<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
              $this->load->helper(array('url', 'form'));
              $this->load->model("login_model");
              $this->load->library('session');
              $this->load->library('form_validation');
              $this->form_validation->set_error_delimiters('<div class="white">', '</div>');

      }
      
  
      private function view($page, $data=false) // $data,  This parameter will be optional, so set it as false as default value.
      {
        $this->load->view("header_page", $data);
        $this->load->view($page);
        $this->load->view("footer", $data);
      }
      

      public function index() {
        if ($this->session->userdata("user")) {  // If the user is already logged in, instead of showing the initial page where he can log in, it redirects him to the success page.
            redirect("success", "refresh");
            return;
        }
        $this->view("auth/login");
      }
      
      public function register() {
        $this->view("auth/register");
      }
      
      public function fail() {
        //  $erreurs['erreurs'] = "Login ou mot de passe incorrect";
       // $this->view("auth/fail");
          $this->view("auth/login");
      }
      
      public function success() {
        $data["user"] = $this->session->userdata("user");       
        //$data["access"] = $this->session->userdata("access_level");
        $this->view("auth/success", $data);
      }
      
      public function login() {
        $this->form_validation->run('logs_login');
        if($this->form_validation->run() == FALSE)  // en gros, cela veut dire SI le test effectué dans form_validation est FAUX (donc si il y'a un paramère saisi par l'utilisateur qui correspond pas avec les param dans form_validation) voir config/form_validation.php
       {
        $this->load->view("header_page");
        $this->load->view("auth/login");
        $this->load->view("footer");
       }
       else
       {
        $login = htmlspecialchars($this->input->post("login"));
        $password = htmlspecialchars($this->input->post("password"));
        if ($this->login_model->login($login, $password)) // “$this->modelname->methodName(…)”.
        {
          if($this->login_model->access_level($login))
          {
            $session_level = array();
            $session_level = $this->login_model->access_level($login);
            $this->session->set_userdata("access_level", $session_level[0]['access_level']);
          }
          else
          {
            die("il y'a eu une erreur dans le script");
          }
          $this->session->set_userdata("user", $login);   // We can access the stored value through the following statement: $this->session->userdata("user");
          redirect("success", "refresh");
        } 
      } 
      }
      
      


      public function new_register() {
        $this->form_validation->run('logs');
        if($this->form_validation->run() == FALSE)  // en gros, cela veut dire SI le test effectué dans form_validation est FAUX (donc si il y'a un paramère saisi par l'utilisateur qui correspond pas avec les param dans form_validation) voir config/form_validation.php
       {
        $this->load->view("header_page");
        $this->load->view("auth/register");
        $this->load->view("footer");
       }
       else
       {
        $login = htmlspecialchars($this->input->post("login"));
        $password = htmlspecialchars($this->input->post("password"));
        $name = htmlspecialchars($this->input->post("email"));
        $this->login_model->register($name, $login, $password);
        redirect("index", "refresh");
       }
      }


      public function logout() {
        $this->session->unset_userdata('user');
        session_destroy();
        redirect('index', 'refresh');
      }
            


    

}


