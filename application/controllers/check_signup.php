<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//include model/api_link_enum
require APPPATH.'/models/api_link_enum.php';
class Check_signup extends CI_Controller {
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
        
      
      
     // Get a key from https://www.google.com/recaptcha/admin/create
      require_once('./includes/plugins/captcha/recaptchalib.php');
      $publickey = "6Lcx1eISAAAAAGPTgu-0tdvgWo0WeA5iS9574Dcc";
      $privatekey = "6Lcx1eISAAAAALY5Q7asfiEraMsZtf3dHmcvZrpk";
      # the response from reCAPTCHA
      $resp = null;
      # the error code from reCAPTCHA, if any
      $error = null;
      # was there a reCAPTCHA response?
      if (isset($_POST["recaptcha_response_field"])) {
              $resp = recaptcha_check_answer ($privatekey,
                                              $_SERVER["REMOTE_ADDR"],
                                              $_POST["recaptcha_challenge_field"],
                                              $_POST["recaptcha_response_field"]);

              if ($resp->is_valid) {
                //echo "success";
                $full_name=$_POST["param_name"];
                $email =$_POST["param_email"];
                $password =$_POST["param_password"];
                $password=  md5($password);
                $phone_number=$_POST["param_phone_number"];
                $address=$_POST["param_address"];
                $city=$_POST["param_city"];
                if($city==-1){
                 $city=$_POST['inputOtherCity'];
                }
                $address=$address." ".$city;
                $address=  trim($address);
                $confirm=0;
                if (isset($_POST["param_confirm"])){
                  $confirm=1;
                }
                
                
                $action="insert";
                $results=$this->user_apis->update_user(
                        $action,
                        null,
                        $full_name,
                        $email,
                        $password,
                        $phone_number,
                        $address,
                        null,
                        null,
                        null,
                        null,
                        null,
                        null,
                        null,
                        null
                        );
                
                    // var_dump($results);
                $status=$results['Status'];
                if(strcmp($status,"FALSE") == 0){
                  $error = $results['Error'];
                  if(strcmp($error,"EXIST_EMAIL")==0){
                    echo "Email đã tồn tại!";
                  }
                  
                }
                else{
                    if(strcmp($status,"SUCCESSFUL")==0){
                      $result=$results['Results'];
                      $value_result=$result[0];
                      //var_dump($value_result);
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
                //echo "success";
                
                /*
                echo "name: ".$name."<br>".
                     "email: ".$email."<br>".
                      "password: ".$password."<br>".
                      "phone: ".$phone."<br>".
                      "address: ".$address."<br>".
                      "city: " .$city."<br>".
                      "confirm: ".$confirm."<br>";
                */
                
                
                
                
                
              } else {
                echo 'mã bảo mật không đúng! bạn hãy refesh lại mã bảo mật và nhập lại!';
              }
      }
     
    
      
      
      
    
    
  }
 
}
