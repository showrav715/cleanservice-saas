 <nav class="navbar navbar-expand-lg main-navbar">

     <ul class="navbar-nav mr-auto icon-menu">
         <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
         <li class="mt-1">
             <div class="change-language  ms-auto mr-3 text--title">
                <form id="currency_submit" action="{{ route('seller.currency.store') }}"
                                    method="GET">
                                    <select name="currency_id" class="form-control" id="currency_id">
                                        @php
                                            if (Session::has('landing_currency')) {
                                                $currency_id = Session::get('landing_currency');
                                            } else {
                                                $currency_id = App\Models\Currency::where('default', 1)->first()->id;
                                            }
                                        @endphp
                                        @foreach (DB::table('currencies')->whereStatus(1)->get() as $currency)
                                            <option value="{{ $currency->id }}"
                                                {{ $currency_id == $currency->id ? 'selected' : '' }}>
                                                {{ $currency->code }}</option>
                                        @endforeach
                                    </select>
                                </form>
             </div>
         </li>
     </ul>

     <ul class="navbar-nav navbar-right">

         <li>
             <a target="_blank" href="{{ route('front.index') }}" class="nav-link nav-link-lg"><i
                     class="fas fa-home pr-1"></i></a>
         </li>

         <li class="dropdown"><a href="#" data-toggle="dropdown"
                 class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                 <img alt="image" src="{{ getPhoto(seller()->photo, seller()->name) }}" class="rounded-circle mr-1">
                 <div class="d-sm-none d-lg-inline-block">{{ seller()->email }}</div>
             </a>
             <div class="dropdown-menu dropdown-menu-right">
                 <a href="{{ route('seller.profile') }}" class="dropdown-item has-icon">
                     <i class="far fa-user"></i> @lang('Profile Setting')
                 </a>
                 <a href="{{ route('seller.password') }}" class="dropdown-item has-icon">
                     <i class="fas fa-key"></i> @lang('Change Password')
                 </a>

                 <div class="dropdown-divider"></div>
                 <a href="{{ route('seller.logout') }}" class="dropdown-item has-icon text-danger">
                     <i class="fas fa-sign-out-alt"></i> @lang('Logout')
                 </a>
             </div>
         </li>
     </ul>
 </nav>
