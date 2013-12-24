<?php $url=  base_url();

?>


<div id="create_new_restaurant">
  <div id="content_create_new_restaurant">
    <div class="create_new_restaurant_title">
     <span><div class=create_new_restaurant_text">Tạo mới nhà hàng</div></span>
   </div>
   <div class="line_title"></div></br>
   
   <div class="restaurant_info_title">
     <span>Thông tin nhà hàng</span>
   </div>
   
   <div class="box_input">
     <div class="image_restaurant"> 
       <span class="title_input">ẢNH AVATAR ĐẠI DIỆN</span><br>
       <span>(Tải ảnh lên)</span>
        <script type="text/javascript" src="<?php echo $url;?>includes/plugins/post/scripts/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo $url;?>includes/plugins/post/scripts/jquery.form.js"></script>
        <script type="text/javascript" >
         $(document).ready(function() { 

            $('#photoimg').live('change', function()			{ 
                  $("#preview").html('');
                  $("#preview").html('<img src="<?php echo $url;?>includes/plugins/post/loader.gif" alt="Uploading...."/>');
                  $("#imageform").ajaxForm({
                    target: '#preview',
                    success: function(data) {
                      console.log(data);
                    }
                  }).submit();

            });
          }); 
        </script>
        <form id="imageform" method="post" enctype="multipart/form-data" action="<?php echo $url;?>include/modul_upload/avatar.php?url=<?php echo $url; ?>">
        <input type="file" name="photoimg" id="photoimg"  />
        </form>
        <div style="width:100%; height: 100%;" id='preview'>
        </div>
       
       
     </div>
     <div class="name_restaurant">
        <span class="title_input">TÊN NHÀ HÀNG*</span><br>
        <input class="input_text param_name_restauant" type="text" placeholder="vd. Hương Sen" name="" >
     </div>
     <div class="email_restaurant">
        <span class="title_input">EMAIL</span><br>
        <input  class="input_text param_email" type="text" placeholder="vd. huongsen@gmail.com" name="">
     </div>
     <div class="address_restaurant">
        <span class="title_input">ĐỊA CHỈ</span><br>
        <input class="input_text param_address" type="text" placeholder="vd. Bình Chánh district, HCMC" name="">
     </div>
     <div class="phone_number_restaurant">
        <span class="title_input">ĐIỆN THOẠI*</span><br>
        <input class="input_text param_phonenumber" type="text" placeholder="vd. 01665847138" name="">
     </div>
     <div class="website_restaurant">
        <span class="title_input">LINK WEB SITE NHÀ HÀNG</span><br>
        <input class="input_text param_link_website" type="text" placeholder="vd. http://slick.vn" name="">
     </div>
     <div class="status_active">
        <span class="title_input">TÌNH TRẠNG HOẠT ĐỘNG</span><br>
       <input class="input_text select_status_active" type="text" placeholder="vd. Đang hoạt động">
     </div>
