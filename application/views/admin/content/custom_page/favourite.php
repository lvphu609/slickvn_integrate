
<?php $url=  base_url();?>


<div id="custom_favourite">
  <div id="content_custom_favourite">
   <div class="custom_favourite_title">
     <span style="font-size: 15px;"><div class=member_page_text">Tùy chỉnh > Quản lý mục tìm kiếm > Nhu cầu</div></span>
   </div>
   <div class="create_new_member">
     <a href="<?php echo $url;?>index.php/admin/admin_controller/create_new_member">
        <div class="btn_create_new_member">
            <div class="left"></div>
            <div class="middle"><span><div class="text_center">Tạo nhu cầu mới</div></span></div>
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
         <span class="index_bole">Nhu cầu</span>
         <div class="line_index"></div>
       </li>
<!--       <li class="job_member">
         <span>Nghề nghiệp</span>
       </li>-->
       <li class="email_member">
        <span class="index_bole">Trạng thái</span>
         <div class="line_index"></div>
       </li>
       <li class="phonenumber_member">
<!--         <span class="index_bole">Điện thoại</span>
         <div class="line_index"></div>-->
       </li>
<!--       <li class="company">
         <span>Công ty</span>
       </li>-->
       <li class="update_delete">
         
       </li>
     </ul>
     
     
<?php 
$stt=1;
if(is_array($favourite_list)&&  sizeof($favourite_list)>0){
foreach ($favourite_list as $value){
      
      $id              =$value['id'];
      $name            =$value['name'];
      $approval        =$value['$approval'];
      
    if($stt%2==0){?>
      
         <ul class="box_info row_color">
            <li class="stt_member">
              <span><?php echo $stt; ?></span>
            </li>
            <li class="name_member">
              <input class="disabled" type="text" value="<?php echo $name;?>" disabled>  
            </li>
            <li class="email_member">
              <input type="checkbox" disabled <?php if(strcmp($approval,"1")==0){echo "checked";} ?> >
            </li>
            <li class="phonenumber_member">
             
            </li>
            <li class="update_delete">
              <a href="javascript:;" class="view_edit_user"  data-value_edit="'.$id.'"><div class="edit"></div></a>
              <a href="javascript:;" class="delete_user" data-value_delete="'.$id.'"><div class="delete" ></div></a>  
            </li>
          </ul>   

      
<?php    }
    else{
      ?>

         <ul class="box_info ">
            <li class="stt_member">
              <span><?php echo $stt; ?></span>
            </li>
            <li class="name_member">
               <input class="disabled" type="text" value="<?php echo $name;?>" disabled> 
            </li>
            <li class="email_member">
               <input type="checkbox" disabled <?php if(strcmp($approval,"1")==0){echo "checked";} ?> >
            </li>
            <li class="phonenumber_member">
             
            </li>
            <li class="update_delete">
              <a href="javascript:;" class="view_edit_user"  data-value_edit="'.$id.'"><div class="edit"></div></a>
              <a href="javascript:;" class="delete_user" data-value_delete="'.$id.'"><div class="delete" ></div></a>  
            </li>
          </ul>   

    
      
 <?php   }
     
  $stt++;
  
}
}
?>
     
   </div>
  </div>
</div>
<?php $url=  base_url(); ?>
<input type="hidden" value="<?php echo $url."index.php/admin/admin_controller/view_edit_user";?>" id="hdUrl_edit_user" >
<input type="hidden" value="<?php echo $url."index.php/admin/admin_controller/delete_user";?>" id="hdUrl_delete_user" >
<input type="hidden" value="<?php echo $url;?>" id="hidUrl"> 
<script>
  
   $(document).ready(function () {
         $('.delete_member').hide();
      });
  
  $(".view_edit_user").click(function (){
    
  });
  $(".delete_user").click(function (){
      $(this).parent().parent().addClass('select_delete');
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
       
       
       
  });
  
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

