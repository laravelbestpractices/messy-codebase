<?php

use App\Entries;

function InsertINTODB($i, $w, $h,$a, $d){
    $p = new Entries();
    $p->photoid = $i;
    $p->Width = $w;
    $p->Height = $h;
    $p->Votes = 0;
    $p->Author = $a;
    $p->Description = $d;

    $p->save();
}

function checkIFPhotoExists($photoid){
    $p = Entries::where('photoid', $photoid)->first();
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
