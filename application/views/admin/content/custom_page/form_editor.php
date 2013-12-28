<?php $url=  base_url(); ?>
<div id="form_editor">
 <div id="content_form_editor">
   <div class="form_editor_title">
     <span><div class="main_page_text"><?php echo $title_item; ?></div></span>
   </div>
   <div class="line_title"></div></br>
   <ul class="box_out">
     
     <div class="editor_custom">
      <form action="#" method="post">
         <p>
           <textarea  class="ckeditor" cols="80" id="editor1" name="editor1" rows="10">

           </textarea>
         </p>
       </form>
       <div style="display: none;" id="trackingDiv" ></div>
     </div>
     
      <ul class="image_content_post">
             <li>
              <span>Hình ảnh sử dụng cho nội dung</span><br>
              
               <script type="text/javascript" src="<?php echo $url;?>includes/plugins/post/scripts/jquery.min.js"></script>
               <script type="text/javascript" src="<?php echo $url;?>includes/plugins/post/scripts/jquery.form.js"></script>
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
                <input type="file" name="photoimg_post" id="photoimg_post" />
                </form>
                
                <div id="append_img_content">
                  <?php 
                   /* if(count($res_image_introduce_link)!=0){
                      $stt_res_image_introduce_link=1;
                      foreach ($res_image_introduce_link as $value_res_image_introduce_link){
                        $image_name=$value_res_image_introduce_link;
                        $image_name = explode("/", $image_name);
                        $image_name=$image_name[3];
                        echo' <div class="preview_post" id="preview_post_">
                                <img style="width:100px; height: 100px;" src="'.$link_restaurant_frofile.$value_res_image_introduce_link.'" class="preview">
                                <input type="hidden" value="'.$image_name.'" class="img_content_post img_content_post_old" name="img_content_post[]">
                              </div>';
                      }
                    }*/
                  ?>
                  
                  <div class="preview_post" id='preview_post_1'>
                  </div>
                  
                </div>
              
              <!--end ajax upload button-->
            </li>
       </ul>
       
       <div class="btn_save_cancel">
       <a href="javascript:;" onclick="return submit_save_info()">
        <div class="btn_save">
          <lable><div class="center_text">Lưu</div></lable>
        </div>
       </a>
       <a href="javascript:;">
        <div class="btn_cancel">
          <lable><div class="center_text">Hủy</div></lable>
        </div>
       </a>
     </div>
     
     
   </ul>
   
 </div>
</div>
<input id="hidUrl" value="<?php echo $url; ?>" type="hidden">
<input id="field_value" value="<?php echo $field_value; ?>" type="hidden">
<input id="id_item" value="1" type="hidden">
<script>
CKEDITOR.replace( '#editor1', {
	fullPage: true,
	allowedContent: true
});

function submit_save_info(){

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
        //danh sach cac hinh su dung trong noi dung gioi thieu    
        string_image_filter=string_image_filter.slice(0,-1);//bỏ ký tự phẩy cuối
        if(string_image_filter==""){
          string_image_filter="null";
        }
        //lấy chuổi tên image upload củ---------
        var elem_img_content_post_old = document.getElementsByClassName("img_content_post_old");
       
       //đổ chuổi tên image upload củ vào mảng array_img_content_post_old
        var array_img_content_post_old = new Array();
        for (var i = 0; i < elem_img_content_post_old.length; ++i) {
            if (typeof elem_img_content_post_old[i].value !== "undefined") {
                array_img_content_post_old[i]=elem_img_content_post_old[i].value;
              }
            }
       //so sanh hình củ với nội dung và tìm những image đã xóa
        var string_image_delete_filter="";
        for (var i = 0; i < array_img_content_post_old.length; ++i) {
                if(content.indexOf(array_img_content_post_old[i])==-1)
                  {
                    string_image_delete_filter+= array_img_content_post_old[i]+',';
                  }

            }
       string_image_delete_filter=string_image_delete_filter.slice(0,-1);
       if(string_image_delete_filter==""){
         string_image_delete_filter="null";
       } 
        
      var field_value = $("#field_value").val();
      var id =$('#id_item').val();

     var url=$("#hidUrl").val();
     var url_api=url+"index.php/admin/admin_controller/update_terms_slick";
     
     var data={ content: content,
                string_image_filter : string_image_filter,
                string_image_delete_filter:string_image_delete_filter,        
                field_value    :    field_value,
                id              :id
          }
       
     
      $.ajax({
          url: url_api ,
          type: 'POST',
          data:data,
          success: function(data){
            //window.location=url+"index.php/admin/admin_controller/restaurant_page";
            alert(data);
          },
         error: function(a,textStatus,b){
           alert('khong thanh cong');
         }
       });  
     

    
        
        
       
    }




</script>