<h2>Edit Word</h2>
<hr noshade/>
<form class="form-horizontal" method="post" action="<?php url("words/save"); ?>">
    <input type="hidden" id="wordsId" name="id" value="<?php echo $word->id; ?>"/>
    <div class="form-group">
        <label class="control-label col-lg-2">Word</label>
        <div class="col-lg-10">
            <input type="text" class="form-control" id="wordsWord" name="word" value="<?php echo $word->word; ?>"/>
        </div>
    </div>
    <div class="form-group">
        <div class="col-lg-2">&nbsp;</div>
        <div class="col-lg-10">
            <button class="btn btn-default"><i class="fa fa-save"></i> Save</button>
        </div>
    </div>
</form>