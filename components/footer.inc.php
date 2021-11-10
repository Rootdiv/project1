      <footer>
        <div class="footer box flex-box">
          <div class="footer-about">
            <img src="<?=PROJECT_URL;?>/img/icons/spasskaya-tower.png" alt="" />
            <b>MyMoscow</b>
            <p>
              Мы приглашаем тебя на самые разные экскурсии по Москве. Автобусные и пешеходные, на целый день или на
              несколько часов, на свежем воздухе или с заходом в здания - у нас в ассортименте более 20 авторских
              экскурсий по Москве, выбирай и узнавай Москву вместе с нами!
            </p>
          </div>
          <div class="contacts">
            <a href="<?=PROJECT_URL;?>/contacts.php">Контакты</a>
            <div class="box-small"></div>
            <?php $result = mysqli_query($link, 'SELECT * FROM global_info');
            $pro = mysqli_fetch_assoc($result);
            echo PHP_EOL;?>
            <img src="<?=PROJECT_URL;?>/img/icons/placeholder.png" alt="Адрес" />
            <?=$pro['adders'];?><br>
            <img src="<?=PROJECT_URL;?>/img/icons/telephone.png" alt="Телефон" />
            <?=$pro['tel'];?><br>
            <img src="<?=PROJECT_URL;?>/img/icons/mail.png" alt="E-mail" />
            <?=$pro['email'] . PHP_EOL;?>
          </div>
          <div class="footer-news">
            <p>Последние новости</p>
            <?php $result = mysqli_query($link, 'SELECT * FROM news');
            while ($pro = mysqli_fetch_assoc($result)) {
            ?><p><?=$pro['news'];?></p>
            <br>
            <a href="#"><?=$pro['date'];?></a>
            <?php } echo PHP_EOL;?>
          </div>
        </div>
        <div>
          <div class="copy-footer">
            <div>
              <?php $result = mysqli_query($link, 'SELECT * FROM global_info');
              $pro = mysqli_fetch_assoc($result);
              echo $pro['copy'] . PHP_EOL;?>
            </div>
            <div>
              Designed by Nordic IT School
            </div>
            <div class="social-networks">
              <?php $result = mysqli_query($link, 'SELECT * FROM social_networks');
              while ($pro = mysqli_fetch_assoc($result)) {
                ?><a href="<?=$pro['link'];?>" rel="noopener noreferrer" target="_blank">
                <img src="<?=PROJECT_URL . $pro['icon'];?>" alt="Иконка" />
              </a>
              <?php }
              echo PHP_EOL;?>
            </div>
          </div>
        </div>
      </footer>
    </div>
    <script src="<?=PROJECT_URL;?>/js/scripts.js"></script>
    <script src="<?=PROJECT_URL;?>/js/slider.js"></script>
  </body>
</html>
