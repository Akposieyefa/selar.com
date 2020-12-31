<header class="border-b md:flex md:items-center md:justify-between p-4 pb-0 shadow-lg md:pb-4">
    <!-- Logo text or image -->
    <div class="flex items-center justify-between mb-4 md:mb-0">
        <h1 class="leading-none text-2xl text-grey-darkest">
            <a class="no-underline text-grey-darkest hover:text-black" href="{{url('/')}}">
                SELAR APP
            </a>
        </h1>
        <a class="text-black hover:text-orange md:hidden" href="#">
            <i class="fa fa-2x fa-bars"></i>
        </a>
    </div>
    <!-- END Logo text or image -->

    <!-- Search field -->
    <form class="mb-4 w-full md:mb-0 md:w-1/4">
        <label class="hidden" for="search-form">Search</label>
        <input class="bg-grey-lightest border-2 focus:border-orange p-2 rounded-lg shadow-inner w-full" placeholder="Search" type="text">
        <button class="hidden">Submit</button>
    </form>
    <!-- END Search field -->
    <!-- Global navigation -->
    <nav>
        <ul class="list-reset md:flex md:items-center">
            @guest
                <li class="md:ml-4">
                    <a class="block no-underline hover:underline py-2 text-grey-darkest hover:text-black md:border-none md:p-0" href="{{ route('login') }}">
                        Login
                    </a>
                </li>
                @if (Route::has('register'))
                    <li class="md:ml-4">
                        <a class="block no-underline hover:underline py-2 text-grey-darkest hover:text-black md:border-none md:p-0" href="{{ route('register') }}">
                            Register
                        </a>
                    </li>
                @endif
            @else

                @user
                <li class="md:ml-4">
                    <a class="block no-underline hover:underline py-2 text-grey-darkest hover:text-black md:border-none md:p-0" href="{{route('wallets.index')}}">
                        My Wallet
                    </a>
                </li>
                <li class="md:ml-4">
                    <a class="block no-underline hover:underline py-2 text-grey-darkest hover:text-black md:border-none md:p-0" href="{{route('transactions.create')}}">
                        My  Transaction
                    </a>
                </li>
                @enduser

                @admin
                <li class="md:ml-4">
                    <a class="block no-underline hover:underline py-2 text-grey-darkest hover:text-black md:border-none md:p-0" href="{{url('/customers')}}">
                        Customers
                    </a>
                </li>
                <li class="md:ml-4">
                    <a class="block no-underline hover:underline py-2 text-grey-darkest hover:text-black md:border-none md:p-0" href="{{route('wallets.index')}}">
                        Wallets
                    </a>
                </li>
                <li class="md:ml-4">
                    <a class="block no-underline hover:underline py-2 text-grey-darkest hover:text-black md:border-none md:p-0" href="">
                        Transaction Request
                    </a>
                </li>
                @endadmin

                <li class="md:ml-4">
                    <a href="{{ route('logout') }}"
                       class="block no-underline hover:underline py-2 text-grey-darkest hover:text-black md:border-none md:p-0"
                       onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        {{ csrf_field() }}
                    </form>
                </li>
            @endguest
        </ul>
    </nav>
    <!-- END Global navigation -->
</header>
