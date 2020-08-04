<div class="form-group pagination-select">
    <label class="form-label">請選擇頁數</label>
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
</div>
