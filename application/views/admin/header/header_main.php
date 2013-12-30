<?php $url=  base_url();?>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <link rel="stylesheet" href="<?php echo $url;?>includes/css/admin/default.css">
    <link rel="stylesheet" href="<?php echo $url;?>includes/css/admin/taskbar_top.css">
    <link rel="stylesheet" href="<?php echo $url;?>includes/css/admin/menu_main.css">
    
    
    
    <?php 
    //<!--css main page-->
     if($chosed=="main_page"){       
       echo'<link rel="stylesheet" href="'.$url.'includes/css/admin/main_page.css">';
     }    
    ?>
    
    
    <?php 
    //<!--css member page-->
     if($chosed=="member_page"){
       echo'<link rel="stylesheet" href="'.$url.'includes/css/admin/member_page.css">';
       echo'<link rel="stylesheet" href="'.$url.'includes/css/admin/create_new_member.css">';
       echo '<script src="'.$url.'includes/plugins/date_time_picker/jquery-1.10.2.min.js"></script>';
       
       //jquery show dialog
       echo '<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
             <script type="text/javascript" src="http://localhost/slick_temp_api//includes/jquery/jquery-2.0.3.js"></script>
             <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
             <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
           ';
       
       
       
     }
     
    ?>
    
    <?php 
    //<!--css user page-->
     if($chosed=="user_page"){
       echo'<link rel="stylesheet" href="'.$url.'includes/css/admin/user_page.css">';
     }    
    ?>
    
    <?php 
    //<!--css restaurant page-->
     if($chosed=="restaurant_page"){
       echo'<link rel="stylesheet" href="'.$url.'includes/css/admin/restaurant_page.css">';
       echo'<link rel="stylesheet" href="'.$url.'includes/css/admin/create_new_restaurant.css">';
       
     
       
      // <!--time picker-->
       echo '<script src="'.$url.'includes/plugins/date_time_picker/jquery-1.10.2.min.js"></script>';
       echo '<link rel="stylesheet" href="'.$url.'includes/plugins/date_time_picker/jquery-ui-timepicker-addon.css">';
       echo '<link rel="stylesheet" href="'.$url.'includes/plugins/date_time_picker/jquery-ui.css">';
     //  <!--end timepicker-->
       
       //jquery show dialog
       echo '<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
             <script type="text/javascript" src="http://localhost/slick_temp_api//includes/jquery/jquery-2.0.3.js"></script>
             <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
             <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
           ';  
       
        
     }    
    ?>
    
    <?php 
    //<!--css coupon page-->
     if($chosed=="coupon_page"){
       echo'<link rel="stylesheet" href="'.$url.'includes/css/admin/coupon_page.css">';
       echo'<link rel="stylesheet" href="'.$url.'includes/css/admin/add_coupon.css">';
       // <!--time picker-->
       echo '<script src="'.$url.'includes/plugins/date_time_picker/jquery-1.10.2.min.js"></script>';
       echo '<link rel="stylesheet" href="'.$url.'includes/plugins/date_time_picker/jquery-ui-timepicker-addon.css">';
       echo '<link rel="stylesheet" href="'.$url.'includes/plugins/date_time_picker/jquery-ui.css">';
     //  <!--end timepicker-->
       
     }    
    ?>
    
    <?php 
    //<!--css post page-->
     if($chosed=="post_page"){
       echo'<link rel="stylesheet" href="'.$url.'includes/css/admin/post_page.css">';
       // <!--ckeditor-->
       echo '<script src="'.$url.'includes/plugins/ckeditor/ckeditor.js"></script>';
       // <!--end ckeditor-->
     }    
    ?>
    
    <?php 
    //<!--css custom page-->
     if($chosed=="custom_page"){
       echo'<link rel="stylesheet" href="'.$url.'includes/css/admin/custom_page.css">';
       echo'<link rel="stylesheet" href="'.$url.'includes/css/admin/custom_number_view_restaurant.css">';
       //echo'<link rel="stylesheet" href="'.$url.'includes/css/admin/favourite.css">';
       echo'<link rel="stylesheet" href="'.$url.'includes/css/admin/favourite.css">';
       echo'<link rel="stylesheet" href="'.$url.'includes/css/admin/meal.css">';
       echo'<link rel="stylesheet" href="'.$url.'includes/css/admin/culinary_style.css">';
       echo'<link rel="stylesheet" href="'.$url.'includes/css/admin/mode_use.css">';
       echo'<link rel="stylesheet" href="'.$url.'includes/css/admin/payment_type.css">';
       echo'<link rel="stylesheet" href="'.$url.'includes/css/admin/payment_type.css">';
       echo'<link rel="stylesheet" href="'.$url.'includes/css/admin/landscape.css">';
       echo'<link rel="stylesheet" href="'.$url.'includes/css/admin/price_person.css">';
       echo'<link rel="stylesheet" href="'.$url.'includes/css/admin/other_criteria.css">';
       echo'<link rel="stylesheet" href="'.$url.'includes/css/admin/form_editor.css">';
       echo'<link rel="stylesheet" href="'.$url.'includes/css/admin/website_info.css">';
       
       echo '<script src="'.$url.'includes/plugins/date_time_picker/jquery-1.10.2.min.js"></script>';
       
       //jquery show dialog
       echo '<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
             <script type="text/javascript" src="http://localhost/slick_temp_api//includes/jquery/jquery-2.0.3.js"></script>
             <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
             <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
           ';  
      
       
        // <!--ckeditor-->
       echo '<script src="'.$url.'includes/plugins/ckeditor/ckeditor.js"></script>';
       // <!--end ckeditor--> 
       
     }    
    ?>
    
    
    
  </head>

<body>
<div id="container_main">
  
