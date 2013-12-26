
<?php $url=  base_url();?>


<div id="custom_view_page">
  <div id="content_custom_view_page">
   <div class="custom_view_page_title">
     <span><div class=custom_view_page_text">Tùy chỉnh hiển thị</div></span>
   </div>
   <div class="line_title"></div></br>
   
   <div class="custom_view_list">
     <!--title-->
     <ul class="box_info">
       <li class="stt_custom_view">
         <span class="index_bole">STT</span>
         <div class="line_index"></div>
       </li>
<!--       <li class="code_custom_view">
         <span>Mã thành viên</span>
       </li>-->
       <li class="name_custom_view">
         <span class="index_bole">Mô tả</span>
         <div class="line_index"></div>
       </li>
<!--       <li class="job_custom_view">
         <span>Nghề nghiệp</span>
       </li>-->
       <li class="email_custom_view">
         <span class="index_bole">Số lượng hiển thị</span>
         <div class="line_index"></div>
       </li>
<!--       <li class="phonenumber_custom_view">
         <span class="index_bole">Điện thoại</span>
         <div class="line_index"></div>
       </li>-->
<!--       <li class="company">
         <span>Công ty</span>
       </li>-->
       <li class="update_delete">
         
       </li>
     </ul>

         <ul class="box_info row_color">
            <li class="stt_custom_view">
              <span>1</span>
            </li>
            <li class="name_custom_view">
              <span>Nhà hàng mới nhất</span>
            </li>
            <li class="email_custom_view">
              <input type="text" >
            </li>
            <li class="phonenumber_custom_view">
              
            </li>
            <li class="update_delete">
              <a href="javascript:;" class="view_edit_user" onclick="return save_custom_view_page(this)"><div class="edit"></div></a>
            </li>
          </ul> 
      
    
         <ul class="box_info ">
            <li class="stt_custom_view">
              <span>2</span>
            </li>
            <li class="name_custom_view">
              <span>Nhà hàng gần đây</span>
            </li>
            <li class="email_custom_view">
              <input type="text" >
            </li>
            <li class="phonenumber_custom_view">
              <span></span>
            </li>
            <li class="update_delete">
              <a href="javascript:;" class="view_edit_user" onclick="return save_custom_view_page(this)"><div class="edit"></div></a>            
            </li>
          </ul>   
          
          <ul class="box_info row_color">
            <li class="stt_custom_view">
              <span>3</span>
            </li>
            <li class="name_custom_view">
              <span>Nhà hàng khuyến mãi</span>
            </li>
            <li class="email_custom_view">
              <input type="text" >
            </li>
            <li class="phonenumber_custom_view">
              <span></span>
            </li>
            <li class="update_delete">
              <a href="javascript:;" class="view_edit_user" onclick="return save_custom_view_page(this)"><div class="edit"></div></a>
            </li>
          </ul> 
         
          <ul class="box_info ">
            <li class="stt_custom_view">
              <span>4</span>
            </li>
            <li class="name_custom_view">
              <span>Số lượng bài viết</span>
            </li>
            <li class="email_custom_view">
              <input type="text" >
            </li>
            <li class="phonenumber_custom_view">
              
            </li>
            <li class="update_delete">
              <a href="javascript:;" class="view_edit_user" onclick="return save_custom_view_page(this)"><div class="edit"></div></a>            
            </li>
          </ul> 
     
 
     
   </div>
  </div>
</div>
<?php $url=  base_url(); ?>
<input type="hidden" value="<?php echo $url;?>" id="hidUrl"> 
<script>
  function save_custom_view_page(object){
    var div_loading='<div id="save_loading"></div>';
    var div_save_success='<div id="save_success"></div>';
    $(object).closest('ul').find('.phonenumber_custom_view').append(div_loading);
  } 
</script>
