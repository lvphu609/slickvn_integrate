<?php $url = base_url();
      $url_res_frofile=$link_restaurant_frofile;
     
?>
<div id="slideshow">
<div class="slide_show">
    <div class="slide_show_custom_center">
        <div class="box_slide_show">
         
        <!--carousel-->
        <!--<a id="but_prev" href="#">PREV</a> | <a id="but_pause" href="#">PAUSE</a> | <a id="but_start" href="#">START</a> | <a id="but_next" href="#">NEXT</a> -->
            <div class="carousel-container">    
              <div id="carousel">
                
                <!--carousel----------->
                <?php
                
                 foreach ($carousel_list as $value_carousel_list){ 
                   $name=$value_carousel_list['name'];
                   $address=$value_carousel_list['address'];
                   $image_link=$value_carousel_list['image_carousel_link'];
                   $link_to=$value_carousel_list['link_to'];
                   $id_restaurant=$value_carousel_list['id'];
                   $link_to_detail_restaurant=$url."index.php/detail_restaurant/detail_restaurant?id_restaurant=".$id_restaurant;
                   
                   echo'<div class="carousel-feature">
                    <a href="'.$link_to_detail_restaurant.'"><img class="carousel-image" alt="Image Caption" src="'.$url_res_frofile.$image_link.'"></a>
                    <div class="carousel-caption">
                      <div class="text_align_center">
                        <span>
                          <b>'.$name.'</b><br><br>
                          '.$address.'
                          </span>
                       </div>
                      </div>
                   </div>';
                         
                 }
                 ?>
                <!--end carousel-->
                
              </div>
            </div>
          
          <script type="text/javascript">
           $(document).ready(function() {
             var carousel = $("#carousel").featureCarousel({
               // include options like this:
               // (use quotes only for string values, and no trailing comma after last option)
               // option: value,
               // option: value
             });

             $("#but_prev").click(function () {
               carousel.prev();
             });
             $("#but_pause").click(function () {
               carousel.pause();
             });
             $("#but_start").click(function () {
               carousel.start();
             });
             $("#but_next").click(function () {
               carousel.next();
             });
           });
         </script>  
       <!--carousel--> 
       <!--custom center li-->
       <script>
         $(function(){
           
         });
       </script>
       <!--end custom center-->
    </div>
  </div>
 </div>
</div>