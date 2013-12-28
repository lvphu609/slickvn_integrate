<li>
  <a href="<?php echo $this->item_url;?>" >
    <div class="left">
      <span>
        <div class='text_center <?= $this->is_selected ?> ' >
          <?php echo $this->item_name ?>
        </div>
      </span>
    </div>
  </a>
  <div class="right <?php echo $this->is_selected; ?>"></div>
</li>