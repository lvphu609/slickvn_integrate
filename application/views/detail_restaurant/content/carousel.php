<?php $url=  base_url();

 //var_dump($info_restaurant);
 foreach ($info_restaurant as $info_detail_restaurant) {   

      $id=                    $info_detail_restaurant['id'];
      //$id_user=               $info_detail_restaurant['id_user'];
      $id_menu_dish=          $info_detail_restaurant['id_menu_dish'];
      $id_coupon=             $info_detail_restaurant['id_coupon'];
      $name=                  $info_detail_restaurant['name'];
      $number_view=           $info_detail_restaurant['number_view'];
      $number_assessment=     $info_detail_restaurant['number_assessment'];
      $rate_point=            $info_detail_restaurant['rate_point'];
      $number_like=           $info_detail_restaurant['number_like'];
      $number_share=          $info_detail_restaurant['number_share'];
      $rate_service=          $info_detail_restaurant['rate_service'];
      $rate_landscape=        $info_detail_restaurant['rate_landscape'];
      $rate_taste=            $info_detail_restaurant['rate_taste'];
      $rate_price=            $info_detail_restaurant['rate_price'];
      $address=               $info_detail_restaurant['address'];
      $image_introduce_link=  $info_detail_restaurant['image_introduce_link'];
      $image_carousel_link=   $info_detail_restaurant['image_carousel_link'];
      $link_to=               $info_detail_restaurant['link_to'];
      $phone_number=          $info_detail_restaurant['phone_number'];
      $working_time=          $info_detail_restaurant['working_time'];
      $status_active=         $info_detail_restaurant['status_active'];
      $favourite_list=        $info_detail_restaurant['favourite_list'];
      $price_person_list=     $info_detail_restaurant['price_person_list'];
      $culinary_style_list=   $info_detail_restaurant['culinary_style_list'];
      $mode_use_list=         $info_detail_restaurant['mode_use_list'];
      $payment_type_list=     $info_detail_restaurant['payment_type_list'];
      $landscape_list=        $info_detail_restaurant['landscape_list'];
      $other_criteria_list=   $info_detail_restaurant['other_criteria_list'];
      $introduce=             $info_detail_restaurant['introduce'];
      $start_date=            $info_detail_restaurant['start_date'];
      $end_date=              $info_detail_restaurant['end_date'];
      $created_date=          $info_detail_restaurant['created_date'];
      $desc=                  $info_detail_restaurant['desc'];
      $email=                 $info_detail_restaurant['email'];
  }
 ?>


<div id="carousel_detail">
  <div class="box_align_center">
    <div class="box_detail_left">
      <div class="banner_vote_comment">
        <div class="div_rating">
          <div class="rating">
            
            <?php 
            
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
              
            ?>
            
          </div>
          <div class="text_rating">
