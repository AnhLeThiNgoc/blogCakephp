<?php echo $this->element('nav');?>
        <?php echo $this->element('silder');?>
<!--START PRIMARY -->
<div id="primary" class="sidebar-no">
    <div class="container group">
        <div class="row">
            <!-- START CONTENT -->
            <div id="content-page" class="span12 content group">
                <div class="page type-page status-publish hentry group">
                    <script>
                        jQuery(document).ready(function($){
                            $('.sidebar').remove();

                            if( !$('#primary').hasClass('sidebar-no') ) {
                                $('#primary').removeClass().addClass('sidebar-no');
                                $('.content').removeClass('span9').addClass('span12');
                            }
                        });
                    </script>
                    <div class="row">
                        <ul id="portfolio" class="columns columns thumbnails">
                        <?php foreach ($posts as $post): ?>
                            <li  class=" work span4 ">
                                <div class="picture_overlay">
                                    <?php echo $this->Html->image($post['Post']['img']) ?> 
                                    <div class="overlay">
                                        <div>
                                            <p>
                                                <?php 
                                                    echo $this->Html->link($this->Html->image('icons/zoom.png'), 
                                                        $post['Post']['id'], array('target' => '_blank', 'escape' => false));
                                                    echo $this->Html->link($this->Html->image('icons/project.png'), array('controller' => 'posts', 'action' => 'view', $post['Post']['id']), array('target' => '_blank', 'escape' => false));
                                                ?>
                                            </p>
                                            <p class="title"><?php echo $post['Post']['title']; ?></p>
                                            <p class="subtitle"><?php echo $post['User']['username']; ?></p>
                                        </div>
                                    </div>
                                </div>
                                <h4><?php echo $this->Html->link($post['Post']['title'], array('controller' => 'post', 'action' => 'view', $post['Post']['id']))?></h4>

                                <p><?php echo $post['Post']['body']; ?></p>
                                <p class="read-more">
                                    <?php echo $this->Html->link('View Project', array('controller' => 'post', 'action' => 'view', $post['Post']['id']))?>
                                </p>
                            </li>
                        <?php endforeach; ?>
                        </ul>
                        <div class='general-pagination group'>
                            <a href='#' class='selected' >1</a>
                            <a href='#' >2</a>
                            <a href='#'>&rsaquo;</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<?php echo $this->element('footer'); ?>
<!-- END PRIMARY