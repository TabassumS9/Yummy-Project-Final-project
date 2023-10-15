<?php
include "./Fontend_inc/header.php";
include "./database/env.php";
// Banner Query
$banner_query = "SELECT * FROM banners WHERE  status = 1 limit 1";
$res = mysqli_query($conn,$banner_query);
$banners = mysqli_fetch_assoc($res);
// About Query
$about_query = "SELECT * FROM abouts WHERE  status = 1 limit 1";
$res = mysqli_query($conn,$about_query);
$abouts = mysqli_fetch_assoc($res);

// Slider Query
$slider_query = "SELECT * FROM sliders WHERE status = 1 limit 3";
$res = mysqli_query($conn,$slider_query);
$sliders = mysqli_fetch_all($res,1);

$redSlider = "SELECT * FROM sliders WHERE status = 1 limit 1";
$res = mysqli_query($conn,$redSlider);
$redSliders = mysqli_fetch_assoc($res);

// Counter Query
$counter_query = "SELECT * FROM counters WHERE status = 1 limit 4";
$res = mysqli_query($conn,$counter_query);
$counters = mysqli_fetch_all($res,1);

// menu Query
$category_query = "SELECT * FROM categories";
$res = mysqli_query($conn,$category_query);
$categories = mysqli_fetch_all($res,1);


$foods_query = "SELECT * FROM menufoods";
$res = mysqli_query($conn,$foods_query);
$menufoods = mysqli_fetch_all($res,1);

// Testimonial
$testimonial_query = "SELECT * FROM testimonials WHERE status = 1  limit 4";
$res = mysqli_query($conn, $testimonial_query);
$testimonials = mysqli_fetch_all($res,1);
// Event Query

$event_query = "SELECT * FROM events WHERE status = 1  limit 3";
$res = mysqli_query($conn, $event_query);
$events = mysqli_fetch_all($res,1);
// Chefs Query

$chefs_query = "SELECT * FROM chefs WHERE status = 1  limit 3";
$res = mysqli_query($conn, $chefs_query);
$chefs = mysqli_fetch_all($res,1);
// Book Table query
$booktables_query = "SELECT * FROM booktables WHERE  status = 1 limit 1";
$res = mysqli_query($conn,$booktables_query);
$booktables = mysqli_fetch_assoc($res);

// Gallery Query
$gallery_query = "SELECT * FROM gallery_img WHERE  status = 1 ";
$res = mysqli_query($conn,$gallery_query);
$gallery_img = mysqli_fetch_all($res,1);
// Contact Query
$contact_query = "SELECT * FROM contact WHERE  status = 1 limit 1";
$res = mysqli_query($conn,$contact_query);
$contact = mysqli_fetch_assoc($res);
?>

<?php
if(count($banners)>0)
?>
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center section-bg">
    <div class="container">
      <div class="row justify-content-between gy-5">
        <div class="col-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center align-items-center align-items-lg-start text-center text-lg-start">
          <h2 data-aos="fade-up"><?= $banners['titel'] ?></h2>
          <p data-aos="fade-up" data-aos-delay="100"><?= $banners['detail'] ?></p>
          <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
            <a href="<?= $banners['cta_link'] ?>" class="btn-book-a-table"><?= $banners['cta_link'] ?></a>
            <a href="<?= $banners['video_link'] ?>" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span><?= $banners['video_link'] ?></span></a>
          </div>
        </div>
        <div class="col-lg-5 order-1 order-lg-2 text-center text-lg-start">
          <img src="./uploads/banners/<?= $banners['banner_img'] ?>" class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="300">
        </div>
      </div>
    </div>
  </section><!-- End Hero Section -->
