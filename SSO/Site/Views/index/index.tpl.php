<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head >
        <?php include 'Base.tpl.php';?>
        <?php $store = View_Base::GetStore();?>
    </head>
    <body>
        <h3>
            The sub domain '<?php echo SITE_FULL_NAME ;?>' hold the <?php echo $store['module_name'];?> for cosji.com
        </h3>
    </body>
</html>