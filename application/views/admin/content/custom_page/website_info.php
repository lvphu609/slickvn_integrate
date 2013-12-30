
<?php $url=  base_url();?>


<div id="website_info_page">
  <div id="content_website_info_page">
   <div class="website_info_page_title">
     <span><div class=member_page_text">Thông tin website</div></span>
   </div>
   <div class="create_new_member">
     <a href="<?php echo $url;?>index.php/admin/admin_controller/create_new_website_info">
        <div class="btn_create_new_member">
            <div class="left"></div>
            <div class="middle"><span><div class="text_center">Tạo mới</div></span></div>
            <div class="right"></div>
        </div>
     </a>
   </div>
   <div class="input_search_member">
     <div class="logo_search"></div>
     <div class="box_text_search">
       <input type="text" placeholder="Tìm kiếm" class="input_text_search" id="input_text_search" />
     </div>
     <div class="image_btn_search" id="btn_search_member">
     </div>
   </div>
    
   <div class="line_title"></div></br>
   
   <div class="member_list">
     <!--title-->
     <ul class="box_info">
       <li class="stt_member">
         <span class="index_bole">STT</span>
         <div class="line_index"></div>
       </li>
<!--       <li class="code_member">
         <span>Mã thành viên</span>
       </li>-->
       <li class="name_member">
         <span class="index_bole">Tên mô tả</span>
         <div class="line_index"></div>
       </li>
<!--       <li class="job_member">
         <span>Nghề nghiệp</span>
       </li>-->
       <li class="email_member">
         <span class="index_bole">Từ khóa viết tắt</span>
         <div class="line_index"></div>
       </li>
       <li class="phonenumber_member">
         <span class="index_bole">Trạng thái</span>
         <div class="line_index"></div>
       </li>
<!--       <li class="company">
         <span>Công ty</span>
       </li>-->
       <li class="update_delete">
         
       </li>
     </ul>
     
     
<?php 
$stt=1;
if(is_array($website_info_list)&&  sizeof($website_info_list)>0){
foreach ($website_info_list as $value){
      
      $id              =$value['id'];
      $code       =$value['code'];
      $name           =$value['name'];
      $content    =$value['content'];
      $approval         =$value['approval'];
      $checked="";
      if($approval==1){$checked= "checked";}
      
    if($stt%2==0){
      echo'
         <ul class="box_info row_color">
            <li class="stt_member">
              <span>'.$stt.'</span>
            </li>
            <li class="name_member">
              <span>'.$name.'</span>
            </li>
            <li class="email_member">
              <span>'.$code.'</span>
            </li>
            <li class="phonenumber_member">
              <input onclick="return status_check(this);"  id="status_item" type="checkbox" disabled="disabled" '.$checked.'  >
            </li>
            <li class="update_delete">
              <a href="javascript:;" onclick="return edit_item(this)" class="view_edit_user"  data-value_edit="'.$id.'"><div class="edit"></div></a>
              <a href="javascript:;" class="delete_user" data-value_delete="'.$id.'"><div class="delete" ></div></a>  
            </li>
          </ul>   

      ';
    }
    else{
      
       echo'
         <ul class="box_info ">
            <li class="stt_member">
              <span>'.$stt.'</span>
            </li>
            <li class="name_member">
              <span>'.$name.'</span>
            </li>
            <li class="email_member">
              <span>'.$code.'</span>
            </li>
            <li class="phonenumber_member">
              <input onclick="return status_check(this);"  id="status_item" type="checkbox" disabled="disabled" '.$checked.'  >
            </li>
            <li class="update_delete">
              <a href="javascript:;" onclick="return edit_item(this)" class="view_edit_user"  data-value_edit="'.$id.'"><div class="edit"></div></a>
              <a href="javascript:;" class="delete_user" data-value_delete="'.$id.'"><div class="delete" ></div></a>  
            </li>
          </ul>   

      ';
      
    }
     
     
     
      
  $stt++;
  
}
}
?>
     
   </div>
  </div>
</div>
<?php $url=  base_url(); ?>
<input type="hidden" value="<?php echo $url."index.php/admin/admin_controller/form_edit_item_website_info";?>" id="hidUrl_edit_item" >
<input type="hidden" value="<?php echo $url."index.php/admin/admin_controller/delete_user";?>" id="hdUrl_delete_user" >
<input type="hidden" value="<?php echo $url;?>" id="hidUrl"> 
<script>
  
   $(document).ready(function () {
         $('.delete_member').hide();
      });
  
  function edit_item(object){
    var url=$("#hidUrl_edit_item").val();
    var data_value_edit=$(object).attr('data-value_edit');
    window.location=url+"?param_id="+data_value_edit;
  };
  
  
  
  
  function delete_item(object){
      $(object).parent().parent().addClass('select_delete');
      var url=$("#hdUrl_delete_user").val();
      var data_value_delete=$(this).attr('data-value_delete');
   
      $( ".delete_member" ).dialog({
          title: "Thông báo", 
          show: "scale",
          hide: "explode",
          closeOnEscape: true,
          modal: true,
          minWidth: 200,
          minHeight: 200,

          resizable: false,
          height:200,
          modal: true,
          buttons: {
            "Xóa": function() {
              window.location=url+"?param_id="+data_value_delete;
              $( this ).dialog( "close" );
            },
            "Hủy": function() {
              $(".delete_user").parent().parent().removeClass('select_delete');
              $( this ).dialog( "close" );
            }
          }
    
      });
       
       
       
  };
  
 //search member
 $('#btn_search_member').click(function (){
    
    var input_text_search=$("#input_text_search").val();
    var url= $("#hidUrl").val();
    var url_search_member=url+'index.php/search/search/admin_search_member';
    window.location=url_search_member+"?input_text_search="+input_text_search;
 
 });
 
  
  
  
  
</script>

  <div class="delete_member" title="Thông báo">  
    <lable class="label">Bạn có chắc muốn xóa dữ liệu đang chọn không!</lable></br>
    <!--<button type="button" id="btnYes" class="btn btn-warning">Đồng ý</button>
    <button type="button" id="btnNo" class="btn btn-warning">Hủy</button>-->
  </div>

