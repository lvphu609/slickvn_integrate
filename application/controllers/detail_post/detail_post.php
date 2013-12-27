<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//include model/Api_link_enum
require APPPATH.'/models/api_link_enum.php';

class Detail_post extends CI_Controller {
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
    $this->load->view('detail_post/header/header');
    //nếu tồn tại id nhà hàng
   if(isset($_GET['id_post'])){
    if($_GET['id_post']!=NULL){  //nếu id khác null
    $id_post=$_GET['id_post'];
    $json_detail_post = $this->restaurant_apis->get_detail_post($id_post);
    $data['info_post']=$json_detail_post["Results"];
    //var_dump($data['info_post']);
      if($data['info_post']!=NULL){//nếu dữ liệu lấy về không NULL
          $json_post_similar = $this->restaurant_apis->get_all_post_similar(100,1,$id_post);
          $data['post_similar']=$json_post_similar["Results"];
          $data['BASE_IMAGE_POST_URL']=  Api_link_enum::$BASE_IMAGE_POST_URL;
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
             /*==================LOCATION_PAGE======================================================================================*/

                 $this->load->view('detail_post/content/location_page',$data);
             /*=================END_LOCATION_PAGE=======================================================================================*/ 
             /*==================DETAIL POST======================================================================================*/
                 $data['link_image_post_url']=  Api_link_enum::$BASE_IMAGE_POST_URL;
                 $this->load->view('detail_post/content/detail_post',$data);
             /*=================END DETAIL POST=======================================================================================*/ 
                      
                 
                 
                  $this->load->view('home/content/footer_content'); 
                  $this->load->view('detail_post/footer/footer');
              }
            else{}
          }
        else{}
       }
    else{}
    
  }
}
