<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//include model/api_link_enum
require APPPATH.'/models/api_link_enum.php';

class Check_login extends CI_Controller {
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
    $email=$_POST['param_email'];
    
    $password=$_POST['param_password'];
    $password=  md5($password);
  //  echo $email."<br>". $password;
  //  $password=  md5($password);
    //$url=Api_link_enum::$USER_LOGIN_URL;
    $results=$this->user_apis->login($email,$password);     
               
                
    //var_dump($results);
             $status=$results['Status'];
                if(strcmp($status,"FALSE") == 0){
                  $error = $results['Error'];
                  if(strcmp($error,"Login fail")==0){
                    echo "Bạn nhập sai email hoặc password!";
                  }
                  
                }
                else{
                    if(strcmp($status,"SUCCESSFUL")==0){
                      $result=$results['Results'];
                      $value_result=$result[0];
                     // var_dump($value_result);
                      $id_user =$value_result['id'];
                      $full_name=$value_result['full_name'];
                      $avatar= $value_result['avatar']; 
                      
                      
                  
                      $sess_array=array(
                          'info_user'=>array(
                                              'id_user' => $id_user,
                                              'full_name' => $full_name,
                                              'avatar' => $avatar

                                            )
                      );
                      
                      
                      $this->session->set_userdata($sess_array);
                      
                      
                      
                      
                      
                      echo "success";
                    }
    
                }
    
    
    //echo $response;
    
    
    
    // curl_close($ch);
  }
 
 }