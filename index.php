<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/project/project1/global_pass.php';
  require_once PROJECT_ROOT.'/components/header.inc.php';
?>
      <header>
        <div class="slider-container">
          <?php echo PHP_EOL;
            require_once PROJECT_ROOT.'/components/top_nav.inc.php';
          echo PHP_EOL ?>
          <div class="slider banner flex-box horizontal-nav horizontal-arrows">
            <ul class="slides" style="margin: 0">
              <?php $result = mysqli_query($link, 'SELECT * FROM slides');
              while($pro = mysqli_fetch_assoc($result)){ echo PHP_EOL ?>
                <li>
                  <div class="bg-fix slide" style="background-image: url('<?=PROJECT_URL.$pro['slide']?>');">
                    <div class="title"><?=$pro['title']?></div>
                    <a href="<?=$pro['link']?>" class="button about"><?=$pro['button']?></a>
                  </div>
                </li>
              <?php } echo PHP_EOL ?>
            </ul>
          </div>
        </div>
      </header>
      <main>
        <div class="message-line">
          <h1 class="title-block">Что мы предлагаем?</h1>
          <b>Наша главная цель - рассказать о Москве так, чтобы это было интересно всем!</b>
        </div>
        <div class="contents flex-box flex-wrap">
          <?php $result = mysqli_query($link, 'SELECT * FROM services');
          while($pro = mysqli_fetch_assoc($result)){
            ?><div class="one-third box">
            <div class="content flex-box box-small">
              <div>
                <img src="<?=PROJECT_URL.$pro['pictures']?>" alt="Иконка" />
              </div>
              <div><?=$pro['text']?></div>
            </div>
            </div>
          <?php } echo PHP_EOL ?>
        </div>
        <br id="about">
        <div class="about-line flex-box">
          <div class="about-img bg-fix half">

          </div>
          <div class="about-line-message half to-end">
            <p><b>Кто мы такие</b></p>
            <div class="box-small">
              Мы - команда тех, кто любит историю и любит Москву.
            </div>
            <div class="box-small">
              Москва – это не только место по «заколачиванию денег» и «взращиванию карьеры», а еще и бесконечно красивые памятники природы, заказники, парки, заповедники.
              Активный отдых в Москве и Подмосковье – это отличная возможность вырваться из душного мегаполиса куда-нибудь в «дебри», навстречу приключениям.
              К счастью, не все Подмосковье еще «облагорожено» асфальтными дорожками и высоченными коттеджными заборами.
              Еще встречаются места, настолько глухие и далекие, что, очутившись там, кажется, что ты – первый человек, ступивший на эту землю.
            </div>
            <div class="box">
              Там, где не проедет автомобилист и даже велосипедист, найдет лазейку и откроет для себя все красоты 100% бездорожья турист,
              проводящий свой активный отдых в Подмосковье.
            </div>
            <div class="box"></div>
            <a href="<?=PROJECT_URL?>/contacts.php" class="button about-line-button box">
              Подробнее о нас
            </a>
          </div>
        </div>
        <div class="photo-line">
          <div>
            <p class="title-block">Москва в фотографиях</p>
          </div>
          <div class="line"><!--Линия--></div>
          <p>Проще всего рассказать обо всем в фотографиях. Смотрите наши фотоотчёты и присылайте нам свои фотографии</p>
          <div class="flex-box flex-wrap">
            <?php $result = mysqli_query($link, 'SELECT * FROM photos');
            while($pro = mysqli_fetch_assoc($result)){
              ?><img src="<?=PROJECT_URL.$pro['photo']?>" alt="Фото"/>
            <?php } echo PHP_EOL ?>
          </div>
        </div>
        <div id="otziv" class="otziv-line">
          <div>
            <p class="title-block">Отзывы</p>
          </div>
          <div class="line"><!--Линия--></div>
          <div class="box"></div>
          <?php $arr = [];
          $result = mysqli_query($link, 'SELECT * FROM reviews');
          while($pro = mysqli_fetch_assoc($result)){
            $arr[] = $pro;
          } ?>
          <div class="slider flex-box horizontal-nav">
            <ul class="slides">
              <?php $num = count($arr);
              for($i = 0; $i < $num; $i = $i + 2){
                ?><li>
                <div>
                  <div class="otziv-line-text">
                    <i><?=$arr[$i]['text']?></i>
                  </div>
                  <div>
                    <img src="<?=PROJECT_URL.$arr[$i]['avatar']?>" alt="Фото автора" /> <?=$arr[$i]['name']?></div>
                </div>
                <div>
                  <div class="otziv-line-text">
                    <i><?=$arr[$i + 1]['text']?></i>
                  </div>
                  <div>
                    <img src="<?=PROJECT_URL.$arr[$i + 1]['avatar']?>" alt="Фото автора" /> <?=$arr[$i + 1]['name']?></div>
                </div>
                </li>
              <?php }echo PHP_EOL ?>
            </ul>
          </div>
          <div class="box-small"></div>
        </div>
        <div id="mes" class="message">
          <p class="title-block">Напишите нам</p>
          <div class="line"><!--message box send--></div>
          <div class="message-space"></div>
          <div>
            <form method="POST" action="<?=PROJECT_URL.'/message.php'?>">
              <div class="flex-box">
                <div class="send">
                  <label>
                    <input class="input-text" type="text" name="fio" placeholder="ФИО">
                  </label>
                  <label>
                    <input class="input-text" type="email" name="email" required placeholder="Email">
                  </label>
                  <label>
                    <input class="input-text" type="tel" name="tel" required placeholder="Телефон">
                  </label>
                  <label>
                    <input class="input-text" type="submit" value="Отправить вопрос">
                  </label>
                </div>
                <label class="areatext">
                  <textarea name="text" required placeholder="Ваше сообщение"></textarea>
                </label>
              </div>
            </form>
          </div>
        </div>
      </main>
<?php
  require_once PROJECT_ROOT.'/components/footer.inc.php';
?>
