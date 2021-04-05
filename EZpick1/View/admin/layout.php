<!DOCTYPE html>
<html lang="en">
    <?php echo $this->createBlock('Block\Admin\Layout\Head')->toHtml(); ?>
<body>
<table width="100%" height="100%">
    <thead></thead>
    <tbody>
        <tr>
            <td colspan="3" height="50px"><?php echo $this->getChild('header')->toHtml(); ?></td>
        </tr>
        <tr>
            <td><?php echo $this->createBlock('Block\Core\Layout\Message')->toHtml(); ?></td>
        </tr>
        <tr>
            <td><?php echo $this->getChild('content')->toHtml(); ?></td>
        </tr>
        <tr>
            <td colspan="3" height="50px"><?php echo $this->getChild('footer')->toHtml(); ?></td>
        </tr>
    </tbody>
</table>
</body>
</html>