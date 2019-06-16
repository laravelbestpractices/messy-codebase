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

?>