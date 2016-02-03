<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlockRise extends Model
{
    protected $table='rb_challenge_blockrise';
    protected $fillable= [
        'combat_id',
        'team_id_win',
        'team_id_1',
        'time_team_1',
        'zon_pun_roj_1',
        'num_api_roj_1',
        'zon_pun_ver_1',
        'num_api_ver_1',
        'zon_pun_azu_1',
        'num_api_azu_1',
        'scort_team_1',
        'team_id_2',
        'time_team_2',
        'zon_pun_roj_2',
        'num_api_roj_2',
        'zon_pun_ver_2',
        'num_api_ver_2',
        'zon_pun_azu_2',
        'num_api_azu_2',
        'scort_team_2',
        'firm_team_2',
        'firm_team_1'];
}
