<x-app-layout>
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <!-- [ breadcrumb ] start -->
            <x-breadcrumb title="Dashboard" />
            <!-- [ breadcrumb ] end -->
            <!-- [ Main Content ] start -->
            <div class="row">

                <div class="col-md-6 col-xl-3">
                    <div class="card bg-c-blue order-card">
                        <div class="card-body">
                            <h6 class="text-white">Orders Received</h6>
                            <h2 class="text-end text-white"><i class="feather icon-shopping-cart float-start"></i><span>486</span></h2>
                            <p class="m-b-0">Completed Orders<span class="float-end">351</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="card bg-c-green order-card">
                        <div class="card-body">
                            <h6 class="text-white">Total Sales</h6>
                            <h2 class="text-end text-white"><i class="feather icon-tag float-start"></i><span>1641</span>
                            </h2>
                            <p class="m-b-0">This Month<span class="float-end">213</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="card bg-c-yellow order-card">
                        <div class="card-body">
                            <h6 class="text-white">Revenue</h6>
                            <h2 class="text-end text-white"><i
                                    class="feather icon-repeat float-start"></i><span>$42,562</span></h2>
                            <p class="m-b-0">This Month<span class="float-end">$5,032</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="card bg-c-red order-card">
                        <div class="card-body">
                            <h6 class="text-white">Total Profit</h6>
                            <h2 class="text-end text-white"><i
                                    class="feather icon-award float-start"></i><span>$9,562</span></h2>
                            <p class="m-b-0">This Month<span class="float-end">$542</span></p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card prod-p-card bg-c-red">
                        <div class="card-body">
                            <div class="row align-items-center m-b-0">
                                <div class="col">
                                    <h6 class="m-b-5 text-white">Total Profit</h6>
                                    <h3 class="m-b-0 text-white">$1,783</h3>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-money-bill-alt text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card prod-p-card bg-c-blue">
                        <div class="card-body">
                            <div class="row align-items-center m-b-0">
                                <div class="col">
                                    <h6 class="m-b-5 text-white">Total Orders</h6>
                                    <h3 class="m-b-0 text-white">15,830</h3>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-database text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card prod-p-card bg-c-green">
                        <div class="card-body">
                            <div class="row align-items-center m-b-0">
                                <div class="col">
                                    <h6 class="m-b-5 text-white">Average Price</h6>
                                    <h3 class="m-b-0 text-white">$6,780</h3>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-dollar-sign text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card prod-p-card bg-c-yellow">
                        <div class="card-body">
                            <div class="row align-items-center m-b-0">
                                <div class="col">
                                    <h6 class="m-b-5 text-white">Product Sold</h6>
                                    <h3 class="m-b-0 text-white">6,784</h3>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-tags text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- product profit end -->

                <div class="col-xl-12 col-md-12">
                    <div class="card table-card">
                        <div class="card-header">
                            <h5>New Products</h5>
                            <div class="card-header-right">
                                <div class="btn-group card-option">
                                    <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="feather icon-more-horizontal"></i>
                                    </button>
                                    <ul class="list-unstyled card-option dropdown-menu dropdown-menu-end">
                                        <li class="dropdown-item full-card"><a href="#"><span><i class="feather icon-maximize"></i> maximize</span><span style="display:none"><i class="feather icon-minimize"></i> Restore</span></a></li>
                                        <li class="dropdown-item minimize-card"><a href="#"><span><i class="feather icon-minus"></i> collapse</span><span style="display:none"><i class="feather icon-plus"></i> expand</span></a></li>
                                        <li class="dropdown-item reload-card"><a href="#"><i class="feather icon-refresh-cw"></i> reload</a></li>
                                        <li class="dropdown-item close-card"><a href="#"><i class="feather icon-trash"></i> remove</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--<div class="pro-scroll " style="height:345px;position:relative;">-->
                        <div class="feed-scroll" style="height:345px;position:relative;">
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-hover m-b-0">
                                        <thead>
                                            <tr>
                                                <th>Product Name</th>
                                                <th>Image</th>
                                                <th>Status</th>
                                                <th>Price</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>HeadPhone</td>
                                                <td><img src="../assets/images/widget/p1.jpg" alt="" class="img-20"></td>
                                                <td>
                                                    <div><label class="badge bg-warning">Pending</label></div>
                                                </td>
                                                <td>$10</td>
                                                <td><a href="#"><i class="icon feather icon-edit f-16  text-c-green"></i></a><a href="#"><i class="feather icon-trash-2 ms-3 f-16 text-c-red"></i></a></td>
                                            </tr>
                                            <tr>
                                                <td>Iphone 6</td>
                                                <td><img src="../assets/images/widget/p2.jpg" alt="" class="img-20"></td>
                                                <td>
                                                    <div><label class="badge bg-danger">Cancel</label></div>
                                                </td>
                                                <td>$20</td>
                                                <td><a href="#"><i class="icon feather icon-edit f-16  text-c-green"></i></a><a href="#"><i class="feather icon-trash-2 ms-3 f-16 text-c-red"></i></a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    @push('scripts')
    <script src="{{asset('js/dashboard-sale.js')}}"></script>
    @endpush
</x-app-layout>
