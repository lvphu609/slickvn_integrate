<?php $url=  base_url(); 
      $url_res_frofile=$link_restaurant_frofile;
 ?>


<div id="result_search">
  <div class="box_align_center">
    <div class="box_detail_left">
        <div class="title_filter">
          <div class="text_center"><span>Lọc Kết Quả</span></div>
        </div>
        <ul id="menu_filter">
          <li>
            <a href="javascript:;" onclick="return select_item_search(this)" >
              <div class="title_item_search"> 
                <span>Nhu cầu</span>
              </div>
              <div class="icon_show"></div>
            </a>
            <form id="FormAddListing_favourite">
              <ul class="list_index">
                  <?php 
                    if(is_array($favourite_list)&&  sizeof($favourite_list)>0){
                      foreach ($favourite_list as $value_favourite_list) {
                        echo'<li onclick="return onclickLiCheckListing_favourite(this);">
                              <span class="checkbox" id="'.$value_favourite_list['id'].'"></span>
                              <p class="item_name">'.$value_favourite_list['name'].'</p>
                      </li>';
                        
                      }
                    } 
                   ?>
                   
              </ul>
            </form>
          </li>
          <li>
             <a href="javascript:;" onclick="return select_item_search(this)" >
              <div class="title_item_search"> 
               <span>Món ăn</span>
              </div>
              <div class="icon_show"></div>
             </a>
             <form id="FormAddListing_meal">
              <ul class="list_index">
                <?php 
                    if(is_array($meal_list)&&  sizeof($meal_list)>0){
                      foreach ($meal_list as $value_meal_list){
                         $meal_name=  urlencode($value_meal_list['name']);
                         $id_meal=$value_meal_list['id'];
                        echo'<li onclick="return onclickLiCheckListing_meal(this);">
                              <span class="checkbox" id="'.$id_meal.'" data-value_name_meal="'.$value_meal_list['name'].'" ></span>
                              <p class="item_name">'.$value_meal_list['name'].'</p>
                        </li>';
                        
                      }
                    } 
                   ?>
              </ul>
            </form>
            
          </li>
           <li>
              <a href="javascript:;" onclick="return select_item_search(this)" >
                <div class="title_item_search"> 
                 <span>Phong cách ẩm thực</span>
                </div>
                <div class="icon_show"></div>
              </a>
             <form id="FormAddListing_Culinary_Style">
              <ul class="list_index">
                  <?php 
                     if(is_array($culinary_style) && sizeof($culinary_style)>0){
                        foreach ($culinary_style as $value_culinary_style) {
                          echo'
                                <li onclick="return onclickLiCheckListing_Culinary_Style(this);">
                                    <span class="checkbox" id="'.$value_culinary_style['id'].'"></span>
                                    <p class="item_name">'.$value_culinary_style['name'].'</p>
                                </li>
                            ';
                         }
                     }
                   ?>
                   
              </ul>
            </form>
             
             
          </li>
           <li>
              <a href="javascript:;" onclick="return select_item_search(this)" >
                <div class="title_item_search"> 
                 <span>Phương thức sử dụng</span>
                </div>
                <div class="icon_show"></div>
              </a>
             <form id="FormAddListing_Mode_Use_List">
              <ul class="list_index">
                   <?php 
                     if(is_array($mode_use_list) && sizeof($mode_use_list)>0){
                        foreach ($mode_use_list as $value_mode_use_list) {
                          echo'
                                <li onclick="return onclickLiCheckListing_Mode_Use_List(this);">
                                    <span class="checkbox" id="'.$value_mode_use_list['id'].'"></span>
                                    <p class="item_name">'.$value_mode_use_list['name'].'</p>
                                </li>
                            ';
                         }
                     }
                   ?>
                
              </ul>
            </form>
          </li>
           <li>
              <a href="javascript:;" onclick="return select_item_search(this)" >
                <div class="title_item_search"> 
                 <span>Hình thức thanh toán</span>
                </div>
                <div class="icon_show"></div>
              </a>
             
             <form id="FormAddListing_Payment_Type_List">
              <ul class="list_index">
                    <?php 
                     if(is_array($payment_type_list) && sizeof($payment_type_list)>0){
                        foreach ($payment_type_list as $value_payment_type_list) {
                          echo'
                                <li onclick="return onclickLiCheckListing_Payment_Type_List(this);">
                                    <span class="checkbox" id="'.$value_payment_type_list['id'].'"></span>
                                    <p class="item_name">'.$value_payment_type_list['name'].'</p>
                                </li>
                            ';
                         }
                     }
                   ?>
              </ul>
             </form>
             
             
          </li>
           <li>
              <a href="javascript:;" onclick="return select_item_search(this)" >
                <div class="title_item_search"> 
                 <span>Ngoại cảnh</span>
                </div>
                <div class="icon_show"></div>
               </a>
             <form id="FormAddListing_Landscape_List">
              <ul class="list_index">
                  <?php 
                     if(is_array($landscape_list) && sizeof($landscape_list)>0){
                        foreach ($landscape_list as $value_landscape_list) {
                          echo'
                                <li onclick="return onclickLiCheckListing_Landscape_List(this);">
                                    <span class="checkbox" id="'.$value_landscape_list['id'].'"></span>
                                    <p class="item_name">'.$value_landscape_list['name'].'</p>
                                </li>
                            ';
                         }
                     }
                   ?>
                   
              </ul>
             </form>
             
          </li>
          <li>
             <a href="javascript:;" onclick="return select_item_search(this)" >
              <div class="title_item_search"> 
               <span>Giá trung bình người</span>
              </div>
              <div class="icon_show"></div>
             </a>
             <form id="FormAddListing_Price_Person_List">
              <ul class="list_index">
                 <?php 
                     if(is_array($price_person_list) && sizeof($price_person_list)>0){
                        foreach ($price_person_list as $value_price_person_list) {
                          echo'
                                <li onclick="return onclickLiCheckListing_Price_Person_List(this);">
                                    <span class="checkbox" id="'.$value_price_person_list['id'].'"></span>
                                    <p class="item_name">'.$value_price_person_list['name'].'</p>
                                </li>
                            ';
                         }
                     }
                   ?>
              </ul>
             </form>           
            
          </li>
          <li>
             <a href="javascript:;" onclick="return select_item_search(this)" >
              <div class="title_item_search"> 
               <span>Các tiêu chí khác</span>
              </div>
              <div class="icon_show"></div>
             </a>
              <form id="FormAddListing_Other_Criteria_List">
              <ul class="list_index">
                <?php 
                     if(is_array($other_criteria_list) && sizeof($other_criteria_list)>0){
                        foreach ($other_criteria_list as $value_other_criteria_list) {
                          echo'
                                <li onclick="return onclickLiCheckListing_Other_Criteria_List(this);">
                                    <span class="checkbox" id="'.$value_other_criteria_list['id'].'"></span>
                                    <p class="item_name">'.$value_other_criteria_list['name'].'</p>
                                </li>
                            ';
                         }
                     }
                   ?>
                   
              </ul>
             </form>
            
            
          </li>
          
          
        </ul>
        
      
    </div>
    <div class="box_detail_right">
      
      <div class="box_results_search">
        
