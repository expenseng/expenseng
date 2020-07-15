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
                    "ministry_code" => "0124",
                    "role" => "Minister",
                    "avatar" => "https://i.ibb.co/ySpwYfQ/Interior-Rauf-Aregbesola.png"
                ],
                [                  
                    "name" => "Muhammadu Buhari",
                    "twitter_handle" => "@MBuhari",
                    "ministry_code" => "0232",
                    "role" => "Minister",
                    "avatar" => "https://i.ibb.co/QFnP4ZT/Petroleum-Buhari.png"
                ],
                [                  
                    "name" => "Timipre Sylva",
                    "twitter_handle" => "@hetimipresylva",
                    "ministry_code" => "0232",
                    "role" => "Minister of State",
                    "avatar" => "https://i.ibb.co/TWS56Yd/Petroleum-State-Timipre-Sylva.png"
                ],
                [                     
                    "name" => "Saleh Mamman",
                    "twitter_handle" => "@EngrSMamman",
                    "ministry_code" => "0231",
                    "role" => "Minister",
                    "avatar" => "https://i.ibb.co/QHsNMC7/Power-Saleh-Mamman.png"
                ],
                [                     
                    "name" => "Goddy Agba",
                    "twitter_handle" => "@agbagoddy",
                    "ministry_code" => "0231",
                    "role" => "Minister of State",
                    "avatar" => "https://i.ibb.co/xSqXzJs/Power-State-Goddy-Jedi-Agba.png"
                ],
                [
                    "name" => "Babatunde Fashola",
                    "twitter_handle" => "@tundefashola",
                    "ministry_code" => "0234",
                    "role" => "Minister",
                    "avatar" => "https://i.ibb.co/gws0B4j/Works-Babatunde-Raji-Fashola.png"
                ],
                [
                    "name" => "Abubakar Aliyu",
                    "twitter_handle" => "@sadiqatfifty",
                    "ministry_code" => "0234",
                    "role" => "Minister of State",
                    "avatar" => "https://i.ibb.co/6b90rgV/Works-State-Abubakar-B-Aliyu.png"
                ],
                [   
                    "name" => "Zainab Ahmed",
                    "twitter_handle" => "@ZShamsuna",
                    "ministry_code" => "0220",
                    "role" => "Minister",
                    "avatar" => "https://i.ibb.co/H2qcwbL/Finance-Zainab-Shamsuna-Ahmed.png"
                ],
                [   
                    "name" => "Clement Agba",
                    "twitter_handle" => "@ClemAgba",
                    "ministry_code" => "0220",
                    "role" => "Minister of State",
                    "avatar" => "https://i.ibb.co/2knTtB4/Finance-State-Clement-Anade-Agba.png"
                ],
                [                        
                    "name" => "Osagie Ehanire",
                    "twitter_handle" => "@DREOEhanire",
                    "ministry_code" => "0521",
                    "role" => "Minister",
                    "avatar" => "https://i.ibb.co/0C7P6Vn/Health-Osagie-Ehanire.png"
                ],
                [                        
                    "name" => "Olorunnimbe Mamora",
                    "twitter_handle" => "@DrAOMamora",
                    "ministry_code" => "0521",
                    "role" => "Minister of State",
                    "avatar" => "https://i.ibb.co/3SRYfVw/Health-State-Adeleke-Mamora.png"
                ],
                [                        
                    "name" => "Adeniyi Adebayo",
                    "twitter_handle" => "@NiyiAdebayo",
                    "ministry_code" => "0222",
                    "role" => "Minister",
                    "avatar" => "https://i.ibb.co/w7SkjLZ/Trade-Richard-Adeniyi-Adebayo.png"
                ],
                [                        
                    "name" => "Mariam Katagum",
                    "twitter_handle" => "@",
                    "ministry_code" => "0222",
                    "role" => "Minister of State",
                    "avatar" => "https://i.ibb.co/THH65jg/Trade-State-Mariam-Katagum.png"
                ],
                [
                    "name" => "Mohammed Bello",
                    "twitter_handle" => "@FCT_Minister",
                    "ministry_code" => "0437",
                    "role" => "Minister",
                    "avatar" => "https://i.ibb.co/SVVrr40/FCT-muhammad-musa.png"
                ],
                [
                    "name" => "Ramatu Tijani",
                    "twitter_handle" => "@DrRamatuAliyu",
                    "ministry_code" => "0437",
                    "role" => "Minister of State",
                    "avatar" => "https://i.ibb.co/Wy6hjKc/FCT-State-Ramatu-Tijan.png"
                ],
                [ 
                    "name" => "Chris Ngige",
                    "twitter_handle" => "@SenChrisNgige",
                    "ministry_code" => "0227",
                    "role" => "Minister",
                    "avatar" => "https://i.ibb.co/KXTcm08/Labour-Chris-Ngige.png"
                ],
                [
                    "name" => "Festus Keyamo",
                    "twitter_handle" => "@fkeyamo",
                    "ministry_code" => "0227",
                    "role" => "Minister of State",
                    "avatar" => "https://i.ibb.co/Wgw4YWZ/Niger-Delta-State-Festus-Keyamo.png"
                ],
                [ 
                    "name" => "Olamilekan Adegbite",
                    "twitter_handle" => "@_lekanadegbite",
                    "ministry_code" => "0233",
                    "role" => "Minister",
                    "avatar" => "https://i.ibb.co/c687b46/Mines-Steel-Olamilekan-Adegbiti.png"
                ],
                [ 
                    "name" => "Uchechukwu Ogah",
                    "twitter_handle" => "@UcheSampsonOgah",
                    "ministry_code" => "0233",
                    "role" => "Minister of State",
                    "avatar" => "https://i.ibb.co/BTQVZ4f/Mines-Steel-State-Uche-Ogah.png"
                ],
                [
                    "name" => "Godswill Akpabio",
                    "twitter_handle" => "@Senator_Akpabio",
                    "ministry_code" => "0451",
                    "role" => "Minister",
                    "avatar" => "https://i.ibb.co/nL0DQMd/Niger-Delta-Godswill-Akpabio.png"
                ],
                [ 
                    "name" => "Tayo Alasoadura",
                    "twitter_handle" => "@SenAlasoadura",
                    "ministry_code" => "0451",
                    "role" => "Minister of State",
                    "avatar" => "https://i.ibb.co/jGDjmKH/Labour-state-Tayo-Alasoadura.png"
                ],        
                [
                    "name" => "Mohammed Mahmood",
                    "twitter_handle" => "@drmuhdmahmood",
                    "ministry_code" => "0535",
                    "role" => "Minister",
                    "avatar" => "https://i.ibb.co/Fsv5yyL/Envirionment-Mohammed-Mahmoud.png"
                ],
                [
                    "name" => "Sharon Ikeazor",
                    "twitter_handle" => "@sharon_ikeazor",
                    "ministry_code" => "0535",
                    "role" => "Minister of State",
                    "avatar" => "https://i.ibb.co/d2D0tkq/Environment-State-Sharon-Ikeazor.png"
                ],
                [
                    "name" => "George Akume",
                    "twitter_handle" => "@",
                    "ministry_code" => "0164",
                    "role" => "Minister",
                    "avatar" => "https://i.ibb.co/747yvxR/Special-Duties-George-Akume.png"
                ],
                [                       
                    "name" => "Geofrey Onyeama",
                    "twitter_handle" => "@geoffreyonyeama",
                    "ministry_code" => "0119",
                    "role" => "Minister",
                    "avatar" => "https://i.ibb.co/0J1G0C4/Foreign-Geofery-Onyeama.png"
                    
                ],
                [                       
                    "name" => "Zubairu Dada",
                    "twitter_handle" => "@",
                    "ministry_code" => "0119",
                    "role" => "Minister of State",
                    "avatar" => "https://i.ibb.co/5Gxv8k7/Foreign-State-Zubairu.png"
                    
                ],
                [                      
                    "name" => "Ogbonnaya Onu",
                    "twitter_handle" => "@dr_ogbonnayaonu",
                    "ministry_code" => "0228",
                    "role" => "Minister",
                    "avatar" => "https://i.ibb.co/fNsvLY8/Sci-Tech-Ogbonnaya-onu.png"
                ],
                [                      
                    "name" => "Muhammed Abdullahi",
                    "twitter_handle" => "@mohdhabdullahi",
                    "ministry_code" => "0228",
                    "role" => "Minister of State",
                    "avatar" => "https://i.ibb.co/Cv2rDQ4/Sci-Tech-State-Mohammed-H-Abdullahi.png"
                ],
                [
                    "name" => "Suleiman Adamu",
                    "twitter_handle" => "@SHadamufnse",
                    "ministry_code" => "0252",
                    "role" => "Minister",
                    "avatar" => "https://i.ibb.co/vBf38pg/Water-Suleiman-Adamu.png"
                ],
                [                        
                    "name" => "Ali Pantami",
                    "twitter_handle" => "@drisapantami",
                    "ministry_code" => "0156",
                    "role" => "Minister",
                    "avatar" => "https://i.ibb.co/pn46CHT/Communication-Ali-Isa-Ibrahim.png"
                ],
                [                        
                    "name" => "Hadi Sirika",
                    "twitter_handle" => "@hadisirika",
                    "ministry_code" => "0230",
                    "role" => "Minister",
                    "avatar" => "https://i.ibb.co/41r0bR0/Aviation-Hadi-Sikira.png"
                ],
                [                    
                    "name" => "Bashir Salihi Magashi",
                    "twitter_handle" => "@",
                    "ministry_code" => "0116",
                    "role" => "Minister",
                    "avatar" => "https://i.ibb.co/vhvmR9F/Defence-Bashir-Magashi.png"
                ],
                [                        
                    "name" => "Lai Mohammed",
                    "twitter_handle" => "@mohammed_lai",
                    "ministry_code" => "0123",
                    "role" => "Minister",
                    "avatar" => "https://i.ibb.co/ts0jKCH/Information-Lai-Mohammed.png"
                ],
                [                       
                    "name" => "Rotimi Amaechi",
                    "twitter_handle" => "@chibuikeamaechi",
                    "ministry_code" => "0229",
                    "role" => "Minister",
                    "avatar" => "https://i.ibb.co/0fmNNVv/Transport-Rotimi-Amaechi.png"
                ], 
                [                       
                    "name" => "Gbemisola Saraki",
                    "twitter_handle" => "@gbemisaraki",
                    "ministry_code" => "0229",
                    "role" => "Minister of State",
                    "avatar" => "https://i.ibb.co/xJS1nKB/Transport-State-Gbemisola-Saraki.png"
                ],
                [
                    "name" => "Sunday Dare",
                    "twitter_handle" => "@SundayDareSD",
                    "ministry_code" => "0513",
                    "role" => "Minister",
                    "avatar" => "https://i.ibb.co/3zr7jqF/Sports-Sunday-Dare.png"
                ],
                [
                    "name" => "Muhammadu Dingyadi",
                    "twitter_handle" => "@maigaridingyadi",
                    "ministry_code" => "0155",
                    "role" => "Minister",
                    "avatar" => "https://i.ibb.co/kJHZXPL/Police-Mohammed-Maigari-Dangadi.png"
                ],
                [
                    "name" => "Sadiya Umar Farouk",
                    "twitter_handle" => "@Sadiya_farouq",
                    "ministry_code" => "0544",
                    "role" => "Minister",
                    "avatar" => "https://i.ibb.co/82CnDWg/Human-Sadiya-Umar-Faruk.png"
                ],
                [
                    "name" => "Adamu Adamu",
                    "twitter_handle" => "@",
                    "ministry_code" => "0517",
                    "role" => "Minister",
                    "avatar" => "https://i.ibb.co/jDBjgtB/Education-Adamu-Adamu.png"
                ], 
                 [
                    "name" => "Emeka Nwajuba",
                    "twitter_handle" => "@HonNwajiuba",
                    "ministry_code" => "0517",
                    "role" => "Minister of State",
                    "avatar" => "https://i.ibb.co/dbQQMcL/Education-State-Emeka-Nwajiuba.png"
                ], 
                [
                    "name" => "Abubakar Malami",
                    "twitter_handle" => "@MalamiSan",
                    "ministry_code" => "0326",
                    "role" => "Minister",
                    "avatar" => "https://i.ibb.co/bHd6mdX/Justice-Abubakar-Malami.png"
                ],
                [
                    "name" => "Sabo Nanono",
                    "twitter_handle" => "@nanonosabo",
                    "ministry_code" => "0215",
                    "role" => "Minister",
                    "avatar" => "https://i.ibb.co/zVtXhzL/Agriculture-Sabo-Nanono.png"
                ],
                [
                    "name" => "Mustapha Baba Shehuri",
                    "twitter_handle" => "@shehuri_baba",
                    "ministry_code" => "0215",
                    "role" => "Minister of State",
                    "avatar" => "https://i.ibb.co/hCqBC2w/Agriculture-State-Mustapha-Baba-Shehuri.png"
                ], 
                [     
                    "name" => "Pauline Tallen",
                    "twitter_handle" => "@PaulineKTallen",
                    "ministry_code" => "0514",
                    "role" => "Minister",
                    "avatar" => "https://i.ibb.co/qDvDPKq/Women-Pauline-Tallen.png"
                ]
            ]);
    }
}

