<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Commune;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use DB;
use App\User;
use App\Espace;
use App\Type;
use App\Periode;
use App\Disponibilite;
use App\Hotel;

class ApiController extends Controller
{
    // Liste des espaces disponible en fonction du jour de la semaine a afficher pas defautl
    public function listeEspaceDefault(){
        try {
           // numero de la position du jour actuel dans la senmaine
           $date = date('N');

           $espaceDate = Disponibilite::where('periode',$date)
           ->leftjoin('espaces','espaces.matricule','=','disponibilites.id_espace')
           ->leftjoin('hotels','hotels.id','=','espaces.id_user')
           ->leftjoin('types','types.id','=','espaces.type')
           ->where('espaces.disponibilite','=',0)
           ->select('espaces.*','hotels.name as name_hotel','hotels.picture as logo_hotel','hotels.phone as phone_hotel','types.libelle as categorie_espace')
           ->get();

           //dd($espaceDate);
           return response()->json(['statu' => 1, 'data' => $espaceDate]);

        } catch (\Throwable $th) {
            //throw $th;
            dd($th);
        }

    }

    // Liste des commune 
    public function listCommune(){
        try {
           $commune = Commune::all();
           //dd($espaceDate);
           return response()->json(['statu' => 1, 'data' => $commune]);
        } catch (\Throwable $th) {
            //throw $th;
            dd($th);
        }
    }


    // Liste des differents categorie ou type d'espace
    public function listCayegorie(){
        try {
           $categorie = Type::all();
           //dd($espaceDate);
           return response()->json(['statu' => 1, 'data' => $categorie]);
        } catch (\Throwable $th) {
            //throw $th;
            dd($th);
        }
    }

     // Liste des jours de la semaine
     public function listJours(){
        try {
           $jours = Periode::all();
           //dd($espaceDate);
           return response()->json(['statu' => 1, 'data' => $jours]);
        } catch (\Throwable $th) {
            //throw $th;
            dd($th);
        }
    }

    // Liste des montant 
    public function listMontant(){
        try {
           //Espace::select('montant')->get();
           $montant = DB::table('espaces')
             ->select(DB::raw('count(*) as nbre, montant'))
             ->groupBy('montant')
             ->get();
           //dd($espaceDate);
           return response()->json(['statu' => 1, 'data' => $montant]);
        } catch (\Throwable $th) {
            //throw $th;
            dd($th);
        }
    }

    // LISTE DES API RELATIVE AUX DIFFERENTS FILTRE (COMME - CATEGORIE - MONTANT - )

    public function filtres(Request $request){

        try {
            $commune = $request['commune'];
            $categorie = $request['categorie'];
            $montant = $request['montant'];
            $date = date('N');
            
            // filtre sur la commune 
            if($commune){

            $espaceDate = Disponibilite::where('periode',$date)
            ->leftjoin('espaces','espaces.matricule','=','disponibilites.id_espace')
            ->leftjoin('hotels','hotels.id','=','espaces.id_user')
            ->leftjoin('types','types.id','=','espaces.type')
            ->where('espaces.disponibilite','=',0)
            ->where('espaces.commune','=',$commune)
            ->select('espaces.*','users.name','users.picture','users.phone','types.libelle')
            ->get();
            
            // retour de l'information
            return response()->json(['statu' => 1, 'data' => $espaceDate]);

            }
            // filtre sur la categorie
            elseif($categorie){

            $espaceDate = Disponibilite::where('periode',$date)
            ->leftjoin('espaces','espaces.matricule','=','disponibilites.id_espace')
            ->leftjoin('hotels','hotels.id','=','espaces.id_user')
            ->leftjoin('types','types.id','=','espaces.type')
            ->where('espaces.disponibilite','=',0)
            ->where('espaces.type','=',$categorie)
            ->select('espaces.*','users.name','users.picture','users.phone','types.libelle')
            ->get();
            
            // retour de l'information
            return response()->json(['statu' => 1, 'data' => $espaceDate]);

            }
            // filtre sur le montant
            elseif($montant){

            $espaceDate = Disponibilite::where('periode',$date)
            ->leftjoin('espaces','espaces.matricule','=','disponibilites.id_espace')
            ->leftjoin('hotels','hotels.id','=','espaces.id_user')
            ->leftjoin('types','types.id','=','espaces.type')
            ->where('espaces.disponibilite','=',0)
            ->where('espaces.type','=',$montant)
            ->select('espaces.*','users.name','users.picture','users.phone','types.libelle')
            ->get();
            
            // retour de l'information
            return response()->json(['statu' => 1, 'data' => $espaceDate]);

            }
        } catch (\Throwable $th) {
            //throw $th;
        }

    }

