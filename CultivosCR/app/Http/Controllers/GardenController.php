<?php

namespace App\Http\Controllers;

use App\Models\Garden;
use App\Models\Tree;
use App\Models\Vegetable;
use App\Models\Sale;
use App\Models\User;
use App\Models\Trade;
use App\Models\Review;
use App\Models\PhotosPerGarden;
use App\Models\FavoriteGardens;
use App\Models\HarvestBySale;
use App\Models\HarvestByTrade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use DB;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;



class GardenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view('gardens/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $districts = DB::table('district')->get();
        return view('gardens/create', ['districts' => $districts]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $garden = new Garden;
        $garden->Name = Input::get('Name');
        $garden->IdManager = Auth::id();
        $garden->District = Input::get('District');
        $garden->Directions = Input::get('Directions');
        $garden->Latitude = Input::get('Latitude');
        $garden->Longitude = Input::get('Longitude');
        $garden->save();
        $files = Input::file('file');
        if($files){
            $this->storePhotos($garden,$files);
        }
        return redirect(route('home'));
    }

    public function storePhotos($garden, $files)
    {
        $id = $garden->id;
        $time = Carbon::now();
        foreach($files as $file){
            $extension = $file->getClientOriginalExtension();    
            $directory = 'gardens/'. $id;
            $filename = str_random(5).date_format($time,'d').rand(1,9).date_format($time,'h').".".$extension;
            $upload_success = $file->storeAs($directory, $filename,'photos');
            $ext_upload_success = $file->storeAs($directory, $filename,'ext_photos');
            if ($upload_success && $ext_upload_success) {
                if(!$garden->GardenPicture){
                    $garden->GardenPicture = 'photos/gardens/'. $id.'/'.$filename;
                    $garden->save();
                }
                $photo = new PhotosPerGarden();
                $photo->IdGarden = $id;
                $photo->Photo = 'photos/gardens/'. $id.'/'.$filename;
                $photo->save();
            }
        }
    }
    
    
    public function storeReview($id){
        
        $review = Review::where('IdClient',Auth::id())->where('IdGarden',$id)->first();
        if(!$review){
            $review = new Review();
            $review->IdClient = Auth::id();    
        }   
        
        $review->Date = Carbon::now();
        $review->Score = Input::get('score');
        $review->Description = Input::get('Description');
        $garden = Garden::find($id);
        $garden->reviews()->save($review);
        
        return redirect()->back();
    }

    public function destroyReview($id){
        Review::destroy($id);
    }

    public function show($id)
    {
        return view('gardens/index', ['garden' => Garden::findOrFail($id)]);
    }

    public function showAdmin($id)
    {
         $garden = Garden::findOrFail($id);
         if (Auth::user()->can('view', $garden)) {
            return view('gardens/admin/dashboard', ['garden' => $garden]);
        }

        return redirect('home');
    }

    public function productsAdmin($id)
    {
         $garden = Garden::findOrFail($id);
         if (Auth::user()->can('view', $garden)) {
            return view('gardens/admin/products', ['garden' => $garden]);
        }

        return redirect('home');
    }

    public function reviews($id)
    {
        return view('gardens/reviews', ['garden' => Garden::findOrFail($id)]);
    }

    public function photos($id)
    {
        return view('gardens/photos', ['garden' => Garden::findOrFail($id)]);
    }

    public function products($id)
    {
        return view('gardens/product_list', ['garden' => Garden::findOrFail($id)]);
    }

    public function estadistica($id)
    {
        return view('gardens/estadistica', ['garden' => Garden::findOrFail($id)]);
    }

    public function sales($id)
    {
        return view('gardens/admin/Sales', ['garden' => Garden::findOrFail($id)]);
    }

    public function saledetail($id,$idSale){
        return view('gardens/admin/SalesDetail', ['garden' => Garden::findOrFail($id), 'sale' => Sale::findOrFail($idSale)]);
    }
    
    public function createSale($id){
        return view('gardens/admin/Sale/create', ['garden' => Garden::findOrFail($id)]);
    }

    public function collaborators($id){
        return view('gardens/admin/collaborators', ['garden' => Garden::findOrFail($id)]);
    }

    public function insertCollaborators($id){
        $email = Input::get('email');
        $user = User::where('email',$email)->first();
        if($user){
            $garden = Garden::find($id);
            $garden->collaborators()->attach($user);
        }
        return;
    }

    public function detachCollaborators($id,$userId){

        $user = User::find($userId);
        if($user){
            $garden = Garden::find($id);
            $garden->collaborators()->detach($user);
        }
        return redirect()->route('garden/collaborators',['id' => $id]);;
        
    }

    public function insertSale(Request $request, $id){
        $sale = new Sale;
        $sale->IdClient = Input::get('IdClient');
        $sale->IdGarden = $id;
        $products = Input::get('harvests');
        $quantities = Input::get('quantities');
        $sale->TotalPrice = 0;
        
        $products = explode(',', $products[0]);
        $quantities = explode(',', $quantities[0]);
        $sale->save();
        for ($i=0; $i <count($products) ; $i++) { 
            \Log::info($products[$i]);        
            $harvest = new HarvestBySale();
            $harvest->IdHarvest = $products[$i];
            $harvest->Quantity = $quantities[$i];
            $sale->TotalPrice += $harvest->subtotal();
            $sale->items()->save($harvest);
        }
        $sale->save();

        return redirect(route('sales'));   
    }

    public function trades($id){
        return view('gardens/admin/Trades', ['garden' => Garden::findOrFail($id)]);
    }

    public function tradedetail($id,$idTrade){
        return view('gardens/admin/TradesDetail', ['garden' => Garden::findOrFail($id), 'trade' => Trade::findOrFail($idTrade)]);
    }

    public function createTrade($id){
        $trees = Tree::all();
        $vegetables = Vegetable::all();
        return view('gardens/admin/Trade/create', ['garden' => Garden::findOrFail($id),'trees' => $trees, 'vegetables' => $vegetables]);
    }
  

    public function insertTrade($id){
        $trade = new Trade();
        $trade->IdClient = Input::get('IdClient');
        $trade->IdGarden = $id;
        $re_products = Input::get('re_harvests');
        $re_quantities = Input::get('re_quantities');
        $gi_products = Input::get('gi_harvests');
        $gi_quantities = Input::get('gi_quantities');
        $re_products = explode(',', $re_products[0]);
        $re_quantities = explode(',', $re_quantities[0]);
        $gi_products = explode(',', $gi_products[0]);
        $gi_quantities = explode(',', $gi_quantities[0]);
        $trade->save();
        for ($i=0; $i <count($re_products) ; $i++){  
            $harvest = new HarvestByTrade();
            $harvest->IdHarvest = $re_products[$i];
            $harvest->Quantity = $re_quantities[$i];
            $harvest->Receiving = true;
            $trade->items()->save($harvest);
        }
        for ($i=0; $i <count($gi_products) ; $i++){     
            $harvest = new HarvestByTrade();
            $harvest->IdHarvest = $gi_products[$i];
            $harvest->Quantity = $gi_quantities[$i];
            $harvest->Receiving = false;
            $trade->items()->save($harvest);
        }
        return redirect(route('trades',$id));   
    }
  
    public function follow($id){
        $favorite = new FavoriteGardens;
        $favorite->IdClient = Auth::id();
        $favorite->IdGarden = $id;
        $favorite->save();
    }

    public function unfollow($id){
        $favorite = FavoriteGardens::where('IdClient',Auth::id())->where('IdGarden',$id)->delete();
    }

    


}
