
<?php $url=  base_url();?>


<div id="custom_favourite">
  <div id="content_custom_favourite">
   <div class="custom_favourite_title">
     <span style="font-size: 15px;"><div class=member_page_text">Tùy chỉnh > Quản lý mục tìm kiếm > Nhu cầu</div></span>
   </div>
   <div class="create_new_member">
     <a href="javascript:;">
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
      $approval        =$value['approval'];
      
    if($stt%2==0){?>
      
         <ul class="box_info row_color">
            <input type="hidden" value="<?php echo $id; ?>" id="id_item">
            <input type="hidden" value="<?php echo $approval;  ?>" id="approval_item">
            <li class="stt_member">
              <span><?php echo $stt; ?></span>
            </li>
            <li class="name_member">
              <input id="name_item" class="disabled" type="text" value="<?php echo $name;?>" disabled="disabled">  
            </li>
            <li class="email_member">
              <input onclick="return status_check(this);"  id="status_item" type="checkbox" disabled="disabled" <?php if($approval==1){echo "checked";} ?> >
            </li>
            <li class="phonenumber_member">
             
            </li>
            <li class="update_delete">
              <a href="javascript:;" onclick="return edit_item(this);"  data-value_edit="'.$id.'"><div class="edit"></div></a>
              <a href="javascript:;" class="delete_item" onclick="return delete_item(this);" data-value_delete="'.$id.'"><div class="delete" ></div></a>  
            </li>
          </ul>   

      
<?php    }
    else{
      ?>

         <ul class="box_info ">
           <input type="hidden" value="<?php echo $id; ?>" id="id_item">
           <input type="hidden" value="<?php echo $approval;  ?>" id="approval_item">
            <li class="stt_member">
              <span><?php echo $stt; ?></span>
            </li>
            <li class="name_member">
               <input class="disabled" id="name_item" type="text" value="<?php echo $name;?>" disabled="disabled"> 
            </li>
            <li class="email_member">
               <input onclick="return status_check(this);" id="status_item" type="checkbox" disabled="disabled" <?php if($approval==1){echo "checked";} ?> >
            </li>
            <li class="phonenumber_member">
             
            </li>
            <li class="update_delete">
              <a href="javascript:;" onclick="return edit_item(this);"  data-value_edit="'.$id.'"><div class="edit"></div></a>
              <a href="javascript:;" class="delete_item" onclick="return delete_item(this);" data-value_delete="'.$id.'"><div class="delete" ></div></a>  
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
      
  function edit_item(object){
   $(object).closest('ul').find('#div_save_success').remove();
   $(object).closest('ul').find('#name_item').removeAttr('disabled');
   $(object).closest('ul').find('#name_item').removeClass('disabled');
   $(object).closest('ul').find('#status_item').removeAttr('disabled');
   var div_save_item ='<div id="div_save_item" onclick="return save_item(this);"></div>';
   $(object).closest('ul').find('.phonenumber_member').append(div_save_item);
    
   
  }
 
    function status_check(object){
       var test=$(object).closest('ul').find('#approval_item').val();       
       if(parseInt(test)==0){
         $(object).closest('ul').find('#approval_item').val('1');
       }
       if(parseInt(test)==1){
         $(object).closest('ul').find('#approval_item').val('0');
       }
       
     };
 
 
  function save_item(object){
   
   $(object).closest('ul').find('#div_save_success').remove();
   var div_save_loading ='<div id="div_save_loading"></div>';
   $(object).closest('ul').find('.phonenumber_member').append(div_save_loading);
   
   var id_item        = $(object).closest('ul').find('#id_item').val();
   var name_item      = $(object).closest('ul').find('#name_item').val();   
   var approval_item = $(object).closest('ul').find('#approval_item').val();
   
   var url=$("#hidUrl").val();
   var url_api=url+"index.php/admin/admin_controller/custom_favourite_edit";
     var data={
                
                id_item : id_item,          
                name_item      :    name_item,
                approval_item   :    approval_item           
             

          }
    $.ajax({
          url: url_api ,
          type: 'POST',
          data:data,
          success: function(data){
        
            $(object).closest('ul').find('#div_save_loading').remove();
            var div_save_success ='<div id="div_save_success"></div>';
            $(object).closest('ul').find('.phonenumber_member').append(div_save_success);
            $(object).closest('ul').find('#name_item').attr('disabled',true);
            $(object).closest('ul').find('#status_item').attr('disabled',true);
            $(object).closest('ul').find('#name_item').addClass('disabled');
            $(object).closest('ul').find('#div_save_item').remove();
            
            setTimeout(function(){
               $('#custom_favourite').find('#div_save_success').remove();
            },1000);
          },
         error: function(a,textStatus,b){
           alert('khong thanh cong');
         }
       });
       
   
   
   
  }
 
 
  function delete_item(object){
      
      $(object).parent().parent().addClass('select_delete');
      var url=$("#hdUrl_delete_user").val();
      var data_value_delete=$(object).attr('data-value_delete');
   
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
              $( object ).dialog( "close" );
            },
            "Hủy": function() {
              $(".delete_item").parent().parent().removeClass('select_delete');
              $('.delete_member').dialog( "close" );
            }
          }
    
      });
       
              
  }
  
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

