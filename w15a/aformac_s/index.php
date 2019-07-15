<?php
/**
 * Template Name: accueil2
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package aformac_s
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		require "app/Posts.php";
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
				?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
				<?php
			endif;

			/* Start the Loop */
			$count = 0;
			$max = 2;
			?> 
			<?php
			while ( have_posts() ) :
				the_post();
				$articles = new afor_get_post("article$count", 1, $count);
				$articles->articles();
				if ($count === $max){
					break;
				}
				$count++;
			endwhile; 


			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

<!-- --------------------------CITATIONS----------------------------->
<section id="paralaxQuotes">
                <div class="container-fluid-w-100">
                    <div class="streak streak-md streak-photo">
                        <!--quote carousel-->
                        <div id="carouselExampleControls" class="carousel slide carousel-fade "
                            data-ride="carousel">
                            <div id="carousel_footer" class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="row">
                                        <div class="col-12">
                                            <div>
                                                <blockquote class="blockquote text-center">
                                                    <p class="mb-0">
                                                        <i class="fas fa-quote-right"></i>
                                                        Tu veux un pain ?</p>
                                                    <footer class="blockquote-footer">Jésus Christ
                                                        <cite title="Source Title">35AC</cite></footer>
                                                </blockquote>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="row">
                                        <div class="col-12">
                                            <div>
                                                <blockquote class="blockquote text-center">
                                                    <p class="mb-0">
                                                        <i class="fas fa-quote-right"></i>
                                                        Ayez le courage de suivre votre coeur et votre intuition. L'un
                                                        et l'autre savent ce que vous voulez réellement devenir. Le
                                                        reste est secondaire. </p>
                                                    <footer class="blockquote-footer">Steve Jobs<cite
                                                            title="Source Title"></cite></footer>
                                                </blockquote>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="row">
                                        <div class="col-12">
                                            <div>
                                                <blockquote class="blockquote text-center">
                                                    <p class="mb-0">
                                                        <i class="fas fa-quote-right"></i>
                                                        Grâce à WordPress, votre sourire sera plus blanc, votre
                                                        chevelure plus soyeuse, et… » Comment ils savent pour la
                                                        chevelure ??.</p>
                                                    <footer class="blockquote-footer">ultra Dev ANTHONY
                                                        <cite title="Source Title">promo 2019</cite></footer>
                                                </blockquote>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
			</section>
			
<!-- --------------------------FIN CITATIONS----------------------------->

<!-- --------------------------INFOS----------------------------->
<div class="infos">
	<p></p>
	<button type="button" class="plusbuttons" id="plusBtn" href="#">En savoir plus</button>
</div>
<!-- -------------------------FIN INFOS----------------------------->


	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
