<?php
    class afor_get_post {
        
        private $myposts;
        private $postClass;
        private $WYID;
        private $myargs;
        private $count = 0;

        public function __construct ($className, $posts_per_page = 1, $offset = 0, $date = 'date'){
            $this->className = $className;
            $this->posts_per_page = $posts_per_page;
            $this->offset = $offset;
            $this->date = $date;
        }
    
        private function get_arg(){
           return $this->myargs = array(
                    'posts_per_page'   => $this->posts_per_page,
                    'offset'           => $this->offset,
                    'cat'         	=> '',
                    'category_name'    => '',
                    'orderby'          => $this->date,
                    'order'            => 'DESC',
                    'include'          => '',
                    'exclude'          => '',
                    'meta_key'         => '',
                    'meta_value'       => '',
                    'post_type'        => 'post',
                    'post_mime_type'   => '',
                    'post_parent'      => '',
                    'author'	   => '',
                    'author_name'	   => '',
                    'post_status'      => 'publish',
                    'suppress_filters' => true,
                    'fields'           => ''
                );
        }
        private function get_mypost(){
            return $this->myposts = get_posts( $this->get_arg() );
        }
        private function get_myID(){
           return $this->MYID = get_the_ID();
        }
        private function get_postsClass(){
           return $this->postClass = post_class();
        }

        public function articles (){
            ?>
            <div class="<?= $this->className ?>">
            <?php
            foreach ( $this->get_mypost() as $post ) : setup_postdata( $post ); 
            ?>
                <article id="post-<?= $this->get_myID() ?>"<?= $this->get_postsClass() ?>>
                <header class="entry-header">
                    <h2 class="entry-title"><a href="<?= $post->guid ?>"><?= $post->post_title ?></h2>
            <?php
                if ( 'post' === get_post_type()) { 
                    echo "<div class='entry-meta'>";
                    aformac_s_posted_on();
                    echo "</div><!-- .entry-meta -->\n";
                }
                echo "</header>";
                aformac_s_post_thumbnail(); ?>

                <div class='entry-content'>
            <?php
                the_content( sprintf(
                    wp_kses(
                        /* translators: %s: Name of current post. Only visible to screen readers */
                        __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'aformac_s' ),
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    ),
                    get_the_title()
                ) );
        
                wp_link_pages( array(
                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'aformac_s' ),
                    'after'  => '</div>',
                ) ); ?>

                </div>
                </article>
            <?php
                $this->get_myID();
                endforeach;
                echo "</div>";
                wp_reset_postdata();
            }
}
?>