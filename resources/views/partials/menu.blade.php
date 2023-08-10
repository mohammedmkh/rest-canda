<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 917px;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">{{ trans('panel.site_title') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.home') ? 'active' : '' }}"
                        href="{{ route('admin.home') }}">
                        <i class="fas fa-fw fa-tachometer-alt nav-icon">
                        </i>
                        <p>
                            {{ trans('global.dashboard') }}
                        </p>
                    </a>
                </li>
                @can('user_management_access')
                    <li
                        class="nav-item has-treeview {{ request()->is('admin/permissions*') ? 'menu-open' : '' }} {{ request()->is('admin/roles*') ? 'menu-open' : '' }} {{ request()->is('admin/users*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is('admin/permissions*') ? 'active' : '' }} {{ request()->is('admin/roles*') ? 'active' : '' }} {{ request()->is('admin/users*') ? 'active' : '' }}"
                            href="#">
                            <i class="fa-fw nav-icon fas fa-users">

                            </i>
                            <p>
                                {{ trans('cruds.userManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('permission_access')
                                <li class="nav-item">
                                    <a href="{{ route('admin.permissions.index') }}"
                                        class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-unlock-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.permission.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="nav-item">
                                    <a href="{{ route('admin.roles.index') }}"
                                        class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-briefcase">

                                        </i>
                                        <p>
                                            {{ trans('cruds.role.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('user_access')
                                <li class="nav-item">
                                    <a href="{{ route('admin.users.index') }}"
                                        class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-user">

                                        </i>
                                        <p>
                                            {{ trans('cruds.user.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('product_management_access')
                    <li
                        class="nav-item has-treeview {{ request()->is('admin/product-categories*') ? 'menu-open' : '' }} {{ request()->is('admin/product-tags*') ? 'menu-open' : '' }} {{ request()->is('admin/products*') ? 'menu-open' : '' }} {{ request()->is('admin/additionals*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is('admin/product-categories*') ? 'active' : '' }} {{ request()->is('admin/product-tags*') ? 'active' : '' }} {{ request()->is('admin/products*') ? 'active' : '' }} {{ request()->is('admin/additionals*') ? 'active' : '' }}"
                            href="#">
                            <i class="fa-fw nav-icon fas fa-shopping-cart">

                            </i>
                            <p>
                                {{ trans('cruds.productManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('product_category_access')
                                <li class="nav-item">
                                    <a href="{{ route('admin.product-categories.index') }}"
                                        class="nav-link {{ request()->is('admin/product-categories') || request()->is('admin/product-categories/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-folder">

                                        </i>
                                        <p>
                                            {{ trans('cruds.productCategory.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan

                            @can('product_access')
                                <li class="nav-item">
                                    <a href="{{ route('admin.products.index') }}"
                                        class="nav-link {{ request()->is('admin/products') || request()->is('admin/products/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-shopping-cart">

                                        </i>
                                        <p>
                                            {{ trans('cruds.product.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('additional_access')
                                <li class="nav-item">
                                    <a href="{{ route('admin.additionals.index') }}"
                                        class="nav-link {{ request()->is('admin/additionals') || request()->is('admin/additionals/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-calendar-plus">

                                        </i>
                                        <p>
                                            {{ trans('cruds.additional.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('resturant_access')
                    <li class="nav-item">
                        <a href="{{ route('admin.resturants.index') }}"
                            class="nav-link {{ request()->is('admin/resturants') || request()->is('admin/resturants/*') ? 'active' : '' }}">
                            <i class="fa-fw nav-icon fas fa-archway">

                            </i>
                            <p>
                                {{ trans('cruds.resturant.title') }}
                            </p>
                        </a>
                    </li>
                @endcan

                @can('payment_method_access')
                    <li class="nav-item">
                        <a href="{{ route('admin.payment-methods.index') }}"
                            class="nav-link {{ request()->is('admin/payment-methods') || request()->is('admin/payment-methods/*') ? 'active' : '' }}">
                            <i class="fa-fw nav-icon fas fa-money-bill">

                            </i>
                            <p>
                                {{ trans('cruds.paymentMethod.title') }}
                            </p>
                        </a>
                    </li>
                @endcan

                @can('order_access')
                    <li class="nav-item">
                        <a href="{{ route('admin.orders.index') }}"
                            class="nav-link {{ request()->is('admin/orders') || request()->is('admin/orders/*') ? 'active' : '' }}">
                            <i class="fa-fw nav-icon fab fa-opencart">

                            </i>
                            <p>
                                {{ trans('cruds.order.title') }}
                            </p>
                        </a>
                    </li>
                @endcan


                @can('setting_access')
                    <li class="nav-item">
                        <a href="{{ route('admin.settings.index') }}"
                            class="nav-link {{ request()->is('admin/settings') || request()->is('admin/settings/*') ? 'active' : '' }}">
                            <i class="fa-fw nav-icon fas fa-sliders-h">

                            </i>
                            <p>
                                {{ trans('cruds.setting.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('language_access')
                    <li class="nav-item">
                        <a href="{{ route('admin.languages.index') }}"
                            class="nav-link {{ request()->is('admin/languages') || request()->is('admin/languages/*') ? 'active' : '' }}">
                            <i class="fa-fw nav-icon fas fa-globe">

                            </i>
                            <p>
                                {{ trans('cruds.language.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('faq_access')
                    <li class="nav-item">
                        <a href="{{ route('admin.faqs.index') }}"
                            class="nav-link {{ request()->is('admin/faqs') || request()->is('admin/faqs/*') ? 'active' : '' }}">
                            <i class="fa-fw nav-icon fas fa-quote-left">

                            </i>
                            <p>
                                {{ trans('cruds.faq.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                    @can('profile_password_edit')
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}"
                                href="{{ route('profile.password.edit') }}">
                                <i class="fa-fw fas fa-key nav-icon">
                                </i>
                                <p>
                                    {{ trans('global.change_password') }}
                                </p>
                            </a>
                        </li>
                    @endcan
                @endif
                <li class="nav-item">
                    <a href="#" class="nav-link"
                        onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        <p>
                            <i class="fas fa-fw fa-sign-out-alt nav-icon">

                            </i>
                            <p>{{ trans('global.logout') }}</p>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
