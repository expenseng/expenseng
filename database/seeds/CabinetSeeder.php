<?php

use Illuminate\Database\Seeder;

class CabinetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('cabinets')->insert([
            [
                "name" => "Rauf Aregbesola",
                "twitter_handle" => "@raufaregbesola",
                "facebook_handle" => '@raufaregbesola',
                "instagram_handle" => '@raufaregbesola',
                "linkedIn_handle" => '@raufaregbesola',
                "ministry_id" => 1,
                "role" => "Minister",
                "avatar" => "https://i.ibb.co/ySpwYfQ/Interior-Rauf-Aregbesola.png"
            ],
            [
                "name" => "Muhammadu Buhari",
                "twitter_handle" => "@MBuhari",
                "facebook_handle" => null,
                "instagram_handle" => null,
                "linkedIn_handle" => null,
                "ministry_id" => 2,
                "role" => "Minister",
                "avatar" => "https://i.ibb.co/QFnP4ZT/Petroleum-Buhari.png"
            ],
            [
                "name" => "Timipre Sylva",
                "twitter_handle" => "@hetimipresylva",
                "facebook_handle" => null,
                "instagram_handle" => null,
                "linkedIn_handle" => null,
                "ministry_id" => 2,
                "role" => "Minister of State",
                "avatar" => "https://i.ibb.co/TWS56Yd/Petroleum-State-Timipre-Sylva.png"
            ],
            [
                "name" => "Saleh Mamman",
                "twitter_handle" => "@EngrSMamman",
                "facebook_handle" => null,
                "instagram_handle" => null,
                "linkedIn_handle" => null,
                "ministry_id" => 3,
                "role" => "Minister",
                "avatar" => "https://i.ibb.co/QHsNMC7/Power-Saleh-Mamman.png"
            ],
            [
                "name" => "Goddy Agba",
                "twitter_handle" => "@agbagoddy",
                "facebook_handle" => null,
                "instagram_handle" => null,
                "linkedIn_handle" => null,
                "ministry_id" => 3,
                "role" => "Minister of State",
                "avatar" => "https://i.ibb.co/xSqXzJs/Power-State-Goddy-Jedi-Agba.png"
            ],
            [
                "name" => "Babatunde Fashola",
                "twitter_handle" => "@tundefashola",
                "facebook_handle" => null,
                "instagram_handle" => null,
                "linkedIn_handle" => null,
                "ministry_id" => 4,
                "role" => "Minister",
                "avatar" => "https://i.ibb.co/gws0B4j/Works-Babatunde-Raji-Fashola.png"
            ],
            [
                "name" => "Abubakar Aliyu",
                "twitter_handle" => "@sadiqatfifty",
                "facebook_handle" => null,
                "instagram_handle" => null,
                "linkedIn_handle" => null,
                "ministry_id" => 4,
                "role" => "Minister of State",
                "avatar" => "https://i.ibb.co/6b90rgV/Works-State-Abubakar-B-Aliyu.png"
            ],
            [
                "name" => "Zainab Ahmed",
                "twitter_handle" => "@ZShamsuna",
                "facebook_handle" => null,
                "instagram_handle" => null,
                "linkedIn_handle" => null,
                "ministry_id" => 5,
                "role" => "Minister",
                "avatar" => "https://i.ibb.co/H2qcwbL/Finance-Zainab-Shamsuna-Ahmed.png"
            ],
            [
                "name" => "Clement Agba",
                "twitter_handle" => "@ClemAgba",
                "facebook_handle" => null,
                "instagram_handle" => null,
                "linkedIn_handle" => null,
                "ministry_id" => "5",
                "role" => "Minister of State",
                "avatar" => "https://i.ibb.co/2knTtB4/Finance-State-Clement-Anade-Agba.png"
            ],
            [
                "name" => "Osagie Ehanire",
                "twitter_handle" => "@DREOEhanire",
                "facebook_handle" => null,
                "instagram_handle" => null,
                "linkedIn_handle" => null,
                "ministry_id" => 6,
                "role" => "Minister",
                "avatar" => "https://i.ibb.co/0C7P6Vn/Health-Osagie-Ehanire.png"
            ],
            [
                "name" => "Olorunnimbe Mamora",
                "twitter_handle" => "@DrAOMamora",
                "facebook_handle" => null,
                "instagram_handle" => null,
                "linkedIn_handle" => null,
                "ministry_id" => 6,
                "role" => "Minister of State",
                "avatar" => "https://i.ibb.co/3SRYfVw/Health-State-Adeleke-Mamora.png"
            ],
            [
                "name" => "Adeniyi Adebayo",
                "twitter_handle" => "@NiyiAdebayo",
                "facebook_handle" => null,
                "instagram_handle" => null,
                "linkedIn_handle" => null,
                "ministry_id" => 7,
                "role" => "Minister",
                "avatar" => "https://i.ibb.co/w7SkjLZ/Trade-Richard-Adeniyi-Adebayo.png"
            ],
            [
                "name" => "Mariam Katagum",
                "twitter_handle" => null,
                "facebook_handle" => null,
                "instagram_handle" => null,
                "linkedIn_handle" => null,
                "ministry_id" => 7,
                "role" => "Minister of State",
                "avatar" => "https://i.ibb.co/THH65jg/Trade-State-Mariam-Katagum.png"
            ],
            [
                "name" => "Mohammed Bello",
                "twitter_handle" => "@FCT_Minister",
                "facebook_handle" => null,
                "instagram_handle" => null,
                "linkedIn_handle" => null,
                "ministry_id" => 8,
                "role" => "Minister",
                "avatar" => "https://i.ibb.co/SVVrr40/FCT-muhammad-musa.png"
            ],
            [
                "name" => "Ramatu Tijani",
                "twitter_handle" => "@DrRamatuAliyu",
                "facebook_handle" => null,
                "instagram_handle" => null,
                "linkedIn_handle" => null,
                "ministry_id" => 8,
                "role" => "Minister of State",
                "avatar" => "https://i.ibb.co/Wy6hjKc/FCT-State-Ramatu-Tijan.png"
            ],
            [
                "name" => "Chris Ngige",
                "twitter_handle" => "@SenChrisNgige",
                "facebook_handle" => null,
                "instagram_handle" => null,
                "linkedIn_handle" => null,
                "ministry_id" => 9,
                "role" => "Minister",
                "avatar" => "https://i.ibb.co/KXTcm08/Labour-Chris-Ngige.png"
            ],
            [
                "name" => "Festus Keyamo",
                "twitter_handle" => "@fkeyamo",
                "facebook_handle" => null,
                "instagram_handle" => null,
                "linkedIn_handle" => null,
                "ministry_id" => 9,
                "role" => "Minister of State",
                "avatar" => "https://i.ibb.co/Wgw4YWZ/Niger-Delta-State-Festus-Keyamo.png"
            ],
            [
                "name" => "Olamilekan Adegbite",
                "twitter_handle" => "@_lekanadegbite",
                "facebook_handle" => null,
                "instagram_handle" => null,
                "linkedIn_handle" => null,
                "ministry_id" => 10,
                "role" => "Minister",
                "avatar" => "https://i.ibb.co/c687b46/Mines-Steel-Olamilekan-Adegbiti.png"
            ],
            [
                "name" => "Uchechukwu Ogah",
                "twitter_handle" => "@UcheSampsonOgah",
                "facebook_handle" => null,
                "instagram_handle" => null,
                "linkedIn_handle" => null,
                "ministry_id" => 10,
                "role" => "Minister of State",
                "avatar" => "https://i.ibb.co/BTQVZ4f/Mines-Steel-State-Uche-Ogah.png"
            ],
            [
                "name" => "Godswill Akpabio",
                "twitter_handle" => "@Senator_Akpabio",
                "facebook_handle" => null,
                "instagram_handle" => null,
                "linkedIn_handle" => null,
                "ministry_id" => 11,
                "role" => "Minister",
                "avatar" => "https://i.ibb.co/nL0DQMd/Niger-Delta-Godswill-Akpabio.png"
            ],
            [
                "name" => "Tayo Alasoadura",
                "twitter_handle" => "@SenAlasoadura",
                "facebook_handle" => null,
                "instagram_handle" => null,
                "linkedIn_handle" => null,
                "ministry_id" => 11,
                "role" => "Minister of State",
                "avatar" => "https://i.ibb.co/jGDjmKH/Labour-state-Tayo-Alasoadura.png"
            ],
            [
                "name" => "Mohammed Mahmood",
                "twitter_handle" => "@drmuhdmahmood",
                "facebook_handle" => null,
                "instagram_handle" => null,
                "linkedIn_handle" => null,
                "ministry_id" => 12,
                "role" => "Minister",
                "avatar" => "https://i.ibb.co/Fsv5yyL/Envirionment-Mohammed-Mahmoud.png"
            ],
            [
                "name" => "Sharon Ikeazor",
                "twitter_handle" => "@sharon_ikeazor",
                "facebook_handle" => null,
                "instagram_handle" => null,
                "linkedIn_handle" => null,
                "ministry_id" => 12,
                "role" => "Minister of State",
                "avatar" => "https://i.ibb.co/d2D0tkq/Environment-State-Sharon-Ikeazor.png"
            ],
            [
                "name" => "George Akume",
                "twitter_handle" => null,
                "facebook_handle" => null,
                "instagram_handle" => null,
                "linkedIn_handle" => null,
                "ministry_id" => 13,
                "role" => "Minister",
                "avatar" => "https://i.ibb.co/747yvxR/Special-Duties-George-Akume.png"
            ],
            [
                "name" => "Geofrey Onyeama",
                "twitter_handle" => null,
                "facebook_handle" => null,
                "instagram_handle" => null,
                "linkedIn_handle" => null,
                "ministry_id" => 14,
                "role" => "Minister",
                "avatar" => "https://i.ibb.co/0J1G0C4/Foreign-Geofery-Onyeama.png"

            ],
            [
                "name" => "Zubairu Dada",
                "twitter_handle" => null,
                "facebook_handle" => null,
                "instagram_handle" => null,
                "linkedIn_handle" => null,
                "ministry_id" => 14,
                "role" => "Minister of State",
                "avatar" => "https://i.ibb.co/5Gxv8k7/Foreign-State-Zubairu.png"

            ],
            [
                "name" => "Ogbonnaya Onu",
                "twitter_handle" => "@dr_ogbonnayaonu",
                "facebook_handle" => null,
                "instagram_handle" => null,
                "linkedIn_handle" => null,
                "ministry_id" => 15,
                "role" => "Minister",
                "avatar" => "https://i.ibb.co/fNsvLY8/Sci-Tech-Ogbonnaya-onu.png"
            ],
            [
                "name" => "Muhammed Abdullahi",
                "twitter_handle" => "@mohdhabdullahi",
                "facebook_handle" => null,
                "instagram_handle" => null,
                "linkedIn_handle" => null,
                "ministry_id" => 15,
                "role" => "Minister of State",
                "avatar" => "https://i.ibb.co/Cv2rDQ4/Sci-Tech-State-Mohammed-H-Abdullahi.png"
            ],
            [
                "name" => "Suleiman Adamu",
                "twitter_handle" => "@SHadamufnse",
                "facebook_handle" => null,
                "instagram_handle" => null,
                "linkedIn_handle" => null,
                "ministry_id" => 16,
                "role" => "Minister",
                "avatar" => "https://i.ibb.co/vBf38pg/Water-Suleiman-Adamu.png"
            ],
            [
                "name" => "Ali Pantami",
                "twitter_handle" => "@drisapantami",
                "facebook_handle" => null,
                "instagram_handle" => null,
                "linkedIn_handle" => null,
                "ministry_id" => 17,
                "role" => "Minister",
                "avatar" => "https://i.ibb.co/pn46CHT/Communication-Ali-Isa-Ibrahim.png"
            ],
            [
                "name" => "Hadi Sirika",
                "twitter_handle" => "@hadisirika",
                "facebook_handle" => null,
                "instagram_handle" => null,
                "linkedIn_handle" => null,
                "ministry_id" => 18,
                "role" => "Minister",
                "avatar" => "https://i.ibb.co/41r0bR0/Aviation-Hadi-Sikira.png"
            ],
            [
                "name" => "Bashir Salihi Magashi",
                "ministry_id" => 19,
                "twitter_handle" => null,
                "facebook_handle" => null,
                "instagram_handle" => null,
                "linkedIn_handle" => null,
                "role" => "Minister",
                "avatar" => "https://i.ibb.co/vhvmR9F/Defence-Bashir-Magashi.png"
            ],
            [
                "name" => "Lai Mohammed",
                "twitter_handle" => "@mohammed_lai",
                "facebook_handle" => null,
                "instagram_handle" => null,
                "linkedIn_handle" => null,
                "ministry_id" => 20,
                "role" => "Minister",
                "avatar" => "https://i.ibb.co/ts0jKCH/Information-Lai-Mohammed.png"
            ],
            [
                "name" => "Rotimi Amaechi",
                "twitter_handle" => "@chibuikeamaechi",
                "facebook_handle" => null,
                "instagram_handle" => null,
                "linkedIn_handle" => null,
                "ministry_id" => 21,
                "role" => "Minister",
                "avatar" => "https://i.ibb.co/0fmNNVv/Transport-Rotimi-Amaechi.png"
            ],
            [
                "name" => "Gbemisola Saraki",
                "twitter_handle" => "@gbemisaraki",
                "facebook_handle" => null,
                "instagram_handle" => null,
                "linkedIn_handle" => null,
                "ministry_id" => 21,
                "role" => "Minister of State",
                "avatar" => "https://i.ibb.co/xJS1nKB/Transport-State-Gbemisola-Saraki.png"
            ],
            [
                "name" => "Sunday Dare",
                "twitter_handle" => "@SundayDareSD",
                "facebook_handle" => null,
                "instagram_handle" => null,
                "linkedIn_handle" => null,
                "ministry_id" => 22,
                "role" => "Minister",
                "avatar" => "https://i.ibb.co/3zr7jqF/Sports-Sunday-Dare.png"
            ],
            [
                "name" => "Muhammadu Dingyadi",
                "twitter_handle" => "@maigaridingyadi",
                "facebook_handle" => null,
                "instagram_handle" => null,
                "linkedIn_handle" => null,
                "ministry_id" => 23,
                "role" => "Minister",
                "avatar" => "https://i.ibb.co/kJHZXPL/Police-Mohammed-Maigari-Dangadi.png"
            ],
            [
                "name" => "Sadiya Umar Farouk",
                "twitter_handle" => "@Sadiya_farouq",
                "facebook_handle" => null,
                "instagram_handle" => null,
                "linkedIn_handle" => null,
                "ministry_id" => 24,
                "role" => "Minister",
                "avatar" => "https://i.ibb.co/82CnDWg/Human-Sadiya-Umar-Faruk.png"
            ],
            [
                "name" => "Adamu Adamu",
                "twitter_handle" => null,
                "facebook_handle" => null,
                "instagram_handle" => null,
                "linkedIn_handle" => null,
                "ministry_id" => 25,
                "role" => "Minister",
                "avatar" => "https://i.ibb.co/jDBjgtB/Education-Adamu-Adamu.png"
            ],
            [
                "name" => "Emeka Nwajuba",
                "twitter_handle" => "@HonNwajiuba",
                "facebook_handle" => null,
                "instagram_handle" => null,
                "linkedIn_handle" => null,
                "ministry_id" => 25,
                "role" => "Minister of State",
                "avatar" => "https://i.ibb.co/dbQQMcL/Education-State-Emeka-Nwajiuba.png"
            ],
            [
                "name" => "Abubakar Malami",
                "twitter_handle" => "@MalamiSan",
                "facebook_handle" => null,
                "instagram_handle" => null,
                "linkedIn_handle" => null,
                "ministry_id" => 26,
                "role" => "Minister",
                "avatar" => "https://i.ibb.co/bHd6mdX/Justice-Abubakar-Malami.png"
            ],
            [
                "name" => "Sabo Nanono",
                "twitter_handle" => "@nanonosabo",
                "facebook_handle" => null,
                "instagram_handle" => null,
                "linkedIn_handle" => null,
                "ministry_id" => 27,
                "role" => "Minister",
                "avatar" => "https://i.ibb.co/zVtXhzL/Agriculture-Sabo-Nanono.png"
            ],
            [
                "name" => "Mustapha Baba Shehuri",
                "twitter_handle" => "@shehuri_baba",
                "facebook_handle" => null,
                "instagram_handle" => null,
                "linkedIn_handle" => null,
                "ministry_id" => 27,
                "role" => "Minister of State",
                "avatar" => "https://i.ibb.co/hCqBC2w/Agriculture-State-Mustapha-Baba-Shehuri.png"
            ],
            [
                "name" => "Pauline Tallen",
                "twitter_handle" => "@PaulineKTallen",
                "facebook_handle" => null,
                "instagram_handle" => null,
                "linkedIn_handle" => null,
                "ministry_id" => 28,
                "role" => "Minister",
                "avatar" => "https://i.ibb.co/qDvDPKq/Women-Pauline-Tallen.png"
            ]
        ]);
    }
}