<!--            <span>5.0<span>/<span>5</span>-->
          </div>
        </div>
        <div class="banner_like_comment">
          
            <a href="javascript:;" id="btn_assessment">
              <div class="fomat_like_comment" >
                <div class ="image_bg_comment">
                </div>
                <span >(<span><?php echo $number_assessment;?></span>)</span>
              </div>
            </a>
          <a href="javascript:;" onclick="return click_like(this)">
            <input  id="id_restaurant_like" value="<?php echo $id;?>" type="hidden">
              <div class="fomat_like_comment" >
                <div class ="image_bg_like">
                </div>
                <span >(<span id="text_like"><?php echo $number_like?></span>)</span>
              </div>
            </a>
       
        </div>
      </div>
      <div class="line_banner_vote_comment">  </div>
      <div class="gallery_slide">
        
        <ul id="myGallery">
          <?php 
            foreach ($image_introduce_link as $value) {
              echo'<li><img src="'.$link_restaurant_frofile.$value.'"  /></li>';
            }
          ?>
        </ul>
      </div>
      <div class="title_restaurant_and_introduce">
        <div class="detail_name_restaurant">
          <span class="text_detail_name_restaurant"><?php echo $name;?></span>
        </div>
        <div class="detail_introduce_restaurant">
          <span class="text_detail_introduce_restaurant">
           <?php echo $desc;?>
          </span>
        </div>
      </div>
      
    </div>
    <div class="box_detail_right">
      <div class="point_restaurant">
        <div class="text_point">
          <span><div class="text_align"><?php echo round($rate_point,1);?></div></span>
        </div>
        <div class="lable_point">
          <span><div class="text_align">Point</div></span>
        </div>
      </div>
      <div class="comment_view">
        <span>Đánh giá:&nbsp;</span><b><?php echo $number_assessment;?></b><br>
        <span>Lượt xem:&nbsp; </span><b><?php echo $number_view;?></b>
      </div>
      <ul class="vote">
        <li>
            <div class="text_vote_left"><span>Dịch vụ</span></div>
            <div class="text_vote_right">
              <div class="rating">
                <?php 
            
                    $stt_off_rate_service=5-round($rate_service/2);
                    $stt_on_rate_service= round($rate_service/2);
                    while ($stt_on_rate_service!=0){
                      echo '<span class="star_active"></span> ';
                        $stt_on_rate_service--;
                    }

                    while ($stt_off_rate_service!=0){        
                             echo'<span class="star_no_active"></span>';
                             $stt_off_rate_service--;
                    }

                ?>
                               
                
                
              </div>
            </div>
        </li>
        <li>
          <div class="text_vote_left"><span>Quang cảnh</span></div>
            <div class="text_vote_right">
              <div class="rating">
                 <?php 
            
                    $stt_off_rate_landscape=5-round($rate_landscape/2);
                    $stt_on_rate_landscape= round($rate_landscape/2);
                    while ($stt_on_rate_landscape!=0){
                      echo '<span class="star_active"></span> ';
                        $stt_on_rate_landscape--;
                    }

                    while ($stt_off_rate_landscape!=0){        
                             echo'<span class="star_no_active"></span>';
                             $stt_off_rate_landscape--;
                    }

                ?>
                
                
              </div>
            </div>
        </li>
        <li>
          <div class="text_vote_left"><span>Hương vị</span></div>
            <div class="text_vote_right">
              <div class="rating">
                <?php 
            
                    $stt_off_rate_taste=5-round($rate_taste/2);
                    $stt_on_rate_taste= round($rate_taste/2);
                    while ($stt_on_rate_taste!=0){
                      echo '<span class="star_active"></span> ';
                        $stt_on_rate_taste--;
                    }

                    while ($stt_off_rate_taste!=0){        
                             echo'<span class="star_no_active"></span>';
                             $stt_off_rate_taste--;
                    }

                ?>
                
                
              </div>
            </div>
        </li>
        <li>
          <div class="text_vote_left"><span>Giá cả</span></div>
            <div class="text_vote_right">
              <div class="rating">
                <?php 
            
                    $stt_off_rate_price=5-round($rate_price/2);
                    $stt_on_rate_price= round($rate_price/2);
                    while ($stt_on_rate_price!=0){
                      echo '<span class="star_active"></span> ';
                        $stt_on_rate_price--;
                    }

                    while ($stt_off_rate_price!=0){        
                             echo'<span class="star_no_active"></span>';
                             $stt_off_rate_price--;
                    }

                ?>
                
                
              </div>
            </div>
        </li>
      </ul>
     <ul class="box_button_submit">
       <a href="javascript:;" id="btn_danhgia">
        <li>
            <span><div class="center_text">Đánh giá</div></span>
        </li>
       </a>
       <a href="javascript:;" onclick="return click_like(this)">
        <li>
            <span><div class="center_text">Yêu thích</div></span>
        </li>
       </a>
<!--       <a href="javascript:;">
        <li>
            <span><div class="center_text">Đặt bàn</div></span>
        </li>
       </a>
       <a href="javascript:;">
        <li>
            <span><div class="center_text">Upload</div></span>
        </li>
       </a>-->
     </ul>
    </div>
  </div>
</div>
<input type="hidden" value="<?php echo $url;?>" id="hidUrl">
<script>
  //btn_assessment
        /*--------------------------------------*/
    $('#btn_assessment').click(function() {
        $("#status_clicked_1").removeClass('active');
        $("#status_clicked_2").removeClass('active');
        $("#status_clicked_3").removeClass('active');
        $("#status_clicked_4").addClass('active'); 
        
        //gioi thieu nha hang
        $("#introduce_restaurant").css({
            display: "none"
          
        });
        
         //thong tin nha hang
         $("#info_restaurant").css({
            display: "none"
          
        });
        //tiện ích
         $("#utilities_restaurant").css({
            display: "none"
          
        });
        //binh luận
         $("#comment_restaurant").css({
            display: "block",
            width: "734px",
            marginLeft: "10px",
            marginRight: "10px",
            height: "auto",
            float: "left",
            background: "#FFF",
            marginBottom: "20px",
            marginTop: "20px",
            visibility: ""
          
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
            var id_restaurant=$(object).parentsUntil("#carousel_detail").find("#id_restaurant_like").val();
            var url_api=url+"index.php/home_controller/like_res";
            var data={
                    id_restaurant:  id_restaurant,
                    id_user:  session_id_user
                }

           

            function refesh(data){


                if(data=="SUCCESSFUL"){
                    var number_like =parseInt($(object).parentsUntil("#carousel_detail").find("#text_like").html());
                    number_like=number_like+1;
                    $(object).parentsUntil("#carousel_detail").find("#text_like").html(number_like);
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