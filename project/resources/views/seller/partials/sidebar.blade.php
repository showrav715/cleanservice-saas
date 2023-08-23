<aside id="sidebar-wrapper">
    <ul class="sidebar-menu mb-5">
        <li class="menu-header">@lang('Dashboard')</li>
        <li class="nav-item {{ menu('seller.dashboard') }}">
            <a href="{{ route('seller.dashboard') }}" class="nav-link"><i
                    class="fas fa-fire"></i><span>@lang('Dashboard')</span></a>
        </li>


        <li class="nav-item dropdown {{ menu(['seller.service*']) }}">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                <i class="fas fa-toolbox"></i>
                <span>@lang('Services')</span></a>
            <ul class="dropdown-menu">
                <li class="{{ menu('seller.service.index') }}"><a class="nav-link"
                        href="{{ route('seller.service.index') }}">@lang('Service')</a></li>
                <li class="{{ menu('seller.service.faq.index') }}"><a class="nav-link"
                        href="{{ route('seller.service.faq.index') }}">@lang('Service Faq')</a></li>
            </ul>
        </li>


        <li class="nav-item dropdown {{ menu(['seller.contact*']) }}">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                    class="fas fa-envelope-open-text"></i></i>
                <span>@lang('Manage Contact')</span></a>
            <ul class="dropdown-menu">
                <li class="{{ menu('seller.contact.getintouch.message') }}"><a class="nav-link"
                        href="{{ route('seller.contact.getintouch.message') }}">@lang('Get in Touch')</a>
                </li>
                <li class="{{ menu('seller.contact.message') }}"><a class="nav-link"
                        href="{{ route('seller.contact.message') }}">@lang('Contact Messages')</a>
                </li>
                <li class="{{ menu('seller.contact.setting.index') }}"><a class="nav-link"
                        href="{{ route('seller.contact.setting.index') }}">@lang('Contact Setting')</a></li>
            </ul>
        </li>

        <li class="nav-item dropdown {{ menu(['seller.bcategory*', 'seller.blog*']) }}">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fab fa-blogger-b"></i>
                <span>@lang('Blogs')</span></a>
            <ul class="dropdown-menu">
                <li class="{{ menu('seller.bcategory.index') }}"><a class="nav-link"
                        href="{{ route('seller.bcategory.index') }}">@lang('Category')</a></li>
                <li class="{{ menu('seller.blog.index') }}"><a class="nav-link"
                        href="{{ route('seller.blog.index') }}">@lang('Blogs')</a>
                </li>
            </ul>
        </li>

        <li class="nav-item dropdown {{ menu(['seller.pcategory*', 'seller.project*']) }}">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fab fa-r-project"></i>
                <span>@lang('Manage Project')</span></a>
            <ul class="dropdown-menu">

                <li class="{{ menu('seller.pcategory.index') }}"><a class="nav-link"
                        href="{{ route('seller.pcategory.index') }}">@lang('Category')</a>
                </li>
                <li class="{{ menu('seller.project.index') }}"><a class="nav-link"
                        href="{{ route('seller.project.index') }}">@lang('Project')</a></li>
            </ul>
        </li>

        <li class="nav-item {{ menu('seller.page.index*') }}">
            <a href="{{ route('seller.page.index') }}" class="nav-link"><i
                    class="fas fa-file-alt"></i><span>@lang('Manage Pages')</span></a>
        </li>


        <li class="nav-item {{ menu('seller.team.index') }}">
            <a href="{{ route('seller.team.index') }}" class="nav-link"><i class="fas fa-users-cog"></i>
                <span>@lang('Manage Team')</span></a>
        </li>

        <li class="nav-item {{ menu('seller.domain.setting') }}">
                <a href="{{ route('seller.domain.setting') }}" class="nav-link">
                    <i class="fab fa-first-order"></i><span>@lang('Domain Setting')</span></a>
            </li>




        <li class="menu-header">@lang('General')</li>

        <li
            class="nav-item dropdown {{ menu(['seller.gs*', 'seller.social.manage*', 'seller.language*', 'seller.cookie']) }}">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                    class="fas fa-cog"></i><span>@lang('General Settings')</span></a>
            <ul class="dropdown-menu">

                <li class="{{ menu('seller.gs.site.settings') }}"><a class="nav-link"
                        href="{{ route('seller.gs.site.settings') }}">@lang('Site Settings')</a></li>
                <li class="{{ menu('seller.gs.theme.settings') }}"><a class="nav-link"
                        href="{{ route('seller.gs.theme.settings') }}">@lang('Theme Settings')</a></li>
                <li class="{{ menu('seller.gs.logo') }}"><a class="nav-link"
                        href="{{ route('seller.gs.logo') }}">@lang('Logo & Favicon')</a></li>
                <li class="{{ menu('seller.gs.breadcumb') }}"><a class="nav-link"
                        href="{{ route('seller.gs.breadcumb') }}">@lang('Breadcumb')</a></li>
                <li class="{{ menu('seller.social.manage') }}"><a class="nav-link"
                        href="{{ route('seller.social.manage') }}">@lang('Social Links')</a></li>
                <li class="{{ menu('seller.cookie') }}"><a class="nav-link"
                        href="{{ route('seller.cookie') }}">@lang('Cookie Concent')</a></li>
                <li class="{{ menu('seller.subscription.index') }}"><a class="nav-link"
                        href="{{ route('seller.subscription.index') }}">@lang('Subscription')</a></li>
                <li class="{{ menu('seller.language.index') }}"><a class="nav-link"
                        href="{{ route('seller.language.index') }}">@lang('Language')</a></li>
                <li class="{{ menu('seller.gs.plugin.settings') }}"><a class="nav-link"
                        href="{{ route('seller.gs.plugin.settings') }}">@lang('Plugins')</a></li>
                <li class="{{ menu('seller.gs.maintainance.settings') }}"><a class="nav-link"
                        href="{{ route('seller.gs.maintainance.settings') }}">@lang('Maintenance')</a></li>
            </ul>
        </li>



        <li
            class="nav-item dropdown {{ menu(['seller.front*', 'seller.faq*', 'seller.testimonial*', 'seller.brand*', 'seller.contact.section', 'seller.about*', 'seller.slider*', 'seller.counter*', 'seller.frontend*']) }}">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i>
                <span>@lang('Frontend Setting')</span></a>
            <ul class="dropdown-menu">
                <li class="{{ menu('seller.slider.index') }}"><a class="nav-link"
                        href="{{ route('seller.slider.index') }}">@lang('Slider')</a></li>
                <li class="{{ menu('seller.about.index') }}"><a class="nav-link"
                        href="{{ route('seller.about.index') }}">@lang('About')</a></li>
                <li class="{{ menu('seller.counter.index') }}"><a class="nav-link"
                        href="{{ route('seller.counter.index') }}">@lang('Counter Section')</a></li>
                <li class="{{ menu('seller.faq.index') }}"><a class="nav-link"
                        href="{{ route('seller.faq.index') }}">@lang('FAQ')</a></li>
                <li class="{{ menu('seller.contact.section') }}"><a class="nav-link"
                        href="{{ route('seller.contact.section') }}">@lang('Contact Section')</a></li>
                <li class="{{ menu('seller.testimonial.index') }}"><a class="nav-link"
                        href="{{ route('seller.testimonial.index') }}">@lang('Testimonials')</a></li>
                <li class="{{ menu('seller.brand.index') }}"><a class="nav-link"
                        href="{{ route('seller.brand.index') }}">@lang('Brand')</a></li>
            </ul>
        </li>



        <li class="nav-item {{ menu('seller.subscriber') }}">
            <a href="{{ route('seller.subscriber') }}" class="nav-link"><i class="fas fa-users"></i>
                <span>@lang('Subscribers')</span></a>
        </li>

    </ul>
</aside>
