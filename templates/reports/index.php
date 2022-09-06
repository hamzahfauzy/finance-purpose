<?php load_templates('layouts/top') ?>
    <div class="content">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Laporan</h2>
                        <h5 class="text-white op-7 mb-2">Laporan pengajuan</h5>
                    </div>
                    <div class="ml-md-auto py-2 py-md-0">
                        <?php if(is_allowed('reports/export', auth()->user->id)): ?>
                        <a href="<?=routeTo('reports/export')?>" class="btn btn-secondary btn-round">Export</a>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-inner mt--5">
            <div class="row row-card-no-pd">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive table-hover table-sales">
                                <table class="table datatable">
                                    <thead>
                                        <tr>
                                            <th width="20px">#</th>
                                            <th>Tiket</th>
                                            <th>Tanggal</th>
                                            <th>Divisi</th>
                                            <th>Nama User</th>
                                            <th>Deskripsi</th>
                                            <th>Tipe Pengajuan</th>
                                            <th>Bank</th>
                                            <th>Jumlah</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($datas as $index => $data): ?>
                                        <tr>
                                            <td>
                                                <?=$index+1?>
                                            </td>
                                            <td><?=$data->ticket?></td>
                                            <td><?=$data->created_at?></td>
                                            <td><?=$data->funding_type?></td>
                                            <td><?=$data->user->name?></td>
                                            <td><?=$data->description?></td>
                                            <td><?=$data->purpose_type->name?></td>
                                            <td><?=$data->bank_account?></td>
                                            <td><?=$data->status?></td>
                                            <td>Rp. <?=number_format($data->total_rincian)?></td>
                                        </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php load_templates('layouts/bottom') ?>