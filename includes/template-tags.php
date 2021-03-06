<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 */

/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function mandir_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		esc_html_x( 'Posted on %s', 'post date', 'mandir' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		esc_html_x( 'by %s', 'post author', 'mandir' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.
}

/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function mandir_entry_footer() {

	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'mandir' ) ); // WPCS: XSS OK.
		if ( $categories_list && mandir_categorized_blog() ) {
			printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'mandir' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', __( ', ', 'mandir' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . __( 'Tagged %1$s', 'mandir' ) . '</span>', $tags_list );
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( esc_html__( 'Leave a comment', 'mandir' ), esc_html__( '1 Comment', 'mandir' ), esc_html__( '% Comments', 'mandir' ) );
		echo '</span>';
	}

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'mandir' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function mandir_categorized_blog() {

	if ( false === ( $all_the_cool_cats = get_transient( 'mandir_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'mandir_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so mandir_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so mandir_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in mandir_categorized_blog.
 */
function mandir_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	delete_transient( 'mandir_categories' );
}
add_action( 'edit_category', 'mandir_category_transient_flusher' );
add_action( 'save_post',     'mandir_category_transient_flusher' );


/**
 * Returns Change date format.
 *
 * @return string with nice dates
 */
function mandir_convert_date($date, $dateformatstring = 'j \d\e F' ) {
	global $post;

	//Check that ID belongs to an event
	if ( empty( $date ) ) :
		return false;
	else :

		if ( is_english() ) :
			//Change to nice date format
			$newdate = date("F j", strtotime($date));
		else :
			$newdate = date_i18n( $dateformatstring, strtotime( $date ) );
		endif;

		return $newdate;
	endif;
}


/**
 * Returns formatted phone number.
 *
 * @return string with nice dates
 */
function mandir_format_phone_link($n) {
	$patterns = '/([+][0-9]{3})(-)/'; // [0-9]{3}$
	$replacements = '(\1) ';
	$phone = preg_replace($patterns, $replacements, $n);
	return $phone;
}


/**
 * Returns img srcset.
 *
 * @return string with img srcset tag
 */
function mandir_srcset($srcset_sizes,$sizes,$alt,$id=null) {
	if ( !$srcset_sizes || !$sizes) {
		return false;
	} else {
		if ( !$id ) {
			$id = get_post_thumbnail_id( get_the_id() );
		}

		$srcset = array();
		$w = 0;
		$default = '';
		foreach ($srcset_sizes as $src_size) {
			$src = ipq_get_theme_image_url( $id, $src_size );
			$srcset[] = $src . ' ' . $src_size[0] .'w';

			if ( $src_size[0] > $w ) {
				$default = $src;
				$w = $src_size[0];
			}
		}
		$srcset = implode(",", $srcset);

		$img_srcset = '<img srcset="'.$srcset.'" sizes="'.$sizes.'" src="'.$default.'" alt="'.$alt.'" />';

		return $img_srcset;
	}
}