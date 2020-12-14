<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDataOptions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //TODO: add all tv
        $data = [
            [
                'id' => 191,
                'option_type' => 'tv_channels',
                'option' => 'Rupavahini',
                'value' => 'rupavahini',
                'visible' => 1,
                'order' => 1
            ],
            [
                'id' => 192,
                'option_type' => 'tv_channels',
                'option' => 'ITN TV',
                'value' => 'itn_tv',
                'visible' => 1,
                'order' => 1
            ],
            [
                'id' => 193,
                'option_type' => 'tv_channels',
                'option' => 'Channel One MTV',
                'value' => 'channel_one_mtv',
                'visible' => 1,
                'order' => 1
            ],
            [
                'id' => 104,
                'option_type' => 'tv_channels',
                'option' => 'Nethra TV / Channel Eye',
                'value' => 'nethra_tv_channel_eye',
                'visible' => 1,
                'order' => 1
            ],
            [
                'id' => 105,
                'option_type' => 'tv_channels',
                'option' => 'Shakthi TV',
                'value' => 'shakthi_tv',
                'visible' => 1,
                'order' => 1
            ],
            [
                'id' => 106,
                'option_type' => 'tv_channels',
                'option' => 'Shraddha TV',
                'value' => 'shraddha_tv',
                'visible' => 1,
                'order' => 1
            ],
            [
                'id' => 107,
                'option_type' => 'tv_channels',
                'option' => 'Siyatha TV',
                'value' => 'siyatha_tv',
                'visible' => 1,
                'order' => 1
            ],
            [
                'id' => 108,
                'option_type' => 'tv_channels',
                'option' => 'Sirasa TV',
                'value' => 'sirasa_tv',
                'visible' => 1,
                'order' => 1
            ],
            [
                'id' => 109,
                'option_type' => 'tv_channels',
                'option' => 'Sri TV',
                'value' => 'sri_tv',
                'visible' => 1,
                'order' => 1
            ],
            [
                'id' => 110,
                'option_type' => 'tv_channels',
                'option' => 'The Buddhist TV',
                'value' => 'the_buddhist_tv',
                'visible' => 1,
                'order' => 1
            ],
            [
                'id' => 111,
                'option_type' => 'tv_channels',
                'option' => 'TNL TV',
                'value' => 'tnl_tv',
                'visible' => 1,
                'order' => 1
            ],
            [
                'id' => 112,
                'option_type' => 'tv_channels',
                'option' => 'TV 1',
                'value' => 'tv_1',
                'visible' => 1,
                'order' => 1
            ],
            [
                'id' => 113,
                'option_type' => 'tv_channels',
                'option' => 'Vasantham TV',
                'value' => 'vasantham_tv',
                'visible' => 1,
                'order' => 1
            ],
            [
                'id' => 114,
                'option_type' => 'tv_channels',
                'option' => 'Learn TV',
                'value' => 'learn_tv',
                'visible' => 1,
                'order' => 1
            ],
            [
                'id' => 115,
                'option_type' => 'tv_channels',
                'option' => 'Colombo Television',
                'value' => 'colombo_television',
                'visible' => 1,
                'order' => 1
            ],
            [
                'id' => 116,
                'option_type' => 'tv_channels',
                'option' => 'CGTN',
                'value' => 'cgtn',
                'visible' => 1,
                'order' => 1
            ],
            [
                'id' => 117,
                'option_type' => 'tv_channels',
                'option' => 'Swarnavahini',
                'value' => 'swarnavahini',
                'visible' => 1,
                'order' => 1
            ],
            [
                'id' => 118,
                'option_type' => 'tv_channels',
                'option' => 'ART Television',
                'value' => 'art_television',
                'visible' => 1,
                'order' => 1
            ],
            [
                'id' => 119,
                'option_type' => 'tv_channels',
                'option' => 'Channel C',
                'value' => 'channel_c',
                'visible' => 1,
                'order' => 1
            ],
            [
                'id' => 120,
                'option_type' => 'tv_channels',
                'option' => 'Heritage TV',
                'value' => 'heritage_tv',
                'visible' => 1,
                'order' => 1
            ],
            [
                'id' => 121,
                'option_type' => 'tv_channels',
                'option' => 'Citi Hitz',
                'value' => 'citi_hitz',
                'visible' => 1,
                'order' => 1
            ],
            [
                'id' => 122,
                'option_type' => 'tv_channels',
                'option' => 'Knowledge TV',
                'value' => 'knowledge_tv',
                'visible' => 1,
                'order' => 1
            ],
            [
                'id' => 123,
                'option_type' => 'tv_channels',
                'option' => 'Rangiri TV',
                'value' => 'rangiri_tv',
                'visible' => 1,
                'order' => 1
            ],
            [
                'id' => 124,
                'option_type' => 'tv_channels',
                'option' => 'Sarana TV',
                'value' => 'sarana_tv',
                'visible' => 1,
                'order' => 1
            ],
            [
                'id' => 125,
                'option_type' => 'tv_channels',
                'option' => 'TV Didula',
                'value' => 'tv_didula',
                'visible' => 1,
                'order' => 1
            ],
            [
                'id' => 126,
                'option_type' => 'tv_channels',
                'option' => 'UTV Tamil',
                'value' => 'utv_tamil',
                'visible' => 1,
                'order' => 1
            ],
            [
                'id' => 127,
                'option_type' => 'tv_channels',
                'option' => 'Verbum TV',
                'value' => 'verbum_tv',
                'visible' => 1,
                'order' => 1
            ],
            [
                'id' => 128,
                'option_type' => 'tv_channels',
                'option' => 'Hiru TV',
                'value' => 'hiru_tv',
                'visible' => 1,
                'order' => 1
            ],

            //TODO: List all radio channels
            [
                'id' => 129,
                'option_type' => 'radio_channels',
                'option' => 'Sirasa FM',
                'value' => 'sirasa_fm',
                'visible' => 1,
                'order' => 1
            ],
            [
                'id' => 130,
                'option_type' => 'radio_channels',
                'option' => 'Siyatha FM',
                'value' => 'siyatha_fm',
                'visible' => 1,
                'order' => 1
            ],
            [
                'id' => 131,
                'option_type' => 'radio_channels',
                'option' => 'Vidula',
                'value' => 'vidula',
                'visible' => 1,
                'order' => 1
            ],
            [
                'id' => 132,
                'option_type' => 'radio_channels',
                'option' => 'SLBC Commercial Service (Velanda Sevaya)',
                'value' => 'slbc_cs',
                'visible' => 1,
                'order' => 1
            ],
            [
                'id' => 133,
                'option_type' => 'radio_channels',
                'option' => 'Thendral FM',
                'value' => 'thendral_fm',
                'visible' => 1,
                'order' => 1
            ],
            [
                'id' => 134,
                'option_type' => 'radio_channels',
                'option' => 'Radio Sri Lanka',
                'value' => 'radio_sri_lanka',
                'visible' => 1,
                'order' => 1
            ],
            [
                'id' => 135,
                'option_type' => 'radio_channels',
                'option' => 'SLBC National Service (Swadeshiya Sevaya)',
                'value' => 'slbc_ns_ss',
                'visible' => 1,
                'order' => 1
            ],
            [
                'id' => 136,
                'option_type' => 'radio_channels',
                'option' => 'SLBC National Service',
                'value' => 'slbc_ns',
                'visible' => 1,
                'order' => 1
            ],
            [
                'id' => 137,
                'option_type' => 'radio_channels',
                'option' => 'SLBC Regional Service (Dabana)',
                'value' => 'slbc_rs_dabana',
                'visible' => 1,
                'order' => 1
            ],
            [
                'id' => 138,
                'option_type' => 'radio_channels',
                'option' => 'SLBC Regional Service (Jaffna)',
                'value' => 'slbc_rs_jaffna',
                'visible' => 1,
                'order' => 1
            ],
            [
                'id' => 139,
                'option_type' => 'radio_channels',
                'option' => 'SLBC Regional Service (Kandurata Sevaya)',
                'value' => 'slbc_rs_kandurata_sevaya',
                'visible' => 1,
                'order' => 1
            ],
            [
                'id' => 140,
                'option_type' => 'radio_channels',
                'option' => 'SLBC Regional Service (Rajarata Sevaya)',
                'value' => 'slbc_rs_rajarata_sevaya',
                'visible' => 1,
                'order' => 1
            ],
            [
                'id' => 141,
                'option_type' => 'radio_channels',
                'option' => 'SLBC Regional Service (Ruhunu Sevaya)',
                'value' => 'slbc_rs_ruhunu_sevaya',
                'visible' => 1,
                'order' => 1
            ],
            [
                'id' => 142,
                'option_type' => 'radio_channels',
                'option' => 'SLBC Regional Service (Uva)',
                'value' => 'slbc_rs_uva',
                'visible' => 1,
                'order' => 1
            ],
            [
                'id' => 143,
                'option_type' => 'radio_channels',
                'option' => 'SLBC Regional Service (Wayamba Handa)',
                'value' => 'slbc_rs_wayamba_handa',
                'visible' => 1,
                'order' => 1
            ],
            [
                'id' => 144,
                'option_type' => 'radio_channels',
                'option' => 'SLBC Sports Service',
                'value' => 'slbc_ss',
                'visible' => 1,
                'order' => 1
            ],
            [
                'id' => 145,
                'option_type' => 'radio_channels',
                'option' => 'Sooriyan FM',
                'value' => 'sooriyan_fm',
                'visible' => 1,
                'order' => 1
            ],
            [
                'id' => 146,
                'option_type' => 'radio_channels',
                'option' => 'Sun FM',
                'value' => 'sun_fm',
                'visible' => 1,
                'order' => 1
            ],
            [
                'id' => 147,
                'option_type' => 'radio_channels',
                'option' => 'Rasa FM',
                'value' => 'rasa_fm',
                'visible' => 1,
                'order' => 1
            ],
            [
                'id' => 148,
                'option_type' => 'radio_channels',
                'option' => 'Tamil2 FM',
                'value' => 'tamil2_fm',
                'visible' => 1,
                'order' => 1
            ],
            [
                'id' => 149,
                'option_type' => 'radio_channels',
                'option' => 'Tamilaruvi FM',
                'value' => 'tamilaruvi_fm',
                'visible' => 1,
                'order' => 1
            ],
            [
                'id' => 150,
                'option_type' => 'radio_channels',
                'option' => 'Thaalam FM',
                'value' => 'thaalam_fm',
                'visible' => 1,
                'order' => 1
            ],
            [
                'id' => 151,
                'option_type' => 'radio_channels',
                'option' => 'TNL Radio',
                'value' => 'tnl_radio',
                'visible' => 1,
                'order' => 1
            ],
            [
                'id' => 152,
                'option_type' => 'radio_channels',
                'option' => 'V FM',
                'value' => 'v_fm',
                'visible' => 1,
                'order' => 1
            ],
            [
                'id' => 153,
                'option_type' => 'radio_channels',
                'option' => 'Vasantham FM',
                'value' => 'vasantham_fm',
                'visible' => 1,
                'order' => 1
            ],
            [
                'id' => 154,
                'option_type' => 'radio_channels',
                'option' => 'Varnam FM',
                'value' => 'varnam_fm',
                'visible' => 1,
                'order' => 1
            ],
            [
                'id' => 155,
                'option_type' => 'radio_channels',
                'option' => 'Capital Radio',
                'value' => 'capital_radio',
                'visible' => 1,
                'order' => 1
            ],
            [
                'id' => 156,
                'option_type' => 'radio_channels',
                'option' => 'Yes FM',
                'value' => 'yes_fm',
                'visible' => 1,
                'order' => 1
            ],
            [
                'id' => 157,
                'option_type' => 'radio_channels',
                'option' => 'Yaathra FM',
                'value' => 'yaathra_fm',
                'visible' => 1,
                'order' => 1
            ],
            [
                'id' => 158,
                'option_type' => 'radio_channels',
                'option' => 'Hiru FM',
                'value' => 'hiru_fm',
                'visible' => 1,
                'order' => 1
            ],
            [
                'id' => 159,
                'option_type' => 'radio_channels',
                'option' => 'Y FM',
                'value' => 'y_fm',
                'visible' => 1,
                'order' => 1
            ],
            [
                'id' => 160,
                'option_type' => 'radio_channels',
                'option' => 'Sitha FM',
                'value' => 'sitha_fm',
                'visible' => 1,
                'order' => 1
            ],
            [
                'id' => 161,
                'option_type' => 'radio_channels',
                'option' => 'Shree FM',
                'value' => 'shree_fm',
                'visible' => 1,
                'order' => 1
            ],
            [
                'id' => 162,
                'option_type' => 'radio_channels',
                'option' => 'Shakthi FM',
                'value' => 'shakthi_fm',
                'visible' => 1,
                'order' => 1
            ],
            [
                'id' => 163,
                'option_type' => 'radio_channels',
                'option' => 'Shaa FM',
                'value' => 'shaa_fm',
                'visible' => 1,
                'order' => 1
            ],
            [
                'id' => 164,
                'option_type' => 'radio_channels',
                'option' => 'Seth FM(Negombo only)',
                'value' => 'seth_fm',
                'visible' => 1,
                'order' => 1
            ],
            [
                'id' => 165,
                'option_type' => 'radio_channels',
                'option' => 'Rhythm World',
                'value' => 'rhythm_world',
                'visible' => 1,
                'order' => 1
            ],
            [
                'id' => 166,
                'option_type' => 'radio_channels',
                'option' => 'Red FM',
                'value' => 'red_fm',
                'visible' => 1,
                'order' => 1
            ],
            [
                'id' => 167,
                'option_type' => 'radio_channels',
                'option' => 'Real Radio',
                'value' => 'real_radio',
                'visible' => 1,
                'order' => 1
            ],
            [
                'id' => 168,
                'option_type' => 'radio_channels',
                'option' => 'Rangiri Sri Lanka',
                'value' => 'rangiri_sri_lanka',
                'visible' => 1,
                'order' => 1
            ],
            [
                'id' => 169,
                'option_type' => 'radio_channels',
                'option' => 'RanOne FM',
                'value' => 'ranOne_fm',
                'visible' => 1,
                'order' => 1
            ],
            [
                'id' => 170,
                'option_type' => 'radio_channels',
                'option' => 'Pirai FM (Muslim)',
                'value' => 'pirai_fm',
                'visible' => 1,
                'order' => 1
            ],
            [
                'id' => 171,
                'option_type' => 'radio_channels',
                'option' => 'Neth FM',
                'value' => 'neth_fm',
                'visible' => 1,
                'order' => 1
            ],
            [
                'id' => 172,
                'option_type' => 'radio_channels',
                'option' => 'Lite 89.2/Lite FM',
                'value' => 'lite_fm',
                'visible' => 1,
                'order' => 1
            ],
            [
                'id' => 173,
                'option_type' => 'radio_channels',
                'option' => 'Legends FM',
                'value' => 'legends_fm',
                'visible' => 1,
                'order' => 1
            ],
            [
                'id' => 174,
                'option_type' => 'radio_channels',
                'option' => 'Lakviru',
                'value' => 'lakviru',
                'visible' => 1,
                'order' => 1
            ],
            [
                'id' => 175,
                'option_type' => 'radio_channels',
                'option' => 'Lak FM',
                'value' => 'lak_fm',
                'visible' => 1,
                'order' => 1
            ],
            [
                'id' => 176,
                'option_type' => 'radio_channels',
                'option' => 'Kothmale FM / Kotmale Community Radio',
                'value' => 'kothmale_fm',
                'visible' => 1,
                'order' => 1
            ],
            [
                'id' => 177,
                'option_type' => 'radio_channels',
                'option' => 'ITN FM (formerly Lakhanda radio)',
                'value' => 'itn_fm',
                'visible' => 1,
                'order' => 1
            ],
            [
                'id' => 178,
                'option_type' => 'radio_channels',
                'option' => 'Varnam FM',
                'value' => 'varnam_fm',
                'visible' => 1,
                'order' => 1
            ],
            [
                'id' => 179,
                'option_type' => 'radio_channels',
                'option' => 'Gold FM',
                'value' => 'gold_fm',
                'visible' => 1,
                'order' => 1
            ],
            [
                'id' => 180,
                'option_type' => 'radio_channels',
                'option' => 'Fox FM',
                'value' => 'fox_fm',
                'visible' => 1,
                'order' => 1
            ],
            [
                'id' => 181,
                'option_type' => 'radio_channels',
                'option' => 'FM Derana',
                'value' => 'fm_derana',
                'visible' => 1,
                'order' => 1
            ],
            [
                'id' => 182,
                'option_type' => 'radio_channels',
                'option' => 'City FM',
                'value' => 'city_fm',
                'visible' => 1,
                'order' => 1
            ],
            [
                'id' => 183,
                'option_type' => 'radio_channels',
                'option' => 'Buddhist Radio',
                'value' => 'buddhist_radio',
                'visible' => 1,
                'order' => 1
            ],





            //TODO: List all connection types
            [
                'id' => 184,
                'option_type' => 'internet_connection_devices',
                'option' => 'ADSL',
                'value' => 'adsl',
                'visible' => 1,
                'order' => 1
            ],
            [
                'id' => 185,
                'option_type' => 'internet_connection_devices',
                'option' => 'WiFi',
                'value' => 'wifi',
                'visible' => 1,
                'order' => 1
            ],
            [
                'id' => 186,
                'option_type' => 'internet_connection_devices',
                'option' => 'Mobile Data',
                'value' => 'mobile_data',
                'visible' => 1,
                'order' => 1
            ],




            //TODO: List all devices
            [
                'id' => 187,
                'option_type' => 'devices',
                'option' => 'Desktop Computer',
                'value' => 'desktop',
                'visible' => 1,
                'order' => 1
            ],
            [
                'id' => 188,
                'option_type' => 'devices',
                'option' => 'Laptop Computer',
                'value' => 'laptop',
                'visible' => 1,
                'order' => 1
            ],
            [
                'id' => 189,
                'option_type' => 'devices',
                'option' => 'Tab',
                'value' => 'tab',
                'visible' => 1,
                'order' => 1
            ],
            [
                'id' => 190,
                'option_type' => 'devices',
                'option' => 'No Device',
                'value' => 'no_device',
                'visible' => 1,
                'order' => 1
            ],


        ];
        DB::table('config_item_options')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $ids = range(103, 193);
        DB::table('config_item_options')
            ->whereIn('id', $ids)
            ->delete();
    }
}
