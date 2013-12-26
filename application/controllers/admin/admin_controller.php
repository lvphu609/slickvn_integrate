<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/models/api_link_enum.php';
class Admin_controller extends CI_Controller {
   public function __construct() {
    parent::__construct();
    api_link_enum::initialize();
    $this->load->helper('url');
    $this->load->model('restaurantenum');
    $this->load->model('restaurant/restaurant_apis');
    $this->load->model('common/common_apis');
    $this->load->model('user/user_apis');
    
    
  }
/*========================TRANG CHINH=================================================================*/
  public function index()
  {

    $data['chosed']="main_page";
    $this->load->view('admin/header/header_main',$data);
    $this->load->view('admin/taskbar_top/taskbar_top');
    $this->load->view('admin/menu/menu_main',$data);
    $this->load->view('admin/content/main_page/main_page');
    $this->load->view('admin/footer/footer_main');
    
  }
  
/*========================TRANG THÀNH VIÊN=================================================================*/  
  public function member_page()
  {

    $data['chosed']="member_page";
    $this->load->view('admin/header/header_main',$data);
    $this->load->view('admin/taskbar_top/taskbar_top');
    $this->load->view('admin/menu/menu_main',$data);
    
     //danh sách tất cả các thành viên
     $json_all_user = $this->user_apis->get_all_user(Restaurantenum::LIMIT_PAGE_USER_ALL,1);
     $data['all_user']=$json_all_user["Results"];
    
    $this->load->view('admin/content/member_page/member_page',$data);
    $this->load->view('admin/footer/footer_main');
    
  }
    //trang thêm thành viên mới
 public function create_new_member()
  {
   
    $data['chosed']="member_page";
    $this->load->view('admin/header/header_main',$data);
    $this->load->view('admin/taskbar_top/taskbar_top');
    $this->load->view('admin/menu/menu_main',$data);
    
    
    //link image upload temp
     $data['BASE_IMAGE_UPLOAD_TEMP_URL']=  Api_link_enum::$BASE_IMAGE_UPLOAD_TEMP_URL;
   //call php upload image temp
     $data['BASE_CALL_UPLOAD_IMAGE_TEMP_URL']=  Api_link_enum::$BASE_CALL_UPLOAD_IMAGE_TEMP_URL;
    
     
     
     //danh sách tất cả các role
     $json_all_role = $this->user_apis->get_all_role();
     $data['all_role']=$json_all_role["Results"];
     //var_dump( $data['all_role']);
     
     $this->load->view('admin/content/member_page/create_new_member',$data);
     $this->load->view('admin/footer/footer_main');
    
  }  
  