<?php
       
//search meal=================================================================================>       
      if($action_search="meal" && sizeof($result_search_meal)>0 ){
              echo "<ul>";
                foreach ($result_search_meal as $info_detail_restaurant) {
                    $id=                    $info_detail_restaurant['id'];
                    $link_to_detail_restaurant=$url."index.php/detail_restaurant/detail_restaurant?id_restaurant=".$id;
                   // $id_user=               $info_detail_restaurant['id_user'];
                    $id_menu_dish=          $info_detail_restaurant['id_menu_dish'];
                    $id_coupon=             $info_detail_restaurant['id_coupon'];
                    $name=                  $info_detail_restaurant['name'];
                    $number_view=           $info_detail_restaurant['number_view'];
                    $avatar=                $info_detail_restaurant['avatar'];
                    $address=               $info_detail_restaurant['address'];

                    $favourite_type_list=   $info_detail_restaurant['favourite_list'];
                    $favourite_type_list=substr($favourite_type_list, 1); 

                    $price_person_list=     $info_detail_restaurant['price_person_list'];
                    $price_person_list=substr($price_person_list, 1); 

                    $culinary_style=        $info_detail_restaurant['culinary_style_list'];
                    $culinary_style=substr($culinary_style, 1); 

                    $number_assessment=     $info_detail_restaurant['number_assessment'];
                    $number_view=           $info_detail_restaurant['number_view'];
                    $rate_point =           $info_detail_restaurant['rate_point'];
                    $rate_point =round($rate_point,1);

                   echo'<li>
                    <a href="'.$link_to_detail_restaurant.'">
                      <div class="left">
                        <img src="'.$url_res_frofile.$avatar.'">
                      </div>
                    </a>
                    <div class="mid">
                      <div class="title">
                        <a href="'.$link_to_detail_restaurant.'">
                          <span class="text_title">'.$name.'</span>
                        </a>
                      </div>
                      <div class="address">
                         <span class="text_address">
                           '.$address.'
                         </span>
                      </div>
                      <div class="content_introduce">
                        <p class="text_content_introduce">
                          <span >Mục Đích</span>:
                                  '.$favourite_type_list.'  <br> 
                          <span>Giá trung bình/người</span>:
                                   '.$price_person_list.' <br>                                
                          <span>Phong cách ẩm thực</span>:
                                   '.$culinary_style.' <br>  
                        </p>
                      </div>
                    </div>
                    <div class="right">
                      <div class="point">
                        <span>'.$rate_point.'</span>
                      </div>
                      <div class="vote">
                        <div class="rating">';

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

                 echo'</div>
                      </div>
                      <div class="comment_view">
                        <p>
                          <span>'.$number_assessment.'</span>&nbsp;Bình luận<br>
                          <span>'.$number_view.'</span>&nbsp;lượt xem
                        </p>
                      </div>
                    </div>
                  </li>';

                } 

               echo "</ul>";
        }
       
        
        
 //search favourite=================================================================================>        

         if($action_search="favourite" && sizeof($result_search_favourite)>0 ){
           //var_dump($result_search_favourite);
                            echo "<ul>";
                              foreach ($result_search_favourite as $info_detail_restaurant) {
                                  $id=                    $info_detail_restaurant['id'];
                                  $link_to_detail_restaurant=$url."index.php/detail_restaurant/detail_restaurant?id_restaurant=".$id;
                                  //$id_user=               $info_detail_restaurant['id_user'];
                                  $id_menu_dish=          $info_detail_restaurant['id_menu_dish'];
                                  $id_coupon=             $info_detail_restaurant['id_coupon'];
                                  $name=                  $info_detail_restaurant['name'];
                                  $number_view=           $info_detail_restaurant['number_view'];
                                  $avatar=                $info_detail_restaurant['avatar'];
                                  $address=               $info_detail_restaurant['address'];

                                  $favourite_type_list=   $info_detail_restaurant['favourite_list'];
                                  $favourite_type_list=substr($favourite_type_list, 1); 

                                  $price_person_list=     $info_detail_restaurant['price_person_list'];
                                  $price_person_list=substr($price_person_list, 1); 

                                  $culinary_style=        $info_detail_restaurant['culinary_style_list'];
                                  $culinary_style=substr($culinary_style, 1); 

                                  $number_assessment=     $info_detail_restaurant['number_assessment'];
                                  $number_view=           $info_detail_restaurant['number_view'];
                                  $rate_point =           $info_detail_restaurant['rate_point'];
                                  $rate_point =round($rate_point,1);



                                 echo'<li>
                                  <a href="'.$link_to_detail_restaurant.'">
                                    <div class="left">
                                      <img src="'.$url_res_frofile.$avatar.'">
                                    </div>
                                  </a>
                                  <div class="mid">
                                    <div class="title">
                                      <a href="'.$link_to_detail_restaurant.'">
                                        <span class="text_title">'.$name.'</span>
                                      </a>
                                    </div>
                                    <div class="address">
                                       <span class="text_address">
                                         '.$address.'
                                       </span>
                                    </div>
                                    <div class="content_introduce">
                                      <p class="text_content_introduce">
                                        <span >Mục Đích</span>:
                                                '.$favourite_type_list.'  <br> 
                                        <span>Giá trung bình/người</span>:
                                                 '.$price_person_list.' <br>                                
                                        <span>Phong cách ẩm thực</span>:
                                                 '.$culinary_style.' <br>  
                                      </p>
                                    </div>
                                  </div>
                                  <div class="right">
                                    <div class="point">
                                      <span>'.$rate_point.'</span>
                                    </div>
                                    <div class="vote">
                                      <div class="rating">';

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

                               echo'</div>
                                    </div>
                                    <div class="comment_view">
                                      <p>
                                        <span>'.$number_assessment.'</span>&nbsp;Bình luận<br>
                                        <span>'.$number_view.'</span>&nbsp;lượt xem
                                      </p>
                                    </div>
                                  </div>
                                </li>';

                              } 

                             echo "</ul>";
                      }
                      
            
      //search restaurant=================================================================================>        

         if($action_search="restaurant" && sizeof($result_search_restaurant)>0 ){
           //var_dump($result_search_favourite);
                            echo "<ul>";
                              foreach ($result_search_restaurant as $info_detail_restaurant) {
                                  $id=                    $info_detail_restaurant['id'];
                                  $link_to_detail_restaurant=$url."index.php/detail_restaurant/detail_restaurant?id_restaurant=".$id;
                               //   $id_user=               $info_detail_restaurant['id_user'];
                                  $id_menu_dish=          $info_detail_restaurant['id_menu_dish'];
                                  $id_coupon=             $info_detail_restaurant['id_coupon'];
                                  $name=                  $info_detail_restaurant['name'];
                                  $number_view=           $info_detail_restaurant['number_view'];
                                  $avatar=                $info_detail_restaurant['avatar'];
                                  $address=               $info_detail_restaurant['address'];

                                  $favourite_type_list=   $info_detail_restaurant['favourite_list'];
                                  $favourite_type_list=substr($favourite_type_list, 1); 

                                  $price_person_list=     $info_detail_restaurant['price_person_list'];
                                  $price_person_list=substr($price_person_list, 1); 

                                  $culinary_style=        $info_detail_restaurant['culinary_style_list'];
                                  $culinary_style=substr($culinary_style, 1); 

                                  $number_assessment=     $info_detail_restaurant['number_assessment'];
                                  $number_view=           $info_detail_restaurant['number_view'];
                                  $rate_point =           $info_detail_restaurant['rate_point'];
                                  $rate_point =round($rate_point,1);



                                 echo'<li>
                                  <a href="'.$link_to_detail_restaurant.'">
                                    <div class="left">
                                      <img src="'.$url_res_frofile.$avatar.'">
                                    </div>
                                  </a>
                                  <div class="mid">
                                    <div class="title">
                                      <a href="'.$link_to_detail_restaurant.'">
                                        <span class="text_title">'.$name.'</span>
                                      </a>
                                    </div>
                                    <div class="address">
                                       <span class="text_address">
                                         '.$address.'
                                       </span>
                                    </div>
                                    <div class="content_introduce">
                                      <p class="text_content_introduce">
                                        <span >Mục Đích</span>:
                                                '.$favourite_type_list.'  <br> 
                                        <span>Giá trung bình/người</span>:
                                                 '.$price_person_list.' <br>                                
                                        <span>Phong cách ẩm thực</span>:
                                                 '.$culinary_style.' <br>  
                                      </p>
                                    </div>
                                  </div>
                                  <div class="right">
                                    <div class="point">
                                      <span>'.$rate_point.'</span>
                                    </div>
                                    <div class="vote">
                                      <div class="rating">';

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

                               echo'</div>
                                    </div>
                                    <div class="comment_view">
                                      <p>
                                        <span>'.$number_assessment.'</span>&nbsp;Bình luận<br>
                                        <span>'.$number_view.'</span>&nbsp;lượt xem
                                      </p>
                                    </div>
                                  </div>
                                </li>';

                              } 

                             echo "</ul>";
                      } 
               
                
               
                      

    //kết quả tìm kiếm thông tìm thấy
       /* if(count($result_search_restaurant)==0 &&(count($result_search_favourite)!=0||count($result_search_favourite)!=0)){

          echo '<div style="width: 100%; height: 100px; text-align: center; color: #FFF; margin-top: 20px;">
                 <span style="font-size: 20px; font-weight: bold;">Không có kết nào cho từ khóa bạn muốn tìm!</span>
                </div>';

        }*/
                       
  //search coupon of restaurant=================================================================================>        

         if($action_search="coupon" && sizeof($result_search_coupon)>0 ){
           //var_dump($result_search_favourite);
                            echo "<ul>";
                              foreach ($result_search_coupon as $info_detail_restaurant) {
                                  $id=                    $info_detail_restaurant['id'];
                                  $link_to_detail_restaurant=$url."index.php/detail_restaurant/detail_restaurant?id_restaurant=".$id;
                               //   $id_user=               $info_detail_restaurant['id_user'];
                                  $id_menu_dish=          $info_detail_restaurant['id_menu_dish'];
                                 // $id_coupon=             $info_detail_restaurant['id_coupon'];
                                  $name=                  $info_detail_restaurant['name'];
                                  $number_view=           $info_detail_restaurant['number_view'];
                                  $avatar=                $info_detail_restaurant['avatar'];
                                  $address=               $info_detail_restaurant['address'];

                                  $favourite_type_list=   $info_detail_restaurant['favourite_list'];
                                  $favourite_type_list=substr($favourite_type_list, 1); 

                                  $price_person_list=     $info_detail_restaurant['price_person_list'];
                                  $price_person_list=substr($price_person_list, 1); 

                                  $culinary_style=        $info_detail_restaurant['culinary_style_list'];
                                  $culinary_style=substr($culinary_style, 1); 

                                  $number_assessment=     $info_detail_restaurant['number_assessment'];
                                  $number_view=           $info_detail_restaurant['number_view'];
                                  $rate_point =           $info_detail_restaurant['rate_point'];
                                  $rate_point =round($rate_point,1);



                                 echo'<li>
                                  <a href="'.$link_to_detail_restaurant.'">
                                    <div class="left">
                                      <img src="'.$url_res_frofile.$avatar.'">
                                    </div>
                                  </a>
                                  <div class="mid">
                                    <div class="title">
                                      <a href="'.$link_to_detail_restaurant.'">
                                        <span class="text_title">'.$name.'</span>
                                      </a>
                                    </div>
                                    <div class="address">
                                       <span class="text_address">
                                         '.$address.'
                                       </span>
                                    </div>
                                    <div class="content_introduce">
                                      <p class="text_content_introduce">
                                        <span >Mục Đích</span>:
                                                '.$favourite_type_list.'  <br> 
                                        <span>Giá trung bình/người</span>:
                                                 '.$price_person_list.' <br>                                
                                        <span>Phong cách ẩm thực</span>:
                                                 '.$culinary_style.' <br>  
                                      </p>
                                    </div>
                                  </div>
                                  <div class="right">
                                    <div class="point">
                                      <span>'.$rate_point.'</span>
                                    </div>
                                    <div class="vote">
                                      <div class="rating">';

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

                               echo'</div>
                                    </div>
                                    <div class="comment_view">
                                      <p>
                                        <span>'.$number_assessment.'</span>&nbsp;Bình luận<br>
                                        <span>'.$number_view.'</span>&nbsp;lượt xem
                                      </p>
                                    </div>
                                  </div>
                                </li>';

                              } 

                             echo "</ul>";
                      } 
               
                   
     
                      
                      
                      
                      
                      
                      
                      
                      
                      
            
        ?>
    
        
     
        
        
      </div>
      
    </div>
  </div>
