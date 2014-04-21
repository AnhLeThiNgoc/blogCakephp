<link type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/themes/ui-darkness/jquery-ui.css" rel="stylesheet">
<!-- START HEADER -->
<div id="header" class="group">
    <div class="group container">
        <div class="row">
            <div class="span12">
                <div class="row">
                    <!-- START LOGO -->
                    <div id="logo" class="span4 group">
                        <a id="logo-img" href="index.html" title="celestino">
                            <img src="images/celestino1.png" title="celestino" alt="celestino" />
                        </a>
                        <p id="tagline">only for creative minds.</p>
                    </div>
                    <!-- END LOGO -->
                    <div id="menu" class="span8 group">
                        <!-- START MAIN NAVIGATION -->
                        <div class="menu">
                            <ul id="nav" class="sf-menu">
                                <li class="nav-icon-hi">
                                        <?php echo $this->Html->link('Home', array('controller' => 'posts', 'action' => 'index'));?>
                                </li>
                                <li class="nav-icon-monitor current_page_item">
                                    <?php echo $this->Html->link('Subject', array('controller' => 'posts', 'action' => 'index'));?>
                                    <ul class="sub-menu">
                                        <li>
                                            <?php echo $this->Html->link('Subject1', array('controller' => 'posts', 'action' => 'index'));?>
                                        </li>
                                        <li>
                                            <?php echo $this->Html->link('Subject2', array('controller' => 'posts', 'action' => 'index'));?>
                                        </li>
                                        <li>
                                            <?php echo $this->Html->link('Subject2', array('controller' => 'posts', 'action' => 'index'));?>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-icon-doc">
                                    <?php echo $this->Html->link('Contact', array('controller' => 'posts', 'action' => 'index'));?>
                                </li>
                                <li class="nav-icon-works">
                                    <?php if($logged_in): ?>
                                        <li>
                                            <?php echo $this->Html->link('Welcome: '.$users_username, array('controller' => 'posts', 'action' => 'index'));?>
                                        </li>
                                        <li><?php echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout')); ?></li>
                                    <?php else: ?>
                                        <li>
                                            <a id="show_dialog1" class="dialogify" data-height="300" data-width="450" href="javascript:void(0)">Register</a>
                                        </li>
                                        <li>
                                            <?php //echo $this->Html->link('Login',array('controller' => 'users', 'action' => 'login'),array('class'=>"dialogify", 'data-width'=>"450",'data-height'=>"300"))?>
                                            <a id="show_dialog" class="dialogify" data-height="300" data-width="450" href="javascript:void(0)">Login</a>
                                        </li>
                                        <li><?php echo $this->Html->link('Facebook Login', $fb_login_url, array('class' => 'element place-right')); ?></li>
                                    <?php endif; ?>
                                </li>
                            </ul>
                        </div>
                        <!-- END MAIN NAVIGATION -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="border-header"></div>
</div>
<!-- END HEADER -->
<div id="dialog" title="Dialog">
    <?php echo $this->element('login'); ?>
</div>
<div id='dialog1'>
    <?php echo $this->element('add');?>
</div>
<script type="text/javascript">
     $(document).ready(function () {
        $('#dialog').dialog({ 
            autoOpen: false, 
            modal: true, 
            title: "Login Form", 
            width: "auto", 
            resizable: false 
        });
        $('#dialog1').dialog({
            autoOpen: false, 
            modal: true, 
            title: "Register Form", 
            width: 500,
            height: 500, 
            resizable: false 
        });

        $('#show_dialog').click(function(){
            $('#dialog').dialog('open');
        });
        $('#show_dialog1').click(function() {
            $('#dialog1').dialog('open');
        });
    });
</script>

<style type="text/css">
#dialog1 {
    height: 500pc;
    width: 500px;
}
</style>
