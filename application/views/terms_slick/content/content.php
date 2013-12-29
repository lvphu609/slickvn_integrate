<?php $url=  base_url(); 
 ?>


<div id="content_show_terms">
  <div class="box_align_center">
    <div class="box_left">
      <ul>
        <?=  $item_list ?>
      </ul>
    </div>
    <div class="box_right">
      <div class="text_center">
       <?= htmlspecialchars_decode ($item_selected_content); ?>
      </div>
    </div>
  </div>
</div>