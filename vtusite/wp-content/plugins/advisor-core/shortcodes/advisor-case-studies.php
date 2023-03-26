<?php
if ( ! function_exists( 'advisor_company_case_studies' ) ) {

	function advisor_company_case_studies( $atts ){

			extract( shortcode_atts( array(

				'class_name'  => '',
				'order'    		=> 'DESC'

			), $atts ) );

			$args = array(

					'post_type' 		=> 'case',
					'orderby'  		 	=> 'date',
					'order'     		=> $order,
					'posts_per_page' 	=> -1

			);

    	$case_studies = new WP_Query( $args );
			$case_category = get_terms ('case-study-type');
			ob_start();
			?>
			<!-- CASES CONTENT -->
        <section class="<?php esc_attr_e( $class_name ); ?>">
				<div class="container">

					<!-- CASES NAV -->
					<ul class="cases-filter-nav animate fadeInUp">

						<li><a href="#" class="selected" data-filter="*">All</a></li>
						<?php if ( ! empty( $case_category ) && ! is_wp_error( $case_category ) ){ ?>

							<?php foreach ( $case_category as $category ) { ?>

											<?php $category_name = $category->name; ?>
											<li><a href="#" data-filter=".<?php echo $category->slug; ?>"><?php esc_html_e( $category_name , 'advisor-core' ); ?></a></li>

							<?php } ?>
						<?php } ?>
					</ul>


					<ul id="cases-container" class="cases-container">
					<?php

						$i = 0;
						$case_type_slug = '';
						$case_type_name = '';
						while ( $case_studies->have_posts() ) : $case_studies->the_post();

							$case_types   = get_the_terms( get_the_ID() , 'case-study-type' );
							if ( $case_types && !is_wp_error( $case_types ) ) :

						    foreach ( $case_types as $type ) {

						        $case_type_slug = $type->slug;
										$case_type_name = $type->name;
						    }
							endif;

							$case_title  = get_the_title( get_the_ID() );
							$case_image  = get_the_post_thumbnail( get_the_ID() , array(570 , 630) , '');


					?>
					<li class="<?php if( $i == 0 || $i == 1 ) { echo 'entry'; } ?> <?php echo $case_type_slug; ?>">

							<div class="cases-item animate fadeInUp">
								<a href="<?php echo get_the_permalink( get_the_ID()  ); ?>">
									<figure>

										<?php if( !empty( $case_image  ) ){

												echo $case_image;

										 }

										?>
										<figcaption>
											<div>
												<small><?php esc_html_e( $case_type_name , 'advisor-core'); ?></small>
												<?php esc_html_e( $case_title , 'advisor-core'); ?>
											</div>
										</figcaption>
									</figure>
								</a>
							</div>

						</li>
						<?php $i++; ?>
					<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>

					</ul>



				</div>

			</section>

      <?php
			return ob_get_clean();
	}
}

add_shortcode('advisor_case_studies', 'advisor_company_case_studies');

// Visual Composer Map
function advisor_vc_map_advisor_case_studies()
{
vc_map( array(
		'name'     									=> esc_html__( 'Advisor Case Studies', 'advisor-core' ),
		'base'     									=> 'advisor_case_studies',
		'icon'                    	=> get_template_directory_uri().'/images/advisor-icon-vc.png',
		'category' 									=> esc_html__( 'Advisor Theme', 'advisor-core' ),
		'show_settings_on_create' 	=> true,
		'content_element' 					=> true,
		'admin_label' 							=> true,
    'is_container' 							=> false,
		'params' => array(

				array(
            "type" 					=> "dropdown",
            "heading" 			=> esc_html__("Order", 'advisor-core'),
            "param_name" 		=> "order",
            "description" 	=> esc_html__("Sort your case studies", 'advisor-core'),
						"value" => array(

								esc_html__("Descending", 'advisor-core') => 'DESC',
								esc_html__("Ascending", 'advisor-core') => 'ASC',

							),
        ),
				array(
						"type" 					=> "textfield",
						"heading" 			=> __("Extra Class Name", 'advisor-core'),
						"param_name"		=> "class_name",
						"description"		=> __("Enter a class name for the shortcode here.", 'advisor-core')
				),


			)

		  )
    );
}

add_action( 'vc_before_init', 'advisor_vc_map_advisor_case_studies' );
?>
