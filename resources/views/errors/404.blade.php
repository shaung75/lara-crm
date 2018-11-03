@extends ('layouts.public')

@section ('content')

    <header class="masthead text-center text-white d-flex">
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-10 mx-auto">
            <h1 class="text-uppercase">
              <strong>404</strong>
            </h1>
            <hr>
          </div>
          <div class="col-lg-8 mx-auto">
            <p class="text-faded mb-5">Whatever you're looking for isn't here</p>
            <a class="btn btn-primary btn-xl js-scroll-trigger" href="{{ route('home') }}">Go back home</a>
          </div>
        </div>
      </div>
    </header>

@endsection