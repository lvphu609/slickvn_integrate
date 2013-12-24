
<?php $url=  base_url();?>
<div id="result_search_post">
  <div class="box_search_post_center">
<?php 
  if(is_array($result_search_post)){
    foreach ($result_search_post as $value_result_search_post){
        
        $id                    =$value_result_search_post['id'];
        $id_user               =$value_result_search_post['id_user'];
        $title                 =$value_result_search_post['title'];
        $avatar                =$value_result_search_post['avatar'];
        $address               =$value_result_search_post['address'];
       
      

        $favourite_type_list   =$value_result_search_post['favourite_type_list'];
        $favourite_type_list=substr($favourite_type_list, 1); 
        
        $price_person_list     =$value_result_search_post['price_person_list'];
        $price_person_list=substr($price_person_list, 1); 
        
        $culinary_style_list   =$value_result_search_post['culinary_style_list'];
        $culinary_style_list=substr($culinary_style_list, 1); 
        
        
        $ontent               =$value_result_search_post['content'];
        $number_assessment     =$value_result_search_post['number_assessment'];
        
        $rate_point            =$value_result_search_post['rate_point'];
        $rate_point =round($rate_point,1);
        
        $number_view           =$value_result_search_post['number_view'];
        $reated_date          =$value_result_search_post['created_date'];
       
        
        echo' 
         <ul>
            <li>
               <a href="'.$url.'/index.php/detail_post/detail_post?id_post='.$id.'">
                 <div class="left">
                   <img src="'.$BASE_IMAGE_POST_URL.$avatar.'">
                 </div>
               </a>
               <div class="mid">
                 <div class="title">
                   <a href="#">
                     <span class="text_title">'.$title.'</span>
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
                              '.$price_person_list.'<br>                                
                     <span>Phong cách ẩm thực</span>:
                              '.$culinary_style_list.' <br>  
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
             </li>
          </ul>';
     
     
     
   }
  }
 else {
    
 }

   //kết quả tìm kiếm thông tìm thấy
   if(count($result_search_post)==0){
     
       echo '<div style="width: 100%; height: 100px; text-align: center; color: #FFF; margin-top: 20px;">
            <span style="font-size: 20px; font-weight: bold;">Bài viết không có kết nào cho từ khóa bạn muốn tìm!</span>
           </div>';
     
   }
        

?>


    
    
    
    
    
    
    
    
    
    
    
  </div>
</div>