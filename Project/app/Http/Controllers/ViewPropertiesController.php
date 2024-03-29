<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MapController;
use Illuminate\Http\Request;
use App\Models\house;
use App\Models\property;
use App\Models\construction;
use App\Models\houseLocation;
use App\Models\interior;

use Illuminate\Support\Facades\DB;

class ViewPropertiesController extends Controller
{
    public function getHouses(){
        return DB::table('houses')->get();
    }
    function viewProperties(){
        $listings = DB::select("
        SELECT h.houseID,h.price,h.listingType,h.description,h.coordinateLatitude,h.coordinateLongitude,h.otherDesc,
        p.prknSpacesNo,p.garageSpacesNo,p.prknSize,p.acreSize,p.squareFeet,p.otherDesc,
        c.homeType,c.archType,c.constMaterials,c.roof,c.builtYear, c.otherDesc,
        l.country,l.state,l.county,l.city,l.zip,l.region,l.street,l.apptNo,
        i.bedroomNo,i.bathNo,i.kitchenNo,i.heatingDesc,i.basementDesc,i.applianceDesc,i.floorsNo,i.floorType,i.coolingDesc,i.otherDesc 
        FROM houses h 
        JOIN properties p ON p.houseID=h.houseID 
        JOIN constructions c ON c.houseID=h.houseID 
        JOIN house_Locations l ON l.houseID=h.houseID 
        JOIN interiors i ON i.houseID=h.houseID
    ");
        $houses = $this->getHouses();
    
        return view('/propertyList', ["listings"=>$listings], ['houses' => $houses]);
        }

        function viewPropertiesIndex(){
            $listings = DB::select("
                SELECT h.houseID,h.price,h.listingType,h.description,h.coordinateLatitude,h.coordinateLongitude,h.otherDesc,
                p.prknSpacesNo,p.garageSpacesNo,p.prknSize,p.acreSize,p.squareFeet,p.otherDesc,
                c.homeType,c.archType,c.constMaterials,c.roof,c.builtYear, c.otherDesc,
                l.country,l.state,l.county,l.city,l.zip,l.region,l.street,l.apptNo,
                i.bedroomNo,i.bathNo,i.kitchenNo,i.heatingDesc,i.basementDesc,i.applianceDesc,i.floorsNo,i.floorType,i.coolingDesc,i.otherDesc 
                FROM houses h 
                JOIN properties p ON p.houseID=h.houseID 
                JOIN constructions c ON c.houseID=h.houseID 
                JOIN house_Locations l ON l.houseID=h.houseID 
                JOIN interiors i ON i.houseID=h.houseID
            ");
            
            return view('index', ["listings" => $listings]);
        }
}
