<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <!-- this'll very important -->
    <?php include 'Base.tpl.php'; ?>
    <?php $store = View_Base::GetStore(); ?>
    <head>
        <?php CJPluginLoader::CJPagePluginLoad('meta/test.meta'); ?>
        <?php CJPluginLoader::CJPagePluginLoad('js/test.js');?>
        <?php CJPluginLoader::CJPagePluginLoad('css/test.css');?>
        <title>
            test!me!
        </title>
        
    </head>

    <body>
        <?php echo Testy::echoMe(); ?><br/>
        <?php echo 'boy`s name is ' . $store['name4boy']; ?><br/>
        <?php echo 'girl`s name is ' . $store['name4girl']; ?><br/>
        <img src="<?php echo CJPluginLoader::CJResourceFile('test.jpg', false);?>" alt="苍老师" />
        <img src="<?php echo CJPluginLoader::CJResourceFile('test2.jpg', false);?>" alt="苍老师" />
    </body>

</html>
