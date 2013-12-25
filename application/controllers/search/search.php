<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/models/api_link_enum.php';

class Search extends CI_Controller {
   public function __construct() {
    parent::__construct();
    api_link_enum::initialize();
    $this->load->helper('url');
    $this->load->model('restaurantenum');
    $this->load->model('restaurant/restaurant_apis');
    $this->load->model('common/common_apis');
    $this->load->model('user/user_apis');
    $this->load->library('session');
    $this->info_user   = $this->session->userdata('info_user');
    
  }

  public function index()
  {
    
  }
  public function search_meal()
  {
    if(isset($_GET['meal_name'])){
      $meal_name=$_GET['meal_name'];
      $meal_name=  trim($meal_name);
      //$meal_name= urlencode($meal_name);
      //var_dump($meal_name);
    }
    else {
        $meal_name="";
       }
    
    
    $key=array($meal_name);
    
    $json_search_meal = $this->restaurant_apis->search_restaurant_by_meal(Restaurantenum::LIMIT_PAGE_SEARCH_MEAL,1,$key);
    $data['result_search_meal']=$json_search_meal["Results"];
    $data['action_search']="meal";
    $data['result_search_coupon']=NULL;
    $data['result_search_favourite']=NULL;
    $data['result_search_restaurant']=NULL;
   //  $data['result_search_favourite']="error";
   // var_dump($data['result_search_meal']);
    
    $this->load->view('search/header/header');
     /*===============MENU==========================================================================*/
    $info_user=$this->info_user;
    $data['info_user']=$info_user;
    $json_meal_list = $this->common_apis->get_base_collection(Api_link_enum::COLLECTION_MEAL_TYPE);  
    $json_favourite_list = $this->common_apis->get_base_collection(Api_link_enum::COLLECTION_FAVOURITE);
    
    $data['meal_list']=$json_meal_list["Results"];
    $data['favourite_list']=$json_favourite_list["Results"];    
    if($data['meal_list']!=NULL&& $data['favourite_list']!=NULL){
     $this->load->view('home/menu/menu',$data);
    }
  /*================END_MENU============================================================================*/
    
  /*================LOCATION============================================================================*/
   $this->load->view('search/content/location_page'); 
 /*================END LOCATION============================================================================*/
   
 /*send data for form filter*/
    
   //danh sách phong cách ẩm thực
     $json_culinary_style = $this->common_apis->get_base_collection(Api_link_enum::COLLECTION_CULINARY_STYLE);
     $data['culinary_style']=$json_culinary_style["Results"];
   //phương thức sử dụng
     $json_mode_use_list =$this->common_apis->get_base_collection(Api_link_enum::COLLECTION_MODE_USE);
     $data['mode_use_list']=$json_mode_use_list["Results"];
   //nhu cầu
     $json_favourite_list = $this->common_apis->get_base_collection(Api_link_enum::COLLECTION_FAVOURITE);
     $data['favourite_list']=$json_favourite_list["Results"];
    //hình thức thanh toán
    
     $json_payment_type_list = $this->common_apis->get_base_collection(Api_link_enum::COLLECTION_PAYMENT);
     $data['payment_type_list']=$json_payment_type_list["Results"];
    //ngoại cảnh
     
     $json_landscape_list = $this->common_apis->get_base_collection(Api_link_enum::COLLECTION_LANDSCAPE);
     $data['landscape_list']=$json_landscape_list["Results"];
    //giá trung bình người
    
     $json_price_person_list = $this->common_apis->get_base_collection( Api_link_enum::COLLECTION_PRICE_PERSION);
     $data['price_person_list']=$json_price_person_list["Results"];
    //các tiêu chí khác
   
     $json_other_criteria_list = $this->common_apis->get_base_collection(Api_link_enum::COLLECTION_OTHER_CRITERIA);
     $data['other_criteria_list']=$json_other_criteria_list["Results"];
        
 /*end send data for form filter*/
     
     
    $data['link_restaurant_frofile']=  Api_link_enum::$BASE_PROFILE_RESTAURANT_URL;
    $this->load->view('search/content/result_search',$data); 
  
     
    
    
    
   $this->load->view('home/content/footer_content'); 
   $this->load->view('search/footer/footer');
    
  }
  
