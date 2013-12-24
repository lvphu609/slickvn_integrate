
<?php $url=  base_url();

    //var_dump($info_post);
    foreach ($info_post as $value_info_post){
      $id                  =  $value_info_post['id'];
      $id_user             =  $value_info_post['id_user'];
      $title               =  $value_info_post['title'];
      $title=substr($title,0,50) . '...';
     
    
    
    }
    
  

?>

<div id="location_page">
  <div class="box_location_page_center">
    <div class="location_page_detail">
      <a href="<?php echo $url;?>index.php/"><div class="logo_home"></div></a>
      <div class="text_location">
        <div class="icon_grater_than">></div>
        <span><div class="text_detail">Bài viết</div></span>
        <div class="icon_grater_than">></div>
        <span><div class="text_detail"><?php echo $title;?></div></span>
      </div>
    </div>
    <div class="line_bottom_location_page"></div>
  </div>  
</div>