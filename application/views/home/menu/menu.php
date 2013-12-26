<?php $url = base_url(); ?>
<div id="menu_custom">
     <div class="menu_main">
       <div class="menu_main_background">
      <div class="menu_top">

        <div class="search">
          <div class="form_search">
             <div class="form_search_input">
               <input id="input_text_search" class="input_search enter_key_search" type="text"  placeholder="Bạn đang muốn tìm gì?" >
             <lable class="lable_search">
<!--                   <select class="select_custom" id="slect_search">
                    <option value="restaurant">Nhà hàng</option>
                    <option value="coupon">Khuyến mãi</option>
                    <option value="post">Bài viết</option>
                  </select>-->
               
                   <div class="selectBox">
                    <span class="selected" id="search_selected"></span>
                    <div class="selectOptions" >
                      <span class="selectOption" value="Option 1">Nhà hàng</span>
                      <span class="selectOption" value="Option 2">Khuyến mãi</span>
                      <span class="selectOption" value="Option 3">Bài viết</span>
                    </div>
                  </div>

                    <script type='text/javascript'>
                        $(document).ready(function() {
                          enableSelectBoxes();
                        });

                        function enableSelectBoxes(){
                          $('div.selectBox').each(function(){
                            $(this).children('span.selected').html($(this).children('div.selectOptions').children('span.selectOption:first').html());
                            $(this).attr('value',$(this).children('div.selectOptions').children('span.selectOption:first').attr('value'));

                            $(this).children('span.selected,span.selectArrow').click(function(){
                              if($(this).parent().children('div.selectOptions').css('display') == 'none'){
                                $(this).parent().children('div.selectOptions').css('display','block');
                              }
                              else
                              {
                                $(this).parent().children('div.selectOptions').css('display','none');
                              }
                            });

                            $(this).find('span.selectOption').click(function(){
                              $(this).parent().css('display','none');
                              $(this).closest('div.selectBox').attr('value',$(this).attr('value'));
                              $(this).parent().siblings('span.selected').html($(this).html());
                            });
                          });				
                        }
                      </script>

            </lable>
             </div>


             <div class="btn_search_nimbel">
               <div id="home-section-projects" >
                 <a href="#" class="more-info" id="button_submit_search"></a>
               </div>
            </div> 
             <!--
               <a href="#">
                 <div class="btn_submit_search">
             </div>
               </a>
             -->
          </div>
        </div>
        
         <?php 
                  if(is_array($info_user)){
                    
                    $value=$info_user;
                    $id_user=$value['id_user'];
                    $full_name=$value['full_name'];
                    $avatar=$value['avatar'];
              //   $full_name="aaaaaaaaaaaaaadssdfsdfsdf";
                  
                  $full_name_array = explode(' ', $full_name);
                  $ho = current($full_name_array);
                  $ten_dem = next($full_name_array);
                  if( count( $full_name_array ) == 2 ) {
                      $ten_dem = '';
                  }
                  if( count( $full_name_array ) > 3 ) {
                      $ten_dem .= ' ' . next($full_name_array);
                  }
                  $ten = end($full_name_array);
                  
                  $ten=substr($ten,0,8);
                  //var_dump( $ho, $ten_dem, $ten );


                    
                    
           ?>
                  <ul class="hello_user">
                       <li>
                    
                           <span><div class="text_center">Chào <?php echo $ten; ?> ,</div></span>
                 
                       </li>
                       <li>
                         <a href="<?php echo $url;?>index.php/logout"> <span><div class="text_center">đăng xuất</div></span></a>
                           
                       </li>
                     </ul>
           <?php }else {?>
                      <div class="oauth_login">
                        <ul>
                          <li>
                            <a href="#">
                              <div class="icon_oauth_facebook"></div>
                            </a>
                          </li>
                          <li>
                            <a href="#">
                              <div class="icon_oauth_twiter"></div>
                            </a>
                          </li>
                          <li>
                            <a href="#">
                              <div class="icon_oauth_google"></div>
                            </a>
                          </li>
                        </ul>
                      </div>
                      <div class="login_register">
          
                 
                            <ul>
                              <li>
                                <a href="<?php echo $url; ?>index.php/home_controller/sign_up">
                                  <div class="btn_signup">
                                    <div class="image_signup">
                                    </div>
                                    <!--
                                    <ul>
                                      <li><div class="icon_login"></div></li>
                                      <li><span>Sign Up</span></li>
                                    </ul>
                                    -->
                                  </div>
                                </a>
                              </li>
                              <li>
                                <a href="<?php echo $url; ?>index.php/home_controller/log_in">
                                  <div class="btn_login">
                                    <div class="image_login">
                                    </div>
                                    <!--
                                      <ul>
                                        <li><div class="icon_register"></div></li>
                                        <li><span>Log In</span></li>
                                      </ul>
                                    -->
                                  </div>
                                </a>
                              </li>
                            </ul>
                    </div>
             <?php }?>
      </div>

        <div class="menu_mid">
          <div class="menu_mid_custom_center">
            <div class="menu_mid_title"></div>
            <ul>
              
              <?php 
                foreach ($meal_list as $value_meal_list){  
                  $meal_name=  urlencode($value_meal_list['name']);
                  echo '<li>
                           <a href="'.$url.'index.php/search/search/search_meal?meal_name='.$meal_name.'">
                             <div class="btn_menu_mid">
                                 <span>'.$value_meal_list['name'].'
                             </span>
                             </div>
                           </a>
                        </li>';
                }
              
              ?>  
              
              
            </ul>
          </div>
        </div>
      <div class="menu_bottom">
         <div class="menu_bottom_custom_center">
           <div class="menu_background">
          <div class="menu_bottom_title"></div>
          <ul>
            <?php 
                foreach ($favourite_list as $value_favourite_list){                  
                  echo '<li>
                          <a href="'.$url.'index.php/search/search/search_favourite?favourite_id='.$value_favourite_list['id'].'">
                            <div class="background">
                              <div class="text_align_center">
                                  '.$value_favourite_list['name'].'
                               </div>
                             </div>
                           </a>
                         </li>';
                }
              
              ?> 
            
          
          </ul>
          </div>
         </div>
      </div>
      </div>
    </div>