   //thêm thành viên
  public function create_new_member_post()
  {
   
    //echo "hello add";
    $avatar        =$_POST['avatar'];
    $full_name     =$_POST['full_name'];
    $address       =$_POST['address'];
    $email         =$_POST['email'];
    $phone_number  =$_POST['phone_number'];
    $introduce     =$_POST['introduce'];
    $password      =$_POST['password'];
    $password=  md5($password);
    $role_list=$_POST['role'];
    $role_list=  trim($role_list);
    
   // echo $password;
    
    //add new member
    $action="insert";
    $result=$this->user_apis->update_user(
            $action,
            null,
            $full_name,
            $email,
            $password,
            $phone_number,
            $address,
            null,
            $avatar,
            $introduce,
            null,
            null,
            $role_list,
            null,
            null
            
            
            );
           // var_dump($result);
    
  } 
  //edit member
  public function edit_member_post()
  {
   
    //echo "hello add";
    $avatar        =$_POST['avatar'];
    $full_name     =$_POST['full_name'];
    $address       =$_POST['address'];
    $email         =$_POST['email'];
    $phone_number  =$_POST['phone_number'];
    $introduce     =$_POST['introduce'];
    $password      =$_POST['password'];
    $password=  md5($password);
    $role_list=$_POST['role'];
    $role_list=  trim($role_list);
    $id= $_POST['id'];
    $action="edit";
    
  
    
    $this->user_apis->update_user(
            $action,
            $id,
            $full_name,
            $email,
            $password,
            $phone_number,
            $address,
            null,
            $avatar,
            $introduce,
            null,
            null,
            $role_list,
            null,
            null
            
            
            );
    
    
  } 
   public function view_edit_user()
  {
   
    $data['chosed']="member_page";
    $this->load->view('admin/header/header_main',$data);
    $this->load->view('admin/taskbar_top/taskbar_top');
    $this->load->view('admin/menu/menu_main',$data);
    $id=$_GET['param_id'];
    //chi tiết 1 thành viên
     $json_detail_user = $this->user_apis->get_user_by_id($id);
     $data['detail_user']=$json_detail_user["Results"];
    
    //link image upload temp
     $data['BASE_IMAGE_UPLOAD_TEMP_URL']=  Api_link_enum::$BASE_IMAGE_UPLOAD_TEMP_URL;
   //call php upload image temp
     $data['BASE_CALL_UPLOAD_IMAGE_TEMP_URL']=  Api_link_enum::$BASE_CALL_UPLOAD_IMAGE_TEMP_URL; 
     
    $data['BASE_IMAGE_USER_PROFILE_URL']=Api_link_enum::$BASE_IMAGE_USER_PROFILE_URL;
    
    
     //danh sách tất cả các role

     $json_all_role = $this->user_apis->get_all_role();
     $data['all_role']=$json_all_role["Results"];
    
    $this->load->view('admin/content/member_page/view_user',$data);
    
    $this->load->view('admin/footer/footer_main');
    
  } 
   public function delete_user()
  {
   
    $data['chosed']="member_page";
    $this->load->view('admin/header/header_main',$data);
    $this->load->view('admin/taskbar_top/taskbar_top');
    $this->load->view('admin/menu/menu_main',$data);
    $id=$_GET['param_id'];
    
    //xoa
    $action="delete";
    
    $this->user_apis->update_user(
            $action,
            $id,
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            null);
    
     
    
    
     //danh sách tất cả các thành viên
     $json_all_user = $this->user_apis->get_all_user(Restaurantenum::LIMIT_PAGE_USER_ALL,1);
     $data['all_user']=$json_all_user["Results"];
     //var_dump( $data['all_user']);
     
      $this->load->view('admin/content/member_page/member_page',$data);

      $this->load->view('admin/footer/footer_main');
    
  } 
  
  
  
/*========================TRANG NGƯỜI DÙNG=================================================================*/  
  public function user_page()
  {
    
    $data['chosed']="user_page";
    $this->load->view('admin/header/header_main',$data);
    $this->load->view('admin/taskbar_top/taskbar_top');
    $this->load->view('admin/menu/menu_main',$data);
    //$this->load->view('admin/content/main_page/member_page');
    $this->load->view('admin/footer/footer_main');
    
  }
  
/*========================TRANG NHÀ HÀNG=================================================================*/  
  public function restaurant_page()
  {
    //danh sách tất cả các nhà hàng
     $json_all_restaurant = $this->restaurant_apis->get_all_restaurant(Restaurantenum::LIMIT_PAGE_RESTAURANT_ALL,1);
     $data['all_restaurant']=$json_all_restaurant["Results"];
    
    $data['chosed']="restaurant_page";
    $this->load->view('admin/header/header_main',$data);
    $this->load->view('admin/taskbar_top/taskbar_top');
    $this->load->view('admin/menu/menu_main',$data);
    
    $this->load->view('admin/content/restaurant_page/restaurant_page');
    $this->load->view('admin/footer/footer_main');
    
  }  
  
