<?php $url=  base_url();?>
<?php 
    //var_dump($info_post);
    foreach ($info_post as $value_info_post){
      $id                  =  $value_info_post['id'];
      $id_user             =  $value_info_post['id_user'];
      $title               =  $value_info_post['title'];
      $avatar              =  $value_info_post['avatar'];
      $address             =  $value_info_post['address'];
      $favourite_type_list =  $value_info_post['favourite_type_list'];
      $price_person_list   =  $value_info_post['price_person_list'];
      $culinary_style_list =  $value_info_post['culinary_style_list'];
      
      $content             =  $value_info_post['content'];
      //noi dung gioi thieu, tim va thay the folder_image_introduce_detail_page bang duong dan host
      $content = htmlspecialchars_decode ($content);
      $content =  str_replace("folder_image_post_replace",$link_image_post_url, $content);
      
      
      $number_assessment   =  $value_info_post['number_assessment'];
      $rate_point          =  $value_info_post['rate_point'];
      $number_view         =  $value_info_post['number_view'];
      $updated_date        =  $value_info_post['updated_date'];
      $created_date        =  $value_info_post['created_date'];
    
    
    }
    
    ?>

<div id="detail_post">
  <div class="detail_post_center">
    <div class="left_detail_post">
      <div class="view_info_post">
        <span>Ngày tạo: <?php echo $created_date;?></span>&nbsp;&nbsp;&nbsp;
        <span>Lượt xem: <?php echo $number_view;?></span>
      </div>
      <div class="box_detail_post">
        <?php  echo $content;?>
      </div>
    </div>
    <div class="right_detail_post">
      <ul>
        <?php 
           // var_dump($post_similar);
            if(is_array($post_similar)&&  sizeof($post_similar)>0){
              foreach ($post_similar as $value) {
                $id_similar                  =$value['id'];
                $id_user_similar             =$value['id_user'];
                $title_similar               =$value['title'];
                $title_similar=substr($title_similar,0,120) . '...';
                $avatar_similar              =$value['avatar'];
                $avatar_similar  =$BASE_IMAGE_POST_URL.$avatar_similar;
                $address_similar             =$value['address'];
                $favourite_type_list_similar =$value['favourite_type_list'];
                $price_person_list_similar   =$value['price_person_list'];
                $culinary_style_list_similar =$value['culinary_style_list'];
                $content_similar             =$value['content'];
                $number_assessment_similar   =$value['number_assessment'];
                $rate_point_similar          =$value['rate_point'];
                $number_view_similar         =$value['number_view'];
                $updated_date_similar        =$value['updated_date'];
                $created_date_similar        =$value['created_date'];
              
            
        ?>
        <li>
          <a href="<?php echo $url;?>/index.php/detail_post/detail_post?id_post=<?php echo $id_similar; ?>">
            <div class="box_img_post">
              <img class="img_post" src="<?php echo $avatar_similar;?>">
            </div>
            <div class="box_short_content_post">
              <div class="title">
                <p><?php echo $title_similar; ?></p>
              </div>
            </div>
          </a>
        </li>
        <?php 
              }
            }
        ?>
        
      </ul>
    </div>
  </div>
</div>