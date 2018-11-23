    <div class="sidebar" data-color="purple" data-image="/img/sidebar-5.jpg">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="{{ route('dashboard') }}" class="simple-text">
                    Creative Tim
                </a>
            </div>

            <ul class="nav">
                <li class="@if (Request::is('/')) {{'active'}} @endif">
                    <a href="{{ route('dashboard') }}">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="@if (Request::is('customers*')) {{'active'}} @endif">
                    <a href="{{ route('customers') }}">
                        <i class="pe-7s-users"></i>
                        <p>Customers</p>
                    </a>
                </li>
                <li class="@if (Request::is('projects*')) {{'active'}} @endif">
                    <a href="{{ route('projects') }}">
                        <i class="pe-7s-folder"></i>
                        <p>Projects</p>
                    </a>
                </li>
                <li class="@if (Request::is('tasks*')) {{'active'}} @endif">
                    <a href="{{ route('task') }}">
                        <i class="pe-7s-folder"></i>
                        <p>Tasks</p>
                    </a>
                </li>
                <li class="@if (Request::is('quotes*')) {{'active'}} @endif">
                    <a href="{{ route('quotes') }}">
                        <i class="pe-7s-news-paper"></i>
                        <p>Quotes</p>
                    </a>
                </li>
                <li class="@if (Request::is('invoices*')) {{'active'}} @endif">
                    <a href="{{ route('invoices') }}">
                        <i class="pe-7s-cash"></i>
                        <p>Invoices</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>