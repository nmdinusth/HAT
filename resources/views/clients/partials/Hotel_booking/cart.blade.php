@include('clients.blocks.header_hotel')

    <!-- ================================
    START BREADCRUMB AREA
================================= -->
    <section class="breadcrumb-area bread-bg-10">
      <div class="breadcrumb-wrap">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="breadcrumb-content text-center">
                <div class="section-heading">
                  <h2 class="sec__title text-white">Cart</h2>
                </div>
                <span class="arrow-blink">
                  <i class="la la-arrow-down"></i>
                </span>
              </div>
              <!-- end breadcrumb-content -->
            </div>
            <!-- end col-lg-12 -->
          </div>
          <!-- end row -->
        </div>
        <!-- end container -->
      </div>
      <!-- end breadcrumb-wrap -->
      <div class="bread-svg-box">
        <svg
          class="bread-svg"
          xmlns="http://www.w3.org/2000/svg"
          viewBox="0 0 100 10"
          preserveAspectRatio="none"
        >
          <polygon points="100 0 50 10 0 0 0 10 100 10"></polygon>
        </svg>
      </div>
      <!-- end bread-svg -->
    </section>
    <!-- end breadcrumb-area -->
    <!-- ================================
    END BREADCRUMB AREA
================================= -->

    <!-- ================================
    START CART AREA
================================= -->
    <section class="cart-area section-padding">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="cart-wrap">
              <div class="table-form table-responsive mb-3">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">Product</th>
                      <th scope="col">Price</th>
                      <th scope="col">Quantity</th>
                      <th scope="col">Subtotal</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">
                        <div
                          class="table-content product-content d-flex align-items-center"
                        >
                          <a href="room-details.html" class="d-block">
                            <img
                              src="{{ asset('ui/images/small-img12.jpg') }}"
                              alt=""
                              class="flex-shrink-0"
                            />
                          </a>
                          <div class="product-content">
                            <a href="room-details.html" class="title"
                              >Premium Lake View Room</a
                            >
                            <div class="product-info-wrap">
                              <div class="product-info line-height-24">
                                <span class="product-info-label"
                                  >Reservation:</span
                                >
                                <span class="product-info-value">
                                  <span class="product-check-in"
                                    >July 12, 2020</span
                                  >
                                  <span class="product-mark">/</span>
                                  <span class="product-check-out"
                                    >July 13, 2020</span
                                  >
                                  <span class="product-nights">(1 night)</span>
                                </span>
                              </div>
                              <!-- end product-info -->
                              <div class="product-info line-height-24">
                                <span class="product-info-label">Guests:</span>
                                <span class="product-info-value">2 Adults</span>
                              </div>
                              <!-- end product-info -->
                              <div class="product-info line-height-24">
                                <span class="product-info-label"
                                  >Extra Services:</span
                                >
                                <span class="product-info-value"
                                  >cleaning-fee, airport-pickup, breakfast,
                                  parking</span
                                >
                              </div>
                              <!-- end product-info -->
                            </div>
                          </div>
                        </div>
                      </th>
                      <td>$110.00</td>
                      <td>
                        <div class="product-info">
                          <input type="text" class="form-control" value="1" />
                        </div>
                      </td>
                      <td>$110.00</td>
                      <td>
                        <div class="remove-wrap">
                          <a href="javascript:void(0)" class="btn font-size-18"
                            ><i class="la la-times"></i
                          ></a>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="section-block"></div>
              <div
                class="cart-actions d-flex justify-content-between align-items-center pt-4 pb-5"
              >
                <div class="contact-form-action">
                  <form method="post" class="d-flex align-items-center">
                    <div class="form-group mb-0 me-3">
                      <input
                        class="form-control ps-3"
                        type="text"
                        name="text"
                        placeholder="Coupon code"
                      />
                    </div>
                    <button type="button" class="theme-btn">Apply Code</button>
                  </form>
                </div>
                <!-- end contact-form-action -->
                <div class="btn-box">
                  <a href="#" class="theme-btn">Update Cart</a>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-4 ms-auto">
                  <div class="cart-totals table-form">
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">Title</th>
                          <th scope="col">Price</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">
                            <div class="table-content">
                              <h3 class="title">Subtotal</h3>
                            </div>
                          </th>
                          <td>$110.00</td>
                        </tr>
                        <tr>
                          <th scope="row">
                            <div class="table-content">
                              <h3 class="title">Total</h3>
                            </div>
                          </th>
                          <td>$110.00</td>
                        </tr>
                      </tbody>
                    </table>
                    <div class="section-block"></div>
                    <div class="btn-box text-end pt-4">
                      <a href="/confirm-payment" class="theme-btn"
                        >Proceed to Confirm & Payment</a
                      >
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- end cart-wrap -->
          </div>
          <!-- end col-lg-12 -->
        </div>
        <!-- end row -->
      </div>
      <!-- end container -->
    </section>
    <!-- end cart-area -->
    <!-- ================================
    END CART AREA