    public function espaceSponsorisez(){
        try {
            $date = date('N');

            $espaceActive = Hotel::where('sponsoring',1)
            ->leftjoin('espaces','espaces.id_user','=','hotels.id_user')
            ->leftjoin('types','types.id','=','espaces.type')
            ->leftjoin('disponibilites','disponibilites.id_espace','=','espaces.matricule')
            ->where('espaces.disponibilite','=',0)
            ->where('disponibilites.periode',$date)
            ->select('espaces.*','hotels.name as name_hotel','hotels.picture as logo_hotel','hotels.phone as phone_hotel','types.libelle as categorie')
            ->get();

            // retour de l'information
            return response()->json(['statu' => 1, 'data' => $espaceActive]);

        } catch (\Throwable $th) {
            //throw $th;
            dd($th);
        }

    }


    // LISTE API AGENTS
    public function saveEspace(Request $request){
        //dd($request->all());
        try {
            $image_un = $request->file('image_un');
            $image_deux = $request->file('image_deux');
            $image_trois = $request->file('image_un');

            // traitement des image 
            if($image_un){
                $name_img = $image_un->getClientOriginalName();
                Storage::disk('public')->put($name_img, file_get_contents($image_un));
            }else{
                $name_img = "default.jpg";
            }
            if($image_deux){
                $name_imgdeux = $image_deux->getClientOriginalName();
                Storage::disk('public')->put($name_imgdeux, file_get_contents($image_deux));
            }else{
                $name_imgdeux = "default.jpg";
            }
            if($image_trois){
                $name_imgtrois = $image_trois->getClientOriginalName();
                Storage::disk('public')->put($name_imgtrois, file_get_contents($image_trois));
            }else{
                $name_imgtrois = "default.jpg";
            }

            $espace = new Espace;

            // generation du matricule 
            $matricule = time();

            $espace->matricule = $matricule;
            $espace->id_user = $request['id'];
            $espace->designation = $request['designation'];
            $espace->description = $request['description'];
            $espace->localisation = $request['localisation'];
            $espace->commune = $request['commune'];
            $espace->longitude = $request['longitude'];
            $espace->latitude = $request['latitude'];
            $espace->disponibilité = "0";
            $espace->type = $request['type'];
            $espace->path_un = $name_img;
            $espace->path_deux = $name_imgdeux;
            $espace->path_trois = $name_imgtrois;
            $espace->montant = $request['montant'];
            
            if($espace->save()){
                $jousdispo = array();
                if($jousdispo = $request['jousdispo']){
                    foreach($jousdispo as $date){
                        Disponibilite::create([
                            'periode' => $date,
                            'id_espace' => $matricule,
                            'horraire_un' => $request['time_start'],
                            'horaire_deux' => $request['time_end'],
                        ]);
                    }
                }
            }

            $message = 'Opération éffectué avec succès.';

            return response()->json(['statu' => 1, 'data' => $message]);

            
            //code...
        } catch (\Throwable $th) {
            dd($th);
            return redirect()->back()->with('danger', 'Error.');
        }

    }

    public function registerAgent(Request $request){

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

                $message = 'Opération éffectué avec succès.';
                return response()->json(['statu' => 1, 'data' => $message]);

            }


        } catch (\Throwable $th) {
            //throw $th;
            dd($th );
        }

    }




}