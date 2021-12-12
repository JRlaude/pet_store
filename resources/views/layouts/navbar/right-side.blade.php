<!-- Right Side Of Navbar -->
<ul class="navbar-nav  ml-auto">

    <!-- Authentication Links -->
    @guest
    <li class="nav-item">
        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
    </li>
    @if (Route::has('register'))
    <li class="nav-item">
        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
    </li>
    @endif
    @else
    <!-- Cart Dropdown Menu -->
    <li class="nav-item dropdown">
        <a class="nav-link  d-block  d-sm-none" href="/carts">
            Cart
        </a>
        <a class="nav-link d-none d-sm-block" data-toggle="dropdown" href="#">
            <i class="fas fa-shopping-cart  ">
                @if( Cart::session(auth()->id())->getContent()->count() )
                <span class="badge badge-danger navbar-badge">{{ Cart::session(auth()->id())->getContent()->count() }}</span>
                @endif
            </i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right pre-scrollable">
            @foreach(Cart::session(auth()->id())->getContent() as $item)

            <a href="#" class="dropdown-item">
                <!-- Cart Start -->
                <div class="media">
                    <img src="/storage/images/products/{{ $item->attributes->image }}" alt="" class="img-size-50 mr-3">
                    <div class="media-body">
                        <h3 class="dropdown-item-title">
                            {{ $item->name }}
                            <!-- <span class="float-right text-sm text-danger"><i class="fas fa-times"></i></span> -->
                        </h3>
                        <!-- &#8369; pesos sign -->
                        <p class="text-sm">&#8369; {{ $item->price }} </p>
                        <span class="float-right text-sm text-muted"> Total : &#8369; {{ $item->quantity  *  $item->price }} </span>

                        <p class="text-sm text-muted"> Qty : {{ $item->quantity }} </p>

                    </div>
                </div>
                <!-- Cart End -->
            </a>

            @endforeach
              <div class="dropdown-divider"></div>
            <a href="/carts" class="dropdown-item dropdown-footer">See All Items in Cart</a>
        </div>
    </li>

    <!-- Messages Dropdown Menu -->
    <li class="nav-item dropdown">
        <a class="nav-link d-block  d-sm-none" href="#">
            Messages
        </a>
        <a class="nav-link d-none d-sm-block" data-toggle="dropdown" href="#">
            <i class="far fa-comments"></i>
            <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <a href="#" class="dropdown-item">
                <!-- Message Start -->
                <div class="media">
                    <img src="dist/img/user1-128x128.jpg" alt="" class="img-size-50 mr-3">
                    <div class="media-body">
                        <h3 class="dropdown-item-title">
                            Brad Diesel
                            <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                        </h3>
                        <p class="text-sm">Call me whenever you can...</p>
                        <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                    </div>
                </div>
                <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
                <!-- Message Start -->
                <div class="media">
                    <img src="dist/img/user8-128x128.jpg" alt="" class="img-size-50 mr-3">
                    <div class="media-body">
                        <h3 class="dropdown-item-title">
                            John Pierce
                            <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                        </h3>
                        <p class="text-sm">I got your message bro</p>
                        <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                    </div>
                </div>
                <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
                <!-- Message Start -->
                <div class="media">
                    <img src="dist/img/user3-128x128.jpg" alt="" class="img-size-50 mr-3">
                    <div class="media-body">
                        <h3 class="dropdown-item-title">
                            Nora Silvester
                            <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                        </h3>
                        <p class="text-sm">The subject goes here</p>
                        <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                    </div>
                </div>
                <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
    </li>


    <!-- Notifications Dropdown Menu -->
    <li class="nav-item dropdown">
        <a class="nav-link d-block  d-sm-none" href="#">
            Notifications
        </a>
        <a class="nav-link d-none d-sm-block" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-header">15 Notifications</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
                <i class="fas fa-envelope mr-2"></i> 4 new messages
                <span class="float-right text-muted text-sm">3 mins</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
                <i class="fas fa-users mr-2"></i> 8 friend requests
                <span class="float-right text-muted text-sm">12 hours</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
                <i class="fas fa-file mr-2"></i> 3 new reports
                <span class="float-right text-muted text-sm">2 days</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
    </li>

    <!-- user menu -->

    <li class="nav-item dropdown">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <!-- <img src="/storage/images/me.jpg" class="user-image elevation-2" alt="{{ Auth::user()->getName()  }}"> -->
            <i class="fas fa-user fa-fw"></i>
            <span class="text-capitalize">
                {{Auth::user()->getName()}}'s Account
            </span>
        </a>

        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-right">

            @if(Auth::user()->isAdmin)
            <li><a class="dropdown-item" href="{{route('dashboard')}}">Admin Dashboard</a></li>
            @else
            <li><a class="dropdown-item" href="{{route('profile',Auth::user())}}">Manage Account</a></li>
            @endif
            <li><a class="dropdown-item" href="#!">Order</a></li>
            <li><a class="dropdown-item" href="#!">Reservation</a></li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </ul>
    </li>
    <!--  -->
    @endguest
</ul>