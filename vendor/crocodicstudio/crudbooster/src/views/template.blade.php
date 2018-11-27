<table border='1' width='100%' cellpadding='3' cellspacing="0" style='border-collapse: collapse;font-size:12px'>
    <thead>
    <tr>
        <?php
        foreach ($columns as $col) {

            if (Request::get('columns')) {
                if (! in_array($col['name'], Request::get('columns'))) {
                    continue;
                }
            }
            $colname = $col['label'];
            echo "<th style='background:#eeeeee'>$colname</th>";
        }
        ?>
    </tr>
    </thead>
</table>
