<?php

include(__DIR__.'/init.php');


$stream = new Stream();

$stream->run();





// $k = $_GET['id'];

// $cache = new Cache($k);

// $sources = $cache->get();

// $q = 360;

// $file = $sources[$q]['file'];
// $size = $sources[$q]['size'];


// $stream = new Stream();
// $stream->setKey($k);
// $stream->load($file);


// if($stream->isOk())
// {
//     $stream->cros();

//     if($stream->isT1())
//     {
//         if(empty($size))
//         {
//             $vInfo = Helper::getVInfo($file, $k);
//             if(!empty($vInfo['fsize']))
//             {
//                 $sources[$q]['size'] = $size = $vInfo['fsize'];
//                 $cache->save($sources);
//             }
//         }
        
//         $stream->setMeta(['fsize'=>$size]);
//     }

//     $stream->start();
//     exit;
// }


// $k = 'lolypop';

// $cache = new Cache($k);

// $sources = $cache->get();

// $file = $sources[360]['file'];
// $size = $sources[360]['size'];


// $stream = new Stream();
// $stream->setKey($k);
// $stream->load($file);


// if($stream->isOk())
// {
//     $stream->cros();

//     if($stream->isT1())
//     {
//         if(empty($size))
//         {
//             $vInfo = Helper::getVInfo($file, $k);
//             if(!empty($vInfo['fsize']))
//             {
//                 $sources[360]['size'] = $size = $vInfo['fsize'];
//                 $cache->save($sources);
//             }
//         }
//         $stream->setMeta(['fsize'=>$size]);
//     }

//     $stream->start();
//     exit;
// }