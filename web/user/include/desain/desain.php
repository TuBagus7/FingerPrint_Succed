
<?php

//TOMBOL
function btn_tambah($namatombol) 
{ echo "<button class='Button Button--large' ><i class='fa fa-plus-square'></i> ".$namatombol."</button>"; };

function btn_export($namatombol) 
{ echo "<button class='Button Button--large' ><i class='fa fa-file-excel-o'></i> ".$namatombol."</button>"; };

function btn_cetak($namatombol) 
{ echo "<button class='Button Button--large' ><i class='fa fa-print'></i> ".$namatombol."</button>"; };

function btn_refresh($namatombol) 
{ echo "<button class='Button Button--large' ><i class='fa fa-Refresh'></i> ".$namatombol."</button>"; };

function btn_cari($namatombol) 
{ echo "<button class='small ui green button' ><i class='fa fa-search'></i> ".$namatombol."</button>"; };

function btn_detail($namatombol) 
{ echo "<button class='Button Button--small Button--primary' ><i class='fa fa-info'></i> ".$namatombol."</button>"; };

function btn_edit($namatombol) 
{ echo "<button class='Button Button--small Button--default' ><i class='fa fa-edit'></i> ".$namatombol."</button>"; };

function btn_hapus($namatombol) 
{ echo "<button class='Button Button--small Button--error' ><i class='fa fa-remove'></i> ".$namatombol."</button>"; };

function btn_pagination($namatombol) 
{ echo "<button class='mini ui green button' >".$namatombol."</button>"; };

function btn_ya($namatombol) 
{ echo "<button class='small ui green button' ><i class='fa fa-check'></i>".$namatombol."</button>"; };

function btn_tidak($namatombol) 
{ echo "<button class='small ui red button' ><i class='fa fa-remove'></i>".$namatombol."</button>"; };

function btn_kembali($namatombol) 
{ echo "<button class='Button Button--large' ><i class='fa fa-backward'></i>".$namatombol."</button>"; };

function btn_simpan($namatombol) 
{ echo "<button class='small ui green button' ><i class='fa fa-check'></i>".$namatombol."</button>"; };

//TABEL
function tabel($width,$satuan,$border,$align) 
{ echo "width='".$width.$satuan."' border='".$border."' align='".$align."' class='tblcms2'"; };


function tabel_in($width,$satuan,$border,$align) 
{ echo "width='".$width.$satuan."' border='".$border."' align='".$align."' class='tblcms'"; };
?>