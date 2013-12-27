<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH.'/models/api_link_enum.php';

class Home_controller extends CI_Controller {
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
  public function test_sess(){
    
     /* $id_user   = $this->session->userdata('id_user');
      $full_name = $this->session->userdata('full_name');
      $avatar = $this->session->userdata('avatar');
      echo $id_user." ".$full_name." ".$avatar;
    
      */
     // $info_user   = $this->session->userdata('info_user');
     // var_dump($info_user);
  }
  public function index()
	{
    
    $this->load->view('home/header/header_home_page');
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
    
    
  /*=================CAROUSEL========================================================================================*/
    
    $json_carousel_list = $this->restaurant_apis->get_all_restaurant_approval_show_carousel(20,1);
    $data['carousel_list']=$json_carousel_list["Results"];
    $data['link_restaurant_frofile']=  Api_link_enum::$BASE_PROFILE_RESTAURANT_URL;
    if($data['carousel_list']!=NULL){
      $this->load->view('home/content/carousel',$data);
      $this->load->view('home/content/sub_banner');
      $this->load->view('home/content/sub_banner_more');  
    }
  /*=================END_CAROUSEL=======================================================================================*/    
    
     
    
  /*==================================RESTAURANT_LIST===========================================================  */ 
     /*-----------------------------------------------------
            Purpose: Get API new restaurant list 
            Author: Vinh Phu
            Version: 28/10/2013
     -------------------------------------------------------*/       
    $json_newest_res = $this->restaurant_apis->get_newest_restaurant_list(Restaurantenum::LIMIT_PAGE_NEWEST_RESTAURANT,1);
    $data['newest_restaurant']=$json_newest_res["Results"];
    
   
    /*end get orther restaurant json */
    /*-----------------------------------------------------
            Purpose: Get API orther restaurant list 
            Author: Vinh Phu
            Version: 28/10/2013
     -------------------------------------------------------*/    
    $json_orther_res = $this->restaurant_apis->get_orther_restaurant_list(Restaurantenum::LIMIT_PAGE_ORTHER_RESTAURANT,1);
    $data['orther_restaurant']=$json_orther_res["Results"];
    //var_dump( $data['orther_restaurant']);
    /*end get orther restaurant json */
  
    $this->load->view('home/content/restaurant_list',$data);
    ///$this->load->view('templates/content/restaurant_list');
    $this->load->view('home/content/restaurant_list_title_newest');
    $this->load->view('home/content/restaurant_list_content_newest',$data);    
   // $this->load->view('templates/content/append_restaurant_newest_List',$data);
    $this->load->view('home/content/restaurant_list_title_orther');
    $this->load->view('home/content/restaurant_list_content_orther');

  /*========================================END_RESTAURANT_LIST====================================================*/
    
  /*========================================PROMOTION==================================================================*/    
    $json_promotion_list = $this->restaurant_apis->get_restaurant_coupon_list(Restaurantenum::LIMIT_PAGE_PROMOTION,1);
    $data['promotion_list']=$json_promotion_list["Results"]; 
   // var_dump($data['promotion_list']);
  
    $this->load->view('home/content/promotion',$data);
  /*=======================================END PROMOTION==============================================================================*/    
    
/*==================Danh Sách bài viết hay POST=============================================================================================================*/   
    $json_post = $this->restaurant_apis->get_all_post(Restaurantenum::LIMIT_PAGE_POST,1);
    $data['articles_list']=$json_post["Results"]; 
    $data['link_image_post_url']=  Api_link_enum::$BASE_IMAGE_POST_URL;
      $this->load->view('home/content/articles',$data);
      $this->load->view('home/content/dang_ky_nhan_uu_dai');
      $this->load->view('home/content/footer_content',$data);
      $this->load->view('home/footer/footer_home_page');
   
/*=================end Danh Sách bài viết hay POST ===============================================================================================================*/
/*===============add post======================================================================*/
   // $this->load->view('templates/content/upload');
/*===============end upload post======================================================================*/
    
    
    
	}
  
  
  public function sign_up()
	{
    $info_user=$this->info_user;
    if(!is_array($info_user)){            
        $this->load->view('home/header/header_signup_login');
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

        $this->load->view('home/content/form_sign_up');
        $this->load->view('home/content/footer_content');
        $this->load->view('home/footer/footer_signup_login');
    }
    else{
      $url=  base_url();
      $page = $_SERVER['PHP_SELF'];
      $sec = "0";
      header("Refresh: $sec; url=$url");
    }
    
	}
    public function log_in()
	{ $info_user=$this->info_user;
    if(!is_array($info_user)){  
        $this->load->view('home/header/header_signup_login');
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
        $this->load->view('home/content/form_log_in');
        $this->load->view('home/content/footer_content');
        $this->load->view('home/footer/footer_signup_login');
    }
    else{
      $url=  base_url();
      $page = $_SERVER['PHP_SELF'];
      $sec = "0";
      header("Refresh: $sec; url=$url");
    }
	}
  public function detail_restaurant(){
    $this->load->view('home/header/header_detail_restaurant');
    $this->load->view('home/menu/menu');
    
    /*detail_restaurant*/
    $this->load->view('home/detail_restaurant/header');
   // $this->load->view('templates/detail_restaurant/slide_show_detail_restaurant');
    $this->load->view('home/detail_restaurant/detail_content_restaurant');
    
    $this->load->view('home/detail_restaurant/footer');
    
    
    /*end detail_restaurant*/
    
    
    $this->load->view('home/content/footer_content');   
    $this->load->view('home/footer/footer_detail_restaurant');
  }
  
