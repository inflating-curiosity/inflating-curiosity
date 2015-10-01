<style>
</style>
<div class="text aristotheme">
  <ul>
  <?php foreach($links as $link): ?>
    <li><strong><?php echo $link["label"] ?>:</strong> <a href="<?php echo $link["href"] ?>" target="_blank"><?php echo $link["text"] ?></a></li>
  <?php endforeach ?>
  </ul>
</div>
