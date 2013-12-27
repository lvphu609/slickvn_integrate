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
    $json_meal_list = $this->common_apis->get_base_collection(Api_link_enum::COLLECTION_MEAL_TYPE,1);  
    $json_favourite_list = $this->common_apis->get_base_collection(Api_link_enum::COLLECTION_FAVOURITE,1);
    
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
    $json_meal_list = $this->common_apis->get_base_collection(Api_link_enum::COLLECTION_MEAL_TYPE,1);  
    $json_favourite_list = $this->common_apis->get_base_collection(Api_link_enum::COLLECTION_FAVOURITE,1);
    
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
    $json_meal_list = $this->common_apis->get_base_collection(Api_link_enum::COLLECTION_MEAL_TYPE,1);  
    $json_favourite_list = $this->common_apis->get_base_collection(Api_link_enum::COLLECTION_FAVOURITE,1);
    
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
     $json_meal_list = $this->common_apis->get_base_collection(Api_link_enum::COLLECTION_MEAL_TYPE,1);  
    $json_favourite_list = $this->common_apis->get_base_collection(Api_link_enum::COLLECTION_FAVOURITE,1);
    
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
    $json_meal_list = $this->common_apis->get_base_collection(Api_link_enum::COLLECTION_MEAL_TYPE,1);  
    $json_favourite_list = $this->common_apis->get_base_collection(Api_link_enum::COLLECTION_FAVOURITE,1);
    
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
   public function search_filter(){
    
    $array_search=$_POST['array_search'];
    
    
    //var_dump($array_search);
     $favourite_list=  explode(",",trim($array_search[0]));
     $meal_type=  explode(",",trim($array_search[1]));
     $culinary_style_list=  explode(",",trim($array_search[2]));
     $mode_use_list=  explode(",",trim($array_search[3]));
     $payment_type_list=  explode(",",trim($array_search[4]));
     $landscape_list=  explode(",",trim($array_search[5]));
     $price_person_list=  explode(",",trim($array_search[6]));
     $other_criteria_list=  explode(",",trim($array_search[7]));
     
     
     $array_filter=array(
            array(
                "field" => "favourite_list",
                "array_id"=>$favourite_list
            ),
            array(
                "field" => "meal_type",
                "array_id"=>$meal_type
            ),
            array(
                   "field" => "culinary_style_list",
                   "array_id"=>$culinary_style_list
               ),
            array(
                   "field" => "mode_use_list",
                   "array_id"=>$mode_use_list
               ),
            array(
                   "field" => "payment_type_list",
                   "array_id"=>$payment_type_list
               ),
            array(
                   "field" => "landscape_list",
                   "array_id"=>$landscape_list
               ),
            array(
                   "field" => "price_person_list",
                   "array_id"=>$price_person_list
               ),
            array(
                   "field" => "other_criteria_list",
                   "array_id"=>$other_criteria_list
               )
     );
   //  var_dump($array_filter);
   
     
    $json_search_restaurant_filter = $this->restaurant_apis->search_restaurant_multi_field(100,1,$array_filter);
    $data['all_restaurant']=$json_search_restaurant_filter["Results"];
    $url=  base_url();
    $url_res_frofile=Api_link_enum::$BASE_PROFILE_RESTAURANT_URL;
   //var_dump($data['all_restaurant']);
      if(is_array($data['all_restaurant']) && sizeof($data['all_restaurant'])>0){
                  echo "<ul>";
                              foreach ($data['all_restaurant'] as $info_detail_restaurant) {
                                  $id=                    $info_detail_restaurant['id'];
                                  $link_to_detail_restaurant=$url."index.php/detail_restaurant/detail_restaurant?id_restaurant=".$id;
                               //   $id_user=               $info_detail_restaurant['id_user'];
                                  $id_menu_dish=          $info_detail_restaurant['id_menu_dish'];
                                  $id_coupon=             $info_detail_restaurant['id_coupon'];
                                  $name=                  $info_detail_restaurant['name'];
                                  $number_view=           $info_detail_restaurant['number_view'];
                                  $avatar=                $info_detail_restaurant['avatar'];
                                  $address=               $info_detail_restaurant['address'];

                                  $favourite_type_list=   $info_detail_restaurant['favourite_list'];
                                  $favourite_type_list=substr($favourite_type_list, 1); 

                                  $price_person_list=     $info_detail_restaurant['price_person_list'];
                                  $price_person_list=substr($price_person_list, 1); 

                                  $culinary_style=        $info_detail_restaurant['culinary_style_list'];
                                  $culinary_style=substr($culinary_style, 1); 

                                  $number_assessment=     $info_detail_restaurant['number_assessment'];
                                  $number_view=           $info_detail_restaurant['number_view'];
                                  $rate_point =           $info_detail_restaurant['rate_point'];
                                  $rate_point =round($rate_point,1);



                                 echo'<li>
                                  <a href="'.$link_to_detail_restaurant.'">
                                    <div class="left">
                                      <img src="'.$url_res_frofile.$avatar.'">
                                    </div>
                                  </a>
                                  <div class="mid">
                                    <div class="title">
                                      <a href="'.$link_to_detail_restaurant.'">
                                        <span class="text_title">'.$name.'</span>
                                      </a>
                                    </div>
                                    <div class="address">
                                       <span class="text_address">
                                         '.$address.'
                                       </span>
                                    </div>
                                    <div class="content_introduce">
                                      <p class="text_content_introduce">
                                        <span >Mục Đích</span>:
                                                '.$favourite_type_list.'  <br> 
                                        <span>Giá trung bình/người</span>:
                                                 '.$price_person_list.' <br>                                
                                        <span>Phong cách ẩm thực</span>:
                                                 '.$culinary_style.' <br>  
                                      </p>
                                    </div>
                                  </div>
                                  <div class="right">
                                    <div class="point">
                                      <span>'.$rate_point.'</span>
                                    </div>
                                    <div class="vote">
                                      <div class="rating">';

                                           $stt_off=5-round($rate_point/2);
                                            $stt_on= round($rate_point/2);
                                            while ($stt_on!=0){
                                              echo '<span class="star_active"></span>';
                                                $stt_on--;
                                            }

                                            while ($stt_off!=0){        
                                                     echo'<span class="star_no_active"></span>';
                                                     $stt_off--;
                                            }

                               echo'</div>
                                    </div>
                                    <div class="comment_view">
                                      <p>
                                        <span>'.$number_assessment.'</span>&nbsp;Bình luận<br>
                                        <span>'.$number_view.'</span>&nbsp;lượt xem
                                      </p>
                                    </div>
                                  </div>
                                </li>';

                              } 

                     echo "</ul>";
               
           }
       
  } 
 
  
  
}