</div>


<?php $url=  base_url(); ?>
<input type="hidden" value="<?php echo $url;?>" id="hidUrl"> 

<script>
  
  function send_text_search(){
     var input_text_search=$("#input_text_search").val();
   // input_text_search=String(input_text_search);
    var slect_search =document.getElementById("search_selected").innerHTML;  //document.getElementsByClassName('selected').innerHTML;
    //alert(slect_search);
    
    var url= $("#hidUrl").val();
    var url_restaurant=url+'index.php/search/search/search_restaurant';
    var url_post=url+'index.php/search/search/search_post';
    var url_coupon=url+'index.php/search/search/search_restaurant_coupon';
    //search theo nhà hàng
    if(slect_search=="Nhà hàng"){
          window.location=url_restaurant+"?input_text_search="+input_text_search;
    
      
    }
    else //search theo bài viết
      if(slect_search=="Bài viết"){
         window.location=url_post+"?input_text_search="+input_text_search;
        
        }
      else //search theo khuyến mãi
      if(slect_search=="Khuyến mãi"){
      
          //alert('chức năng search theo khuyến mãi đang xây dựng');
        window.location=url_coupon+"?input_text_search="+input_text_search;
      
      
        }
    
  }
  
  
  $("#button_submit_search").click(function (){
    send_text_search();    
  });
  
  $('.enter_key_search').on('keyup', function(e) {
    if (e.which == 13) {
             send_text_search();
         
        }
    });
  
  
</script>


<?php if(is_array($info_user)){?>

<input type="hidden" id="session_id_user" value="<?php echo $id_user;?>">
<input type="hidden" id="session_full_name" value="<?php echo $full_name;?>">
<input type="hidden" id="session_avatar" value="<?php echo $avatar;?>">

<?php }?>