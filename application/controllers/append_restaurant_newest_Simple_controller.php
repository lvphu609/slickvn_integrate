
<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH.'/models/api_link_enum.php';
require APPPATH.'/models/restaurantenum.php';

class Append_restaurant_newest_Simple_controller extends CI_Controller {
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
    
    $json_newest_res = $this->restaurant_apis->get_newest_restaurant_list(Restaurantenum::LIMIT_PAGE_NEWEST_RESTAURANT,1);
    $data['newest_restaurant']=$json_newest_res["Results"];
    
    $url=  base_url();
   echo'
      <div id="append_Res_Newest_List">
      <div id="remove_Res_Newest_List">
        <div id="Res_Newest_Simple">
            <div class="articles_list">
              <div class="articles_list_custom_center" >
                  <div class="append_newest_restaurant">';
                     foreach($data['newest_restaurant'] as $value_res_newest){
                      $avatar=$value_res_newest['avatar'];             
                      $id=$value_res_newest['id'];
                      $name=$value_res_newest['name'];
                      $desc=$value_res_newest['desc'];
                      $address=$value_res_newest['address'];
                      $number_assessment=$value_res_newest['number_assessment'];
                      $number_like=$value_res_newest['number_like'];
                      $rate_point=$value_res_newest['rate_point'];


                     echo'
                       <a href="'.$url.'/index.php/detail_restaurant/detail_restaurant?id_restaurant='.$id.'">
                         <div class="box_list">
                         
                           <div class="content">
                             <span class="title">'.$name.'</span> ';
                     
                    echo'   <div class="vote">';

                       $stt_off=5-round($rate_point/2);;
                       $stt_on= round($rate_point/2);;
                       while ($stt_on!=0){
                         echo '<span class="star_on"></span>';
                           $stt_on--;
                       }

                       while ($stt_off!=0){        
                                echo'<span class="star_off"></span>';
                                $stt_off--;
                       }
                       echo'   </div>'; 
                       

                       echo'      <br>
                             <p>'.$address.'</p>              

                           </div>
                         
                         </div>
                       </a>
                     ';

                }     
             echo '</div>';
      echo' </div>
           </div>
          </div>
          ';
       
  //button load more  
   echo '  <div id="Res_Newest_Simple">
            <div class="articles_list">
              <div class="articles_list_custom_center" >
              
              <div id="more_Newest_Restaurant">
                <div class="box_list">
                   <a href="javascript:;" id="btn_More_Newest_Restaurant_Simple">
                    <div id="more_Newest_Restaurant_Simple">
                        <div id="remove_class_button_more_simple" class="button_more_noload_list">
                       
                        </div>
                    </div>
                   </a>
                 </div>
               </div>
               

              </div>
             </div>
            </div>
         
     
              ';     
   
  //goi ham niceThumb hieu ung      
   echo'
      <!--zoom hover-->
            <div id="niceThumb_append">
              <div id="niceThumb_remove">
                <script>
                    $(function(){
                      niceThumb_Simple();
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
<input type="hidden" value="1" id="number_page_newest_restaurant"> 
<input type="hidden" value="'.$url.'" id="hidUrl"> 

<script>

  $(function(){
    var page_this_newest_Simple = parseInt($(\'#number_page_newest_restaurant\').val());
    var page_next_newest_Simple= page_this_newest_Simple; 
    $(\'#btn_More_Newest_Restaurant_Simple\').click(function() {
      page_next_newest_Simple= page_next_newest_Simple+1;
      $("#remove_class_button_more_simple").removeClass(\'button_more_noload_list\');
      $("#remove_class_button_more_simple").addClass(\'button_more_load_list\');
      $("#niceThumb_remove").remove();
      
      var dataThumb = "<div id=\"niceThumb_remove\"><script>$(function(){niceThumb_Simple ();});<\/script></div>";
      
      var url = $(\'#hidUrl\').val();
      $.post( url + "index.php/append_restaurant_newest_Simple_controller/more_Newest_Restaurant", 
               { page: page_next_newest_Simple}, function(data){
                                if(data!=""){
                                  $(\'.append_newest_restaurant\').append(data);
                                  $(\'#niceThumb_append\').append(dataThumb);
                                  $("#remove_class_button_more_simple").removeClass(\'button_more_load_list\');
                                  $("#remove_class_button_more_simple").addClass(\'button_more_noload_list\');
                                  
                                  }
                                  if(data==""){
                                    //alert(\'het\');
                                    //$("#more_Newest_Restaurant").remove();
                                  }
                                  
                                  });
      
        

    });
    
  }); 
</script> ';
   
   
  //end append 
  echo '</div>
       </div>';     
       
       
       
       
       
       
       
       
       
  }
public function more_Newest_Restaurant(){
    
    $page=$_POST['page'];
    $json_newest_res = $this->restaurant_apis->get_newest_restaurant_list(Restaurantenum::LIMIT_PAGE_NEWEST_RESTAURANT,$page);
    $data['newest_restaurant']=$json_newest_res["Results"];
    $url=  base_url();
    
       foreach($data['newest_restaurant'] as $value_res_newest){
                      $avatar=$value_res_newest['avatar'];             
                      $id=$value_res_newest['id'];
                      $name=$value_res_newest['name'];
                      $desc=$value_res_newest['desc'];
                      $address=$value_res_newest['address'];
                      $number_assessment=$value_res_newest['number_assessment'];
                      $number_like=$value_res_newest['number_like'];
                      $rate_point=$value_res_newest['rate_point'];


                     echo'
                       <a href="'.$url.'/index.php/detail_restaurant/detail_restaurant?id_restaurant='.$id.'">
                         <div class="box_list">
                         
                           <div class="content">
                             <span class="title">'.$name.'</span> ';
                     
                    echo'   <div class="vote">';

                       $stt_off=5-round($rate_point/2);;
                       $stt_on= round($rate_point/2);;
                       while ($stt_on!=0){
                         echo '<span class="star_on"></span>';
                           $stt_on--;
                       }

                       while ($stt_off!=0){        
                                echo'<span class="star_off"></span>';
                                $stt_off--;
                       }
                       echo'   </div>'; 
                       

                       echo'      <br>
                             <p>'.$address.'</p>              

                           </div>
                         
                         </div>
                       </a>
                     ';

                }     
          

  }
  
  
  
  
  
  
  
}

?>
