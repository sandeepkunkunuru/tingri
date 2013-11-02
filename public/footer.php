<!--Social Media -->
<div class="container-fluid">
  <div class="row-fluid">
    <div class="span12">    
      <div>
        
        <!-- facebook -->
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>        
        
        <div class="fb-like" data-href="<?php echo 'http'.(empty($_SERVER['HTTPS'])?'':'s').'://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']   ?>" data-width="450" data-show-faces="true" data-send="false"></div>
        <!--<div class="fb-comments" data-href="<?php echo 'http'.(empty($_SERVER['HTTPS'])?'':'s').'://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']   ?>" data-width="470"></div> -->
        
        <!-- google plus -->
        
        <!-- Place this tag where you want the +1 button to render. -->
        <div class="g-plusone" data-size="medium" data-annotation="none"></div>

        <!-- Place this tag after the last +1 button tag. -->
        <script type="text/javascript">
          (function() {
            var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
            po.src = 'https://apis.google.com/js/plusone.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
          })();
        </script>

        <!-- Twitter -->
        
        <a href="https://twitter.com/share" class="twitter-share-button">Tweet</a>
        
       
        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script> 
      </div>
    </div>
  </div>
</div>