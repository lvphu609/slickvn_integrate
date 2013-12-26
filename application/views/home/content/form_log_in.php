<?php $url=  base_url(); ?>

<!--form_log_in  extend form_sign_up-->
<div id="form_sign_up">
  <div class="box_sign_up">
    <div class="box">
      
      <div class="box_left">
        <div class="title">
          <div class="title_left" >
            <div class="text">
              <span>Đăng nhập</span>
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
    <form  action="<?php echo $url;?>index.php/check_login" method="post" id="form_login"> 

          <ul>
            
            <li>
              <span>Email</span><br>
              <input class="enter_key_login" style="padding-left: 10px;" type="text" id="param_email" name="param_email"  placeholder="Email">
            </li>
            <li>
              <span>Mật khẩu</span><br>
              <input class="enter_key_login" style="padding-left: 10px;" type="password" id="param_password" name="param_password"    placeholder="Mật khẩu">
            </li>
          </ul>
    </form>      
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
            <a href="javascript:;" id="btn_login"  class="more-info">
              <div class="btn_sign_up">
                <div class="image"></div>
                <div class="text" ><span>Đăng nhập</span></div>
              </div>
            </a>
          </div>
        </div>
        <div class="footer_sign_up">
          <div class="content_text">
            <span><a href="<?php echo $url;?>index.php/home_controller/sign_up">Đăng ký</a>&nbsp;|&nbsp;<a href="#">Bạn quên mật khẩu?</a></span>
          </div>
          <div class="footer_text">
            <span>Slick.vn</span>
          </div>
            
        </div>
        
      </div>
      
      
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

<?php $url=  base_url(); ?>
<input type="hidden" value="<?php echo $url;?>" id="hidUrl"> 
<script>
  
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
  function send_login(){
    var email=$('#param_email').val();
      var password=$('#param_password').val();
      var url = $('#hidUrl').val();
      
      var check_validate="";
      
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
                                   //alert(responseText);
                                  document.location.href=url;
                                  
                                  
                                  
                                }
                                
                                    
                                    
                            }

                   }; 
                   $('#form_login').ajaxSubmit(options);
       
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
    
  };
  
  
   $(function(){
     $('#btn_login').click(function(event) {
        send_login();
    });
    
    $('.enter_key_login').on('keyup', function(e) {
    if (e.which == 13) {
             send_login();
            e.stopPropagation();
        }
      });
    
    
    
    
    
  }); 
  
   
  
 
</script>

<div class="dialog_check_validate">
  
</div>