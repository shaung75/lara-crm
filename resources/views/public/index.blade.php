@extends ('layouts.public')

@section ('content')

    <header class="masthead text-center text-white d-flex">
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-10 mx-auto">
            <h1 class="text-uppercase">
              <strong>Experience on hand</strong>
            </h1>
            <hr>
          </div>
          <div class="col-lg-8 mx-auto">
            <p class="text-faded mb-5">Hi I'm Shaun, a <strong>freelance web developer</strong><br>based in Lincolnshire</p>
            <a class="btn btn-primary btn-xl js-scroll-trigger" href="#about">Find Out More</a>
          </div>
        </div>
      </div>
    </header>

    <section class="bg-primary" id="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <h2 class="section-heading text-white">A bit about me!</h2>
            <hr class="light my-4">
            <p class="text-faded mb-4">I have over 20 years of experience developing websites, 10 of which in a commercial environment and 5 which have been as the only employed web developer for the <a href="https://www.wildlifetrusts.org" title="The Wildlife Trusts"><strong>Royal Society of Wildlife Trusts</strong></a>. If you have a project that you'd like to get off the ground, or you have an existing project that involves Wordpress, Drupal, Laravel or anything else built in PHP, the it'd be great to hear from you.</p>
            <a class="btn btn-light btn-xl js-scroll-trigger" href="#services">Get Started!</a>
          </div>
        </div>
      </div>
    </section>

    <section id="services">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading">See What I Offer</h2>
            <hr class="my-4">
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <i class="fas fa-4x fa-code text-primary mb-3 sr-icon-1"></i>
              <h3 class="mb-3">Solid PHP Code</h3>
              <p class="text-muted mb-0">All of my code is thoroughly tested before being released to the client</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <i class="fas fa-4x fa-server text-primary mb-3 sr-icon-2"></i>
              <h3 class="mb-3">Hosting Support</h3>
              <p class="text-muted mb-0">Expertise in a range of server environments to keep your websites online</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <i class="fas fa-4x fa-project-diagram text-primary mb-3 sr-icon-3"></i>
              <h3 class="mb-3">Technical Planning</h3>
              <p class="text-muted mb-0">Creating a clear path from the initial project idea through to delivery</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <i class="fas fa-4x fa-heart text-primary mb-3 sr-icon-4"></i>
              <h3 class="mb-3">Digital Marketing</h3>
              <p class="text-muted mb-0">Ensuring the right people are seeing what you have to offer with targeted campaigns</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="bg-dark text-white">
      <div class="container text-center">
        <h2 class="mb-4">Want to get to know me some more?</h2>
        <a class="btn btn-light btn-xl sr-button" href="{{ route('freelance') }}">Freelance Developer</a>
      </div>
    </section>

    <section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <h2 class="section-heading">Let's Get Together!</h2>
            <hr class="my-4">
            <p class="mb-5">Ready to start your next project or need a web developer to get your project moving forward? That's great! Give me a call, drop me an email or fill out the form and I'll get back to you as soon as possible!</p>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 ml-auto text-center">
            <i class="fas fa-phone fa-3x mb-3 sr-contact-1"></i>
            <p>07920 292323</p>
          </div>
          <div class="col-lg-4 mr-auto text-center">
            <i class="fas fa-envelope fa-3x mb-3 sr-contact-2"></i>
            <p>
              <a href="mailto:shaung75@gmail.com">shaung75@gmail.com</a>
            </p>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-8 mx-auto text-center"> 
            <hr class="my-4">

            @if(session()->has('success'))
              <div class="alert alert-success" role="alert">
                {{ session()->get('success') }}
              </div>
            @endif

            @if ($errors->any())
              <div class="alert alert-danger">
                      @foreach ($errors->all() as $error)
                          {{ $error }}<br>
                      @endforeach
              </div>
            @endif
            
            <form id="contact-form" name="contact-form" action="{{ route('contact') }}" method="POST">
              @csrf
                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <input type="text" id="name" name="name" class="form-control" value={{ old('name') }}>
                            <label for="name" class="">Your name</label>
                        </div>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}">
                            <label for="email" class="">Your email</label>
                        </div>
                    </div>
                    <!--Grid column-->

                </div>
                <!--Grid row-->

                <!--Grid row-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="md-form mb-0">
                            <input type="text" id="telephone" name="telephone" class="form-control" value="{{ old('telephone') }}">
                            <label for="subject" class="">Contact Number</label>
                        </div>
                    </div>
                </div>
                <!--Grid row-->

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-12">

                        <div class="md-form">
                            <textarea type="text" id="message" name="message" rows="5" class="form-control md-textarea">{{ old('message') }}</textarea>
                            <label for="message" class="sr-only">Your message</label>
                        </div>

                    </div>
                    <div class="col-md-12">
                      <hr>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
                <!--Grid row-->

            </form>
          </div>  
        </div>
      </div>
    </section>

@endsection