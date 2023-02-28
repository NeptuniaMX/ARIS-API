<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="gettoken"><a>Get ARIS Session Token</a></button>
        <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="destroytoken"><a>Destroy ARIS Session</a></button>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- UMC ARIS Session Details -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Buat Group Baru</div>
                            <hr>
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Nama Database</div>
                            <!-- <input id="database_name"></input> -->
                            &nbsp;
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Parent Group GUID</div>
                            <input id="parent_group"></input>
                            &nbsp;
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Input Group</div>
                            <input id="input_group"></input>
                            &nbsp;
                            <hr>
                            <button class="btn btn-sm btn-primary shadow-sm" id="input_data_group"><a>Input Data</a></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- UMC ARIS Token Details -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">ARIS Database</div>
                            <hr>
                            <button class="btn btn-sm btn-primary shadow-sm" id="view_database"><a>Lihat Database</a></button>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- End of Main Content -->