<!--     <div class="facebock_url_profile">
        <span>FACEBOOK URL</span><br>
        <input class="input_text" type="text" placeholder="http://" name="">
     </div>
     <div class="code_restaurant_profile">
        <span>MÃ THÀNH VIÊN*</span><br>
        <input class="input_text" type="text" placeholder="vd. SLI1223" name="">
     </div>
     <div class="password_profile">
        <span>MẬT KHẨU BAN ĐẦU*</span><br>
        <input class="input_text" type="password" placeholder="vd. 123456" name="">
     </div>-->
     <div class="line_title"></div></br>
     <div class="introduce_short_restaurant">
        <span class="title_input">MÔ TẢ NGẮN VỀ NHÀ HÀNG</span><br>
        <textarea class="input_textarea param_introduce_short_restaurant" name=""></textarea>
     </div>
     <!--thời gian làm việc-->
     <div class="box_select_option">
       <span class="span_title">GIỜ LÀM VIỆC</span>
       <form>
        <ul class="list_index">
            <li>
               Giờ bắt đầu 
              <script src="<?php echo $url;?>includes/plugins/date_time_picker/jquery-1.10.2.min.js"></script>
              <script type="text/javascript" src="<?php echo $url;?>includes/plugins/date_time_picker/jquery-ui.min.js"></script>
              <script type="text/javascript" src="<?php echo $url;?>includes/plugins/date_time_picker/jquery-ui-timepicker-addon.js"></script>
               <div class="date_time_picker">
                  <div>
                    <input type="text"  id="timepicker_start_working_time" value="" />
                  </div>					
                 <script defer="true">
                  $('#timepicker_start_working_time').timepicker({
                    
                    	timeFormat: "h:mm tt"
                  });
                  </script>
                </div>
            </li>
            <li>
               Giờ kết thúc 
                 <div class="date_time_picker">
                  <div>
                    <input type="text"  id="timepicker_end_working_time" value="" />
                  </div>					
                  <script defer="true">
                  $('#timepicker_end_working_time').timepicker({
                    
                    	timeFormat: "h:mm tt"
                  });
                  </script>
                </div>
            </li>
        </ul>
        </form>
     </div>
     <!--end thoi gian lam viec-->
      <!--thời gian đăng ký nhà hàng-->
     <div class="box_select_option">
       <span class="span_title">THỜI GIAN ĐĂNG KÝ NHÀ HÀNG</span>
       <form>
        <ul class="list_index">
            <li>
               Thời gian bắt đầu
               <div class="date_time_picker">
                  <div>
                    <input type="text" name="start_date" id="start_date" value="" />
                  </div>					
                    <script defer="true">
                    $('#start_date').datetimepicker({
                      timeFormat: "hh:mm:00",
                      dateFormat: "dd-mm-yy"
                    });
                    </script>
                </div>
            </li>
            <li>
               Thời gian kết thúc
                <div class="date_time_picker">
                  <div>
                    <input type="text" name="end_date" id="end_date" value="" />
                  </div>					
                    <script defer="true">
                    $('#end_date').datetimepicker({
                      timeFormat: "hh:mm:00",
                      dateFormat: "dd-mm-yy"
                    });
                    </script>
                </div>
            </li>
        </ul>
        </form>
     </div>
     <!--end thoi gian đăng ký nhà hàng-->
      <!--menu nha hàng dùng cho tìm kiếm-->
     <div class="box_select_option">
       <span class="span_title">MENU NHÀ HÀNG</span>
        <form id="FormAddListing_Menu">
           <div id="formdata-keyvaleditor-container" class="row" style="margin-left: 0px; display: block;">
              <div id="formdata-keyvaleditor" class="append_keyvalueeditor-row">
                
                
                <div class="keyvalueeditor-row" data-orther="1">
                  <input type="text" data-status="1" class="keyvalueeditor-key keyvalueeditor_check_status" placeholder="Tên món ăn" readonly name="keyvalueeditor-action" value="">
                  <input type="text" data-status="1" class="keyvalueeditor-key keyvalueeditor_check_status" placeholder="Mô tả" readonly name="keyvalueeditor-action" value="">
                  <input type="text" data-status="1" class="keyvalueeditor-key keyvalueeditor_check_status" placeholder="Giá" readonly name="keyvalueeditor-action" value="">
                  <select class="select_menu_option" disabled >
                    <option value="n">Tùy chọn</option>
                    <option value="y">add row</option>
                  </select>
                  
                </div>
              
                
                
               </div>
           </div>
        </form>
     </div>
     <!--end menu nha hàng dùng cho tìm kiếm-->
     
     <!--phong cách ẩm thực-->
     <div class="box_select_option">
       <span class="span_title">PHONG CÁCH ẨM THỰC</span>
        <form id="FormAddListing_Culinary_Style">
          <ul class="list_index">
            
          <?php    
                foreach ($culinary_style as $value_culinary_style) {
                      echo'<li onclick="return onclickLiCheckListing_Culinary_Style(this);" >
                           '.$value_culinary_style['name'].' <span class="checkbox" id="'.$value_culinary_style['id'].'"></span>
                         </li>';
                 }
           ?>
                   
          </ul>
        </form>
     </div>
     <!--end phong cách ẩm thực-->
     
      <!--mục đích-->
     <div class="box_select_option">
       <span class="span_title">PHƯƠNG THỨC SỬ DỤNG</span>
        <form id="FormAddListing_Mode_Use_List">
          <ul class="list_index">
                  <?php 
                    foreach ($mode_use_list as $value_mode_use_list) {
                      echo'<li onclick="return onclickLiCheckListing_Mode_Use_List(this);" >
                          '.$value_mode_use_list['name'].'<span class="checkbox" id="'.$value_mode_use_list['id'].'"></span>
                            </li>';
                           }
                   ?>
             
                   
          </ul>
        </form>
     </div>
     <!--end mục đích-->
     
      <!--nhu cầu-->
     <div class="box_select_option">
       <span class="span_title">NHU CẦU</span>
        <form id="FormAddListing_Favourite_List">
          <ul class="list_index">
                  <?php 
                    foreach ($favourite_list as $value_favourite_list) {
                      echo'<li onclick="return onclickLiCheckListing_Favourite_List(this);" >
                          '.$value_favourite_list['name'].'<span class="checkbox" id="'.$value_favourite_list['id'].'"></span>
                            </li>';
                           }
                   ?>
          </ul>
          
        </form>
     </div>
     <!--end nhu cầu-->
     
      <!--hình thức thanh toán-->
     <div class="box_select_option">
       <span class="span_title">HÌNH THỨC THANH TOÁN</span>
        <form id="FormAddListing_Payment_Type_List">
          <ul class="list_index">
                <?php 
                    foreach ($payment_type_list as $value_payment_type_list) {
                      echo'<li onclick="return onclickLiCheckListing_Payment_Type_List(this);" >
                          '.$value_payment_type_list['name'].'<span class="checkbox" id="'.$value_payment_type_list['id'].'"></span>
                            </li>';
                           }
                ?>
            
          </ul>
        </form>
     </div>
     <!--end hình thức thanh toán-->
     
      <!--ngoại cảnh-->
     <div class="box_select_option">
        <span class="span_title">NGOẠI CẢNH</span>
        <form id="FormAddListing_Landscape_List">
          <ul class="list_index">
            
               <?php 
                    foreach ($landscape_list as $value_landscape_list) {
                      echo'<li onclick="return onclickLiCheckListing_Landscape_List(this);" >
                          '.$value_landscape_list['name'].'<span class="checkbox" id="'.$value_landscape_list['id'].'"></span>
                            </li>';
                           }
                ?>
                  
                   
          </ul>
        </form>
     </div>
     <!--end ngoại cảnh-->
     
     <!--giá trung bình người-->
     <div class="box_select_option">
       <span class="span_title">GIÁ TRUNG BÌNH NGƯỜI</span>
        <form id="FormAddListing_Price_Person_List">
          <ul class="list_index">
            
               <?php 
                    foreach ($price_person_list as $value_price_person_list) {
                      echo'<li onclick="return onclickLiCheckListing_Price_Person_List(this);" >
                          '.$value_price_person_list['name'].'<span class="checkbox" id="'.$value_price_person_list['id'].'"></span>
                            </li>';
                           }
                ?>
                   
          </ul>
        </form>
     </div>
     <!--end giá trung bình người-->
     
      <!--các tiêu chí khác-->
     <div class="box_select_option">
       <span class="span_title">CÁC TIÊU CHÍ KHÁC</span>
        <form id="FormAddListing_Other_Criteria_List">
          <ul class="list_index">
               <?php 
                    foreach ($other_criteria_list as $value_other_criteria_list) {
                      echo'<li onclick="return onclickLiCheckListing_Other_Criteria_List(this);" >
                          '.$value_other_criteria_list['name'].'<span class="checkbox" id="'.$value_other_criteria_list['id'].'"></span>
                            </li>';
                           }
                ?>
          </ul>
        </form>
     </div>
     <!--end các tiêu chí khác-->
     
     <!--giới thiệu nhà hàng-->
     <div class="box_select_option">
        <span class="span_title">BÀI VIẾT GIỚI THIỆU NHÀ HÀNG</span>
        <script src="<?php echo $url;?>includes/plugins/ckeditor/ckeditor.js"></script>
        <form action="#" method="post">
              <p>
                <textarea  class="ckeditor" cols="80" id="editor1" name="editor1" rows="10">
                </textarea>
              </p>
        </form>
        <div style="display: none;" id="trackingDiv" ></div>
     </div>
     <!--end giới thiệu nhà hàng-->
     
     <!--hình ảnh sử dụng cho bài viết-->
     <div class="box_select_option">
        <span class="span_title">HÌNH ẢNH SỬ DỤNG CHO BÀI VIẾT</span>
       
        <script type="text/javascript" >
                  
                 $(document).ready(function() { 
                          var stt=1;
                          $('#photoimg_post').live('change', function(){
                            var next = stt+1;
                            var new_div_preview_post = "<div class='preview_post' id='preview_post_"+next+"'></div>";
                            $("#append_img_content").append(new_div_preview_post);
                            $("#preview_post_"+stt).html('');
                            $("#preview_post_"+stt).html('<img src="<?php echo $url;?>includes/plugins/post/loader.gif" alt="Uploading...."/>');
                            $("#imageform_post").ajaxForm({
                              target: "#preview_post_"+stt

                             }).submit();
                              stt=stt+1;
                          });
                  }); 
                </script>
                <form id="imageform_post" method="post" enctype="multipart/form-data" action="<?php echo $url;?>include/modul_upload/content.php?url=<?php echo $url; ?>">
                  <div class="input_post_image_content"><input type="file" name="photoimg_post" id="photoimg_post" /></div>
                </form>
                
                <div id="append_img_content">
                  <div class="preview_post" id='preview_post_1'>
                  </div>
                  
                </div> 
     </div>
     <!--end hình ảnh sử dụng cho bài viết-->
     
     <!--carousel-->
      <div class="box_select_option">
        <span class="span_title">HÌNH ẢNH CAROUSEL</span>
         <script type="text/javascript" >
           $(document).ready(function() { 

              $('#photoimg_carousel').live('change', function()			{ 
                    $("#preview_carousel").html('');
                    $("#preview_carousel").html('<img src="<?php echo $url;?>includes/plugins/post/loader.gif" alt="Uploading...."/>');
                    $("#imageform_carousel").ajaxForm({
                      target: '#preview_carousel',
                      success: function(data) {
                        console.log(data);
                      }
                    }).submit();

              });
            }); 
          </script>
          <form id="imageform_carousel" method="post" enctype="multipart/form-data" action="<?php echo $url;?>include/modul_upload/carousel.php?url=<?php echo $url; ?>">
            <div class="input_post_image_content"><input type="file" name="photoimg" id="photoimg_carousel"  /></div>
          </form>


          <div style="text-align: center; " id='preview_carousel'>
          </div>
       </div>   
      <div class=" box_select_option_noboder">
        <form>
          <input type="checkbox" id="check_carousel">Hiện carousel trên trang home?
          <input type="hidden" id="value_carousel" value="0"/>
        </form>
      </div>
     <!--end carousel-->
     
     
     <div class="btn_save_cancel">
       <a href="javascript:;" onclick="return onclickSubmit()">
        <div class="btn_save">
          <lable><div class="center_text">Lưu</div></lable>
        </div>
       </a>
       <a href="#">
        <div class="btn_cancel">
          <lable><div class="center_text">Hủy</div></lable>
        </div>
       </a>
     </div>
   </div>
  </div>
