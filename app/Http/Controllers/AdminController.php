<?php

namespace App\Http\Controllers;

use App\Commune;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Espace;
use App\Type;
use App\Periode;
use App\Disponibilite;
use App\Hotel;
use Illuminate\Support\Facades\Validator;


class AdminController extends Controller
{
    //
    public function index(){
        return view('admin.connexion');
    }

    public function home(){
        $Users = User::all();
        return view('admin.home');
    }

    public function listAgents(){
        $Agents = User::where('role',2)->get();
        //dd($Agents);
        return view('admin.liste_agents', compact('Agents'));
    }

    public function listUtilisateur(){
        $Utilisateurs = User::where('role',1)->get();
        //dd($Agents);
        return view('admin.liste_utilisateur', compact('Utilisateurs'));

    }

    public function agentInfo($id){

        $findUser = User::find($id);
        $espaces = Espace::where('id_user',$id)->get();
        return view('admin.agent',compact('findUser'));

    }

    public function utilisateurInfo($id){
        $findUser = User::find($id);
        $espaces = Espace::where('id_user',$id)->get();
        return view('admin.utilisateur',compact('findUser'));
    }

    public function espace(){
        $categorie = Type::all();
        $dateDisponibilite = Periode::all();
        $commune = Commune::all();
        return view('admin.espace', compact('categorie','commune','dateDisponibilite'));
    }

    public function listHotel(){

        $hotels = Hotel::leftjoin('users','users.id','=','hotels.id_user')
        ->select('hotels.name as hotel','users.name as name',
                 'hotels.picture as logo','hotels.phone','hotels.id')
        ->get();
        return view('admin.hotel',compact('hotels'));

    }

    public function detailHotel($id){

        $infoHotel = Hotel::where('hotels.id',$id)
        ->leftjoin('users','users.id','=','hotels.id_user')
        ->select('hotels.name as hotel','users.name as agent','users.email','hotels.phone')
        ->first();
        $Espace = Espace::where('id_user',$id)->get();
        return view('admin.detail_hotel', compact('Espace','infoHotel'));

    }

    public function saveEspace(Request $request){
        //dd($request->all());
        try {
            $image_un = $request->file('image_un');
            $image_deux = $request->file('image_deux');
            $image_trois = $request->file('image_un');

            // traitement des image 
            if($image_un ){
                $name_img = $image_un->getClientOriginalName();
                Storage::disk('public')->put($name_img, file_get_contents($image_un));
            }else{
                $name_img = "default.jpg";
            }
            if($image_deux ){
                $name_imgdeux = $image_deux->getClientOriginalName();
                Storage::disk('public')->put($name_imgdeux, file_get_contents($image_deux));
            }else{
                $name_imgdeux = "default.jpg";
            }
            if($image_trois ){
                $name_imgtrois = $image_trois->getClientOriginalName();
                Storage::disk('public')->put($name_imgtrois, file_get_contents($image_trois));
            }else{
                $name_imgtrois = "default.jpg";
            }


            $espace = new Espace;

            $matricule = time();
            $user = Auth::user();

            $espace->matricule = $matricule;
            $espace->id_user = $user->id;
            $espace->designation = $request->get('designation');
            $espace->description = $request->get('description');
            $espace->localisation = $request->get('localisation');
            $espace->commune = $request->get('commune');
            $espace->longitude = "000000";
            $espace->latitude = "000000";
            $espace->disponibilité = "0";
            $espace->type = $request->get('type');
            $espace->path_un = $name_img;
            $espace->path_deux = $name_imgdeux;
            $espace->path_trois = $name_imgtrois;
            $espace->montant = $request->get('montant');
            
            if($espace->save()){
                $jousdispo = array();
                if($jousdispo = $request->get('jousdispo')){
                    foreach($jousdispo as $date){
                        Disponibilite::create([
                            'periode' => $date,
                            'id_espace' => $matricule,
                            'horraire_un' => $request->get('time_start'),
                            'horaire_deux' => $request->get('time_end'),
                        ]);
                    }
                }
            }

            return redirect()->back()->with('success', 'Opération éffectué avec succès.');

            
            //code...
        } catch (\Throwable $th) {
            dd($th);
            return redirect()->back()->with('danger', 'Error.');
        }

    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required'],
        ]);
    }

    public function register(Request $request){
        //dd($request->all());
        try {
            //code...
            $user = new User;

            $user->name = $request['name'];
            $user->email = $request['email'];
            $user->password =  Hash::make($request['password']);
            $user->role = $request['role'];

            if($user->save()){

                $logo = $request->file('logo');

                // traitement des image 
                if($logo){
                    $name_img = $logo->getClientOriginalName();
                    Storage::disk('public')->put($name_img, file_get_contents($logo));
                }else{
                    $name_img = "default.jpg";
                }

                $hotel = new Hotel;

                $hotel->id_user = $user->id;
                $hotel->phone = $request->get('phone');
                $hotel->name = $request->get('hotel');
                $hotel->picture = $name_img;

                $hotel->save();

                return redirect()->back()->with('success', 'Opération éffectué avec succès.');

            }


        } catch (\Throwable $th) {
            //throw $th;
            dd($th );
        }

    }

    public function agent(){
        return view('admin.ajout_agent');
    }

    public function listEspaces(){

        $user = Auth::user();
        //$espaces = Espace::where('id',$user->id)->get();
        $espaces = Espace::all();
        return view('admin.list_espace', compact('espaces'));
    }

    public function detailEspace($id){

        $findEspace = Espace::find($id);

        //dd($id);

        return view('admin.detaiil_espace', compact('findEspace'));

    }


    
}