<?php
?>
  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2><?=$abouts['heading']?></h2>
          <p><?=$abouts['titel']?></p>
        </div>

        <div class="row gy-4">
          <div class="col-lg-7 position-relative about-img" style="background-image: url(uploads/abouts/<?=$abouts['about_img']?>) ; 
          object-fit:cover;" data-aos="fade-up" data-aos-delay="150">
            <div class="call-us position-absolute">
              <h4><?=$abouts['img_book_table']?></h4>
              <p><?=$abouts['img_book_sub_table']?></p>
            </div>
          </div>
          <div class="col-lg-5 d-flex align-items-end" data-aos="fade-up" data-aos-delay="300">
            <div  class="content ps-0 ps-lg-5">
              <p> <?=$abouts['detail']?></p>
              <div class="position-relative mt-4">
                <img src="./uploads/abouts/<?=$abouts['about_img_sub']?>" class="img-fluid" alt="">
                <a href="<?=$abouts['cta_video']?>" class="glightbox play-btn"></a>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->


    <!-- ======= Slider Section ======= -->
 <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us section-bg">
      <div class="container" data-aos="fade-up">

        <div class="row gy-4">

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
            <div class="why-box">
              <h3><?=$redSliders['titel_1']?></h3>
              <p> <?=$redSliders['detail_1']?>  </p>
              <div class="text-center">
                <a href="#" class="more-btn"><?=$redSliders['sliderBtn']?> <i class="bx bx-chevron-right"></i></a>
              </div>
            </div>
          </div><!-- End Why Box -->

          <div class="col-lg-8  align-items-center">
            <div class="row gy-4">
              <?php
              foreach($sliders as $slider){?>
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                <div class="icon-box  align-items-center">
                  <img src="./uploads/sliders/<?=$slider['icon_2']?>" alt="" style="object-fit:cover;border-radius: 50%; " width="80px"  height="80px">
                  <h4 style="padding-top:20px;"><?=$slider['titel_2']?></h4>
                  <p><?=$slider['detail_2']?></p>
                </div>
              </div><!-- End Icon Box --><?php
              }?>

              
            


            </div>
          </div>

        </div>

      </div>
    </section><!-- End Why Us Section -->
    </section><!-- End Slider Section -->



    <!-- ======= Stats Counter Section ======= -->
    <section id="stats-counter" class="stats-counter">
      <div class="container" data-aos="zoom-out">

        <div class="row gy-4">
          <?php
          foreach($counters as $counter){?>
            <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span><?=$counter['number_1']?></span>
              <p><?=$counter['titel_1']?></p>
            </div>
          </div><!-- End Stats Item --><?php
          }?>

         

          

        </div>

      </div>
    </section><!-- End Stats Counter Section -->




   <!-- ======= Menu Section ======= -->
     <section id="menu" class="menu">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Our Menu</h2>
          <p>Check Our <span>Yummy Menu</span></p>
        </div>

        <ul class="nav nav-tabs d-flex justify-content-center" data-aos="fade-up" data-aos-delay="200">
          <?php
          foreach($categories as $key=> $category){?>
            <li class="nav-item">
            <a class="nav-link <?= $key == 0 ? "active show" : ""?>" data-bs-toggle="tab" data-bs-target="#menu-<?=str_replace(" ","-", $category['titel'])?>">
            <h4><?=ucfirst($category['titel'])?></h4>
            </a>
          </li><!-- End tab nav item --><?php
          }?>
          


        </ul>

       <div class="tab-content" data-aos="fade-up" data-aos-delay="300">
          <?php
          foreach($categories as $key=> $category){?>
          <div class="tab-pane <?=$key == 0 ? "active show" : ""?>" id="menu-<?=str_replace(" ","-", $category['titel'])?>">

            <div class="tab-header text-center">
              <p>Menu</p>
              <h3><?=$category['titel']?></h3>
            </div>

            <div class="row gy-5">
              <?php
              foreach($menufoods as $food){
                if($food['category_id'] == $category['id']){
                ?>
              
              <div class="col-lg-4 menu-item">
                <a href="" class="glightbox"><img src="./uploads/foods/<?=$food['food_image']?>" class="menu-img img-fluid" alt=""></a>
                <h4><?=$food['titel']?></h4>
                <p class="ingredients">
                <?=$food['detail']?>
                </p>
                <p class="price">$
                <?=$food['price']?>
                </p>
              </div><!-- Menu Item --><?php }
              }?>


            </div>
          </div><!-- End Starter Menu Content --><?php
          }?>


        </div>

      </div>


    </section><!-- End Menu Section -->





    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials section-bg">
      <div class="container" data-aos="fade-up">


        

        <div class="slides-1 swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">
            <?php
            foreach($testimonials as $testimonial){?>
              <div class="swiper-slide">
              <div class="section-header">
                <h2><?=$testimonial['heading']?></h2>
                <p><?=$testimonial['titel']?></p>
              </div>
            <div class="testimonial-item">
              <div class="row gy-4 justify-content-center">
                <div class="col-lg-6">
                  <div class="testimonial-content">
                    <h4><i class="bi bi-quote quote-icon-left"></i><?=$testimonial['detail']?><i class="bi bi-quote quote-icon-right"></i></h4>
                    <h3><?=$testimonial['client_name']?></h3>
                    <h4><?=$testimonial['client_position']?></h4>
                    <div class="stars">
                      <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                    </div>
                  </div>

                </div>
                <div class="col-lg-2 text-center">
                  <img src="./uploads/testimonials/<?=$testimonial['testimonial_img']?>" class="img-fluid testimonial-img" alt="">
                </div>
              </div>
            </div>
          
          </div><!-- End testimonial item -->
            
              <?php


            }
            
            ?>


          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Testimonials Section -->







    <!-- ======= Events Section ======= -->
    <section id="events" class="events">
      <div class="container-fluid" data-aos="fade-up">

        <div class="section-header">
          <h2>Events</h2>
          <p>Share <span>Your Moments</span> In Our Restaurant</p>
        </div>

        <div class="slides-3 swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">
           <?php
           foreach($events as $event){?>
            <div class="swiper-slide event-item d-flex flex-column justify-content-end" style="background-image: url(./uploads/events/<?=$event['event_img']?>)">
              <h3><?=$event['titel']?> </h3>
              <div class="price align-self-start">$<?=$event['price']?></div>
              <p class="description">
              <?=$event['detail']?>
              </p>
            </div><!-- End Event item --><?php
           }?>
            


          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Events Section -->



    
    <!-- ======= Chefs Section ======= -->
    <section id="chefs" class="chefs section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Chefs</h2>
          <p>Our <span>Proffesional</span> Chefs</p>
        </div>

        <div class="row gy-4">
          <?php
          foreach($chefs as $chef){?>
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="chef-member">
              <div class="member-img">
                <img src="./uploads/chefs/<?=$chef['chefs_img']?>" class="img-fluid" alt="">
                <div class="social">
                  <a href="<?=$chef['twitter_link']?>"><i class="bi bi-twitter"></i></a>
                  <a href="<?=$chef['facebook_link']?>"><i class="bi bi-facebook"></i></a>
                  <a href="<?=$chef['instragram_link']?>"><i class="bi bi-instagram"></i></a>
                  <a href="<?=$chef['linkedin_link']?>"><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4><?=$chef['chefs_name']?></h4>
                <span><?=$chef['heading']?></span>
                <p><?=$chef['detail']?></p>
              </div>
            </div>
          </div><!-- End Chefs Member --><?php
          }?>


          

        </div>

      </div>
    </section><!-- End Chefs Section -->


    <!-- ======= Book A Table Section ======= -->
    <section id="book-a-table" class="book-a-table">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Book A Table</h2>
          <p>Book <span>Your Stay</span> With Us</p>
        </div>

        <div class="row g-0">

          <div class="col-lg-4 reservation-img" style="background-image: url(./assets/img/reservation.jpg)" > </div>

          <div class="col-lg-8 d-flex align-items-center reservation-form-bg">
            <form action="./controller/storeBooktable.php" method="post" >
              <div class="row gy-4">
                <div class="col-lg-4 col-md-6">
                  <input type="text" name="name"  class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                  <div class="validate"></div>
                </div>
                <div class="col-lg-4 col-md-6">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email">
                  <div class="validate"></div>
                </div>
                <div class="col-lg-4 col-md-6">
                  <input type="text" class="form-control" name="phone" id="phone" placeholder="Your Phone" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                  <div class="validate"></div>
                </div>
                <div class="col-lg-4 col-md-6">
                  <input type="text" name="date" class="form-control" id="date" placeholder="Date" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                  <div class="validate"></div>
                </div>
                <div class="col-lg-4 col-md-6">
                  <input type="text" class="form-control" name="time" id="time" placeholder="Time" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                  <div class="validate"></div>
                </div>
                <div class="col-lg-4 col-md-6">
                  <input type="number" class="form-control" name="people"  placeholder="# of people">
                  <div class="validate"></div>
                </div>
                
                
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="detail" rows="5" placeholder="Message"></textarea>
                <div class="validate"></div>
              </div>
              
              <div class="text-center"><button class="btn btn-danger"  type="submit">Book a Table</button></div>
            </form>
          </div><!-- End Reservation Form -->

        </div>

      </div>
    </section><!-- End Book A Table Section -->


    
    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>gallery</h2>
          <p>Check <span>Our Gallery</span></p>
        </div>

        <div class="gallery-slider swiper">
          <div class="swiper-wrapper align-items-center">
            <?php
            foreach($gallery_img as $gallery){?>
              <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="./uploads/gallery/<?=$gallery['gallery_img']?>"><img src="./uploads/gallery/<?=$gallery['gallery_img']?>" class="img-fluid" alt=""></a></div>
            <?php
          }?>
           
            
          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Gallery Section -->




    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Contact</h2>
          <p>Need Help? <span>Contact Us</span></p>
        </div>

        <div class="mb-3">
          <iframe style="border:0; width: 100%; height: 350px;" src="<?=$contact['map_link']?>" frameborder="0" allowfullscreen></iframe>
        </div><!-- End Google Maps -->

        <div class="row gy-4">

          <div class="col-md-6">
            <div class="info-item  d-flex align-items-center">
              <i class="icon bi bi-map flex-shrink-0"></i>
              <div>
                <h3>Our Address</h3>
                <p><?=$contact['address']?></p>
              </div>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-6">
            <div class="info-item d-flex align-items-center">
              <i class="icon bi bi-envelope flex-shrink-0"></i>
              <div>
                <h3>Email Us</h3>
                <p><?=$contact['email']?></p>
              </div>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-6">
            <div class="info-item  d-flex align-items-center">
              <i class="icon bi bi-telephone flex-shrink-0"></i>
              <div>
                <h3>Call Us</h3>
                <p><?=$contact['phone_number']?></p>
              </div>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-6">
            <div class="info-item  d-flex align-items-center">
              <i class="icon bi bi-share flex-shrink-0"></i>
              <div>
                <h3>Opening Hours</h3>
                <div><?=$contact['opening_hours']?>
                </div>
              </div>
            </div>
          </div><!-- End Info Item -->

        </div>
        <form action="./controller/storeUserContactinfo.php" method="post" >
              <div class="row">
                <div class="col-lg-6 my-5">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                  <div class="validate"></div>
                </div>
                <div class="col-lg-6 my-5">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                  <div class="validate"> </div>
                </div>
                <div class="col-lg-12 ">
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                  <div class="validate"></div>
                </div>
                <div class="col-lg-12 my-5">
                  <textarea class="form-control" name="detail" rows="5" placeholder="Message" required></textarea>
                  <div class="validate"></div>
                </div>
 
                
              </div>
              
              
              <div class="text-center"><button class="btn btn-danger"  type="submit">send message</button></div>
            </form>
      <!--End Contact Form -->

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->


<?php
include "./Fontend_inc/footer.php";
?>
