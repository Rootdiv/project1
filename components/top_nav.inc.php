          <div class="top-nav box">
            <div class="logo">
              <i>MyMoscow</i>
            </div>
            <div class="to-end">
              <nav>
                <ul>
                  <?php $link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
                  mysqli_set_charset($link, "utf8");
                  $result = mysqli_query($link, 'SELECT * FROM pages');
                  while ($pro = mysqli_fetch_assoc($result)) {
                    ?><li>
                  <a href="<?=PROJECT_URL . $pro['link'];?>"><?=$pro['page'];?></a>
                  </li>
                  <?php }
                  echo PHP_EOL;?>
                </ul>
              </nav>
            </div>
          </div>
