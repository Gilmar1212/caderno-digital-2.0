<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\TblMateria;
use App\Models\TblAnotacoes;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class loginController extends Controller

{
    private $request;
    private $user_consult;
    
    public function login(Request $request){        
        return view("user-area");
    }
    protected function autenticaLogin(Request $request)
    {
        $this->request = $request;
        $this->user_consult = DB::table('users')->where("email", $this->request->input("email"))->first();                       

        $materia_table = TblMateria::all();
        $anotacoes_table = TblAnotacoes::all();
        
        if ($this->request->input("email") ==  $this->user_consult->email && Hash::check($this->request->input("password"), $this->user_consult->password)) {
            $this->request->session()->put("userSession", ["user" => $this->user_consult->name, "id_user" => $this->user_consult->id]);            
            
            $request_content = $this->request->session()->all();
            
            return view("user-area", ["user" => $request_content["userSession"]["user"], "data" => $request_content["userSession"]["id_user"], "materia" => $materia_table],["anotacoes"=> $anotacoes_table]);
        }
        if ($this->user_consult->email == null) {
            echo '<script>alert("Nome de usuário ou senha não existem"); window.location.href = "/"</script>';
        } else {
            echo '<script>alert("Nome de usuário ou senha não existem"); window.location.href = "/"</script>';
        }
    }
}
