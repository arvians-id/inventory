<?= $this->extend('main/admin/adminLayout/indexLayout') ?>
<?= $this->section('konten') ?>
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-themecolor">Dashboard 2</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard 2</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <!-- Column -->
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex p-10 no-block">
                            <div class="align-self-center display-6 m-r-20"><i class="text-success icon-Target-Market"></i></div>
                            <div class="align-slef-center">
                                <h2 class="m-b-0">2346 <small><i class="ti-angle-down text-danger"></i></small></h2>
                                <h6 class="text-muted m-b-0">Total Visits</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex p-10 no-block">
                            <div class="align-self-center display-6 m-r-20"><i class="text-info icon-Dollar-Sign"></i></div>
                            <div class="align-slef-center">
                                <h2 class="m-b-0">$8,759 <small><i class="ti-angle-up text-success"></i></small></h2>
                                <h6 class="text-muted m-b-0">Total Revenue</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex p-10 no-block">
                            <div class="align-self-center display-6 m-r-20"><i class="text-primary icon-Inbox-Forward"></i></div>
                            <div class="align-slef-center">
                                <h2 class="m-b-0">2,356 <small><i class="ti-angle-up text-success"></i></small></h2>
                                <h6 class="text-muted m-b-0">Emails Sent</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex p-10 no-block">
                            <div class="align-self-center display-6 m-r-20"><i class="text-danger icon-Contrast"></i></div>
                            <div class="align-slef-center">
                                <h2 class="m-b-0">38% <small><i class="ti-angle-down text-danger"></i></small></h2>
                                <h6 class="text-muted m-b-0">Bounce Rate</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
        </div>
        <div class="row">
            <!-- Column -->
            <div class="col-lg-8 col-md-12">
                <div class="card income-o-year">
                    <div class="card-body">
                        <div class="d-flex m-b-30 no-block">
                            <h5 class="card-title m-b-0 align-self-center">Income of the Year</h5>
                            <div class="ml-auto">
                                <ul class="list-inline font-12">
                                    <li><i class="fa fa-circle text-info"></i> Growth</li>
                                    <li><i class="fa fa-circle text-success"></i> Net</li>
                                </ul>
                            </div>
                        </div>
                        <div id="income-year" style="height:460px; width:100%;"></div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-4 col-md-12">
                <div class="row">
                    <!-- Column -->
                    <div class="col-md-12">
                        <div class="card bg-primary band">
                            <div class="card-body">
                                <h4 class="card-title text-white">Bandwidth usage</h4>
                                <h6 class="card-subtitle text-white op-5">March 2018</h6>
                                <div class="d-flex no-block">
                                    <div class="align-self-end no-shrink">
                                        <h2 class="m-b-0 text-white">68 TB</h2>
                                    </div>
                                    <div class="ml-auto">
                                        <div id="sales" style="width:150px; height:130px;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-12">
                        <div class="card bg-info">
                            <div class="card-body">
                                <h4 class="card-title text-white">Download count</h4>
                                <h6 class="card-subtitle text-white op-5">March 2018</h6>
                                <div class="d-flex no-block">
                                    <div class="align-self-end no-shrink">
                                        <h2 class="m-b-0 text-white">35487</h2>
                                    </div>
                                    <div class="ml-auto">
                                        <div class="spark-count" style="height:120px"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Column -->
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div>
                                <h5 class="card-title">Projects of the Month</h5>
                            </div>
                            <div class="ml-auto">
                                <select class="custom-select b-0">
                                    <option selected="">January</option>
                                    <option value="1">February</option>
                                    <option value="2">March</option>
                                    <option value="3">April</option>
                                </select>
                            </div>
                        </div>
                        <div class="table-responsive m-t-20 no-wrap">
                            <table class="table vm no-th-brd pro-of-month">
                                <thead>
                                    <tr>
                                        <th colspan="2">Assigned</th>
                                        <th>Name</th>
                                        <th>Priority</th>
                                        <th>Budget</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="width:50px;"><span class="round">S</span></td>
                                        <td>
                                            <h6>Sunil Joshi</h6><small class="text-muted">Web Designer</small>
                                        </td>
                                        <td>Elite Admin</td>
                                        <td><span class="label label-success label-rounded">Low</span></td>
                                        <td>$3.9K</td>
                                    </tr>
                                    <tr class="active">
                                        <td><span class="round"><img src="/template/adminwrap/assets/images/users/2.jpg" alt="user" width="50"></span></td>
                                        <td>
                                            <h6>Andrew</h6><small class="text-muted">Project Manager</small>
                                        </td>
                                        <td>Real Homes</td>
                                        <td><span class="label label-info label-rounded">Medium</span></td>
                                        <td>$23.9K</td>
                                    </tr>
                                    <tr>
                                        <td><span class="round round-success">B</span></td>
                                        <td>
                                            <h6>Bhavesh patel</h6><small class="text-muted">Developer</small>
                                        </td>
                                        <td>MedicalPro Theme</td>
                                        <td><span class="label label-primary label-rounded">High</span></td>
                                        <td>$12.9K</td>
                                    </tr>
                                    <tr>
                                        <td><span class="round round-warning">M</span></td>
                                        <td>
                                            <h6>Micheal Doe</h6><small class="text-muted">Content Writer</small>
                                        </td>
                                        <td>Helping Hands</td>
                                        <td><span class="label label-success label-rounded">High</span></td>
                                        <td>$12.9K</td>
                                    </tr>
                                    <tr>
                                        <td><span class="round round-danger">N</span></td>
                                        <td>
                                            <h6>Johnathan</h6><small class="text-muted">Graphic</small>
                                        </td>
                                        <td>Digital Agency</td>
                                        <td><span class="label label-info label-rounded">High</span></td>
                                        <td>$2.6K</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <div class="col-lg-4">
                <div class="card">
                    <div class="up-img" style="background-image:url(/template/adminwrap/assets/images/big/img1.jpg)"></div>
                    <div class="card-body">
                        <h5 class=" card-title">Business development of rules</h5>
                        <span class="label label-info label-rounded">Technology</span>
                        <p class="m-b-0 m-t-20">Titudin venenatis ipsum aciat. Vestibu ullamer quam. nenatis ipsum ac feugiat. Ibulum ullamcorper.</p>
                        <div class="d-flex m-t-20">
                            <a class="link" href="javascript:void(0)">Read more</a>
                            <div class="ml-auto align-self-center">
                                <a href="javascript:void(0)" class="link m-r-10"><i class="fa fa-heart-o"></i></a>
                                <a href="javascript:void(0)" class="link m-r-10"><i class="fa fa-share-alt"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Projects of the Month -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Activity and To do list -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <h4 class="card-title">Activity</h4>
                            <!-- <span class="badge badge-success">9</span> -->
                            <div class="btn-group ml-auto m-t-10">
                                <a href="JavaScript:void(0)" class="sl-icon-options-vertical link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="javascript:void(0)">Action</a>
                                    <a class="dropdown-item" href="javascript:void(0)">Another action</a>
                                    <a class="dropdown-item" href="javascript:void(0)">Something else here</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="javascript:void(0)">Separated link</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="activity-box">
                        <div class="card-body">
                            <!-- Activity item-->
                            <div class="activity-item">
                                <div class="round m-r-20"><img src="/template/adminwrap/assets/images/users/2.jpg" alt="user" width="50"></div>
                                <div class="m-t-10">
                                    <h5 class="m-b-0 font-medium">Mark Freeman <span class="text-muted font-14 m-l-10">| &nbsp; 6:30 PM</span></h5>
                                    <h6 class="text-muted">uploaded this file </h6>
                                    <table class="table vm b-0 m-b-0">
                                        <tbody>
                                            <tr>
                                                <td class="m-r-10 b-0"><img src="/template/adminwrap/assets/images/icon/zip.png" alt="user"></td>
                                                <td class="b-0">
                                                    <h5 class="m-b-0 font-medium ">Homepage.zip</h5>
                                                    <h6>54 MB</h6>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- Activity item-->
                            <!-- Activity item-->
                            <div class="activity-item">
                                <div class="round m-r-20"><img src="/template/adminwrap/assets/images/users/3.jpg" alt="user" width="50"></div>
                                <div class="m-t-10">
                                    <h5 class="m-b-5 font-medium">Emma Smith <span class="text-muted font-14 m-l-10">| &nbsp; 6:30 PM</span></h5>
                                    <h6 class="text-muted">joined projectname, and invited <a href="javascript:void(0)">@maxcage, @maxcage, @maxcage, @maxcage, @maxcage,+3</a></h6>
                                    <span class="image-list m-t-20">
                                        <a href="javascript:void(0)"><img src="/template/adminwrap/assets/images/users/1.jpg" class="img-circle" alt="user" width="50"></a>
                                        <a href="javascript:void(0)"><img src="/template/adminwrap/assets/images/users/2.jpg" class="img-circle" alt="user" width="50"></a>
                                        <a href="javascript:void(0)"><span class="round round-warning">C</span></a>
                                        <a href="javascript:void(0)"><span class="round round-danger">D</span></a>
                                        <a href="javascript:void(0)">+3</a>
                                    </span>
                                </div>
                            </div>
                            <!-- Activity item-->
                            <!-- Activity item-->
                            <div class="activity-item">
                                <div class="round m-r-20"><img src="/template/adminwrap/assets/images/users/4.jpg" alt="user" width="50"></div>
                                <div class="m-t-10">
                                    <h5 class="m-b-0 font-medium">David R. Jones <span class="text-muted font-14 m-l-10">| &nbsp; 9:30 PM, July 13th</span></h5>
                                    <h6 class="text-muted">uploaded this file </h6>
                                    <span>
                                        <a href="javascript:void(0)" class="m-r-10"><img src="/template/adminwrap/assets/images/big/img1.jpg" alt="user" width="60"></a>
                                        <a href="javascript:void(0)" class="m-r-10"><img src="/template/adminwrap/assets/images/big/img2.jpg" alt="user" width="60"></a>
                                    </span>
                                </div>
                            </div>
                            <!-- Activity item-->
                            <!-- Activity item-->
                            <div class="activity-item">
                                <div class="round m-r-20"><img src="/template/adminwrap/assets/images/users/6.jpg" alt="user" width="50"></div>
                                <div class="m-t-10">
                                    <h5 class="m-b-5 font-medium">David R. Jones <span class="text-muted font-14 m-l-10">| &nbsp; 6:30 PM</span></h5>
                                    <h6 class="text-muted">Commented on<a href="javascript:void(0)">Test Project</a></h6>
                                    <p class="m-b-0">It has survived not only five centuries, but also the leap into unchanged.</p>
                                </div>
                            </div>
                            <!-- Activity item-->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div>
                                <h4 class="card-title">To Do list</h4>
                            </div>
                            <div class="ml-auto">
                                <button class="pull-right btn btn-circle btn-success" data-toggle="modal" data-target="#myModal"><i class="ti-plus"></i></button>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- To do list widgets -->
                        <!-- ============================================================== -->
                        <div class="to-do-widget m-t-20">
                            <!-- .modal for add task -->
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Add Task</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                                        </div>
                                        <div class="modal-body">
                                            <form>
                                                <div class="form-group">
                                                    <label>Task name</label>
                                                    <input type="text" class="form-control" placeholder="Enter Task Name"> </div>
                                                <div class="form-group">
                                                    <label>Assign to</label>
                                                    <select class="custom-select form-control pull-right">
                                                        <option selected="">Sachin</option>
                                                        <option value="1">Sehwag</option>
                                                        <option value="2">Pritam</option>
                                                        <option value="3">Alia</option>
                                                        <option value="4">Varun</option>
                                                    </select>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-success" data-dismiss="modal">Submit</button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->
                            <ul class="list-task todo-list list-group m-b-0" data-role="tasklist">
                                <li class="list-group-item" data-role="task">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input " id="customCheck">
                                        <label class="custom-control-label db" for="customCheck">
                                            <span>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been</span> <span class="badge badge-pill badge-danger pull-right">Today</span>
                                        </label>
                                    </div>
                                    <ul class="assignedto">
                                        <li><img src="/template/adminwrap/assets/images/users/1.jpg" alt="user" data-toggle="tooltip" data-placement="top" title="" data-original-title="Steave"></li>
                                        <li><img src="/template/adminwrap/assets/images/users/2.jpg" alt="user" data-toggle="tooltip" data-placement="top" title="" data-original-title="Jessica"></li>
                                        <li><img src="/template/adminwrap/assets/images/users/3.jpg" alt="user" data-toggle="tooltip" data-placement="top" title="" data-original-title="Priyanka"></li>
                                        <li><img src="/template/adminwrap/assets/images/users/4.jpg" alt="user" data-toggle="tooltip" data-placement="top" title="" data-original-title="Selina"></li>
                                    </ul>
                                </li>
                                <li class="list-group-item" data-role="task">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label db" for="customCheck1">
                                            <span>Lorem Ipsum is simply dummy text of the printing</span><span class="badge badge-pill badge-primary pull-right">1 week </span>
                                        </label>
                                    </div>
                                    <div class="item-date"> 26 jun 2017</div>
                                </li>
                                <li class="list-group-item" data-role="task">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck2">
                                        <label class="custom-control-label db" for="customCheck2">
                                            <span>Give Purchase report to</span> <span class="badge badge-pill badge-info pull-right">Yesterday</span>
                                        </label>
                                    </div>
                                    <ul class="assignedto">
                                        <li><img src="/template/adminwrap/assets/images/users/3.jpg" alt="user" data-toggle="tooltip" data-placement="top" title="" data-original-title="Priyanka"></li>
                                        <li><img src="/template/adminwrap/assets/images/users/4.jpg" alt="user" data-toggle="tooltip" data-placement="top" title="" data-original-title="Selina"></li>
                                    </ul>
                                </li>
                                <li class="list-group-item" data-role="task">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck3">
                                        <label class="custom-control-label db" for="customCheck3">
                                            <span>Lorem Ipsum is simply dummy text of the printing </span> <span class="badge badge-pill badge-warning pull-right">2 weeks</span>
                                        </label>
                                    </div>
                                    <div class="item-date"> 26 jun 2017</div>
                                </li>
                                <li class="list-group-item" data-role="task">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck4">
                                        <label class="custom-control-label db" for="customCheck4">
                                            <span>Give Purchase report to</span> <span class="badge badge-pill badge-info pull-right">Yesterday</span>
                                        </label>
                                    </div>
                                    <ul class="assignedto">
                                        <li><img src="/template/adminwrap/assets/images/users/3.jpg" alt="user" data-toggle="tooltip" data-placement="top" title="" data-original-title="Priyanka"></li>
                                        <li><img src="/template/adminwrap/assets/images/users/4.jpg" alt="user" data-toggle="tooltip" data-placement="top" title="" data-original-title="Selina"></li>
                                    </ul>
                                </li>
                                <li class="list-group-item" data-role="task">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck3">
                                        <label class="custom-control-label db" for="customCheck3">
                                            <span>Lorem Ipsum is simply dummy text of the printing </span> <span class="badge badge-pill badge-warning pull-right">2 weeks</span>
                                        </label>
                                    </div>
                                    <div class="item-date"> 26 jun 2017</div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?= $this->include('main/layout/footer') ?>
</div>
<?= $this->endSection() ?>