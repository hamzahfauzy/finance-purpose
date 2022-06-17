<div class="row row-card-no-pd">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <?php if($data->status == 'draft'): ?>
                <form action="" method="post">
                    <input type="hidden" name="purpose_items[purpose_id]" value="<?=$data->id?>">
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" name="purpose_items[name]" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Deskripsi</label>
                        <input type="text" name="purpose_items[description]" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Nominal</label>
                        <input type="number" name="purpose_items[amount]" class="form-control" required>
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
                                <th>Nama</th>
                                <th>Deskripsi</th>
                                <th>Nominal</th>
                                <th class="text-right"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(empty($items)): ?>
                            <tr>
                                <td colspan="5" style="text-align:center"><i>Tidak ada data</i></td>
                            </tr>
                            <?php endif ?>
                            <?php $total = 0 ; foreach($items as $index => $item): $total+=$item->amount ?>
                            <tr>
                                <td>
                                    <?=$index+1?>
                                </td>
                                <td><?=$item->name?></td>
                                <td><?=$item->description?></td>
                                <td><?=number_format($item->amount)?></td>
                                <td>
                                    <?php if($data->status == 'draft'): ?>
                                    <a href="<?=routeTo('purpose/item-delete',['id'=>$item->id])?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Hapus</a>
                                    <?php endif ?>
                                </td>
                            </tr>
                            <?php endforeach ?>
                            <tr>
                                <td colspan="3">Total</td>
                                <td><?=number_format($total)?></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>