<ul class="pagination pagination-sm">
<?php foreach($pagination as $item): ?>
<?php if(is_null($item['href'])): ?>
    <li class="page-item"><a class="<?php echo $item['class']; ?>"><?php echo $item['text']; ?></a></li>
<?php else: ?>
    <li class="page-item"><a class="<?php echo $item['class']; ?>" href="<?php echo $item['href']; ?>"><?php echo $item['text']; ?></a></li>
<?php endif; ?>
<?php endforeach; ?>
</ul>