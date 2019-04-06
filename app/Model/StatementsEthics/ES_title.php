<?php

namespace App\Model\StatementsEthics;

use Illuminate\Database\Eloquent\Model;

class ES_title extends Model
{
    protected $table = 'statements_ethics_title';

    public function ES_list(){
    	return $this->hasMany('\App\Model\StatementsEthics\ES_list','sel_title_id','id');
    }
}
