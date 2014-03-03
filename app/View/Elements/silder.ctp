<!-- BEGIN NIVO SLIDER -->
<div id="slider-flexslider-elegant" class="slider slider-flexslider-elegant flexslider-elegant container flexslider">
    <ul class="slides" style="width:100%;height:400px;">
        <li>
            <?php echo $this->Html->image('posts/2.jpeg');?>
            <div class="slider-caption caption-right">
                <div class="caption-wrapper" >
                    <h2>A CLEAN CORPORATE THEME</h2>
                    <h4></h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec pulvinar turpis velit. Morbi rutrum, neque non pulvinar faucibus, ligula eros viverra ligula, et aliquam libero neque ac nisl.</p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <span class="special-font" style="font-size:24px;">
                        prices from <span style="font-size: 50px;">$45</span>
                    </span>
                </div>
            </div>
        </li>
        <li>
            <?php echo $this->Html->image('posts/3.jpg');?>
            <div class="slider-caption caption-right">
                <div class="caption-wrapper">
                    <h2>LOVE IT, ENJOY IT</h2>
                    <p>Curabitur pharetra accumsan sem, ac accumsan sapien tincidunt a. In hac habitasse platea dictumst. Donec lobortis purus ullamcorper risus posuere non euismod mi scelerisque. Nullam tincidunt varius metus sed elementum</p>
                    <p>&nbsp;</p>
                    <span class="special-font" style="font-size:24px;">
                        Love your <span style="font-size: 30px;">Freedom</span>
                    </span>
                </div>
            </div>
        </li>
        <li>
            <?php echo $this->Html->image('posts/3.jpg');?>
            <div class="slider-caption caption-right">
                <div class="caption-wrapper">
                    <h2>MULTIPURPOSE THEME</h2>
                    <h4></h4>
                    <p>Nam sagittis justo eget nunc hendrerit et semper magna feugiat. Proin eu dui ut elit auctor vehicula. Integer ut dui vitae felis venenatis dapibus.</p>
                    <p>&nbsp;</p>
                    <span class="special-font" style="font-size:24px;">
                        A creative <span style="font-size: 30px;">Portfolio theme</span>
                    </span>
                </div>
            </div>
        </li>
    </ul>
</div>

<script type="text/javascript">
    jQuery(document).ready(function($){
        var flex_caption_hide = function(slider) {
            var currSlideElement = slider;
            var caption_speed = 400;
            var width = parseInt( $('.slider-caption', currSlideElement).outerWidth() );
            var height = parseInt( $('.slider-caption', currSlideElement).outerHeight() );

            $('.caption-top', currSlideElement).animate({top:height*-1}, caption_speed);
            $('.caption-bottom', currSlideElement).animate({bottom:height*-1}, caption_speed);
            $('.caption-left', currSlideElement).animate({left:width*-1}, caption_speed);
            $('.caption-right', currSlideElement).animate({right:width*-1}, caption_speed);
        };

        var flex_caption_show = function(slider) {
            var nextSlideElement = slider;
            var caption_speed = 400;

            $('.caption-top', nextSlideElement).animate({top:0}, caption_speed);
            $('.caption-bottom', nextSlideElement).animate({bottom:0}, caption_speed);
            $('.caption-left', nextSlideElement).animate({left:0}, caption_speed);
            $('.caption-right', nextSlideElement).animate({right:0}, caption_speed);
        };

        $('#slider-flexslider-elegant').flexslider({
            animation: 'fade',
            slideshowSpeed: 3000,
            animationSpeed: 800,
            pauseOnAction: false,
            controlNav: false,
            directionNav: true,
            touch: false,
            start   : flex_caption_show,
            before  : flex_caption_hide,
            after   : flex_caption_show
        });
    });
</script>