  public function search_favourite()
  {
    
     if(isset($_GET['favourite_id'])){
       $favourite_id=$_GET['favourite_id'];
    }
    else {
        $favourite_id="";
       }
   
    
    $key=$favourite_id;
    $json_search_favourite = $this->restaurant_apis->search_restaurant_by_id_base_collection(Restaurantenum::LIMIT_PAGE_SEARCH_MEAL,1,"favourite_list",$key);
    $data['result_search_favourite']=$json_search_favourite["Results"];
    $data['action_search']="favourite";
    $data['result_search_coupon']=NULL;
    $data['result_search_meal']=NULL;
    $data['result_search_restaurant']=NULL;
    //$data['result_search_meal']="error";
    //var_dump($data['result_search_favourite']);
    
    
    $this->load->view('search/header/header');
     /*===============MENU==========================================================================*/
    $info_user=$this->info_user;
    $data['info_user']=$info_user;
    $json_meal_list = $this->common_apis->get_base_collection(Api_link_enum::COLLECTION_MEAL_TYPE);  
    $json_favourite_list = $this->common_apis->get_base_collection(Api_link_enum::COLLECTION_FAVOURITE);
    
    $data['meal_list']=$json_meal_list["Results"];
    $data['favourite_list']=$json_favourite_list["Results"];    
    if($data['meal_list']!=NULL&& $data['favourite_list']!=NULL){
     $this->load->view('home/menu/menu',$data);
    }
  /*================END_MENU============================================================================*/
    
  /*================LOCATION============================================================================*/
   $this->load->view('search/content/location_page'); 
 /*================END LOCATION============================================================================*/
    /*send data for form filter*/
    
   //danh sách phong cách ẩm thực
     $json_culinary_style = $this->common_apis->get_base_collection(Api_link_enum::COLLECTION_CULINARY_STYLE);
     $data['culinary_style']=$json_culinary_style["Results"];
   //phương thức sử dụng
     $json_mode_use_list =$this->common_apis->get_base_collection(Api_link_enum::COLLECTION_MODE_USE);
     $data['mode_use_list']=$json_mode_use_list["Results"];
   //nhu cầu
     $json_favourite_list = $this->common_apis->get_base_collection(Api_link_enum::COLLECTION_FAVOURITE);
     $data['favourite_list']=$json_favourite_list["Results"];
    //hình thức thanh toán
    
     $json_payment_type_list = $this->common_apis->get_base_collection(Api_link_enum::COLLECTION_PAYMENT);
     $data['payment_type_list']=$json_payment_type_list["Results"];
    //ngoại cảnh
     
     $json_landscape_list = $this->common_apis->get_base_collection(Api_link_enum::COLLECTION_LANDSCAPE);
     $data['landscape_list']=$json_landscape_list["Results"];
    //giá trung bình người
    
     $json_price_person_list = $this->common_apis->get_base_collection( Api_link_enum::COLLECTION_PRICE_PERSION);
     $data['price_person_list']=$json_price_person_list["Results"];
    //các tiêu chí khác
   
     $json_other_criteria_list = $this->common_apis->get_base_collection(Api_link_enum::COLLECTION_OTHER_CRITERIA);
     $data['other_criteria_list']=$json_other_criteria_list["Results"];
        
 /*end send data for form filter*/
     
   $data['link_restaurant_frofile']=  Api_link_enum::$BASE_PROFILE_RESTAURANT_URL;
   $this->load->view('search/content/result_search',$data); 
  
    
   $this->load->view('home/content/footer_content'); 
   $this->load->view('search/footer/footer');
    
  }
  
  
  public function search_restaurant()
  {
    $input_text_search=$_GET['input_text_search'];
    $input_text_search=  trim($input_text_search);
    //$input_text_search=  urlencode($input_text_search);
    $key=$input_text_search;
    
    $json_search_restaurant = $this->restaurant_apis->search_restaurant_by_name(Restaurantenum::LIMIT_PAGE_SEARCH_MEAL,1,$key);
    $data['result_search_restaurant']=$json_search_restaurant["Results"];
    
    $data['action_search']="restaurant";
    $data['result_search_coupon']=NULL;
    $data['result_search_meal']=NULL;
    $data['result_search_favourite']=NULL;   
    
    $this->load->view('search/header/header');
     /*===============MENU==========================================================================*/
    $info_user=$this->info_user;
    $data['info_user']=$info_user;
    $json_meal_list = $this->common_apis->get_base_collection(Api_link_enum::COLLECTION_MEAL_TYPE);  
    $json_favourite_list = $this->common_apis->get_base_collection(Api_link_enum::COLLECTION_FAVOURITE);
    
    $data['meal_list']=$json_meal_list["Results"];
    $data['favourite_list']=$json_favourite_list["Results"];    
    if($data['meal_list']!=NULL&& $data['favourite_list']!=NULL){
     $this->load->view('home/menu/menu',$data);
    }
  /*================END_MENU============================================================================*/
    
  /*================LOCATION============================================================================*/
   $this->load->view('search/content/location_page'); 
 /*================END LOCATION============================================================================*/
   
 /*send data for form filter*/
    
   //danh sách phong cách ẩm thực
     $json_culinary_style = $this->common_apis->get_base_collection(Api_link_enum::COLLECTION_CULINARY_STYLE);
     $data['culinary_style']=$json_culinary_style["Results"];
   //phương thức sử dụng
     $json_mode_use_list =$this->common_apis->get_base_collection(Api_link_enum::COLLECTION_MODE_USE);
     $data['mode_use_list']=$json_mode_use_list["Results"];
   //nhu cầu
     $json_favourite_list = $this->common_apis->get_base_collection(Api_link_enum::COLLECTION_FAVOURITE);
     $data['favourite_list']=$json_favourite_list["Results"];
    //hình thức thanh toán
    
     $json_payment_type_list = $this->common_apis->get_base_collection(Api_link_enum::COLLECTION_PAYMENT);
     $data['payment_type_list']=$json_payment_type_list["Results"];
    //ngoại cảnh
     
     $json_landscape_list = $this->common_apis->get_base_collection(Api_link_enum::COLLECTION_LANDSCAPE);
     $data['landscape_list']=$json_landscape_list["Results"];
    //giá trung bình người
    
     $json_price_person_list = $this->common_apis->get_base_collection( Api_link_enum::COLLECTION_PRICE_PERSION);
     $data['price_person_list']=$json_price_person_list["Results"];
    //các tiêu chí khác
   
     $json_other_criteria_list = $this->common_apis->get_base_collection(Api_link_enum::COLLECTION_OTHER_CRITERIA);
     $data['other_criteria_list']=$json_other_criteria_list["Results"];
        
 /*end send data for form filter*/
   
   $data['link_restaurant_frofile']=  Api_link_enum::$BASE_PROFILE_RESTAURANT_URL;
   $this->load->view('search/content/result_search',$data); 
  
    
   $this->load->view('home/content/footer_content'); 
   $this->load->view('search/footer/footer');
    
  }
  public function search_restaurant_coupon()
  {
    $input_text_search= $_GET['input_text_search'];
    $input_text_search=  trim($input_text_search);
    //$input_text_search=  urlencode($input_text_search);
    
    $key=$input_text_search;
    $json_search_coupon = $this->restaurant_apis->search_restaurant_by_coupon(Restaurantenum::LIMIT_PAGE_SEARCH_COUPON,1,$key);
    $data['result_search_coupon']=$json_search_coupon["Results"];
    
    $data['action_search']="coupon";
    $data['result_search_restaurant']=NULL;
    $data['result_search_meal']=NULL;
    $data['result_search_favourite']=NULL;
    
    $this->load->view('search/header/header');
     /*===============MENU==========================================================================*/
    $info_user=$this->info_user;
    $data['info_user']=$info_user;
     $json_meal_list = $this->common_apis->get_base_collection(Api_link_enum::COLLECTION_MEAL_TYPE);  
    $json_favourite_list = $this->common_apis->get_base_collection(Api_link_enum::COLLECTION_FAVOURITE);
    
    $data['meal_list']=$json_meal_list["Results"];
    $data['favourite_list']=$json_favourite_list["Results"];    
    if($data['meal_list']!=NULL&& $data['favourite_list']!=NULL){
     $this->load->view('home/menu/menu',$data);
    }
  /*================END_MENU============================================================================*/
    
  /*================LOCATION============================================================================*/
   $this->load->view('search/content/location_page'); 
 /*================END LOCATION============================================================================*/
    /*send data for form filter*/
    
   //danh sách phong cách ẩm thực
     $json_culinary_style = $this->common_apis->get_base_collection(Api_link_enum::COLLECTION_CULINARY_STYLE);
     $data['culinary_style']=$json_culinary_style["Results"];
   //phương thức sử dụng
     $json_mode_use_list =$this->common_apis->get_base_collection(Api_link_enum::COLLECTION_MODE_USE);
     $data['mode_use_list']=$json_mode_use_list["Results"];
   //nhu cầu
     $json_favourite_list = $this->common_apis->get_base_collection(Api_link_enum::COLLECTION_FAVOURITE);
     $data['favourite_list']=$json_favourite_list["Results"];
    //hình thức thanh toán
    
     $json_payment_type_list = $this->common_apis->get_base_collection(Api_link_enum::COLLECTION_PAYMENT);
     $data['payment_type_list']=$json_payment_type_list["Results"];
    //ngoại cảnh
     
     $json_landscape_list = $this->common_apis->get_base_collection(Api_link_enum::COLLECTION_LANDSCAPE);
     $data['landscape_list']=$json_landscape_list["Results"];
    //giá trung bình người
    
     $json_price_person_list = $this->common_apis->get_base_collection( Api_link_enum::COLLECTION_PRICE_PERSION);
     $data['price_person_list']=$json_price_person_list["Results"];
    //các tiêu chí khác
   
     $json_other_criteria_list = $this->common_apis->get_base_collection(Api_link_enum::COLLECTION_OTHER_CRITERIA);
     $data['other_criteria_list']=$json_other_criteria_list["Results"];
        
 /*end send data for form filter*/
     
   $data['link_restaurant_frofile']=  Api_link_enum::$BASE_PROFILE_RESTAURANT_URL;
   $this->load->view('search/content/result_search',$data); 
  
    
   $this->load->view('home/content/footer_content'); 
   $this->load->view('search/footer/footer');
    
  }
  
  
  
  
  public function search_post(){
    
    $input_text_search=$_GET['input_text_search'];
    $input_text_search=  trim($input_text_search);
   // $input_text_search=  urlencode($input_text_search);    
    $key=$input_text_search;
    $data['BASE_IMAGE_POST_URL']=  Api_link_enum::$BASE_IMAGE_POST_URL;
    $json_search_post = $this->restaurant_apis->search_post(Restaurantenum::LIMIT_SEARCH_POST,1,$key);
    $data['result_search_post']=$json_search_post["Results"];
    
    $this->load->view('search/header/header');
     /*===============MENU==========================================================================*/
    $info_user=$this->info_user;
    $data['info_user']=$info_user;
    $json_meal_list = $this->common_apis->get_base_collection(Api_link_enum::COLLECTION_MEAL_TYPE);  
    $json_favourite_list = $this->common_apis->get_base_collection(Api_link_enum::COLLECTION_FAVOURITE);
    
    $data['meal_list']=$json_meal_list["Results"];
    $data['favourite_list']=$json_favourite_list["Results"];    
    if($data['meal_list']!=NULL&& $data['favourite_list']!=NULL){
     $this->load->view('home/menu/menu',$data);
    }
  /*================END_MENU============================================================================*/
    
  /*================LOCATION============================================================================*/
   $this->load->view('search/content/location_page'); 
 /*================END LOCATION============================================================================*/
   $this->load->view('search/content/result_search_post',$data); 
   $this->load->view('home/content/footer_content'); 
   $this->load->view('search/footer/footer');
    
  }
  
