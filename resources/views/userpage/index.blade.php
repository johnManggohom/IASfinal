<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href= {{ asset("home/images/favicon.png") }} type="">
      <title>Samantha Love Salon</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="{{ asset('home/css') }}/bootstrap.css"/>
      <!-- font awesome style -->
      <link href= {{ asset("home/css/font-awesome.min.css") }} rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href= {{ asset("home/css/style.css") }} rel="stylesheet" />
      
      <!-- responsive style -->
      <link href= {{ asset("home/css/responsive.css") }} rel="stylesheet" />
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
@include('userpage.header')
         <!-- end header section -->
         <!-- slider section -->
         <section class="slider_section ">
            <div class="slider_bg_box">
               <img src="{{ asset('home/images/slider-bg.jpg' ) }}" alt="">
            </div>
            <div id="customCarousel1" class="carousel slide" data-ride="carousel">
               <div class="carousel-inner">
                  <div class="carousel-item active">
                     <div class="container ">
                        <div class="row">
                           <div class="col-md-7 col-lg-6 ">
                              <div class="detail-box">
                                 <h1>
                                    <span>
                                    BE BEAUTIFULLY
                                    </span>
                                    <br>
                                   Confident
                                 </h1>
                                 <p>
                                  Beauty is confidence. With our affordable services we will boost your confidencce.
                                 </p>
                                 <div class="btn-box">
                                    <a  href="#appointment" class="btn1">
                                    Book an Appointment
                                    </a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                 
               </div>
            </div>
         </section>
         <!-- end slider section -->
      </div>
      <!-- why section -->
      <section class="why_section layout_padding" id="appointment">
         <div class="container">
            <div class="heading_container heading_center">
               <h2>
                 Book an Appointment
               </h2>
            </div>
            <div class="py-12 w-2/3 mx-auto">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden sm:rounded-lg">
                   <div class="flex justify-start p-2">
                       
                </div>
               <div class="flex flex-col">
               <!-- component -->
