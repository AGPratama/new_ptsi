<style>
    .center-obj{
        margin-left: auto;
        margin-right: auto;
    }
    .mb10{
        margin-bottom:10px;
    }
</style>
<div class="text-center">
    <select id="select-sertifikat">
        <option value="">--Sertifikat--</option>
        <?php if(!empty($sertifikat_training)){
            foreach ($sertifikat_training as $val): ?>
                <option value="<?=$val->id ?>"><?= $val->nama ?></option>
            <?php endforeach; ?>
        <?php } ?>
    </select>
    <a id="modal-trigger-sertifikat" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#sertifikat-<?=$row->id?>">
        Show
    </a>

</div>

<?php if(!empty($sertifikat_training)){
    foreach ($sertifikat_training as $val): ?>

        <div class="modal fade" id="sertifikat-<?=$val->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                    </div>
                    <div class="modal-body center-obj">
                    <?php if ($val->sertifikat !== null) { ?>
                        <?php if(strpos($val->sertifikat, 'pdf')!==FALSE){ ?>
                            <object data="<?= url($val->sertifikat) ?>" type="application/pdf" style="width:100%" height="500">
                                <embed src="<?= url($val->sertifikat) ?>" style="width:100%" height="500px" />
                                <p>This browser does not support PDFs. Please download the PDF to view it:
                                    <a href="<?= url($val->sertifikat) ?>">Download PDF</a>.</p>
                                </embed>
                            </object>
                        <?php } else { ?>
                            <img class="img-responsive" src="<?= url($val->sertifikat) ?>">
                        <?php } ?>
                    <?php }else{ ?>
                            <h4 class="text-center">Tidak Ada Data</h4>
                    <?php } ?>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

    <?php endforeach; ?>
<?php } ?>