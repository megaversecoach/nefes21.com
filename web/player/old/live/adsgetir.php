<?php
$files = scandir('ads/');
 
$img = array();
foreach($files as $item){
    if(preg_match('#(.*?).mp4#',$item)) {
        $img[] = $item;
    }
}
$say = count($img);
$rastgele_cek = rand(0,$say - 1);
 
/**echo 'Seçilen resim: <img src="resimler/'.$img[$rastgele_cek].'">';*/



?>



<video controls width="450">


    <source src="ads/<?php echo $img[$rastgele_cek] ?>"
            type="video/mp4">

    Sorry, your browser doesn't support embedded videos.
</video>