   public function delete_restaurant()
  {
     
    $id=$_GET['id_restaurant'];
    $action="delete";
    $this->restaurant_apis->update_restaurant(
              $action,$id,
              null,null, null, null,null,null,null, null,null, null, null,
              null,null, null,null,null, null,null,null,null,null,null, null,
              null,null,null,null,null,null,null);
     
    //danh sách tất cả các nhà hàng
     $json_all_restaurant = $this->restaurant_apis->get_all_restaurant(Restaurantenum::LIMIT_PAGE_RESTAURANT_ALL,1);
     $data['all_restaurant']=$json_all_restaurant["Results"];
    
    $data['chosed']="restaurant_page";
    $this->load->view('admin/header/header_main',$data);
    $this->load->view('admin/taskbar_top/taskbar_top');
    $this->load->view('admin/menu/menu_main',$data);
    
    $this->load->view('admin/content/restaurant_page/restaurant_page');
    $this->load->view('admin/footer/footer_main');
    
  }  
  
  
  
  
  
  
    //trang thêm nhà hàng mới
 public function form_create_new_restaurant()
  {
    //link image upload temp
     $data['BASE_IMAGE_UPLOAD_TEMP_URL']=  Api_link_enum::$BASE_IMAGE_UPLOAD_TEMP_URL;
   //call php upload image temp
     $data['BASE_CALL_UPLOAD_IMAGE_TEMP_URL']=  Api_link_enum::$BASE_CALL_UPLOAD_IMAGE_TEMP_URL;
     $data['INSERT_RESTAURANT_URL']=  Api_link_enum::$INSERT_RESTAURANT_URL;
     
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
     
     
      $data['chosed']="restaurant_page";
      $this->load->helper('url');
      $this->load->view('admin/header/header_main',$data);
      $this->load->view('admin/taskbar_top/taskbar_top');
      $this->load->view('admin/menu/menu_main',$data);
    
    
    
    
    
    
    $this->load->view('admin/content/restaurant_page/create_new_restaurant',$data);
    
    $this->load->view('admin/footer/footer_main');
    
  }  
  public function create_new_restaurant()
  {   $action                  ="insert";
      $dish_list               =$_POST['dish_list'];          
      $name                    =$_POST['name'];
      $address                 =$_POST['address'];
      $city                    =$_POST['city'];
      $district                =$_POST['district'];
      $array_image             =$_POST['array_image'];
      $link_to                 =$_POST['link_to'];
      $phone_number            =$_POST['phone_number'];
      $working_time            =$_POST['working_time'];
      $status_active           =$_POST['status_active'];
      $favourite_list          =$_POST['favourite_list'];
      $price_person_list       =$_POST['price_person_list'];
      $culinary_style_list     =$_POST['culinary_style_list'];
      $mode_use_list           =$_POST['mode_use_list'];
      $payment_type_list       =$_POST['payment_type_list'];
      $landscape_list          =$_POST['landscape_list'];
      $other_criteria_list     =$_POST['other_criteria_list'];
      $introduce               =$_POST['introduce'];
      $start_date              =$_POST['start_date'];
      $end_date                =$_POST['end_date'];
      $folder_name             =$_POST['folder_name'];
      $email                   =$_POST['email'];
      $desc                    =$_POST['desc'];
      $approval_show_carousel  =$_POST['approval_show_carousel'];
      
      
     $result= $this->restaurant_apis->update_restaurant(
              $action,
              null,
              null,
              null,
              $name,
              $folder_name,
              $email,
              $desc,
              $approval_show_carousel,
              $address,
              $city,
              $district,
              $link_to,
              $phone_number,
              $working_time,
              $status_active,
              $dish_list,
              $favourite_list,
              $price_person_list,
              $culinary_style_list,
              $mode_use_list,
              $payment_type_list,
              $landscape_list,
              $other_criteria_list,
              $introduce,
              null,
              $start_date,
              $end_date,
              null,
              $array_image,
              null,
              null
              );
              //var_dump($result['Status']);
     echo $dish_list;
  }
  
  
  //sửa nhà hàng
  public function edit_restaurant_page()
  {
    
      //id nhà hàng
      $id_restaurant=$_GET['id_restaurant'];
    //  var_dump($link_detail_restaurant);
      $json_detail_restaurant = $this->restaurant_apis->get_restaurant_by_id($id_restaurant);
      $data['info_restaurant']=$json_detail_restaurant["Results"];
    
    
    
     //link image upload temp
     $data['BASE_IMAGE_UPLOAD_TEMP_URL']=  Api_link_enum::$BASE_IMAGE_UPLOAD_TEMP_URL;
   //call php upload image temp
     $data['BASE_CALL_UPLOAD_IMAGE_TEMP_URL']=  Api_link_enum::$BASE_CALL_UPLOAD_IMAGE_TEMP_URL;
     $data['link_restaurant_frofile']=  Api_link_enum::$BASE_PROFILE_RESTAURANT_URL;
     
     
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
     
     
    
      $data['chosed']="restaurant_page";
      $this->load->view('admin/header/header_main',$data);
      $this->load->view('admin/taskbar_top/taskbar_top');
      $this->load->view('admin/menu/menu_main',$data);

      $this->load->view('admin/content/restaurant_page/edit_restaurant_page');
      $this->load->view('admin/footer/footer_main');
    
  }  
  
