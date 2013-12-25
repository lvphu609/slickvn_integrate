<?php $url=  base_url();?>


<div id="create_new_coupon">
  <div id="content_create_new_coupon">
   <div class="create_new_coupon_title">
     <span><div class=create_new_coupon_text"><?php echo $name_res;?></div></span>
   </div>
   <div class="line_title"></div></br>
   
   <div class="coupon_info_title">
     <span>Thông tin khuyến mãi</span>
   </div>
   
   <div class="box_input">
     <div class="name_profile">
        <span>GIÁ TRỊ KHUYẾN MÃI (%)*</span><br>
        <input id="param_value_coupon" class="input_text" type="text" placeholder="vd. 50" name="" >
     </div>
     <div class="job_profile">
        <span>THỜI GIAN BẮT ĐẦU*</span><br>
         <script src="<?php echo $url;?>includes/plugins/date_time_picker/jquery-1.10.2.min.js"></script>
        <script type="text/javascript" src="<?php echo $url;?>includes/plugins/date_time_picker/jquery-ui.min.js"></script>
        <script type="text/javascript" src="<?php echo $url;?>includes/plugins/date_time_picker/jquery-ui-timepicker-addon.js"></script>
         <div class="date_time_picker">
            <div>
               <input id="param_date_coupon_start" class="input_text" type="text" placeholder="vd. 1/1/2014" name="">
            </div>					
           <script defer="true">
            $('#param_date_coupon_start').datetimepicker({
                  timeFormat: "hh:mm:00",
                  dateFormat: "dd-mm-yy"
            });
            </script>
          </div>
     </div>
     <div class="phone_number_profile">
        <span>THỜI GIAN KẾT THÚC*</span><br>
        <div class="date_time_picker">
          <div>
              <input id="param_date_coupon_end" class="input_text" type="text" placeholder="vd. 30/12/2014" name="">
          </div>					
          <script defer="true">
          $('#param_date_coupon_end').datetimepicker({

              timeFormat: "hh:mm:00",
              dateFormat: "dd-mm-yy"
          });
          </script>
        </div>
        
        
     </div>

     <div class="line_title"></div></br>
     <div class="introduce_coupon_profile">
        <span>MÔ TẢ THÔNG TIN KHUYẾN MÃI</span><br>
        <textarea id="param_description" class="input_textarea" name=""></textarea>
     </div>
     <div class="introduce_coupon_profile">
       <input type="checkbox" id="param_check_show_coupon"> <span>Hiện thông tin khuyến mãi trên trang home</span>
     </div>
     
     
     
     <div class="btn_save_cancel">
       <a href="javascript:;" onclick="return submit_save_info_coupon()">
        <div class="btn_save">
          <lable><div class="center_text">Lưu</div></lable>
        </div>
       </a>
       <a href="javascript:;" onclick="return submit_cancle()">
        <div class="btn_cancel">
          <lable><div class="center_text">Hủy</div></lable>
        </div>
       </a>
     </div>
     
     <div class="list_coupon_of_res">
      
     <!--title-->
     <ul class="box_info field_title_restaurant">
       <li class="stt_restaurant">
         <span class="index_bole">STT</span>
         <div class="line_index"></div>
       </li>
       <li class="stt_chose">
         <span class="index_bole">Chọn</span>
         <div class="line_index"></div>
       </li>
       <li class="phonenumber_restaurant">
         <span class="index_bole">Ngày tạo</span>
         <div class="line_index"></div>
       </li>
       <li class="phonenumber_restaurant">
         <span class="index_bole">Mô tả khuyến mãi</span>
         <div class="line_index"></div>
       </li>
       <li class="email_restaurant">
         <span class="index_bole">Giá trị (%)</span>
         <div class="line_index"></div>
       </li>
       <li class="phonenumber_restaurant">
         <span class="index_bole">Thời gian bắt đầu</span>
         <div class="line_index"></div>
       </li>
       <li class="phonenumber_restaurant">
         <span class="index_bole">Thời gian kết thúc</span>
         <div class="line_index"></div>
       </li>
       <li class="email_restaurant">
         <span class="index_bole">Trạng thái</span>
         <div class="line_index"></div>
       </li>
       <li class="update_delete">
       </li>
     </ul>
     
     
     <?php 
     
       $stt=1;
         if(is_array($coupon_of_restaurant)&&  sizeof($coupon_of_restaurant)>0){
           foreach ($coupon_of_restaurant as $value) {             
              $id                =$value['id'];
              $id_restaurant     =$value['id_restaurant'];
              $value_coupon      =$value['value_coupon'];
              $coupon_start_date =$value['coupon_start_date'];
              $coupon_due_date   =$value['coupon_due_date'];
              $coupon_desc       =$value['coupon_desc'];
              $coupon_desc=substr($coupon_desc,0,120) . '...';
              $updated_date      =$value['updated_date'];  
              $created_date      =$value['created_date'];  
              $status_coupon      =$value['status_coupon']; 
              if(strcmp($status_coupon,"TRUE")==0){
                $status_coupon="còn hạn";
              }
              else $status_coupon="hết hạn";
              $is_use=$value['is_use'];
              
              $input_status="";
              if(strcmp($is_use,'1')==0){
                $input_status="checked";
              }
              
              
             if($stt%2==0){
              echo '
                <ul class="box_info row_color">
                    <li class="stt_restaurant">
                      <span >'.$stt.'</span>
                    </li>
                     <li class="stt_chose">
                      <span >
                       <input type="checkbox" '.$input_status.' disabled>
                      </span>
                    </li>
                    <li class="phonenumber_restaurant">
                      <span >'.$coupon_start_date.'</span>
                    </li>
                    <li class="phonenumber_restaurant">
                      <span >'.$coupon_desc.'</span>
                    </li>
                    <li class="email_restaurant">
                      <span >'.$value_coupon.'</span>
                    </li>
                    <li class="phonenumber_restaurant">
                      <span >'.$coupon_start_date.'</span>
                    </li>
                    <li class="phonenumber_restaurant">
                      <span >'.$coupon_due_date.'</span>
                    </li>
                    <li class="email_restaurant">
                      <span >'.$status_coupon.'</span>
                    </li>
                    <li class="update_delete">
                        <a href="javascript:;" class="view_edit_restaurant" data-value_edit="'.$id.'" data-value_name_res="'.$name_res.'"><div class="edit"></div></a>
                        <a href="javascript:;" class="delete_coupon" data-value_delete="'.$id.'"><div class="delete"></div></a>  
                    </li>
                  </ul>
              ';
             }
             else{
                 echo '
                <ul class="box_info field_title_restaurant">
                    <li class="stt_restaurant">
                      <span >'.$stt.'</span>
                    </li>
                    <li class="stt_chose">
                      <span >
                        <input type="checkbox" '.$input_status.' disabled>
                      </span>
                    </li>
                    <li class="phonenumber_restaurant">
                      <span >'.$coupon_start_date.'</span>
                    </li>
                    <li class="phonenumber_restaurant">
                      <span >'.$coupon_desc.'</span>
                    </li>
                   
                    <li class="email_restaurant">
                      <span >'.$value_coupon.'</span>
                    </li>
                    <li class="phonenumber_restaurant">
                      <span >'.$coupon_start_date.'</span>
                    </li>
                    <li class="phonenumber_restaurant">
                      <span >'.$coupon_due_date.'</span>
                    </li>
                    <li class="email_restaurant">
                      <span >'.$status_coupon.'</span>
                    </li>
                    <li class="update_delete">
                        <a href="javascript:;" class="view_edit_restaurant" data-value_edit="'.$id.'"  data-value_name_res="'.$name_res.'"><div class="edit"></div></a>
                        <a href="javascript:;" class="delete_coupon" data-value_delete="'.$id.'"><div class="delete"></div></a>  
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
</div>

<!--dialog-->

<div class="dialog_delete_coupon" title="Thông báo">  
    <lable class="label">Bạn có chắc muốn xóa dữ liệu đang chọn không!</lable></br>
    <!--<button type="button" id="btnYes" class="btn btn-warning">Đồng ý</button>
    <button type="button" id="btnNo" class="btn btn-warning">Hủy</button>-->
  </div>


<div class="dialog_edit_coupon" title="Sửa thông tin khuyến mãi">  
 
</div>


<!--end dialog-->












<?php $url=  base_url(); ?>
<input type="hidden" value="<?php echo $url."index.php/admin/admin_controller/form_edit_coupon_of_restaurant";?>" id="hdUrl_edit_coupon" >
<input type="hidden" value="<?php echo $url."index.php/admin/admin_controller/delete_coupon_of_restaurant";?>" id="hdUrl_delete_coupon" >
<input type="hidden" value="<?php echo $url;?>" id="hidUrl"> 
<input type="hidden" value="<?php echo $id_res;?>" id="param_id_restaurant" >
<input type="hidden" value="0" id="param_status_checked" >
<script>
    $(document).ready(function () {
         $('.dialog_delete_coupon').hide();
         $('.dialog_edit_coupon').hide();
      });
   $('#param_check_show_coupon').click(function (){
       var test=$('#param_status_checked').val();
       
       if(parseInt(test)==0){
         $('#param_status_checked').val('1');
       }
       if(parseInt(test)==1){
         $('#param_status_checked').val('0');
       }
       
     });
  function  submit_save_info_coupon(){
     var param_id_restaurant=$('#param_id_restaurant').val();
     var param_value_coupon=$('#param_value_coupon').val();
     var param_date_coupon_start=$('#param_date_coupon_start').val();
     var param_date_coupon_end=$('#param_date_coupon_end').val();
     var param_description=$('#param_description').val();
     //param_check_show_coupon
     var is_use=$('#param_status_checked').val();
    
     
     var url=$("#hidUrl").val();
     var url_api=url+"index.php/admin/admin_controller/add_coupon";
     var data={
              id_restaurant:  param_id_restaurant,
              value_coupon:  param_value_coupon,
              date_coupon_start:  param_date_coupon_start,
              date_coupon_end:  param_date_coupon_end,
              description:  param_description,
              is_use:is_use
          }
  
     $.ajax({
          url: url_api ,
          type: 'POST',
          data:data,
          success: function(data){
             //alert(data);
             
            location.reload();
          },

         //timeout:5000,
         error: function(a,textStatus,b){
           alert('khong thanh cong');
         }
       });
    
  }
  function submit_cancle(){
     var url=$("#hdUrl").val();
     window.location=url+"index.php/admin/admin_controller/coupon_page";
  
  }
  

  
  $(".view_edit_restaurant").click(function (){
    var url=$("#hdUrl_edit_coupon").val();
    var data_value_edit=$(this).attr('data-value_edit');
    var value_name_res=$(this).attr('data-value_name_res');
    $('.remove_edit_coupon').remove();
    var data={
      id_coupon:data_value_edit
    };
     $.ajax({
          url: url ,
          type: 'POST',
          data:data,
          success: function(data){
            $('.dialog_edit_coupon').append(data);
            $( ".dialog_edit_coupon" ).dialog({
                  title: value_name_res, 
                  show: "scale",
                  hide: "explode",
                  closeOnEscape: true,
                  modal: true,
                  minWidth: 800,
                  minHeight: 500,

                  resizable: false,
                  modal: true,});
    
          },

         //timeout:5000,
         error: function(a,textStatus,b){
           alert('khong gọi được form sửa thông tin');
         }
       });
    
    
    
   // window.location=url+"?id_restaurant="+data_value_edit;
  });
  $(".delete_coupon").click(function (){
      $(this).parent().parent().addClass('select_delete');
      var url=$("#hdUrl_delete_coupon").val();
      var data_value_delete=$(this).attr('data-value_delete');
   
      $( ".dialog_delete_coupon" ).dialog({
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
              
              var url_delete=url
               $.ajax({
                  url: url_delete,
                  type: 'POST',
                  data:{ id_coupon:data_value_delete},
                  success: function(data){
                    location.reload();
                  },
                 error: function(a,textStatus,b){
                   alert('không xóa được');
                 }
               });
              $( this ).dialog( "close" );
            },
            "Hủy": function() {
              $(".delete_coupon").parent().parent().removeClass('select_delete');
              $( this ).dialog( "close" );
            }
          }
    
      });
       
       
       
  });
  
 //search restaurant
 $('#btn_search_restaurant').click(function (){
    
    var input_text_search=$("#input_text_search").val();
    var url= $("#hidUrl").val();
    var url_search_member=url+'index.php/search/search/admin_search_restaurant';
    window.location=url_search_member+"?input_text_search="+input_text_search;
 
 });
 
  
  
  
  
</script>

  