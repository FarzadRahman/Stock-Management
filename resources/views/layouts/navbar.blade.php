<!-- MENU Start -->
<div class="navbar-custom">
    <div class="container-fluid">
        <div id="navigation">
            <!-- Navigation Menu-->
            <ul class="navigation-menu">

                <li class="has-submenu">
                    <a href="{{route('dashboard')}}"><i class="ti-home"></i>Dashboard</a>
                </li>

                <li class="has-submenu">
                    <a href="{{route('product.all')}}"><i class="ti-layout-width-default"></i>Products</a>
                </li>

                <li class="has-submenu">
                    <a href="{{route('client.all')}}"><i class="ti-archive"></i>Clients</a>
                </li>

                <li class="has-submenu">
                    <a href="{{route('invoice')}}"><i class="ti-archive"></i>Invoice</a>
                </li>

                {{--<li class="has-submenu">--}}
                    {{--<a href="#"><i class="ti-settings"></i>Settings</a>--}}
                    {{--<ul class="submenu">--}}
                        {{--<li><a href="{{route('manage.zone')}}">Manage Zone</a></li>--}}
                        {{--<li><a href="{{route('manage.education')}}">Manage Education</a></li>--}}
                    {{--</ul>--}}
                {{--</li>--}}

            </ul>
            <!-- End navigation menu -->
        </div>
        <!-- end #navigation -->
    </div>
    <!-- end container -->
</div>