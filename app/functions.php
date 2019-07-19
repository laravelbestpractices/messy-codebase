<?php

use App\Entries;

function InsertINTODB($i, $w, $h,$a, $d){
    $p = new Entries();
    $p->picsum_photo_id = $i;
    $p->width = $w;
    $p->height = $h;
    $p->votes = 0;
    $p->author = $a;
    $p->description = $d;

    $p->save();
}

function checkIFPhotoExists($photoid){
    $p = Entries::where('picsum_photo_id', $photoid)->first();
    if($p !== null)
        return true;
    else 
        return false;
}

function getHttpCode($http_response_header)
{
    if(is_array($http_response_header))
    {
        $parts=explode(' ',$http_response_header[0]);
        if(count($parts)>1) //HTTP/1.0 <code> <text>
            return intval($parts[1]); //Get code
    }
    return 0;
}
