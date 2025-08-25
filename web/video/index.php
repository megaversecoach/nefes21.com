
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>HLS Player</title>
    <script>
    // Sağ tıklama engelle
    document.addEventListener('contextmenu', event => event.preventDefault());
 
    document.onkeydown = function (e) {
 
        // F12 Engelle
        if(e.keyCode == 123) {
            return false;
        }
 
        // CTRL+I Engelle
        if(e.ctrlKey && e.shiftKey && e.keyCode == 73){
            return false;
        }
 
        // CTRL+J Engelle
        if(e.ctrlKey && e.shiftKey && e.keyCode == 74) {
            return false;
        }
 
        // CTRL+U Engelle
        if(e.ctrlKey && e.keyCode == 85) {
            return false;
        }
    }

    
 
</script>

<script>
window.console.log = function(){
  console.error('Malesef developer modu kapattık....');
  window.console.log = function() {
      return false;
  }
}

console.log('test');	
</script>



</head>

<body>


<noscript>
<h3>JavaScript devredışı. Bu şekilde içeriği görüntüleyemezsiniz.</h3>

<style type="text/css">
    #main-content { display:none; }
</style>
</noscript>



<div id="main-content">
<video id="video" width="100%" height="100%" controls controlsList="nodownload"></video>
    <script src="https://cdn.jsdelivr.net/npm/hls.js@latest"></script>
    <script>
        const video = document.getElementById('video');
        const videoSrc = 'https://nefes21.com/video/Files/test-video/output.m3u8';

        if (Hls.isSupported()) {
            const hls = new Hls();

            hls.loadSource(videoSrc);
            hls.attachMedia(video);
            hls.on(Hls.Events.MANIFEST_PARSED, () => {
                video.play();
            });
        } else if (video.canPlayType('application/vnd.apple.mpegurl')) {
            video.src = videoSrc;
            video.addEventListener('loadedmetadata', () => {
                video.play();
            });
        }
    </script></div>



  
</body>

</html>