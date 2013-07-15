<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    
    <!-- this'll very important -->
    <?php include 'Base.tpl.php'; ?>
    <?php $store = View_Base::GetStore(); ?>
    <title>
        test!me!
    </title>
    <?php CJPluginLoader::CFPagePluginRegister('meta'); ?>
    
    <body>
        <?php echo 'boy`s name is '. $store['name4boy'] ;?><br/>
        <?php echo 'girl`s name is ' . $store['name4girl'] ;?><br/>
    </body>
    
</html>
