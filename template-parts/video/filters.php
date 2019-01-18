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
			    $terms = get_terms( 'mro_video_collection' );

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


			<form role="search" id="puravida-search"  method="get" action="<?php echo home_url('/'); ?>">
				<input type="search" value="" name="s" id="s" placeholder="Buscar">
				<input type="hidden" name="post_type" value="tedxvideo" />
				<input type="submit" id="searchsubmit" value="<?php esc_attr_e('Search', 'reverie'); ?>">
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