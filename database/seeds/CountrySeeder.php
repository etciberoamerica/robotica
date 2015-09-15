<?php

use Illuminate\Database\Seeder;

use App\Country;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Country::create(['id' =>32,'name'=>'Argentina' ]);
        Country::create(['id' =>76,'name'=>'Brasil' ]);
        Country::create(['id' =>152,'name'=>'Chile' ]);
        Country::create(['id' =>188,'name'=>'Costa Rica' ]);
        Country::create(['id' =>218,'name'=>'Ecuador' ]);
        Country::create(['id' =>222,'name'=>'El Salvador' ]);
        Country::create(['id' =>320,'name'=>'Guatemala' ]);
        Country::create(['id' =>340,'name'=>'Honduras' ]);
        Country::create(['id' =>484,'name'=>'México' ]);
        Country::create(['id' =>558,'name'=>'Nicaragua' ]);
        Country::create(['id' =>591,'name'=>'Panamá' ]);
        Country::create(['id' =>600,'name'=>'Paraguay' ]);
        Country::create(['id' =>604,'name'=>'Perú' ]);
        Country::create(['id' =>620,'name'=>'Portugal' ]);
        Country::create(['id' =>724,'name'=>'España' ]);
        Country::create(['id' =>840,'name'=>'Estados Unidos' ]);
        Country::create(['id' =>858,'name'=>'Uruguay' ]);
        Country::create(['id' =>859,'name'=>'Republica Dominicana' ]);
    }
}
