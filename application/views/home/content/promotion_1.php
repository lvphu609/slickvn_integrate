
<?php $url=  base_url();?> 


<div id="promotion">
  <!--Title Khuyến Mãi-->
    <div class="promotion_title">
       <div class="promotion_title_custom_center">
        <div class="title_left"></div>
       </div>
    </div>
   <!--end title Khuyến mãi--> 
   
  
   <!--danh sách nhà hàng khuyến mãi-->
   <div id="restaurant_list_content">
       <div class="box_restaurant_content">
          <div class="box_restaurant_content_custom_center">
          <ul class="append_Promotion">
            <script type="text/javascript" src="<?php echo $url."includes/js/time_left/remaining.js";?>"></script>
            <?php 
             //  var_dump($promotion_list);
                $stt_timer=1;
                foreach ($promotion_list as $value_promotion_list){
                  $due_date=$value_promotion_list['coupon_due_date']; 
                  $due_date=date("j F, Y H:i:s", strtotime($due_date)); 
                  
                  echo'<script type="text/javascript">  
                        var timer = setInterval(function(){

                          var seconds = remaining.getSeconds(\''.$due_date.'\');

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
            ?>
            
             
           
            <?php 
             //  var_dump($promotion_list);
                $stt_coupon=1;
                foreach ($promotion_list as $value_promotion_list){
//                        
                $id=$value_promotion_list['id'];
                $coupon_value=$value_promotion_list['value_coupon'];
                $restaurant_name=$value_promotion_list['name'];
                $content=$value_promotion_list['desc'];
                
                $image_link=$value_promotion_list['avatar'];
                $image_link=$link_restaurant_frofile.$image_link;
                
                $link_to="#";
                $start_date=$value_promotion_list['coupon_start_date'];
                $due_date=$value_promotion_list['coupon_due_date'];    
              
              
              
              /*
              address
              number_assessment
              rate_point
              number_like
              number_share
              */
              
              
                
             /*   
                $avatar=$value_promotion_list['avatar'];             
                $id=$value_promotion_list['id'];
                $name=$value_promotion_list['name'];
                $desc=$value_promotion_list['desc'];
                $desc=substr($desc,0,120) . '...';
                $address=$value_promotion_list['address'];
                $number_assessment=$value_promotion_list['number_assessment'];
                $number_like=$value_promotion_list['number_like'];
                $rate_point=$value_promotion_list['rate_point'];*/
                
                
                echo '
                      <li>
                        <div class="detail_box">
                                <div class="promotion_custom">
                                  <div class="img_item">
                                      <a href="'.$link_to.'">
                                        <img src="'.$image_link.'" title="'.$restaurant_name.'" alt="'.$restaurant_name.'" >
                                      </a>
                                  </div>
                                  <div id="time_left">
                                    <span>thời gian khuyến mãi còn lại
                                     <div id="remaining_'.$stt_coupon.'"></div>
                                    </span>
                                  </div>
                                  <div class="info_promotion">
                                        <div class="title">
                                           <a href="'.$link_to.'">'.$restaurant_name.'</a>
                                        </div>
                                        <div class="info_promotion">
                                           '.$content.'
                                        </div>
                                  </div>
                               </div>
                       </div> 
                     </li>
                ';
                
                $stt_coupon++;
                
              }
       
            ?>
           
          
          </ul>
            
          <ul id="more_Promotion">
           <li class="li_more">
               <a href="javascript:;" id="btn_More_Promotion">
                    <div class="button_more">
                      <div class="text"><span>Xem thêm</span></div>
                    </div>
                </a>
            </li> 
          </ul>            
         </div>
       </div>
    </div>
  <!--end danh sách nhà hàng khuyến mãi-->   
   
</div>

<!--javascrip append <li> to <ul>-->
<input type="hidden" value="1" id="number_page_promotion"> 
<?php $url=  base_url(); ?>
<input type="hidden" value="<?php echo $url;?>" id="hidUrl"> 

<script>

  $(function(){
    var page_this_promotion = parseInt($('#number_page_promotion').val());
    var page_next_promotion= page_this_promotion; 
    $('#btn_More_Promotion').click(function() {
     // more_Newest_Restaurant();
      page_next_promotion= page_next_promotion+1;
      //alert(page_next);
      
      var url = $('#hidUrl').val();
      $.post( url + "index.php/home_controller/more_Promotion", 
               { page_promotion: page_next_promotion}, function(data){
                                  
                                  $('.append_Promotion').append(data);
                                  if(data==""){
                                    //alert('het');
                                    $("#more_Promotion").remove();
                                  }
                                  
                                  });

    });
    
  }); 
</script>   
<!--end javascrip append <li> to <ul>-->

