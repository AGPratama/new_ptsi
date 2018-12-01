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
    <select id="select-attachment-<?=$row->id?>" onchange="getAttachmentFile(<?=$row->id?>)">
        <option value="ktp">KTP</option>
        <option value="npwp">NPWP</option>
        <option value="bukti_pajak">Bukti Pajak</option>
        <option value="sertifikat">Sertifikat</option>
    </select>
    <a id="modal-trigger-<?=$row->id?>" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ktp-<?=$row->id?>">
        Show
    </a>

</div>

<div class="modal fade" id="ktp-<?=$row->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <div class="modal-body center-obj">
                <?php if ($row->ktp !== null) { ?>
                    <img class="img-responsive" src="<?= url($row->ktp) ?>">
                <?php }else{ ?>
                    <h4 class="text-center">Tidak Ada Data</h4>
                <?php } ?>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="npwp-<?=$row->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <div class="modal-body center-obj">
                <?php if ($row->npwp !== null) { ?>
                    <img class="img-responsive" src="<?= url($row->npwp) ?>">
                <?php }else{ ?>
                    <h4 class="text-center">Tidak Ada Data</h4>
                <?php } ?>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="bukti_pajak-<?=$row->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <div class="modal-body center-obj">
                <?php if ($row->bukti_pajak !== null) { ?>
                    <img class="img-responsive" src="<?= url($row->bukti_pajak) ?>">
                <?php }else{ ?>
                    <h4 class="text-center">Tidak Ada Data</h4>
                <?php } ?>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="sertifikat-<?=$row->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <div class="modal-body center-obj">
                <div class="row">
                    <?php foreach ($sertifikat as $key => $value): ?>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mb10">
                            <?php if ($value->sertifikat !== null): ?>
                                <img class="img-responsive" src="<?= $value->sertifikat ?>">
                            <?php else: ?>
                                <h4 class="text-center">Tidak Ada Data</h4>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
