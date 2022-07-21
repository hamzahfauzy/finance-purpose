<?php load_templates('layouts/top') ?>
    <div class="content">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Pengajuan</h2>
                        <h5 class="text-white op-7 mb-2">Memanajemen fitur - fitur pengajuan</h5>
                    </div>
                    <div class="ml-md-auto py-2 py-md-0">
                        <?php if(is_allowed('purposes/create', auth()->user->id)): ?>
                        <a href="<?=routeTo('purposes/create')?>" class="btn btn-secondary btn-round">Buat Pengajuan</a>
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
                            <?php if($success_msg): ?>
                            <div class="alert alert-success"><?=$success_msg?></div>
                            <?php endif ?>
                            <div class="table-responsive table-hover table-sales">
                                <table class="table datatable">
                                    <thead>
                                        <tr>
                                            <th width="20px">#</th>
                                            <th>No. Tiket</th>
                                            <th>Deskripsi</th>
                                            <th>Bank</th>
                                            <th>Jumlah</th>
                                            <th>Status</th>
                                            <th>Status Dana</th>
                                            <th class="text-right">
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($datas as $index => $data): ?>
                                        <tr>
                                            <td>
                                                <?=$index+1?>
                                            </td>
                                            <td><?=$data->ticket?></td>
                                            <td><?=$data->description?></td>
                                            <td><?=$data->bank_account?></td>
                                            <td><?=number_format($data->total_rincian)?></td>
                                            <td>
                                                <?=$data->status?>
                                                <?=$data->notes?'<br>('.$data->notes.')':''?>
                                            </td>
                                            <td>
                                                <?=$data->status_dana?>
                                                <?=$data->note_status_dana?'<br>('.$data->note_status_dana.')':''?>
                                            </td>
                                            <td>
                                                <a href="<?=routeTo('purposes/view',['id'=>$data->id])?>" class="btn btn-sm btn-success"><i class="fas fa-eye"></i> Lihat</a>

                                                <?php if($data->status == 'draft'): ?>

                                                    <a href="<?=routeTo('purposes/purpose',['id'=>$data->id])?>" class="btn btn-sm btn-primary" onclick="if(confirm('Apakah anda yakin akan mengajukan proposal ini ?')){return true}else{return false}"><i class="fas fa-check"></i> Ajukan</a>
                                                
                                                    <?php if(is_allowed('purposes/edit', auth()->user->id)): ?>
                                                        <a href="<?=routeTo('purposes/edit',['id'=>$data->id])?>" class="btn btn-sm btn-warning"><i class="fas fa-pencil-alt"></i> Edit</a>
                                                    <?php endif ?>
                                                
                                                    <?php if(is_allowed('purposes/delete', auth()->user->id)): ?>
                                                        <a href="<?=routeTo('purposes/delete',['id'=>$data->id])?>" class="btn btn-sm btn-danger" onclick="if(confirm('Apakah anda yakin akan menghapus proposal ini ?')){return true}else{return false}"><i class="fas fa-trash"></i> Hapus</a>
                                                    <?php endif ?>

                                                <?php else: ?>

                                                    <?php if($data->status == 'diajukan'): ?>

                                                    <?php if(is_allowed('purposes/approve', auth()->user->id) && $data->action_by != auth()->user->name): ?>
                                                        <a href="<?=routeTo('purposes/approve',['id'=>$data->id])?>" class="btn btn-sm btn-primary" onclick="if(confirm('Apakah anda yakin akan menyetujui proposal ini ?')){return true}else{return false}"><i class="fas fa-check"></i> Setujui</a>
                                                    <?php endif ?>
                                                
                                                    <?php if(is_allowed('purposes/decline', auth()->user->id) && $data->action_by != auth()->user->name): ?>
                                                        <a href="<?=routeTo('purposes/decline',['id'=>$data->id])?>" class="btn btn-sm btn-danger" onclick="doPrompt(this); return false"><i class="fas fa-times"></i> Tolak</a>
                                                    <?php endif ?>

                                                    <?php elseif($data->status == 'diterima' && $data->status_dana == NULL): ?>

                                                    <?php if(is_allowed('purposes/finance-done', auth()->user->id) && $data->action_by != auth()->user->name): ?>
                                                        <a href="<?=routeTo('purposes/finance-done',['id'=>$data->id])?>" class="btn btn-sm btn-primary" onclick="if(confirm('Apakah anda yakin ?')){return true}else{return false}"><i class="fas fa-check"></i> Setujui Keuangan</a>
                                                    <?php endif ?>
                                                
                                                    <?php if(is_allowed('purposes/finance-cancel', auth()->user->id) && $data->action_by != auth()->user->name): ?>
                                                        <a href="<?=routeTo('purposes/finance-cancel',['id'=>$data->id])?>" class="btn btn-sm btn-danger" onclick="doPrompt(this); return false"><i class="fas fa-times"></i> Tolak Keuangan</a>
                                                    <?php endif ?>
                                                    
                                                    <?php endif ?>

                                                <?php endif ?>
                                            </td>
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
    <script>
    function doPrompt(el)
    {
        var reason = prompt('Berikan alasan penolakan','-');
        if (reason === null) {
            return; //break out of the function early
        }
        location=el.href+'&reason='+reason
    }
    </script>
<?php load_templates('layouts/bottom') ?>