  public function more_Newest_Restaurant(){
    $page=$_POST['page'];
    $json_newest_res = $this->restaurant_apis->get_newest_restaurant_list(Restaurantenum::LIMIT_PAGE_NEWEST_RESTAURANT,$page);
    $data['newest_restaurant']=$json_newest_res["Results"];
    $url=  base_url();
    $url_res_frofile=Api_link_enum::$BASE_PROFILE_RESTAURANT_URL;
     foreach($data['newest_restaurant'] as $value_res_newest){
            
             $avatar=$value_res_newest['avatar'];             
             $id=$value_res_newest['id'];
             $name=$value_res_newest['name'];
             
             $desc=$value_res_newest['desc'];
             $desc=substr($desc,0,120) . '...';
             
             $address=$value_res_newest['address'];
             $number_assessment=$value_res_newest['number_assessment'];
             $number_like=$value_res_newest['number_like'];
             $rate_point=$value_res_newest['rate_point'];
             
            
              echo'
               <li >            
                <div class="detail_box">
                           <div class="img_item">
                             <a href="'.$url.'/index.php/detail_restaurant/detail_restaurant?id_restaurant='.$id.'">
                                 <img style="width=40px; height=40px;" class="big" src="'.$url_res_frofile.$avatar.'" >
                             </a>
                             <div id="remove_comment_like_animate" class="">
                                <a href="'.$url.'/index.php/detail_restaurant/detail_restaurant?id_restaurant='.$id.'&comment_res=true">
                                  <div class ="image_bg_comment_animate">
                                      <div class ="image_comment_animate">
                                      </div>
                                  </div>
                                </a>
                                <a href="javascript:;" onclick="return click_like(this)">
                                 <input type="hidden" value="'.$id.'" id="id_restaurant_like">
                                  <div class ="image_bg_like_animate">
                                      <div class ="image_like_animate">
                                      </div>
                                  </div>
                                </a>
                             </div>
                            </div>';
                      echo'<div class="introduce_restaurant">
                             <span>
                              '.$desc.'
                             </span>     
                          </div>';
                           echo' 
                           <div class="info_restaurant"> ';
                              //vote
                                echo'<div class="vote">';

                                $stt_off=5-round($rate_point/2);
                                $stt_on= round($rate_point/2);
                                while ($stt_on!=0){
                                  echo '<span class="star_on"></span>';
                                    $stt_on--;
                                }

                                while ($stt_off!=0){        
                                         echo'<span class="star_off"></span>';
                                         $stt_off--;
                                }
                                echo'   </div>';
                              
                              //like comment
                              echo'<div class="like_comment">
                                 <div class="comment">
                                    <span class=image_comment></span>
                                    <span class="text">'.$number_assessment.'</span>
                                 </div>
                                 <div class="like">
                                    <span class="image_like"></span>
                                    <span class="text" id="text_like">'.$number_like.'</span>
                                 </div>
                                </div>';
                              //line
                              echo'<div class="line"></div>';
                              
                               //iamges avatar restaurant
                              echo '<div class="avartar_restaurant">
                                      <a href="#">
                                          <img src="'.$url_res_frofile.$avatar.'" title="Sweet cherry cafe" alt="Sweet cherry cafe" >
                                      </a>                            
                                    </div>';
                                //name
                                echo'
                                  <div class="title_address">
                                     <div class="title">
                                      <a href="#"><span>'.$name.'</span></a>
                                     </div>';
                                //address   
                                echo'<div class="address">'.
                                         $address
                                     .'</div>                                       
                                  </div>
                                  
                             </div>
                          </div>  
              </li>
              ';
            
             
           }                 
    
    
  }
    public function more_Orther_Restaurant(){
    $page=$_POST['page_orther'];
    $json_orther_res = $this->restaurant_apis->get_orther_restaurant_list(Restaurantenum::LIMIT_PAGE_ORTHER_RESTAURANT,$page);
    $data['orther_restaurant']=$json_orther_res["Results"];
    $url=  base_url();
    $url_res_frofile=Api_link_enum::$BASE_PROFILE_RESTAURANT_URL;
     foreach($data['orther_restaurant'] as $value_res_orther){
            
             $avatar=$value_res_orther['avatar'];             
             $id=$value_res_orther['id'];
             $name=$value_res_orther['name'];
             
             $desc=$value_res_orther['desc'];
             $desc=substr($desc,0,120) . '...';
             
             $address=$value_res_orther['address'];
             $number_assessment=$value_res_orther['number_assessment'];
             $number_like=$value_res_orther['number_like'];
             $rate_point=$value_res_orther['rate_point'];
             
            
              echo'
               <li >            
                <div class="detail_box">
                           <div class="img_item">
                             <a href="'.$url.'/index.php/detail_restaurant/detail_restaurant?id_restaurant='.$id.'">
                                 <img style="width=40px; height=40px;" class="big" src="'.$url_res_frofile.$avatar.'" >
                             </a>
                             <div id="remove_comment_like_animate" class="">
                                <a href="'.$url.'/index.php/detail_restaurant/detail_restaurant?id_restaurant='.$id.'&comment_res=true">
                                  <div class ="image_bg_comment_animate">
                                      <div class ="image_comment_animate">
                                      </div>
                                  </div>
                                </a>
                                <a href="javascript:;" onclick="return click_like(this)">
                                 <input type="hidden" value="'.$id.'" id="id_restaurant_like">
                                  <div class ="image_bg_like_animate">
                                      <div class ="image_like_animate">
                                      </div>
                                  </div>
                                </a>
                             </div>
                            </div>';
                      echo'<div class="introduce_restaurant">
                             <span>
                              '.$desc.'
                             </span>     
                          </div>';
                           echo' 
                           <div class="info_restaurant"> ';
                              //vote
                                echo'<div class="vote">';

                                $stt_off=5-round($rate_point/2);
                                $stt_on= round($rate_point/2);
                                while ($stt_on!=0){
                                  echo '<span class="star_on"></span>';
                                    $stt_on--;
                                }

                                while ($stt_off!=0){        
                                         echo'<span class="star_off"></span>';
                                         $stt_off--;
                                }
                                echo'   </div>';
                              
                              //like comment
                              echo'<div class="like_comment">
                                 <div class="comment">
                                    <span class=image_comment></span>
                                    <span class="text">'.$number_assessment.'</span>
                                 </div>
                                 <div class="like">
                                    <span class="image_like"></span>
                                    <span class="text" id="text_like">'.$number_like.'</span>
                                 </div>
                                </div>';
                              //line
                              echo'<div class="line"></div>';
                              
                               //iamges avatar restaurant
                              echo '<div class="avartar_restaurant">
                                      <a href="#">
                                          <img src="'.$url_res_frofile.$avatar.'" title="Sweet cherry cafe" alt="Sweet cherry cafe" >
                                      </a>                            
                                    </div>';
                                //name
                                echo'
                                  <div class="title_address">
                                     <div class="title">
                                      <a href="#"><span>'.$name.'</span></a>
                                     </div>';
                                //address   
                                echo'<div class="address">'.
                                         $address
                                     .'</div>                                       
                                  </div>
                                  
                             </div>
                          </div>  
              </li>
              ';
            
             
           }                   
    
    
  }
  
