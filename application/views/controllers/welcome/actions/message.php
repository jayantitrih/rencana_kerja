<div class="list-group">
  <?php if(isset($messages)): ?>
  <?php foreach($messages as $key => $value) : ?>

  <div class="list-group-item">
    <h4 class="list-group-item-heading">  
      <p class="list-group-item-text"><?= $value['subject'] ?></p>
      <br/>
      <small><?= $value['created_at'] ?></small>
    </h4>
    <p class="list-group-item-text">
      Dari : <?= $value['name'] ?>
    </p>
    <p class="list-group-item-text">
    <?= $value['message'] ?> 
    </p>
    <!-- link dibawah ini untuk mengubah status baca 0 / 1-->
    <a href="<?= site_url('welcome/read/'.$value['id']) ?>">
      <i class="fa fa-check"></i> Sudah dibaca
    </a>
  </div>

<?php endforeach; ?>
<?php endif; ?>
</div>