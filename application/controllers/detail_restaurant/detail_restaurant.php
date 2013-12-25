<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//include model/Api_link_enum
require APPPATH.'/models/api_link_enum.php';

class Detail_restaurant extends CI_Controller {
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
    $this->load->view('detail_restaurant/header/header');
    //nếu tồn tại id nhà hàng
 if(isset($_GET['id_restaurant'])){
    if($_GET['id_restaurant']!=NULL){  //nếu id khác null
    $id_restaurant=$_GET['id_restaurant'];
    
    $json_detail_restaurant = $this->restaurant_apis->get_detail_restaurant($id_restaurant);
    $data['info_restaurant']=$json_detail_restaurant["Results"];
    $data['BASE_IMAGE_USER_PROFILE_URL']=Api_link_enum::$BASE_IMAGE_USER_PROFILE_URL;
    $data['BASE_PROFILE_RESTAURANT_URL']=  Api_link_enum::$BASE_PROFILE_RESTAURANT_URL;
    //danh sach nha hang tuong tu
    $json_restaurant_similar = $this->restaurant_apis->get_all_restaurant_similar(1000, 1,$id_restaurant);
    $data['restaurant_similar']=$json_restaurant_similar["Results"];
    //var_dump($data['restaurant_similar']);
      if($data['info_restaurant']!=NULL){//if get data not NULL
        
               $json_comment_restaurant = $this->restaurant_apis->get_assessment_by_id_restaurant($limit=100,$page=1,$id_restaurant);
               $data['comment_restaurant']=$json_comment_restaurant["Results"];
               //var_dump($data['comment_restaurant']);
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
             /*==================LOCATION_PAGE======================================================================================*/

                 $this->load->view('detail_restaurant/content/location_page',$data);
             /*=================END_LOCATION_PAGE=======================================================================================*/ 

             /*=================CAROUSEL=======================================================================================*/ 
                 $data['link_restaurant_frofile']=  Api_link_enum::$BASE_PROFILE_RESTAURANT_URL;
                 $this->load->view('detail_restaurant/content/carousel',$data);

              /*================END_CAROUSEL========================================================================================*/
             /*=================TABS=======================================================================================*/ 

                 $this->load->view('detail_restaurant/content/tabs',$data);

              /*================END_TABS========================================================================================*/
                  $this->load->view('home/content/footer_content'); 
                  $this->load->view('detail_restaurant/footer/footer');
              }
            else{}
          }
        else{}
       }
    else{}
    
  }
}