  public function update_restaurant()
  {
    
    $id_restaurant              =$_POST['id_restaurant'];
    $dish_list                  =$_POST['dish_list'];
    $id_menu_dish               =$_POST['id_menu_dish']; 
    $name                       =$_POST['name'];
    $address                    =$_POST['address'];
    $city                       =$_POST['city'];
    $district                   =$_POST['district'];
    $array_image                =$_POST['array_image'];
    $link_to                    =$_POST['link_to'];
    $phone_number               =$_POST['phone_number'];
    $working_time               =$_POST['working_time'];
    $status_active              =$_POST['status_active'];
    $favourite_list             =$_POST['favourite_list'];
    $price_person_list          =$_POST['price_person_list'];
    $culinary_style_list        =$_POST['culinary_style_list'];
    $mode_use_list              =$_POST['mode_use_list'];
    $payment_type_list          =$_POST['payment_type_list'];
    $landscape_list             =$_POST['landscape_list'];
    $other_criteria_list        =$_POST['other_criteria_list'];
    $introduce                  =$_POST['introduce'];
    $start_date                 =$_POST['start_date'];
    $end_date                   =$_POST['end_date'];
    $folder_name                =$_POST['folder_name'];
    $email                      =$_POST['email'];
    $desc                       =$_POST['desc'];
    $approval_show_carousel     =$_POST['approval_show_carousel'];

    $action="edit";
    
    
    $this->restaurant_apis->update_restaurant(
              $action,
              $id_restaurant,
              $id_menu_dish,
              null,
              $name,
              $folder_name,
              $email,
              $desc,
              $approval_show_carousel,
              $address,
              $city,
              $district,
              $link_to,
              $phone_number,
              $working_time,
              $status_active,
              $dish_list,
              $favourite_list,
              $price_person_list,
              $culinary_style_list,
              $mode_use_list,
              $payment_type_list,
              $landscape_list,
              $other_criteria_list,
              $introduce,
              null,
              $start_date,
              $end_date,
              null,
              $array_image,
              null,
              null
              );
    
    
  }
  
  
  
  
  
  
/*========================TRANG KHUYẾN MÃI=================================================================*/  
  
public function coupon_restaurant_list(){
  
  
}

public function coupon_page()
  {
    
    //danh sách tất cả các nhà hàng
     $json_all_restaurant = $this->restaurant_apis->get_all_restaurant(Restaurantenum::LIMIT_PAGE_RESTAURANT_ALL,1);
     $data['all_restaurant']=$json_all_restaurant["Results"];
      $data['chosed']="coupon_page";
      $this->load->view('admin/header/header_main',$data);
      $this->load->view('admin/taskbar_top/taskbar_top');
      $this->load->view('admin/menu/menu_main',$data);
    
      $this->load->view('admin/content/coupon_page/coupon_page');
      $this->load->view('admin/footer/footer_main');
    
    
    
  }  
  public function form_add_coupon()
  {
      $data['id_res']=$_GET['id_restaurant'];
      $data['name_res']=$_GET['name_res'];
      
      $data['chosed']="coupon_page";
      $this->load->view('admin/header/header_main',$data);
      $this->load->view('admin/taskbar_top/taskbar_top');
      $this->load->view('admin/menu/menu_main',$data);
      
      //danh sách tất cả các nhà hàng
      $json_coupon_of_restaurant = $this->restaurant_apis->get_coupon_of_restaurant($data['id_res']);
      $data['coupon_of_restaurant']=$json_coupon_of_restaurant["Results"];
      $this->load->view('admin/content/coupon_page/add_coupon',$data);
      $this->load->view('admin/footer/footer_main');
    
    
    
  }  
 public function add_coupon()
  {
    $id_restaurant           =$_POST['id_restaurant'];
    $value_coupon            =$_POST['value_coupon'];
    $date_coupon_start       =$_POST['date_coupon_start'];
    $date_coupon_end         =$_POST['date_coupon_end'];
    $description             =trim($_POST['description']);
    $is_use                  =$_POST['is_use'];
    
    $action="insert";

   
   $result=$this->restaurant_apis->update_coupon(  $action, null,
                                            $id_restaurant,
                                            $value_coupon,
                                            $date_coupon_start,
                                            $date_coupon_end,
                                            $description,
                                            $is_use
                                          );
  }  
  
