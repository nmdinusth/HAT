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
                  <h2 class="sec__title text-white">Room Search Result List</h2>
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
    START CARD AREA
================================= -->
    <section class="card-area section--padding">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="filter-wrap margin-bottom-30px">
              <div
                class="filter-bar d-flex align-items-center justify-content-between"
              >
                <div
                  class="filter-bar-filter d-flex flex-wrap align-items-center"
                >
                  <div class="filter-option me-5">
                    <h3 class="title font-size-16">Result</h3>
                  </div>
                  <div class="filter-option me-5">
                    <h3 class="title font-size-16">
                      <i class="la la-clock-o me-1"></i>Date:
                      <span class="text-color ms-2"
                        >04/28/2020 - 05/3/2020</span
                      >
                    </h3>
                  </div>
                  <div class="filter-option me-5">
                    <h3 class="title font-size-16">
                      <i class="la la-user me-1"></i>Adults:
                      <span class="text-color ms-2">1</span>
                    </h3>
                  </div>
                  <div class="filter-option me-5">
                    <h3 class="title font-size-16">
                      <i class="la la-user me-1"></i>Children:
                      <span class="text-color ms-2">1</span>
                    </h3>
                  </div>
                </div>
                <!-- end filter-bar-filter -->
                <div class="btn-box">
                  <a
                    href="#"
                    class="theme-btn theme-btn-transparent"
                    data-bs-toggle="modal"
                    data-bs-target="#modifyPopupForm"
                    >Modify</a
                  >
                </div>
                <!-- end btn-box -->
              </div>
              <!-- end filter-bar -->
            </div>
            <!-- end filter-wrap -->
          </div>
          <!-- end col-lg-12 -->
        </div>
        <!-- end row -->
        <div class="row">
          <div class="col-lg-12">
            <div class="card-item card-item-list room-card">
              <div class="card-img-carousel carousel-action carousel--action">
                <div class="card-img">
                  <a href="room-details.html" class="d-block">
                    <img src="{{ asset('ui/images/img5.jpg') }}" alt="hotel-img" />
                  </a>
                </div>
                <div class="card-img">
                  <a href="room-details.html" class="d-block">
                    <img src="{{ asset('ui/images/img29.jpg') }}" alt="hotel-img" />
                  </a>
                </div>
                <div class="card-img">
                  <a href="room-details.html" class="d-block">
                    <img src="{{ asset('ui/images/img30.jpg') }}" alt="hotel-img" />
                  </a>
                </div>
              </div>
              <div class="card-body">
                <div class="card-price pb-2">
                  <p>
                    <span class="price__from">From</span>
                    <span class="price__num">$88.00</span>
                  </p>
                </div>
                <h3 class="card-title font-size-26">
                  <a href="room-details.html">Premium Lake View Room</a>
                </h3>
                <p class="card-text pt-2">
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                  Aperiam asperiores commodi deleniti hic inventore laboriosam
                  laborum molestias, non odit quaerat! Aperiam culpa facilis
                  fuga impedit.
                </p>
                <div class="card-attributes pt-3 pb-4">
                  <ul class="d-flex align-items-center">
                    <li class="d-flex align-items-center">
                      <i class="la la-bed"></i><span>2 Beds</span>
                    </li>
                    <li class="d-flex align-items-center">
                      <i class="la la-building"></i
                      ><span>24 ft<sup>2</sup></span>
                    </li>
                    <li class="d-flex align-items-center">
                      <i class="la la-bathtub"></i><span>2 Bathrooms</span>
                    </li>
                  </ul>
                </div>
                <div class="card-btn">
                  <a
                    href="room-details.html"
                    class="theme-btn theme-btn-transparent"
                    >Book Now</a
                  >
                </div>
              </div>
            </div>
            <!-- end card-item -->
          </div>
          <!-- end col-lg-12 -->
          <div class="col-lg-12">
            <div class="card-item card-item-list room-card">
              <div class="card-img-carousel carousel-action carousel--action">
                <div class="card-img">
                  <a href="room-details.html" class="d-block">
                    <img src="{{ asset('ui/images/img31.jpg') }}" alt="hotel-img" />
                  </a>
                </div>
                <div class="card-img">
                  <a href="room-details.html" class="d-block">
                    <img src="{{ asset('ui/images/img32.jpg') }}" alt="hotel-img" />
                  </a>
                </div>
                <div class="card-img">
                  <a href="room-details.html" class="d-block">
                    <img src="{{ asset('ui/images/img33.jpg') }}" alt="hotel-img" />
                  </a>
                </div>
              </div>
              <div class="card-body">
                <div class="card-price pb-2">
                  <p>
                    <span class="price__from">From</span>
                    <span class="price__num">$45.00</span>
                  </p>
                </div>
                <h3 class="card-title font-size-26">
                  <a href="room-details.html">Standard 2 Bed Male Dorm</a>
                </h3>
                <p class="card-text pt-2">
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                  Aperiam asperiores commodi deleniti hic inventore laboriosam
                  laborum molestias, non odit quaerat! Aperiam culpa facilis
                  fuga impedit.
                </p>
                <div class="card-attributes pt-3 pb-4">
                  <ul class="d-flex align-items-center">
                    <li class="d-flex align-items-center">
                      <i class="la la-bed"></i><span>2 Beds</span>
                    </li>
                    <li class="d-flex align-items-center">
                      <i class="la la-building"></i
                      ><span>24 ft<sup>2</sup></span>
                    </li>
                    <li class="d-flex align-items-center">
                      <i class="la la-bathtub"></i><span>2 Bathrooms</span>
                    </li>
                  </ul>
                </div>
                <div class="card-btn">
                  <a
                    href="room-details.html"
                    class="theme-btn theme-btn-transparent"
                    >Book Now</a
                  >
                </div>
              </div>
            </div>
            <!-- end card-item -->
          </div>
          <!-- end col-lg-12 -->
          <div class="col-lg-12">
            <div class="card-item card-item-list room-card">
              <div class="card-img-carousel carousel-action carousel--action">
                <div class="card-img">
                  <a href="room-details.html" class="d-block">
                    <img src="{{ asset('ui/images/img33.jpg') }}" alt="hotel-img" />
                  </a>
                </div>
                <div class="card-img">
                  <a href="room-details.html" class="d-block">
                    <img src="{{ asset('ui/images/img32.jpg') }}" alt="hotel-img" />
                  </a>
                </div>
                <div class="card-img">
                  <a href="room-details.html" class="d-block">
                    <img src="{{ asset('ui/images/img31.jpg') }}" alt="hotel-img" />
                  </a>
                </div>
              </div>
              <div class="card-body">
                <div class="card-price pb-2">
                  <p>
                    <span class="price__from">From</span>
                    <span class="price__num">$145.00</span>
                  </p>
                </div>
                <h3 class="card-title font-size-26">
                  <a href="room-details.html">Deluxe King Bed Private</a>
                </h3>
                <p class="card-text pt-2">
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                  Aperiam asperiores commodi deleniti hic inventore laboriosam
                  laborum molestias, non odit quaerat! Aperiam culpa facilis
                  fuga impedit.
                </p>
                <div class="card-attributes pt-3 pb-4">
                  <ul class="d-flex align-items-center">
                    <li class="d-flex align-items-center">
                      <i class="la la-bed"></i><span>2 Beds</span>
                    </li>
                    <li class="d-flex align-items-center">
                      <i class="la la-building"></i
                      ><span>24 ft<sup>2</sup></span>
                    </li>
                    <li class="d-flex align-items-center">
                      <i class="la la-bathtub"></i><span>2 Bathrooms</span>
                    </li>
                  </ul>
                </div>
                <div class="card-btn">
                  <a
                    href="room-details.html"
                    class="theme-btn theme-btn-transparent"
                    >Book Now</a
                  >
                </div>
              </div>
            </div>
            <!-- end card-item -->
          </div>
          <!-- end col-lg-12 -->
          <div class="col-lg-12">
            <div class="card-item card-item-list room-card">
              <div class="card-img-carousel carousel-action carousel--action">
                <div class="card-img">
                  <a href="room-details.html" class="d-block">
                    <img src="{{ asset('ui/images/img32.jpg') }}" alt="hotel-img" />
                  </a>
                </div>
                <div class="card-img">
                  <a href="room-details.html" class="d-block">
                    <img src="{{ asset('ui/images/img33.jpg') }}" alt="hotel-img" />
                  </a>
                </div>
                <div class="card-img">
                  <a href="room-details.html" class="d-block">
                    <img src="{{ asset('ui/images/img31.jpg') }}" alt="hotel-img" />
                  </a>
                </div>
              </div>
              <div class="card-body">
                <div class="card-price pb-2">
                  <p>
                    <span class="price__from">From</span>
                    <span class="price__num">$145.00</span>
                  </p>
                </div>
                <h3 class="card-title font-size-26">
                  <a href="room-details.html">Premium Lake View Suite</a>
                </h3>
                <p class="card-text pt-2">
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                  Aperiam asperiores commodi deleniti hic inventore laboriosam
                  laborum molestias, non odit quaerat! Aperiam culpa facilis
                  fuga impedit.
                </p>
                <div class="card-attributes pt-3 pb-4">
                  <ul class="d-flex align-items-center">
                    <li class="d-flex align-items-center">
                      <i class="la la-bed"></i><span>2 Beds</span>
                    </li>
                    <li class="d-flex align-items-center">
                      <i class="la la-building"></i
                      ><span>24 ft<sup>2</sup></span>
                    </li>
                    <li class="d-flex align-items-center">
                      <i class="la la-bathtub"></i><span>2 Bathrooms</span>
                    </li>
                  </ul>
                </div>
                <div class="card-btn">
                  <a
                    href="room-details.html"
                    class="theme-btn theme-btn-transparent"
                    >Book Now</a
                  >
                </div>
              </div>
            </div>
            <!-- end card-item -->
          </div>
          <!-- end col-lg-12 -->
          <div class="col-lg-12">
            <div class="card-item card-item-list room-card">
              <div class="card-img-carousel carousel-action carousel--action">
                <div class="card-img">
                  <a href="room-details.html" class="d-block">
                    <img src="{{ asset('ui/images/img31.jpg') }}" alt="hotel-img" />
                  </a>
                </div>
                <div class="card-img">
                  <a href="room-details.html" class="d-block">
                    <img src="{{ asset('ui/images/img32.jpg') }}" alt="hotel-img" />
                  </a>
                </div>
                <div class="card-img">
                  <a href="room-details.html" class="d-block">
                    <img src="{{ asset('ui/images/img33.jpg') }}" alt="hotel-img" />
                  </a>
                </div>
              </div>
              <div class="card-body">
                <div class="card-price pb-2">
                  <p>
                    <span class="price__from">From</span>
                    <span class="price__num">$145.00</span>
                  </p>
                </div>
                <h3 class="card-title font-size-26">
                  <a href="room-details.html">Superior Room</a>
                </h3>
                <p class="card-text pt-2">
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                  Aperiam asperiores commodi deleniti hic inventore laboriosam
                  laborum molestias, non odit quaerat! Aperiam culpa facilis
                  fuga impedit.
                </p>
                <div class="card-attributes pt-3 pb-4">
                  <ul class="d-flex align-items-center">
                    <li class="d-flex align-items-center">
                      <i class="la la-bed"></i><span>2 Beds</span>
                    </li>
                    <li class="d-flex align-items-center">
                      <i class="la la-building"></i
                      ><span>24 ft<sup>2</sup></span>
                    </li>
                    <li class="d-flex align-items-center">
                      <i class="la la-bathtub"></i><span>2 Bathrooms</span>
                    </li>
                  </ul>
                </div>
                <div class="card-btn">
                  <a
                    href="room-details.html"
                    class="theme-btn theme-btn-transparent"
                    >Book Now</a
                  >
                </div>
              </div>
            </div>
            <!-- end card-item -->
          </div>
          <!-- end col-lg-12 -->
        </div>
        <!-- end row -->
        <div class="row">
          <div class="col-lg-12">
            <div class="btn-box mt-4 text-center">
              <button type="button" class="theme-btn">
                <i class="la la-refresh me-1"></i>Load More
              </button>
              <p class="font-size-13 pt-2">Showing 1 - 5 of 124 Rooms</p>
            </div>
            <!-- end btn-box -->
          </div>
          <!-- end col-lg-12 -->
        </div>
        <!-- end row -->
      </div>
      <!-- end container -->
    </section>
    <!-- end card-area -->
    <!-- ================================
    END CARD AREA
