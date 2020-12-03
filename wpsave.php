カスタム固定ページ表示
<?php
/*
Template Name: no-sidebar（カスタムテンプレートの名前）
*/
?>

カテゴリーID6を10個表示
ループ前に記載
<?php query_posts('cat=6&posts_per_page=10'); ?>

ワードプレスループ関数
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
/* ここに関数等を記載 */
<?php endwhile; endif; ?>

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