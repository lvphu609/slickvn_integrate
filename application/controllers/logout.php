<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//include model/api_link_enum
require APPPATH.'/models/api_link_enum.php';
class Logout extends CI_Controller {
   public function __construct() {
    parent::__construct();
   // $this->load->model('function_modeler');
    api_link_enum::initialize();
    $this->load->helper('url');
    $this->load->model('restaurantenum');
    $this->load->model('restaurant/restaurant_apis');
    $this->load->model('common/common_apis');
    $this->load->model('user/user_apis');
    $this->load->library('session');
    
  }

  public function index()
  {      
    
    //$this->session->unset_userdata('id_user');
   // $this->session->unset_userdata('full_name');
   // $this->session->unset_userdata('avatar');
    $this->session->unset_userdata('info_user');
    
      $url = base_url();
      $sec = "0";
      header("Refresh: $sec; url=$url");
  }
}
?>