  public function more_Promotion(){
    $page=$_POST['page_promotion'];  
    $json = $this->restaurant_apis->get_restaurant_coupon_list(Restaurantenum::LIMIT_PAGE_PROMOTION,$page);
    $url=  base_url();
    $url_res_frofile=  Api_link_enum::$BASE_PROFILE_RESTAURANT_URL;
    
    $stt_timer=$_POST['stt_timer'];
    $stt_coupon=$_POST['stt_coupon'];
    
  //  $count_coupon=
            
            
            
            
   if(is_array($json['Results'])&&sizeof($json['Results'])>0){ 
    foreach ($json['Results'] as $value_promotion_item1){
      $due_date1=$value_promotion_item1['coupon_due_date']; 
      $due_date1=date("j F, Y H:i:s", strtotime($due_date1)); 

      echo'
      
        <script type="text/javascript">  
            var timer = setInterval(function(){

              var seconds = remaining.getSeconds(\''.$due_date1.'\');

             // var remainingTime = remaining.getString(seconds, null, true);
               var remainingTime = remaining.getString(seconds);
              //var remainingTime = remaining.getStringDigital(seconds);

              if (remainingTime == \'\') {
                $(\'#remaining_'.$stt_timer.'\').html(\'đã hết!\');
                clearInterval(timer);
              } else {
                $(\'#remaining_'.$stt_timer.'\').html(remainingTime);
              }

            }, 100);
          </script>';
      $stt_timer++;

    }
    
    
    
    foreach ($json['Results'] as $value_promotion_item2){
             $avatar=$value_promotion_item2['avatar'];             
             $id=$value_promotion_item2['id'];
             $name=$value_promotion_item2['name'];
             
             $desc=$value_promotion_item2['coupon_desc'];
             $desc=substr($desc,0,120) . '...';
             //$desc="ádad ád ád ád ád ád ád ád ";
             //$desc=word_limiter($desc, 4);

             
             $address=$value_promotion_item2['address'];
             $number_assessment=$value_promotion_item2['number_assessment'];
             $number_like=$value_promotion_item2['number_like'];
             $rate_point=$value_promotion_item2['rate_point'];
             
            
              echo'
               <li >            
                <div class="detail_box">
                           <div class="img_item">
                             <a href="'.$url.'/index.php/detail_restaurant/detail_restaurant?id_restaurant='.$id.'">
                                 <img style="width=40px; height=40px;" class="big" src="'.$url_res_frofile.$avatar.'" >
                             </a>
                            </div>
                            <div id="time_left">
                              <span>thời gian khuyến mãi còn lại
                               <div id="remaining_'.$stt_coupon.'"></div>
                              </span>
                            </div>     
                       ';
                   
                      echo'<div class="introduce_restaurant">
                             <span>
                              '.$desc.'
                             </span>     
                          </div>';
                           echo' 
                           <div class="info_restaurant"> ';
                              
                              //line
                              echo'<div class="line"></div>';
                              
                               //iamges avatar restaurant
                              echo '<div class="avartar_restaurant">
                                      <a href="#">
                                          <img src="'.$url_res_frofile.$avatar.'" title="Sweet cherry cafe" alt="Sweet cherry cafe" >
                                      </a>                            
                                    </div>';
                                //name
                                echo'
                                  <div class="title_address">
                                     <div class="title">
                                      <a href="#"><span>'.$name.'</span></a>
                                     </div>';
                                //address   
                                echo'<div class="address">'.
                                         $address
                                     .'</div>                                       
                                  </div>
                                  
                             </div>
                          </div>  
              </li>
              ';
            $stt_coupon++;
           }
    
        echo '<div id="remove_input_stt">';
          echo '<input  type="hidden" id="stt_timer" value="'.$stt_timer.'">';
          echo '<input type="hidden" id="stt_coupon" value="'.$stt_coupon.'">';
          echo '<input type="hidden" value="'.$page.'" id="number_page_coupon">'; 
        echo '</div>';
       
       
       
       echo' <div id="remove_script_more_coupon_'.$page.'">
        <script>

          $(function(){
            var page_this_coupon = parseInt($(\'#number_page_coupon\').val());
            var page_next_coupon= page_this_coupon; 
            $(\'#btn_More_Coupon\').click(function() {
              page_next_coupon= page_next_coupon+1;
              $("#remove_button_more_coupon").removeClass(\'button_more_noload\');
              $("#remove_button_more_coupon").addClass(\'button_more_loading\');
              var url = $(\'#hidUrl\').val();
              var stt_timer=$("#stt_timer").val();
              var stt_coupon=$("#stt_coupon").val();
              $.post( url + "index.php/home_controller/more_Promotion", 
                       { page_promotion: page_next_coupon,
                         stt_timer: stt_timer,
                         stt_coupon: stt_coupon

                         }, function(data){  
                                         if(data==""){
                                          //alert(\'het\');
                                          $("#more_Coupon").remove();
                                          $("#remove_script_more_coupon_"+page_this_coupon).remove();
                                        }
                                        $(\'.append_coupon_restaurant\').append(data);
                                        $("#remove_button_more_coupon").removeClass(\'button_more_loading\');
                                        $("#remove_button_more_coupon").addClass(\'button_more_noload\');
                                        $(\'#number_page_coupon\').val(page_next_coupon);
                                        $(\'#remove_input_stt\').remove();
                                       // $("#remove_script_more_coupon_"+page_this_coupon).remove();
                                 // document.getElementById("remove_script_more_coupon_"+page_this_coupon).innerHTML="";
                                  document.getElementById("remove_script_more_coupon_"+page_this_coupon).disabled = true;
                                    var nodes = document.getElementById("remove_script_more_coupon_1").getElementsByTagName('*');
                                    for(var i = 0; i < nodes.length; i++){
                                        nodes[i].disabled = true;
                                    }

                       });
            });

          }); 



        </script>   
      
        </div>';
    }
    
  
    
    
    
    
    
    
  }
  
  public function more_Post(){
    $page=$_POST['page_more_post'];  
    $json = $this->restaurant_apis->get_all_post(Restaurantenum::LIMIT_PAGE_POST,$page);
    $data['link_image_post_url']=  Api_link_enum::$BASE_IMAGE_POST_URL;
    $url=  base_url();
    //var_dump($url);
    foreach ($json['Results'] as $articles_list) {
            $id=$articles_list['id'];
            $title=$articles_list['title'];
            $id_user=$articles_list['id_user'];
            $avatar=$articles_list['avatar'];
            $address=$articles_list['address'];
            $content=$articles_list['content'];
            //$number_view=$articles_list['number_view'];
            $number_view=0;
           // $note=$articles_list['note'];
          //  $authors=$articles_list['authors'];
            $created_date=$articles_list['created_date'];
            
            $favourite_type_list=$articles_list['favourite_type_list'];
            $data['link_image_post_url']=  Api_link_enum::$BASE_IMAGE_POST_URL;
            $favourite_type_list=substr($favourite_type_list, 1); 
    
            $price_person_list=$articles_list['price_person_list'];
            $price_person_list=substr($price_person_list, 1); 
            
            $culinary_style=$articles_list['culinary_style_list'];
            $culinary_style=substr($culinary_style, 1); 
//            $culinary_style=substr($culinary_style, 1); 
            $rate_point=5;
            
            
            echo'
                <div class="box_list">
                  <div class="images">
                    <a href="'.$url.'/index.php/detail_post/detail_post?id_post='.$id.'">
                      <div class="detail_image">
                        <img src="'.$data['link_image_post_url'].$avatar.'" >

                      </div>
                    </a>
                  </div>
                  <div class="content">
                    <span class="title">'.$title.'</span> <br>
                    <p>'.$address.'</p>              
                    <b>Mục Đích:</b>&nbsp; '.$favourite_type_list.' <br>
                    <b>Giá trung bình/người:</b>&nbsp; '.$price_person_list.'<br>
                    <b>Phong cách ẩm thực:</b>&nbsp; '.$culinary_style.'<br>
                  </div>
                  <div class="comment">
                      <div class="box_comment">
                        <div class="title">
                          <span>'.$rate_point.'</span>
                        </div>';
            
                         
                          echo'   <div class="vote">';
                          
                          $stt_off=5-$rate_point;
                          $stt_on= $rate_point;
                          while ($stt_on!=0){
                            echo '<span class="star_on"></span>';
                              $stt_on--;
                          }
                         
                          while ($stt_off!=0){        
                                   echo'<span class="star_off"></span>';
                                   $stt_off--;
                          }
                          echo'   </div>'; 

                       
                        

                      echo'<div class="detail">
                         <b>0</b>&nbsp; Bình luận <br>
                         <b>'.$number_view.'</b>&nbsp; Lượt xem
                        </div>
                      </div>
                  </div>
                </div>
            ';
            
       }  
  }
  
  public function form_add_post()
	{
     $this->load->view('home/header/header_add_post');
     //link image upload temp
     $data['BASE_IMAGE_UPLOAD_TEMP_URL']=  Api_link_enum::$BASE_IMAGE_UPLOAD_TEMP_URL;
     //call php upload image temp
     $data['BASE_CALL_UPLOAD_IMAGE_TEMP_URL']=  Api_link_enum::$BASE_CALL_UPLOAD_IMAGE_TEMP_URL;
     $data['INSERT_POST_URL']=  Api_link_enum::$INSERT_POST_URL;
     
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
    
    //lay danh sach price_persion (gia trung binh nguoi)
    $json_price_persion = $this->common_apis->get_base_collection(Api_link_enum::COLLECTION_PRICE_PERSION);
    $data['price_persion']=$json_price_persion["Results"];
     
   //lay danh sach phong cach am thuc culinary_style
     $json_culinary_style = $this->common_apis->get_base_collection(Api_link_enum::COLLECTION_CULINARY_STYLE);
     $data['culinary_style']=$json_culinary_style["Results"];
    
    
    $this->load->view('home/content/add_post',$data);
    
    
    $this->load->view('home/content/footer_content');
    $this->load->view('home/footer/footer_add_post');
   // $this->load->view('templates/content/ckeditor');
	}
  
  public function add_post()
  {
  }
  //like restaurant
  public function like_res()
  {
    $id_restaurant=$_POST['id_restaurant'];
    $id_user=$_POST['id_user'];
    
    //echo $id_restaurant." ".$id_user;
    $results=$this->user_apis->like_restaurant($id_user,$id_restaurant);
    
    echo $results['Status'];
    
    
  }
    public function assessment_res()
  {
      
      $avatar_user     =$_POST['avatar'];
      $full_name     =$_POST['full_name'];
      
      $rate1           =$_POST['rate1'];
      $rate2           =$_POST['rate2'];
      $rate3           =$_POST['rate3'];
      $rate4           =$_POST['rate4'];
      $content         =$_POST['content'];
      $id_restaurant   =$_POST['id_restaurant'];
      $id_user         =$_POST['id_user'];
      $acction="insert";
      
    $results=$this->restaurant_apis->update_assessment(
            $acction,
            null,
            $id_user,
            $id_restaurant,
            $content,
            $rate1,
            $rate2,
            $rate4,
            $rate3,
            "Y",
            null,
            null
            );
     if(strcmp($results['Status'],"SUCCESSFUL")==0){
       $number_assessment = $results['number_assessment'];
       $id_assessment=$results['id'];
       //$number_like=$results['number_like'];
       $number_like=0;
       echo '
         <div class="assessment_item">
          <div class="avatar">
            <a href="javascript:;">
                  <img src="'.$avatar_user.'" >
              </a><br>
               <span>'.$number_assessment.' bình luận</span>
               </div>
               <div class="full_name_user">
                 <span>'.$full_name.'</span>
               </div>
               <ul class="list_vote_rating">
                 <li>
                   <div class="left">Dịch vụ:</div>
                   <div class="right">
                      <div class="rating">';
                      
                          $stt_off_rate1=5-round($rate1/2);
                          $stt_on_rate1= round($rate1/2);
                          while ($stt_on_rate1!=0){
                            echo '<span class="star_active"></span>';
                              $stt_on_rate1--;
                          }

                          while ($stt_off_rate1!=0){        
                                   echo'<span class="star_no_active"></span>';
                                   $stt_off_rate1--;
                          }
                         
             echo' </div>
                   </div>
                 </li>
                 <li>
                   <div class="left">Quang cảnh:</div>
                   <div class="right">
                       <div class="rating">';
                       
                         $stt_off_rate2=5-round($rate2/2);
                          $stt_on_rate2= round($rate2/2);
                          while ($stt_on_rate2!=0){
                            echo '<span class="star_active"></span>';
                              $stt_on_rate2--;
                          }

                          while ($stt_off_rate2!=0){        
                                   echo'<span class="star_no_active"></span>';
                                   $stt_off_rate2--;
                          }
                                 
              echo' </div>
                   </div>                    
                 </li>
                 <li>
                   <div class="left">Giá cả:</div>
                   <div class="right">
                      <div class="rating">';
                         
                         $stt_off_rate3=5-round($rate3/2);
                          $stt_on_rate3= round($rate3/2);
                          while ($stt_on_rate3!=0){
                            echo '<span class="star_active"></span>';
                              $stt_on_rate3--;
                          }

                          while ($stt_off_rate3!=0){        
                                   echo'<span class="star_no_active"></span>';
                                   $stt_off_rate3--;
                          }
                                 
                echo' </div>
                   </div>
                 </li>
                 <li>
                   <div class="left">Hương vị:</div>
                   <div class="right">
                      <div class="rating">';
                         
                         $stt_off_rate4=5-round($rate4/2);
                          $stt_on_rate4= round($rate4/2);
                          while ($stt_on_rate4!=0){
                            echo '<span class="star_active"></span>';
                              $stt_on_rate4--;
                          }

                          while ($stt_off_rate4!=0){        
                                   echo'<span class="star_no_active"></span>';
                                   $stt_off_rate4--;
                          }
                                 
                 echo'</div>
                   </div>
                 </li>
               </ul>

               <div class="content_comment">
                 <p>
                  '.$content.'
                 </p>
               </div>
               <div class="like_share_reply">
                 <ul class="box_btn_submit">
                   <li class="btn_like_assessment" onclick="return like_assessment(this)">
                     <span>like</span><span>(</span><span class="text_number_like_assessment">'.$number_like.'</span><span>)</span>
                   </li>
                   <li class="btn_share_assessment">
                     <span>share</span><span>(0)</span>
                   </li>
                   <li class="btn_reply" onclick="return comment_for_assessment(this)">
                     <span>trả lời</span>
                   </li>
                 </ul>


               </div>
               <div class="comment_for_assessment">
                  <ul class="box_detail_comment_for_assessment">
                    <textarea style="resize: none; display: none;" id="answer_assessment" class="answer_assessment"   placeholder="Trả lời bình luận..." style="resize: none; "></textarea>
                    <input style="resize: none; display: none;"  type="hidden" value="'.$id_assessment.'" id="id_assessment">
                    <input  class="btn_answer_assessment" type="button" onclick="return send_answer_assessment(this)" value="Trả lời" >
                  </ul>
                 


                </div>
               <div class="line_box_list_comment"></div>
             </div>
      ';
       
       
       
     }
      
  }
  
  
  public function answer_for_assessment()
  {
      $BASE_IMAGE_USER_PROFILE_URL=Api_link_enum::$BASE_IMAGE_USER_PROFILE_URL;
      $avatar_user     =$_POST['avatar'];
      $full_name     =$_POST['full_name'];
      $content         =$_POST['content'];
      $id_assessment   =$_POST['id_assessment'];
      $id_user         =$_POST['id_user'];
      $acction="insert";
      
    $results=$this->restaurant_apis->update_comment(
            $acction,
            null,
            $id_user,
            $id_assessment,
            $content,
            "Y",
            null,
            null
            );
    
     if(strcmp($results['Status'],"SUCCESSFUL")==0){
       $number_assessment = $results['number_assessment'];
       $id_comment=$results['id'];
       echo '
             <ul class="box_detail_comment_for_assessment">
                <li class="line">
                </li>
                <li class="avatar_user_comment">
                  <img src="'.$avatar_user.'" >
                  <br>
                  <span>'.$number_assessment.' bình luận</span>
                </li>
                <li class="name_user_comment">
                  <span>'.$full_name.'</span>
                </li>
                <li class="content_user_comment">
                  <p>'.$content.'</p>
                </li>
                <li class="like_user_comment" >
                  <input type="hidden" value="'.$id_comment.'" id="id_comment">
                  <a href="javascript:;" onclick="return like_comment(this)">
                    <span class="span_margin">like(</span>
                       <span class="text_number_like_comment">0</span>
                    <span>)</span>
                  </a>
                </li>
              </ul>
       ';
     }
        
        
        
  }
  
  
   public function like_assessment()
    {
      $id_assessment   =$_POST['id_assessment'];
      $id_user         =$_POST['id_user'];
      
      $results=$this->user_apis->like_assessment(
            $id_user,
            $id_assessment,
            null,
            null
            );
    
     if(strcmp($results['Status'],"SUCCESSFUL")==0){
       echo $results['Status'];
     }
      
    }
  
    public function like_comment()
    {
      $id_comment   =$_POST['id_comment'];
      $id_user         =$_POST['id_user'];
      
      $results=$this->user_apis->like_comment(
            $id_user,
            $id_comment,
            null,
            null
            );
    
     if(strcmp($results['Status'],"SUCCESSFUL")==0){
       echo $results['Status'];
     }
      
    }
    
     public function register_email()
    {
      $email   =$_POST['email'];
      $action="insert";
      $results=$this->restaurant_apis->update_email(
            $action,
            null,
            $email,
            null,
            null
            );
    
     if(strcmp($results['Status'],"SUCCESSFUL")==0){
       echo $results['Status'];
     }
     else{
       echo "Email này đã được đăng ký!";
     }
      
    }
  
}

