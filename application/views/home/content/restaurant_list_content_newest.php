 <?php $url=  base_url();
       $url_res_frofile=$link_restaurant_frofile;
 ?>
<div id="append_Res_Newest_List">
  <div id="remove_Res_Newest_List">
<div id="restaurant_list_content">
       <div class="box_restaurant_content">
           <!--masonry  class="masonry js-masonry"-->
        <div class="box_restaurant_content_custom_center">
          <ul class="append_newest_restaurant thumb_grid ul_alight_center"  >
          <!--
            Purpose: Get API new restaurant list 
            Author: Vinh Phu
            Version: 28/10/2013
          !-->
      
          <?php 
         // var_dump($newest_restaurant['0']);
          if(is_array($newest_restaurant)&&  sizeof($newest_restaurant)>0){
            foreach($newest_restaurant as $value_res_newest){
            
             $avatar=$value_res_newest['avatar'];             
             $id=$value_res_newest['id'];
             $name=$value_res_newest['name'];
             
             $desc=$value_res_newest['desc'];
             $desc=substr($desc,0,120) . '...';
             //$desc="ádad ád ád ád ád ád ád ád ";
             //$desc=word_limiter($desc, 4);

             
             $address=$value_res_newest['address'];
             $number_assessment=$value_res_newest['number_assessment'];
             $number_like=$value_res_newest['number_like'];
             $rate_point=$value_res_newest['rate_point'];
         ?>
            
              
               <li>            
                <div class="detail_box">
                           <div class="img_item">
                             <a href="<?php echo $url;?>index.php/detail_restaurant/detail_restaurant?id_restaurant=<?php echo $id; ?>">
                                 <img class="big" src="<?php echo $url_res_frofile.$avatar;?>" >
                             </a>
                             <div id="remove_comment_like_animate" class="">
                                <a href="<?php echo $url;?>index.php/detail_restaurant/detail_restaurant?id_restaurant=<?php echo $id;?>&comment_res=true">
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
                                    <span class="text"><? echo $number_assessment; ?></span>
                                 </div>
                                 <div class="like">
                                    <span class="image_like"></span>
                                    <span class="text" id="text_like"><? echo $number_like;?></span>
                                 </div>
                               </div>
                              
                              <div class="line"></div>
                              
                                  <div class="avartar_restaurant">
                                    <a href="#">
                                        <img src="<?php echo $url_res_frofile.$avatar; ?>" title="Sweet cherry cafe" alt="Sweet cherry cafe" >
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
              
            
             
        <?php    } 
          }
            ?> 
        </ul>
        <ul id="more_Newest_Restaurant">
           <li class="li_more">
               <a href="javascript:;" id="btn_More_Newest_Restaurant">
                    <div id="remove_button_more" class="button_more_noload">
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
<input type="hidden" value="1" id="number_page_newest_restaurant"> 
<?php $url=  base_url(); ?>
<input type="hidden" value="<?php echo $url;?>" id="hidUrl"> 

<script>

  $(function(){
    var page_this = parseInt($('#number_page_newest_restaurant').val());
    var page_next= page_this; 
    $('#btn_More_Newest_Restaurant').click(function() {
     // more_Newest_Restaurant();
      page_next= page_next+1;
      //alert(page_next);
      $("#remove_button_more").removeClass('button_more_noload');
      $("#remove_button_more").addClass('button_more_loading');
      $("#niceThumb_remove").remove();
      
      var dataThumb = "<div id=\"niceThumb_remove\"><script>$(function(){niceThumb_Grid ();});<\/script></div>";
      
      var url = $('#hidUrl').val();
      $.post( url + "index.php/home_controller/more_Newest_Restaurant", 
               { page: page_next}, function(data){                                   
                                  $('.append_newest_restaurant').append(data);
                                  $('#niceThumb_append').append(dataThumb);
                                  $("#remove_button_more").removeClass('button_more_loading');
                                  $("#remove_button_more").addClass('button_more_noload');
                                  if(data==""){
                                    //alert('het');
                                   // $("#more_Newest_Restaurant").remove();
                                  }
                                  
                                  });
      
        

    });
  }); 
  
  //like----------------------
   
   function click_like(object){
         var session_id_user    =$('#session_id_user').val();
         var url = $('#hidUrl').val();
          //no session
          if(typeof(session_id_user) == "undefined"){
            window.location=url+"index.php/home_controller/log_in";
          }
          else{
            var id_restaurant=$(object).parentsUntil("li").find("#id_restaurant_like").val();
            var url_api=url+"index.php/home_controller/like_res";
            var data={
                    id_restaurant:  id_restaurant,
                    id_user:  session_id_user
                }

           

            function refesh(data){


                if(data=="SUCCESSFUL"){
                    var number_like =parseInt($(object).parentsUntil("li").find("#text_like").html());
                    number_like=number_like+1;
                    $(object).parentsUntil("li").find("#text_like").html(number_like);
                   }
                   else{
                     if(data=="FALSE"){
                       //alert("bạn đã like nhà hàng nay");
                     }
                   }
            }
            $.ajax({
                  url: url_api ,
                  type: 'POST',
                  data:data,
                  success: function(data){
                     refesh(data);
                  },
                 error: function(a,textStatus,b){
                   alert('error!');
                 }
               });
             }
     };
    //end like
</script>   
<!--end javascrip append <li> to <ul>-->
 </div>
</div>