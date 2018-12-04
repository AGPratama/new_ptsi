<div class="text-center">
    <select id="attach-data-<?=$row->id ?>" onchange="getAttachmentFile(<?=$row->id?>)">
        <option value="bukti">Bukti / Kwitansi</option>
        <option value="pic_peralatan">PIC Peralatan</option>
    </select>
    <br>
    <a id="modal-trigger-<?=$row->id?>" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#bukti-<?=$row->id?>">Preview</a>
</div>

<div class="modal fade" id="bukti-<?=$row->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Bukti / Kwitansi</h4>
            </div>
            <div class="modal-body center-obj">
                <?php if ($row->bukti !== null) { ?>
                    <?php if(strpos($row->bukti, 'pdf')!==FALSE){ ?>
                        <object data="<?= url($row->bukti) ?>" type="application/pdf" style="width:100%" height="500">
                            <embed src="<?= url($row->bukti) ?>" style="width:100%" height="500px" />
                            <p>This browser does not support PDFs. Please download the PDF to view it:
                                <a href="<?= url($row->bukti) ?>">Download PDF</a>.</p>
                            </embed>
                        </object>
                    <?php } else if(strpos($row->bukti, 'pdf')===FALSE){ ?>
                        <img class="img-responsive" src="<?= url($row->bukti) ?>">
                    <?php } ?>
                <?php }else{ ?>
                    <h4 class="text-center">Tidak Ada Data</h4>
            <?php } ?>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="pic_peralatan-<?=$row->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">PIC Peralatan</h4>
            </div>
            <div class="modal-body center-obj">
                <?php if ($row->pic_peralatan !== null) { ?>
                    <?php if(strpos($row->pic_peralatan, 'pdf')!==FALSE){ ?>
                        <object data="<?= url($row->pic_peralatan) ?>" type="application/pdf" style="width:100%" height="500">
                            <embed src="<?= url($row->pic_peralatan) ?>" style="width:100%" height="500px" />
                            <p>This browser does not support PDFs. Please download the PDF to view it:
                                <a href="<?= url($row->pic_peralatan) ?>">Download PDF</a>.</p>
                            </embed>
                        </object>
                    <?php } else if(strpos($row->pic_peralatan, 'pdf')===FALSE){ ?>
                        <img class="img-responsive" src="<?= url($row->pic_peralatan) ?>">
                    <?php } ?>
                <?php }else{ ?>
                    <h4 class="text-center">Tidak Ada Data</h4>
                <?php } ?>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
