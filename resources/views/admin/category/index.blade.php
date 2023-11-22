@extends("admin.base")
@section("content")
<div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Default Forms</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item">Forms</li>
                        <li class="breadcrumb-item">Form Widgets</li>
                        <li class="breadcrumb-item active">Default Forms</li>
                    </ol>
                </div>
                <div class="col-sm-6">
                    <!-- Bookmark Start-->
                    <div class="bookmark">
                        <ul>
                            <li><a href="javascript:void(0)" data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Tables"><i data-feather="inbox"></i></a></li>
                            <li><a href="javascript:void(0)" data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Chat"><i data-feather="message-square"></i></a></li>
                            <li><a href="javascript:void(0)" data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Icons"><i data-feather="command"></i></a></li>
                            <li><a href="javascript:void(0)" data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Learning"><i data-feather="layers"></i></a></li>
                            <li><a href="javascript:void(0)"><i class="bookmark-search" data-feather="star"></i></a>
                                <form class="form-inline search-form">
                                    <div class="form-group form-control-search">
                                        <input type="text" placeholder="Search..">
                                    </div>
                                </form>
                            </li>
                        </ul>
                    </div>
                    <!-- Bookmark Ends-->
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-xl-6">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <form class="theme-form">
                                <div class="card-header pb-0">
                                    <h5>Default Form Layout</h5><span>Using the <a href="#">card</a> component, you can extend the default collapse behavior to create an accordion.</span>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0" for="exampleInputEmail1">Email address</label>
                                        <input class="form-control" id="exampleInputEmail1" type="email" aria-describedby="emailHelp" placeholder="Enter email"><small class="form-text text-muted" id="emailHelp">We'll never share your email with anyone else.</small>
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0" for="exampleInputPassword1">Password</label>
                                        <input class="form-control" id="exampleInputPassword1" type="password" placeholder="Password">
                                    </div>
                                    <div class="checkbox p-0">
                                        <input id="dafault-checkbox" type="checkbox">
                                        <label class="mb-0" for="dafault-checkbox">Remember my preference</label>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-primary btn-submit" type="submit">Submit</button>
                                    <button class="btn btn-secondary">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
</div>
@endsection