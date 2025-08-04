<?php

/**
 * CSSとJavaScriptの読み込み
 *
 */
define("DIRE", get_template_directory_uri());
function add_files()
{
	if (!is_admin()) {
		//css
		wp_enqueue_style('swiper_style',  'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css');
		wp_enqueue_style('style_style', DIRE . '/assets/css/style.css?' . date("ymdHis", filemtime(get_template_directory() . '/assets/css/style.css')));
		wp_enqueue_style('base_style', DIRE . '/style.css?' . date("ymdHis", filemtime(get_template_directory() . '/style.css')));

		//javascript
		wp_deregister_script('jquery');
		wp_enqueue_script('jquery-main', 'https://code.jquery.com/jquery-3.4.1.js');
		wp_enqueue_script('bundle', DIRE . '/assets/js/script.js?' . date("ymdHis", filemtime(get_template_directory() . '/assets/js/script.js')), false, '1.0', true);
		wp_enqueue_script('bundle-sw', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js', false, '1.0', true);

		//drawer
		// wp_enqueue_style('drawer_style',  'https://cdnjs.cloudflare.com/ajax/libs/drawer/3.1.0/css/drawer.min.css');
		// wp_enqueue_script('iscroll', 'https://cdnjs.cloudflare.com/ajax/libs/iScroll/5.1.3/iscroll.min.js');
		// wp_enqueue_script('drawer', 'https://cdnjs.cloudflare.com/ajax/libs/drawer/3.1.0/assets/js/drawer.min.js');
	}
}
add_action('wp_enqueue_scripts', 'add_files');

// styles
function gutenberg_support_setup()
{
	add_theme_support('wp-block-styles');
	add_theme_support('align-wide');
	add_theme_support('editor-styles');
	add_editor_style('admin/editor-style.css');
}
add_action('after_setup_theme', 'gutenberg_support_setup');


/**
 * セキュリティ
 *
 */
/* authorリダイレクト */
add_action('init', 'disable_author_archive_query');
function disable_author_archive_query()
{
	if (preg_match('/author=([0-9]*)/i', $_SERVER['QUERY_STRING'])) {
		wp_redirect(home_url());
		exit;
	}
}

/*不要なタグの出力停止*/
remove_action('wp_head', 'wp_generator'); // WordPressのバージョン
remove_action('wp_head', 'wp_shortlink_wp_head'); // 短縮URLのlink
remove_action('wp_head', 'wlwmanifest_link'); // ブログエディターのマニフェストファイル
remove_action('wp_head', 'rsd_link'); // 外部から編集するためのAPI
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'feed_links', 2); // フィードへのリンク

/* 絵文字スクリプトの削除 */
function disable_emoji()
{
	remove_action('wp_head', 'print_emoji_detection_script', 7);
	remove_action('admin_print_scripts', 'print_emoji_detection_script');
	remove_action('wp_print_styles', 'print_emoji_styles');
	remove_action('admin_print_styles', 'print_emoji_styles');
	remove_filter('the_content_feed', 'wp_staticize_emoji');
	remove_filter('comment_text_rss', 'wp_staticize_emoji');
	remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
}
add_action('init', 'disable_emoji');

// dns-prefetchを非表示にする
add_filter('wp_resource_hints', 'remove_dns_prefetch', 10, 2);
function remove_dns_prefetch($hints, $relation_type)
{
	if ('dns-prefetch' === $relation_type) {
		return array_diff(wp_dependencies_unique_hosts(), $hints);
	}
	return $hints;
}


/**
 * アーカイブタイトル書き換え
 *
 */

//管理画面投稿の表示変更
function Change_menulabel() {
  global $menu;
  global $submenu;
  $name = '';
  $menu[5][0] = $name;
  $submenu['edit.php'][5][0] = $name . "一覧";
  $submenu['edit.php'][10][0] = '新規追加';
}
function Change_objectlabel() {
  global $wp_post_types;
  $name = '';
  $labels = &$wp_post_types['post']->labels;
  $labels->name = $name;
  $labels->singular_name = $name;
  $labels->add_new = _x('新規追加', $name);
  $labels->add_new_item = $name.'の新規追加';
  $labels->edit_item = $name.'の編集';
  $labels->new_item = '新規'.$name;
  $labels->view_item = $name.'を表示';
  $labels->search_items = $name.'を検索';
  $labels->not_found = $name.'が見つかりませんでした';
  $labels->not_found_in_trash = 'ゴミ箱に'.$name.'は見つかりませんでした';
}
add_action( 'init', 'Change_objectlabel' );
add_action( 'admin_menu', 'Change_menulabel' );

//投稿アイキャッチの設定
add_theme_support( 'post-thumbnails' );

/**
 * 不要機能非表示
 *
 */
/* 管理メニュー */
add_action("admin_menu", "unset_menu");
function unset_menu()
{
	global $menu;
	unset($menu[5]); //投稿メニュー
	unset($menu[25]); //コメント
	if (current_user_can('author')) {
		unset($menu[2]);	// ダッシュボード
		remove_menu_page('wpcf7');
		unset($menu[70]); //プロフィール
		unset($menu[75]); //ツール
	}
	global $submenu;
	// unset($submenu['edit.php'][15]); // カテゴリー
	unset($submenu['edit.php'][16]); // タグ
}

add_action('admin_bar_menu', 'my_remove_adminbar_menu', 201);

function my_remove_adminbar_menu($wp_admin_bar)
{
	$wp_admin_bar->remove_menu('comments');     // コメント
	$wp_admin_bar->remove_menu('new-content');  // 新規
	$wp_admin_bar->remove_node('edit-profile'); // プロフィール編集
}
