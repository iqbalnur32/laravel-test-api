<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class RestApiController extends Controller
{
	public function __construct(Request $req)
	{
		$this->req = $req;
	}

    public function get_all()
    {
		$data = User::all();
		return response()->json([$data], 200);    	
    }

    public function create()
    {
		$data = User::create([
			'nama_lengkap' => $this->req->nama_lengkap,
			'tgl_lahir' => $this->req->tgl_lahir,
			'email' => $this->req->email,
			'phone' => $this->req->phone,
			'pekerjaan' => $this->req->pekerjaan,
			'gaji' => $this->req->gaji,
		]);

		return response()->json([$data], 200);    	
    }

    public function update($id)
    {
		$result = User::where('id', $id);
		$result->update([
			'nama_lengkap' => $this->req->nama_lengkap,
			'tgl_lahir' => $this->req->tgl_lahir,
			'email' => $this->req->email,
			'phone' => $this->req->phone,
			'pekerjaan' => $this->req->pekerjaan,
			'gaji' => $this->req->gaji,
		]);
		return response()->json([$result->first()], 200);    	
    }

    public function delete($id)
    {
		$user = User::find($id);
		$user->delete();
		return response()->json('success delete', 200);    	
    }

    public function readyById($id)
    {
    	$result = User::where('id', $id)->first();
    	if (empty($result)) {
			return response()->json(['data not found'], 404);    	
    	}
		return response()->json([$result], 200);    	
    }
}
