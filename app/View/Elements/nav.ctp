
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
                                        <li><?php echo $this->Html->link('Register', array('controller' => 'users', 'action' => 'add') )?></li>
                                        <li>
                                            <div id="dialog" title="Dialog"></div>
                                            <!-- <a href="photo-1.jpg" class="dialogify" data-width="450" data-height="300">Dialogify Photo 1</a> -->
                                            <?php echo $this->Html->link('Login',array('controller' => 'users', 'action' => 'login', 'class'=>"dialogify", 'data-width'=>"450",'data-height'=>"300"))?>
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

<link type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/themes/ui-darkness/jquery-ui.css" rel="stylesheet">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>
<script type="text/javascript">
    /*
     * jQuery UI Dialog: Size to Fit Content
     * http://salman-w.blogspot.com/2013/05/jquery-ui-dialog-examples.html
     */
     $(function() {
        $("#dialog").dialog({
            autoOpen: false,
            resizable: false,
            width: "auto"
        });
        $(".dialogify").on("click", function(e) {
            e.preventDefault();
            $("#dialog").html("<img src='" + $(this).prop("href") + "' width='" + $(this).attr("data-width") + "' height='" + $(this).attr("data-height") + "'>");
            $("#dialog").dialog("option", "position", {
                my: "center",
                at: "center",
                of: window
            });
            if ($("#dialog").dialog("isOpen") == false) {
                $("#dialog").dialog("open");
            }
        });
    });
</script>
