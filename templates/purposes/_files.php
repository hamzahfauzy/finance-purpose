<div class="row row-card-no-pd">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <?php if($data->status == 'draft'): ?>
                <form action="<?=routeTo('purposes/upload')?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="purpose_files[purpose_id]" value="<?=$data->id?>">
                    <div class="form-group">
                        <label for="">File</label>
                        <input type="file" name="file" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary">Submit</button>
                    </div>
                </form>
                <?php endif ?>

                <?php if($success_msg): ?>
                <div class="alert alert-success"><?=$success_msg?></div>
                <?php endif ?>
                <div class="table-responsive table-hover table-sales">
                    <table class="table">
                        <thead>
                            <tr>
                                <th width="20px">#</th>
                                <th>File</th>
                                <th class="text-right"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(empty($files)): ?>
                            <tr>
                                <td colspan="5" style="text-align:center"><i>Tidak ada data</i></td>
                            </tr>
                            <?php endif ?>
                            <?php foreach($files as $index => $file): ?>
                            <tr>
                                <td>
                                    <?=$index+1?>
                                </td>
                                <td><?=str_replace('uploads/purposes/','',$file->file_url)?></td>
                                <td>
                                    <a href="<?=asset($file->file_url)?>" target="_blank" class="btn btn-success"><i class="fa fa-eye"></i> Lihat</a>
                                    <?php if($data->status == 'draft'): ?>
                                    <a href="<?=routeTo('purposes/file-delete',['id'=>$file->id])?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Hapus</a>
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