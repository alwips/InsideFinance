<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProyekM extends Model
{
    
    protected $table = 'tbl_proyek';

    protected $primaryKey = 'idproyek';

    protected $fillable = ['noproyek', 'proyek', 'singkatnama', 'startdate', 'duedate', 'anggaran', 'photo', 'keterangan', 'status'];
}
