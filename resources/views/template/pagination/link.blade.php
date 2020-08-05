<div class="d-none d-sm-block">
    <ul class="pagination pagination-sm">
        <?php foreach($pagination as $item): ?>
        <?php if(is_null($item['href'])): ?>
            <li class="page-item"><a class="<?php echo $item['class']; ?>"><?php echo $item['text']; ?></a></li>
            <?php else: ?>
            <li class="page-item"><a class="<?php echo $item['class']; ?>" href="<?php echo $item['href']; ?>"><?php echo $item['text']; ?></a></li>
            <?php endif; ?>
        <?php endforeach; ?>
    </ul>
</div>

<div class="d-block d-sm-none">
    <ul class="pagination pagination-sm">
        <?php for($i = 0; $i < count($pagination) - 1; $i ++): ?>
        <?php if(is_null($pagination[$i]['href'])): ?>
            <li class="page-item"><a class="<?php echo $pagination[$i]['class']; ?>"><?php echo $pagination[$i]['text']; ?></a></li>
            <?php else: ?>
            <li class="page-item"><a class="<?php echo $pagination[$i]['class']; ?>" href="<?php echo $pagination[$i]['href']; ?>"><?php echo $pagination[$i]['text']; ?></a></li>
            <?php endif; ?>
        <?php endfor; ?>
    </ul>
</div>