</div>
<input type="hidden" value="<?php echo $url."index.php/admin/admin_controller/create_new_restaurant";?>" id="url_post_data" >
<script type="text/javascript" src="<?php echo $url;?>includes/plugins/post/scripts/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $url;?>includes/plugins/post/scripts/jquery.form.js"></script>
<script>
  //phong cách ẩm thực=====================================================================>
  function onclickLiCheckListing_Culinary_Style(obj){
    if($(obj).find('span').first().hasClass('checkbox')){
            $(obj).find('span').first().removeClass('checkbox').addClass('checkboxSelect');
            var myText = $(obj).text();
            var id = $(obj).find('span').first().attr('id');
            var newEle = '<input type="hidden" name="arr_culinary_style[]" class="input_culinary_style_class" id="input_culinary_style' + id + '" value="' + id + '"/>';
                        
           // $('ul.listSelectDanhBaDiaDiem').append('<li class="select' + id + '">'+ $(obj).text()+'</li>');
            $('#FormAddListing_Culinary_Style').append(newEle);
        }else{
            $(obj).find('span').first().removeClass('checkboxSelect').addClass('checkbox');
            var id=$(obj).find('span').first().attr('id');
            $("#input_culinary_style" + id ).remove();
            
           // $('ul.listSelectDanhBaDiaDiem .select' + id).remove();
        }
}

