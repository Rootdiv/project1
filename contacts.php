<?php
  require_once $_SERVER['DOCUMENT_ROOT'] . '/project/project1/global_pass.php';
  require_once PROJECT_ROOT . '/components/header.inc.php';
?>
      <header>
        <div class="cont bg-fix">
          <?php echo PHP_EOL;
          require_once PROJECT_ROOT . '/components/top_nav.inc.php';
          echo PHP_EOL; ?>
          <div class="banner">
            <div class="title">
              <p>MyMoscow</p>
              <p>агентство интересных маршрутов</p>
              <p>-Контакты-</p>
            </div>
          </div>
        </div>
      </header>
      <main>
        <div id="about" class="contents">
          <div class="title-block">
            <p>О компании</p>
          </div>
          <br>
          <div>
            <p>Мы - команда тех, кто любит историю и любит Москву.</p>
            <p>
              Москва - это не только место по «заколачиванию денег» и «взращиванию карьеры», а еще и бесконечно красивые
              памятники природы, заказники, парки, заповедники. Активный отдых в Москве и Подмосковье – это отличная
              возможность вырваться из душного мегаполиса куда-нибудь в «дебри», навстречу приключениям. К счастью, не все
              Подмосковье еще «облагорожено» асфальтными дорожками и высоченными коттеджными заборами. Еще встречаются места,
              настолько глухие и далекие, что, очутившись там, кажется, что ты – первый человек, ступивший на эту землю.
            </p>
            <p>
              Там, где не проедет автомобилист и даже велосипедист, найдет лазейку и откроет для себя все красоты 100%
              бездорожья турист, проводящий свой активный отдых в Подмосковье.
            </p>
          </div>
          <div class="cont-space"></div>
          <div class="contact-block flex-box">
            <div class="contact flex-box half">
              <div class="contact-img1 bg-fix">

              </div>
              <div class="contact-about box" style="margin-right: 60px">
                <b>Александр Рыбаков</b><br>
                директор
                <br>
                <br>
                <br>
                По всем вопросам пишите на почту:<br>
                <a href="mailto:rybakov@mymoscow.ru">rybakov@mymoscow.ru</a>
              </div>
            </div>
            <div class="contact flex-box half">
              <div class="contact-img2 bg-fix">

              </div>
              <div class="contact-about box">
                <b>Елена Белкина</b><br>
                руководитель корпоративного отдела
                <br>
                <br>
                <br>
                По вопросам корпоративных экскурсий:<br>
                <a href="mailto:belkina@mymoscow.ru">belkina@mymoscow.ru</a>
              </div>
            </div>
          </div>
          <div class="cont-space"></div>
          <div class="box-small"></div>
          <div class="message-cont flex-box">
            <div class="message-contacts">
              <?php $result = mysqli_query($link, 'SELECT * FROM global_info');
                $pro = mysqli_fetch_assoc($result);
                ?><div class="message-contact">
                <div>
                  <img src="<?=PROJECT_URL;?>/img/icons/placeholder.png" alt="" />
                </div>
                <div class="message-contact-text">Адрес:<br><?=$pro['adders'];?></div>
              </div>
              <div class="message-contact">
                <div>
                  <img src="<?=PROJECT_URL;?>/img/icons/mail.png" alt="" />
                </div>
                <div class="message-contact-text">E-mail:<br><?=$pro['email'];?></div>
              </div>
              <div class="message-contact">
                <div>
                  <img src="<?=PROJECT_URL;?>/img/icons/telephone.png" alt="" />
                </div>
                <div class="message-contact-text">Телефон:<br><?=$pro['tel'];?></div>
              </div>
            </div>
            <div class="message-box">
              <div>
                Напишите нам
              </div>
              <form method="POST" action="<?=PROJECT_URL;?>/message.php">
                <label>
                  <input class="input-text" type="text" name="full_name" placeholder="ФИО">
                </label>
                <label>
                  <input class="input-text" type="email" name="email" required placeholder="E-mail">
                </label>
                <label>
                  <textarea name="text" required placeholder="Ваше сообщение"></textarea>
                </label>
                <div>
                  <input class="input-text" type="submit" value="отправить">
                </div>
              </form>
            </div>
          </div>
          <div class="cont-space"></div>
        </div>
        <div id="map">

        </div>
      </main>
<?php
  require_once PROJECT_ROOT . '/components/footer.inc.php';
?>
