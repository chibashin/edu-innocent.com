<!DOCTYPE html>
<html lang="ja">
<head>
  <!-- Google Tag Manager 202507 adlil -->
  <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
  new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
  j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
  'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
  })(window,document,'script','dataLayer','GTM-KL4BWTX6');</script>
  <!-- End Google Tag Manager -->
	<?php wp_head()?>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
	<meta name="format-detection" content="telephone=no">
	<!-- Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Playwrite+AU+SA+Guides&family=Rampart+One&display=swap" rel="stylesheet">
	<!-- Favicon -->
  <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/assets/favicon/favicon-96x96.png" sizes="96x96" />
  <link rel="icon" type="image/svg+xml" href="<?php echo get_template_directory_uri(); ?>/assets/favicon/favicon.svg" />
  <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/assets/favicon/favicon.ico" />
  <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/assets/favicon/apple-touch-icon.png" />
  <meta name="apple-mobile-web-app-title" content="MyWebSite" />
  <link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/assets/favicon/site.webmanifest" />
  <meta name="theme-color" content="#FFFBF1">
	<?php if (is_user_logged_in()) {
		echo "<style type='text/css'>html[lang='ja'] {margin: 0 !important;} #wpadminbar { top: unset!important; bottom: 0; } @media screen and (max-width: 600px) { #wpadminbar { position: fixed; }} </style>";
	} ?>
</head>

<body <?php body_class(); ?>>
<!-- Google Tag Manager (noscript) 202507 adlil -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KL4BWTX6"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<header class="l-header fadeDown u-z50" id="header">
	<div class="l-header__inner">
    <?php if( is_front_page() ) : ?>
		<h1 class="l-header__logo">
      <a class="l-header__logo" href="<?= get_home_url('/'); ?>" title="学習塾イノセント">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/logo.png" alt="学習塾イノセント" width="476" height="64">
      </a>
		</h1>
    <?php else: ?>
		<a class="l-header__logo" href="<?= get_home_url('/'); ?>">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/logo.png" alt="学習塾イノセント" width="476" height="64">
		</a>
    <?php endif; ?>
		<div class="l-header__right">
			<nav class="l-navi" aria-label="サイト内メニュー">
				<div class="l-navi__inner">
          <div class="l-header__top">
            <div class="l-navi__btn-wrap">
              <a href="https://edu-innocent.com/top/contact/" class="l-navi__btn">資料請求</a>
              <a href="https://edu-innocent.com/top/contact/" class="l-navi__btn">お問い合わせ</a>
            </div>
            <div class="l-fixed__wrap u-pc">
              <a href="tel:0942-36-8878" class="l-fixed__btn l-fixed__btn-tel">
                <span class="num">0942-36-8878</span>
                <span class="text">代表 津福教室 (受付：月〜土曜14:00～22:00)</span>
              </a>
              <a href="https://edu-innocent.com/top/contact/" class="l-fixed__btn l-fixed__btn-cta">
                <span class="text01">無料体験授業</span>
                <span class="text02">お申し込みはこちら</span>
              </a>
            </div>
          </div>
          <ul class="l-navi__menu">
            <li class="l-navi__menu-item">
              <a href="#reason" class="l-navi__menu-link">イノセントが選ばれる理由</a>
            </li>
            <li class="l-navi__menu-item">
              <a href="#class" class="l-navi__menu-link">教室紹介</a>
            </li>
          </ul>
				</div>
			</nav>
			<button type="button" class="l-header__trigger u-st u-z100" role="button">
				<span class="l-header__trigger-inner">
					<span class="l-header__trigger-wrap">
						<span class="l-header__trigger-line"></span>
						<span class="l-header__trigger-line"></span>
						<span class="l-header__trigger-line"></span>
					</span>
				</span>
        <span class="l-header__trigger-comm">
          <span class="open">menu</span>
          <span class="close">close</span>
        </span>
			</button>
		</div>
	</div>
</header>

<div class="l-fixed__wrap u-st u-z50">
  <a href="tel:0942-36-8878" class="l-fixed__btn l-fixed__btn-tel">
    <span class="num">0942-36-8878</span>
    <span class="text"><span class="u-sp">代表 </span>津福教室 (<span class="u-sp">受付：</span>月〜土曜14:00～22:00)</span>
  </a>
  <a href="https://edu-innocent.com/top/contact/" class="l-fixed__btn l-fixed__btn-cta">
    <span class="text01">無料体験授業</span>
    <span class="text02">お申し込みはこちら</span>
  </a>
</div>
