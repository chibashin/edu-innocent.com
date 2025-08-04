<footer class="l-footer">
  <div class="l-footer__body">
    <div class="l-footer__info">
      <a href="<?= get_home_url('/'); ?>" class="l-footer__logo">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/logo.png" alt="" width="296" height="40" loading="lazy">
      </a>
      <address class="l-footer__address">
        <p class="l-footer__address-tel"><a href="tel:0968-41-8570">0968-41-8570</a></p>
        <p class="l-footer__address-content">受付：月～土曜日 14:00～22:00</p>
        <p class="l-footer__address-content">&#12306;861-0501<br>熊本県山鹿市山鹿347-2(山鹿教室)</p>
      </address>
    </div>
    <div class="l-footer__content">
      <div class="l-footer__btns l-grid l-grid--col2">
        <div class="l-footer__btn">
          <a href="https://edu-innocent.com/top/contact/" class="c-btn c-btn--green">無料体験授業お申込み</a>
        </div>
        <div class="l-footer__btn">
          <a href="https://edu-innocent.com/top/contact/" class="c-btn c-btn--orange">資料請求</a>
        </div>
      </div>
      <nav class="l-footer__nav">
        <ul class="l-footer__nav-list">
          <li class="l-footer__nav-item">
            <a href="#reason" class="l-footer__nav-link">イノセントが選ばれる理由</a>
          </li>
          <li class="l-footer__nav-item">
            <a href="#class" class="l-footer__nav-link">教室一覧</a>
          </li>
          <li class="l-footer__nav-item">
            <a href="https://edu-innocent.com/top/contact/" class="l-footer__nav-link">お問い合わせ</a>
          </li>
          <li class="l-footer__nav-item">
            <a href="<?php echo home_url('/'); ?>" class="l-footer__nav-link">プライバシーポリシー</a>
          </li>
        </ul>
      </nav>
    </div>
  </div>
	<div class="l-footer__copy">
		&copy; 学習塾 イノセント.
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
