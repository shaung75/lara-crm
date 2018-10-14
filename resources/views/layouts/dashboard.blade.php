@include ('layouts.partials.head')

<div class="wrapper">

    @include ('layouts.partials.sidebar')

    <div class="main-panel">
        
        @include ('layouts.partials.navbar')

        <div class="content">
            <div class="container-fluid">
                
                @yield ('content')

            </div>
        </div>

        @include ('layouts.partials.footernav')

    </div>
</div>

@include ('layouts.partials.footer')
