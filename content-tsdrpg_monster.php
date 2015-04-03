<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
		// Post thumbnail.
		//pitfalls_post_thumbnail();
	?>

	<header class="entry-header">
		<?php
			if ( is_single() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
			endif;
		?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			/* translators: %s: Name of current post */
			the_content( sprintf(
				__( 'Continue reading %s', 'twentyfifteen' ),
				the_title( '<span class="screen-reader-text">', '</span>', false )
			) );
			$str = get_post_meta( get_the_ID(), '_tsdrpg_stats_str', true );
			$dex = get_post_meta( get_the_ID(), '_tsdrpg_stats_dex', true );
			$con = get_post_meta( get_the_ID(), '_tsdrpg_stats_con', true );
			$int = get_post_meta( get_the_ID(), '_tsdrpg_stats_int', true );
			$wis = get_post_meta( get_the_ID(), '_tsdrpg_stats_wis', true );
			$cha = get_post_meta( get_the_ID(), '_tsdrpg_stats_cha', true );
			echo tsdrpg_stat_block( $str, $dex, $con, $int, $wis, $cha );
			$abilities = wpautop( get_post_meta( get_the_ID(), '_tsdrpg_abilities_wysiwyg', true) );
			echo '<dl class="dl-horizontal">';
			$size = get_post_meta( get_the_ID(), '_tsdrpg_size_taxonomy_select', true );
			if ( $size ) {
				echo '<dt>Size:</dt><dd>' . get_term( $size[0], 'tsdrpg_sizes' )->name . '</dd>';	
			}
			$space = get_post_meta( get_the_ID(), '_tsdrpg_monster_space', true );
			if ( $space ) {
				echo '<dt>Space:</dt><dd>' . $space . '</dd>';	
			}
			$reach = get_post_meta( get_the_ID(), '_tsdrpg_monster_reach', true );
			if ( isset( $reach ) ) {
				echo '<dt>Reach:</dt><dd>' . $reach . '</dd>';	
			}
			$type = get_post_meta( get_the_ID(), '_tsdrpg_monster_type', true );
			if ( $type ) {
				echo '<dt>Type:</dt><dd>' . $type. '</dd>';	
			}
			$hit_die = get_post_meta( get_the_ID(), '_tsdrpg_monster_hit_die', true );
			if ( $hit_die ) {
				echo '<dt>Hit Die:</dt><dd>' . $hit_die . '</dd>';	
			}
			$initiative = get_post_meta( get_the_ID(), '_tsdrpg_monster_initiative', true );
			if ( $initiative ) {
				echo '<dt>Initiative:</dt><dd>' . $initiative . '</dd>';	
			}
			$speed = get_post_meta( get_the_ID(), '_tsdrpg_monster_speed', true );
			if ( $speed ) {
				echo '<dt>Speed:</dt><dd>' . $speed . '</dd>';	
			}
			$ac = get_post_meta( get_the_ID(), '_tsdrpg_monster_ac', true );
			if ( $ac ) {
				echo '<dt>AC:</dt><dd>' . $ac . '</dd>';	
			}
			$bam = get_post_meta( get_the_ID(), '_tsdrpg_monster_bam_uncommon', true );
			if ( $bam ) {
				echo '<dt>BAM/Uncommon:</dt><dd>' . $bam . '</dd>';	
			}
			$attacks = get_post_meta( get_the_ID(), '_tsdrpg_monster_attacks', true );
			if ( $attacks ) {
				echo '<dt>Attacks:</dt><dd>' . $attacks . '</dd>';	
			}
			$full_attack = get_post_meta( get_the_ID(), '_tsdrpg_monster_full_attack', true );
			if ( $full_attack ) {
				echo '<dt>Full Attack:</dt><dd>' . $full_attack . '</dd>';	
			}
			$special_attacks = get_post_meta( get_the_ID(), '_tsdrpg_monster_special_attacks', true );
			if ( $special_attacks ) {
				echo '<dt>Special Attacks:</dt><dd>' . $special_attacks . '</dd>';	
			}
			$special_qualities = get_post_meta( get_the_ID(), '_tsdrpg_monster_special_qualities', true );
			if ( $special_qualities ) {
				echo '<dt>Special Qualities:</dt><dd>' . $special_qualities . '</dd>';	
			}
			$saves = get_post_meta( get_the_ID(), '_tsdrpg_monster_saves', true );
			if ( $saves ) {
				echo '<dt>Saves:</dt><dd>' . $saves . '</dd>';	
			}
			$skills = get_post_meta( get_the_ID(), '_tsdrpg_monster_skills', true );
			if ( $skills ) {
				echo '<dt>Skills:</dt><dd>' . $skills . '</dd>';	
			}
			$feats = get_post_meta( get_the_ID(), '_tsdrpg_monster_feats', true );
			if ( $feats ) {
				echo '<dt>Feats:</dt><dd>' . $feats . '</dd>';	
			}
			$environment = get_post_meta( get_the_ID(), '_tsdrpg_monster_environment', true );
			if ( $environment ) {
				echo '<dt>Environment:</dt><dd>' . $environment . '</dd>';	
			}
			$organizations = get_post_meta( get_the_ID(), '_tsdrpg_monster_organizations', true );
			if ( $organizations ) {
				echo '<dt>Organizations:</dt><dd>' . $organizations . '</dd>';	
			}
			$cr = get_post_meta( get_the_ID(), '_tsdrpg_monster_cr', true );
			if ( $ac ) {
				echo '<dt>CR:</dt><dd>' . $cr . '</dd>';	
			}
			$advancement = get_post_meta( get_the_ID(), '_tsdrpg_monster_advancement', true );
			if ( $advancement ) {
				echo '<dt>Advancement:</dt><dd>' . $advancement . '</dd>';	
			}
			$items_carried = get_post_meta( get_the_ID(), '_tsdrpg_monster_items_carried', true );
			if ( $items_carried ) {
				echo '<dt>Items Carried:</dt><dd>' . $items_carried . '</dd>';	
			}
			echo '</dl>';
			if ( $abilities ) {
				echo '<h2>Abilities</h2>' . $abilities;
			}
			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentyfifteen' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );
		?>
	</div><!-- .entry-content -->

	<?php
		// Author bio.
		if ( is_single() && get_the_author_meta( 'description' ) ) :
			get_template_part( 'author-bio' );
		endif;
	?>

	<footer class="entry-footer">
		<?php //pitfalls_entry_meta(); ?>
		<?php edit_post_link( __( 'Edit', 'twentyfifteen' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
