<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php include 'Base.tpl.php';?>
<?php $store = View_Base::GetStore();?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head >

        <?php  CJPluginLoader::CJPagePluginLoad('meta/test.meta');?>
    </head>
    <body>
        <h1>
            My name is <?php echo $store['name'];?>
            And I always <?php echo $store['action'];?>
        </h1>
    </body>
</html>