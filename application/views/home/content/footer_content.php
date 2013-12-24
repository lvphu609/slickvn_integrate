<?php $url=  base_url();?>




<div id="footer_content">
  <div class="footer_content_custom_center">
    <div class="footer_left">
        <ul>
          <li>
            <span class="title_link">MÓN ĂN</span><br><br>
            <ul>
              <?php 
               if(is_array($meal_list)&&  sizeof($meal_list)>0){
                foreach ($meal_list as $value_meal_item){                  
                  echo '<li>
                           <a href="'.$url.'index.php/search/search/search_meal?meal_name='.$value_meal_item['name'].'">
                                 <span>'.$value_meal_item['name'].'
                           </a>
                        </li>';
                }
               }
              
              ?>  
            </ul>
          </li>
          <li>
            <span class="title_link">NHU CẦU</span><br><br>
            <ul>
               <?php 
                if(is_array($favourite_list)&&  sizeof($favourite_list)>0){
                  foreach ($favourite_list as $value_favourite_item){                  
                    echo '<li>
                            <a href="'.$url.'index.php/search/search/search_favourite?favourite_id='.$value_favourite_item['id'].'">
                                    '.$value_favourite_item['name'].'                           
                             </a>
                           </li>';
                  }
                }
              
              ?> 
            </ul>
          </li>
          <li>
            <span class="title_link">SLICK.VN</span><br><br>
            <ul>
              <li><a href="#">Chính sách bảo mật</a></li>
              <li><a href="#">Điều khoản sử dụng</a></li>
              <li><a href="#">Điều khoản sử dụng</a></li>
              <li><a href="#">Việc làm</a></li>
              <li><a href="#">Hỏi đáp</a></li>
              <li><a href="#">Liên hệ</a></li>
              <li><a href="#">Bảng báo giá</a> </li>
            </ul>
          </li>
        </ul>
    </div>
    <div class="footer_right">
           <div class="members_title">
              <div class="title_left"></div>
          </div>
          <div class="members_list">
              <div class="box_list">
                <ul>
                  <li>
                      <a href="#">
                        <img src="<?php echo $url;?>includes/images/profile/profile_1.jpg" title="Lily" alt="Lily">
                      </a>
                      <div>
                        <div class="name_user"><span>Lily</span></div>
                        <div class="count_comment"><span>357 Bình luận</span></div>
                      </div>
                  </li>
                  <li>
                      <a href="#">
                        <img src="<?php echo $url;?>includes/images/profile/profile_2.jpg" title="Bui Thi Hue" alt="Bui Thi Hue">
                      </a>
                      <div>
                        <div class="name_user"><span>Bui Thi Hue</span></div>
                        <div class="count_comment"><span>353 Bình luận</span></div>
                      </div>
                  </li>
                   <li>
                      <a href="#">
                        <img src="<?php echo $url;?>includes/images/profile/profile_3.jpg" title="Chư Bát Giới" alt="Chư Bát Giới">
                      </a>
                      <div>
                        <div class="name_user"><span>Chư Bát Giới</span></div>
                        <div class="count_comment"><span>284 Bình luận</span></div>
                      </div>
                  </li>
                  <li>
                      <a href="#">
                        <img src="<?php echo $url;?>includes/images/profile/profile_4.jpg" title="Tuong Vi" alt="Tuong Vi">
                      </a>
                      <div>
                        <div class="name_user"><span>Tuong Vi</span></div>
                        <div class="count_comment"><span>244 Bình luận</span></div>
                      </div>
                  </li>
                  <li>
                      <a href="#">
                        <img src="<?php echo $url;?>includes/images/profile/profile_5.jpg" title="Mr Truong" alt="Mr Truong">
                      </a>
                      <div>
                        <div class="name_user"><span>Mr Truong</span></div>
                        <div class="count_comment"><span>197 Bình luận</span></div>
                      </div>
                  </li>
                  <li>
                      <a href="#">
                        <img src="<?php echo $url;?>includes/images/profile/profile_6.jpg" title="Heo con" alt="Heo con">
                      </a>
                      <div>
                        <div class="name_user"><span>Heo con</span></div>
                        <div class="count_comment"><span>190 Bình luận</span></div>
                      </div>
                  </li>
                  <li>
                      <a href="#">
                        <img src="<?php echo $url;?>includes/images/profile/profile_7.jpg" title="Doraebu" alt="Doraebu">
                      </a>
                      <div>
                        <div class="name_user"><span>Doraebu</span></div>
                        <div class="count_comment"><span>154 Bình luận</span></div>
                      </div>
                  </li>
                  <li>
                      <a href="#">
                        <img src="<?php echo $url;?>includes/images/profile/profile_8.jpg" title="Dung Pham" alt="Dung Pham">
                      </a>
                      <div>
                        <div class="name_user"><span>Dung Pham</span></div>
                        <div class="count_comment"><span>127 Bình luận</span></div>
                      </div>
                  </li>                
                 

                </ul>
              </div>          
            </div>
    </div>
    <div class="copyright"><span>Copyright &copy; 2013 Slick.vn All Right Reserved </span></div>
  </div>
</div>

<div id="back_to_top">
</div>