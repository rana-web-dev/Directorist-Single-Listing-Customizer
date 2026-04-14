<?php
$css_url = plugins_url( 'assets/style.css', dirname(__FILE__) );
echo '<link rel="stylesheet" href="' . $css_url . '?ver=1.0.0">';

echo '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">';
echo '<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>';

get_header();

$listing_id = get_the_ID();
$preview_img_id = get_post_meta( $listing_id, '_listing_prv_img', true );
$background_image = '';

if ( ! empty( $preview_img_id ) ) {
    $image_url = wp_get_attachment_image_url( $preview_img_id, 'full' );
    if ( $image_url ) {
        $background_image = $image_url;
    }
}

if ( empty( $background_image ) ) {
    $background_image = plugin_dir_url( __FILE__ ) . 'assets/default-bg.jpg';
}

// Location
$address = get_post_meta( $listing_id, '_address', true );
$latitude = get_post_meta( $listing_id, '_manual_lat', true );
$longitude = get_post_meta( $listing_id, '_manual_lng', true );

$location_text = '';
if ( ! empty( $address ) ) {
    $location_text = $address;
} elseif ( ! empty( $latitude ) && ! empty( $longitude ) ) {
    $location_text = $latitude . ', ' . $longitude;
}

// Phone
$phone = get_post_meta( $listing_id, '_phone', true );
$phone2 = get_post_meta( $listing_id, '_phone2', true );

// Email
$email = get_post_meta( $listing_id, '_email', true );

// Website URL
$website = get_post_meta( $listing_id, '_website', true );

// Description
$description = get_the_content();
$description = apply_filters( 'the_content', $description );


