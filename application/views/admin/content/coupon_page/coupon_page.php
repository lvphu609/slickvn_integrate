
<?php $url=  base_url();?>


<div id="restaurant_page">
  <div id="content_restaurant_page">
   <div class="restaurant_page_title">
     <span><div class="restaurant_page_text">Thêm thông tin khuyến mãi</div></span>
   </div>
   <div class="input_search_restaurant">
     <div class="logo_search"></div>
     <div class="box_text_search">
       <input type="text" placeholder="Tìm kiếm" class="input_text_search" id="input_text_search" />
     </div>
     <div class="image_btn_search" id="btn_search_restaurant">
     </div>
   </div>
   <div class="line_title"></div></br>
   <!--
   <div class="create_new_restaurant">
     <a href="<?php //echo $url;?>index.php/admin/admin_controller/create_new_restaurant">
        <div class="btn_create_new_restaurant">
            <div class="left"></div>
            <div class="middle"><span><div class="text_center">Thêm khuyến mãi</div></span></div>
            <div class="right"></div>
        </div>
     </a>
   </div>
   -->
   <div class="restaurant_list">
     <!--title-->
     <ul class="box_info">
       <li class="stt_restaurant">
         <span class="index_bole">STT</span>
         <div class="line_index"></div>
       </li>
<!--       <li class="code_restaurant">
         <span>Mã nhà hàng</span>
       </li>-->
       <li class="name_restaurant">
         <span class="index_bole">Tên nhà hàng</span>
         <div class="line_index"></div>
       </li>
<!--       <li class="job_restaurant">
         <span>Nghề nghiệp</span>
       </li>-->
       <li class="email_restaurant">
         <span class="index_bole">Email</span>
         <div class="line_index"></div>
       </li>
       <li class="phonenumber_restaurant">
         <span class="index_bole">Điện thoại</span>
         <div class="line_index"></div>
       </li>
<!--       <li class="company">
         <span>Công ty</span>
       </li>-->
       <li class="update_delete">
       </li>
     </ul>
     
     <!--List member-->
     <?php
            $stt=1;
         if(is_array($all_restaurant)&&  sizeof($all_restaurant)>0){
            foreach($all_restaurant as $value_res){
                         
             $id=$value_res['id'];
             $name=$value_res['name'];
             $phone_number= $value_res['phone_number'];
             $email= $value_res['email'];
             if($stt%2==0){
                    echo'
                           <ul class="box_info row_color">
                             <li class="stt_restaurant">
                               <span>'.$stt.'</span>
                             </li>
                             <li class="name_restaurant">
                               <span>'.$name.'</span>
                             </li>
                             <li class="email_restaurant">
                               <span>'.$email.'</span>
                             </li>
                             <li class="phonenumber_restaurant">
                               <span>'.$phone_number.'</span>
                             </li>
                             <li class="update_delete">
                               <a href="'.$url.'index.php/admin/admin_controller/form_add_coupon?id_restaurant='.$id.'&name_res='.$name.'"><div class="add"></div></a>
                             </li>
                           </ul>
                    ';
                }
              else{
                 echo'
                           <ul class="box_info">
                             <li class="stt_restaurant">
                               <span>'.$stt.'</span>
                             </li>
                             <li class="name_restaurant">
                               <span>'.$name.'</span>
                             </li>
                             <li class="email_restaurant">
                               <span>'.$email.'</span>
                             </li>
                             <li class="phonenumber_restaurant">
                               <span>'.$phone_number.'</span>
                             </li>
                             <li class="update_delete">
                               <a href="'.$url.'index.php/admin/admin_controller/form_add_coupon?id_restaurant='.$id.'&name_res='.$name.'"><div class="add"></div></a>
                             </li>
                           </ul>
                    ';
              }
             
             $stt=$stt+1;
            }
            
            
         }
     ?>
     
     
   </div>
   
    
    
    
    
  </div>
</div>
<input type="hidden" value="<?php echo $url;?>" id="hidUrl"> 
<script>
//search restaurant
 $('#btn_search_restaurant').click(function (){
    
    var input_text_search=$("#input_text_search").val();
    var url= $("#hidUrl").val();
    var url_search_restaurant=url+'index.php/search/search/admin_search_restaurant_coupon';
    window.location=url_search_restaurant+"?input_text_search="+input_text_search;
 
 });
 
  
  
  
  
</script>