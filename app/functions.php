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

?>