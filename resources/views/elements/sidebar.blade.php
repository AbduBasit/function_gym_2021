<!--**********************************
            Sidebar start
***********************************-->

<div class="deznav">
    <div class="deznav-scroll">
        <ul class="metismenu" id="menu">
            <li><a class="ai-icon" href={{ url('dashboard') }} aria-expanded="false">
                    <i class="flaticon-381-networking"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-notepad"></i>
                    <span class="nav-text">Customers</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{!! url('/manage-customer') !!}">Manage Customers</a></li>
                    <li><a href="{{ url('/create-customer') }}">Add Customer</a></li>
                    <li><a href="{!! url('/pt-customer-details') !!}">Add PT Details</a></li>
                </ul>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="fa fa-user-md" aria-hidden="true"></i>
                    <span class="nav-text">Trainers</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="/create-trainer">Add Trainer</a></li>
                    <li><a href="{!! url('/manage-trainer') !!}">Manage Trainers</a></li>
                </ul>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                <i class="fa fa-user" aria-hidden="true"></i>
                <span class="nav-text">Users</span>
            </a>
            <ul aria-expanded="false">
                <li><a href="/create-user">Add User</a></li>
                <li><a href="{!! url('/manage-user') !!}">Manage User</a></li>
            </ul>
        </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="fa fa-money" aria-hidden="true"></i>
                    <span class="nav-text">Finance</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ url('/manage-invoice') }}">Sales / Invoices</a></li>
                    <li><a href="{{ url('/manage-expense') }}">Expenses Reports</a></li>
                    <li><a href="{{ url('/expense_category') }}">Manage Expense Categories</a></li>
                    <li><a href="{{ url('/trainer_payslip') }}">Trainer Pay Slip</a></li>
                    <li><a href="{{ url('/pnl_report') }}">Profit & Loss Report</a></li>
                    <li><a href="{{ url('/trainer_availability') }}">Trainer Availability</a></li>
                </ul>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-layer-1"></i>
                    <span class="nav-text">Activity</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href={{ url('manage-rules') }}>Manage Rules</a></li>
                    <li><a href="{!! url('/email-create') !!}">Compose Email </a></li>
                </ul>
            </li>
            {{-- <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i  class="flaticon-381-television"></i>
                    <span class="nav-text">Apps</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{!! url('/app-profile') !!}">Profile</a></li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Email</a>
                        <ul aria-expanded="false">
                            <li><a href="{!! url('/email-compose') !!}">Compose</a></li>
                            <li><a href="{!! url('/email-inbox') !!}">Inbox</a></li>
                            <li><a href="{!! url('/email-read') !!}">Read</a></li>
                        </ul>
                    </li>
                    <li><a href="{!! url('/app-calender') !!}">Calendar</a></li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Shop</a>
                        <ul aria-expanded="false">
                            <li><a href="{!! url('/ecom-product-grid') !!}">Product Grid</a></li>
                            <li><a href="{!! url('/ecom-product-list') !!}">Product List</a></li>
                            <li><a href="{!! url('/ecom-product-detail') !!}">Product Details</a></li>
                            <li><a href="{!! url('/ecom-product-order') !!}">Order</a></li>
                            <li><a href="{!! url('/ecom-checkout') !!}">Checkout</a></li>
                            <li><a href="{!! url('/ecom-invoice') !!}">Invoice</a></li>
                            <li><a href="{!! url('/ecom-customers') !!}">Customers</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i  class="flaticon-381-controls-3"></i>
                    <span class="nav-text">Charts</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{!! url('/chart-flot') !!}">Flot</a></li>
                    <li><a href="{!! url('/chart-morris') !!}">Morris</a></li>
                    <li><a href="{!! url('/chart-chartjs') !!}">Chartjs</a></li>
                    <li><a href="{!! url('/chart-chartist') !!}">Chartist</a></li>
                    <li><a href="{!! url('/chart-sparkline') !!}">Sparkline</a></li>
                    <li><a href="{!! url('/chart-peity') !!}">Peity</a></li>
                </ul>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i  class="flaticon-381-internet"></i>
                    <span class="nav-text">Bootstrap</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{!! url('/ui-accordion') !!}">Accordion</a></li>
                    <li><a href="{!! url('/ui-alert') !!}">Alert</a></li>
                    <li><a href="{!! url('/ui-badge') !!}">Badge</a></li>
                    <li><a href="{!! url('/ui-button') !!}">Button</a></li>
                    <li><a href="{!! url('/ui-modal') !!}">Modal</a></li>
                    <li><a href="{!! url('/ui-button-group') !!}">Button Group</a></li>
                    <li><a href="{!! url('/ui-list-group') !!}">List Group</a></li>
                    <li><a href="{!! url('/ui-media-object') !!}">Media Object</a></li>
                    <li><a href="{!! url('/ui-card') !!}">Cards</a></li>
                    <li><a href="{!! url('/ui-carousel') !!}">Carousel</a></li>
                    <li><a href="{!! url('/ui-dropdown') !!}">Dropdown</a></li>
                    <li><a href="{!! url('/ui-popover') !!}">Popover</a></li>
                    <li><a href="{!! url('/ui-progressbar') !!}">Progressbar</a></li>
                    <li><a href="{!! url('/ui-tab') !!}">Tab</a></li>
                    <li><a href="{!! url('/ui-typography') !!}">Typography</a></li>
                    <li><a href="{!! url('/ui-pagination') !!}">Pagination</a></li>
                    <li><a href="{!! url('/ui-grid') !!}">Grid</a></li>

                </ul>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i  class="flaticon-381-heart"></i>
                    <span class="nav-text">Plugins</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{!! url('/uc-select2') !!}">Select 2</a></li>
                    <li><a href="{!! url('/uc-nestable') !!}">Nestedable</a></li>
                    <li><a href="{!! url('/uc-noui-slider') !!}">Noui Slider</a></li>
                    <li><a href="{!! url('/uc-sweetalert') !!}">Sweet Alert</a></li>
                    <li><a href="{!! url('/uc-toastr') !!}">Toastr</a></li>
                    <li><a href="{!! url('/map-jqvmap') !!}">Jqv Map</a></li>
                </ul>
            </li>
            <li><a href="{!! url('/widget-basic') !!}" class="ai-icon" aria-expanded="false">
                    <i  class="flaticon-381-settings-2"></i>
                    <span class="nav-text">Widget</span>
                </a>
            </li>

            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i  class="flaticon-381-network"></i>
                    <span class="nav-text">Table</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{!! url('/table-bootstrap-basic') !!}">Bootstrap</a></li>
                    <li><a href="{!! url('/table-datatable-basic') !!}">Datatable</a></li>
                </ul>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i  class="flaticon-381-layer-1"></i>
                    <span class="nav-text">Pages</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{!! url('/page-register') !!}">Register</a></li>
                    <li><a href="{!! url('/page-login') !!}">Login</a></li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Error</a>
                        <ul aria-expanded="false">
                            <li><a href="{!! url('/page-error-400') !!}">Error 400</a></li>
                            <li><a href="{!! url('/page-error-403') !!}">Error 403</a></li>
                            <li><a href="{!! url('/page-error-404') !!}">Error 404</a></li>
                            <li><a href="{!! url('/page-error-500') !!}">Error 500</a></li>
                            <li><a href="{!! url('/page-error-503') !!}">Error 503</a></li>
                        </ul>
                    </li>
                    <li><a href="{!! url('/page-lock-screen') !!}">Lock Screen</a></li>
                </ul>
            </li> --}}
        </ul>
        {{-- <div class="drum-box">
            <img src="{{ asset('images/card/drump.png') }}" alt="">
            <p class="fs-18 font-w500 mb-4">Start Plan Your Workout</p>
            <a class="___class_+?44___" href="javascript:;">Check schedule
                <svg class="ml-3" width="6" height="12" viewBox="0 0 6 12" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 12L6 6L0 0" fill="#BCD7FF" />
                </svg>
            </a>
        </div>
        <div class="copyright">
            <p><strong>Fito Fitness Admin Dashboard</strong> ©All Rights Reserved</p>
            <p>by DexignZone</p>
        </div> --}}
    </div>
</div>
