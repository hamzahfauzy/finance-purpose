<?php load_templates('layouts/top') ?>
    <div class="content">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Dashboard</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-inner mt--5">
            <div class="row mt--2">
                <div class="col-md-7">
                    <div class="card full-height">
                        <div class="card-body">
                            <div class="card-title">Statistik Pengajuan</div>
                            <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                                <div class="px-2 pb-2 pb-md-0 text-center">
                                    <div id="circles-1"></div>
                                    <h6 class="fw-bold mt-3 mb-0">Total Pengajuan</h6>
                                </div>
                                <div class="px-2 pb-2 pb-md-0 text-center">
                                    <div id="circles-2"></div>
                                    <h6 class="fw-bold mt-3 mb-0">Pengajuan Pending</h6>
                                </div>
                                <div class="px-2 pb-2 pb-md-0 text-center">
                                    <div id="circles-3"></div>
                                    <h6 class="fw-bold mt-3 mb-0">Pengajuan Di Terima</h6>
                                </div>
                                <div class="px-2 pb-2 pb-md-0 text-center">
                                    <div id="circles-4"></div>
                                    <h6 class="fw-bold mt-3 mb-0">Pengajuan Di Tolak</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card full-height">
                        <div class="card-body">
                            <div class="card-title">Statistik Anggaran</div>
                            <div class="row py-3">
                                <div class="col-md-12 d-flex flex-row justify-content-between flex-wrap">
                                    <div class="w-50">
                                        <h6 class="fw-bold text-uppercase text-primary op-8">Total Pengajuan</h6>
                                        <h3 class="fw-bold">Rp. <?= number_format($statistikAnggaran['total']) ?></h3>
                                    </div>
                                    <div class="w-50">
                                        <h6 class="fw-bold text-uppercase text-warning op-8">Total Pending</h6>
                                        <h3 class="fw-bold">Rp. <?= number_format($statistikAnggaran['pending']) ?></h3>
                                    </div>
                                    <div class="w-50">
                                        <h6 class="fw-bold text-uppercase text-success op-8">Total Di Terima</h6>
                                        <h3 class="fw-bold">Rp. <?= number_format($statistikAnggaran['diterima']) ?></h3>
                                    </div>
                                    <div class="w-50">
                                        <h6 class="fw-bold text-uppercase text-danger op-8">Total Di Tolak</h6>
                                        <h3 class="fw-bold">Rp. <?= number_format($statistikAnggaran['ditolak']) ?></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-head-row">
                                <div class="card-title">Grafik Anggaran</div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart-container" style="min-height: 375px">
                                <canvas id="statisticsChart"></canvas>
                            </div>
                            <div id="myChartLegend"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php load_templates('layouts/bottom',compact('statistikPengajuan')) ?>