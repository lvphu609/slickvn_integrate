
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
              
              <input type="text" id="value_number_view" >
              <input type="hidden" id="field_name" value="newest_restauran">
              <input type="hidden" id="id_config_page">
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
              <input type="text" id="value_number_view" >
              <input type="hidden" id="field_name" value="orther_restauran">
              
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
              <input type="text" id="value_number_view" >
              <input type="hidden" id="field_name" value="coupon_restauran">
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
              <input type="text" id="value_number_view" >
              <input type="hidden" id="field_name" value="post_restauran">
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
  $(document).ready(function () {
         $('.dialog_note').hide();
      });
  
  function save_custom_view_page(object){
    $(object).closest('ul').find('#save_success').remove();
    var div_loading='<div id="save_loading"></div>';
    $(object).closest('ul').find('.phonenumber_custom_view').append(div_loading);
    
  
    var field_name = $(object).closest('ul').find('#field_name').val();
    var value_number_view = $(object).closest('ul').find('#value_number_view').val();
    if (value_number_view==""){
      value_number_view=0;
    }
//    
//    setTimeout(function(){
//      $(object).closest('ul').find('#save_loading').remove();
//      var div_save_success='<div id="save_success"></div>';
//      $(object).closest('ul').find('.phonenumber_custom_view').append(div_save_success);
//    }, 2000);
    
    var intRegex = /^\d+$/;
    if(intRegex.test(value_number_view)) {
      var data={
        field_name        :field_name, 
        value_number_view :value_number_view
        };
        var url=$('#hidUrl').val();
        var url_api=url+"index.php/admin/admin_controller/save_custom_view_page";
        $.ajax({
         url: url_api ,
         type: 'POST',
         data:data,
         success: function(data){
                //alert(data);

                $(object).closest('ul').find('#save_loading').remove();
                var div_save_success='<div id="save_success"></div>';
                $(object).closest('ul').find('.phonenumber_custom_view').append(div_save_success);


         },
           error: function(a,textStatus,b){
             alert('error');
           }
         });
    }
    else{
      $(object).closest('ul').find('#save_loading').remove();
      $(object).closest('ul').find('#save_success').remove();
      $( ".dialog_note" ).dialog({
          title: "Thông báo", 
          show: "scale",
          hide: "explode",
          closeOnEscape: true,
          modal: true
    
      });
       
      
    
    }
    
    
     
     
     
    
  } 
</script>
<div class="dialog_note" title="Thông báo">  
    <lable class="label">Số lượng hiển thị là số nguyên không âm! ví dụ: 1 2 3 hoặc 4 ...</lable></br>
 </div>