<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a  href="{{ asset('/')}}admin/index3.html" class="brand-link">
        <img   src="{{ asset('admin/logo_images/'.$logo->logo_img) }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        {{-- <span class="brand-text font-weight-light">AdminLTE 3</span> --}}
    </a>

    <div class="sidebar">

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                {{-- @php
                    dd($logo);
                @endphp --}}
                <img   src="{{asset('admin/logo_images/'.$logo->favicon_img) }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a  href="{{ asset('/')}}admin/#" class="d-block">Alexander Pierce</a>
            </div>
        </div>

        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                <li class="nav-item menu-open">
                    <a  href="{{ asset('/')}}admin/#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                </li>

                <li class="nav-item">
                    <a  href="{{ asset('/')}}admin/pages/widgets.html" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Widgets
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a  href="{{ asset('/')}}admin/#" class="nav-link">
                        <i class="fa-solid fa-gear"></i>
                        <p class="pl-3">
                            Setting
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview pl-3">
                        <li class="nav-item">
                            <a  href="{{ route('general_setting') }}" class="nav-link">
                                <i class="fa-solid fa-gears"></i>
                                <p class="pl-3">General Setting</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item  mt-3">
                    <a  href="{{ asset('/')}}admin/#" class="nav-link">
                        <i class="fa-solid fa-briefcase"></i>
                        <p class="pl-3">
                            Order
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview pl-4" >
                        <li class="nav-item">
                            <a  href="{{ route('pending.order') }}" class="nav-link">
                                <i class="fa-solid fa-circle-check"></i>
                               <div class="badge badge-info"> Pending <span class="badge badge-danger">{{ $pending_count }}</span></div>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview pl-4">
                        <li class="nav-item">
                            <a  href="{{ route('confirm.order') }}" class="nav-link">
                                <i class="fa-solid fa-circle-check"></i>

                              <div class="badge badge-success"> Confirm <span class="badge badge-danger">{{ $confirm_count }}</span></div>
                            </a>
                        </li>

                    </ul>
                    <ul class="nav nav-treeview pl-4">
                        <li class="nav-item">
                            <a  href="{{ route('delivered.order') }}" class="nav-link">
                                <i class="fa-solid fa-circle-check"></i>
                                <div class="badge badge-warning"> Deliverd <span class="badge badge-danger">{{ $delivered_count }}</span></div>
                            </a>
                        </li>

                    </ul>
                    <ul class="nav nav-treeview pl-4">
                        <li class="nav-item">
                            <a  href="{{ route('cancelled.order') }}" class="nav-link">
                                <i class="fa-solid fa-circle-check"></i>
                                <div class="badge badge-danger"> Canceled <span class="badge badge-dark">{{ $cancel_count }}</span></div>
                            </a>
                        </li>

                    </ul>
                    <ul class="nav nav-treeview pl-4">
                        <li class="nav-item">
                            <a  href="{{ route('all.order') }}" class="nav-link">
                                <i class="fa-solid fa-circle-check"></i>
                                <div class="badge badge-primary"> All_order <span class="badge badge-danger">{{ $all_count }}</span></div>
                            </a>
                        </li>

                    </ul>

                </li>
                <li class="nav-item">
                    <a  href="{{ asset('/')}}admin/#" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Category
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a  href="{{ route('main-category.index') }}" class="nav-link">
                                <i class="fa-solid fa-arrow-right"></i>
                                <p>Main Category</p>
                            </a>
                        </li>

                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a  href="{{ route('sub-category.index') }}" class="nav-link">
                                <i class="fa-solid fa-arrow-right"></i>
                                <p>Sub Category</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a  href="{{ asset('/')}}admin/#" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Brand
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a  href="{{ route('brand.index') }}" class="nav-link">
                                <i class="fa-solid fa-arrow-right"></i>
                                <p>Brand</p>
                            </a>
                        </li>

                    </ul>

                </li>

                <li class="nav-item">
                    <a  href="{{ asset('/')}}admin/#" class="nav-link">
                        <i class="fa-solid fa-shield-halved"></i>
                        <p>
                            Artibutes
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a  href="{{ route('artibute.index') }}" class="nav-link">
                                <i class="fa-solid fa-arrow-right"></i>
                                <p>Artibutes Setting</p>
                            </a>
                        </li>

                    </ul>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a  href="{{ route('artibute-info.index') }}" class="nav-link">
                                <i class="fa-solid fa-arrow-right"></i>
                                <p>Artibutes info Setting</p>
                            </a>
                        </li>

                    </ul>

                </li>


                <li class="nav-item">
                    <a  href="{{ asset('/')}}admin/#" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Color
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a  href="{{ route('color.index') }}" class="nav-link">
                                <i class="fa-solid fa-arrow-right"></i>
                                <p>color setting</p>
                            </a>
                        </li>

                    </ul>


                </li>


                <li class="nav-item">
                    <a  href="{{ asset('/')}}admin/#" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Size
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a  href="{{ route('size.index') }}" class="nav-link">
                                <i class="fa-solid fa-arrow-right"></i>
                                <p>size setting</p>
                            </a>
                        </li>

                    </ul>


                </li>

                <li class="nav-item">
                    <a  href="{{ asset('/')}}admin/#" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                           Unit
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a  href="{{ route('unit.index') }}" class="nav-link">
                                <i class="fa-solid fa-arrow-right"></i>
                                <p>Unit setting</p>
                            </a>
                        </li>

                    </ul>


                </li>

                <li class="nav-item">
                    <a  href="{{ asset('/')}}admin/#" class="nav-link">
                        <i class="fa-solid fa-shield-halved"></i>
                        <p>
                            In-house Products
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a  href="{{ route('product.index') }}" class="nav-link">
                                <<i class="fa-solid fa-arrow-right"></i>
                                <p>Product List</p>
                            </a>
                        </li>

                    </ul>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a  href="{{ route('product.create') }}" class="nav-link">
                                <i class="fa-solid fa-arrow-right"></i>
                                <p>Add New Product</p>
                            </a>
                        </li>

                    </ul>


                </li>

                <li class="nav-item">
                    <a  href="{{ asset('/')}}admin/#" class="nav-link">
                        <i class="fa-solid fa-shield-halved"></i>
                        <p>
                            Banner
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a  href="{{ route('product.index') }}" class="nav-link">
                                <i class="fa-solid fa-arrow-right"></i>
                                <p>Banner List</p>
                            </a>
                        </li>

                    </ul>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a  href="{{ route('banner.create') }}" class="nav-link">
                                <i class="fa-solid fa-arrow-right"></i>
                                <p>Banner create</p>
                            </a>
                        </li>

                    </ul>


                </li>

                <li class="nav-item">
                    <a  href="{{ asset('/')}}admin/#" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Faq
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a  href="{{ route('faq.create') }}" class="nav-link">
                                <i class="fa-solid fa-arrow-right"></i>
                                <p>Faq create</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item">
                    <a  href="{{ asset('/')}}admin/#" class="nav-link">
                        <i class="fa-solid fa-shield-halved"></i>
                        <p>
                            Service
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a  href="{{ route('single-service.create') }}" class="nav-link">
                                <i class="fa-solid fa-arrow-right"></i>
                                <p>SigleService</p>
                            </a>
                        </li>

                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a  href="{{ route('service.create') }}" class="nav-link">
                                <i class="fa-solid fa-arrow-right"></i>
                                <p>Service create</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a  href="{{ asset('/')}}admin/#" class="nav-link">
                        <i class="fa-solid fa-shield-halved"></i>
                        <p>
                            About
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a  href="{{ route('about.create') }}" class="nav-link">
                                <i class="fa-solid fa-arrow-right"></i>
                                <p>about</p>
                            </a>
                        </li>

                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a  href="{{ route('choose.create') }}" class="nav-link">
                                <i class="fa-solid fa-arrow-right"></i>
                                <p>Chosse</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a  href="{{ route('teams.create') }}" class="nav-link">
                                <i class="fa-solid fa-arrow-right"></i>
                                <p>Team</p>
                            </a>
                        </li>
                    </ul>
                </li>





                <li class="nav-item">
                    <a  href="{{ asset('/')}}admin/#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Layout Options
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right">6</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a  href="{{ asset('/')}}admin/pages/layout/top-nav.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Top Navigation</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a  href="{{ asset('/')}}admin/pages/layout/top-nav-sidebar.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Top Navigation + Sidebar</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a  href="{{ asset('/')}}admin/pages/layout/boxed.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Boxed</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a  href="{{ asset('/')}}admin/pages/layout/fixed-sidebar.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Fixed Sidebar</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a  href="{{ asset('/')}}admin/pages/layout/fixed-sidebar-custom.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Fixed Sidebar <small>+ Custom Area</small></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a  href="{{ asset('/')}}admin/pages/layout/fixed-topnav.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Fixed Navbar</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a  href="{{ asset('/')}}admin/pages/layout/fixed-footer.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Fixed Footer</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a  href="{{ asset('/')}}admin/pages/layout/collapsed-sidebar.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Collapsed Sidebar</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a  href="{{ asset('/')}}admin/#" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Charts
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a  href="{{ asset('/')}}admin/pages/charts/chartjs.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>ChartJS</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a  href="{{ asset('/')}}admin/pages/charts/flot.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Flot</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a  href="{{ asset('/')}}admin/pages/charts/inline.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Inline</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a  href="{{ asset('/')}}admin/pages/charts/uplot.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>uPlot</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a  href="{{ asset('/')}}admin/#" class="nav-link">
                        <i class="nav-icon fas fa-tree"></i>
                        <p>
                            UI Elements
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a  href="{{ asset('/')}}admin/pages/UI/general.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>General</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a  href="{{ asset('/')}}admin/pages/UI/icons.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Icons</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a  href="{{ asset('/')}}admin/pages/UI/buttons.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Buttons</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a  href="{{ asset('/')}}admin/pages/UI/sliders.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sliders</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a  href="{{ asset('/')}}admin/pages/UI/modals.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Modals & Alerts</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a  href="{{ asset('/')}}admin/pages/UI/navbar.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Navbar & Tabs</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a  href="{{ asset('/')}}admin/pages/UI/timeline.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Timeline</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a  href="{{ asset('/')}}admin/pages/UI/ribbons.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Ribbons</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a  href="{{ asset('/')}}admin/#" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Forms
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a  href="{{ asset('/')}}admin/pages/forms/general.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>General Elements</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a  href="{{ asset('/')}}admin/pages/forms/advanced.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Advanced Elements</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a  href="{{ asset('/')}}admin/pages/forms/editors.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Editors</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a  href="{{ asset('/')}}admin/pages/forms/validation.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Validation</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a  href="{{ asset('/')}}admin/#" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Tables
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a  href="{{ asset('/')}}admin/pages/tables/simple.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Simple Tables</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a  href="{{ asset('/')}}admin/pages/tables/data.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>DataTables</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a  href="{{ asset('/')}}admin/pages/tables/jsgrid.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>jsGrid</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">EXAMPLES</li>
                <li class="nav-item">
                    <a  href="{{ asset('/')}}admin/pages/calendar.html" class="nav-link">
                        <i class="nav-icon fas fa-calendar-alt"></i>
                        <p>
                            Calendar
                            <span class="badge badge-info right">2</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a  href="{{ asset('/')}}admin/pages/gallery.html" class="nav-link">
                        <i class="nav-icon far fa-image"></i>
                        <p>
                            Gallery
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a  href="{{ asset('/')}}admin/pages/kanban.html" class="nav-link">
                        <i class="nav-icon fas fa-columns"></i>
                        <p>
                            Kanban Board
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a  href="{{ asset('/')}}admin/#" class="nav-link">
                        <i class="nav-icon far fa-envelope"></i>
                        <p>
                            Mailbox
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a  href="{{ asset('/')}}admin/pages/mailbox/mailbox.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Inbox</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a  href="{{ asset('/')}}admin/pages/mailbox/compose.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Compose</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a  href="{{ asset('/')}}admin/pages/mailbox/read-mail.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Read</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a  href="{{ asset('/')}}admin/#" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Pages
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a  href="{{ asset('/')}}admin/pages/examples/invoice.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Invoice</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a  href="{{ asset('/')}}admin/pages/examples/profile.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Profile</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a  href="{{ asset('/')}}admin/pages/examples/e-commerce.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>E-commerce</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a  href="{{ asset('/')}}admin/pages/examples/projects.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Projects</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a  href="{{ asset('/')}}admin/pages/examples/project-add.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Project Add</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a  href="{{ asset('/')}}admin/pages/examples/project-edit.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Project Edit</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a  href="{{ asset('/')}}admin/pages/examples/project-detail.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Project Detail</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a  href="{{ asset('/')}}admin/pages/examples/contacts.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Contacts</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a  href="{{ asset('/')}}admin/pages/examples/faq.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>FAQ</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a  href="{{ asset('/')}}admin/pages/examples/contact-us.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Contact us</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a  href="{{ asset('/')}}admin/#" class="nav-link">
                        <i class="nav-icon far fa-plus-square"></i>
                        <p>
                            Extras
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a  href="{{ asset('/')}}admin/#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Login & Register v1
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a  href="{{ asset('/')}}admin/pages/examples/login.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Login v1</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a  href="{{ asset('/')}}admin/pages/examples/register.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Register v1</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a  href="{{ asset('/')}}admin/pages/examples/forgot-password.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Forgot Password v1</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a  href="{{ asset('/')}}admin/pages/examples/recover-password.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Recover Password v1</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a  href="{{ asset('/')}}admin/#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Login & Register v2
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a  href="{{ asset('/')}}admin/pages/examples/login-v2.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Login v2</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a  href="{{ asset('/')}}admin/pages/examples/register-v2.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Register v2</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a  href="{{ asset('/')}}admin/pages/examples/forgot-password-v2.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Forgot Password v2</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a  href="{{ asset('/')}}admin/pages/examples/recover-password-v2.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Recover Password v2</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a  href="{{ asset('/')}}admin/pages/examples/lockscreen.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Lockscreen</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a  href="{{ asset('/')}}admin/pages/examples/legacy-user-menu.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Legacy User Menu</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a  href="{{ asset('/')}}admin/pages/examples/language-menu.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Language Menu</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a  href="{{ asset('/')}}admin/pages/examples/404.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Error 404</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a  href="{{ asset('/')}}admin/pages/examples/500.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Error 500</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a  href="{{ asset('/')}}admin/pages/examples/pace.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pace</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a  href="{{ asset('/')}}admin/pages/examples/blank.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Blank Page</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a  href="{{ asset('/')}}admin/starter.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Starter Page</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a  href="{{ asset('/')}}admin/#" class="nav-link">
                        <i class="nav-icon fas fa-search"></i>
                        <p>
                            Search
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a  href="{{ asset('/')}}admin/pages/search/simple.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Simple Search</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a  href="{{ asset('/')}}admin/pages/search/enhanced.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Enhanced</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">MISCELLANEOUS</li>
                <li class="nav-item">
                    <a  href="{{ asset('/')}}admin/iframe.html" class="nav-link">
                        <i class="nav-icon fas fa-ellipsis-h"></i>
                        <p>Tabbed IFrame Plugin</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a  href="{{ asset('/')}}admin/https://adminlte.io/docs/3.1/" class="nav-link">
                        <i class="nav-icon fas fa-file"></i>
                        <p>Documentation</p>
                    </a>
                </li>
                <li class="nav-header">MULTI LEVEL EXAMPLE</li>
                <li class="nav-item">
                    <a  href="{{ asset('/')}}admin/#" class="nav-link">
                        <i class="fas fa-circle nav-icon"></i>
                        <p>Level 1</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a  href="{{ asset('/')}}admin/#" class="nav-link">
                        <i class="nav-icon fas fa-circle"></i>
                        <p>
                            Level 1
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a  href="{{ asset('/')}}admin/#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Level 2</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a  href="{{ asset('/')}}admin/#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Level 2
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a  href="{{ asset('/')}}admin/#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Level 3</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a  href="{{ asset('/')}}admin/#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Level 3</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a  href="{{ asset('/')}}admin/#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Level 3</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a  href="{{ asset('/')}}admin/#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Level 2</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a  href="{{ asset('/')}}admin/#" class="nav-link">
                        <i class="fas fa-circle nav-icon"></i>
                        <p>Level 1</p>
                    </a>
                </li>
                <li class="nav-header">LABELS</li>
                <li class="nav-item">
                    <a  href="{{ asset('/')}}admin/#" class="nav-link">
                        <i class="nav-icon far fa-circle text-danger"></i>
                        <p class="text">Important</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a  href="{{ asset('/')}}admin/#" class="nav-link">
                        <i class="nav-icon far fa-circle text-warning"></i>
                        <p>Warning</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a  href="{{ asset('/')}}admin/#" class="nav-link">
                        <i class="nav-icon far fa-circle text-info"></i>
                        <p>Informational</p>
                    </a>
                </li>
            </ul>
        </nav>

    </div>

</aside>
