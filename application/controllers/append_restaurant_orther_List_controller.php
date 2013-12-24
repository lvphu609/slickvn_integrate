
<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH.'/models/api_link_enum.php';
require APPPATH.'/models/restaurantenum.php';

class Append_restaurant_orther_List_controller extends CI_Controller {
   public function __construct() {
    parent::__construct();
     api_link_enum::initialize();
    $this->load->helper('url');
    $this->load->model('restaurantenum');
    $this->load->model('restaurant/restaurant_apis');
    $this->load->model('common/common_apis');
    $this->load->model('user/user_apis');
    
  }

  public function index()
	{
    
    $json_orther_res = $this->restaurant_apis->get_orther_restaurant_list(Restaurantenum::LIMIT_PAGE_ORTHER_RESTAURANT,1);
    $data['orther_restaurant']=$json_orther_res["Results"]; 
    
    $url=  base_url();
    $data['link_restaurant_frofile']=  Api_link_enum::$BASE_PROFILE_RESTAURANT_URL;
    $link_image=$data['link_restaurant_frofile'];
    
    
    echo'
      <div id="append_Res_Orther_List">
          <div id="remove_Res_Orther_List">
           <div id="Res_Orther_List">
            <div class="articles_list">
              <div class="articles_list_custom_center">
                <div class="append_orther_restaurant" >';
           foreach($data['orther_restaurant'] as $value_res_orther){
                     $avatar=$value_res_orther['avatar'];             
                      $id=$value_res_orther['id'];
                      $name=$value_res_orther['name'];
                      $desc=$value_res_orther['desc'];
                      $desc=substr($desc,0,200) . '...';
                      $address=$value_res_orther['address'];
                      $number_assessment=$value_res_orther['number_assessment'];
                      $number_like=$value_res_orther['number_like'];

                      //$rate_point=$value_res_newest['rate_point'];
                      $rate_point=$value_res_orther['rate_point'];

                      echo'
                         <div class="box_list">
                           <div class="images">
                             
                               <div class="detail_image" style="width:200px; height:200px;">
                                 <a href="'.$url.'/index.php/detail_restaurant/detail_restaurant?id_restaurant='.$id.'">
                                   <img style="width:200px; height:200px;" class="big" src="'.$link_image.$avatar.'" >
                                 </a>  
                                  <div id="remove_comment_like_animate" >
                                    <a href="'.$url.'/index.php/detail_restaurant/detail_restaurant?id_restaurant='.$id.'&comment_res=true" >
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
                                 </div>';
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
                                </div>
                                
                              </div>
                            ';
                             
                       echo'</div>
                           <div class="content">
                             <span class="title">'.$name.'</span> <br>
                             <p>'.$address.'</p>
                             <div class="line"></div>
                             <div class="introduce_restaurant">
                                  <span>
                                   '.$desc.'
                                  </span>     
                              </div>

                           </div>
                           
                           <div class="comment">
                               <div class="box_comment">
                                 <div class="title">
                                   <span>'.round($rate_point,1).'</span>
                                 </div>';


                                   echo'   <div class="vote">';

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




                               echo'<div class="detail">

                                 </div>
                               </div>
                           </div>
                         </div>
                     ';

                 }     
            echo '</div>';
             



       echo'         </div>
                </div>
             </div>
           ';
       
  //button load more  
   echo '  <div id="Res_Orther_List">
            <div class="articles_list">
              <div class="articles_list_custom_center" >
              
              <div id="more_Orther_Restaurant">
                <div class="box_list">
                   <a href="javascript:;" id="btn_More_Orther_Restaurant_List">
                    <div id="more_Orther_Restaurant_List">
                        <div id="remove_orther_class_button_more_list" class="button_more_noload_list">
                        </div>
                    </div>
                   </a>
                 </div>
               </div>
               
                </div>
              </div>
            </div>
         
     
              ';       
       
       
       
       
  //goi ham hieu ung re chuot     
   echo'
      <!--zoom hover-->
            <div id="niceThumb_append">
              <div id="niceThumb_remove">
                <script>
                    $(function(){
                      niceThumb_List();
                    });
                </script>
               </div>
            </div>
    <!--zoom hover-->



   ';   
//btn xem them load javascript
 
$url=  base_url();
echo'
  <!--javascrip append <li> to <ul>-->
<input type="hidden" value="1" id="number_page_orther_restaurant"> 
<input type="hidden" value="'.$url.'" id="hidUrl"> 

<script>

  $(function(){
    var page_this_orther_List = parseInt($(\'#number_page_orther_restaurant\').val());
    var page_next_orther_List= page_this_orther_List; 
    $(\'#btn_More_Orther_Restaurant_List\').click(function() {
      page_next_orther_List= page_next_orther_List+1;
      // alert(page_next_orther_List);

      $("#remove_orther_class_button_more_list").removeClass(\'button_more_noload_list\');
      $("#remove_orther_class_button_more_list").addClass(\'button_more_load_list\');
      $("#niceThumb_remove").remove();
      
      var dataThumb = "<div id=\"niceThumb_remove\"><script>$(function(){niceThumb_List ();});<\/script></div>";
      
      var url = $(\'#hidUrl\').val();
      $.post( url + "index.php/append_restaurant_orther_List_controller/more_Orther_Restaurant", 
               { page: page_next_orther_List}, function(data){
               
                                  $(\'.append_orther_restaurant\').append(data);
                                  $(\'#niceThumb_append\').append(dataThumb);
                                  $("#remove_orther_class_button_more_list").removeClass(\'button_more_load_list\');
                                  $("#remove_orther_class_button_more_list").addClass(\'button_more_noload_list\');
                                  

                                  if(data==""){
                                    //alert(\'het\');
                                    //$("#more_Orther_Restaurant").remove();
                                  }
                                  
                                  });
      
        

    });
    
  }); 
  
function click_like(object){
                 var session_id_user    =$(\'#session_id_user\').val();
                    var url = $(\'#hidUrl\').val();
                     //no session
                     if(typeof(session_id_user) == "undefined"){
                       window.location=url+"index.php/home_controller/log_in";
                     }
                     else{
                       var id_restaurant=$(object).parentsUntil(".box_list").find("#id_restaurant_like").val();
                       var url_api=url+"index.php/home_controller/like_res";
                       var data={
                               id_restaurant:  id_restaurant,
                               id_user:  session_id_user
                           }



                       function refesh(data){


                           if(data=="SUCCESSFUL"){
                               var number_like =parseInt($(object).parentsUntil(".box_list").find("#text_like").html());
                               number_like=number_like+1;
                               $(object).parentsUntil(".box_list").find("#text_like").html(number_like);
                              }
                              else{
                                if(data=="FALSE"){
                                  //alert("bạn đã like nhà hàng nay");
                                }
                              }
                       }
                       $.ajax({
                             url: url_api ,
                             type: \'POST\',
                             data:data,
                             success: function(data){
                                refesh(data);
                             },
                            error: function(a,textStatus,b){
                              alert(\'error!\');
                            }
                          });
                        }
                };

</script> ';
   
echo'
  </div>
</div> 
';          
       
       
  }
  
   public function more_Orther_Restaurant(){
    
    $page=$_POST['page'];
    $json_orther_res = $this->restaurant_apis->get_orther_restaurant_list(Restaurantenum::LIMIT_PAGE_ORTHER_RESTAURANT,$page);
    $data['orther_restaurant']=$json_orther_res["Results"]; 
    $url=  base_url();
    $data['link_restaurant_frofile']=  Api_link_enum::$BASE_PROFILE_RESTAURANT_URL;
    $link_image=$data['link_restaurant_frofile'];
    
          foreach($data['orther_restaurant'] as $value_res_orther){
             $avatar=$value_res_orther['avatar'];             
             $id=$value_res_orther['id'];
             $name=$value_res_orther['name'];
             $desc=$value_res_orther['desc'];
             $desc=substr($desc,0,200) . '...';
             $address=$value_res_orther['address'];
             $number_assessment=$value_res_orther['number_assessment'];
             $number_like=$value_res_orther['number_like'];
             
             //$rate_point=$value_res_newest['rate_point'];
             $rate_point=$value_res_orther['rate_point'];

                     echo'
                         <div class="box_list">
                           <div class="images">
                             
                               <div class="detail_image" style="width:200px; height:200px;">
                                 <a href="'.$url.'/index.php/detail_restaurant/detail_restaurant?id_restaurant='.$id.'">
                                   <img style="width:200px; height:200px;" class="big" src="'.$link_image.$avatar.'" >
                                 </a>  
                                  <div id="remove_comment_like_animate" >
                                    <a href="'.$url.'/index.php/detail_restaurant/detail_restaurant?id_restaurant='.$id.'&comment_res=true" >
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
                                 </div>';
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
                                </div>
                                
                              </div>
                            ';
                             
                       echo'</div>
                           <div class="content">
                             <span class="title">'.$name.'</span> <br>
                             <p>'.$address.'</p>
                             <div class="line"></div>
                             <div class="introduce_restaurant">
                                  <span>
                                   '.$desc.'
                                  </span>     
                              </div>

                           </div>
                           
                           <div class="comment">
                               <div class="box_comment">
                                 <div class="title">
                                   <span>'.round($rate_point,1).'</span>
                                 </div>';


                                   echo'   <div class="vote">';

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




                               echo'<div class="detail">

                                 </div>
                               </div>
                           </div>
                         </div>
                     ';

                 }     

  }
  
  
  
  
  
  
  
  
}

?>