</div>
	<script type="text/javascript" src="<?php echo $url;?>includes/plugins/rating_jquery/jRating.jquery.js"></script>
  <input type="hidden" value="<?php echo $url;?>" id="hidUrl">
<script>
  
   $(document).ready(function(){
     $('#menu_filter').find('.list_index').css({
          display: "none"
          
        });
  
   });
  
   //nhu cau-----------
    function onclickLiCheckListing_favourite(obj){
     if($(obj).find('span').first().hasClass('checkbox')){
            $(obj).find('span').first().removeClass('checkbox').addClass('checkboxSelect');
            var myText = $(obj).text();
            var id = $(obj).find('span').first().attr('id');
            var newEle = '<input type="hidden"  class="input_favourite_list" id="input_favourite_list' + id + '" value="' + id + '"/>';
            $('#FormAddListing_favourite').append(newEle);
        }else{
            $(obj).find('span').first().removeClass('checkboxSelect').addClass('checkbox');
            var id=$(obj).find('span').first().attr('id');
            $("#input_favourite_list" + id ).remove();
        }
        
        send_items_search();
        
    }
    
    //mon an-----------------
    function onclickLiCheckListing_meal(obj){
     if($(obj).find('span').first().hasClass('checkbox')){
            $(obj).find('span').first().removeClass('checkbox').addClass('checkboxSelect');
            var myText = $(obj).text();
            var id = $(obj).find('span').first().attr('id');
            var value_name_meal=$(obj).find('span').first().attr('data-value_name_meal');
            var newEle = '<input type="hidden"  class="input_meal_list" id="input_meal_list' + id + '" value="' + value_name_meal + '"/>';
            $('#FormAddListing_meal').append(newEle);
        }else{
            $(obj).find('span').first().removeClass('checkboxSelect').addClass('checkbox');
            var id=$(obj).find('span').first().attr('id');
            $("#input_meal_list" + id ).remove();
        }
        
        send_items_search();
        
    }
    //phong cach am thuc-----------------
     function onclickLiCheckListing_Culinary_Style(obj){
        if($(obj).find('span').first().hasClass('checkbox')){
                $(obj).find('span').first().removeClass('checkbox').addClass('checkboxSelect');
                var myText = $(obj).text();
                var id = $(obj).find('span').first().attr('id');
                var newEle = '<input type="hidden"  class="input_culinary_style_class" id="input_culinary_style' + id + '" value="' + id + '"/>';
                $('#FormAddListing_Culinary_Style').append(newEle);
            }else{
                $(obj).find('span').first().removeClass('checkboxSelect').addClass('checkbox');
                var id=$(obj).find('span').first().attr('id');
                $("#input_culinary_style" + id ).remove();
            }
            
            send_items_search();
       }
   //phung thuc su dung-----------------
    function onclickLiCheckListing_Mode_Use_List(obj){
    if($(obj).find('span').first().hasClass('checkbox')){
            $(obj).find('span').first().removeClass('checkbox').addClass('checkboxSelect');
            var myText = $(obj).text();
            var id = $(obj).find('span').first().attr('id');
            var newEle = '<input type="hidden"  class="input_mode_use_list_class" id="input_mode_use_list' + id + '" value="' + id + '"/>';
            $('#FormAddListing_Mode_Use_List').append(newEle);
        }else{
            $(obj).find('span').first().removeClass('checkboxSelect').addClass('checkbox');
            var id=$(obj).find('span').first().attr('id');
            $("#input_mode_use_list" + id ).remove();
        }
       send_items_search();
    }
  //hinh thuc thanh toan-----------------
   function onclickLiCheckListing_Payment_Type_List(obj){
    if($(obj).find('span').first().hasClass('checkbox')){
            $(obj).find('span').first().removeClass('checkbox').addClass('checkboxSelect');
            var myText = $(obj).text();
            var id = $(obj).find('span').first().attr('id');
            var newEle = '<input type="hidden" name="arr_payment_type_list[]" class="input_payment_type_list_class" id="input_payment_type_list' + id + '" value="' + id + '"/>';
            $('#FormAddListing_Payment_Type_List').append(newEle);
        }else{
            $(obj).find('span').first().removeClass('checkboxSelect').addClass('checkbox');
            var id=$(obj).find('span').first().attr('id');
            $("#input_payment_type_list" + id ).remove();
            
        }
        send_items_search();
    }
  //ngoai canh-----------------
   function onclickLiCheckListing_Landscape_List(obj){
    if($(obj).find('span').first().hasClass('checkbox')){
            $(obj).find('span').first().removeClass('checkbox').addClass('checkboxSelect');
            var myText = $(obj).text();
            var id = $(obj).find('span').first().attr('id');
            var newEle = '<input type="hidden" name="arr_landscape_list[]" class="input_landscape_list_class" id="input_landscape_list' + id + '" value="' + id + '"/>';
            $('#FormAddListing_Landscape_List').append(newEle);
        }else{
            $(obj).find('span').first().removeClass('checkboxSelect').addClass('checkbox');
            var id=$(obj).find('span').first().attr('id');
            $("#input_landscape_list" + id ).remove();
        }
        send_items_search();
    }
    //gia trung binh nguoi-----------------
   function onclickLiCheckListing_Price_Person_List(obj){
    if($(obj).find('span').first().hasClass('checkbox')){
            $(obj).find('span').first().removeClass('checkbox').addClass('checkboxSelect');
            var myText = $(obj).text();
            var id = $(obj).find('span').first().attr('id');
            var newEle = '<input type="hidden" name="arr_price_person_list[]" class="input_price_person_list_class" id="input_price_person_list' + id + '" value="' + id + '"/>';
            $('#FormAddListing_Price_Person_List').append(newEle);
        }else{
            $(obj).find('span').first().removeClass('checkboxSelect').addClass('checkbox');
            var id=$(obj).find('span').first().attr('id');
            $("#input_price_person_list" + id ).remove();
        }
        send_items_search();
   }
   
    //cac tieu chi khac-----------------
   function onclickLiCheckListing_Other_Criteria_List(obj){
        if($(obj).find('span').first().hasClass('checkbox')){
            $(obj).find('span').first().removeClass('checkbox').addClass('checkboxSelect');
            var myText = $(obj).text();
            var id = $(obj).find('span').first().attr('id');
            var newEle = '<input type="hidden" name="arr_other_criteria_list[]" class="input_other_criteria_list_class" id="input_other_criteria_list' + id + '" value="' + id + '"/>';
            $('#FormAddListing_Other_Criteria_List').append(newEle);
        }else{
            $(obj).find('span').first().removeClass('checkboxSelect').addClass('checkbox');
            var id=$(obj).find('span').first().attr('id');
            $("#input_other_criteria_list" + id ).remove();
        }
        send_items_search();
     }
   
   
   
   
   
   
  function get_value_search(){
     var array_return = [];
     
     /*nhu cau*/
      var elem_favourite_search = document.getElementsByClassName("input_favourite_list");
      var favourite_list_search="";
       for (var i = 0; i < elem_favourite_search.length; ++i) {
        if (typeof elem_favourite_search[i].value !== "undefined") {
            favourite_list_search +=elem_favourite_search[i].value+',';
          }
        }
      favourite_list_search=favourite_list_search.slice(0,-1);
      array_return[0]=favourite_list_search;
      
      /*mon an*/
      var elem_meal_search = document.getElementsByClassName("input_meal_list");
      var meal_list_search="";
       for (var i = 0; i < elem_meal_search.length; ++i) {
        if (typeof elem_meal_search[i].value !== "undefined") {
            meal_list_search +=elem_meal_search[i].value+',';
          }
        }
      meal_list_search=meal_list_search.slice(0,-1);
      array_return[1]=meal_list_search;
      
      /*phong cach am thuc*/
      var elem_culinary_style = document.getElementsByClassName("input_culinary_style_class");
      var culinary_style="";
       for (var i = 0; i < elem_culinary_style.length; ++i) {
        if (typeof elem_culinary_style[i].value !== "undefined") {
            culinary_style +=elem_culinary_style[i].value+',';
          }
        }
      culinary_style=culinary_style.slice(0,-1);
      array_return[2]=culinary_style;
      
     /*phương thức sử dụng*/
     var elem_mode_use_list = document.getElementsByClassName("input_mode_use_list_class");
      var mode_use_list="";
       for (var i = 0; i < elem_mode_use_list.length; ++i) {
        if (typeof elem_mode_use_list[i].value !== "undefined") {
            mode_use_list +=elem_mode_use_list[i].value+',';
          }
        }
        mode_use_list=mode_use_list.slice(0,-1);
        array_return[3]=mode_use_list;
        
     /*hinh thuc thanh toan */
      var elem_payment_type_list = document.getElementsByClassName("input_payment_type_list_class");
      var payment_type_list="";
       for (var i = 0; i < elem_payment_type_list.length; ++i) {
        if (typeof elem_payment_type_list[i].value !== "undefined") {
            payment_type_list +=elem_payment_type_list[i].value+',';
          }
        }
        payment_type_list=payment_type_list.slice(0,-1);
        array_return[4]=payment_type_list;
        
      /*ngoai canh */
      var elem_landscape_list = document.getElementsByClassName("input_landscape_list_class");
      var landscape_list="";
       for (var i = 0; i < elem_landscape_list.length; ++i) {
        if (typeof elem_landscape_list[i].value !== "undefined") {
            landscape_list +=elem_landscape_list[i].value+',';
          }
        }
       landscape_list=landscape_list.slice(0,-1);
       array_return[5]=landscape_list;
       
     /*gia trung binh nguoi*/
      var elem_price_person_list = document.getElementsByClassName("input_price_person_list_class");
      var price_person_list="";
       for (var i = 0; i < elem_price_person_list.length; ++i) {
        if (typeof elem_price_person_list[i].value !== "undefined") {
            price_person_list +=elem_price_person_list[i].value+',';
          }
        }
        price_person_list=price_person_list.slice(0,-1);
        array_return[6]=price_person_list;
      
      /*cac tieu chi khac*/
      var elem_other_criteria_list = document.getElementsByClassName("input_other_criteria_list_class");
      var other_criteria_list="";
       for (var i = 0; i < elem_other_criteria_list.length; ++i) {
        if (typeof elem_other_criteria_list[i].value !== "undefined") {
            other_criteria_list +=elem_other_criteria_list[i].value+',';
          }
        }
        other_criteria_list=other_criteria_list.slice(0,-1);
       array_return[7]=other_criteria_list;
      
      
     /*return array search*/
     return array_return;
  }
  
  
  function send_items_search(){

    var div_disable_screen='<div id="disable_screen" style="width:100%; height:100%; position:fixed; top:0px; left:0px; z-index:999999; background-color:#000; opacity:0;"> </div>'
    var div_loading ='<div id="load_ding"></div>';
    $('.box_results_search').append(div_disable_screen);
    $('.box_results_search').append(div_loading);
    $('.box_results_search').fadeTo(300, 0.25);
    //$("*").css("cursor", "wait");
    
    
    
    var array_search = get_value_search();
    console.log(array_search);
    var url=$('#hidUrl').val();
    var url_api=url+"index.php/search/search/search_filter";
    var data={
      array_search:array_search
    };

    $.ajax({
     url: url_api ,
     type: 'POST',
     data:data,
     success: function(data){
       // alert(data);
        
        $('.box_results_search').fadeTo(100, 1);
        //$("*").css("cursor", "default");
        $('#disable_screen').remove();
        $('#load_ding').remove();
        $('.box_results_search').html("");
        $('.box_results_search').append(data);
        
     },
       error: function(a,textStatus,b){
         alert('error');
       }
     });
    
    
    
    
    
    
    
    
  }
  
  
  function select_item_search(object){
     
  
   
    
   
    if($(object).closest('li').find('.list_index').css('display') == 'none'){
       $(object).closest('#menu_filter').find('.list_index').css('display','none'); 
      /* $(object).closest('#menu_filter').find('.list_index').animate({
              display:"none",
              height: "toggle"
            },300, function() {
              // Animation complete.
            });*/
     //  $(object).closest('li').find('.list_index').css('display','block'); 
      
      $(object).closest('li').find('.list_index').animate({
             display:"block",
             /*width: [ "toggle", "swing" ],*/
              height: [ "toggle", "swing" ],
             opacity: "toggle"
           },400, function() {
             // Animation complete.
           });
      
    }
    else
    {
      $(object).closest('li').find('.list_index').animate({
               display:"none",
             /*  width: [ "toggle", "swing" ],*/
               height: [ "toggle", "swing" ],
               opacity: "toggle"
            },300, function() {
              // Animation complete.
            });
      // $(object).closest('li').find('.list_index').css('display','none'); 
  ////css('display','none');
    }            
                
  }
  
 
  
</script>