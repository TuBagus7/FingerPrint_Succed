
<?php

//TOMBOL
function btn_tambah($namatombol) 
{ echo "<button class='btn btn-primary' ><i class='fa fa-plus-square'></i> ".$namatombol."</button>"; };

function btn_preview_laporan($namatombol) 
{ echo "<button class='btn btn-info' name='preview'><i class='fa fa-info'></i> ".$namatombol."</button>"; };

function btn_export_laporan($namatombol) 
{ echo "<button class='btn btn-danger' name='export'><i class='fa fa-file-excel-o'></i> ".$namatombol."</button>"; };

function btn_cetak_laporan($namatombol) 
{ echo "<button class='btn btn-warning' name='cetak'><i class='fa fa-print'></i> ".$namatombol."</button>"; };

function btn_export($namatombol) 
{ //echo "<button class='btn btn-primary' ><i class='fa fa-file-excel-o'></i> ".$namatombol."</button>"; 
};

function btn_cetak($namatombol) 
{ //echo "<button class='btn btn-primary' ><i class='fa fa-print'></i> ".$namatombol."</button>"; 
};

function btn_refresh($namatombol) 
{ echo "<button class='btn btn-primary' ><i class='fa fa-refresh'></i> ".$namatombol."</button>"; };

function btn_cari($namatombol) 
{ echo "<button class='btn btn-success' ><i class='fa fa-search'></i> ".$namatombol."</button>"; };

function btn_detail($namatombol) 
{ echo "<button class='btn btn-info btn-xs' ><i class='fa fa-info'></i> ".$namatombol."</button>"; };

function btn_edit($namatombol) 
{ echo "<button class='btn btn-warning btn-xs' ><i class='fa fa-edit'></i> ".$namatombol."</button>"; };

function btn_hapus($namatombol) 
{ echo "<button class='btn btn-danger btn-xs' ><i class='fa fa-remove'></i> ".$namatombol."</button>"; };

function btn_pagination($namatombol) 
{ echo "<button class='btn btn-info btn-xs' >".$namatombol."</button>"; };

function btn_ya($namatombol) 
{ echo "<button class='btn btn-success btn-xs' ><i class='fa fa-check'></i>".$namatombol."</button>"; };

function btn_tidak($namatombol) 
{ echo "<button class='btn btn-danger btn-xs' ><i class='fa fa-remove'></i>".$namatombol."</button>"; };

function btn_kembali($namatombol) 
{ echo "<button class='btn btn-primary' ><i class='fa fa-backward'></i>".$namatombol."</button>"; };

function btn_simpan($namatombol) 
{ echo "<button class='btn btn-success btn-xs' ><i class='fa fa-check'></i>".$namatombol."</button>"; };

function btn_update($namatombol) 
{ echo "<button class='btn btn-success btn-xs' ><i class='fa fa-check'></i>".$namatombol."</button>"; };


//TABEL
function tabel($width,$satuan,$border=0,$align) 
{ echo "width='".$width.$satuan."' border='".$border."' align='".$align."' class='table table-hover'"; };


function tabel_in($width,$satuan,$border,$align) 
{ echo "width='".$width.$satuan."' border='".$border."' align='".$align."' class='table'"; };
?>