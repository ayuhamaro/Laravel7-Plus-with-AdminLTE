<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title></title>

    <?php if(isset($view_html['js']) && ! is_null($view_html['js'])): ?>
    <?php echo $view_html['js']; ?>
    <?php endif; ?>

    <style type="text/css">
        *{
            border: 0;
            margin: 0;
            padding: 0;
        }
    </style>
    <?php if(isset($view_html['css']) && ! is_null($view_html['css'])): ?>
    <?php echo $view_html['css']; ?>
    <?php endif; ?>
</head>
<body>
    <?php echo $view_html['content']; ?>

    <?php if(isset($view_html['nle_js']) && ! is_null($view_html['nle_js'])): ?>
    <?php echo $view_html['nle_js']; ?>
    <?php endif; ?>

    <?php if(isset($view_html['nle_css']) && ! is_null($view_html['nle_css'])): ?>
    <?php echo $view_html['nle_css']; ?>
    <?php endif; ?>
</body>
</html>