//phương thức sử dụng======================================================================>
  function onclickLiCheckListing_Mode_Use_List(obj){
    if($(obj).find('span').first().hasClass('checkbox')){
            $(obj).find('span').first().removeClass('checkbox').addClass('checkboxSelect');
            var myText = $(obj).text();
            var id = $(obj).find('span').first().attr('id');
            var newEle = '<input type="hidden" name="arr_mode_use_list[]" class="input_mode_use_list_class" id="input_mode_use_list' + id + '" value="' + id + '"/>';
                        
           // $('ul.listSelectDanhBaDiaDiem').append('<li class="select' + id + '">'+ $(obj).text()+'</li>');
            $('#FormAddListing_Mode_Use_List').append(newEle);
        }else{
            $(obj).find('span').first().removeClass('checkboxSelect').addClass('checkbox');
            var id=$(obj).find('span').first().attr('id');
            $("#input_mode_use_list" + id ).remove();
            
           // $('ul.listSelectDanhBaDiaDiem .select' + id).remove();
        }
}

//nhu cầu======================================================================>
  function onclickLiCheckListing_Favourite_List(obj){
    if($(obj).find('span').first().hasClass('checkbox')){
            $(obj).find('span').first().removeClass('checkbox').addClass('checkboxSelect');
            var myText = $(obj).text();
            var id = $(obj).find('span').first().attr('id');
            var newEle = '<input type="hidden" name="arr_favourite_list[]" class="input_favourite_list_class" id="input_favourite_list' + id + '" value="' + id + '"/>';
                        
           // $('ul.listSelectDanhBaDiaDiem').append('<li class="select' + id + '">'+ $(obj).text()+'</li>');
            $('#FormAddListing_Favourite_List').append(newEle);
        }else{
            $(obj).find('span').first().removeClass('checkboxSelect').addClass('checkbox');
            var id=$(obj).find('span').first().attr('id');
            $("#input_favourite_list" + id ).remove();
            
           // $('ul.listSelectDanhBaDiaDiem .select' + id).remove();
        }
}

//hình thức thanh toán======================================================================>
  function onclickLiCheckListing_Payment_Type_List(obj){
    if($(obj).find('span').first().hasClass('checkbox')){
            $(obj).find('span').first().removeClass('checkbox').addClass('checkboxSelect');
            var myText = $(obj).text();
            var id = $(obj).find('span').first().attr('id');
            var newEle = '<input type="hidden" name="arr_payment_type_list[]" class="input_payment_type_list_class" id="input_payment_type_list' + id + '" value="' + id + '"/>';
                        
           // $('ul.listSelectDanhBaDiaDiem').append('<li class="select' + id + '">'+ $(obj).text()+'</li>');
            $('#FormAddListing_Payment_Type_List').append(newEle);
        }else{
            $(obj).find('span').first().removeClass('checkboxSelect').addClass('checkbox');
            var id=$(obj).find('span').first().attr('id');
            $("#input_payment_type_list" + id ).remove();
            
           // $('ul.listSelectDanhBaDiaDiem .select' + id).remove();
        }
}

