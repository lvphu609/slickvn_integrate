<?php $url=  base_url();
      $url_res_frofile=$link_restaurant_frofile;

?> 
<div id="append_Res_Orther_List">
  <div id="remove_Res_Orther_List">
    <div id="restaurant_list_content">
       <div class="box_restaurant_content">
           <!--masonry  class="masonry js-masonry"-->
        <div class="box_restaurant_content_custom_center">
          <ul class="append_orther_restaurant thumb_grid" >
          <!--
            Purpose: Get API new restaurant list 
            Author: Vinh Phu
            Version: 28/10/2013
          !-->
          <?php 
         if(is_array($orther_restaurant)&&  sizeof($orther_restaurant)>0){
             foreach($orther_restaurant as $value_res_orther){
             $avatar=$value_res_orther['avatar'];             
             $id=$value_res_orther['id'];
             $name=$value_res_orther['name'];
             $desc=$value_res_orther['desc'];
             $desc=substr($desc,0,120) . '...';
             $address=$value_res_orther['address'];
             $number_assessment=$value_res_orther['number_assessment'];
             $number_like=$value_res_orther['number_like'];
             
             //$rate_point=$value_res_newest['rate_point'];
             $rate_point=$value_res_orther['rate_point'];
             
            
          ?>
               <li >            
                <div class="detail_box">
                           <div class="img_item">
                             <a href="<?php echo $url;?>index.php/detail_restaurant/detail_restaurant?id_restaurant=<?php echo $url;?>">
                                 <img  class="big" src="<?php echo $url_res_frofile.$avatar;?>" title="Sweet cherry cafe" alt="Sweet cherry cafe" >
                             </a>
                             <div id="remove_comment_like_animate" class="">
                               <a href="<?php echo $url;?>index.php/detail_restaurant/detail_restaurant?id_restaurant='.$id.'&comment_res=true">
                                  <div class ="image_bg_comment_animate">
                                      <div class ="image_comment_animate">
                                      </div>
                                  </div>
                                </a>
                                <a href="javascript:;" onclick="return click_like(this)">
                                    <input type="hidden" value="<?php echo $id; ?>" id="id_restaurant_like">
                                  <div class ="image_bg_like_animate">
                                      <div class ="image_like_animate">
                                      </div>
                                  </div>
                                </a>
                             </div>
                            </div>
                          <div class="introduce_restaurant">
                             <span>
                               <?php echo $desc; ?>
                             </span>     
                          </div> 
                           <div class="info_restaurant">
                                <div class="vote">
                              <?php

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
                               ?>
                                </div>
                              <div class="like_comment">
                                 <div class="comment">
                                    <span class=image_comment></span>
                                    <span class="text"><?php echo $number_assessment;?></span>
                                 </div>
                                 <div class="like">
                                    <span class="image_like"></span>
                                    <span class="text" id="text_like"><?php echo $number_like;?></span>
                                 </div>
                                </div>
                              <div class="line"></div>
                                <div class="avartar_restaurant">
                                      <a href="#">
                                          <img src="<?php echo $url_res_frofile.$avatar;?>" title="Sweet cherry cafe" alt="Sweet cherry cafe" >
                                      </a>                            
                                    </div>
                                  <div class="title_address">
                                     <div class="title">
                                      <a href="#"><span><?php echo $name;?></span></a>
                                     </div> 
                                   <div class="address">
                                         <?php echo $address;?>
                                    </div>                                       
                                  </div>
                                  
                             </div>
                          </div>  
              </li>
              
            
       <?php      
           }
           
         }
            ?>
          
        </ul>
        <ul id="more_Orther_Restaurant">
           <li class="li_more">
               <a href="javascript:;" id="btn_More_Orther_Restaurant">
                    <div id="remove_button_more_orther" class="button_more_noload">
                      <div class="text"><span>&nbsp;</span></div>
                    </div>
                </a>
            </li> 
        </ul>
     </div>
    </div>
 </div>

<!--zoom hover-->
<div id="niceThumb_append">
  <div id="niceThumb_remove">
    <script>
        $(function(){
          niceThumb_Grid ();
        });
    </script>
   </div>
</div>
<!--zoom hover-->         
         
<!--javascrip append <li> to <ul>-->
<input type="hidden" value="1" id="number_page_orther_restaurant"> 
<?php $url=  base_url(); ?>
<input type="hidden" value="<?php echo $url;?>" id="hidUrl"> 

<script>

  $(function(){
    var page_this_orther = parseInt($('#number_page_orther_restaurant').val());
    var page_next_orther= page_this_orther; 
    $('#btn_More_Orther_Restaurant').click(function() {
      page_next_orther= page_next_orther+1;
      //alert(page_next_orther);
      $("#remove_button_more_orther").removeClass('button_more_noload');
      $("#remove_button_more_orther").addClass('button_more_loading');
       var url = $('#hidUrl').val();
       $("#niceThumb_remove").remove();
       var dataThumb = "<div id=\"niceThumb_remove\"><script>$(function(){niceThumb_Grid ();});<\/script></div>";
       
      $.post( url + "index.php/home_controller/more_Orther_Restaurant", 
               { page_orther: page_next_orther}, function(data){
                                  
                                  $('.append_orther_restaurant').append(data);
                                  $('#niceThumb_append').append(dataThumb);
                                  $("#remove_button_more_orther").removeClass('button_more_loading');
                                  $("#remove_button_more_orther").addClass('button_more_noload');
                                  
                                  if(data==""){
                                    //alert('het');
                                   // $("#more_Orther_Restaurant").remove();
                                  }
                                  
                                  });
    });
    
  }); 
  
  
</script>   
<!--end javascrip append <li> to <ul>-->

</div>
</div>