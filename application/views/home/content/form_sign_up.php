<?php $url=  base_url(); ?>
<div id="form_sign_up">
  <div class="box_sign_up">
    <div class="box">
      <form style="float: left;" action="<?php echo $url;?>index.php/check_signup" method="post" id="form_signup"> 
     
      <div class="box_left">
        <div class="title">
          <div class="title_left" >
            <div class="text">
              <span>Đăng ký</span>
            </div>
          </div>
          <div class="title_right" >
            <div class="image">
            </div>
          </div>
        </div>
        <div class="sub_title_1">
        </div>
        <div class="line">
        </div>
        <div class="sub_title_2">
          <div class="left">
          </div>
          <div class="right">
          </div>
          
        </div>
        
        <div class="box_left_content">
          <!--input-->
          
            <!--<div class="form_sign_up">
            </div>-->
          <ul>
            <li>
              <span>Họ và tên</span><br>
              <input id="param_name" name="param_name" style="padding-left: 10px;" type="text" placeholder="Họ và tên">
            </li>
            <li>
              <span>Email</span><br>
              <input id="param_email" name="param_email" style="padding-left: 10px;" type="text" placeholder="Email">
            </li>
            <li>
              <span>Mật khẩu</span><br>
              <input id="param_password" name="param_password" style="padding-left: 10px;" type="password" placeholder="Mật khẩu">
            </li>
            <li>
              <span>Xác nhận mật khẩu</span><br>
              <input id="param_again_password" name="param_again_password" style="padding-left: 10px;" type="password" placeholder="Xác nhận mật khẩu">
            </li>
            <li>
              <span>Điện thoại (không quá 11 số, bắt đầu bằng số 0)</span><br>
              <input id="param_phone_number" name="param_phone_number" style="padding-left: 10px;" type="text" placeholder="Điện thoại">
            </li>
            <li>
              <span>Địa chỉ</span><br>
              <input id="param_address" name="param_address" style="padding-left: 10px;" type="text" placeholder="Địa chỉ">
            </li>
            <li>
              <span>Tỉnh/Thành phố</span><br>
              <select id="param_city" name="param_city" style="padding-left: 10px;" onchange="return choiceOtherCity(this.value);" >
                <option value="">Chọn thành phố</option>
                <option value="Hà Nội">Hà Nội</option>
                <option value="TP.Hồ Chí Minh">TP.Hồ Chí Minh</option>
                <option value="TP.Cần Thơ">TP.Cần Thơ</option>
                <option value=-1 >Khác</option>
              </select>
            </li>
            <li>
              <input id="inputOtherCity" name="inputOtherCity" style="padding-left: 10px; " type="text" placeholder="">
            </li>
            
            <li>
               <span>Mã bảo mật</span><br>
              <?php

                      require_once('./includes/plugins/captcha/recaptchalib.php');

                      // Get a key from https://www.google.com/recaptcha/admin/create
                      $publickey = "6Lcx1eISAAAAAGPTgu-0tdvgWo0WeA5iS9574Dcc";
                      $error="";
                      echo recaptcha_get_html($publickey, $error);
                      ?>
              
            </li>
          </ul>
            <input id="param_confirm" name="param_confirm" style="margin-top: 20px;" type="checkbox" class="checkbox"><span class="agree">Tôi đồng ý với các điều khoản sử dụng</span>
       
            
            
            
            <!--end input-->
        </div>
        <div class="line_1">
        </div>
        <div class="sub_title_3">
          <div class="left">
          </div>
          <div class="right">
          </div>          
        </div>
        <div class="box_btn_sign_up">
          <div id="home-section-projects" >
            <a href="javascript:;" class="more-info">
              <div class="btn_sign_up">
                <div class="image"></div>
                <div class="text"><span>Đăng ký</span></div>
              </div>
            </a>
          </div>
        </div>
        <div class="footer_sign_up">
          <div class="content_text">
            <span><a href="<?php echo $url;?>index.php/home_controller/log_in">Đăng nhập</a>&nbsp;|&nbsp;<a href="#">Bạn quên mật khẩu?</a></span>
          </div>
          <div class="footer_text">
            <span>Slick.vn</span>
          </div>
            
        </div>
        
      </div>
      </form>
      
      <div class="box_right">
        <div class="box_right_custom">
          <div class="title">
              <div class="text_center">
                <span>QUYỀN LỢI THÀNH VIÊN</span>
              </div>
              <div class="image">
                
              </div>
          </div>
          <div class="box_right_content">
            <ul>
              
              <li> 
                <div class="image">
                    <img class="image_detail" src="<?php echo $url?>includes/images/introduce/icon_introduce_1.jpg">
                </div>
                <div class="detail_content">
                  <div class="detail_content_text">
                    Cơ hội tiết kiệm đến <span> 90% </span> Tại các nhà hàng, cafe trong hệ thống <span>Slick.vn</span>
                  </div>
                </div>
              </li>
              
              <li> 
                <div class="image">
                    <img class="image_detail" src="<?php echo $url?>includes/images/introduce/icon_introduce_2.png">
                </div>
                <div class="detail_content">
                  <div class="detail_content_text">
                    <span>Khám phá</span> Nhiều phong cách ẩm thực Việt Nam và quốc tế
                  </div>
                </div>
              </li>
              <li> 
                <div class="image">
                    <img class="image_detail" src="<?php echo $url?>includes/images/introduce/icon_introduce_3.png">
                </div>
                <div class="detail_content">
                  <div class="detail_content_text">
                    Tìm kiếm <span>Điểm đến</span> Chi tiết, dễ dàng, nhanh chóng
                  </div>
                </div>
              </li>
              <li> 
                <div class="image">
                    <img class="image_detail" src="<?php echo $url?>includes/images/introduce/icon_introduce_4.jpg">
                </div>
                <div class="detail_content">
                  <div class="detail_content_text">
                    Điểm tích lũy <span>đổi quà</span> từ hoạt động online, đánh giá nhà hàng
                  </div>
                </div>
              </li>
              
              
            </ul>
          </div>
          
        </div>
      </div>
      
    </div>
  </div>
