<?php
/**
 * The template part for displaying filters
 */
?>

<div class="filter-sort clearfix">

	<div class="filter">

		<label class="filters-label">Filtrar</label>

		<div class="filter-options">


			<select id="select-event">
				<option value="0">Todos las colecciones</option>

				<?php
				$args = [
				    'taxonomy'     => 'mro_video_subject',
				    'parent'        => 0,
				    // 'number'        => 10,
				    'hide_empty'    => true           
				];
			    $terms = get_terms( $args );

			    if ( count( $terms ) > 0 ): ?>
			        <div class="evento">
			        <?php
			        foreach ( $terms as $term ) {
			            // $term_link = get_term_link( $term );
			            echo '<option value="' . $term->slug . '">' . $term->name . '</option>';
			        } ?>
			        </div>
			    <?php endif;
				?>
			</select> <!-- end .select-event -->

			<select id="select-event">
				<option value="0">Todos los instructores</option>

				<?php
			    $terms = get_terms( 'mro_video_instructor' );

			    if ( count( $terms ) > 0 ): ?>
			        <div class="evento">
			        <?php
			        foreach ( $terms as $term ) {
			            // $term_link = get_term_link( $term );
			            echo '<option value="' . $term->slug . '">' . $term->name . '</option>';
			        } ?>
			        </div>
			    <?php endif;
				?>
			</select> <!-- end .select-event -->


			<form role="search" id="video-search"  method="get" action="<?php echo home_url('/'); ?>">
				<input type="search" value="" name="s" id="s" placeholder="Buscar">

				<!-- Shouldn't be needed, should be hard coded -->
				<input type="hidden" name="post_type" value="mro_video" />
				<input type="submit" id="searchsubmit" value="<?php esc_attr_e('Search', 'mandir'); ?>">
			</form> <!-- end #puravida-search -->


			<a href="#" data-sort="" id="clear-filters">
				<i class="icon-cancel"></i>Limpiar filtros
			</a> <!-- end #clear-filters -->

		</div> <!-- end .filter-options -->

	</div> <!-- end .filter -->



	<div class="sort">
		<label>Ordenar por</label>
		<ul class="sort-links">
			<li>
				<a href="#" data-sort="talk_rating" class="sort-by DESC secondary label selected">Título</a>
			</li>
			<li>
				<a href="#" data-sort="talk_date2" class="sort-by DESC secondary label">Fecha</a>
			</li>
			<li>
				<a href="#" data-sort="_meta_tedx_ytvideo_viewCount" class="sort-by DESC secondary label">Vistas</a>
			</li>
		</ul>
	</div> <!-- end .sort -->

</div> <!-- end .filter-sort -->

<div class="filter-result-message">
</div> <!-- end .filter-result-message -->