   public function delete_coupon_of_restaurant()
  {
     $id=$_POST['id_coupon'];
    $action="delete";
    $this->restaurant_apis->update_coupon($action,$id);
  }  
   public function edit_coupon()
    {
              $id                       =$_POST['id_coupon'];
              $id_restaurant           =$_POST['id_restaurant'];
              $value_coupon            =$_POST['value_coupon'];
              $date_coupon_start       =$_POST['date_coupon_start'];
              $date_coupon_end         =$_POST['date_coupon_end'];
              $description             =trim($_POST['description']);
              $is_use                  =$_POST['is_use'];
              $action="edit";
              
            
              
              $result=$this->restaurant_apis->update_coupon(  $action, $id,
                                            $id_restaurant,
                                            $value_coupon,
                                            $date_coupon_start,
                                            $date_coupon_end,
                                            $description,
                                            $is_use
                                          );
    
              
      
    }
    public function form_edit_coupon_of_restaurant()
      {
      $id=$_POST['id_coupon'];
      $json_get_info_coupon = $this->restaurant_apis->get_coupon_of_restaurant_by_id($id);
      $data['info_coupon']=$json_get_info_coupon["Results"];
      if(is_array($data['info_coupon'])&&sizeof($data['info_coupon'])>0){
           foreach ($data['info_coupon'] as $value) {             
              $id                =$value['id'];
              $id_restaurant     =$value['id_restaurant'];
              $value_coupon      =$value['value_coupon'];
              $coupon_start_date =$value['coupon_start_date'];
              $coupon_due_date   =$value['coupon_due_date'];
              $coupon_desc       =trim($value['coupon_desc']);
              $updated_date      =$value['updated_date'];  
              $is_use=$value['is_use'];
              
              $input_status="";
              if(strcmp($is_use,'1')==0){
                $input_status="checked";
              }
              
              
          echo '<div class="remove_edit_coupon">
          <input type="hidden" value="'.$id.'" id="param_id_coupon">
          <input type="hidden" value="'.$id_restaurant.'" id="param_id_restaurant_edit" >
            

          <input type="hidden" value="'.$is_use.'" id="param_status_checked_edit" >
          <div id="create_new_coupon" style="width: 90%;" >
            <div id="content_create_new_coupon" style="margin-left: 5%; margin-top: -1%; width: 100%;">
                  <div class="coupon_info_title">
                    <span>Thông tin khuyến mãi</span>
                  </div>

                  <div class="box_input">
                    <div class="name_profile" style="width: 30%;">
                       <span>GIÁ TRỊ KHUYẾN MÃI (%)*</span><br>
                       <input id="param_value_coupon_edit" class="input_text" type="text" placeholder="vd. 50" name="" value="'.$value_coupon.'" >
                    </div>
                    <div class="job_profile" style="width: 30%;">
                       <span>THỜI GIAN BẮT ĐẦU*</span><br>
                        <div class="date_time_picker">
                           <div>
                              <input value="'.$coupon_start_date.'" id="param_date_coupon_start_edit" class="input_text" type="text" placeholder="vd. 1/1/2014" name="">
                           </div>					
                          <script defer="true">
                           $(\'#param_date_coupon_start_edit\').datetimepicker({
                                 timeFormat: "hh:mm:00",
                                 dateFormat: "dd-mm-yy"
                           });
                           </script>
                         </div>
                    </div>
                    <div class="phone_number_profile" style="width: 30%;">
                       <span>THỜI GIAN KẾT THÚC*</span><br>
                       <div class="date_time_picker">
                         <div>
                             <input value="'.$coupon_due_date.'" id="param_date_coupon_end_edit" class="input_text" type="text" placeholder="vd. 30/12/2014" name="">
                         </div>					
                         <script defer="true">
                         $(\'#param_date_coupon_end_edit\').datetimepicker({

                             timeFormat: "hh:mm:00",
                             dateFormat: "dd-mm-yy"
                         });
                         </script>
                       </div>


                    </div>

                    <div class="line_title"></div></br>
                    <div class="introduce_coupon_profile"  >
                       <span>MÔ TẢ THÔNG TIN KHUYẾN MÃI</span><br>
                       <textarea id="param_description_edit" class="input_textarea" name="">
                          '.$coupon_desc.'
                        </textarea>
                    </div>
                    <div class="introduce_coupon_profile" >
                      <input '.$input_status.' type="checkbox" id="param_check_show_coupon_edit"> <span>Hiện thông tin khuyến mãi trên trang home</span>
                    </div>



                    <div class="btn_save_cancel">
                      <a href="javascript:;" onclick="return submit_save_info_coupon_edit()">
                       <div class="btn_save">
                         <lable><div class="center_text">Lưu</div></lable>
                       </div>
                      </a>
                      <a href="javascript:;" onclick="return submit_cancle_edit()">
                       <div class="btn_cancel">
                         <lable><div class="center_text">Hủy</div></lable>
                       </div>
                      </a>
                    </div>
             </div>
          </div>
        </div>
        <script>
          function submit_cancle_edit(){
           $( ".dialog_edit_coupon" ).dialog( "close" ); 
          }
           $(\'#param_check_show_coupon_edit\').click(function (){
            var test=$(\'#param_status_checked_edit\').val();

            if(parseInt(test)==0){
              $(\'#param_status_checked_edit\').val(\'1\');
            }
            if(parseInt(test)==1){
              $(\'#param_status_checked_edit\').val(\'0\');
            }

          });

          function submit_save_info_coupon_edit(){
             var param_id_restaurant=$(\'#param_id_restaurant_edit\').val();
             var param_value_coupon=$(\'#param_value_coupon_edit\').val();
             var param_date_coupon_start=$(\'#param_date_coupon_start_edit\').val();
             var param_date_coupon_end=$(\'#param_date_coupon_end_edit\').val();
             var param_description=$(\'#param_description_edit\').val();
             var param_check_show_coupon=$(\'#param_status_checked_edit\').val();
             var param_id_coupon=$("#param_id_coupon").val();

             var url=$("#hidUrl").val();
             var url_api=url+"index.php/admin/admin_controller/edit_coupon";
             var data={
                      id_coupon: param_id_coupon,
                      id_restaurant:  param_id_restaurant,
                      value_coupon:  param_value_coupon,
                      date_coupon_start:  param_date_coupon_start,
                      date_coupon_end:  param_date_coupon_end,
                      description:  param_description,
                      is_use:param_check_show_coupon
                  }

             $.ajax({
                  url: url_api ,
                  type: \'POST\',
                  data:data,
                  success: function(data){
                     location.reload();
                    // alert(data);
                  },

                 //timeout:5000,
                 error: function(a,textStatus,b){
                   alert(\'khong thanh cong\');
                 }
               });
          }
        </script>
       </div>';
              
              
              
           }
      }
      
   
  
    
  }  
  
  
  
  
  
  
  
/*========================TRANG BÀI VIẾT=================================================================*/  
  public function form_add_post()
  {
    
    
    
     //link image upload temp
     $data['BASE_IMAGE_UPLOAD_TEMP_URL']=  Api_link_enum::$BASE_IMAGE_UPLOAD_TEMP_URL;
     //call php upload image temp
     $data['BASE_CALL_UPLOAD_IMAGE_TEMP_URL']=  Api_link_enum::$BASE_CALL_UPLOAD_IMAGE_TEMP_URL;
     $data['INSERT_POST_URL']=  Api_link_enum::$INSERT_POST_URL;
    
   //nhu cầu
     $json_favourite_list = $this->common_apis->get_base_collection(Api_link_enum::COLLECTION_FAVOURITE);
     $data['favourite_list']=$json_favourite_list["Results"]; 
    
    //giá trung bình người
    
     $json_price_person_list = $this->common_apis->get_base_collection( Api_link_enum::COLLECTION_PRICE_PERSION);
     $data['price_persion']=$json_price_person_list["Results"];
     
   //danh sách phong cách ẩm thực
     $json_culinary_style = $this->common_apis->get_base_collection(Api_link_enum::COLLECTION_CULINARY_STYLE);
     $data['culinary_style']=$json_culinary_style["Results"];
    
    
    
    
    
    $data['chosed']="post_page";
    $this->load->view('admin/header/header_main',$data);
    $this->load->view('admin/taskbar_top/taskbar_top');
    $this->load->view('admin/menu/menu_main',$data);
    $this->load->view('admin/content/post_page/post_page');
    $this->load->view('admin/footer/footer_main');
    
  } 
  public function add_post()
  {
                  $title                 =$_POST['title'];
                  $address               =$_POST['address'];
                  $favourite_type_list   =$_POST['favourite_type_list'];
                  $price_person_list     =$_POST['price_person_list'];
                  $culinary_style_list   =$_POST['culinary_style_list'];
                  $id_user               =$_POST['id_user'];
                  $content               =$_POST['content'];
                  $array_image           =$_POST['array_image'];
                  $action="insert";
                  
                  $this->restaurant_apis->update_post(
                                      $action,
                                      null,
                                      $id_user,
                                      $title,
                                      $address,
                                      $favourite_type_list,
                                      $price_person_list,
                                      $culinary_style_list,
                                      null,
                                      $content,
                                      $array_image                               
                          
                                );
    
  }
  
  
  
  
  
/*========================TRANG TÙY CHỈNH=================================================================*/  
  public function custom_page()
  {

    $data['chosed']="custom_page";
    $this->load->view('admin/header/header_main',$data);
    $this->load->view('admin/taskbar_top/taskbar_top');
    $this->load->view('admin/menu/menu_main',$data);
    $this->load->view('admin/content/custom_page/custom_page');
    $this->load->view('admin/footer/footer_main');
    
  } 
  
   public function custom_number_view_restaurant()
  {
      $data['chosed']="custom_page";
      $this->load->view('admin/header/header_main',$data);
      $this->load->view('admin/taskbar_top/taskbar_top');
      $this->load->view('admin/menu/menu_main',$data);

       //danh sách tất cả các thành viên
     //  $json_all_user = $this->user_apis->get_all_user(Restaurantenum::LIMIT_PAGE_USER_ALL,1);
     //  $data['all_user']=$json_all_user["Results"];

      $this->load->view('admin/content/custom_page/custom_number_view_restaurant',$data);
      $this->load->view('admin/footer/footer_main');
    
    
  } 
  
  
  
}