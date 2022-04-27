<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\main;
use App\Models\contact;
use App\Models\sdl_cont_id;

class ins extends Controller
{
    public function InsertContact(Request $req)
    {
		$id_contact = contact::where('id_contact', '=', $req->input('id_contact'))->first();
		if($id_contact == null)
		{
			$db = new contact();
			$db-> id_contact = $req->input('id_contact');
			$db-> name_contact = $req->input('name_contact');
			$db-> numphone_contact = $req->input('numphone_contact');
			$db->save();
			return redirect('/2/');
		}
    }
    public function InsertMain(Request $req)
    {
        $sdl_name = main::where('sdl_name', '=', $req->input('sdl_name'))->first();
		if($sdl_name == null)
		{
			$db = new main();
			$db-> sdl_name = $req->input('sdl_name');
			$db-> sdlID = $req->input('sdlID');
			$db->save();
			return redirect('/2/');
		}
    }
    public function InsertSdl_cont(Request $req)
    {
		$id_sdl = sdl_cont_id::where('id_sdl', '=', $req->input('id_sdl'), ' and ', 'id_cont', '=', $req->input('id_cont'))->first();
		if($id_sdl == null)
		{
			$db = new sdl_cont_id();
			$db-> id_sdl = $req->input('id_sdl');
			$db-> id_cont = $req->input('id_cont');
			$db->save();
			return redirect('/2/');
		}
		else
		{
			echo $id_sdl;
		}
    }
    
}