  public function admin_search_member(){
    
    $input_text_search=$_GET['input_text_search'];
    $input_text_search=  trim($input_text_search);
    $input_text_search=  urlencode($input_text_search);
    $key=$input_text_search;
    
     $json_search_member = $this->user_apis->search_user(Restaurantenum::LIMIT_PAGE_USER_ALL,1,$key);
     $data['all_user']=$json_search_member["Results"];
    
     
      $data['chosed']="member_page";
      $this->load->view('admin/header/header_main',$data);
      $this->load->view('admin/taskbar_top/taskbar_top');
      $this->load->view('admin/menu/menu_main',$data);

      $this->load->view('admin/content/member_page/member_page',$data);
      $this->load->view('admin/footer/footer_main');
  }
   public function admin_search_restaurant(){
    
    $input_text_search=$_GET['input_text_search'];
    $input_text_search=  trim($input_text_search);
    $input_text_search=  urlencode($input_text_search);
    
    $key=$input_text_search;
    
     $json_search_restaurant = $this->restaurant_apis->search_restaurant(Restaurantenum::LIMIT_PAGE_USER_ALL,1,$key);
     $data['all_restaurant']=$json_search_restaurant["Results"];
    
      $data['chosed']="restaurant_page";
      $this->load->view('admin/header/header_main',$data);
      $this->load->view('admin/taskbar_top/taskbar_top');
      $this->load->view('admin/menu/menu_main',$data);

      $this->load->view('admin/content/restaurant_page/restaurant_page',$data);
      $this->load->view('admin/footer/footer_main');
     
  }
  
     public function admin_search_restaurant_coupon(){
    
    $input_text_search=  $_GET['input_text_search'];
    $input_text_search=  trim($input_text_search);
    $input_text_search=  urlencode($input_text_search);
    
    $key=$input_text_search;
    $json_search_restaurant = $this->restaurant_apis->search_restaurant(Restaurantenum::LIMIT_PAGE_USER_ALL,1,$key);
    $data['all_restaurant']=$json_search_restaurant["Results"];
    
     
      $data['chosed']="coupon_page";
      $this->load->view('admin/header/header_main',$data);
      $this->load->view('admin/taskbar_top/taskbar_top');
      $this->load->view('admin/menu/menu_main',$data);

      $this->load->view('admin/content/coupon_page/coupon_page',$data);
      $this->load->view('admin/footer/footer_main');
     
   
       
  }
  
}

