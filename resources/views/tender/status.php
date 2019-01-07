<div>
    <form id="generator" name="generator" method="get" action="tender/updatestatus">
    <input type="hidden" value="submit" name="generator">
    <select id="typecv-<?=$row->id ?>">
        <?php foreach ($status as $val): ?>
            <option value="<?=$val->id ?>"><?= $val->value ?></option>
        <?php endforeach; ?>
    </select>
    <input type="hidden" name="tender_id" id="tender_id-<?=$row->id?>" value="<?=$row->id?>">
    <a onclick="if(confirm('Ubah Status Menjadi '+$('#typecv-<?=$row->id ?>  option:selected').text()+'?'))submitform(<?=$row->id?>,$('#typecv-<?=$row->id ?>').val(),$('#typecv-<?=$row->id ?>  option:selected').text())"  class="btn btn-primary btn-xs">Update Status</a>
    </form>
</div>