//ngoại cảnh======================================================================>
  function onclickLiCheckListing_Landscape_List(obj){
    if($(obj).find('span').first().hasClass('checkbox')){
            $(obj).find('span').first().removeClass('checkbox').addClass('checkboxSelect');
            var myText = $(obj).text();
            var id = $(obj).find('span').first().attr('id');
            var newEle = '<input type="hidden" name="arr_landscape_list[]" class="input_landscape_list_class" id="input_landscape_list' + id + '" value="' + id + '"/>';
                        
           // $('ul.listSelectDanhBaDiaDiem').append('<li class="select' + id + '">'+ $(obj).text()+'</li>');
            $('#FormAddListing_Landscape_List').append(newEle);
        }else{
            $(obj).find('span').first().removeClass('checkboxSelect').addClass('checkbox');
            var id=$(obj).find('span').first().attr('id');
            $("#input_landscape_list" + id ).remove();
            
           // $('ul.listSelectDanhBaDiaDiem .select' + id).remove();
        }
}

//giá trung bình người======================================================================>
  function onclickLiCheckListing_Price_Person_List(obj){
    if($(obj).find('span').first().hasClass('checkbox')){
            $(obj).find('span').first().removeClass('checkbox').addClass('checkboxSelect');
            var myText = $(obj).text();
            var id = $(obj).find('span').first().attr('id');
            var newEle = '<input type="hidden" name="arr_price_person_list[]" class="input_price_person_list_class" id="input_price_person_list' + id + '" value="' + id + '"/>';
                        
           // $('ul.listSelectDanhBaDiaDiem').append('<li class="select' + id + '">'+ $(obj).text()+'</li>');
            $('#FormAddListing_Price_Person_List').append(newEle);
        }else{
            $(obj).find('span').first().removeClass('checkboxSelect').addClass('checkbox');
            var id=$(obj).find('span').first().attr('id');
            $("#input_price_person_list" + id ).remove();
            
           // $('ul.listSelectDanhBaDiaDiem .select' + id).remove();
        }
}
//các tiêu chí khác======================================================================>
  function onclickLiCheckListing_Other_Criteria_List(obj){
    if($(obj).find('span').first().hasClass('checkbox')){
            $(obj).find('span').first().removeClass('checkbox').addClass('checkboxSelect');
            var myText = $(obj).text();
            var id = $(obj).find('span').first().attr('id');
            var newEle = '<input type="hidden" name="arr_other_criteria_list[]" class="input_other_criteria_list_class" id="input_other_criteria_list' + id + '" value="' + id + '"/>';
                        
           // $('ul.listSelectDanhBaDiaDiem').append('<li class="select' + id + '">'+ $(obj).text()+'</li>');
            $('#FormAddListing_Other_Criteria_List').append(newEle);
        }else{
            $(obj).find('span').first().removeClass('checkboxSelect').addClass('checkbox');
            var id=$(obj).find('span').first().attr('id');
            $("#input_other_criteria_list" + id ).remove();
            
           // $('ul.listSelectDanhBaDiaDiem .select' + id).remove();
        }
}

