<?php use Illuminate\Support\Facades\Storage;
 ?>
<div class="text-center">
    <select id="select-attachment-<?=$row->id?>" onchange="getAttachmentFile(<?=$row->id?>)">
        <option value="document_contract">Document Contract</option>
        <option value="file_bast">BAST</option>
    </select>
    <?php
    $filedoc = "#";
    $filebast = "#";
    if ($row->document_contract !== null):
        $filedoc = url($row->document_contract);
    endif;

    if ($row->file_bast !== null):
        $filebast = url($row->file_bast);
    endif;
    ?>
    <a id="document_contract-<?=$row->id?>" class="btn btn-primary btn-sm" target="_blank" href="<?= $filedoc ?>">
        Open Document Contract
    </a>
    <a id="file_bast-<?=$row->id?>" class="btn btn-primary btn-sm" style="display:none" target="_blank" href="<?= $filebast ?>">
        Open Bast
    </a>

</div>