<div class="bg-white  rounded px-5 pt-3 pb-4 mb-4 flex flex-col my-2">

  <div class="text-center text-lg font-bold">Create Appointment </div>
     <form method="POST" action="{{ route('user.appointment.store') }}">
      @csrf
                       
                        <div class="py-3">
                            <div>
                                <label for="permission"
                                    class="block text-sm font-medium text-gray-700">Hair Dresser</label>
                                <select id="permission" name="dresser_id" autocomplete="permission-name"
                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    @foreach ($hairDressers as $hairDresser)
                                        <option value="{{ $hairDresser->id }}">{{ $hairDresser->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                    </div>
                       <div class="py-3">
                            <div>
                                <label for="permission"
                                    class="block text-sm font-medium text-gray-700">Service</label>
                                  <select id="permission" name="service_id" autocomplete="permission-name"
                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                   
                                        @foreach ($services as $service)
                                        <option value="{{ $service->id }}">{{ $service->name }} | Price: {{ $service->prices }}</option>
                                    @endforeach
                     
                                </select>
                            </div>
                    </div>

                     <div class="bg-white py-3 rounded  mb-4 flex flex-col my-2">

                            {{-- <div class="flex justify-center">
                        <div class="timepicker relative form-floating mb-3 xl:w-96">
                            <input type="text" name= "time"
                            class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                            placeholder="Select a date" />
                            <label for="floatingInput" class="text-gray-700">Select a time</label>
                        </div>
                        </div>

                        <div class="flex items-center justify-center">
                        <div class="datepicker relative form-floating mb-3 xl:w-96">
                            <input type="text" name = 'date'
                            class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                            placeholder="Select a date" />
                            <label for="floatingInput" class="text-gray-700">Select a date</label>
                        </div>
                        </div> --}}

                                                    <div class="sm:col-span-6">
                                    <label for="res_date" class="block text-sm font-medium text-gray-700"> Reservation
                                        Date
                                    </label>
                                    <div class="mt-1">
                                        <input type="datetime-local" id="start_time" name="start_time"
                                            value=""
                                            class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                    </div>
                                    <span class="text-xs">Please choose the time between 10:00 A.M - 8:00 P.M.</span>
                                    {{-- @error('start_time')
                                        <div class="text-sm text-red-400">{{ $message }}</div>
                                    @enderror --}}
                                </div>
                
                          <div class="sm:col-span-6 pt-5">
                         @if(auth()->check())
                          <button type="submit" class="btn btn-primary" style="background-color: #f7444e; border:none">Book now</button>
      @else

         <a href="{{ route('login') }}" class="nav-link" >
           <button type="button" class="btn btn-primary" style="background-color: #f7444e; border:none">Login first</button> </a>
    @endif
                        
                          </div>
                        </form>
                   </div>
            </div>
        </div>
    </div>
         </div>
      </section>
      <!-- end why section -->
      

      
      <!-- product section -->
      <section class="product_section layout_padding" style="padding-top:0">
         <div class="container">
            <div class="heading_container heading_center">
               <h2>
                  Our <span>products</span>
               </h2>
            </div>
             
            <div class="row">
                @foreach ($services as $service)
               <div class="col-sm-6 col-md-4 col-lg-4">
                  <div class="box">
               <div class="text-center fw-bolder font-weight-bold fs-3">
                  
                  
                 
                                         <h4>{{ $service->name }}</h3> <h6 style="color: #f7444e">{{ $service->prices }} PHP</h6></div>
                                 
                     
                
               </div>
               </div>
               @endforeach
         </div>
            
      </section>
      <!-- end product section -->

      <!-- subscribe section -->
      <section class="subscribe_section">
         <div class="container-fuild">
            <div class="box">
               <div class="row">
                  <div class="col-md-6 offset-md-3">
                     <div class="subscribe_form ">
                        <div class="heading_container heading_center">
                           <h3>Subscribe To Get Discount Offers</h3>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor</p>
                        <form action="">
                           <input type="email" placeholder="Enter your email">
                           <button>
                           subscribe
                           </button>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- end subscribe section -->
      <!-- client section -->
      <section class="client_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
               <h2>
                  Customer's Testimonial
               </h2>
            </div>
            <div id="carouselExample3Controls" class="carousel slide" data-ride="carousel">
               <div class="carousel-inner">
                  <div class="carousel-item active">
                     <div class="box col-lg-10 mx-auto">
                        <div class="img_container">
                           <div class="img-box">
                              <div class="img_box-inner">
                                 <img src="images/client.jpg" alt="">
                              </div>
                           </div>
                        </div>
                        <div class="detail-box">
                           <h5>
                              Anna Trevor
                           </h5>
                           <h6>
                              Customer
                           </h6>
                           <p>
                              Dignissimos reprehenderit repellendus nobis error quibusdam? Atque animi sint unde quis reprehenderit, et, perspiciatis, debitis totam est deserunt eius officiis ipsum ducimus ad labore modi voluptatibus accusantium sapiente nam! Quaerat.
                           </p>
                        </div>
                     </div>
                  </div>
                  <div class="carousel-item">
                     <div class="box col-lg-10 mx-auto">
                        <div class="img_container">
                           <div class="img-box">
                              <div class="img_box-inner">
                                 <img src="images/client.jpg" alt="">
                              </div>
                           </div>
                        </div>
                        <div class="detail-box">
                           <h5>
                              Anna Trevor
                           </h5>
                           <h6>
                              Customer
                           </h6>
                           <p>
                              Dignissimos reprehenderit repellendus nobis error quibusdam? Atque animi sint unde quis reprehenderit, et, perspiciatis, debitis totam est deserunt eius officiis ipsum ducimus ad labore modi voluptatibus accusantium sapiente nam! Quaerat.
                           </p>
                        </div>
                     </div>
                  </div>
                  <div class="carousel-item">
                     <div class="box col-lg-10 mx-auto">
                        <div class="img_container">
                           <div class="img-box">
                              <div class="img_box-inner">
                                 <img src="images/client.jpg" alt="">
                              </div>
                           </div>
                        </div>
                        <div class="detail-box">
                           <h5>
                              Anna Trevor
                           </h5>
                           <h6>
                              Customer
                           </h6>
                           <p>
                              Dignissimos reprehenderit repellendus nobis error quibusdam? Atque animi sint unde quis reprehenderit, et, perspiciatis, debitis totam est deserunt eius officiis ipsum ducimus ad labore modi voluptatibus accusantium sapiente nam! Quaerat.
                           </p>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="carousel_btn_box">
                  <a class="carousel-control-prev" href="#carouselExample3Controls" role="button" data-slide="prev">
                  <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
                  <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExample3Controls" role="button" data-slide="next">
                  <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                  <span class="sr-only">Next</span>
                  </a>
               </div>
            </div>
         </div>
      </section>
      <!-- end client section -->
      <!-- footer start -->
      <footer>
         <div class="container">
            <div class="row">
               <div class="col-md-4">
                   <div class="full">
                      <div class="logo_footer">
                        <a href="#"><img width="210" src="images/logo.png" alt="#" /></a>
                      </div>
                      <div class="information_f">
                        <p><strong>ADDRESS:</strong> 28 White tower, Street Name New York City, USA</p>
                        <p><strong>TELEPHONE:</strong> +91 987 654 3210</p>
                        <p><strong>EMAIL:</strong> yourmain@gmail.com</p>
                      </div>
                   </div>
               </div>
               <div class="col-md-8">
                  <div class="row">
                  <div class="col-md-7">
                     <div class="row">
                        <div class="col-md-6">
                     <div class="widget_menu">
                        <h3>Menu</h3>
                        <ul>
                           <li><a href="#">Home</a></li>
                           <li><a href="#">About</a></li>
                           <li><a href="#">Services</a></li>
                           <li><a href="#">Testimonial</a></li>
                           <li><a href="#">Blog</a></li>
                           <li><a href="#">Contact</a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="widget_menu">
                        <h3>Account</h3>
                        <ul>
                           <li><a href="#">Account</a></li>
                           <li><a href="#">Checkout</a></li>
                           <li><a href="#">Login</a></li>
                           <li><a href="#">Register</a></li>
                           <li><a href="#">Shopping</a></li>
                           <li><a href="#">Widget</a></li>
                        </ul>
                     </div>
                  </div>
                     </div>
                  </div>     
                  <div class="col-md-5">
                     <div class="widget_menu">
                        <h3>Newsletter</h3>
                        <div class="information_f">
                          <p>Subscribe by our newsletter and get update protidin.</p>
                        </div>
                        <div class="form_sub">
                           <form>
                              <fieldset>
                                 <div class="field">
                                    <input type="email" placeholder="Enter Your Mail" name="email" />
                                    <input type="submit" value="Subscribe" />
                                 </div>
                              </fieldset>
                           </form>
                        </div>
                     </div>
                  </div>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         
         </p>
      </div>
      <!-- jQery -->
      <script src="{{ asset('home/js/jquery-3.4.1.min.js') }}"></script>
      <!-- popper js -->
      <script src="{{ asset('home/js/popper.min.js') }}"></script>
      <!-- bootstrap js -->
      <script src="{{ asset('home/js/bootstrap.js') }}"></script>
      <!-- custom js -->
      <script src="{{ asset('home/js/custom.js') }}"></script>
   </body>
</html>