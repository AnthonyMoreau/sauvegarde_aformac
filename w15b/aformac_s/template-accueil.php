<?php
/**
 * template Name: accueil
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package aformac_s
 */

get_header();
require "app/Posts.php";
?>
<!---------------------------- DEBUT RECUP ARTICLE ---------------------------->

<?php
	$total = nb_total_posts();
	$articles = new Nigma_get_post("article");
	$articles->articles();

	$articles = new Nigma_get_post("article1", 1, 1,'date', true);
	$articles->articles();

	$articles = new Nigma_get_post("article2", 1, 2,'date', true);
	$articles->articles();
?>

<!-- --------------------------- FIN RECUPERATION ARTICLE ----------------------------->

<!-- --------------------------- CITATIONS ----------------------------->
<section id="paralaxQuotes">
    <div class="containerQuotes">
        <div class="streak streak-md streak-photo">
            <!--quote carousel-->
            <div id="carouselExampleControls" class="carousel slide  " data-ride="carousel">
                <div id="carousel_footer" class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row">
                            <div class="col-12">
                                <div>
                                    <blockquote class="blockquote text-center">
									<p class="mb-0">
										<i class="fas fa-quote-right"></i>
										<?php $citation = new Nigma_get_citation("mes-citations", 1, 0) ?>
										<?php $citation->citations() ?>
									</p>
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
										<?php $citation = new Nigma_get_citation("mes-citations", 1, 1) ?>
										<?php $citation->citations() ?>
									</p>
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
											<?php $citation = new Nigma_get_citation("mes-citations", 1, 2) ?>
											<?php $citation->citations() ?>
										</p>
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

<!-- --------------------------- FIN CITATIONS ----------------------------->
<!-- --------------------------- INFOS ----------------------------->
<div class="infos">
    <div class="highlights1" id="hg1">
        <p class="right">Une</p> <p class="left">formation</p> <p class="right">qu'elle est</p> <p class="left">bien</p>
    </div>
    <div class="highlights2" id="hg2">
        <p class="right">Une</p> <p class="left">formation</p> <p class="right">qu'elle dure</p> <p class="left">pas trop</p> <p class="right">longtemps</p>
    </div>
    <div class="highlights3" id="hg3">
		<p class="right">Une</p> <p class="left">formation</p> <p class="right">qu'elle te</p> <p class="left">qualifie</p>    </div>
    <button type="button" class="plusbuttons" id="plusBtn" href="#">En savoir plus</button>
</div>

<!-- --------------------------- INFOS ----------------------------->



<?php
get_footer();