</div>

<input type="hidden" value="<?php echo $url;?>" id="hidUrl">
<script>
  
$(document).ready(function() {
      $('#inputOtherCity').html('').hide();
      
      function check_email(val){
       if(!val.match(/\S+@\S+\.\S+/)){ // Jaymon's / Squirtle's solution
         // do something
         return false;
       }
       if( val.indexOf(' ')!=-1 || val.indexOf('..')!=-1){
         // do something
         return false;
       }
       return true;
      }

        $(".btn_sign_up").click(function (){
            var name = $("#param_name").val();
            var email =$("#param_email").val();
            var password =$("#param_password").val();
            var again_password=$("#param_again_password").val();
            var phone=$("#param_phone_number").val();
            var address=$("#param_address").val();
            var city=$("#param_city").val();
            if(city==-1){
             city=  $('#inputOtherCity').val();
            }

            var confirm=0;
            if ($("#param_confirm").is(':checked')){
              confirm=1;
            }
            var url=$("#hidUrl").val();
        
       //ajax submit form
       var check_validate="";
       if(name==null|| name==""){
         check_validate=check_validate+"<span style=\"color: #999999;\">-Tên không được bỏ trống</span><br>";
         $("#param_name").css("background-color","#ddd");
       }else{
         $("#param_name").css("background-color","white");
       }
       
       if(email==null|| email==""){
         check_validate=check_validate+"<span style=\"color: #999999;\">-Email không được bỏ trống</span><br>";
         $("#param_email").css("background-color","#ddd");
       }else{
         if(check_email(email)==false){
           check_validate=check_validate+"<span style=\"color: #999999;\">-Email bạn nhập không đúng</span><br>";
           $("#param_email").css("background-color","#ddd");
         }
         else{
           $("#param_email").css("background-color","white");
         }
       }
       
       
       if(password==null|| password==""){
         check_validate=check_validate+"<span style=\"color: #999999;\">-Mật khẩu không được bỏ trống</span><br>";
         $("#param_password").css("background-color","#ddd");
       }else{
          $("#param_password").css("background-color","white");
       }
       
       if(again_password==null|| again_password==""){
         check_validate=check_validate+"<span style=\"color: #999999;\">-Xác nhận mật khẩu không được bỏ trống</span><br>";
         $("#param_again_password").css("background-color","#ddd");
        }else{
          $("#param_again_password").css("background-color","white");
       }
       
        if(password!=""&&again_password!=""&&password!=again_password){
          check_validate=check_validate+"<span style=\"color: #999999;\">-Mật khẩu và xác nhận mật khẩu không trùng khớp</span><br>";
          $("#param_password").css("background-color","#ddd");
          $("#param_again_password").css("background-color","#ddd");
          
        }else{
          
        }
        
       
       if(phone==null|| phone==""){
         check_validate=check_validate+"<span style=\"color: #999999;\">-Số điện thoại không được bỏ trống</span><br>";
         $("#param_phone_number").css("background-color","#ddd");
       }else{
          
          if($.isNumeric(phone) == false || parseInt(phone) <= 0 || phone.length <= 0 || phone.length > 11 || phone.substring(0,1) != '0'){
             check_validate=check_validate+"<span style=\"color: #999999;\">-Số điện thoại bạn nhập không đúng</span><br>";
          }else{
           $("#param_phone_number").css("background-color","white");
          }
       }
       
       
       if(city==null|| city==""){
         check_validate=check_validate+"<span style=\"color: #999999;\">-Bạn chưa chọn thành phố</span><br>";
         $("#param_city").css("background-color","#ddd");
        }else{
          $("#param_city").css("background-color","white");
        }
        
        if(confirm==null|| confirm==0){
         check_validate=check_validate+"<span style=\"color: #999999;\">-Bạn chưa đồng ý với điều khoản sử dụng</span><br>";
        }
       
       /*
       if(check_email(email)==false){
         check_validate=check_validate+"<span style=\"color: #999999;\">-Bạn chưa nhập email hoặc định dạng email không đúng</span><br>";
       }
       */
       
       
       
       
       
       
     
       
       
       if(check_validate==""){
                  var options = { 

                  beforeSubmit:  function(){
                                  //console.log('send');
                                  $("#disable_screen").addClass("active");
                                 },

                  success:    function(responseText, statusText, xhr, $form){
                                //console.log(responseText);
                                //if(responseText=="FILE_ERROR"){}
                                 //alert(responseText);
                                if(responseText!="success"){
                                  $(".remove_dialog").remove();
                                  $( ".dialog_check_validate" ).append("<div class=\"remove_dialog\">"+responseText+"</div>");  
                                  $( ".dialog_check_validate" ).dialog({
                                       title: "thông báo", 
                                       show: "scale",
                                       hide: "explode",
                                       closeOnEscape: true,
                                       modal: true,
                                      /* minWidth: 400,
                                       minHeight: 400,
                                       resizable: false,*/
                                       backgroundColor:"red",
                                       modal: true

                                   });
                                }
                                if(responseText=="success"){
                                 // alert('registed');
                                  document.location.href=url;
                                  
                                  
                                  
                                }
                                
                                    
                                    
                            }

                   }; 
                   $('#form_signup').ajaxSubmit(options);
       
       }
       else{
       
        var title="<span style=\"color: #09F;\">Một vài trường bạn nhập chưa đúng:</span><br>";
        $(".remove_dialog").remove();
        $( ".dialog_check_validate" ).append("<div class=\"remove_dialog\">"+title+check_validate+"</div>");  
        $( ".dialog_check_validate" ).dialog({
             title: "thông báo", 
             show: "scale",
             hide: "explode",
             closeOnEscape: true,
             modal: true,
            /* minWidth: 400,
             minHeight: 400,
             resizable: false,*/
             backgroundColor:"red",
             modal: true

         });
        
       
       
       
       }
       
       /*
     





       alert("name: " +name+ "\n"+
              "email: " +email+ "\n"+
              "password: " +password+ "\n"+
              "again_password: " +again_password+ "\n"+
              "phone: " +phone+ "\n"+
              "address: " +address+ "\n"+
              "city: " +city+ "\n"+
              "confirm: " + confirm + "\n"

         );
     
     if(check_email(email)==false){
       alert('email sai dinh dang');

     }
     else  alert('ok');
     */
     
     
     
     
     

     });
     
     
     
     
     
     
     
     
  });
  function choiceOtherCity(val){
           if(val == -1){
               $('#inputOtherCity').html('').show();

           }else{
               $('#inputOtherCity').html('').hide();
           }
           return false;
       }
</script>
<div class="dialog_check_validate">
  
</div>