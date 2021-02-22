カスタム固定ページ表示
<?php
/*
Template Name: no-sidebar（カスタムテンプレートの名前）
*/
?>

トップURL取得
<?php echo home_url() ?>

カテゴリーID6を10個表示
ループ前に記載
<?php query_posts('cat=6&posts_per_page=10'); ?>

ワードプレスループ関数
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		/* ここに関数等を記載 */
<?php endwhile;
endif; ?>

投稿者名表示
<?php the_author(); ?>

カテゴリー名表示
<?php the_category(); ?>

日付表示
<?php echo get_the_date('Y.n.d'); ?>

トップページのURL表示
<?php echo home_url() ?>

記事URL取得
<?php the_permalink(); ?>

タイトル文字制限
<?php
if (mb_strlen($post->post_title, 'UTF-8') > 20) {
	$title = mb_substr($post->post_title, 0, 20, 'UTF-8');
	echo $title . '……';
} else {
	echo $post->post_title;
}
?>

ワードプレスのユーザー画像を表示
<?php
$author = get_the_author_meta('id');
$author_img = get_avatar($author);
$imgtag = '/<img.*?src=(["\'])(.+?)\1.*?>/i';
if (preg_match($imgtag, $author_img, $imgurl)) {
	$authorimg = $imgurl[2];
}
?>
画像表示
<img src="<?php echo $authorimg ?>" alt="">

別のphpファイルから読み込み
<?php include("aaaaa.php"); ?>

ナビゲーションメニューをループで表示
<?php
$menu_items = wp_get_nav_menu_items('メニュー名を入力');
if ($menu_items) :
	foreach ($menu_items as $menu) : setup_postdata($menu);
?>
		<option value="<?php echo esc_attr($menu->url); ?>"><?php echo esc_html($menu->title); ?>
		</option>
<?php
	endforeach;
endif;
wp_reset_postdata();
?>

アドバンスカスタムフィールド
テキスト
<?php the_field(); ?>

画像
<?php
get_field($contentsimg);
if ($images) {
	echo '<img src="' . $images[url] . '" >';
}
?>

例
					<?php for ($i = 1; $i <= 4; $i++) :
						$contentsimg = "contents0" . $i . "_img";
						$contentstext = "contents0" . $i . "_title";
						$contentslink = "contents0" . $i . "_link";
					?>
						<li>
							<a href="<?php the_field($contentslink); ?>">
								<?php if (get_field($contentsimg)) : ?>
									<?php
									$images = get_field($contentsimg);
									if ($images) {
										echo '<img src="' . $images[url] . '" >';
									}
									?>
								<?php else : ?>
									<img src="<?php echo home_url() ?>/cms/cmnfix/noimage.jpg" alt="noimage">
								<?php endif; ?>
								<h2><?php the_field($contentstext); ?></h2>
							</a>
						</li>