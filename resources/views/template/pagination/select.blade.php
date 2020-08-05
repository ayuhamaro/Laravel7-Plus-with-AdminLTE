<div class="form-group pagination-select">
    <!--<label class="form-label">請選擇頁數</label>-->

    <?php if( ! $button['prev']['disabled']): ?>
    <button type="button" class="form-control btn btn-block btn-default btn-xs" value="<?php echo $button['prev']['value']; ?>" onclick="location.href = this.value;"><?php echo $button['prev']['text']; ?></button>
    <?php endif; ?>

    <select class="form-control" onchange="location.href = this.value;">
        <?php foreach($pagination as $item):?>
        <?php if($item['disabled']): ?>
            <option value="<?php echo $item['value']; ?>" disabled="disabled"><?php echo $item['text']; ?></option>
            <?php elseif($item['selected']): ?>
            <option value="<?php echo $item['value']; ?>" selected="selected"><?php echo $item['text']; ?></option>
            <?php elseif($item['disabled'] && $item['selected']): ?>
            <option value="<?php echo $item['value']; ?>" disabled="disabled" selected="selected"><?php echo $item['text']; ?></option>
            <?php else: ?>
            <option value="<?php echo $item['value']; ?>"><?php echo $item['text']; ?></option>
            <?php endif; ?>
        <?php endforeach; ?>
    </select>

    <?php if( ! $button['next']['disabled']): ?>
    <button type="button" class="form-control btn btn-block btn-default btn-xs" value="<?php echo $button['next']['value']; ?>" onclick="location.href = this.value;"><?php echo $button['next']['text']; ?></button>
    <?php endif; ?>
</div>
