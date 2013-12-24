<div id="register_uu_dai">
  <div class="register_uu_dai_custom_center">
    <div class="register_left">
      <div class="box_register_left">
        <span>Đăng ký nhận ưu đãi ngay bây giờ?</span>
        <div class="form">
            <input class="input_search" id="input_email_register" type="text"  placeholder="Nhập địa chỉ email" >
        </div>
      </div>
    </div>
    <div class="register_right" >

      
      <div id="home-section-projects" >
         
        <a href="javascript:;" class="more-info" onclick="return register_email(this)">
                  <div class="text_align_center">
                     <span>  Đăng ký</span>
                   </div>
                </a>
        
      </div> 
 
           
       
      
      <!--
      
        <a href="#" >
          <div class="button">
            <div class="text">
              <span>Đăng ký</span>
            
            </div>
          </div>
        <a>
      -->
    </div>
   </div>
</div>
      <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

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
      
  function register_email(object){
    //alert('dang ky');
    var email = $(object).closest('#register_uu_dai').find('#input_email_register').val();
    var check_validate="";
    if(email==null|| email==""){
         check_validate=check_validate+"<span style=\"color: #999999;\">Bạn chưa nhập địa chỉ email</span><br>";
        
       }else{
         if(check_email(email)==false){
           check_validate=check_validate+"<span style=\"color: #999999;\">Email bạn nhập không đúng!</span><br>";
         }
         else{
         }
       }
    if(check_validate==""){
        var url=$("#hidUrl").val();
        url = url + "index.php/home_controller/register_email"
        var data={
          email:email
        };
        
        $.ajax({
            url: url,
            type: 'POST',
            data:data,
            success: function(data){
               if(data=="SUCCESSFUL"){
                  check_validate="Cảm ơn bạn đã đăng ký!";
                  $(".remove_dialog").remove();
                  $( ".dialog_validate_register_email" ).append("<div class=\"remove_dialog\">"+check_validate+"</div>");  
                  $( ".dialog_validate_register_email" ).dialog({
                       title: "thông báo", 
                       show: "scale",
                       hide: "explode",
                       closeOnEscape: true,
                       modal: true,
                       backgroundColor:"red",
                       modal: true

                   });
               }
               else{
                 check_validate="Email đã tồn tại!";
                  $(".remove_dialog").remove();
                  $( ".dialog_validate_register_email" ).append("<div class=\"remove_dialog\">"+check_validate+"</div>");  
                  $( ".dialog_validate_register_email" ).dialog({
                       title: "thông báo", 
                       show: "scale",
                       hide: "explode",
                       closeOnEscape: true,
                       modal: true,
                       backgroundColor:"red",
                       modal: true

                   });
               }
            },
            error: function(a,textStatus,b){
             alert('error!');
           }
         });
        
        
        
    }
    else{
        $(".remove_dialog").remove();
        $( ".dialog_validate_register_email" ).append("<div class=\"remove_dialog\">"+check_validate+"</div>");  
        $( ".dialog_validate_register_email" ).dialog({
             title: "thông báo", 
             show: "scale",
             hide: "explode",
             closeOnEscape: true,
             modal: true,
             backgroundColor:"red",
             modal: true

         });
    
    
    }
    
  }
</script>

<div class="dialog_validate_register_email">
  
</div>