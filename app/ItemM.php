<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemM extends Model
{
    
    protected $table = 'tbl_item';

    protected $primaryKey = 'iditem';

    protected $fillable = ['parent', 'nama', 'harga', 'status', 'idsatuan'];
}
