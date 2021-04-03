<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/project/project1/global_pass.php';
  require_once PROJECT_ROOT.'/components/header.inc';
?>
      <header>
        <div class="trips bg-fix">
          <?php echo PHP_EOL;
          require_once PROJECT_ROOT.'/components/top_nav.inc';
          echo PHP_EOL ?>
          <div class="banner">
            <div class="title">
              <p>MyMoscow</p>
              <p>агентство интересных маршрутов</p>
              <p>-Туры-</p>
            </div>
          </div>
        </div>
      </header>
      <main>
        <div class="title-block">
          <p>Выберите тур</p>
        </div>
        <br><br>
        <?php $result = mysqli_query($link, 'SELECT * FROM trips');
        while($pro = mysqli_fetch_assoc($result)){
          ?>
          <div class="trips-line">
          <div class="trips-img bg-fix half left-half" style="background-image: url('<?=PROJECT_URL.$pro['photo']?>');">

          </div>
          <div class="trips-line-message half">
            <?=$pro['description'];
            echo PHP_EOL?>
            <a href='<?=$pro['link']?>' class="button trips-line-button box"><?=$pro['text']?></a>
          </div>
          </div>
        <?php }
        echo PHP_EOL ?>
      </main>
      <div class="space"></div>
<?php
  require_once PROJECT_ROOT.'/components/footer.inc';
?>
