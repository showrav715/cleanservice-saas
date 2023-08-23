<aside id="sidebar-wrapper">
        <ul class="sidebar-menu mb-5">
                <li class="menu-header">@lang('Dashboard')</li>
                <li class="nav-item {{ menu('admin.dashboard') }}">
                        <a href="{{ route('admin.dashboard') }}" class="nav-link"><i
                                        class="fas fa-fire"></i><span>@lang('Dashboard')</span></a>
                </li>

                <li class="menu-header">@lang('Package Management')</li>

                <li class="nav-item dropdown {{ menu(['admin.package.*']) }}">
                        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                                        class="fab fa-product-hunt"></i><span>@lang('Package Management')</span></a>
                        <ul class="dropdown-menu">
                                <li class="{{ menu('admin.package.create') }}"><a class="nav-link"
                                                href="{{ route('admin.package.create') }}">@lang('Create New')</a></li>
                                <li class="{{ menu('admin.package.index') }}"><a class="nav-link"
                                                href="{{ route('admin.package.index') }}">@lang('Packages')</a></li>
                        </ul>
                </li>

                <li class="nav-item {{ menu('admin.order.index') }}">
                        <a href="{{ route('admin.order.index') }}" class="nav-link"><i
                                        class="fas fa-coins"></i><span>@lang('Manage Orders')</span></a>
                </li>

                <li class="menu-header">@lang('Customers')</li>
                <li class="nav-item dropdown {{ menu(['admin.customer.*']) }}">
                        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                                        class="fab fa-product-hunt"></i><span>@lang('Customers')</span></a>
                        <ul class="dropdown-menu">
                                <li class="{{ menu('admin.customer.create') }}"><a class="nav-link"
                                                href="{{ route('admin.customer.create') }}">@lang('Create Customer')</a>
                                </li>
                                <li class="{{ menu('admin.customer.index') }}"><a class="nav-link"
                                                href="{{ route('admin.customer.index') }}">@lang('All Customers')</a>
                                </li>
                        </ul>
                </li>

                <li class="nav-item dropdown {{ menu('admin.ticket.manage') }}">
                        <a href="#" class="nav-link has-dropdown"><i class="fas fa-ticket-alt"></i> <span>@lang('Support
                                        Tickets')

                                </span></a>
                        <ul class="dropdown-menu">
                                <li class="{{ url()->current() == url('admin/manage/tickets/user') ? 'active' : '' }}">
                                        <a class="nav-link"
                                                href="{{ route('admin.ticket.manage', 'user') }}">@lang('User
                                                Tickets')</a>
                                </li>
                        </ul>
                </li>

                <li class="menu-header">@lang('Staff and Role')</li>
                <li class="nav-item {{ menu('admin.role*') }}">
                        <a href="{{ route('admin.role.index') }}" class="nav-link"><i
                                        class="fas fa-user-tag"></i><span>@lang('Manage Role')</span></a>
                </li>


                <li class="nav-item {{ menu('admin.staff*') }}">
                        <a href="{{ route('admin.staff.manage') }}" class="nav-link"><i
                                        class="fas fa-user-shield"></i><span>@lang('Manage Staff')</span></a>
                </li>

                <li class="nav-item dropdown {{ menu(['admin.domain*', 'admin.domain*']) }}">
                        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                                        class="fas fa-money-check-alt"></i> <span>@lang('Manage Domain')</span></a>
                        <ul class="dropdown-menu">
                                <li class="{{ menu('admin.domain.setting') }}"><a class="nav-link"
                                                href="{{ route('admin.domain.setting') }}">@lang('Domain Setting')</a>
                                </li>
                        </ul>
                </li>


                <li class="nav-item dropdown {{ menu(['admin.gateway*']) }}">
                        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                                        class="fas fa-money-check-alt"></i> <span>@lang('Payment Gateway')</span></a>
                        <ul class="dropdown-menu">
                                <li class="{{ menu('admin.currency.index') }}"><a class="nav-link"
                                                href="{{ route('admin.currency.index') }}">@lang('Currency')</a></li>
                                <li class="{{ menu('admin.gateway') }}"><a class="nav-link"
                                                href="{{ route('admin.gateway') }}">@lang('Gateways')</a>
                                </li>
                        </ul>
                </li>

                <li class="menu-header">@lang('General')</li>

                <li class="nav-item dropdown {{ menu(['admin.gs*', 'admin.cookie','admin.mail*']) }}">
                        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                                        class="fas fa-cog"></i><span>@lang('General Settings')</span></a>
                        <ul class="dropdown-menu">

                                <li class="{{ menu('admin.gs.site.settings') }}"><a class="nav-link"
                                                href="{{ route('admin.gs.site.settings') }}">@lang('Site Settings')</a>
                                </li>
                                <li class="{{ menu('admin.gs.logo') }}"><a class="nav-link"
                                                href="{{ route('admin.gs.logo') }}">@lang('Logo & Favicon')</a></li>
                                <li class="{{ menu('admin.mail.config') }}"><a class="nav-link"
                                                href="{{ route('admin.mail.config') }}">@lang('Email Config')</a></li>
                                <li class="{{ menu('admin.cookie') }}"><a class="nav-link"
                                                href="{{ route('admin.cookie') }}">@lang('Cookie Concent')</a></li>
                        </ul>
                </li>

                <li
                        class="nav-item dropdown {{ menu(['admin.gs.banner*', 'admin.page*', 'admin.service*','admin.testimonial*', 'admin.bcategory*', 'admin.blog*', 'admin.seo-setting*']) }}">
                        <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i>
                                <span>@lang('Frontend Setting')</span></a>
                        <ul class="dropdown-menu">
                                <li class="{{ menu('admin.gs.banner') }}"><a class="nav-link"
                                                href="{{ route('admin.gs.banner') }}">@lang('Hero Section')</a></li>
                                <li class="{{ menu('admin.page.index') }}"><a class="nav-link"
                                                href="{{ route('admin.page.index') }}">@lang('Pages Settings')</a></li>
                                <li class="{{ menu('admin.service.index') }}"><a class="nav-link"
                                                href="{{ route('admin.service.index') }}">@lang('Services')</a></li>
                                <li class="{{ menu('admin.testimonial.index') }}"><a class="nav-link"
                                                href="{{ route('admin.testimonial.index') }}">@lang('Testimonials')</a>
                                </li>
                                <li class="{{ menu('admin.bcategory.index') }}"><a class="nav-link"
                                                href="{{ route('admin.bcategory.index') }}">@lang('Blog Category')</a>
                                </li>
                                <li class="{{ menu(['admin.blog.index', 'admin.blog.create', 'admin.blog.edit']) }}"><a
                                                class="nav-link" href="{{ route('admin.blog.index') }}">@lang('Manage
                                                Blog')</a></li>
                                <li class="{{ menu('admin.seo-setting.index') }}"><a class="nav-link"
                                                href="{{ route('admin.seo-setting.index') }}">@lang('Seo Settings')</a>
                                </li>
                        </ul>
                </li>

                <li class="nav-item {{ menu('admin.clear.cache') }}">
                        <a href="{{ route('admin.clear.cache') }}" class="nav-link"><i class="fas fa-broom"></i>
                                <span>@lang('Clear Cache')</span></a>
                </li>

                <li class="nav-item mt-5">
                        <h6 class="text-primary text-center"> @lang('Version') : 3.1 </h6>
                </li>
        </ul>
</aside>