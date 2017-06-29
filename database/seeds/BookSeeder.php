<?php

use Illuminate\Database\Seeder;

class BookSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		DB::table( 'book_categories' )->insert( [
			[ 'name' => 'ŠKOLSKI PROGRAM', 'designation' => '01E', 'parent' => 0, 'coefficient' => 0 ], //1
			[ 'name' => 'Dječja knjiga', 'designation' => '02D', 'parent' => 0, 'coefficient' => 0 ], //2
			[ 'name' => 'Književnost', 'designation' => '03K', 'parent' => 0, 'coefficient' => 0 ], //3
			[ 'name' => 'STRUČNA IZDANJA', 'designation' => '04Z', 'parent' => 0, 'coefficient' => 0 ], //4
			[ 'name' => 'LEKSIKOGRAFIJA', 'designation' => '05J', 'parent' => 0, 'coefficient' => 0 ], //5
			[ 'name' => 'POPULARNA KNJIGA', 'designation' => '06I', 'parent' => 0, 'coefficient' => 0 ], //6
			[ 'name' => 'IGRAČKE', 'designation' => '07R', 'parent' => 0, 'coefficient' => 0 ], // 7
			[ 'name' => 'Gift/pokloni', 'designation' => '08P', 'parent' => 0, 'coefficient' => 0 ], // 8
			[ 'name' => 'Školski pribor', 'designation' => '09S', 'parent' => 0, 'coefficient' => 0 ], // 9
			[ 'name' => 'UREDSKI PRIBOR', 'designation' => '10B', 'parent' => 0, 'coefficient' => 0 ], // 10
			[ 'name' => 'GALANTERIJA', 'designation' => '11G', 'parent' => 0, 'coefficient' => 0 ], // 11
			[ 'name' => 'MULTIMEDIJA', 'designation' => '12M', 'parent' => 0, 'coefficient' => 0 ], // 12
			[ 'name' => 'LEKTIRA', 'designation' => '03L', 'parent' => 0, 'coefficient' => 0 ], // 13

			[ 'name' => 'Didaktika', 'designation' => '01ED', 'parent' => '1', 'coefficient' => 60 ],
			[
				'name'        => 'OSNOVNA ŠKOLA',
				'designation' => '01EO',
				'parent'      => '1', 'coefficient' => 45
			],
			[
				'name'        => 'SREDNJA ŠKOLA',
				'designation' => '01ES',
				'parent'      => '1', 'coefficient' => 45
			],
			[
				'name'        => 'Tečajevi jezika',
				'designation' => '01ET',
				'parent'      => '1', 'coefficient' => 40
			],

			[ 'name' => 'Predškola', 'designation' => '02DE', 'parent' => '2', 'coefficient' => 60 ],
			[
				'name'        => 'Bojanke + naljepnice',
				'designation' => '02DN',
				'parent'      => '2', 'coefficient' => 60
			],
			[
				'name'        => 'Slikovnice',
				'designation' => '02DS',
				'parent'      => '2', 'coefficient' => 60
			],
			[
				'name'        => 'Pjesništvo',
				'designation' => '03KL',
				'parent'      => '3', 'coefficient' => 60
			],
			[ 'name' => 'Proza', 'designation' => '03KP', 'parent' => '3', 'coefficient' => 60 ],

			[
				'name'        => 'Društvene znanosti',
				'designation' => '04ZD',
				'parent'      => '4', 'coefficient' => 60
			],
			[
				'name'        => 'Humanističke znanosti',
				'designation' => '04ZH',
				'parent'      => '4', 'coefficient' => 60
			],
			[
				'name'        => 'Medicinske znanosti',
				'designation' => '04ZM',
				'parent'      => '4', 'coefficient' => 60
			],
			[
				'name'        => 'Prirodne i tehničke znanosti',
				'designation' => '04ZP',
				'parent'      => '4', 'coefficient' => 40
			],
			[
				'name'        => 'Šumarstvo,poljoprivreda, ribarstvo',
				'designation' => '04ZS',
				'parent'      => '4', 'coefficient' => 60
			],
			[ 'name' => 'Umjetnost', 'designation' => '04ZU', 'parent' => '4', 'coefficient' => 60 ],

			[
				'name'        => 'Enciklopedije',
				'designation' => '05JE',
				'parent'      => '5', 'coefficient' => 40
			],
			[
				'name'        => 'Gramatike i pravopisi',
				'designation' => '05JG',
				'parent'      => '5', 'coefficient' => 40
			],
			[ 'name' => 'Leksikoni', 'designation' => '05JL', 'parent' => '5', 'coefficient' => 60 ],
			[ 'name' => 'Rječnici', 'designation' => '05JR', 'parent' => '5', 'coefficient' => 60 ],

			[
				'name'        => 'Popularna psihologija, samopomoć, alternativa, na rubu znanosti',
				'designation' => '06IA',
				'parent'      => '6', 'coefficient' => 60
			],
			[
				'name'        => 'Dom, Priroda,  vrt i kućni ljubimci',
				'designation' => '06ID',
				'parent'      => '6', 'coefficient' => 40
			],
			[
				'name'        => 'Gastronomija i enologija',
				'designation' => '06IG',
				'parent'      => '6', 'coefficient' => 45
			],
			[
				'name'        => 'Hobi i slobodno vrijeme',
				'designation' => '06IH',
				'parent'      => '6', 'coefficient' => 45
			],
			[
				'name'        => 'Popularne monografije',
				'designation' => '06IM',
				'parent'      => '6', 'coefficient' => 40
			],
			[
				'name'        => 'Zdravlje, obitelj roditeljstvo',
				'designation' => '06IO',
				'parent'      => '6', 'coefficient' => 40
			],
			[
				'name'        => 'Publicistika',
				'designation' => '06IP',
				'parent'      => '6', 'coefficient' => 60
			],
			[ 'name' => 'Sport', 'designation' => '06IS', 'parent' => '6', 'coefficient' => 40 ],
			[ 'name' => 'Turistika', 'designation' => '06IT', 'parent' => '6', 'coefficient' => 45 ],
			[ 'name' => 'Umjetnost', 'designation' => '06IU', 'parent' => '6', 'coefficient' => 45 ],
			[
				'name'        => 'Popularna znanost',
				'designation' => '06IZ',
				'parent'      => '6', 'coefficient' => 40
			],

			[ 'name' => 'IGRAČKE', 'designation' => '07RR', 'parent' => '7', 'coefficient' => 60 ],
			[
				'name'        => 'Gift/pokloni',
				'designation' => '08PP',
				'parent'      => '8', 'coefficient' => 60
			],
			[
				'name'        => 'Školski pribor ',
				'designation' => '09SS',
				'parent'      => '9', 'coefficient' => 60
			],
			[
				'name'        => 'Pribor za arhiviranje',
				'designation' => '10BA',
				'parent'      => '10', 'coefficient' => 60
			],
			[ 'name' => 'Ostalo', 'designation' => '10BO', 'parent' => '10', 'coefficient' => 60 ],
			[
				'name'        => 'Pisaći pribor',
				'designation' => '10BP',
				'parent'      => '10', 'coefficient' => 60
			],
			[
				'name'        => 'Stolni pribor',
				'designation' => '10BS',
				'parent'      => '10', 'coefficient' => 60
			],
			[
				'name'        => 'Pribor za  uvezivanje, pečatiranje',
				'designation' => '10BU',
				'parent'      => '10', 'coefficient' => 60
			],
			[
				'name'        => 'Dodaci za torbe',
				'designation' => '11GD',
				'parent'      => '11', 'coefficient' => 60
			],
			[
				'name'        => 'Futrole i etui, mape',
				'designation' => '11GF',
				'parent'      => '11', 'coefficient' => 60
			],
			[
				'name'        => 'Novčanici',
				'designation' => '11GN',
				'parent'      => '11', 'coefficient' => 60
			],
			[ 'name' => 'Pernice', 'designation' => '11GP', 'parent' => '11', 'coefficient' => 60 ],
			[ 'name' => 'Sezona', 'designation' => '11GS', 'parent' => '11', 'coefficient' => 60 ],
			[
				'name'        => 'Torbe i ruksaci',
				'designation' => '11GT',
				'parent'      => '11', 'coefficient' => 60
			],
			[
				'name'        => 'Podatkovni mediji',
				'designation' => '12MB',
				'parent'      => '12', 'coefficient' => 60
			],
			[
				'name'        => 'Dodaci računalnoj opremi',
				'designation' => '12MD',
				'parent'      => '12', 'coefficient' => 60
			],
			[
				'name'        => 'Edukacija',
				'designation' => '12ME',
				'parent'      => '12', 'coefficient' => 60
			],
			[
				'name'        => 'Fotoaparati, kamere',
				'designation' => '12MF',
				'parent'      => '12', 'coefficient' => 60
			],
			[
				'name'        => 'Potošni informatički materijal',
				'designation' => '12MI',
				'parent'      => '12', 'coefficient' => 60
			],
			[ 'name' => 'Mobiteli', 'designation' => '12MM', 'parent' => '12', 'coefficient' => 60 ],
			[
				'name'        => 'Računalna periferija',
				'designation' => '12MP',
				'parent'      => '12', 'coefficient' => 60
			],
			[
				'name'        => 'Računalna oprema',
				'designation' => '12MR',
				'parent'      => '12', 'coefficient' => 60
			],
			[ 'name' => 'Sezona', 'designation' => '12MS', 'parent' => '12', 'coefficient' => 60 ],
			[ 'name' => 'Zabava', 'designation' => '12MZ', 'parent' => '12', 'coefficient' => 60 ],
			[
				'name'        => 'LEKTIRA OBVEZATNA',
				'designation' => '03LO',
				'parent'      => '13', 'coefficient' => 60
			],
			[
				'name'        => 'LEKTIRA NEOBVEZATNA',
				'designation' => '03LP',
				'parent'      => '13', 'coefficient' => 60
			],

			[
				'name'        => 'Didaktika osnovna škola',
				'designation' => '01ED1',
				'parent'      => '14', 'coefficient' => 0
			],
			[
				'name'        => 'Didaktika srednja škola',
				'designation' => '01ED2',
				'parent'      => '14', 'coefficient' => 0
			],
			[
				'name'        => 'Didaktika testovi',
				'designation' => '01ED3',
				'parent'      => '14', 'coefficient' => 0
			],
			[
				'name'        => 'Mape za likovni',
				'designation' => '01ED4',
				'parent'      => '14', 'coefficient' => 0
			],
			[
				'name'        => 'Atlasi i karte',
				'designation' => '01ED5',
				'parent'      => '14', 'coefficient' => 0
			],
			[
				'name'        => 'Piručnici za nastavnike uz udžbenike',
				'designation' => '01ED6',
				'parent'      => '14', 'coefficient' => 0
			],
			[
				'name'        => 'Plakati, cd-i, flash kartice i ostali materijali za nastavu',
				'designation' => '01ED7',
				'parent'      => '14', 'coefficient' => 0
			],
			[
				'name'        => 'Stari udžbenici drugih izdavača',
				'designation' => '01ED8',
				'parent'      => '14', 'coefficient' => 0
			],

			[
				'name'        => 'Osnovna škola A razredna nastava',
				'designation' => '01EO1',
				'parent'      => '15', 'coefficient' => 0
			],
			[
				'name'        => 'Osnovna škola B predmetna nastava',
				'designation' => '01EO2',
				'parent'      => '15', 'coefficient' => 0
			],
			[
				'name'        => 'Osnovna škola C sva',
				'designation' => '01EO3',
				'parent'      => '15', 'coefficient' => 0
			],

			[
				'name'        => 'Srednja škola - gimnazije',
				'designation' => '01ES1',
				'parent'      => '16', 'coefficient' => 0
			],
			[
				'name'        => 'Srednja škola - strukovne škole',
				'designation' => '01ES2',
				'parent'      => '16', 'coefficient' => 0
			],
			[
				'name'        => 'Srednja škola sva',
				'designation' => '01ES3',
				'parent'      => '16', 'coefficient' => 0
			],

			[
				'name'        => 'Udžbenici za tečajeve',
				'designation' => '01ET1',
				'parent'      => '17', 'coefficient' => 0
			],
			[
				'name'        => 'Radne bilježnice za tečajeve',
				'designation' => '01ET2',
				'parent'      => '17', 'coefficient' => 0
			],
			[
				'name'        => 'Dodaci uz tečaj za učenike',
				'designation' => '01ET3',
				'parent'      => '17', 'coefficient' => 0
			],
			[
				'name'        => 'Dodaci uz tečaj za profesore',
				'designation' => '01ET4',
				'parent'      => '17', 'coefficient' => 0
			],

			[
				'name'        => 'Vježbenice mala škola',
				'designation' => '02DE1',
				'parent'      => '18', 'coefficient' => 0
			],
			[
				'name'        => 'Početno učenje jezika',
				'designation' => '02DE2',
				'parent'      => '18', 'coefficient' => 0
			],
			[
				'name'        => 'Dječji atlasi',
				'designation' => '02DE3',
				'parent'      => '18', 'coefficient' => 0
			],
			[
				'name'        => 'Dječje enciklopedije i rječnici',
				'designation' => '02DE4',
				'parent'      => '18', 'coefficient' => 0
			],
			[
				'name'        => 'Slikovnice za igru i učenje',
				'designation' => '02DE5',
				'parent'      => '18', 'coefficient' => 0
			],
			[
				'name'        => 'Priručnici za roditelje i dodatni materijali',
				'designation' => '02DE6',
				'parent'      => '18', 'coefficient' => 0
			],

			[ 'name' => 'Bojanke', 'designation' => '02DN1', 'parent' => '19', 'coefficient' => 60 ],
			[
				'name'        => 'Slikovnice sa naljepnicama',
				'designation' => '02DN2',
				'parent'      => '19', 'coefficient' => 0
			],

			[
				'name'        => 'Audio slikovnice',
				'designation' => '02DS1',
				'parent'      => '20', 'coefficient' => 0
			],
			[
				'name'        => 'Slikovnice sa igračkama',
				'designation' => '02DS2',
				'parent'      => '20', 'coefficient' => 0
			],
			[
				'name'        => 'Slikovnice pjesmarice',
				'designation' => '02DS3',
				'parent'      => '20', 'coefficient' => 0
			],
			[
				'name'        => 'Religijske slikovnice',
				'designation' => '02DS4',
				'parent'      => '20', 'coefficient' => 0
			],
			[
				'name'        => '3D slikovnice',
				'designation' => '02DS5',
				'parent'      => '20', 'coefficient' => 0
			],
			[
				'name'        => 'Sezonske slikovnice - Uskrs, Božić',
				'designation' => '02DS6',
				'parent'      => '20', 'coefficient' => 0
			],

			[ 'name' => 'Poezija', 'designation' => '03KL1', 'parent' => '21', 'coefficient' => 0 ],

			[
				'name'        => 'Antologije i izbori',
				'designation' => '03KP1',
				'parent'      => '22', 'coefficient' => 0
			],
			[
				'name'        => 'Dječja književnost',
				'designation' => '03KP2',
				'parent'      => '22', 'coefficient' => 0
			],
			[
				'name'        => 'Teen, književnost za mlade',
				'designation' => '03KP3',
				'parent'      => '22', 'coefficient' => 0
			],
			[ 'name' => 'Klasici', 'designation' => '03KP4', 'parent' => '22', 'coefficient' => 0 ],
			[
				'name'        => 'Suvremena književnost',
				'designation' => '03KP5',
				'parent'      => '22', 'coefficient' => 0
			],
			[
				'name'        => 'Akcija i avantura, pustolovni romani',
				'designation' => '03KP6',
				'parent'      => '22', 'coefficient' => 0
			],
			[
				'name'        => 'Znanstvena fantastika i fantazija',
				'designation' => '03KP7',
				'parent'      => '22', 'coefficient' => 0
			],
			[
				'name'        => 'Trileri i krimi romani',
				'designation' => '03KP8',
				'parent'      => '22', 'coefficient' => 0
			],
			[ 'name' => 'Horor', 'designation' => '03KP9', 'parent' => '22', 'coefficient' => 0 ],
			[
				'name'        => 'Ljubavni, erotski i chick lit romani',
				'designation' => '03KP10',
				'parent'      => '22', 'coefficient' => 0
			],
			[
				'name'        => 'New age',
				'designation' => '03KP11',
				'parent'      => '22', 'coefficient' => 0
			],
			[
				'name'        => 'Povijesni romani',
				'designation' => '03KP12',
				'parent'      => '22', 'coefficient' => 0
			],
			[
				'name'        => 'Putopisi',
				'designation' => '03KP13',
				'parent'      => '22', 'coefficient' => 0
			],
			[
				'name'        => 'Humor, humoristički roman',
				'designation' => '03KP14',
				'parent'      => '22', 'coefficient' => 0
			],
			[
				'name'        => 'Knjižice na dar - aforizmi, poslovice, misli',
				'designation' => '03KP15',
				'parent'      => '22', 'coefficient' => 0
			],
			[
				'name'        => 'Pripovijetke, novele - kraća literarna djela',
				'designation' => '03KP16',
				'parent'      => '22', 'coefficient' => 0
			],
			[
				'name'        => 'Kršćanska literatura',
				'designation' => '03KP17',
				'parent'      => '22', 'coefficient' => 0
			],
			[
				'name'        => 'Biografije i memoari',
				'designation' => '03KP18',
				'parent'      => '22', 'coefficient' => 0
			],
			[
				'name'        => 'Eseji i kritike',
				'designation' => '03KP19',
				'parent'      => '22', 'coefficient' => 0
			],


			[
				'name'        => 'Ekonomija',
				'designation' => '04ZD1',
				'parent'      => '23', 'coefficient' => 0
			],
			[
				'name'        => 'Pedagogija',
				'designation' => '04ZD2',
				'parent'      => '23', 'coefficient' => 0
			],
			[
				'name'        => 'Novinarstvo I komunikologija',
				'designation' => '04ZD3',
				'parent'      => '23', 'coefficient' => 0
			],
			[ 'name' => 'Pravo', 'designation' => '04ZD4', 'parent' => '23', 'coefficient' => 0 ],
			[
				'name'        => 'Kineziologija',
				'designation' => '04ZD5',
				'parent'      => '23', 'coefficient' => 0
			],
			[
				'name'        => 'Politologija',
				'designation' => '04ZD6',
				'parent'      => '23', 'coefficient' => 0
			],
			[
				'name'        => 'Psihologija',
				'designation' => '04ZD7',
				'parent'      => '23', 'coefficient' => 0
			],
			[
				'name'        => 'Edukacijsko rehabilitacijske znanosti',
				'designation' => '04ZD8',
				'parent'      => '23', 'coefficient' => 0
			],
			[
				'name'        => 'Sociologija',
				'designation' => '04ZD9',
				'parent'      => '23', 'coefficient' => 0
			],
			[
				'name'        => 'Turizam i ugostiteljstvo',
				'designation' => '04ZD10',
				'parent'      => '23', 'coefficient' => 0
			],

			[
				'name'        => 'Antropologija i etnologija',
				'designation' => '04ZH1',
				'parent'      => '24', 'coefficient' => 0
			],
			[
				'name'        => 'Bibliotekarstvo',
				'designation' => '04ZH2',
				'parent'      => '24', 'coefficient' => 0
			],
			[
				'name'        => 'Filozofija, etika, logika',
				'designation' => '04ZH3',
				'parent'      => '24', 'coefficient' => 0
			],
			[
				'name'        => 'Filologija, lingvistika, teorija i povijest književnosti',
				'designation' => '04ZH4',
				'parent'      => '24', 'coefficient' => 0
			],
			[
				'name'        => 'Arheologija',
				'designation' => '04ZH5',
				'parent'      => '24', 'coefficient' => 0
			],
			[
				'name'        => 'Povijest',
				'designation' => '04ZH6',
				'parent'      => '24', 'coefficient' => 0
			],
			[
				'name'        => 'Religija, teologija, mitologija',
				'designation' => '04ZH7',
				'parent'      => '24', 'coefficient' => 0
			],

			[
				'name'        => 'Medicina',
				'designation' => '04ZM1',
				'parent'      => '25', 'coefficient' => 0
			],
			[
				'name'        => 'Farmacija',
				'designation' => '04ZM2',
				'parent'      => '25', 'coefficient' => 0
			],
			[
				'name'        => 'Stomatologija',
				'designation' => '04ZM3',
				'parent'      => '25', 'coefficient' => 0
			],
			[
				'name'        => 'Veterina',
				'designation' => '04ZM4',
				'parent'      => '25', 'coefficient' => 0
			],

			[
				'name'        => 'Matematika',
				'designation' => '04ZP1',
				'parent'      => '26', 'coefficient' => 0
			],
			[ 'name' => 'Fizika', 'designation' => '04ZP2', 'parent' => '26', 'coefficient' => 0 ],
			[
				'name'        => 'Astronomija',
				'designation' => '04ZP3',
				'parent'      => '26', 'coefficient' => 0
			],
			[
				'name'        => 'Meteorologija',
				'designation' => '04ZP4',
				'parent'      => '26', 'coefficient' => 0
			],
			[
				'name'        => 'Geografija',
				'designation' => '04ZP5',
				'parent'      => '26', 'coefficient' => 0
			],
			[
				'name'        => 'Geologija',
				'designation' => '04ZP6',
				'parent'      => '26', 'coefficient' => 0
			],
			[ 'name' => 'Kemija', 'designation' => '04ZP7', 'parent' => '26', 'coefficient' => 0 ],
			[
				'name'        => 'Biologija',
				'designation' => '04ZP8',
				'parent'      => '26', 'coefficient' => 0
			],
			[
				'name'        => 'Ekologija',
				'designation' => '04ZP9',
				'parent'      => '26', 'coefficient' => 0
			],
			[
				'name'        => 'Elektrotehnika',
				'designation' => '04ZP10',
				'parent'      => '26', 'coefficient' => 0
			],
			[
				'name'        => 'Informacijska tehnologija i elektronika',
				'designation' => '04ZP11',
				'parent'      => '26', 'coefficient' => 0
			],
			[
				'name'        => 'Građevinarstvo',
				'designation' => '04ZP12',
				'parent'      => '26', 'coefficient' => 0
			],
			[
				'name'        => 'Strojarstvo, metalurgija',
				'designation' => '04ZP13',
				'parent'      => '26', 'coefficient' => 0
			],
			[
				'name'        => 'Grafička djelatnost',
				'designation' => '04ZP14',
				'parent'      => '26', 'coefficient' => 0
			],
			[
				'name'        => 'Pomorstvo i promet',
				'designation' => '04ZP15',
				'parent'      => '26', 'coefficient' => 0
			],


			[
				'name'        => 'Šumarstvo,poljoprivreda, ribarstvo',
				'designation' => '04ZS1',
				'parent'      => '27', 'coefficient' => 0
			],

			[
				'name'        => 'Povijest umjentosti',
				'designation' => '04ZU1',
				'parent'      => '28', 'coefficient' => 0
			],
			[
				'name'        => 'Arhitektura',
				'designation' => '04ZU2',
				'parent'      => '28', 'coefficient' => 0
			],
			[ 'name' => 'Dizajn', 'designation' => '04ZU3', 'parent' => '28', 'coefficient' => 0 ],
			[
				'name'        => 'Fotografija',
				'designation' => '04ZU4',
				'parent'      => '28', 'coefficient' => 0
			],
			[
				'name'        => 'Glazbena umjetnost, ples',
				'designation' => '04ZU5',
				'parent'      => '28', 'coefficient' => 0
			],
			[
				'name'        => 'Filmska umjetnost',
				'designation' => '04ZU6',
				'parent'      => '28', 'coefficient' => 0
			],
			[
				'name'        => 'Kazališna i scenska umjetnost',
				'designation' => '04ZU7',
				'parent'      => '28', 'coefficient' => 0
			],
			[
				'name'        => 'Likovna umjetnost',
				'designation' => '04ZU8',
				'parent'      => '28', 'coefficient' => 0
			],
			[ 'name' => 'Moda', 'designation' => '04ZU9', 'parent' => '28', 'coefficient' => 0 ],
			[ 'name' => 'Strip', 'designation' => '04ZU10', 'parent' => '28', 'coefficient' => 0 ],

			[
				'name'        => 'Enciklopedije',
				'designation' => '05JE1',
				'parent'      => '29', 'coefficient' => 0
			],

			[
				'name'        => 'Hrvatske gramatike i jezični priručnici',
				'designation' => '05JG1',
				'parent'      => '30', 'coefficient' => 0
			],
			[
				'name'        => 'Strane gramatike i jezični priručnici',
				'designation' => '05JG2',
				'parent'      => '30', 'coefficient' => 0
			],
			[
				'name'        => 'Pravopisi',
				'designation' => '05JG3',
				'parent'      => '30', 'coefficient' => 0
			],

			[
				'name'        => 'Leksikoni',
				'designation' => '05JL1',
				'parent'      => '31', 'coefficient' => 0
			],

			[
				'name'        => 'Rječnici opći - mali',
				'designation' => '05JR1',
				'parent'      => '32', 'coefficient' => 0
			],
			[
				'name'        => 'Rječnici opći - veliki',
				'designation' => '05JR2',
				'parent'      => '32', 'coefficient' => 0
			],
			[
				'name'        => 'Rječnici opći - srednji',
				'designation' => '05JR3',
				'parent'      => '32', 'coefficient' => 0
			],
			[
				'name'        => 'Stručni rječnici',
				'designation' => '05JR4',
				'parent'      => '32', 'coefficient' => 0
			],

			[
				'name'        => 'Alternativa - alternativna medicina i  ezoterija',
				'designation' => '06IA1',
				'parent'      => '33', 'coefficient' => 0
			],
			[
				'name'        => 'Popularna psihologija, samopomoć',
				'designation' => '06IA2',
				'parent'      => '33', 'coefficient' => 0
			],
			[
				'name'        => 'Na rubu znanosti',
				'designation' => '06IA3',
				'parent'      => '33', 'coefficient' => 0
			],

			[
				'name'        => 'Uređenje doma',
				'designation' => '06ID1',
				'parent'      => '34', 'coefficient' => 0
			],
			[
				'name'        => 'Vrtlarstvo i hortikultura',
				'designation' => '06ID2',
				'parent'      => '34', 'coefficient' => 0
			],
			[
				'name'        => 'Kućni ljubimci',
				'designation' => '06ID3',
				'parent'      => '34', 'coefficient' => 0
			],
			[
				'name'        => 'Priroda - životinje, drveće, planine, šume',
				'designation' => '06ID4',
				'parent'      => '34', 'coefficient' => 0
			],

			[
				'name'        => 'Kuharice',
				'designation' => '06IG1',
				'parent'      => '35', 'coefficient' => 0
			],
			[
				'name'        => 'Pića - enologija',
				'designation' => '06IG2',
				'parent'      => '35', 'coefficient' => 0
			],

			[
				'name'        => 'Rukotvorine, origami, sakupljanje, numizmatika',
				'designation' => '06IH1',
				'parent'      => '36', 'coefficient' => 0
			],
			[
				'name'        => 'Društvene igre',
				'designation' => '06IH2',
				'parent'      => '36', 'coefficient' => 0
			],
			[
				'name'        => 'Planinarenje i alpinizam',
				'designation' => '06IH3',
				'parent'      => '36', 'coefficient' => 0
			],
			[
				'name'        => 'Lov i ribolov',
				'designation' => '06IH4',
				'parent'      => '36', 'coefficient' => 0
			],
			[ 'name' => 'Oružje', 'designation' => '06IH5', 'parent' => '36', 'coefficient' => 0 ],

			[
				'name'        => 'Umjetnost',
				'designation' => '06IM1',
				'parent'      => '37', 'coefficient' => 0
			],

			[
				'name'        => 'Ljepota i zdravlje',
				'designation' => '06IO1',
				'parent'      => '38', 'coefficient' => 0
			],
			[
				'name'        => 'Fitness, vježbanje',
				'designation' => '06IO2',
				'parent'      => '38', 'coefficient' => 0
			],
			[
				'name'        => 'Zdrava prehrana',
				'designation' => '06IO3',
				'parent'      => '38', 'coefficient' => 0
			],
			[
				'name'        => 'Dijete - zdravo  mršavljenje',
				'designation' => '06IO4',
				'parent'      => '38', 'coefficient' => 0
			],
			[
				'name'        => 'Ljekovito bilje - uzgoj, lječenje, prepoznavanje',
				'designation' => '06IO5',
				'parent'      => '38', 'coefficient' => 0
			],
			[
				'name'        => 'Ljubav i odnosi',
				'designation' => '06IO6',
				'parent'      => '38', 'coefficient' => 0
			],
			[
				'name'        => 'Trudnoća',
				'designation' => '06IO7',
				'parent'      => '38', 'coefficient' => 0
			],
			[
				'name'        => 'Majčinstvo + radosnice',
				'designation' => '06IO8',
				'parent'      => '38', 'coefficient' => 0
			],
			[
				'name'        => 'Odgoj, razvoj i pravilna prehrana djeteta',
				'designation' => '06IO9',
				'parent'      => '38', 'coefficient' => 0
			],

			[
				'name'        => 'Biografije',
				'designation' => '06IP1',
				'parent'      => '39', 'coefficient' => 0
			],
			[
				'name'        => 'Povijest i politika',
				'designation' => '06IP2',
				'parent'      => '39', 'coefficient' => 0
			],

			[
				'name'        => 'Sportovi',
				'designation' => '06IS1',
				'parent'      => '40', 'coefficient' => 0
			],

			[
				'name'        => 'Turističke monografije, vodiči',
				'designation' => '06IT1',
				'parent'      => '41', 'coefficient' => 0
			],
			[
				'name'        => 'Turističke karte, planinarske karte, auto karte',
				'designation' => '06IT2',
				'parent'      => '41', 'coefficient' => 0
			],
			[
				'name'        => 'Monografije gradova, država',
				'designation' => '06IT3',
				'parent'      => '41', 'coefficient' => 0
			],
			[
				'name'        => 'Putopisi',
				'designation' => '06IT4',
				'parent'      => '41', 'coefficient' => 0
			],

			[
				'name'        => 'Povijest umjentosti',
				'designation' => '06IU1',
				'parent'      => '42', 'coefficient' => 0
			],
			[
				'name'        => 'Arhitektura',
				'designation' => '06IU2',
				'parent'      => '42', 'coefficient' => 0
			],
			[ 'name' => 'Dizajn', 'designation' => '06IU3', 'parent' => '42', 'coefficient' => 0 ],
			[
				'name'        => 'Fotografija',
				'designation' => '06IU4',
				'parent'      => '42', 'coefficient' => 0
			],
			[
				'name'        => 'Glazbena umjetnost, ples',
				'designation' => '06IU5',
				'parent'      => '42', 'coefficient' => 0
			],
			[
				'name'        => 'Filmska umjetnost',
				'designation' => '06IU6',
				'parent'      => '42', 'coefficient' => 0
			],
			[
				'name'        => 'Kazališna i scenska umjetnost',
				'designation' => '06IU7',
				'parent'      => '42', 'coefficient' => 0
			],
			[
				'name'        => 'Likovna umjetnost',
				'designation' => '06IU8',
				'parent'      => '42', 'coefficient' => 0
			],
			[ 'name' => 'Moda', 'designation' => '06IU9', 'parent' => '42', 'coefficient' => 0 ],
			[ 'name' => 'Strip', 'designation' => '06IU10', 'parent' => '42', 'coefficient' => 0 ],

			[
				'name'        => 'Popularna ekonomija',
				'designation' => '06IZ1',
				'parent'      => '43', 'coefficient' => 0
			],
			[
				'name'        => 'Popularna znanost',
				'designation' => '06IZ2',
				'parent'      => '43', 'coefficient' => 0
			],

			[
				'name'        => 'Edukativa i instrumenti',
				'designation' => '07RRE',
				'parent'      => '44', 'coefficient' => 0
			],
			[
				'name'        => 'Igre i igračke',
				'designation' => '07RRI',
				'parent'      => '44', 'coefficient' => 0
			],
			[
				'name'        => 'Kreativa',
				'designation' => '07RRK',
				'parent'      => '44', 'coefficient' => 0
			],
			[ 'name' => 'Sezona', 'designation' => '07RRS', 'parent' => '44', 'coefficient' => 0 ],

			[
				'name'        => 'Aroma setovi, svijeće',
				'designation' => '08PPA',
				'parent'      => '45', 'coefficient' => 0
			],
			[
				'name'        => 'ČESTITKE, RAZGLEDNICE,  POZIVNICE, BOOKMARKERI, RADOSNICE',
				'designation' => '08PPC',
				'parent'      => '45', 'coefficient' => 0
			],
			[
				'name'        => 'Notesi, planeri,dnevnici',
				'designation' => '08PPD',
				'parent'      => '45', 'coefficient' => 0
			],
			[
				'name'        => 'Figurice, Suveniri, Šalice, T shirts',
				'designation' => '08PPF',
				'parent'      => '45', 'coefficient' => 0
			],
			[
				'name'        => 'KIŠOBRANI, SUNCOBRANI',
				'designation' => '08PPI',
				'parent'      => '45', 'coefficient' => 0
			],
			[
				'name'        => 'Kalendari i posteri',
				'designation' => '08PPK',
				'parent'      => '45', 'coefficient' => 0
			],
			[
				'name'        => 'Nakit, bedževi, privjesci magneti',
				'designation' => '08PPN',
				'parent'      => '45', 'coefficient' => 0
			],
			[
				'name'        => 'Party ( papirnati tanjuri i čaše, pribor za jelo, salvete, svjećice, baloni)',
				'designation' => '08PPP',
				'parent'      => '45', 'coefficient' => 0
			],
			[
				'name'        => 'Božić nakit za bor, dekoracije, adventski vjenci, lampice, ostalo',
				'designation' => '08PPR',
				'parent'      => '45', 'coefficient' => 0
			],
			[
				'name'        => 'Sezona karneval, maske, šminka, perike, odjeća Uskrs, boje za jaja',
				'designation' => '08PPS',
				'parent'      => '45', 'coefficient' => 0
			],
			[ 'name' => 'Satovi', 'designation' => '08PPT', 'parent' => '45', 'coefficient' => 0 ],
			[
				'name'        => 'Ukrasni artikli i vrećice, ukrasni papir, fotoalbumi',
				'designation' => '08PPU',
				'parent'      => '45', 'coefficient' => 0
			],

			[
				'name'        => 'Bilježnice',
				'designation' => '09SSB',
				'parent'      => '46', 'coefficient' => 0
			],
			[
				'name'        => 'NALJEPNICE, ETIKETE',
				'designation' => '09SSE',
				'parent'      => '46', 'coefficient' => 0
			],
			[
				'name'        => 'BLOKOVI, POST-IT, KOLAŽ  PAPIR',
				'designation' => '09SSL',
				'parent'      => '46', 'coefficient' => 0
			],
			[
				'name'        => 'Školski obrasci',
				'designation' => '09SSM',
				'parent'      => '46', 'coefficient' => 0
			],
			[
				'name'        => 'Nastavna pomagala  (mikroskopi, globusi, zemljopisne karte zidne, stolne, ploče)',
				'designation' => '09SSN',
				'parent'      => '46', 'coefficient' => 0
			],
			[ 'name' => 'Omoti', 'designation' => '09SSO', 'parent' => '46', 'coefficient' => 0 ],
			[
				'name'        => 'Pribor za crtanje, modeliranje i geometriju i kaligrafiju',
				'designation' => '09SSP',
				'parent'      => '46', 'coefficient' => 0
			],

			[
				'name'        => 'Fascikli',
				'designation' => '10BAF',
				'parent'      => '47', 'coefficient' => 0
			],
			[ 'name' => 'KUVERTE', 'designation' => '10BAK', 'parent' => '47', 'coefficient' => 0 ],
			[
				'name'        => 'Registratori, mape',
				'designation' => '10BAR',
				'parent'      => '47', 'coefficient' => 0
			],

			[
				'name'        => 'Koševi za smeće',
				'designation' => '10BOK',
				'parent'      => '48', 'coefficient' => 0
			],
			[
				'name'        => 'Zaštitni kodovi',
				'designation' => '10BOZ',
				'parent'      => '48', 'coefficient' => 0
			],

			[
				'name'        => 'Gumice, šiljila',
				'designation' => '10BPG',
				'parent'      => '49', 'coefficient' => 0
			],
			[
				'name'        => 'Korektori',
				'designation' => '10BPK',
				'parent'      => '49', 'coefficient' => 0
			],
			[
				'name'        => 'Olovke po vrstama',
				'designation' => '10BPO',
				'parent'      => '49', 'coefficient' => 0
			],
			[ 'name' => 'Patrone', 'designation' => '10BPP', 'parent' => '49', 'coefficient' => 0 ],
			[
				'name'        => 'Pisaći setovi',
				'designation' => '10BPS',
				'parent'      => '49', 'coefficient' => 0
			],

			[
				'name'        => 'Kalkulatori',
				'designation' => '10BSK',
				'parent'      => '50', 'coefficient' => 0
			],
			[ 'name' => 'Škare', 'designation' => '10BSM', 'parent' => '50', 'coefficient' => 0 ],
			[
				'name'        => 'Stalci, bušilice, spajalice',
				'designation' => '10BSS',
				'parent'      => '50', 'coefficient' => 0
			],
			[
				'name'        => 'Tape-ovi,  ljepila',
				'designation' => '10BST',
				'parent'      => '50', 'coefficient' => 0
			],

			[
				'name'        => 'TISKANICE',
				'designation' => '10BUA',
				'parent'      => '51', 'coefficient' => 0
			],
			[
				'name'        => 'Fotokopirni papir',
				'designation' => '10BUF',
				'parent'      => '51', 'coefficient' => 0
			],
			[ 'name' => 'Hameri', 'designation' => '10BUH', 'parent' => '51', 'coefficient' => 0 ],
			[
				'name'        => 'Papirne role',
				'designation' => '10BUP',
				'parent'      => '51', 'coefficient' => 0
			],
			[
				'name'        => 'PEČATI I PRIBOR',
				'designation' => '10BUS',
				'parent'      => '51', 'coefficient' => 0
			],
			[
				'name'        => 'Trgovački papir',
				'designation' => '10BUT',
				'parent'      => '51', 'coefficient' => 0
			],

			[
				'name'        => 'Dodaci za torbe',
				'designation' => '11GDD',
				'parent'      => '52', 'coefficient' => 0
			],

			[
				'name'        => 'Futrole i etui, mape',
				'designation' => '11GFF',
				'parent'      => '53', 'coefficient' => 0
			],

			[
				'name'        => 'Novčanici',
				'designation' => '11GNN',
				'parent'      => '54', 'coefficient' => 0
			],

			[ 'name' => 'Pernice', 'designation' => '11GPP', 'parent' => '55', 'coefficient' => 0 ],

			[ 'name' => 'Sezona', 'designation' => '11GSS', 'parent' => '56', 'coefficient' => 0 ],

			[ 'name' => 'Casual', 'designation' => '11GTC', 'parent' => '57', 'coefficient' => 0 ],
			[
				'name'        => 'Kozmetičke',
				'designation' => '11GTK',
				'parent'      => '57', 'coefficient' => 0
			],
			[ 'name' => 'Modne', 'designation' => '11GTM', 'parent' => '57', 'coefficient' => 0 ],
			[
				'name'        => 'Za odjeću za obuću',
				'designation' => '11GTO',
				'parent'      => '57', 'coefficient' => 0
			],
			[
				'name'        => 'Poslovne',
				'designation' => '11GTP',
				'parent'      => '57', 'coefficient' => 0
			],
			[
				'name'        => 'Za računala i opremu',
				'designation' => '11GTR',
				'parent'      => '57', 'coefficient' => 0
			],
			[
				'name'        => 'Sportske',
				'designation' => '11GTS',
				'parent'      => '57', 'coefficient' => 0
			],
			[ 'name' => 'Školske', 'designation' => '11GTT', 'parent' => '57', 'coefficient' => 0 ],
			[ 'name' => 'Putne', 'designation' => '11GTU', 'parent' => '57', 'coefficient' => 0 ],
			[ 'name' => 'Vrtićke', 'designation' => '11GTV', 'parent' => '57', 'coefficient' => 0 ],

			[
				'name'        => 'Kutije prazne, optički mediji prazni',
				'designation' => '12MBP',
				'parent'      => '58', 'coefficient' => 0
			],
			[
				'name'        => 'Optički mediji nasnimljen',
				'designation' => '12MBS',
				'parent'      => '58', 'coefficient' => 0
			],
			[
				'name'        => 'USB prijenosna memorija',
				'designation' => '12MBU',
				'parent'      => '58', 'coefficient' => 0
			],

			[
				'name'        => 'Adapteri',
				'designation' => '12MDA',
				'parent'      => '59', 'coefficient' => 0
			],
			[ 'name' => 'Kablovi', 'designation' => '12MDK', 'parent' => '59', 'coefficient' => 0 ],
			[ 'name' => 'Punjači', 'designation' => '12MDP', 'parent' => '59', 'coefficient' => 0 ],
			[
				'name'        => 'Daljinski upravljači',
				'designation' => '12MDU',
				'parent'      => '59', 'coefficient' => 0
			],

			[
				'name'        => 'Edukativni dvd sadržaji',
				'designation' => '12MEE',
				'parent'      => '60', 'coefficient' => 0
			],
			[
				'name'        => 'Tečajevi stranih jezika',
				'designation' => '12MET',
				'parent'      => '60', 'coefficient' => 0
			],

			[
				'name'        => 'Fotoaparati, kamere',
				'designation' => '12MFF',
				'parent'      => '61', 'coefficient' => 0
			],

			[
				'name'        => 'Maintaince kitovi, sredstva za čišćenje',
				'designation' => '12MIC',
				'parent'      => '62', 'coefficient' => 0
			],
			[
				'name'        => 'Riboni, tinte',
				'designation' => '12MIR',
				'parent'      => '62', 'coefficient' => 0
			],
			[ 'name' => 'Toneri', 'designation' => '12MIT', 'parent' => '62', 'coefficient' => 0 ],

			[ 'name' => 'Mobiteli', 'designation' => '12MM', 'parent' => '63', 'coefficient' => 0 ],

			[
				'name'        => 'Monitori',
				'designation' => '12MPE',
				'parent'      => '64', 'coefficient' => 0
			],
			[
				'name'        => 'Fax uređaj',
				'designation' => '12MPF',
				'parent'      => '64', 'coefficient' => 0
			],
			[
				'name'        => 'Graifičke kartice',
				'designation' => '12MPG',
				'parent'      => '64', 'coefficient' => 0
			],
			[
				'name'        => 'Gaming periferija',
				'designation' => '12MPI',
				'parent'      => '64', 'coefficient' => 0
			],
			[
				'name'        => 'Miševi i podloge za miš',
				'designation' => '12MPM',
				'parent'      => '64', 'coefficient' => 0
			],
			[
				'name'        => 'Tipkovnice, printeri',
				'designation' => '12MPT',
				'parent'      => '64', 'coefficient' => 0
			],
			[
				'name'        => 'Web kamere, slušalice, scaneri',
				'designation' => '12MPW',
				'parent'      => '64', 'coefficient' => 0
			],
			[
				'name'        => 'PC zvučnici',
				'designation' => '12MPZ',
				'parent'      => '64', 'coefficient' => 0
			],

			[ 'name' => 'Lap top', 'designation' => '12MRL', 'parent' => '65', 'coefficient' => 0 ],
			[
				'name'        => 'Stolna računala',
				'designation' => '12MRS',
				'parent'      => '65', 'coefficient' => 0
			],
			[
				'name'        => 'Tablet računala',
				'designation' => '12MRT',
				'parent'      => '65', 'coefficient' => 0
			],

			[ 'name' => 'Sezona', 'designation' => '12MSS', 'parent' => '66', 'coefficient' => 0 ],

			[ 'name' => 'Film', 'designation' => '12MZF', 'parent' => '67', 'coefficient' => 0 ],
			[ 'name' => 'Glazba', 'designation' => '12MZG', 'parent' => '67', 'coefficient' => 0 ],
			[ 'name' => 'Igre', 'designation' => '12MZI', 'parent' => '67', 'coefficient' => 0 ],
			[ 'name' => 'Knjige', 'designation' => '12MZK', 'parent' => '67', 'coefficient' => 0 ],
			[
				'name'        => 'LEKTIRA OBVEZATNA',
				'designation' => '03LO1',
				'parent'      => '68', 'coefficient' => 0
			],
			[
				'name'        => 'LEKTIRA NEOBVEZATNA',
				'designation' => '03LP1',
				'parent'      => '69', 'coefficient' => 0
			]
		] );

		DB::table( 'book_type_groups' )->insert( [
			[ 'name' => 'OBLIK KNJIGE - književni rodovi i vrste' ],
			[ 'name' => 'OBLIK KNJIGE - vrste romana' ],
			[ 'name' => 'OBLIK KNJIGE - knjige za djecu - slikovnice' ],
			[ 'name' => 'OBLIK KNJIGE - knjige za djecu' ],
			[ 'name' => 'OBLIK KNJIGE - vrsta proizvoda (uz školski program - edukaciju)' ],
			[ 'name' => 'OBLIK KNJIGE - vrsta proizvoda (karte i atlasi)' ],
			[ 'name' => 'OBLIK KNJIGE - vrsta proizvoda (priručnici)' ],
			[ 'name' => 'OBLIK KNJIGE - vrsta proizvoda (specifični po sadržaju i formi)' ],
			[ 'name' => 'OBLIK KNJIGE - vrsta proizvoda (referentna djela)' ],
		] );

		DB::table( 'book_types' )->insert( [
			[
				'name'        => 'Poezija',
				'designation' => 'VP100',
				'group_id'    => '1'
			],
			[ 'name' => 'Drama', 'designation' => 'VP101', 'group_id' => '1' ],
			[
				'name'        => 'Klasici',
				'designation' => 'VP102',
				'group_id'    => '1'
			],
			[
				'name'        => 'Triler, špijunski',
				'designation' => 'VP103',
				'group_id'    => '2'
			],
			[ 'name' => 'Krimić', 'designation' => 'VP104', 'group_id' => '2' ],
			[
				'name'        => 'Akcija i avantura',
				'designation' => 'VP105',
				'group_id'    => '2'
			],
			[ 'name' => 'Horor', 'designation' => 'VP106', 'group_id' => '2' ],
			[
				'name'        => 'Fantastika - Fantasy',
				'designation' => 'VP107',
				'group_id'    => '2'
			],
			[
				'name'        => 'New age',
				'designation' => 'VP108',
				'group_id'    => '2'
			],
			[
				'name'        => 'Znastvena fantastika - Science Fiction',
				'designation' => 'VP109',
				'group_id'    => '2'
			],
			[
				'name'        => 'Ljubavni roman',
				'designation' => 'VP110',
				'group_id'    => '2'
			],
			[
				'name'        => 'Žensko pismo - Chick lit',
				'designation' => 'VP111',
				'group_id'    => '2'
			],
			[
				'name'        => 'Humor, vicevi, humoristični roman',
				'designation' => 'VP112',
				'group_id'    => '2'
			],
			[
				'name'        => 'Putopisi',
				'designation' => 'VP113',
				'group_id'    => '1'
			],
			[
				'name'        => 'Socijalna i psihološka proza',
				'designation' => 'VP114',
				'group_id'    => '1'
			],
			[
				'name'        => 'Biografije i memoari',
				'designation' => 'VP115',
				'group_id'    => '1'
			],
			[
				'name'        => 'Povijesni roman',
				'designation' => 'VP116',
				'group_id'    => '2'
			],
			[
				'name'        => 'Duhovna literatura',
				'designation' => 'VP117',
				'group_id'    => '1'
			],
			[
				'name'        => 'Beletristika',
				'designation' => 'VP118',
				'group_id'    => '1'
			],
			[
				'name'        => 'Antolgije i izbori',
				'designation' => 'VP119',
				'group_id'    => '1'
			],
			[
				'name'        => 'Mitologija',
				'designation' => 'VP120',
				'group_id'    => '1'
			],
			[
				'name'        => 'Roman - nerazvrstano',
				'designation' => 'VP121',
				'group_id'    => '2'
			],
			[
				'name'        => 'Publicistika',
				'designation' => 'VP122',
				'group_id'    => '1'
			],
			[
				'name'        => 'Govori, aforizmi, poslovice, misli',
				'designation' => 'VP123',
				'group_id'    => '1'
			],
			[
				'name'        => 'Novele i kratke priče, pripovijetke',
				'designation' => 'VP124',
				'group_id'    => '1'
			],
			[
				'name'        => 'Eseji i kritike',
				'designation' => 'VP125',
				'group_id'    => '1'
			],
			[ 'name' => 'Ep', 'designation' => 'VP126', 'group_id' => '1' ],
			[
				'name'        => 'Slikovnice - ostalo',
				'designation' => 'VP200',
				'group_id'    => '3'
			],
			[
				'name'        => 'Audio slikovnice',
				'designation' => 'VP201',
				'group_id'    => '3'
			],
			[
				'name'        => 'Bojanke',
				'designation' => 'VP202',
				'group_id'    => '3'
			],
			[
				'name'        => 'Slikovnice sa igračkama',
				'designation' => 'VP203',
				'group_id'    => '3'
			],
			[
				'name'        => 'Slikovnice sa naljepnicama',
				'designation' => 'VP204',
				'group_id'    => '3'
			],
			[
				'name'        => 'Slikovnice pjesmarice',
				'designation' => 'VP205',
				'group_id'    => '3'
			],
			[
				'name'        => 'Religijske slikovnice',
				'designation' => 'VP206',
				'group_id'    => '3'
			],
			[
				'name'        => 'Slikovnice za igru i učenje',
				'designation' => 'VP207',
				'group_id'    => '3'
			],
			[
				'name'        => '3D slikovnice',
				'designation' => 'VP208',
				'group_id'    => '3'
			],
			[
				'name'        => 'Sezonske slikovnice - Uskrs, Božić',
				'designation' => 'VP209',
				'group_id'    => '3'
			],
			[
				'name'        => 'Slikovnice o životinjama',
				'designation' => 'VP210',
				'group_id'    => '3'
			],
			[
				'name'        => 'Bajke i basne',
				'designation' => 'VP211',
				'group_id'    => '4'
			],
			[
				'name'        => 'Priče i pripovijetke za djecu',
				'designation' => 'VP212',
				'group_id'    => '4'
			],
			[
				'name'        => 'Dječji roman',
				'designation' => 'VP213',
				'group_id'    => '4'
			],
			[
				'name'        => 'Teen roman',
				'designation' => 'VP214',
				'group_id'    => '4'
			],
			[
				'name'        => 'Dječja publicistika i priručnici',
				'designation' => 'VP215',
				'group_id'    => '4'
			],
			[
				'name'        => 'Dječja popularna znanost',
				'designation' => 'VP216',
				'group_id'    => '4'
			],
			[
				'name'        => 'Enciklopedija za djecu',
				'designation' => 'VP217',
				'group_id'    => '4'
			],
			[
				'name'        => 'Enciklopedija za mlade',
				'designation' => 'VP218',
				'group_id'    => '4'
			],
			[
				'name'        => 'Čitanka',
				'designation' => 'VP300',
				'group_id'    => '5'
			],
			[
				'name'        => 'Udžbenik',
				'designation' => 'VP301',
				'group_id'    => '5'
			],
			[
				'name'        => 'Sveučilišni udžbenik',
				'designation' => 'VP302',
				'group_id'    => '5'
			],
			[
				'name'        => 'Vježbenica, radna bilježnica',
				'designation' => 'VP303',
				'group_id'    => '5'
			],
			[
				'name'        => 'Slovarica',
				'designation' => 'VP304',
				'group_id'    => '5'
			],
			[
				'name'        => 'Zbirka zadataka',
				'designation' => 'VP305',
				'group_id'    => '5'
			],
			[
				'name'        => 'Kontrolni zadatci',
				'designation' => 'VP306',
				'group_id'    => '5'
			],
			[
				'name'        => 'Nastavni listići',
				'designation' => 'VP307',
				'group_id'    => '5'
			],
			[
				'name'        => 'Testovi',
				'designation' => 'VP308',
				'group_id'    => '5'
			],
			[
				'name'        => 'Vježbe - laboratorijske vježbe, pokusi, praktikum',
				'designation' => 'VP309',
				'group_id'    => '5'
			],
			[
				'name'        => 'Radni listovi',
				'designation' => 'VP310',
				'group_id'    => '5'
			],
			[
				'name'        => 'Zadatci za dodatnu nastavu',
				'designation' => 'VP311',
				'group_id'    => '5'
			],
			[
				'name'        => 'Mapa za vježbe, tehničko pismo, tablice',
				'designation' => 'VP312',
				'group_id'    => '5'
			],
			[
				'name'        => 'Plakati',
				'designation' => 'VP313',
				'group_id'    => '5'
			],
			[
				'name'        => 'Prozirnice',
				'designation' => 'VP314',
				'group_id'    => '5'
			],
			[
				'name'        => 'Memento',
				'designation' => 'VP315',
				'group_id'    => '5'
			],
			[
				'name'        => 'Priručnik za maturu, repetitorij',
				'designation' => 'VP316',
				'group_id'    => '5'
			],
			[
				'name'        => 'Mapa za likovni',
				'designation' => 'VP317',
				'group_id'    => '5'
			],
			[ 'name' => 'Kolaž', 'designation' => 'VP318', 'group_id' => '5' ],
			[
				'name'        => 'Crtaći blok',
				'designation' => 'VP319',
				'group_id'    => '5'
			],
			[
				'name'        => 'Cd, Dvd',
				'designation' => 'VP320',
				'group_id'    => '5'
			],
			[
				'name'        => 'Kompjutorski program',
				'designation' => 'VP321',
				'group_id'    => '5'
			],
			[
				'name'        => 'Bilježnice, kajdanke',
				'designation' => 'VP322',
				'group_id'    => '5'
			],
			[
				'name'        => 'Vodič kroz lektiru',
				'designation' => 'VP323',
				'group_id'    => '5'
			],
			[
				'name'        => 'Tečajevi',
				'designation' => 'VP324',
				'group_id'    => '5'
			],
			[
				'name'        => 'Herbarij',
				'designation' => 'VP325',
				'group_id'    => '5'
			],
			[
				'name'        => 'Flash kartice',
				'designation' => 'VP326',
				'group_id'    => '5'
			],
			[
				'name'        => 'Zavičajni priručnik',
				'designation' => 'VP327',
				'group_id'    => '5'
			],
			[
				'name'        => 'Radna bilježnica za lektiru',
				'designation' => 'VP328',
				'group_id'    => '5'
			],
			[
				'name'        => 'Strana lektira',
				'designation' => 'VP329',
				'group_id'    => '5'
			],
			[
				'name'        => 'Bilježnice - prazne',
				'designation' => 'VP330',
				'group_id'    => '8'
			],
			[
				'name'        => 'Karta - geografska',
				'designation' => 'VP400',
				'group_id'    => '6'
			],
			[
				'name'        => 'Auto karta',
				'designation' => 'VP401',
				'group_id'    => '6'
			],
			[
				'name'        => 'Karta - planinarska',
				'designation' => 'VP402',
				'group_id'    => '6'
			],
			[
				'name'        => 'Karta - povijesna',
				'designation' => 'VP403',
				'group_id'    => '6'
			],
			[ 'name' => 'Atlas', 'designation' => 'VP404', 'group_id' => '6' ],
			[
				'name'        => 'Auto atlas',
				'designation' => 'VP405',
				'group_id'    => '6'
			],
			[
				'name'        => 'Blok razglednica',
				'designation' => 'VP406',
				'group_id'    => '6'
			],
			[
				'name'        => 'Dječja karta',
				'designation' => 'VP407',
				'group_id'    => '6'
			],
			[
				'name'        => 'Dječji atlas',
				'designation' => 'VP408',
				'group_id'    => '6'
			],
			[
				'name'        => 'Plan grada',
				'designation' => 'VP409',
				'group_id'    => '6'
			],
			[
				'name'        => 'Nautička karta',
				'designation' => 'VP410',
				'group_id'    => '6'
			],
			[
				'name'        => 'Nautički atlas',
				'designation' => 'VP411',
				'group_id'    => '6'
			],
			[
				'name'        => 'Karta - turistička',
				'designation' => 'VP412',
				'group_id'    => '6'
			],
			[
				'name'        => 'Stručna knjiga',
				'designation' => 'VP500',
				'group_id'    => '7'
			],
			[
				'name'        => 'Praktični priručnik',
				'designation' => 'VP501',
				'group_id'    => '7'
			],
			[
				'name'        => 'Priručnik za samostalno učenje uz jezike',
				'designation' => 'VP502',
				'group_id'    => '7'
			],
			[
				'name'        => 'Priručnik za profesore, roditelje, odgajatelje',
				'designation' => 'VP503',
				'group_id'    => '7'
			],
			[
				'name'        => 'Popularna znanost',
				'designation' => 'VP504',
				'group_id'    => '7'
			],
			[ 'name' => 'Strip', 'designation' => 'VP600', 'group_id' => '8' ],
			[
				'name'        => 'Likovna monografija',
				'designation' => 'VP601',
				'group_id'    => '8'
			],
			[
				'name'        => 'Monografija',
				'designation' => 'VP602',
				'group_id'    => '8'
			],
			[
				'name'        => 'Turistička monografija',
				'designation' => 'VP603',
				'group_id'    => '8'
			],
			[
				'name'        => 'Turistički vodič',
				'designation' => 'VP604',
				'group_id'    => '8'
			],
			[
				'name'        => 'Kuharica',
				'designation' => 'VP605',
				'group_id'    => '8'
			],
			[
				'name'        => 'Zakoni i Ustav',
				'designation' => 'VP606',
				'group_id'    => '8'
			],
			[
				'name'        => 'Biblija - Stari i Novi zavjet',
				'designation' => 'VP607',
				'group_id'    => '8'
			],
			[
				'name'        => 'Zbornik radova',
				'designation' => 'VP608',
				'group_id'    => '8'
			],
			[
				'name'        => 'Notni zapisi - note',
				'designation' => 'VP609',
				'group_id'    => '8'
			],
			[
				'name'        => 'Rječnik - stručni',
				'designation' => 'VP700',
				'group_id'    => '9'
			],
			[
				'name'        => 'Rječnik - džepni',
				'designation' => 'VP701',
				'group_id'    => '9'
			],
			[
				'name'        => 'Rječnik - praktični',
				'designation' => 'VP702',
				'group_id'    => '9'
			],
			[
				'name'        => 'Rječnik - veliki (opći)',
				'designation' => 'VP703',
				'group_id'    => '9'
			],
			[
				'name'        => 'Rječnik - slikovni',
				'designation' => 'VP704',
				'group_id'    => '9'
			],
			[
				'name'        => 'Rječnik - dječji',
				'designation' => 'VP705',
				'group_id'    => '9'
			],
			[
				'name'        => 'Gramatika',
				'designation' => 'VP706',
				'group_id'    => '9'
			],
			[
				'name'        => 'Pravopis',
				'designation' => 'VP707',
				'group_id'    => '9'
			],
			[
				'name'        => 'Leksikon',
				'designation' => 'VP708',
				'group_id'    => '9'
			],
			[
				'name'        => 'Enciklopedija',
				'designation' => 'VP709',
				'group_id'    => '9'
			],
		] );

		DB::table( 'book_bibliotecas' )->insert( [
			[ 'name' => 'Lumen', 'designation' => 'LUM', 'code' => 'B000034' ],
			[
				'name'        => 'Biblioteka za genijalce - oš i sš',
				'designation' => 'GEN',
				'code'        => 'B000037'
			],
			[
				'name'        => 'Djela Ivana Aralice',
				'designation' => 'ARAL',
				'code'        => 'B000038'
			],
			[
				'name'        => 'Sabrana djela Ranka Marinkovića',
				'designation' => 'SDRM',
				'code'        => 'B000039'
			],
			[
				'name'        => 'Biblioteka Pisma',
				'designation' => 'PIS',
				'code'        => 'B000040'
			],
			[
				'name'        => 'Biblioteka "Smib"',
				'designation' => 'SMB',
				'code'        => 'B000043'
			],
			[
				'name'        => 'Biblioteka "Modra lasta"',
				'designation' => 'ML',
				'code'        => 'B000044'
			],
			[
				'name'        => 'Biblioteka "Dobra knjiga"',
				'designation' => 'DK',
				'code'        => 'B000045'
			],
			[
				'name'        => 'Biblioteka "Moja knjiga" za osnovnu školu',
				'designation' => 'MKO',
				'code'        => 'B000046'
			],
			[
				'name'        => 'Biblioteka "Moja knjiga" za srednju školu',
				'designation' => 'MKS',
				'code'        => 'B000047'
			],
			[
				'name'        => 'Biblioteka "Hrvatski povijesni roman"',
				'designation' => 'HPR',
				'code'        => 'B000048'
			],
			[
				'name'        => 'Biblioteka "Nobelovci"',
				'designation' => 'NOB',
				'code'        => 'B000049'
			],
			[
				'name'        => 'Biblioteka "Vrhovi svjetske književnosti"',
				'designation' => 'VSK',
				'code'        => 'B000050'
			],
			[
				'name'        => 'Biblioteka "Nova"',
				'designation' => 'NOVA',
				'code'        => 'B000051'
			],
			[
				'name'        => 'Biblioteka "Ključ za književno djelo"',
				'designation' => 'KLJ',
				'code'        => 'B000052'
			],
			[
				'name'        => 'Biblioteka "Ivana Brlić Mažuranić"',
				'designation' => 'IBM',
				'code'        => 'B000053'
			],
			[
				'name'        => 'Biblioteka "Krijesnice"',
				'designation' => 'KRI',
				'code'        => 'B000054'
			],
			[
				'name'        => 'Biblioteka "Što ću biti kad odrastem"',
				'designation' => 'KAD',
				'code'        => 'B000055'
			],
			[
				'name'        => 'Biblioteka "Hihotići"',
				'designation' => 'HIH',
				'code'        => 'B000056'
			],
			[
				'name'        => 'Biblioteka "Zvončići"',
				'designation' => 'ZVON',
				'code'        => 'B000057'
			],
			[
				'name'        => 'Biblioteka "Pričam ti priču"',
				'designation' => 'PTP',
				'code'        => 'B000058'
			],
			[
				'name'        => 'Biblioteka "Kolajna"',
				'designation' => 'KOL',
				'code'        => 'B000060'
			],
			[
				'name'        => 'Biblioteka za roditelje',
				'designation' => 'BZR',
				'code'        => 'B000061'
			],
			[
				'name'        => 'Psihološka Biblioteka "eos"',
				'designation' => 'EOS',
				'code'        => 'B000062'
			],
			[
				'name'        => 'Biblioteka "Razgovor s liječnikom"',
				'designation' => 'RSLJ',
				'code'        => 'B000063'
			],
			[
				'name'        => 'Biblioteka "Klinička anatomija"',
				'designation' => 'KAN',
				'code'        => 'B000064'
			],
			[
				'name'        => 'Stomatološka biblioteka',
				'designation' => 'STB',
				'code'        => 'B000065'
			],
			[
				'name'        => 'Mala stomatološka biblioteka',
				'designation' => 'MSB',
				'code'        => 'B000066'
			],
			[
				'name'        => 'Biblioteka "Bolje znanje nego imanje"',
				'designation' => 'ZNA',
				'code'        => 'B000067'
			],
			[
				'name'        => 'Biblioteka "Moderna matematika"',
				'designation' => 'MM',
				'code'        => 'B000068'
			],
			[
				'name'        => 'Biblioteka "Moderna fizika"',
				'designation' => 'MF',
				'code'        => 'B000069'
			],
			[
				'name'        => 'Biblioteka "Suvremena kemija"',
				'designation' => 'SUK',
				'code'        => 'B000070'
			],
			[
				'name'        => 'Biblioteka "Hrvatski velikani"',
				'designation' => 'HV',
				'code'        => 'B000071'
			],
			[
				'name'        => 'Biblioteka "Tragovi"',
				'designation' => 'TRAG',
				'code'        => 'B000072'
			],
			[
				'name'        => 'Biblioteka "Ljudi se svačim bave"',
				'designation' => 'LJSB',
				'code'        => 'B000073'
			],
			[
				'name'        => 'Biblioteka "Povijesna istraživanja"',
				'designation' => 'POI',
				'code'        => 'B000075'
			],
			[
				'name'        => 'Biblioteka "Clio Croatica"',
				'designation' => 'CC',
				'code'        => 'B000076'
			],
			[
				'name'        => 'Biblioteka "Alternative"',
				'designation' => 'ALT',
				'code'        => 'B000077'
			],
			[
				'name'        => 'Biblioteka "Civitas"',
				'designation' => 'CIV',
				'code'        => 'B000078'
			],
			[
				'name'        => 'Biblioteka "Hrestomatija filozofije"',
				'designation' => 'HRF',
				'code'        => 'B000079'
			],
			[
				'name'        => 'Poslovna biblioteka',
				'designation' => 'PB',
				'code'        => 'B000080'
			],
			[
				'name'        => 'Biblioteka o arhitekturi i urbanizumu',
				'designation' => 'BARH',
				'code'        => 'B000081'
			],
			[
				'name'        => 'Biblioteka "Male likovne monografije"',
				'designation' => 'MLM',
				'code'        => 'B000082'
			],
			[
				'name'        => 'Biblioteka "Lucius"',
				'designation' => 'LUC',
				'code'        => 'B000083'
			],
			[
				'name'        => 'Serija slikovnica "Čarli i Mimo"',
				'designation' => 'CIM',
				'code'        => 'B000084'
			],
			[
				'name'        => 'Serija slikovnica "Tigrić Jakov i prijatelji"',
				'designation' => 'TJ',
				'code'        => 'B000085'
			],
			[
				'name'        => 'Biblioteka "Globalizacija i identitet"',
				'designation' => 'IGI',
				'code'        => 'B000086'
			],
			[
				'name'        => 'Biblioteka "Igre na ploči*',
				'designation' => 'PLO',
				'code'        => 'B000087'
			],
			[
				'name'        => 'Biblioteka "Pokusi"',
				'designation' => 'POK',
				'code'        => 'B000088'
			],
			[
				'name'        => 'Biblioteka "Povijestice"',
				'designation' => 'BPOV',
				'code'        => 'B000089'
			],
			[
				'name'        => 'Biblioteka "Moj zavičaj"',
				'designation' => 'MZ',
				'code'        => 'B000093'
			],
			[
				'name'        => 'Biblioteka "Antologije"',
				'designation' => 'BANT',
				'code'        => 'B000094'
			],
			[
				'name'        => 'Biblioteka "Djela Marije Jurić Zagorke"',
				'designation' => 'MJZ',
				'code'        => 'B000095'
			],
			[
				'name'        => 'Biblioteka "Spasimo zemlju"',
				'designation' => 'ZEML',
				'code'        => 'B000096'
			],
			[
				'name'        => 'Djela Petra Šegedina',
				'designation' => 'PŠEG',
				'code'        => 'B000097'
			],
			[
				'name'        => 'Biblioteka "Europa"',
				'designation' => 'EUR',
				'code'        => 'B000099'
			],
			[
				'name'        => 'Djela Ive Andrića',
				'designation' => 'ANDR',
				'code'        => 'B000101'
			],
			[
				'name'        => 'Moja mala enciklopedija Larousse',
				'designation' => 'LARR',
				'code'        => 'B000102'
			],
			[
				'name'        => 'Serija slikovnica "Gaćoljupci"',
				'designation' => 'GAC',
				'code'        => 'B000103'
			],
			[
				'name'        => 'Biblioteka "Zlatna kolajna"',
				'designation' => 'ZLK',
				'code'        => 'B000104'
			],
			[
				'name'        => 'Biblioteka "Rukovet"',
				'designation' => 'RUK',
				'code'        => 'B000105'
			],
			[
				'name'        => 'Hrvatska i  Europa',
				'designation' => 'HREU',
				'code'        => 'B000106'
			],
		] );

		DB::table( 'school_types' )->insert( [
			[ 'name'        => 'PREDŠKOLSKI ODGOJ',
			  'designation' => 'PŠ',
			  'order'       => '0'
			],
			[ 'name' => 'OSNOVNA ŠKOLA', 'designation' => 'O', 'order' => '1' ],
			[ 'name' => 'GIMNAZIJE', 'designation' => 'G', 'order' => '2' ],
			[ 'name' => 'SREDNJA ŠKOLA', 'designation' => 'S', 'order' => '3' ],
			[ 'name'        => 'ČETVEROGODIŠNJE STRUKOVNE ŠKOLE',
			  'designation' => '4S',
			  'order'       => '4'
			],
			[ 'name'        => 'TROGODIŠNJE STRUKOVNE ŠKOLE',
			  'designation' => '3S',
			  'order'       => '5'
			],
			[ 'name'        => 'SREDNJE GLAZBENE',
			  'designation' => 'GL',
			  'order'       => '6'
			],
			[ 'name'        => 'SREDNJE MEDICINSKE',
			  'designation' => 'MED',
			  'order'       => '7'
			],
			[ 'name'        => 'SREDNJE EKONOMSKE',
			  'designation' => 'E',
			  'order'       => '8'
			],
			[ 'name'        => 'SREDNJE TRGOVAČKE',
			  'designation' => 'TRG',
			  'order'       => '9'
			],
			[ 'name'        => 'SREDNJE UGOSTITELJSKE I TURISTIČKE',
			  'designation' => 'U',
			  'order'       => '10'
			],
			[ 'name'        => 'SREDNJE PROMETNE',
			  'designation' => 'P',
			  'order'       => '11'
			],
			[ 'name'        => 'SREDNJE POMORSKE',
			  'designation' => 'POM',
			  'order'       => '12'
			],
			[ 'name'        => 'SREDNJE KEMIJSKE',
			  'designation' => 'K',
			  'order'       => '13'
			],
			[ 'name'        => 'SREDNJE DRVODJELSKE',
			  'designation' => 'DRV',
			  'order'       => '14'
			],
			[ 'name'        => 'SREDNJE GRAĐEVINSKE',
			  'designation' => 'GRA',
			  'order'       => '15'
			],
			[ 'name'        => 'SREDNJE GRAFIČKE',
			  'designation' => 'GR',
			  'order'       => '16'
			],
			[ 'name'        => 'SREDNJE POLJOPRIVREDNE',
			  'designation' => 'POLJ',
			  'order'       => '17'
			],
			[ 'name'        => 'SREDNJE VETERINASKE',
			  'designation' => 'VET',
			  'order'       => '18'
			],
			[ 'name'        => 'SREDNJE STROJARSTVO, METALURGIJA, BRODOGRADNJA',
			  'designation' => 'STRO',
			  'order'       => '19'
			],
			[ 'name'        => 'SREDNJE ELEKTROTEHNIČKE',
			  'designation' => 'ELE',
			  'order'       => '20'
			],
			[ 'name'        => 'SREDNJE TEKSTILNE',
			  'designation' => 'TEKS',
			  'order'       => '21'
			],
			[ 'name'        => 'SREDNJE UPRAVNE I BIROTEHNIČKE',
			  'designation' => 'UPR',
			  'order'       => '22'
			],
			[ 'name'        => 'SREDNJE FRIZERSKE',
			  'designation' => 'FRI',
			  'order'       => '23'
			],
			[ 'name'        => 'SREDNJE UMJETNIČKE',
			  'designation' => 'UMJ',
			  'order'       => '24'
			],
			[ 'name' => 'FAKULTET', 'designation' => 'F', 'order' => '30' ],
			[ 'name'        => 'IZDANJA ZA NAŠU DJECU I ODRASLE U INOZEMSTVU',
			  'designation' => 'INOZ',
			  'order'       => '31'
			],
			[ 'name'        => 'POSEBNE POTREBE',
			  'designation' => 'POP',
			  'order'       => '39'
			],
			[ 'name'        => 'LEKTIRA 1. - 4.',
			  'designation' => 'LEK14',
			  'order'       => '50'
			],
			[ 'name'        => 'LEKTIRA 1. - 4. DODATNO',
			  'designation' => 'LEK14D',
			  'order'       => '51'
			],
			[ 'name'        => 'LEKTIRA 5. - 8.',
			  'designation' => 'LEK58',
			  'order'       => '52'
			],
			[ 'name'        => 'LEKTIRA 5. - 8. DODATNO',
			  'designation' => 'LEK58D',
			  'order'       => '53'
			],
			[ 'name'        => 'SLIKOVNICE od 3 do 5',
			  'designation' => 'SL35',
			  'order'       => '54'
			],
			[ 'name'        => 'SLIKOVNICE od 5 do 7',
			  'designation' => 'SL57',
			  'order'       => '55'
			],
			[ 'name'        => 'SL IKOVNICE od 7 do 9',
			  'designation' => 'SL79',
			  'order'       => '56'
			],
			[ 'name'        => 'SLIKOVNICE od 9 do 12',
			  'designation' => 'SL912',
			  'order'       => '57'
			],
			[ 'name'        => 'MALA ŠKOLA vrtić 3-5',
			  'designation' => 'VRT35',
			  'order'       => '58'
			],
			[ 'name'        => 'MALA ŠKOLA vrtić 5-7',
			  'designation' => 'VRT57',
			  'order'       => '59'
			],
		] );

		DB::table( 'school_subject_groups' )->insert( [
			[ 'name' => 'JEZICI' ],
			[ 'name' => 'KNJIŽEVNOSTI' ],
			[ 'name' => 'STRUČNI PREDMET' ],
			[ 'name' => 'PRIRODNE ZNANOSTI' ],
			[ 'name' => 'TEHNIČKE ZNANOSTI' ],
			[ 'name' => 'INFORMATIKA' ],
			[ 'name' => 'MEDICINSKE ZNANOSTI' ],
			[ 'name' => 'BIOTEHNIČKE ZNANOSTI' ],
			[ 'name' => 'DRUŠTVENE ZNANOSTI' ],
			[ 'name' => 'EKONOMIJA (BUSSINES)' ],
			[ 'name' => 'HUMANISTIČKE ZNANOSTI' ],
			[ 'name' => 'RELIGIJA' ],
			[ 'name' => 'UMJETNOST' ],
			[ 'name' => 'Zdravlje obitelj roditeljstvo' ],
			[ 'name' => 'LJEPOTA I ZDRAVLJE' ],
			[ 'name' => 'ALTERNATIVA' ],
			[ 'name' => 'ZABAVA, SPORT I REKREACIJA' ],
			[ 'name' => 'GASTRONOMIJA' ],
			[ 'name' => 'Dom, Priroda,  vrt i kućni ljubimci' ],
			[ 'name' => 'Hobi i slobodno vrijeme' ],
			[ 'name' => 'TURISTIKA - PUTOVANJA - VODIČI' ],
			[ 'name' => 'SVI PREDMETI' ],
			[ 'name' => 'BORAVAK' ],
		] );

		DB::table( 'school_subjects' )->insert( [
			[ 'name'        => 'Hrvatski  jezik',
			  'designation' => 'PR0101',
			  'group_id'    => '1'
			],
			[ 'name'        => 'Engleski  jezik',
			  'designation' => 'PR0102',
			  'group_id'    => '1'
			],
			[ 'name'        => 'Francuski  jezik',
			  'designation' => 'PR0103',
			  'group_id'    => '1'
			],
			[ 'name'        => 'Njemački  jezik',
			  'designation' => 'PR0104',
			  'group_id'    => '1'
			],
			[ 'name'        => 'Talijanski  jezik',
			  'designation' => 'PR0105',
			  'group_id'    => '1'
			],
			[ 'name'        => 'Španjolski  jezik',
			  'designation' => 'PR0106',
			  'group_id'    => '1'
			],
			[ 'name'        => 'Ruski  jezik',
			  'designation' => 'PR0107',
			  'group_id'    => '1'
			],
			[ 'name'        => 'Poljski  jezik',
			  'designation' => 'PR0108',
			  'group_id'    => '1'
			],
			[ 'name'        => 'Portugalski  jezik',
			  'designation' => 'PR0109',
			  'group_id'    => '1'
			],
			[ 'name'        => 'Slovački  jezik',
			  'designation' => 'PR0110',
			  'group_id'    => '1'
			],
			[ 'name'        => 'Slovenski  jezik',
			  'designation' => 'PR0111',
			  'group_id'    => '1'
			],
			[ 'name'        => 'Turski  jezik',
			  'designation' => 'PR0112',
			  'group_id'    => '1'
			],
			[ 'name'        => 'Češki  jezik',
			  'designation' => 'PR0113',
			  'group_id'    => '1'
			],
			[ 'name'        => 'Latinski jezik',
			  'designation' => 'PR0114',
			  'group_id'    => '1'
			],
			[ 'name'        => 'Grčki  jezik',
			  'designation' => 'PR0115',
			  'group_id'    => '1'
			],
			[ 'name'        => 'Mađarski  jezik',
			  'designation' => 'PR0116',
			  'group_id'    => '1'
			],
			[ 'name'        => 'Albanski jezik',
			  'designation' => 'PR0117',
			  'group_id'    => '1'
			],
			[ 'name'        => 'Norveški jezik',
			  'designation' => 'PR0118',
			  'group_id'    => '1'
			],
			[ 'name'        => 'Bugarski jezik',
			  'designation' => 'PR0119',
			  'group_id'    => '1'
			],
			[ 'name'        => 'Ukrajinski jezik',
			  'designation' => 'PR0120',
			  'group_id'    => '1'
			],
			[ 'name'        => 'Švedski jezik',
			  'designation' => 'PR0121',
			  'group_id'    => '1'
			],
			[ 'name'        => 'Strani jezici',
			  'designation' => 'PR0122',
			  'group_id'    => '1'
			],
			[ 'name'        => 'Rumunjski jezik',
			  'designation' => 'PR0123',
			  'group_id'    => '1'
			],
			[ 'name'        => 'Srpski jezik',
			  'designation' => 'PR0124',
			  'group_id'    => '1'
			],

			[ 'name'        => 'Ostale književnosti',
			  'designation' => 'PR0300',
			  'group_id'    => '2'
			],
			[ 'name'        => 'Hrvatska  književnost',
			  'designation' => 'PR0301',
			  'group_id'    => '2'
			],
			[ 'name'        => 'Američka  književnost',
			  'designation' => 'PR0302',
			  'group_id'    => '2'
			],
			[ 'name'        => 'Engleska  književnost',
			  'designation' => 'PR0303',
			  'group_id'    => '2'
			],
			[ 'name'        => 'Francuska  književnost',
			  'designation' => 'PR0304',
			  'group_id'    => '2'
			],
			[ 'name'        => 'Njemačka  književnost',
			  'designation' => 'PR0305',
			  'group_id'    => '2'
			],
			[ 'name'        => 'Talijanska  književnost',
			  'designation' => 'PR0306',
			  'group_id'    => '2'
			],
			[ 'name'        => 'Španjolska  književnost',
			  'designation' => 'PR0307',
			  'group_id'    => '2'
			],
			[ 'name'        => 'Ruska književnost',
			  'designation' => 'PR0308',
			  'group_id'    => '2'
			],
			[ 'name'        => 'Poljska književnost',
			  'designation' => 'PR0309',
			  'group_id'    => '2'
			],
			[ 'name'        => 'Portugalska  književnost',
			  'designation' => 'PR0310',
			  'group_id'    => '2'
			],
			[ 'name'        => 'Skandinavske književnosti',
			  'designation' => 'PR0311',
			  'group_id'    => '2'
			],
			[ 'name'        => 'Latinoameričke književnosti',
			  'designation' => 'PR0312',
			  'group_id'    => '2'
			],
			[ 'name'        => 'Antička književnost - grčka i rimska',
			  'designation' => 'PR0313',
			  'group_id'    => '2'
			],

			[ 'name'        => 'Stručni predmet (za srednje škole)',
			  'designation' => 'PR0400',
			  'group_id'    => '3'
			],

			[ 'name'        => 'Matematika',
			  'designation' => 'PR0401',
			  'group_id'    => '4'
			],
			[ 'name'        => 'Fizika',
			  'designation' => 'PR0402',
			  'group_id'    => '4'
			],
			[ 'name'        => 'Nuklearna fizika',
			  'designation' => 'PR0403',
			  'group_id'    => '4'
			],
			[ 'name'        => 'Geologija',
			  'designation' => 'PR0404',
			  'group_id'    => '4'
			],
			[ 'name'        => 'Kemija',
			  'designation' => 'PR0405',
			  'group_id'    => '4'
			],
			[ 'name'        => 'Priroda i društvo (za osnovnu školu)',
			  'designation' => 'PR0406',
			  'group_id'    => '4'
			],
			[ 'name'        => 'Priroda (za osnovnu školu)',
			  'designation' => 'PR0407',
			  'group_id'    => '4'
			],
			[ 'name'        => 'Biologija',
			  'designation' => 'PR0408',
			  'group_id'    => '4'
			],
			[ 'name'        => 'Geofizika',
			  'designation' => 'PR0409',
			  'group_id'    => '4'
			],
			[ 'name'        => 'Zemljopis (GEOGRAFIJA)',
			  'designation' => 'PR0410',
			  'group_id'    => '4'
			],
			[ 'name'        => 'Ekologija',
			  'designation' => 'PR0411',
			  'group_id'    => '4'
			],
			[ 'name'        => 'Astronomija (SVEMIR)',
			  'designation' => 'PR0412',
			  'group_id'    => '4'
			],

			[ 'name'        => 'Tehnički odgoj (za osnovnu školu)',
			  'designation' => 'PR0500',
			  'group_id'    => '5'
			],
			[ 'name'        => 'Elektrotehnika',
			  'designation' => 'PR0501',
			  'group_id'    => '5'
			],
			[ 'name'        => 'Graditeljstvo',
			  'designation' => 'PR0502',
			  'group_id'    => '5'
			],
			[ 'name'        => 'Geodezija',
			  'designation' => 'PR0503',
			  'group_id'    => '5'
			],
			[ 'name'        => 'Grafička tehnologija',
			  'designation' => 'PR0504',
			  'group_id'    => '5'
			],
			[ 'name'        => 'Kemijsko inženjerstvo',
			  'designation' => 'PR0505',
			  'group_id'    => '5'
			],
			[ 'name'        => 'Metalurgija',
			  'designation' => 'PR0506',
			  'group_id'    => '5'
			],
			[ 'name'        => 'Rudarstvo, nafta i geološko inženjerstvo',
			  'designation' => 'PR0507',
			  'group_id'    => '5'
			],
			[ 'name'        => 'Strojarstvo i brodogradnja',
			  'designation' => 'PR0508',
			  'group_id'    => '5'
			],
			[ 'name'        => 'Promet',
			  'designation' => 'PR0509',
			  'group_id'    => '5'
			],
			[ 'name'        => 'Zrakoplovstvo, raketna i svemirska tehnika',
			  'designation' => 'PR0510',
			  'group_id'    => '5'
			],

			[ 'name'        => 'Informatika (za osnovnu i srednju školu)',
			  'designation' => 'PR0511',
			  'group_id'    => '6'
			],
			[ 'name'        => 'Baze podataka, operativni sustavi i programiranje',
			  'designation' => 'PR0512',
			  'group_id'    => '6'
			],
			[ 'name'        => 'Software',
			  'designation' => 'PR0513',
			  'group_id'    => '6'
			],
			[ 'name'        => 'Microsoft',
			  'designation' => 'PR0514',
			  'group_id'    => '6'
			],
			[ 'name'        => 'Hardware',
			  'designation' => 'PR0515',
			  'group_id'    => '6'
			],
			[ 'name' => 'Mreže', 'designation' => 'PR0516', 'group_id' => '6' ],
			[ 'name'        => 'Internet',
			  'designation' => 'PR0517',
			  'group_id'    => '6'
			],
			[ 'name'        => 'Web design',
			  'designation' => 'PR0518',
			  'group_id'    => '6'
			],
			[ 'name'        => 'Kompjuterska grafika',
			  'designation' => 'PR0519',
			  'group_id'    => '6'
			],

			[ 'name'        => 'Medicina',
			  'designation' => 'PR0600',
			  'group_id'    => '7'
			],
			[ 'name'        => 'Veterina',
			  'designation' => 'PR0601',
			  'group_id'    => '7'
			],
			[ 'name'        => 'Stomatologija',
			  'designation' => 'PR0602',
			  'group_id'    => '7'
			],
			[ 'name'        => 'Farmacija',
			  'designation' => 'PR0603',
			  'group_id'    => '7'
			],

			[ 'name'        => 'Poljoprivreda (agronomija)',
			  'designation' => 'PR0700',
			  'group_id'    => '8'
			],
			[ 'name'        => 'Šumarstvo',
			  'designation' => 'PR0701',
			  'group_id'    => '8'
			],
			[ 'name'        => 'Drvna tehnologija',
			  'designation' => 'PR0702',
			  'group_id'    => '8'
			],
			[ 'name'        => 'Biotehnologija',
			  'designation' => 'PR0703',
			  'group_id'    => '8'
			],

			[ 'name' => 'Pravo', 'designation' => 'PR0800', 'group_id' => '9' ],
			[ 'name'        => 'Politika i gospodarstvo (za srednje škole)',
			  'designation' => 'PR0801',
			  'group_id'    => '9'
			],
			[ 'name'        => 'Politika i politologija',
			  'designation' => 'PR0802',
			  'group_id'    => '9'
			],
			[ 'name'        => 'Novinarstvo',
			  'designation' => 'PR0803',
			  'group_id'    => '9'
			],

			[ 'name'        => 'Ekonomija',
			  'designation' => 'PR0804',
			  'group_id'    => '10'
			],
			[ 'name'        => 'Menadžment i poduzetništvo',
			  'designation' => 'PR0805',
			  'group_id'    => '10'
			],
			[ 'name'        => 'Financije i računovodstvo',
			  'designation' => 'PR0804',
			  'group_id'    => '10'
			],
			[ 'name'        => 'Marketing',
			  'designation' => 'PR0807',
			  'group_id'    => '10'
			],
			[ 'name'        => 'Popularna ekonomija',
			  'designation' => 'PR0808',
			  'group_id'    => '10'
			],

			[ 'name'        => 'Turizam i ugostiteljstvo',
			  'designation' => 'PR0809',
			  'group_id'    => '9'
			],
			[ 'name'        => 'Sociologija',
			  'designation' => 'PR0810',
			  'group_id'    => '9'
			],
			[ 'name'        => 'Psihologija',
			  'designation' => 'PR0811',
			  'group_id'    => '9'
			],
			[ 'name'        => 'Pedagogija',
			  'designation' => 'PR0812',
			  'group_id'    => '9'
			],
			[ 'name'        => 'Edukacijsko-rehabilitacijske znanosti',
			  'designation' => 'PR0813',
			  'group_id'    => '9'
			],
			[ 'name'        => 'Logopedija',
			  'designation' => 'PR0814',
			  'group_id'    => '9'
			],
			[ 'name'        => 'Kineziologija',
			  'designation' => 'PR0815',
			  'group_id'    => '9'
			],
			[ 'name'        => 'Demografija',
			  'designation' => 'PR0816',
			  'group_id'    => '9'
			],
			[ 'name'        => 'Socijalne djelatnosti',
			  'designation' => 'PR0817',
			  'group_id'    => '9'
			],
			[ 'name'        => 'Sigurnosne i obrambene znanosti',
			  'designation' => 'PR0818',
			  'group_id'    => '9'
			],

			[ 'name'        => 'Povijest',
			  'designation' => 'PR0900',
			  'group_id'    => '11'
			],
			[ 'name'        => 'Arheologija',
			  'designation' => 'PR0901',
			  'group_id'    => '11'
			],
			[ 'name'        => 'Bibliotekarstvo, informacijske znanosti',
			  'designation' => 'PR0902',
			  'group_id'    => '11'
			],
			[ 'name'        => 'Etnologija i antropologija',
			  'designation' => 'PR0903',
			  'group_id'    => '11'
			],
			[ 'name'        => 'Filologija (lingvistika)',
			  'designation' => 'PR0904',
			  'group_id'    => '11'
			],
			[ 'name'        => 'Teorija i povijest književnosti',
			  'designation' => 'PR0905',
			  'group_id'    => '11'
			],
			[ 'name'        => 'Filozofija',
			  'designation' => 'PR0906',
			  'group_id'    => '11'
			],
			[ 'name'        => 'Logika',
			  'designation' => 'PR0907',
			  'group_id'    => '11'
			],
			[ 'name'        => 'Etika',
			  'designation' => 'PR0908',
			  'group_id'    => '11'
			],

			[ 'name'        => 'Vjeronauk OŠ I SŠ',
			  'designation' => 'PR1000',
			  'group_id'    => '12'
			],
			[ 'name'        => 'Teologija',
			  'designation' => 'PR1001',
			  'group_id'    => '12'
			],
			[ 'name'        => 'Kršćanska literatura',
			  'designation' => 'PR1002',
			  'group_id'    => '12'
			],
			[ 'name'        => 'Islam',
			  'designation' => 'PR1003',
			  'group_id'    => '12'
			],
			[ 'name'        => 'Budizam',
			  'designation' => 'PR1004',
			  'group_id'    => '12'
			],
			[ 'name'        => 'Hinduizam',
			  'designation' => 'PR1005',
			  'group_id'    => '12'
			],
			[ 'name'        => 'Judaizam',
			  'designation' => 'PR1006',
			  'group_id'    => '12'
			],
			[ 'name'        => 'Ostale religije',
			  'designation' => 'PR1007',
			  'group_id'    => '12'
			],
			[ 'name'        => 'Mitologija',
			  'designation' => 'PR1008',
			  'group_id'    => '12'
			],

			[ 'name'        => 'Likovna umjetnost OŠ i SŠ',
			  'designation' => 'PR1100',
			  'group_id'    => '13'
			],
			[ 'name'        => 'Slikarstvo',
			  'designation' => 'PR1101',
			  'group_id'    => '13'
			],
			[ 'name'        => 'Kiparstvo',
			  'designation' => 'PR1102',
			  'group_id'    => '13'
			],
			[ 'name'        => 'Crteži i grafika (priručnici za crtanje)',
			  'designation' => 'PR1103',
			  'group_id'    => '13'
			],
			[ 'name'        => 'Kazalište',
			  'designation' => 'PR1104',
			  'group_id'    => '13'
			],
			[ 'name'        => 'Film, TV',
			  'designation' => 'PR1105',
			  'group_id'    => '13'
			],
			[ 'name'        => 'Glazbena umjetnost',
			  'designation' => 'PR1106',
			  'group_id'    => '13'
			],
			[ 'name'        => 'Fotografija',
			  'designation' => 'PR1107',
			  'group_id'    => '13'
			],
			[ 'name' => 'Ples', 'designation' => 'PR1108', 'group_id' => '13' ],
			[ 'name'        => 'Dizajn i primijenjena umjetnost',
			  'designation' => 'PR1109',
			  'group_id'    => '13'
			],
			[ 'name'        => 'Povijest umjetnosti',
			  'designation' => 'PR1110',
			  'group_id'    => '13'
			],
			[ 'name'        => 'Prapovijesna i antička umjetnost',
			  'designation' => 'PR1111',
			  'group_id'    => '13'
			],
			[ 'name'        => 'Srednjovjekovna umjetnost',
			  'designation' => 'PR1112',
			  'group_id'    => '13'
			],
			[ 'name'        => 'Renesansna umjetnost',
			  'designation' => 'PR1113',
			  'group_id'    => '13'
			],
			[ 'name'        => 'Barokna umjetnost',
			  'designation' => 'PR1114',
			  'group_id'    => '13'
			],
			[ 'name'        => 'Klasicizam i prosvjetiteljstvo',
			  'designation' => 'PR1115',
			  'group_id'    => '13'
			],
			[ 'name'        => 'Romantizam',
			  'designation' => 'PR1116',
			  'group_id'    => '13'
			],
			[ 'name'        => 'Suvremena umjetnost',
			  'designation' => 'PR1117',
			  'group_id'    => '13'
			],
			[ 'name'        => 'Strip',
			  'designation' => 'PR1118',
			  'group_id'    => '13'
			],
			[ 'name'        => 'Arhitektura i urbanizam',
			  'designation' => 'PR1119',
			  'group_id'    => '13'
			],
			[ 'name' => 'Moda', 'designation' => 'PR1120', 'group_id' => '13' ],

			[ 'name'        => 'Trudnoća',
			  'designation' => 'PR1400',
			  'group_id'    => '14'
			],
			[ 'name'        => 'Odgoj djeteta',
			  'designation' => 'PR1401',
			  'group_id'    => '14'
			],

			[ 'name'        => 'Zdrava prehrana',
			  'designation' => 'PR1402',
			  'group_id'    => '15'
			],
			[ 'name'        => 'Razne dijete',
			  'designation' => 'PR1403',
			  'group_id'    => '15'
			],
			[ 'name'        => 'Lječenje biljem, ljekovito bilje',
			  'designation' => 'PR1404',
			  'group_id'    => '15'
			],
			[ 'name'        => 'Ljubav i odnosi',
			  'designation' => 'PR1405',
			  'group_id'    => '15'
			],
			[ 'name'        => 'Seksualnost',
			  'designation' => 'PR1406',
			  'group_id'    => '15'
			],
			[ 'name'        => 'Samopomoć',
			  'designation' => 'PR1407',
			  'group_id'    => '15'
			],
			[ 'name'        => 'Zrele godine',
			  'designation' => 'PR1408',
			  'group_id'    => '15'
			],
			[ 'name'        => 'Ljepota (kozmetika, make up)',
			  'designation' => 'PR1409',
			  'group_id'    => '15'
			],
			[ 'name'        => 'Fitness',
			  'designation' => 'PR1410',
			  'group_id'    => '15'
			],
			[ 'name'        => 'Masaža',
			  'designation' => 'PR1411',
			  'group_id'    => '15'
			],
			[ 'name' => 'Joga', 'designation' => 'PR1412', 'group_id' => '15' ],

			[ 'name'        => 'Alternativna medicina',
			  'designation' => 'PR1500',
			  'group_id'    => '16'
			],
			[ 'name'        => 'Akupunktura',
			  'designation' => 'PR1501',
			  'group_id'    => '16'
			],
			[ 'name'        => 'Feng shui',
			  'designation' => 'PR1502',
			  'group_id'    => '16'
			],
			[ 'name'        => 'Kristaloterapija',
			  'designation' => 'PR1503',
			  'group_id'    => '16'
			],
			[ 'name'        => 'Psihologija i psihoterapija',
			  'designation' => 'PR1504',
			  'group_id'    => '16'
			],
			[ 'name'        => 'Astrologija',
			  'designation' => 'PR1505',
			  'group_id'    => '16'
			],
			[ 'name'        => 'Duhovnost',
			  'designation' => 'PR1506',
			  'group_id'    => '16'
			],
			[ 'name'        => 'Tai chi',
			  'designation' => 'PR1507',
			  'group_id'    => '16'
			],
			[ 'name'        => 'Tantra',
			  'designation' => 'PR1508',
			  'group_id'    => '16'
			],
			[ 'name'        => 'Okultizam, magija, parapsihologija',
			  'designation' => 'PR1509',
			  'group_id'    => '16'
			],
			[ 'name'        => 'Proricanje, gatanje, vidovnjaštvo',
			  'designation' => 'PR1510',
			  'group_id'    => '16'
			],
			[ 'name'        => 'Numerologija',
			  'designation' => 'PR1511',
			  'group_id'    => '16'
			],
			[ 'name'        => 'Snovi',
			  'designation' => 'PR1512',
			  'group_id'    => '16'
			],
			[ 'name'        => 'Tarot',
			  'designation' => 'PR1513',
			  'group_id'    => '16'
			],
			[ 'name'        => 'Religija, religiologija i mistika',
			  'designation' => 'PR1514',
			  'group_id'    => '16'
			],
			[ 'name'        => 'Ostala alternativna područja',
			  'designation' => 'PR1515',
			  'group_id'    => '16'
			],

			[ 'name'        => 'TJELESNA I ZDRAVSTVENA KULTURA (OŠ I SŠ)',
			  'designation' => 'PR1600',
			  'group_id'    => '17'
			],
			[ 'name'        => 'Društvene igre',
			  'designation' => 'PR1601',
			  'group_id'    => '17'
			],
			[ 'name'        => 'Igre na sreću',
			  'designation' => 'PR1602',
			  'group_id'    => '17'
			],
			[ 'name'        => 'Sport, tjelesno vježbanje, sportske igre',
			  'designation' => 'PR1603',
			  'group_id'    => '17'
			],
			[ 'name'        => 'Sportovi na vodi, sportovi u zraku',
			  'designation' => 'PR1604',
			  'group_id'    => '17'
			],
			[ 'name'        => 'Jahanje i vožnja',
			  'designation' => 'PR1605',
			  'group_id'    => '17'
			],
			[ 'name'        => 'Streljaštvo',
			  'designation' => 'PR1606',
			  'group_id'    => '17'
			],
			[ 'name'        => 'Tenis',
			  'designation' => 'PR1607',
			  'group_id'    => '17'
			],
			[ 'name'        => 'Atletika',
			  'designation' => 'PR1608',
			  'group_id'    => '17'
			],
			[ 'name' => 'Šah', 'designation' => 'PR1609', 'group_id' => '17' ],
			[ 'name'        => 'Borilački sportovi',
			  'designation' => 'PR1610',
			  'group_id'    => '17'
			],
			[ 'name'        => 'Lov, ribolov',
			  'designation' => 'PR1611',
			  'group_id'    => '17'
			],
			[ 'name'        => 'Planinarenje',
			  'designation' => 'PR1612',
			  'group_id'    => '17'
			],
			[ 'name'        => 'Nogomet',
			  'designation' => 'PR1613',
			  'group_id'    => '17'
			],

			[ 'name'        => 'Kuharstvo',
			  'designation' => 'PR1700',
			  'group_id'    => '18'
			],
			[ 'name'        => 'PIĆA (Pivo, Vina, žestoka pića)',
			  'designation' => 'PR1701',
			  'group_id'    => '18'
			],
			[ 'name'        => 'Tradicionalna i domaća kuhinja',
			  'designation' => 'PR1702',
			  'group_id'    => '18'
			],
			[ 'name'        => 'Internacionalna kuhinja',
			  'designation' => 'PR1703',
			  'group_id'    => '18'
			],
			[ 'name'        => 'Vegetarijanska kuhinja',
			  'designation' => 'PR1704',
			  'group_id'    => '18'
			],
			[ 'name'        => 'Riblje kuharice',
			  'designation' => 'PR1705',
			  'group_id'    => '18'
			],
			[ 'name'        => 'Deserti',
			  'designation' => 'PR1706',
			  'group_id'    => '18'
			],
			[ 'name'        => 'Kokteli',
			  'designation' => 'PR1707',
			  'group_id'    => '18'
			],
			[ 'name'        => 'Salate',
			  'designation' => 'PR1708',
			  'group_id'    => '18'
			],
			[ 'name' => 'Sir', 'designation' => 'PR1709', 'group_id' => '18' ],
			[ 'name'        => 'Tjestenina',
			  'designation' => 'PR1710',
			  'group_id'    => '18'
			],
			[ 'name' => 'Meso', 'designation' => 'PR1711', 'group_id' => '18' ],
			[ 'name'        => 'Ostale kuharice',
			  'designation' => 'PR1712',
			  'group_id'    => '18'
			],

			[ 'name'        => 'Uređenje doma',
			  'designation' => 'PR1800',
			  'group_id'    => '19'
			],
			[ 'name'        => 'Vrtlarstvo i hortikultura',
			  'designation' => 'PR1801',
			  'group_id'    => '19'
			],
			[ 'name'        => 'Voćnjak',
			  'designation' => 'PR1802',
			  'group_id'    => '19'
			],
			[ 'name'        => 'Sobno bilje, cvijeće',
			  'designation' => 'PR1803',
			  'group_id'    => '19'
			],
			[ 'name'        => 'Kućni ljubimci',
			  'designation' => 'PR1804',
			  'group_id'    => '19'
			],

			[ 'name'        => 'Uradi sam',
			  'designation' => 'PR1805',
			  'group_id'    => '20'
			],
			[ 'name'        => 'Automobili',
			  'designation' => 'PR1806',
			  'group_id'    => '20'
			],
			[ 'name'        => 'Oružje',
			  'designation' => 'PR1807',
			  'group_id'    => '20'
			],
			[ 'name'        => 'Modelarstvo',
			  'designation' => 'PR1808',
			  'group_id'    => '20'
			],
			[ 'name'        => 'Filatelija i numizmatika',
			  'designation' => 'PR1809',
			  'group_id'    => '20'
			],
			[ 'name'        => 'Ostalo',
			  'designation' => 'PR1810',
			  'group_id'    => '20'
			],

			[ 'name'        => 'Turistika',
			  'designation' => 'PR1811',
			  'group_id'    => '21'
			],

			[ 'name'        => 'Svi predmeti',
			  'designation' => 'PR1812',
			  'group_id'    => '22'
			],

			[ 'name'        => 'Boravak',
			  'designation' => 'PR1813',
			  'group_id'    => '23'
			],
		] );
	}
}
