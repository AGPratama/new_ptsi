<div>
    <form id="generator" name="generator" method="get" action="tenaga_kerja/generatecv">
    <input type="hidden" value="submit" name="generator">
    <select id="typecv-<?=$row->id ?>">
        <?php foreach ($penggunajasa as $val): ?>
            <option value="<?=$val->id ?>"><?= $val->value ?></option>
        <?php endforeach; ?>
    </select>
    <input type="hidden" name="tenaga_kerja_id" id="tenaga_kerja_id-<?=$row->id?>" value="<?=$row->id?>">
    <a onclick="submitform(<?=$row->id?>)"  class="btn btn-primary btn-xs">Generate CV</a>
    </form>
</div>
<script>
// function submitform()
// {
//   //document.getElementById("generator").submit();
//   id = "<?=$row->id?>";
//   var type = $("#typecv-"+id).val();
//   console.log(type);
//   window.open('/admin/tenaga_kerja/generatecv?tenaga_kerja_id=<?=$row->id ?>&typecv='+type, '_blank');
// }

</script>
