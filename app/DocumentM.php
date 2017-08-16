<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocumentM extends Model
{
    
    protected $table = 'tbl_document';

    protected $primaryKey = 'iddocument';

    protected $fillable = ['kategori', 'type', 'path', 'status'];
}