================================= -->

    <!-- ===============================
       START FOOTER AREA
================================= -->
    <section class="footer-area bg-white padding-top-100px padding-bottom-30px">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 responsive-column">
            <div class="footer-item">
              <div class="footer-logo padding-bottom-30px">
                <a href="index.html" class="foot__logo"
                  ><img src="{{ asset('ui/images/logo.png') }}" alt="logo"
                /></a>
              </div>
              <!-- end logo -->
              <p class="footer__desc">
                Morbi convallis bibendum urna ut viverra. Maecenas consequat
              </p>
              <ul class="list-items pt-3">
                <li>
                  3015 Grand Ave, Coconut Grove,<br />
                  Cerrick Way, FL 12345
                </li>
                <li>+123-456-789</li>
                <li><a href="#">trizen@yourwebsite.com</a></li>
              </ul>
            </div>
            <!-- end footer-item -->
          </div>
          <!-- end col-lg-3 -->
          <div class="col-lg-3 responsive-column">
            <div class="footer-item">
              <h4
                class="title curve-shape pb-3 margin-bottom-20px"
                data-text="curvs"
              >
                Company
              </h4>
              <ul class="list-items list--items">
                <li><a href="about.html">About us</a></li>
                <li><a href="services.html">Services</a></li>
                <li><a href="#">Jobs</a></li>
                <li><a href="blog-grid.html">News</a></li>
                <li><a href="contact.html">Support</a></li>
                <li><a href="#">Advertising</a></li>
              </ul>
            </div>
            <!-- end footer-item -->
          </div>
          <!-- end col-lg-3 -->
          <div class="col-lg-3 responsive-column">
            <div class="footer-item">
              <h4
                class="title curve-shape pb-3 margin-bottom-20px"
                data-text="curvs"
              >
                Other Services
              </h4>
              <ul class="list-items list--items">
                <li><a href="#">Investor Relations</a></li>
                <li><a href="#">Trizen.com Rewards</a></li>
                <li><a href="#">Partners</a></li>
                <li><a href="#">List My Hotel</a></li>
                <li><a href="#">All Hotels</a></li>
                <li><a href="#">TV Ads</a></li>
              </ul>
            </div>
            <!-- end footer-item -->
          </div>
          <!-- end col-lg-3 -->
          <div class="col-lg-3 responsive-column">
            <div class="footer-item">
              <h4
                class="title curve-shape pb-3 margin-bottom-20px"
                data-text="curvs"
              >
                Other Links
              </h4>
              <ul class="list-items list--items">
                <li><a href="#">USA Vacation Packages</a></li>
                <li><a href="#">USA Flights</a></li>
                <li><a href="#">USA Hotels</a></li>
                <li><a href="#">USA Car Hire</a></li>
                <li><a href="#">Create an Account</a></li>
                <li><a href="#">Trizen Reviews</a></li>
              </ul>
            </div>
            <!-- end footer-item -->
          </div>
          <!-- end col-lg-3 -->
        </div>
        <!-- end row -->
        <div class="row align-items-center">
          <div class="col-lg-8">
            <div class="term-box footer-item">
              <ul class="list-items list--items d-flex align-items-center">
                <li><a href="#">Terms & Conditions</a></li>
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">Help Center</a></li>
              </ul>
            </div>
          </div>
          <!-- end col-lg-8 -->
          <div class="col-lg-4">
            <div class="footer-social-box text-end">
              <ul class="social-profile">
                <li>
                  <a href="#"><i class="lab la-facebook-f"></i></a>
                </li>
                <li>
                  <a href="#"><i class="lab la-twitter"></i></a>
                </li>
                <li>
                  <a href="#"><i class="lab la-instagram"></i></a>
                </li>
                <li>
                  <a href="#"><i class="lab la-linkedin-in"></i></a>
                </li>
              </ul>
            </div>
          </div>
          <!-- end col-lg-4 -->
        </div>
        <!-- end row -->
      </div>
      <!-- end container -->
      <div class="section-block mt-4"></div>
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-7">
            <div class="copy-right padding-top-30px">
              <p class="copy__desc">
                &copy; Copyright Trizen <span id="get-year"></span> . Made with
                <span class="la la-heart"></span> by
                <a href="https://themeforest.net/user/techydevs/portfolio"
                  >TechyDevs</a
                >
              </p>
            </div>
            <!-- end copy-right -->
          </div>
          <!-- end col-lg-7 -->
          <div class="col-lg-5">
            <div
              class="copy-right-content d-flex align-items-center justify-content-end padding-top-30px"
            >
              <h3 class="title font-size-15 pe-2">We Accept</h3>
              <img src="{{ asset('ui/images/payment-img.png') }}" alt="" />
            </div>
            <!-- end copy-right-content -->
          </div>
          <!-- end col-lg-5 -->
        </div>
        <!-- end row -->
      </div>
      <!-- end container -->
    </section>

@include('clients.blocks.footer_hotel')