================================= -->

    <!-- ================================
    START CHECK AVAILABILITY AREA
================================= -->
    <section class="check-availability-area section-bg section-padding">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-12">
            <div class="check-availability-content">
              <div class="section-heading text-center">
                <h2 class="sec__title">Search Rooms</h2>
              </div>
              <!-- end section-heading -->
              <div class="contact-form-action padding-top-40px">
                <form action="#">
                  <div class="row">
                    <div class="col-lg-3">
                      <div class="input-box">
                        <label class="label-text">Check-in</label>
                        <div class="form-group">
                          <span class="la la-calendar form-icon"></span>
                          <input
                            class="date-range form-control"
                            type="text"
                            name="daterange-single"
                          />
                        </div>
                      </div>
                    </div>
                    <!-- end col-lg-3 -->
                    <div class="col-lg-3">
                      <div class="input-box">
                        <label class="label-text">Check-out</label>
                        <div class="form-group">
                          <span class="la la-calendar form-icon"></span>
                          <input
                            class="date-range form-control"
                            type="text"
                            name="daterange-single"
                          />
                        </div>
                      </div>
                    </div>
                    <!-- end col-lg-3 -->
                    <div class="col-lg-3">
                      <div class="input-box">
                        <label class="label-text">Rooms</label>
                        <div class="form-group select2-container-wrapper">
                          <div class="select-contain w-auto">
                            <select class="select-contain-select">
                              <option value="0">Select Rooms</option>
                              <option value="1" selected>1 Room</option>
                              <option value="2">2 Rooms</option>
                              <option value="3">3 Rooms</option>
                              <option value="4">4 Rooms</option>
                              <option value="5">5 Rooms</option>
                              <option value="6">6 Rooms</option>
                              <option value="7">7 Rooms</option>
                              <option value="8">8 Rooms</option>
                              <option value="9">9 Rooms</option>
                              <option value="10">10 Rooms</option>
                              <option value="11">11 Rooms</option>
                              <option value="12">12 Rooms</option>
                              <option value="13">13 Rooms</option>
                              <option value="14">14 Rooms</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- end col-lg-3 -->
                    <div class="col-lg-3">
                      <div class="input-box">
                        <label class="label-text">Guests</label>
                        <div class="form-group">
                          <div class="dropdown dropdown-contain">
                            <a
                              class="dropdown-toggle form-control dropdown-btn ps-3"
                              href="#"
                              data-bs-toggle="dropdown"
                              data-bs-auto-close="outside"
                            >
                              <span
                                >Total Guests
                                <span class="qtyTotal guestTotal" data-total-output>0</span></span
                              >
                            </a>
                            <div class="dropdown-menu dropdown-menu-wrap">
                              <div class="dropdown-item">
                                <div
                                  class="qty-box d-flex align-items-center justify-content-between"
                                >
                                  <label>Adults</label>
                                  <div class="qtyBtn d-flex align-items-center">
                                    <div class="qtyDec">
                                      <i class="la la-minus"></i>
                                    </div>
                                    <input
                                      data-total-input
                                      type="text"
                                      name="qtyInput"
                                      value="0"
                                    />
                                    <div class="qtyInc">
                                      <i class="la la-plus"></i>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!-- end dropdown-item -->
                              <div class="dropdown-item">
                                <div
                                  class="qty-box d-flex align-items-center justify-content-between"
                                >
                                  <label
                                    >Children <span>2-12 years old</span></label
                                  >
                                  <div class="qtyBtn d-flex align-items-center">
                                    <div class="qtyDec">
                                      <i class="la la-minus"></i>
                                    </div>
                                    <input
                                      data-total-input
                                      type="text"
                                      name="qtyInput"
                                      value="0"
                                    />
                                    <div class="qtyInc">
                                      <i class="la la-plus"></i>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!-- end dropdown-item -->
                              <div class="dropdown-item">
                                <div
                                  class="qty-box d-flex align-items-center justify-content-between"
                                >
                                  <label
                                    >Infants <span>0-2 years old</span></label
                                  >
                                  <div class="qtyBtn d-flex align-items-center">
                                    <div class="qtyDec">
                                      <i class="la la-minus"></i>
                                    </div>
                                    <input
                                      data-total-input
                                      type="text"
                                      name="qtyInput"
                                      value="0"
                                    />
                                    <div class="qtyInc">
                                      <i class="la la-plus"></i>
                                    </div>
                                  </div>
                                </div>
                                <!-- end qty-box -->
                              </div>
                              <!-- end dropdown-item -->
                            </div>
                          </div>
                          <!-- end dropdown -->
                        </div>
                      </div>
                    </div>
                    <!-- end col-lg-3 -->
                    <div class="col-lg-12">
                      <div class="btn-box text-center pt-2">
                        <a href="#" class="theme-btn">Check Availability</a>
                      </div>
                    </div>
                    <!-- end col-lg-3 -->
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!-- end col-lg-12 -->
        </div>
        <!-- end row -->
      </div>
      <!-- end container -->
    </section>
    <!-- end check-availability-area -->
    <!-- ================================
    END CHECK AVAILABILITY AREA
================================= -->

    <!-- ================================
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
    <!-- end footer-area -->

@include('clients.blocks.footer_hotel')