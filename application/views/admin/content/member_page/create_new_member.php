<?php $url=  base_url();?>


<div id="create_new_member">
  <div id="content_create_new_member">
   <div class="create_new_member_title">
     <span><div class=create_new_member_text">Tạo mới thành viên</div></span>
   </div>
   <div class="line_title"></div></br>
   
   <div class="member_info_title">
     <span>Thông tin thành viên</span>
   </div>
   
   <div class="box_input">
     <div class="image_profile"> 
       <span>ẢNH</span><br>
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
     <div class="name_profile">
        <span>HỌ VÀ TÊN*</span><br>
        <input id="param_name" class="input_text" type="text" placeholder="vd. Nguyễn Văn A" name="" >
     </div>
     <div class="job_profile">
        <span>ĐỊA CHỈ*</span><br>
        <input id="param_address" class="input_text" type="text" placeholder="vd. Kế toán viên" name="">
     </div>
     <div class="phone_number_profile">
        <span>ĐIỆN THOẠI*</span><br>
        <input id="param_phone_number" class="input_text" type="text" placeholder="vd. 01665847138" name="">
     </div>
<!--     <div class="company_profile">
        <span>CÔNG TY</span><br>
        <input class="input_text" type="text" placeholder="vd. Cty TNHH ABC" name="">
     </div>-->
     <div class="email_profile">
        <span>EMAIL</span><br>
        <input id="param_email" class="input_text" type="text" placeholder="vd. nva@aaa.com" name="">
     </div>
<!--     <div class="facebock_url_profile">
        <span>FACEBOOK URL</span><br>
        <input class="input_text" type="text" placeholder="http://" name="">
     </div>
     <div class="code_member_profile">
        <span>MÃ THÀNH VIÊN*</span><br>
        <input class="input_text" type="text" placeholder="vd. SLI1223" name="">
     </div>-->
     <div class="password_profile">
        <span>MẬT KHẨU*</span><br>
        <input id="param_password" class="input_text" type="password" placeholder="vd. 123456" name="">
     </div>
     <div class="line_title"></div></br>
     <div class="introduce_member_profile">
        <span>GIỚI THIỆU THÀNH VIÊN</span><br>
        <textarea id="param_introduce" class="input_textarea" name=""></textarea>
     </div>
     <div class="list_role_member">
        <span>DANH SÁCH CÁC QUYỀN</span><br>
         <form id="FormAddListing_role">
          <ul class="list_index">
            
              
          <?php    foreach ($all_role as $value_all_role) {
                      echo'<li onclick="return onclickLiCheckListing_role(this);" >
                           '.$value_all_role['name'].' <span class="checkbox" id="'.$value_all_role['id'].'"></span>
                         </li>';
                 }
          
           ?>
                   
          </ul>
        </form>
        
        
     </div>
     
     
     
     <div class="btn_save_cancel">
       <a href="javascript:;" onclick="return submit_save_info_member()">
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
<input type="hidden" value="<?php echo $url;?>" id="hdUrl" >
<script>
  
  //function add role
    function onclickLiCheckListing_role(obj){
     if($(obj).find('span').first().hasClass('checkbox')){
            $(obj).find('span').first().removeClass('checkbox').addClass('checkboxSelect');
            var myText = $(obj).text();
            var id = $(obj).find('span').first().attr('id');
            var newEle = '<input type="hidden" name="arr_role_list[]" class="input_role_list" id="input_role_list' + id + '" value="' + id + '"/>';
                        
           // $('ul.listSelectDanhBaDiaDiem').append('<li class="select' + id + '">'+ $(obj).text()+'</li>');
            $('#FormAddListing_role').append(newEle);
        }else{
            $(obj).find('span').first().removeClass('checkboxSelect').addClass('checkbox');
            var id=$(obj).find('span').first().attr('id');
            $("#input_role_list" + id ).remove();
            
           // $('ul.listSelectDanhBaDiaDiem .select' + id).remove();
        }
    }
  
  
  
  function  submit_save_info_member(){
    var avatar=$('#image_avatar_post').val();
    var param_name=$('#param_name').val();
    var param_address=$('#param_address').val();
    var param_email=$('#param_email').val();
    var param_phone_number=$('#param_phone_number').val();
    var param_introduce=$('#param_introduce').val();
    var param_password=$('#param_password').val();
    var role_list=$('#param_role').val();
    
    
    
    
    
    /*danh sach cac quyền*/
      var elem_role = document.getElementsByClassName("input_role_list");
      var role_list="";
       for (var i = 0; i < elem_role.length; ++i) {
        if (typeof elem_role[i].value !== "undefined") {
            role_list +=elem_role[i].value+',';
          }
        }
      role_list=role_list.slice(0,-1);
    
    
    
    
    /*alert('avatar: '+ avatar +
               '\n name: ' + param_name+
               '\n address: ' +param_address+
               '\n email: ' + param_email+
               '\n phone: ' + param_phone_number+
               '\n gioi thieu: '+ param_introduce+
               '\n pass: ' +param_password+
               '\n role list: '+role_list
          
              );*/
      //alert(role_list); 
     var url=$("#hdUrl").val();
     var url_api=url+"index.php/admin/admin_controller/create_new_member_post";
     var data={
              avatar:  avatar,
              full_name:  param_name,
              address:  param_address,
              email:  param_email,
              phone_number:  param_phone_number,
              introduce:  param_introduce,
              password: param_password,
              role: role_list

          }
  
    $.ajax({
          url: url_api ,
          type: 'POST',
          data:data,
          success: function(data){
            alert(data);
           // alert('them thanh cong');
           // window.location=url+"index.php/admin/admin_controller/member_page";
            //alert(data)
          },

         //timeout:5000,
         error: function(a,textStatus,b){
           alert('khong thanh cong');
         }
       });
     
       
       
       
    
  }
</script>