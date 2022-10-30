<aside class=" main-sidebar sidebar-dark-primary elevation-4 ">


    <!-- Brand Logo -->
    {{--    <a href="index3.html" class="brand-link">--}}
    {{--        <img src="{{asset('backend/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">--}}
    {{--        <span class="brand-text font-weight-light">Orchid Architect's</span>--}}
    {{--    </a>--}}
    <!-- Dynamic With Setting Company Start-->
    @if(request()->is('add-company-info')||request()->is('allCompanyInfo'))
        @php
            $siteInfo = \App\Models\Settings\CompanyInfo::orderBy('id', 'desc')->get();
        @endphp
        @if (!empty($siteInfo[0]->companyName))
            <a href="index3.html" class="brand-link">
                <img src="{{ asset($siteInfo[0]->logo) }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                     style="opacity: .8">
                <span class="brand-text font-weight-light text-center">
                    {{ $siteInfo[0]->companyName }}</span>
            </a>
        @else
            <a href="#" class="brand-link">
                <a href="{{ route('dashboard') }}" class="brand-link">
                    <img src="{{ asset('backend/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                         class="brand-image img-circle elevation-3" style="opacity: .8">
                    <span class="brand-text font-weight-light">Orchid Architect'</span>
                </a>
            </a>
        @endif
    @else
        <a href="#" class="brand-link">
            <a href="{{ route('dashboard') }}" class="brand-link">
                <img src="{{ asset('backend/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                     class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Orchid Architect'</span>
            </a>
        </a>
    @endif
    <!-- Dynamic With Setting Company End-->
    <!-- Sidebar -->
    <div class="sidebar" style="scroll-behavior: smooth;height:20rem; position: fixed;">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('backend/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                     alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth()->user()->name }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        {{--        <div class="form-inline">--}}
        {{--            <div class="input-group" data-widget="sidebar-search">--}}
        {{--                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">--}}
        {{--                <div class="input-group-append">--}}
        {{--                    <button class="btn btn-sidebar">--}}
        {{--                        <i class="fas fa-search fa-fw"></i>--}}
        {{--                    </button>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </div>--}}

        <!-- Sidebar Menu -->
        <nav class="mt-2" style="height:82vh;position:fixed;overflow-y:scroll;overflow-x:hidden;scroll-behavior: smooth;" id="tut">


            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                       with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="{{ route('dashboard') }}"
                       class="nav-link {{ 'dashboard' == request()->path() ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt" style="color:#fa79ba"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                @if (auth()->user()->roleId === 1)
                    <li class="nav-item {{(request()->is('all-sales'))? 'menu-is-opening menu-open active':''}}" id="sales">
                        <a href="#" class="nav-link {{(request()->is('all-sales'))? 'active':''}}">
                            <i class="nav-icon fa-solid fa-list" style="color:#3fff00"></i>
                            <p>
                                SALES
                                <i class="fas fa-angle-left right" style="color:#3fff00"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="#" class="nav-link {{(request()->is('all-sales'))? 'active':''}}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Sales List</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item {{(request()->is('purchase-type-list'))||(request()->is('purchase-list')) || (request()->is('approval-view')) || (request()->is('create-purchase')) || (request()->is('purchase-total')) ? 'menu-is-opening menu-open active':''}}">
                        <a href="#" class="nav-link {{(request()->is('purchase-type-list'))||(request()->is('purchase-list')) || (request()->is('approval-view')) || (request()->is('create-purchase')) || (request()->is('purchase-total')) ? 'active':''}}">
                            <!-- <i class="nav-icon fas fa-copy"></i> -->
                            <i class="nav-icon fa-solid fa-bag-shopping" style="color:#fa79ba"></i>
                            <p>
                                PURCHASES
                                <i class="fas fa-angle-left right" style="color:#fa79ba"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview ">
                            <li class="nav-item ">
                                <a href="/purchase-type-list"
                                   class="nav-link {{ request()->is('purchase-type-list') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Purchase Type</p>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a href="/purchase-list"
                                   class="nav-link {{ request()->is('purchase-list') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Purchase Proposal</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/approval-view"
                                   class="nav-link {{ request()->is('approval-view') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Approved Purchase Proposal</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/create-purchase"
                                   class="nav-link {{ request()->is('create-purchase') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p> New Purchase</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/purchase-total"
                                   class="nav-link {{ request()->is('purchase-total') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p> Total Purchase List</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/create-purchase" class="nav-link ">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Purchase Returns List</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item {{(request()->is('labour-list')) || (request()->is('labour-type-list')) || (request()->is('add-labour-bill')) || (request()->is('labour-bill-list')) ? 'menu-is-opening menu-open active':''}}">
                        <a href="#" class="nav-link {{(request()->is('labour-list')) || (request()->is('labour-type-list')) || (request()->is('add-labour-bill')) || (request()->is('labour-bill-list')) ? 'active':''}}">
                            <!-- <i class="nav-icon fas fa-copy"></i> -->
                            <i class="nav-icon fa-solid fas fa-male" style="color:#fa79ba"></i>
                            <p>
                                LABOUR MANAGEMENT
                                <i class="fas fa-angle-left right" style="color:#fa79ba"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview ">
                            <li class="nav-item ">
                                <a href="/labour-list"
                                   class="nav-link {{ request()->is('labour-list') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Labour Name</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/labour-type-list"
                                   class="nav-link {{ request()->is('labour-type-list') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Labour Type</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="/labour-bill-list"
                                   class="nav-link {{ request()->is('labour-bill-list') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Labour Bill</p>
                                </a>
                            </li>


                        </ul>
                    </li>

                    <li
                        class="nav-item {{ request()->is('leeds') || request()->is('leedsList') || request()->is('allLeedsGroup') || request()->is('all-success-leeds') ||request()->is('allClients') ? 'manu-is-opening menu-open active' : '' }}">
                        <a href="#"
                           class="nav-link {{ request()->is('leeds') || request()->is('all-success-leeds')||request()->is('allClients') ? 'active' : '' }}">
                            <!-- <i class="nav-icon fas fa-copy"></i> -->
                            <i class="nav-icon fa-brands fa-microsoft" style="color:#3fff00"></i>
                            <p>
                                CRM
                                <i class="fas fa-angle-left right" style="color:#3fff00"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li
                                class="nav-item {{ request()->is('leeds') || request()->is('leedsList') || request()->is('allLeedsGroup') ? 'menu-is-opening menu-open active' : '' }}">
                                <a href="#"
                                   class="nav-link {{ request()->is('leeds') || request()->is('leedsList') || request()->is('allLeedsGroup') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Leeds<i class="fas fa-angle-left right"></i></p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('leeds') }}"
                                           class="nav-link {{ request()->is('leeds') ? 'active' : '' }}">
                                            <i class="nav-icon"></i>
                                            <p>New Leeds</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('leedsList') }}"
                                           class="nav-link {{ request()->is('leedsList') ? 'active' : '' }}">
                                            <i class="nav-icon"></i>
                                            <p>All Leeds List</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('allLeedsGroup') }}"
                                           class="nav-link {{ request()->is('allLeedsGroup') ? 'active' : '' }}">
                                            <i class="nav-icon"></i>
                                            <p>Leeds Group</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('all-success-leeds') }}"
                                   class="nav-link {{ request()->is('all-success-leeds') ? 'active' : '' }}">
                                    <i class="far fa-dot-circle nav-icon"></i>
                                    <p>Success Leeds</p>
                                </a>
                            </li>
                            <li class="nav-item {{request()->is('allClients')? 'menu-is-opening menu-open active' : '' }}">
                                <a href="pages/layout/boxed.html" class="nav-link {{request()->is('allClients')? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Clients<i class="fas fa-angle-left right"></i></p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="nav-icon"></i>
                                            <p>New Clients</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('allClients') }}" class="nav-link {{request()->is('allClients')? 'active' : '' }}">
                                            <i class="nav-icon"></i>
                                            <p>All Clients List</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="nav-icon"></i>
                                            <p>Clients Group</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                        <li
                            class="nav-item {{ request()->is('categoryList') || request()->is('s-categorylist') || request()->is('unit-list') || request()->is('brand-list') || request()->is('model-list') || request()->is('model-list') || request()->is('size-list') || request()->is('color-list') || request()->is('add-product') || request()->is('product-list') ? 'menu-is-opening menu-open active' : '' }}">
                            <a href="#"
                               class="nav-link {{ request()->is('categoryList') || request()->is('s-categorylist') || request()->is('unit-list') || request()->is('brand-list') || request()->is('model-list') || request()->is('model-list') || request()->is('size-list') || request()->is('color-list') || request()->is('/add-product') || request()->is('product-list') ? 'active' : '' }}">
                                <!-- <i class="nav-icon fas fa-copy"></i> -->
                                <i class="nav-icon fa-brands fa-product-hunt" style="color:#fa79ba"></i>
                                <p>
                                    PRODUCTS
                                    <i class="fas fa-angle-left right" style="color:#fa79ba"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/categoryList"
                                       class="nav-link {{ request()->is('categoryList') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Category</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/s-categorylist"
                                       class="nav-link {{ request()->is('s-categorylist') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p> Sub Category</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/unit-list"
                                       class="nav-link {{ request()->is('unit-list') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p> Units</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/brand-list"
                                       class="nav-link {{ request()->is('brand-list') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p> Brands</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/model-list"
                                       class="nav-link {{ request()->is('model-list') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p> Model</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/size-list"
                                       class="nav-link {{ request()->is('size-list') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p> Size</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/color-list"
                                       class="nav-link {{ request()->is('color-list') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p> Color</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/add-product"
                                       class="nav-link {{ request()->is('add-product') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p> Add Products</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/product-list"
                                       class="nav-link {{ request()->is('product-list') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p> Products List</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li
                            class="nav-item {{ request()->is('suppGrp-list') || request()->is('add-supplier') || request()->is('supplier-list') ? 'menu-is-opening menu-open active' : '' }}">
                            <a
                                href="{{ route('all-Project-Categories') }}"class="nav-link {{ request()->is('suppGrp-list') || request()->is('add-supplier') || request()->is('supplier-list') ? 'active' : '' }}">
                                <!-- <i class="nav-icon fas fa-copy"></i> -->
                                <i class="nav-icon fa-solid fa-ticket" style="color:#3fff00"></i>
                                <p>
                                    SUPPLIERS
                                    <i class="fas fa-angle-left right" style="color:#3fff00"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview ">
                                <li class="nav-item">
                                    <a href="/suppGrp-list"
                                       class="nav-link {{ request()->is('suppGrp-list') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p> Supplier Groups</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/add-supplier"
                                       class="nav-link {{ request()->is('add-supplier') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p> Add Supplier</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/supplier-list"
                                       class="nav-link {{ request()->is('supplier-list') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p> Suppliers List</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item {{ request()->is('add-project-category')||request()->is('all-project-list')||request()->is('all-Project-Categories')||request()->is('category-edit/*')||request()->is('add-project-deal')||request()->is('all-deal')||request()->is('project-deal-edit/*') ? 'menu-is-opening menu-open active' : '' }}">
                            <a href="#" class="nav-link {{ request()->is('add-project-category')||request()->is('all-Project-Categories')||request()->is('category-edit/*')||request()->is('add-project-deal')||request()->is('all-deal')||request()->is('project-deal-edit/*') ? 'active' : '' }}">
                                <!-- <i class="nav-icon fas fa-copy"></i> -->
                                <i class="nav-icon fa-solid fa-list-check" style="color:#fa79ba"></i>
                                <p>
                                    PROJECT MANAGEMENT
                                    <i class="fas fa-angle-left right" style="color:#fa79ba"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('all-Project-Categories') }}" class="nav-link {{ request()->is('add-project-category')||request()->is('all-Project-Categories')||request()->is('category-edit/*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Project Category </p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('allDeal')}}" class="nav-link {{request()->is('add-project-deal')||request()->is('all-deal')||request()->is('project-deal-edit/*')? 'active' : ''}}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Project Deal</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('allProjectList')}}" class="nav-link {{request()->is('all-project-list')? 'active' : ''}}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p> All Project List </p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p> Project Estimate </p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p> Upcoming Project </p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa-solid fa-anchor-lock" style="color:#3fff00"></i>
                                <p>
                                    INVENTORY MANAGEMENT
                                    <i class="fas fa-angle-left right" style="color:#3fff00"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('all-Project-Categories') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p> Stock List </p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('add-project-category') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p> Stock Transfers </p>
                                        <i class="fas fa-angle-left right" style="color:#3fff00"></i>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ route('all-Project-Categories') }}" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p> Add Stock Transfer </p>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ route('all-Project-Categories') }}" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p> All Stock Transfer List </p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('add-project-category') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p> Stock Adjustments</p>
                                        <i class="fas fa-angle-left right" style="color:#3fff00"></i>
                                    </a>
                                    <ul class="nav nav-treeview icon-left-padding">
                                        <li class="nav-item">
                                            <a href="{{ route('all-Project-Categories') }}" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p> Add Stock Adjustment </p>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ route('all-Project-Categories') }}" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p> All Stock Adjustments list </p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item {{request()->is('all-bank','add-bank','edit-bank/*','all-deposit','add-deposit','edit-deposit/*','all-withdraw','add-withdraw','edit-withdraw/*','all-account','all-acc-balance','add-account','edit-account/*','all-exp-category','add-exp-category','edit-exp-category/*')? 'menu-is-opening menu-open active':''}}">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa-solid fa-file-invoice" style="color:#fa79ba"></i>
                                <p>
                                    ACCOUNT & FINANCE
                                    <i class="fas fa-angle-left right" style="color:#fa79ba"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item {{request()->is('all-exp-category','add-exp-category','edit-exp-category/*')?'menu-is-opening menu-open active':''}}">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Expenses</p>
                                        <i class="fas fa-angle-left right" style="color:#3fff00"></i>
                                    </a>
                                    <ul class="nav nav-treeview icon-left-padding">
                                        <li class="nav-item">
                                            <a href="{{route('all.exp.category')}}" class="nav-link {{request()->is('all-exp-category','add-exp-category','edit-exp-category/*')?'active':''}}">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p> Category </p>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="nav nav-treeview icon-left-padding">
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p> Add Expense </i></p>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="nav nav-treeview icon-left-padding">
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p> All Expenses List</i></p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p> Transfers</p>
                                        <i class="fas fa-angle-left right" style="color:#3fff00"></i>
                                    </a>
                                    <ul class="nav nav-treeview icon-left-padding">
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p> New Transfer</p>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="nav nav-treeview icon-left-padding">
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p> All Transfers List</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item {{request()->is('all-account','add-account','edit-account/*','all-acc-balance')? 'menu-is-opening menu-open active':''}}">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p> Accounts</p>
                                        <i class="fas fa-angle-left right" style="color:#3fff00"></i>
                                    </a>
                                    <ul class="nav nav-treeview icon-left-padding">
                                        <li class="nav-item">
                                            <a href="{{route('all.account')}}" class="nav-link {{request()->is('all-account','add-account','edit-account/*')? 'active':''}}">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p> All Accounts List</p>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="nav nav-treeview icon-left-padding">
                                        <li class="nav-item">
                                            <a href="{{route('all.account.balance')}}" class="nav-link {{request()->is('all-acc-balance')? 'active':''}}">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p> Accounts Balance</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p> Debit Voucher</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p> Credit Voucher</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p> Payment </p>
                                        <i class="fas fa-angle-left right" style="color:#3fff00"></i>
                                    </a>
                                    <ul class="nav nav-treeview icon-left-padding">
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p> Suppliers Payment</p>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="nav nav-treeview icon-left-padding">
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="nav-icon fa-solid fa-arrow-right" style="color:#3fff00"></i>
                                                <p> Sales Payment</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p> Profit and Loss Account</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item {{request()->is('all-bank','add-bank','edit-bank/*','all-deposit','add-deposit','edit-deposit/*','all-withdraw','add-withdraw','edit-withdraw/*')? 'menu-is-opening menu-open active':''}}">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p> Banks </p>
                                        <i class="fas fa-angle-left right" style="color:#3fff00"></i>
                                    </a>
                                    <ul class="nav nav-treeview icon-left-padding">
                                        <li class="nav-item">
                                            <a href="{{route('all.bank')}}" class="nav-link {{request()->is('all-bank','add-bank','edit-bank/*')?'active':''}}">
                                                <i class="nav-icon fa-solid fa-arrow-right" style="color:#3fff00"></i>
                                                <p> Bank Name</p>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="nav nav-treeview icon-left-padding">
                                        <li class="nav-item">
                                            <a href="{{route('all.deposit')}}" class="nav-link {{request()->is('all-deposit','add-deposit','edit-deposit/*')?'active':''}}">
                                                <i class="nav-icon fa-solid fa-arrow-right" style="color:#3fff00"></i>
                                                <p> Deposit</p>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="nav nav-treeview icon-left-padding">
                                        <li class="nav-item">
                                            <a href="{{route('all.withdraw')}}" class="nav-link {{request()->is('all-withdraw','add-withdraw','edit-withdraw/*')?'active':''}}">
                                                <i class="nav-icon fa-solid fa-arrow-right" style="color:#3fff00"></i>
                                                <p> Withdraw</p>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="nav nav-treeview icon-left-padding">
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="nav-icon fa-solid fa-arrow-right" style="color:#3fff00"></i>
                                                <p> Bank Balance</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item {{(request()->is('dept-list')) ||(request()->is('add-Department'))||(request()->is('dept-edit/*'))||(request()->is('add-Designation'))||(request()->is('designation-list'))||(request()->is('designation-edit/*'))||(request()->is('add-Employee'))||(request()->is('Employee-list'))||(request()->is('add-Transfer'))||(request()->is('Transfer-list'))||(request()->is('Transfer-edit/*'))||(request()->is('add-Resignation'))||(request()->is('Resignation-list'))||(request()->is('Resignation-edit/*'))||(request()->is('add-Promotion'))||(request()->is('Promotion-list'))||(request()->is('Promotion-edit/*'))||(request()->is('add-Complaint'))||(request()->is('Complaint-list'))||(request()->is('Complaint-edit/*'))||(request()->is('add-Termination'))||(request()->is('Termination-list'))||(request()->is('Termination-edit/*'))||(request()->is('employee-leave-balance-list'))||(request()->is('add-Holiday'))||(request()->is('Holiday-list'))||(request()->is('holiday-edit/*'))||(request()->is('add-LeaveType'))||(request()->is('LeaveType-list'))||(request()->is('LeaveType-edit/*'))||(request()->is('add-LeavePurpose'))||(request()->is('LeavePurpose-list'))||(request()->is('LeavePurpose-edit/*'))||(request()->is('add-payrollType'))||(request()->is('payrollType-list'))||(request()->is('payrollType-edit/*'))||(request()->is('add-applyLeave'))||(request()->is('applyLeave-list'))||(request()->is('employeeLeave-list'))||(request()->is('applyLeave-edit/*'))||(request()->is('add-payrollGenerate'))||(request()->is('payrollGenerate-list'))||(request()->is('payrollGenerate-edit/*'))||(request()->is('add-generatePayslip'))||(request()->is('add-grantloan'))||(request()->is('grantloan-loan-list'))||(request()->is('grantloan-edit/*'))||(request()->is('add-shift'))||(request()->is('shift-list'))||(request()->is('shift-edit/*'))||(request()->is('Employee-Info/*'))||(request()->is('Employee-Image/*'))||(request()->is('Employee-Immigration/*'))||(request()->is('Employee-Econtact/*'))||(request()->is('Employee-social/*'))||(request()->is('Employee-document/*'))||(request()->is('Employee-qualification/*'))||(request()->is('Employee-experience/*'))||(request()->is('Employee-Employee-bank/*'))||(request()->is('Employee-contract/*'))||(request()->is('Employee-leave/*'))||(request()->is('Employee-shift/*'))||(request()->is('Employee-location/*'))||(request()->is('Employee-Password/*'))||(request()->is('add-advance-salary'))||(request()->is('advance-salary-list'))||(request()->is('advance-salary-edit/*'))||(request()->is('add-shift-schedule'))||(request()->is('shift-schedule-list'))||(request()->is('shift-schedule-edit/*'))||(request()->is('add-default-off-day'))||(request()->is('default-off-day-list'))||(request()->is('default-off-day-edit/*')) ? 'menu-is-opening menu-open active':''}}">
                            <a href="#" class="nav-link {{(request()->is('dept-list')) ||(request()->is('add-Department'))||(request()->is('dept-edit/*'))||(request()->is('add-Designation'))||(request()->is('designation-list'))||(request()->is('designation-edit/*'))||(request()->is('add-Employee'))||(request()->is('Employee-list'))||(request()->is('add-Transfer'))||(request()->is('Transfer-list'))||(request()->is('Transfer-edit/*'))||(request()->is('add-Resignation'))||(request()->is('Resignation-list'))||(request()->is('Resignation-edit/*'))||(request()->is('add-Promotion'))||(request()->is('Promotion-list'))||(request()->is('Promotion-edit/*'))||(request()->is('add-Complaint'))||(request()->is('Complaint-list'))||(request()->is('Complaint-edit/*'))||(request()->is('add-Termination'))||(request()->is('Termination-list'))||(request()->is('Termination-edit/*'))||(request()->is('employee-leave-balance-list'))||(request()->is('add-Holiday'))||(request()->is('Holiday-list'))||(request()->is('holiday-edit/*'))||(request()->is('add-LeaveType'))||(request()->is('LeaveType-list'))||(request()->is('LeaveType-edit/*'))||(request()->is('add-LeavePurpose'))||(request()->is('LeavePurpose-list'))||(request()->is('LeavePurpose-edit/*'))||(request()->is('add-payrollType'))||(request()->is('payrollType-list'))||(request()->is('payrollType-edit/*'))||(request()->is('add-applyLeave'))||(request()->is('applyLeave-list'))||(request()->is('employeeLeave-list'))||(request()->is('applyLeave-edit/*'))||(request()->is('add-payrollGenerate'))||(request()->is('payrollGenerate-list'))||(request()->is('payrollGenerate-edit/*'))||(request()->is('add-generatePayslip'))||(request()->is('add-grantloan'))||(request()->is('grantloan-loan-list'))||(request()->is('grantloan-edit/*'))||(request()->is('add-shift'))||(request()->is('shift-list'))||(request()->is('shift-edit/*'))||(request()->is('Employee-Info/*'))||(request()->is('Employee-Image/*'))||(request()->is('Employee-Immigration/*'))||(request()->is('Employee-Econtact/*'))||(request()->is('Employee-social/*'))||(request()->is('Employee-document/*'))||(request()->is('Employee-qualification/*'))||(request()->is('Employee-experience/*'))||(request()->is('Employee-Employee-bank/*'))||(request()->is('Employee-contract/*'))||(request()->is('Employee-leave/*'))||(request()->is('Employee-shift/*'))||(request()->is('Employee-location/*'))||(request()->is('Employee-Password/*'))||(request()->is('add-advance-salary'))||(request()->is('advance-salary-list'))||(request()->is('advance-salary-edit/*'))||(request()->is('add-advance-salary'))||(request()->is('advance-salary-list'))||(request()->is('advance-salary-edit/*'))||(request()->is('add-shift-schedule'))||(request()->is('shift-schedule-list'))||(request()->is('shift-schedule-edit/*'))||(request()->is('add-default-off-day'))||(request()->is('default-off-day-list'))||(request()->is('default-off-day-edit/*')) ? 'active':''}}">
                                <!-- <i class="nav-icon fas fa-copy"></i> -->
                                <i class="nav-icon fa-solid fa-person-dress-burst" style="color:#3fff00"></i>
                                <p>
                                    HRM
                                    <i class="fas fa-angle-left right" style="color:#3fff00"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('deptList') }}" class="nav-link {{ request()->is('dept-list')||(request()->is('add-Department'))||(request()->is('dept-edit/*')) ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Department</p>
                                    </a>
                                </li>
                            </ul>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('designationList') }}" class="nav-link {{(request()->is('add-Designation'))||(request()->is('designation-list'))||(request()->is('designation-edit/*')) ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Designation</p>
                                    </a>
                                </li>
                            </ul>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('empList') }}" class="nav-link {{(request()->is('add-Employee'))||(request()->is('Employee-list'))||(request()->is('Employee-Info/*'))||(request()->is('Employee-Image/*'))||(request()->is('Employee-Immigration/*'))||(request()->is('Employee-Econtact/*'))||(request()->is('Employee-social/*'))||(request()->is('Employee-document/*'))||(request()->is('Employee-qualification/*'))||(request()->is('Employee-experience/*'))||(request()->is('Employee-Employee-bank/*'))||(request()->is('Employee-contract/*'))||(request()->is('Employee-leave/*'))||(request()->is('Employee-shift/*'))||(request()->is('Employee-location/*'))||(request()->is('Employee-Password/*')) ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Employee</p>
                                    </a>
                                </li>
                            </ul>
                            <!--   <ul class="nav nav-treeview">
                            <li class="nav-item {{(request()->is('add-shift'))||(request()->is('shift-list'))||(request()->is('shift-edit/*'))? 'menu-is-opening menu-open active':''}}">
                                <a href="{{route('ShiftList')}}" class="nav-link {{(request()->is('add-shift'))||(request()->is('shift-list'))||(request()->is('shift-edit/*'))? 'active':''}}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Shift</p>
                                </a>
                            </li>
                        </ul>-->
                            <ul class="nav nav-treeview">
                                <li class="nav-item {{(request()->is('add-shift'))||(request()->is('shift-list'))||(request()->is('shift-edit/*'))||(request()->is('add-shift-schedule'))||(request()->is('shift-schedule-list'))||(request()->is('shift-schedule-edit/*'))||(request()->is('add-default-off-day'))||(request()->is('default-off-day-list'))||(request()->is('default-off-day-edit/*'))? 'menu-is-opening menu-open active':''}}">
                                    <a href="#" class="nav-link {{(request()->is('add-shift'))||(request()->is('shift-list'))||(request()->is('shift-edit/*'))||(request()->is('add-shift-schedule'))||(request()->is('shift-schedule-list'))||(request()->is('shift-schedule-edit/*'))||(request()->is('add-default-off-day'))||(request()->is('default-off-day-list'))||(request()->is('default-off-day-edit/*'))? 'active':''}}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Shift</p>
                                        <i class="fas fa-angle-left right" style="color:#fa79ba"></i>
                                    </a>
                                    <ul class="nav nav-treeview icon-left-padding">
                                        <li class="nav-item">
                                            <a href="{{route('ShiftList')}}" class="nav-link {{(request()->is('add-shift'))||(request()->is('shift-list'))||(request()->is('shift-edit/*'))? 'active':''}}">
                                                <i class="nav-icon fa-solid fa-arrow-right" style="color:#3fff00"></i>
                                                <p>Shift Name</p>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="nav nav-treeview icon-left-padding">
                                        <li class="nav-item">
                                            <a href="{{route('ShiftScheduleList')}}" class="nav-link {{(request()->is('add-shift-schedule'))||(request()->is('shift-schedule-list'))||(request()->is('shift-schedule-edit/*'))? 'active':''}}">
                                                <i class="nav-icon fa-solid fa-arrow-right" style="color:#3fff00"></i>
                                                <p>Shift Schedule</p>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="nav nav-treeview icon-left-padding">
                                        <li class="nav-item">
                                            <a href="{{route('offDayList')}}" class="nav-link {{(request()->is('add-default-off-day'))||(request()->is('default-off-day-list'))||(request()->is('default-off-day-edit/*'))? 'active':''}}">
                                                <i class="nav-icon fa-solid fa-arrow-right" style="color:#3fff00"></i>
                                                <p>Default Off Day</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Attendance</p>
                                        <i class="fas fa-angle-left right" style="color:#fa79ba"></i>
                                    </a>
                                    <ul class="nav nav-treeview icon-left-padding">
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="nav-icon fa-solid fa-arrow-right" style="color:#3fff00"></i>
                                                <p> Bank Name</p>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="nav nav-treeview icon-left-padding">
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="nav-icon fa-solid fa-arrow-right" style="color:#3fff00"></i>
                                                <p> Bank Name </p>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="nav nav-treeview icon-left-padding">
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="nav-icon fa-solid fa-arrow-right" style="color:#3fff00"></i>
                                                <p> Bank Name </p>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="nav nav-treeview icon-left-padding">
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="nav-icon fa-solid fa-arrow-right" style="color:#3fff00"></i>
                                                <p> Bank Name </p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item {{(request()->is('add-payrollType'))||(request()->is('payrollType-list'))||(request()->is('payrollType-edit/*'))||(request()->is('add-payrollGenerate'))||(request()->is('payrollGenerate-list'))||(request()->is('payrollGenerate-edit/*'))||(request()->is('add-generatePayslip'))||(request()->is('add-advance-salary'))||(request()->is('advance-salary-list'))||(request()->is('advance-salary-edit/*')) ? 'menu-is-opening menu-open active':''}}">
                                    <a href="#" class="nav-link {{(request()->is('add-payrollType'))||(request()->is('payrollType-list'))||(request()->is('payrollType-edit/*'))||(request()->is('add-payrollGenerate'))||(request()->is('payrollGenerate-list'))||(request()->is('payrollGenerate-edit/*'))||(request()->is('add-generatePayslip'))||(request()->is('add-advance-salary'))||(request()->is('advance-salary-list'))||(request()->is('advance-salary-edit/*')) ?'active' : ''}}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Payroll</i></p>
                                        <i class="fas fa-angle-left right" style="color:#fa79ba"></i>
                                    </a>
                                    <ul class="nav nav-treeview icon-left-padding">
                                        <li class="nav-item">
                                            <a href="{{route('PayrollTypeList')}}" class="nav-link {{ (request()->is('add-payrollType'))||(request()->is('payrollType-list'))||(request()->is('payrollType-edit/*')) ? 'active' : '' }}">
                                                <i class="nav-icon fa-solid fa-arrow-right" style="color:#3fff00"></i>
                                                <p> Payroll Type </i></p>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="nav nav-treeview icon-left-padding">
                                        <li class="nav-item">
                                            <a href="{{route('PayrollGenerateList')}}" class="nav-link {{(request()->is('add-payrollGenerate'))||(request()->is('payrollGenerate-list'))||(request()->is('payrollGenerate-edit/*'))? 'active' : '' }}">
                                                <i class="nav-icon fa-solid fa-arrow-right" style="color:#3fff00"></i>
                                                <p> Payroll Generate </i></p>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="nav nav-treeview icon-left-padding">
                                        <li class="nav-item">
                                            <a href="{{route('GeneratePayslip')}}" class="nav-link {{(request()->is('add-generatePayslip')) ?'active' : ''}}">
                                                <i class="nav-icon fa-solid fa-arrow-right" style="color:#3fff00"></i>
                                                <p> Generate Payslip </i></p>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="nav nav-treeview icon-left-padding">
                                        <li class="nav-item">
                                            <a href="{{route('advanceSalaryList')}}" class="nav-link {{(request()->is('add-advance-salary'))||(request()->is('advance-salary-list'))||(request()->is('advance-salary-edit/*')) ? 'active' : ''}}">
                                                <i class="nav-icon fa-solid fa-arrow-right" style="color:#3fff00"></i>
                                                <p> Salary Advance </i></p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item {{(request()->is('add-Holiday'))||(request()->is('Holiday-list'))||(request()->is('holiday-edit/*'))||(request()->is('add-LeaveType'))||(request()->is('LeaveType-list'))||(request()->is('LeaveType-edit/*'))||(request()->is('add-LeavePurpose'))||(request()->is('LeavePurpose-list'))||(request()->is('LeavePurpose-edit/*'))||(request()->is('add-applyLeave'))||(request()->is('applyLeave-list'))||(request()->is('applyLeave-edit/*'))||(request()->is('employeeLeave-list'))||(request()->is('employee-leave-balance-list')) ? 'menu-is-opening menu-open active':''}}">
                                    <a href="#" class="nav-link {{(request()->is('add-Holiday'))||(request()->is('Holiday-list'))||(request()->is('holiday-edit/*'))||(request()->is('add-LeaveType'))||(request()->is('LeaveType-list'))||(request()->is('LeaveType-edit/*'))||(request()->is('add-LeavePurpose'))||(request()->is('LeavePurpose-list'))||(request()->is('LeavePurpose-edit/*'))||(request()->is('add-applyLeave'))||(request()->is('applyLeave-list'))||(request()->is('applyLeave-edit/*'))||(request()->is('employeeLeave-list'))||(request()->is('employee-leave-balance-list')) ? 'active':''}}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Leaves</i></p>
                                        <i class="fas fa-angle-left right" style="color:#fa79ba"></i>
                                    </a>
                                    <ul class="nav nav-treeview icon-left-padding">
                                        <li class="nav-item">
                                            <a href="{{route('holidayList')}}" class="nav-link {{(request()->is('add-Holiday'))||(request()->is('Holiday-list'))||(request()->is('holiday-edit/*'))? 'active':''}}">
                                                <i class="nav-icon fa-solid fa-arrow-right" style="color:#3fff00"></i>
                                                <p>Holiday</i></p>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="nav nav-treeview icon-left-padding">
                                        <li class="nav-item">
                                            <a href="{{route('LeaveTypeList')}}" class="nav-link {{(request()->is('add-LeaveType'))||(request()->is('LeaveType-list'))||(request()->is('LeaveType-edit/*'))? 'active':''}}">
                                                <i class="nav-icon fa-solid fa-arrow-right" style="color:#3fff00"></i>
                                                <p>Leave Type</i></p>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="nav nav-treeview icon-left-padding">
                                        <li class="nav-item">
                                            <a href="{{route('LeavePurposeList')}}" class="nav-link {{(request()->is('add-LeavePurpose'))||(request()->is('LeavePurpose-list'))||(request()->is('LeavePurpose-edit/*'))? 'active':''}}">
                                                <i class="nav-icon fa-solid fa-arrow-right" style="color:#3fff00"></i>
                                                <p>Leave Purpose</i></p>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="nav nav-treeview icon-left-padding">
                                        <li class="nav-item">
                                            <a href="{{route('ApplyLeaveList')}}" class="nav-link {{(request()->is('add-applyLeave'))||(request()->is('applyLeave-list'))||(request()->is('applyLeave-edit/*'))? 'active':''}}">
                                                <i class="nav-icon fa-solid fa-arrow-right" style="color:#3fff00"></i>
                                                <p>Apply Leave </i></p>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="nav nav-treeview icon-left-padding">
                                        <li class="nav-item">
                                            <a href="{{route('EmployeeLeaveList')}}" class="nav-link {{(request()->is('employeeLeave-list'))? 'active':''}}">
                                                <i class="nav-icon fa-solid fa-arrow-right" style="color:#3fff00"></i>
                                                <p>Employee Leave List</i></p>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="nav nav-treeview icon-left-padding">
                                        <li class="nav-item">
                                            <a href="{{route('employeeLeaveBalance')}}" class="nav-link {{(request()->is('employee-leave-balance-list'))? 'active':''}}">
                                                <i class="nav-icon fa-solid fa-arrow-right" style="color:#3fff00"></i>
                                                <p>Employee Leave Balance</i></p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Recruitment</i></p>
                                        <i class="fas fa-angle-left right" style="color:#fa79ba"></i>
                                    </a>
                                    <ul class="nav nav-treeview icon-left-padding">
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="nav-icon fa-solid fa-arrow-right" style="color:#3fff00"></i>
                                                <p> Bank Name </i></p>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="nav nav-treeview icon-left-padding">
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="nav-icon fa-solid fa-arrow-right" style="color:#3fff00"></i>
                                                <p> Bank Name </i></p>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="nav nav-treeview icon-left-padding">
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="nav-icon fa-solid fa-arrow-right" style="color:#3fff00"></i>
                                                <p> Bank Name </i></p>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="nav nav-treeview icon-left-padding">
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="nav-icon fa-solid fa-arrow-right" style="color:#3fff00"></i>
                                                <p> Bank Name </i></p>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="nav nav-treeview icon-left-padding">
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="nav-icon fa-solid fa-arrow-right" style="color:#3fff00"></i>
                                                <p> Bank Name </i></p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item {{(request()->is('add-grantloan'))||(request()->is('grantloan-loan-list'))||(request()->is('grantloan-edit/*'))||(request()->is('add-loanInstallment'))||(request()->is('loanInstallment-list'))||(request()->is('loanInstallment-edit/*'))? 'menu-is-opening menu-open active':''}}">
                                    <a href="#" class="nav-link {{(request()->is('add-grantloan'))||(request()->is('grantloan-loan-list'))||(request()->is('grantloan-edit/*'))||(request()->is('add-loanInstallment'))||(request()->is('loanInstallment-list'))||(request()->is('loanInstallment-edit/*'))? 'active':''}}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Loans</i></p>
                                        <i class="fas fa-angle-left right" style="color:#fa79ba"></i>
                                    </a>
                                    <ul class="nav nav-treeview icon-left-padding">
                                        <li class="nav-item">
                                            <a href="{{route('GrantLoanList')}}" class="nav-link {{(request()->is('add-grantloan'))||(request()->is('grantloan-loan-list'))||(request()->is('grantloan-edit/*'))? 'active':''}}">
                                                <i class="nav-icon fa-solid fa-arrow-right" style="color:#3fff00"></i>
                                                <p>Grant Loan</i></p>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="nav nav-treeview icon-left-padding">
                                        <li class="nav-item">
                                            <a href="{{route('LoanInstallmentList')}}" class="nav-link {{(request()->is('add-loanInstallment'))||(request()->is('loanInstallment-list'))||(request()->is('loanInstallment-edit/*'))? 'active':''}}">
                                                <i class="nav-icon fa-solid fa-arrow-right" style="color:#3fff00"></i>
                                                <p>Loan Installment</i></p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Awards</i></p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item {{(request()->is('add-Transfer'))||(request()->is('Transfer-list'))||(request()->is('Transfer-edit/*'))||(request()->is('add-Resignation'))||(request()->is('Resignation-list'))||(request()->is('Resignation-edit/*'))||(request()->is('add-Promotion'))||(request()->is('Promotion-list'))||(request()->is('Promotion-edit/*'))||(request()->is('add-Complaint'))||(request()->is('Complaint-list'))||(request()->is('Complaint-edit/*'))||(request()->is('add-Termination'))||(request()->is('Termination-list'))||(request()->is('Termination-edit/*')) ? 'menu-is-opening menu-open active':''}}">
                                    <a href="#" class="nav-link nav-item {{(request()->is('add-Transfer'))||(request()->is('Transfer-list'))||(request()->is('Transfer-edit/*'))||(request()->is('add-Resignation'))||(request()->is('Resignation-list'))||(request()->is('Resignation-edit/*'))||(request()->is('add-Promotion'))||(request()->is('Promotion-list'))||(request()->is('Promotion-edit/*'))||(request()->is('add-Complaint'))||(request()->is('Complaint-list'))||(request()->is('Complaint-edit/*'))||(request()->is('add-Termination'))||(request()->is('Termination-list'))||(request()->is('Termination-edit/*')) ?'active':''}}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Others</i></p>
                                        <i class="fas fa-angle-left right" style="color:#fa79ba"></i>
                                    </a>
                                    <ul class="nav nav-treeview icon-left-padding">
                                        <li class="nav-item">
                                            <a href="{{route('transferList')}}" class="nav-link {{(request()->is('add-Transfer'))||(request()->is('Transfer-list'))||(request()->is('Transfer-edit/*')) ?'active':''}}">
                                                <i class="nav-icon fa-solid fa-arrow-right" style="color:#3fff00"></i>
                                                <p> Transfers </i></p>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="nav nav-treeview icon-left-padding">
                                        <li class="nav-item">
                                            <a href="{{route('ResignationList')}}" class="nav-link {{(request()->is('add-Resignation'))||(request()->is('Resignation-list'))||(request()->is('Resignation-edit/*'))?'active':''}}">
                                                <i class="nav-icon fa-solid fa-arrow-right" style="color:#3fff00"></i>
                                                <p> Resignation</i></p>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="nav nav-treeview icon-left-padding">
                                        <li class="nav-item">
                                            <a href="{{route('promotionList')}}" class="nav-link {{(request()->is('add-Promotion'))||(request()->is('Promotion-list'))||(request()->is('Promotion-edit/*'))?'active':''}}">
                                                <i class="nav-icon fa-solid fa-arrow-right" style="color:#3fff00"></i>
                                                <p> Promotions </i></p>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="nav nav-treeview icon-left-padding">
                                        <li class="nav-item">
                                            <a href="{{route('ComplaintsList')}}" class="nav-link {{(request()->is('add-Complaint'))||(request()->is('Complaint-list'))||(request()->is('Complaint-edit/*'))?'active':''}}">
                                                <i class="nav-icon fa-solid fa-arrow-right" style="color:#3fff00"></i>
                                                <p> Complaints </i></p>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="nav nav-treeview icon-left-padding">
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="nav-icon fa-solid fa-arrow-right" style="color:#3fff00"></i>
                                                <p>Warnings </i></p>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="nav nav-treeview icon-left-padding">
                                        <li class="nav-item">
                                            <a href="{{route('TerminationList')}}" class="nav-link {{(request()->is('Termination-list'))||(request()->is('Termination-edit/*'))?'active':''}}">
                                                <i class="nav-icon fa-solid fa-arrow-right" style="color:#3fff00"></i>
                                                <p> Terminations </i></p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <!-- <i class="nav-icon fas fa-copy"></i> -->
                                <i class="nav-icon fa-regular fa-file" style="color:#fa79ba"></i>
                                <p>
                                    REPORT
                                    <i class="fas fa-angle-left right" style="color:#fa79ba"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Sale Payment Report </i></p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Purchase Report </p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Leeds Report</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Meeting Report </p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Clients Report </p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Project Report</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Profit & Loss Report</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Expense Report</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Due Report</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Transaction Report</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Employee Report</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Attendance Report</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Leave Report</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Grant Loan Report</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Loan Installment Report</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Payroll Report</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Sales Report</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Sale Payment Report</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <!-- <i class="nav-icon fas fa-copy"></i> -->
                                <i class="nav-icon fa-solid fa-people-arrows" style="color:#3fff00"></i>
                                <p>
                                    FOLLOW UP
                                    <i class="fas fa-angle-left right" style="color:#3fff00"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>SMS</i></p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Email</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Whatsapp</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item {{(request()->is('add-user'))||(request()->is('user-list'))||(request()->is('user-edit/*'))||(request()->is('add-menu'))||(request()->is('menu-list'))||(request()->is('menu-edit/*'))||(request()->is('add-submenu'))||(request()->is('sub-menu-list'))||(request()->is('submenu-edit/*'))||(request()->is('add-role'))||(request()->is('role-list'))||(request()->is('role-edit/*'))||(request()->is('menu-permission'))? 'menu-is-opening menu-open active':''}}" id="{{ (request()->is('user-list'))? 'demoser':'' }}">
                            <a href="#" class="nav-link {{(request()->is('add-user'))||(request()->is('user-list'))||(request()->is('user-edit/*'))||(request()->is('add-menu'))||(request()->is('menu-list'))||(request()->is('menu-edit/*'))||(request()->is('add-submenu'))||(request()->is('sub-menu-list'))||(request()->is('submenu-edit/*'))||(request()->is('add-role'))||(request()->is('role-list'))||(request()->is('role-edit/*'))||(request()->is('menu-permission'))? 'active':''}}">
                                <!-- <i class="nav-icon fas fa-copy"></i> -->
                                <i class="nav-icon fa-solid fa-users" style="color:#fa79ba"></i>
                                <p>
                                    USER MANAGEMENT
                                    <i class="fas fa-angle-left right" style="color:#fa79ba"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('roleList') }}" class="nav-link {{(request()->is('add-role'))||(request()->is('role-list'))||(request()->is('role-edit/*'))? 'active':''}}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Role</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('userList') }}" class="nav-link {{(request()->is('add-user'))||(request()->is('user-list'))||(request()->is('user-edit/*'))? 'active':''}}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>User</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('menuList') }}" class="nav-link {{(request()->is('add-menu'))||(request()->is('menu-list'))||(request()->is('menu-edit/*'))? 'active':''}}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Menu</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('SubmenuList') }}" class="nav-link {{(request()->is('add-submenu'))||(request()->is('sub-menu-list'))||(request()->is('submenu-edit/*'))? 'active':''}}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Sub Menu</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('menuPermission') }}" class="nav-link {{(request()->is('menu-permission'))? 'active':''}}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Menu Permission</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Manage Profile</p>
                                        <i class="fas fa-angle-left right" style="color:#fa79ba"></i>
                                    </a>
                                    <ul class="nav nav-treeview icon-left-padding">
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="nav-icon fa-solid fa-arrow-right" style="color:#3fff00"></i>
                                                <p>Your Profile </p>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="nav nav-treeview icon-left-padding">
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="nav-icon fa-solid fa-arrow-right" style="color:#3fff00"></i>
                                                <p> Change Password </p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <!-- <i class="nav-icon fas fa-copy"></i> -->
                                <i class="nav-icon fa-solid fa-user-astronaut" style="color:#3fff00"></i>
                                <p>
                                    COMMISSION MANAGEMENT
                                    <i class="fas fa-angle-left right" style="color:#3fff00"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Sale Commission</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Join Commission</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="mb-5 nav-item {{(request()->is('allCompanyInfo')) || (request()->is('add-company-info')) || (request()->is('business-branch')) ? 'menu-is-opening menu-open active':'' }}" id="{{ (request()->is('allCompanyInfo'))||(request()->is('add-company-info')) || (request()->is('business-branch'))? 'demoser':'' }}">
                            <a href="{{ route('allCompanyInfo')}}"  class="nav-link {{(request()->is('allCompanyInfo')) || (request()->is('add-company-info')) || (request()->is('business-branch')) ? 'menu-is-opening menu-open  active demoser':'' }}" >
                                <!-- <i class="nav-icon fas fa-copy"></i> -->
                                <i class="nav-icon fa-solid fa-gear" style="color:#fa79ba"></i>
                                <p>
                                    Settings
                                    <i class="fas fa-angle-left right" style="color:#3fff00"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" >
                                <li class="nav-item {{  request()->routeIs('allCompanyInfo') ? 'active' : '' }}">
                                    <a href="{{ route('allCompanyInfo')}}" class="nav-link {{(request()->is('allCompanyInfo')) ? 'active':''}}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Company Info</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('add-company-info') }}"
                                       class="nav-link {{ request()->is('add-company-info') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Company</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('business-branch') }}" class="nav-link {{ request()->is('business-branch')?'active':'' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Business Branch</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        {{--                    @endif--}}
                        {{--                    <li> --}}
                        {{--                        <a class="dropdown-item text-primary" href="{{ route('updateAdminPassword')}}"> --}}
                        {{--                            <i class="fa-solid fa-user me-2" style="color:#ffc107"></i> --}}
                        {{--                            Change Password --}}
                        {{--                        </a> --}}
                        {{--                    </li> --}}
                    @endif
                    @if (auth()->user()->roleId === 2)

                        @foreach ($menuPermissions as $menuPermission)

                            @if ($menuPermission->userId == Auth()->user()->id)

                                @foreach (json_decode($menuPermission->menuIds) as $menus)
                                    <li class="nav-item">
                                        <a href="#" class="nav-link"> {{ $menus->menuName }}
                                            <i class="fas fa-angle-left right" style="color:#fa79ba"></i>
                                        </a>
                                        <ul
                                            class="nav nav-treeview ">
                                            @foreach (json_decode($menuPermission->subMenuIds) as $submenus)
                                                @if ($menus->id == $submenus->menuId)
                                                    <li class="nav-item ">
                                                        <a href="#" class="nav-link">
                                                            {{ $submenus->subMenuName }}
                                                            <i class="far fa-circle nav-icon right"></i>
                                                        </a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </li>
                                @endforeach
                            @endif
                        @endforeach
                    @endif
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
