         <header class="header_section ">

             <div>
        @if ($errors->any())
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong> @foreach ($errors->all()  as $error )
      <li>{{ $error }}</li>
   
     
  @endforeach
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

            @if (session()->has('message'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>{{ session('message') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

@endif
            <div class="container">
               <nav class="navbar navbar-expand-lg custom_nav-container ">
                  {{-- <a class="navbar-brand" href="index.html"><img width="250" src="home/images/logo.png" alt="#" /></a> --}}
                <div class="text-lg font-bold">Samantha Love Salon</div>  
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class=""> </span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav">
                        <li class="nav-item active">
                           <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
                        </li>
                       {{-- <li class="nav-item dropdown">
                           <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">Pages <span class="caret"></span></a>
                           <ul class="dropdown-menu">
                              <li><a href="about.html">About</a></li>
                              <li><a href="testimonial.html">Testimonial</a></li>
                           </ul>
                        </li>  --}}


                        @if(Auth::check())

                          @if ( auth()->user()->roles->pluck('name')[0] ?? '' === 'user' )
                                 <li class="nav-item">
                           <a class="nav-link" href="{{ route('user.dashboardUser') }}">Dashboard</a>
                        </li>
                                 
                              @endif

                        @endif
                      
                     
                        <li class="nav-item">
                           <a class="nav-link" href="#appointment ">Appointment</a>
                        </li>
                        {{-- <li class="nav-item"> 
                           <a class="nav-link" href="blog_list.html">Blog</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="contact.html">Contact</a>
                        </li> --}}

                        @if(Route::has('login'))

                        @auth
              
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                               <button type="submit" class="btn btn-primary" style="background-color: #f7444e; border:none">Log-out</button> 
                        
                        </form>

                        @else
                        <li class="nav-item">
                           <a href="{{ route('login') }}" class="nav-link" >Log-in</a>
                        </li>
                         <li class="nav-item">
                           <a href="{{ route('register') }}" class="nav-link">Sign-up</a>
                        </li>
                        @endauth
                        @endif
                     </ul>
                  </div>
               </nav>
            </div>
         </header>