////submit======================================================================>

   //var  approval_show_carousel=1;
     
     $("#check_carousel").click(function(){
        var approval_show_carousel=parseInt($('#value_carousel').val());
        if(approval_show_carousel==1){
           $('#value_carousel').val('0');
         // alert('0');
        }
        else
          if(approval_show_carousel==0){
           $('#value_carousel').val('1');
        }
       
     
     });


 
 function onclickSubmit(){
      //alert('hello');
      var avatar=$('#image_avatar_post').val();
      //------------------------------------------------------------
      var param_name_restauant=$('.param_name_restauant').val();
      function convertVietnamese(str) { 
              str= str.toLowerCase();
              str= str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g,"a"); 
              str= str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g,"e"); 
              str= str.replace(/ì|í|ị|ỉ|ĩ/g,"i"); 
              str= str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g,"o"); 
              str= str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g,"u"); 
              str= str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g,"y"); 
              str= str.replace(/đ/g,"d"); 
              str= str.replace(/!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\;|\'| |\"|\&|\#|\[|\]|~|$|_/g,"_");
              str= str.replace(/-+-/g,"-");
              str= str.replace(/^\-+|\-+$/g,""); 

              return str; 
          }
       var folder_name=convertVietnamese(param_name_restauant);
       function uniqid() {
          var ts=String(new Date().getTime()), i = 0, out = '';
          for(i=0;i<ts.length;i+=2) {        
             out+=Number(ts.substr(i, 2)).toString(36);    
          }
          return ('d'+out);
        }
       folder_name=folder_name+uniqid();
      
      
      
      
      
      
      var param_email=$('.param_email').val();
      var param_address=$('.param_address').val();
      var param_phonenumber=$('.param_phonenumber').val();
      var param_link_website=$('.param_link_website').val();
      var param_introduce_short_restaurant=$('.param_introduce_short_restaurant').val();
      var param_link_website=$('.param_link_website').val();
    
    
    //phong cach am thuc========================================================>
      var elem_culinary_style = document.getElementsByClassName("input_culinary_style_class");
      var culinary_style="";
       for (var i = 0; i < elem_culinary_style.length; ++i) {
        if (typeof elem_culinary_style[i].value !== "undefined") {
            culinary_style +=elem_culinary_style[i].value+',';
          }
        }
      culinary_style=culinary_style.slice(0,-1);
     
     //phương thức sử dụng========================================================>
     var elem_mode_use_list = document.getElementsByClassName("input_mode_use_list_class");
      var mode_use_list="";
       for (var i = 0; i < elem_mode_use_list.length; ++i) {
        if (typeof elem_mode_use_list[i].value !== "undefined") {
            mode_use_list +=elem_mode_use_list[i].value+',';
          }
        }
        mode_use_list=mode_use_list.slice(0,-1);
        
     
      //nhu cầu========================================================>
       var elem_favourite_list = document.getElementsByClassName("input_favourite_list_class");
       var favourite_list="";
       for (var i = 0; i < elem_favourite_list.length; ++i) {
        if (typeof elem_favourite_list[i].value !== "undefined") {
            favourite_list +=elem_favourite_list[i].value+',';
          }
        }
        favourite_list=favourite_list.slice(0,-1);
      //hinh thuc thanh toan=======================================================>
      var elem_payment_type_list = document.getElementsByClassName("input_payment_type_list_class");
      var payment_type_list="";
       for (var i = 0; i < elem_payment_type_list.length; ++i) {
        if (typeof elem_payment_type_list[i].value !== "undefined") {
            payment_type_list +=elem_payment_type_list[i].value+',';
          }
        }
        payment_type_list=payment_type_list.slice(0,-1);
        
      //ngoại cảnh=======================================================>
      var elem_landscape_list = document.getElementsByClassName("input_landscape_list_class");
      var landscape_list="";
       for (var i = 0; i < elem_landscape_list.length; ++i) {
        if (typeof elem_landscape_list[i].value !== "undefined") {
            landscape_list +=elem_landscape_list[i].value+',';
          }
        }
        landscape_list=landscape_list.slice(0,-1);
      //giá trung bình người=======================================================>
      var elem_price_person_list = document.getElementsByClassName("input_price_person_list_class");
      var price_person_list="";
       for (var i = 0; i < elem_price_person_list.length; ++i) {
        if (typeof elem_price_person_list[i].value !== "undefined") {
            price_person_list +=elem_price_person_list[i].value+',';
          }
        }
        price_person_list=price_person_list.slice(0,-1);
      //các tiêu chí khác=======================================================>
      var elem_other_criteria_list = document.getElementsByClassName("input_other_criteria_list_class");
      var other_criteria_list="";
       for (var i = 0; i < elem_other_criteria_list.length; ++i) {
        if (typeof elem_other_criteria_list[i].value !== "undefined") {
            other_criteria_list +=elem_other_criteria_list[i].value+',';
          }
        }
        other_criteria_list=other_criteria_list.slice(0,-1);
      
      //noi dung bai viet=======================================================>
       var content_ckeditor=CKEDITOR.instances.editor1.getData();//nội dung chi tiết bài viết
          $('#trackingDiv').html(content_ckeditor);
          var content = $('#trackingDiv').html();
          function escapeHtml(unsafe) {
              return unsafe
                   .replace(/&/g, "&amp;")
                   .replace(/</g, "&lt;")
                   .replace(/>/g, "&gt;")
                   .replace(/"/g, "&quot;")
                   .replace(/'/g, "&#039;");
           }

         content=escapeHtml(content);

       //lấy chuổi tên image upload sử dụng cho bài viết
        var elem_img_content_post = document.getElementsByClassName("img_content_post");
        var img_content_post="";

        for (var i = 0; i < elem_img_content_post.length; ++i) {
            if (typeof elem_img_content_post[i].value !== "undefined") {
                img_content_post +=elem_img_content_post[i].value+',';
              }
            }
        img_content_post=img_content_post.slice(0,-1); //bỏ dấu phẩy cuối dòng
        //đổ chuổi tên image upload sử dụng cho bài viết vào mảng array_images_content
        var array_images_content = new Array();
        for (var i = 0; i < elem_img_content_post.length; ++i) {
            if (typeof elem_img_content_post[i].value !== "undefined") {
                array_images_content[i]=elem_img_content_post[i].value;
              }
            }
        //so sánh và lay ten nhung hinh anh có trong noi dung bài viết
        var string_image_filter="";
        for (var i = 0; i < array_images_content.length; ++i) {
                if(content.indexOf(array_images_content[i])>-1)
                  {
                    string_image_filter+= array_images_content[i]+',';
                  }

            }
        string_image_filter=string_image_filter.slice(0,-1);//bỏ ký tự phẩy cuối
        if(string_image_filter==""){
          string_image_filter="null";
        }
       //chuổi tên hình ảnh gởi lên avatar/carousel/content
       var carousel=$("#image_carousel_post").val();
      
       var str_images=avatar+","+carousel+","+string_image_filter;
       var action= "insert";
      
      //========danh sách menu
      var elem_meal_menu = document.getElementsByClassName("meal_menu");
      var elem_description_menu = document.getElementsByClassName("description_menu");
      var elem_price_menu = document.getElementsByClassName("price_menu");
      var elem_select_menu_option = document.getElementsByClassName("select_custom_menu");
      //---meal
      var str_elem_meal_menu="";
       for (var i = 0; i < elem_meal_menu.length; ++i) {
          str_elem_meal_menu +=elem_meal_menu[i].value+'###'
      
        }
        str_elem_meal_menu=str_elem_meal_menu.slice(0,-3);
      //--- description
       var str_elem_description_menu="";
       for (var i = 0; i < elem_description_menu.length; ++i) {
          str_elem_description_menu +=elem_description_menu[i].value+'###'
   
        }
        str_elem_description_menu=str_elem_description_menu.slice(0,-3);
      //--  price
        var str_elem_price_menu="";
       for (var i = 0; i < elem_price_menu.length; ++i) {
          str_elem_price_menu +=elem_price_menu[i].value+'###'
         
        }
        str_elem_price_menu=str_elem_price_menu.slice(0,-3);
     //--  option
       var str_elem_select_menu_option="";
       for (var i = 0; i < elem_select_menu_option.length; ++i) {
          str_elem_select_menu_option +=elem_select_menu_option[i].value+'###'
         
        }
        str_elem_select_menu_option=str_elem_select_menu_option.slice(0,-3);
     
     //===array
       
     var array_elem_meal_menu = str_elem_meal_menu.split('###');
     var array_elem_description_menu=str_elem_description_menu.split('###');
     var array_elem_price_menu=str_elem_price_menu.split('###');
     var array_elem_select_menu_option=str_elem_select_menu_option.split('###');
    //data sent 
      var dish_list="";
       for (var i = 0; i < array_elem_meal_menu.length; ++i) {
         if(array_elem_meal_menu[i]!=""){
           dish_list+=array_elem_meal_menu[i]+'*100#'
                          +array_elem_description_menu[i]+'*100#'
                          +array_elem_price_menu[i]+'*100#'
                          +array_elem_select_menu_option[i]
                          +' *101# ';
           
         }
         
        }
        dish_list=dish_list.slice(0,-6);
       // alert(dish_list);
        //str_elem_select_menu_option=str_elem_select_menu_option.slice(0,-3);
     
    
     
     
     
     
     
     
     
     
     
     
     
         
      /*
       
          //array====
      //---meal
      var arr_elem_meal_menu = [];//<===
       for (var i = 0; i < elem_meal_menu.length; ++i) {
         arr_elem_meal_menu.push(elem_meal_menu[i].value);
        }
      //--- description
       var arr_elem_description_menu=[];//<===
       for (var i = 0; i < elem_description_menu.length; ++i) {
         arr_elem_description_menu.push(elem_meal_menu[i].value);
        }
      //-- price 
        var arr_elem_price_menu=[];//<===
       for (var i = 0; i < elem_price_menu.length; ++i) {
         arr_elem_price_menu.push(elem_meal_menu[i].value);
        }
     //--option  
        var arr_elem_select_menu_option=[];//<===
       for (var i = 0; i < elem_select_menu_option.length; ++i) {
         arr_elem_select_menu_option.push(elem_meal_menu[i].value);
        }
     //===>string send
     var meal_list_menu="";
      for (var i = 0; i < elem_meal_menu.length; ++i) {
        if(typeof elem_meal_menu[i]!== "undefined"){
             meal_list_menu +=arr_elem_meal_menu[i].value+'*100#'
                             +arr_elem_description_menu[i].value+'*100#'
                             +arr_elem_price_menu[i].value+'*100#'
                             +arr_elem_select_menu_option[i].value+'*100#'
                             +' *101# ';
       
          }
       }
       alert(meal_list_menu);
       */   
      
  // alert('các tiêu chí khác: '+other_criteria_list);
   /*
      alert('image avatar: '+avatar);
      alert('ten nha hang: '+param_name_restauant);
      alert('email: '+param_email);
      alert('adress: '+param_address);
      alert('phone number: '+param_phonenumber);
      alert('link website: '+param_link_website);
      alert('mô tả ngắn: '+param_introduce_short_restaurant);
      alert('phong cach am thuc: '+culinary_style);
      alert('phuong thuc su dung: '+mode_use_list);
      alert('nhu cầu: '+favourite_list);
      alert('hinh thức thanh toán: '+payment_type_list);
      alert('ngoai cảnh: '+landscape_list);
      alert('giá trung bình người: '+price_person_list);
      alert('các tiêu chí khác: '+other_criteria_list);
      alert('nội dung bài viết: '+content);
      alert('mảng hình: '+str_images);
      alert('action: '+action);
    
    */
    
     /*temp*/
     //var  id_menu_dish = "";//complet
     var  city="TP HCM";
     var  district="Phạm Hùng";
     
     var  start_date=$('#start_date').val();
     var  end_date = $('#end_date').val();
     var  working_time= $('#timepicker_start_working_time').val()+' - '+$('#timepicker_end_working_time').val();
     var  status_active =$('.select_status_active').val();//tạm ngưng
     var approval_show_carousel=parseInt($('#value_carousel').val());
    // alert(str_images);
     
     var url_api=$("#url_post_data").val();
     //alert(dish_list);
     var data={
                
                dish_list : dish_list,          
                name      :    param_name_restauant,
                address   :    param_address,           
                city      :    city,               
                district  :    district,           
                array_image:   str_images,
                link_to    :   param_link_website,          
                phone_number : param_phonenumber,       
                working_time :  working_time,         
                status_active : status_active,         
                favourite_list: favourite_list,       
                price_person_list:  price_person_list,     
                culinary_style_list : culinary_style,    
                mode_use_list :   mode_use_list,       
                payment_type_list: payment_type_list,       
                landscape_list :   landscape_list,      
                other_criteria_list : other_criteria_list,    
                introduce :   content,  
                start_date :  start_date,         
                end_date  :   end_date,
                folder_name: folder_name,
                email: param_email,
                desc: param_introduce_short_restaurant,
                approval_show_carousel: approval_show_carousel

          }
         // alert(str_images);
 
    $.ajax({
          url: url_api ,
          type: 'POST',
          data:data,
          success: function(data){
            
            //alert('them thanh cong');
           // location.reload();
           alert(dish_list);
            
          },

         //timeout:5000,
         error: function(a,textStatus,b){
           alert('khong thanh cong');
         }
       });
   
 }


  
</script>

<input type="hidden" id="hdData_status" value="1">
<div class="append_add_menu_restaurant">
  <div class="remove_add_menu_restaurant_1">
    <script>
    //thêm menu nhà hàng 
//     $(function(){
//        var data_status=parseInt($('#hdData_status').val());
//        $('.keyvalueeditor_check_status').click(function (){
//            var get_data_status=parseInt($(this).attr('data-status'));
//         //   alert(data_status);
//            
//
//            if(get_data_status==data_status){
//              
//              data_status=data_status+1;
//              $('#hdData_status').val(data_status);
//              var keyvalueeditor_string="<div class=\"keyvalueeditor-row \">\n\
//                      <input type=\"text\" data-status=\""+data_status+"\" class=\"keyvalueeditor-key keyvalueeditor_check_status\" placeholder=\"Tên món ăn\" name=\"keyvalueeditor-action\" value=\"\">\n\
//                      <input type=\"text\" data-status=\""+data_status+"\" class=\"keyvalueeditor-key keyvalueeditor_check_status\" placeholder=\"Mô tả\" name=\"keyvalueeditor-action\" value=\"\">\n\
//                      <input type=\"text\" data-status=\""+data_status+"\" class=\"keyvalueeditor-key keyvalueeditor_check_status\" placeholder=\"Giá\" name=\"keyvalueeditor-action\" value=\"\">\n\
//                      <select class=\"select_menu_option\"><option value=\"N\">Món bình thường</option>\n\
//                      <option value=\"Y\">Món đặt biệt</option>\n\
//                      </select>\n\
//                     </div>";
//              $('.append_keyvalueeditor-row').append(keyvalueeditor_string);
//            //  $('.append_add_menu_restaurant').append(append_add_menu_restaurant);
//             // $('.remove_add_menu_restaurant').remove();
//
//          }
//            else{
//              alert('not append');
//            }
//
//
//
//        });

     $(function(){
        var data_status=1;
        $('#formdata-keyvaleditor').find('input').parent().click(function(index) {
           if(parseInt($(this).find('input').attr('data-status'))==1){
             
            var data_status_next=data_status+1;
            data_status=data_status+1;
            var keyvalueeditor_string="<div class=\"keyvalueeditor-row \">\n\
                      <input type=\"text\" data-status=\""+data_status_next+"\" class=\"keyvalueeditor-key keyvalueeditor_check_status meal_menu \" placeholder=\"Tên món ăn\" name=\"keyvalueeditor-action\" value=\"\">\n\
                      <input type=\"text\" data-status=\""+data_status_next+"\" class=\"keyvalueeditor-key keyvalueeditor_check_status description_menu \" placeholder=\"Mô tả\" name=\"keyvalueeditor-action\" value=\"\">\n\
                      <input type=\"text\" data-status=\""+data_status_next+"\" class=\"keyvalueeditor-key keyvalueeditor_check_status price_menu \" placeholder=\"Giá\" name=\"keyvalueeditor-action\" value=\"\">\n\
                      <select class=\"select_menu_option select_custom_menu \"><option value=\"N\">Món bình thường</option>\n\
                      <option value=\"Y\">Món đặt biệt</option>\n\
                      </select>\n\
                     </div>";
            $('.append_keyvalueeditor-row').append(keyvalueeditor_string);
            $('#hdData_status').val(data_status_next);
            
           }
        });
       
     });
 

            
            
                        
     </script>
   </div>
 </div>

<!--date time picker-->
<script type="text/javascript">
			
			$(function(){
				$('.date_time_picker > script').each(function(i){
					eval($(this).text());
				});
			});
			
</script>