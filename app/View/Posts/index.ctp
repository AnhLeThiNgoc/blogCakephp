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
                                <h4><?php echo $this->Html->link($post['Post']['title'], array('controller' => 'posts', 'action' => 'view', $post['Post']['id']))?></h4>

                                <p><?php echo $post['Post']['body']; ?></p>
                                <p class="read-more">
                                    <?php 
                                        echo $this->Html->link('View Project', array('controller' => 'posts', 'action' => 'view', $post['Post']['id']));
                                        if($admin === '1') {
                                            echo $this->Form->postLink('Delete', array('action' => 'delete', $post['Post']['id']), array('confirm' => 'Are you sure.'));
                                            echo $this->Html->link('Edit', array('controller' => 'posts', 'action' => 'edit', $post['Post']['id']));
                                        }
                                    ?>
                                </p>
                            </li>
                        <?php endforeach; ?>
                        </ul>
                      
                        <div id="pagination">
                            <p>
                            <?php
                             
                            echo $this->Paginator->counter(array(
                            'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%')
                            ));
                            ?>   
                            </p>
                         
                            <div class="paging">
                                <?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
                             |  <?php echo $this->Paginator->numbers();?>
                         |
                                <?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>

                            </div>
                        </div>
                        
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<?php echo $this->element('footer'); ?>
<!-- END PRIMARY -->


