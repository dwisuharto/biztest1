<h2>Words</h2>
<hr noshade/>
<?php if (isset($words) && is_array($words) && count($words) > 0) { ?>
    <table id="tblWords" class="table">
        <thead>
        <tr>
            <th>#</th>
            <th>Word</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $i = 0;
        foreach ($words as $word) {
            $i++;
            ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $word->word; ?></td>
                <td><a href="<?php url("words/edit/" . $word->id); ?>">Edit</a> | <span class="span-link link-delete" data-url="<?php url("words/del/" . $word->id); ?>">Del</span></td>
            </tr>
        <?php
        }
        ?>
        </tbody>
    </table>
<?php } else { ?>
<h3>There's no word, please add a new one.</h3>
<?php } ?>
<button class="btn btn-default" onclick="javascript:location.href = '<?php echo url("words/add"); ?>';"><i class="fa fa-plus"></i> Add New Word</button>
