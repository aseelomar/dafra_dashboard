<div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " m-menu-vertical="1" m-menu-scrollable="1" m-menu-dropdown-timeout="500" style="position: relative;">
    <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
        @can('dashboard')
            <li class="m-menu__item  m-menu__item--{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" aria-haspopup="true"><a href="{{ route('admin.dashboard') }}" class="m-menu__link "><i class="m-menu__link-icon flaticon-line-graph"></i><span class="m-menu__link-title"> <span class="m-menu__link-wrap"> <span class="m-menu__link-text">{{ trans('admin.dashboard') }}</span>
											<span class="m-menu__link-badge"></span> </span></span></a></li>
        @endcan
        <li class="m-menu__section ">
            <h4 class="m-menu__section-text">{{ trans('admin.menu') }}</h4>
            <i class="m-menu__section-icon flaticon-more-v2"></i>
        </li>
        @can('users')
            <li class="m-menu__item  m-menu__item--{{ request()->routeIs('admin.users*') ? 'active' : '' }}" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon flaticon-users"></i><span class="m-menu__link-text">{{ trans('admin.users') }}</span><i
                            class="m-menu__ver-arrow la la-angle-right"></i></a>
                <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"><span class="m-menu__link"><span class="m-menu__link-text">{{ trans('admin.categories') }}</span></span></li>
                        <li class="m-menu__item " aria-haspopup="true"><a href="{{ route('admin.users.all') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">{{ trans('admin.users') }}</span></a></li>
                        <li class="m-menu__item " aria-haspopup="true"><a href="{{ route('admin.users.add') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">{{ trans('admin.add-user') }}</span></a></li>
                        <li class="m-menu__item " aria-haspopup="true"><a href="{{ route('admin.customer.all') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">{{ trans('admin.customers') }}</span></a></li>

                    </ul>
                </div>
            </li>
        @endcan

        @can('categories')
            <li class="m-menu__item  m-menu__item--{{ request()->routeIs('admin.categories*') ? 'active' : '' }}" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon flaticon-analytics"></i><span class="m-menu__link-text">{{ trans('admin.categories') }}</span><i
                            class="m-menu__ver-arrow la la-angle-right"></i></a>
                <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"><span class="m-menu__link"><span class="m-menu__link-text">{{ trans('admin.categories') }}</span></span></li>
                        <li class="m-menu__item " aria-haspopup="true"><a href="{{ route('admin.categories.all') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">{{ trans('admin.all_category') }}</span></a></li>
                        <li class="m-menu__item " aria-haspopup="true"><a href="{{ route('admin.sub-category.all') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">{{ trans('admin.par_category_acount') }}</span></a></li>
                    </ul>
                </div>
            </li>
        @endcan


        @can('news')
            <li class="m-menu__item  m-menu__item--{{ request()->routeIs('admin.news*') ? 'active' : '' }}" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon flaticon-notes"></i><span class="m-menu__link-text">{{ trans('admin.news') }}</span><i
                            class="m-menu__ver-arrow la la-angle-right"></i></a>
                <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"><span class="m-menu__link"><span class="m-menu__link-text">{{ trans('admin.news') }}</span></span></li>
                        <li class="m-menu__item " aria-haspopup="true"><a href="{{ route('admin.news.all') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">{{ trans('admin.all_news') }}</span></a></li>
                        <li class="m-menu__item " aria-haspopup="true"><a href="{{ route('admin.news.add') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">{{ trans('admin.new_news') }}</span></a></li>
                    </ul>
                </div>
            </li>
        @endcan

        @can('videos')
            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon flaticon-layers"></i><span class="m-menu__link-text">{{ trans('admin.videos') }}</span><i
                            class="m-menu__ver-arrow la la-angle-right"></i></a>
                <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"><span class="m-menu__link"><span class="m-menu__link-text">{{ trans('admin.videos') }}</span></span></li>
                        <li class="m-menu__item " aria-haspopup="true"><a href="{{ route('admin.video_details.all', 'videos') }}" class="m-menu__link " id="video-details-id"><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">{{ trans('admin.all_videos') }}</span></a></li>
                        <li class="m-menu__item " aria-haspopup="true"><a href="{{ route('admin.video_details.all', 'series') }}" class="m-menu__link " id="video-details-id"><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">{{ trans('admin.series') }}</span></a></li>
                        <li class="m-menu__item " aria-haspopup="true"><a href="{{ route('admin.video_details.all', 'programs') }}" class="m-menu__link "id="video-details-id"><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">{{ trans('admin.programs') }}</span></a></li>
                        <li class="m-menu__item " aria-haspopup="true"><a href="{{ route('admin.video_details.all', 'movies') }}" class="m-menu__link "id="video-details-id"><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">{{ trans('admin.movies') }}</span></a></li>

                    </ul>
                </div>
            </li>
        @endcan

        @can('goals')
            <li class="m-menu__item  m-menu__item--{{ request()->routeIs('admin.goals*') ? 'active' : '' }}" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="{{ route('admin.goals.all') }}" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon flaticon-line-graph"></i><span class="m-menu__link-text">{{ trans('admin.goals') }}</span></a>
            </li>
        @endcan

        @can('general_logo')
            <li class="m-menu__item  m-menu__item--{{ request()->routeIs('admin.constants*') ? 'active' : '' }}" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="{{ route('admin.constants.all') }}" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon flaticon-box-1"></i><span class="m-menu__link-text">{{ trans('admin.logo_general') }}</span></a>
            </li>
        @endcan

        @can('guide')
                <li class="m-menu__item  m-menu__item--{{ request()->routeIs('admin.guide*') ? 'active' : '' }}" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="{{ route('admin.guide') }}" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon flaticon-box-1"></i><span class="m-menu__link-text">{{ trans('admin.guide') }}</span></a>
                </li>
        @endcan

        @can('users')
            <li class="m-menu__item  m-menu__item--" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="{{ route('admin.page.all') }}" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon flaticon-box-1"></i><span class="m-menu__link-text">{{ trans('admin.page') }}</span></a>
            </li>
        @endcan

        @can('backend_settings')
            <li class="m-menu__item  m-menu__item--{{ request()->routeIs('admin.backend_settings*') ? 'active' : '' }}" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="{{ route('admin.backend_settings.all') }}" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon flaticon-settings"></i><span class="m-menu__link-text">{{ trans('admin.developer_control') }}</span></a>
            </li>
        @endcan

        @can('settings')
                <li class="m-menu__item  m-menu__item--{{ request()->routeIs('admin.settings*') ? 'active' : '' }}" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="{{ route('admin.settings.view') }}" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon flaticon-settings"></i><span class="m-menu__link-text">{{ trans('admin.info_general') }}</span></a>
                </li>
        @endcan

    </ul>
</div>