?>
<div class="dslc-custom-listing" >
    <!-- Banner Start -->
    <div class="banner-container" style="background-image: url('<?php echo esc_url( $background_image ); ?>'); background-size: cover; background-position: center; min-height: 400px;">
        <div class="dslc-container banner">
            <h1 class="dslc-title"><?php echo get_the_title(); ?></h1>
            <div class="lpew-info">
                <?php if ( ! empty( $location_text ) ) : ?>
                <p class="dslc-hero-location">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 640 640" fill="#4DB7FE"><path d="M128 252.6C128 148.4 214 64 320 64C426 64 512 148.4 512 252.6C512 371.9 391.8 514.9 341.6 569.4C329.8 582.2 310.1 582.2 298.3 569.4C248.1 514.9 127.9 371.9 127.9 252.6zM320 320C355.3 320 384 291.3 384 256C384 220.7 355.3 192 320 192C284.7 192 256 220.7 256 256C256 291.3 284.7 320 320 320z"/>
                        </svg>
                    </span> 
                    <?php echo esc_html( $location_text ); ?>
                </p>
                <?php endif; ?>
                <p class="dslc-hero-phone"><span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" width="18" height="18" fill="#4DB7FE"><path d="M415.8 89C423.6 70.2 444.2 60.1 463.9 65.5L469.4 67C534 84.6 589.2 147.2 573.1 223.4C536 398.4 398.3 536.1 223.3 573.2C147 589.4 84.5 534.1 66.9 469.5L65.4 464C60 444.3 70.1 423.7 88.9 415.9L186.2 375.4C202.7 368.5 221.8 373.3 233.2 387.2L271.8 434.4C342.1 399.5 398.6 341.1 431.1 269.5L387 233.4C373.1 222.1 368.4 203 375.2 186.4L415.8 89z"/></svg>
                </span> <?php echo esc_html( $phone ); ?></p>
                <p class="dslc-hero-email"><span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" width="18" height="18" fill="#4DB7FE"><path d="M125.4 128C91.5 128 64 155.5 64 189.4C64 190.3 64 191.1 64.1 192L64 192L64 448C64 483.3 92.7 512 128 512L512 512C547.3 512 576 483.3 576 448L576 192L575.9 192C575.9 191.1 576 190.3 576 189.4C576 155.5 548.5 128 514.6 128L125.4 128zM528 256.3L528 448C528 456.8 520.8 464 512 464L128 464C119.2 464 112 456.8 112 448L112 256.3L266.8 373.7C298.2 397.6 341.7 397.6 373.2 373.7L528 256.3zM112 189.4C112 182 118 176 125.4 176L514.6 176C522 176 528 182 528 189.4C528 193.6 526 197.6 522.7 200.1L344.2 335.5C329.9 346.3 310.1 346.3 295.8 335.5L117.3 200.1C114 197.6 112 193.6 112 189.4z"/></svg>
                </span> <?php echo esc_html( $email ); ?></p>
                <p class="dslc-hero-website"><span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" width="18" height="18" fill="#4DB7FE"><path d="M415.9 344L225 344C227.9 408.5 242.2 467.9 262.5 511.4C273.9 535.9 286.2 553.2 297.6 563.8C308.8 574.3 316.5 576 320.5 576C324.5 576 332.2 574.3 343.4 563.8C354.8 553.2 367.1 535.8 378.5 511.4C398.8 467.9 413.1 408.5 416 344zM224.9 296L415.8 296C413 231.5 398.7 172.1 378.4 128.6C367 104.2 354.7 86.8 343.3 76.2C332.1 65.7 324.4 64 320.4 64C316.4 64 308.7 65.7 297.5 76.2C286.1 86.8 273.8 104.2 262.4 128.6C242.1 172.1 227.8 231.5 224.9 296zM176.9 296C180.4 210.4 202.5 130.9 234.8 78.7C142.7 111.3 74.9 195.2 65.5 296L176.9 296zM65.5 344C74.9 444.8 142.7 528.7 234.8 561.3C202.5 509.1 180.4 429.6 176.9 344L65.5 344zM463.9 344C460.4 429.6 438.3 509.1 406 561.3C498.1 528.6 565.9 444.8 575.3 344L463.9 344zM575.3 296C565.9 195.2 498.1 111.3 406 78.7C438.3 130.9 460.4 210.4 463.9 296L575.3 296z"/></svg>
                </span> <?php echo esc_html( $website ); ?></p> 
            </div>
        </div>
    </div>
    <!-- Banner End -->
    <!-- Tab Start -->
    <div class="dslc-tab-container">
        <div class="dslc-container dslc-tab">
            <div class="menus">
                <a href="#top">Top</a>
                <a href="#details">Details</a>
                <a href="#gallery">Gallery</a>
                <a href="#menu">Menu</a>
                <a href="#reviews">Reviews</a>
            </div>
            <div class="share">
                <a href="#">Save</a>
                <a href="#">Share</a>
            </div>                    
        </div>
    </div>
    <!-- Tab End -->
    <!-- Tab Content Start -->
    <div class="tab-container">
        <div class="dslc-container tab-aside-content-container">
            <div class="tab-content" id="top">
                <?php
                    $author_id = get_post_field( 'post_author', get_the_ID() );
                    $image_id = get_user_meta( $author_id, 'pro_pic', true );
                    $image_url = $image_id ? wp_get_attachment_image_url( $image_id, 'thumbnail' ) : '';

                    if ( $image_url ) : ?>
                        <div class="listing-author-avatar">
                            <img src="<?php echo esc_url( $image_url ); ?>" alt="Author Avatar">
                        </div>
                    <?php else : ?>
                        <div class="listing-author-avatar no-image">
                            <img src="https://img.freepik.com/premium-vector/default-image-icon-vector-missing-picture-page-website-design-mobile-app-no-photo-available_87543-11093.jpg?w=360" alt="No Image" />
                        </div>
                <?php endif; ?>
                <div class="description" id="details">
                    <h2>Description</h2>
                    <div class="des-content">
                        <p><?php echo $description; ?></p>
                        <a href="<?php echo $website; ?>">Visit Website</a>
                    </div>
                </div>
                <div class="photo-gallery" id="gallery">
                    <h2>Gallery / Photos</h2>
                    <div class="photo-gallery-content">
                        <?php
                        $listing_id = get_the_ID();
                        $gallery_images = get_post_meta( $listing_id, '_listing_img', true );

                        if ( ! empty( $gallery_images ) && is_array( $gallery_images ) ) :
                        ?>
                        <div class="swiper dslc-swiper-gallery">
                            <div class="swiper-wrapper">
                                <?php foreach ( $gallery_images as $image_id ) : 
                                    $image_url = wp_get_attachment_image_url( $image_id, 'large' );
                                    if ( $image_url ) :
                                ?>
                                    <div class="swiper-slide">
                                        <img src="<?php echo esc_url( $image_url ); ?>" alt="Gallery Image">
                                    </div>
                                <?php endif; endforeach; ?>
                            </div>
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                            <!-- <div class="swiper-pagination"></div> -->
                        </div>

                        <script>
                        const swiper = new Swiper('.dslc-swiper-gallery', {
                            loop: true,
                            slidesPerView: 3,
                            spaceBetween: 20, 
                            autoplay: {
                                delay: 3000,
                                disableOnInteraction: false,
                            },
                            pagination: {
                                el: '.swiper-pagination',
                                clickable: true,
                            },
                            navigation: {
                                nextEl: '.swiper-button-next',
                                prevEl: '.swiper-button-prev',
                            },
                            effect: 'slide',
                            speed: 800,
                            breakpoints: {
                                0: {
                                    slidesPerView: 1,
                                    spaceBetween: 10
                                },
                                768: {
                                    slidesPerView: 2,
                                    spaceBetween: 15
                                },
                                1024: {
                                    slidesPerView: 3,
                                    spaceBetween: 20
                                }
                            }
                        });
                        </script>

                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="tab-aside-content">
                <div class="aside-location">
                    <h2>Location / Contacts</h2>
                    <?php if (!empty($latitude) && !empty($longitude)): ?>
                    <div class="listing-map">
                        <div class="map-container">
                            <div class="dslc-custom-listing">
                                <?php echo do_shortcode( '[directorist_listing_map]' ); ?>
                        </div>
                    </div>
                    <?php endif; ?>
                    <div class="aside-loc-info">
                        <p>
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 640 640" fill="#4DB7FE"><path d="M128 252.6C128 148.4 214 64 320 64C426 64 512 148.4 512 252.6C512 371.9 391.8 514.9 341.6 569.4C329.8 582.2 310.1 582.2 298.3 569.4C248.1 514.9 127.9 371.9 127.9 252.6zM320 320C355.3 320 384 291.3 384 256C384 220.7 355.3 192 320 192C284.7 192 256 220.7 256 256C256 291.3 284.7 320 320 320z"/>
                            </svg>
                            Address : <?php echo esc_html( $location_text ); ?>
                        </p>
                        <p>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" width="18" height="18" fill="#4DB7FE"><path d="M415.8 89C423.6 70.2 444.2 60.1 463.9 65.5L469.4 67C534 84.6 589.2 147.2 573.1 223.4C536 398.4 398.3 536.1 223.3 573.2C147 589.4 84.5 534.1 66.9 469.5L65.4 464C60 444.3 70.1 423.7 88.9 415.9L186.2 375.4C202.7 368.5 221.8 373.3 233.2 387.2L271.8 434.4C342.1 399.5 398.6 341.1 431.1 269.5L387 233.4C373.1 222.1 368.4 203 375.2 186.4L415.8 89z"/></svg>
                            Phone : <?php echo esc_html( $phone ); ?>
                        </p>
                        <p>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" width="18" height="18" fill="#4DB7FE"><path d="M125.4 128C91.5 128 64 155.5 64 189.4C64 190.3 64 191.1 64.1 192L64 192L64 448C64 483.3 92.7 512 128 512L512 512C547.3 512 576 483.3 576 448L576 192L575.9 192C575.9 191.1 576 190.3 576 189.4C576 155.5 548.5 128 514.6 128L125.4 128zM528 256.3L528 448C528 456.8 520.8 464 512 464L128 464C119.2 464 112 456.8 112 448L112 256.3L266.8 373.7C298.2 397.6 341.7 397.6 373.2 373.7L528 256.3zM112 189.4C112 182 118 176 125.4 176L514.6 176C522 176 528 182 528 189.4C528 193.6 526 197.6 522.7 200.1L344.2 335.5C329.9 346.3 310.1 346.3 295.8 335.5L117.3 200.1C114 197.6 112 193.6 112 189.4z"/></svg>
                            Mail : <?php echo esc_html( $email ); ?>
                        </p>
                        <p>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" width="18" height="18" fill="#4DB7FE"><path d="M415.9 344L225 344C227.9 408.5 242.2 467.9 262.5 511.4C273.9 535.9 286.2 553.2 297.6 563.8C308.8 574.3 316.5 576 320.5 576C324.5 576 332.2 574.3 343.4 563.8C354.8 553.2 367.1 535.8 378.5 511.4C398.8 467.9 413.1 408.5 416 344zM224.9 296L415.8 296C413 231.5 398.7 172.1 378.4 128.6C367 104.2 354.7 86.8 343.3 76.2C332.1 65.7 324.4 64 320.4 64C316.4 64 308.7 65.7 297.5 76.2C286.1 86.8 273.8 104.2 262.4 128.6C242.1 172.1 227.8 231.5 224.9 296zM176.9 296C180.4 210.4 202.5 130.9 234.8 78.7C142.7 111.3 74.9 195.2 65.5 296L176.9 296zM65.5 344C74.9 444.8 142.7 528.7 234.8 561.3C202.5 509.1 180.4 429.6 176.9 344L65.5 344zM463.9 344C460.4 429.6 438.3 509.1 406 561.3C498.1 528.6 565.9 444.8 575.3 344L463.9 344zM575.3 296C565.9 195.2 498.1 111.3 406 78.7C438.3 130.9 460.4 210.4 463.9 296L575.3 296z"/></svg>
                            Website : <?php echo esc_html( $website ); ?></p>
                        </p>
                    </div>
                </div>
            </div>
            <div class="dslc-tags">
                <?php
                    $listing_id = get_the_ID();
                        $tag_taxonomy = 'at_biz_dir-tags';

                        if ( function_exists( 'directorist_get_listing_tag_taxonomy' ) ) {
                            $tag_taxonomy = directorist_get_listing_tag_taxonomy();
                        } elseif ( function_exists( 'get_directorist_tag_taxonomy' ) ) {
                            $tag_taxonomy = get_directorist_tag_taxonomy();
                        }

                        $tags = get_the_terms( $listing_id, $tag_taxonomy );

                        if ( $tags && ! is_wp_error( $tags ) ) : 
                        ?>
                        <div class="dslc-tags-section">
                            <div class="dslc-tags-label">
                                <h2>Listing Tags</h2>
                            </div>
                            <div class="dslc-tags-list">
                                <?php foreach ( $tags as $tag ) : ?>
                                    <a href="<?php echo esc_url( get_term_link( $tag ) ); ?>" class="dslc-tag">
                                        <?php echo esc_html( $tag->name ); ?>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>
            </div>
        </div>
    </div> 
    <!-- Tab Content End -->
</div>
<?php get_footer(); ?>