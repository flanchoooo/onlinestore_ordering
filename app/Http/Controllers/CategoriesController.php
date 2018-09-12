<?php

namespace App\Http\Controllers;

use App\ShoppingItem;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function getCough(){
        $header = "Cough, Flu, Allergy";
        $shopping_items = ShoppingItem::whereStatus('Active')
            ->whereCategory('Cough')
            ->get();
        $data = ['header' => $header, 'shopping_items' => $shopping_items];

        return view('categories.view')->with($data);

    }

    public function getPainManagement(){
        $header = "Pain Management";
        $shopping_items = ShoppingItem::whereStatus('Active')
            ->whereCategory('Pain Management')
            ->get();
        $data = ['header' => $header, 'shopping_items' => $shopping_items];

        return view('categories.view')->with($data);

    }

    public function getWoundManagement(){
        $header = "Wound Management";
        $shopping_items = ShoppingItem::whereStatus('Active')
            ->whereCategory('Wound Management')
            ->get();
        $data = ['header' => $header, 'shopping_items' => $shopping_items];

        return view('categories.view')->with($data);

    }

    public function getSkinConditions(){
        $header = "Skin Conditions";
        $shopping_items = ShoppingItem::whereStatus('Active')
            ->whereCategory('Skin Conditions')
            ->get();
        $data = ['header' => $header, 'shopping_items' => $shopping_items];

        return view('categories.view')->with($data);

    }

    public function getOralCare(){
        $header = "Oral Care";
        $shopping_items = ShoppingItem::whereStatus('Active')
            ->whereCategory('Oral Care')
            ->get();
        $data = ['header' => $header, 'shopping_items' => $shopping_items];

        return view('categories.view')->with($data);

    }

    public function getMedicalConsumables(){
        $header = "Medical Consumables";
        $shopping_items = ShoppingItem::whereStatus('Active')
            ->whereCategory('Medical Consumables')
            ->get();

    }

    public function getNutritional(){
        $header = "Nutritional";
        $shopping_items = ShoppingItem::whereStatus('Active')
            ->whereCategory('Nutritional')
            ->get();
        $data = ['header' => $header, 'shopping_items' => $shopping_items];

        return view('categories.view')->with($data);

    }

    public function getBaby(){
        $header = "Baby";
        $shopping_items = ShoppingItem::whereStatus('Active')
            ->whereCategory('Baby')
            ->get();
        $data = ['header' => $header, 'shopping_items' => $shopping_items];

        return view('categories.view')->with($data);

    }

    public function getSportsNutrition(){
        $header = "Sports Nutrition";
        $shopping_items = ShoppingItem::whereStatus('Active')
            ->whereCategory('Sports Nutrition')
            ->get();
        $data = ['header' => $header, 'shopping_items' => $shopping_items];

        return view('categories.view')->with($data);

    }

    public function getVitamins(){
        $header = "Vitamins";
        $shopping_items = ShoppingItem::whereStatus('Active')
            ->whereCategory('Vitamins')
            ->get();

    }

    public function getHerbal(){
        $header = "Herbal";
        $shopping_items = ShoppingItem::whereStatus('Active')
            ->whereCategory('Herbal')
            ->get();
        $data = ['header' => $header, 'shopping_items' => $shopping_items];

        return view('categories.view')->with($data);

    }

    public function getPregnancy(){
        $header = "Pregnancy";
        $shopping_items = ShoppingItem::whereStatus('Active')
            ->whereCategory('Pregnancy')
            ->get();
        $data = ['header' => $header, 'shopping_items' => $shopping_items];

        return view('categories.view')->with($data);

    }

    public function getBodySkinCare(){
        $header = "Body Skin Care";
        $shopping_items = ShoppingItem::whereStatus('Active')
            ->whereCategory('Body Skin Care')
            ->get();
        $data = ['header' => $header, 'shopping_items' => $shopping_items];

        return view('categories.view')->with($data);

    }

    public function getDeodorant(){
        $header = "Deodorant";
        $shopping_items = ShoppingItem::whereStatus('Active')
            ->whereCategory('Deodorant')
            ->get();
        $data = ['header' => $header, 'shopping_items' => $shopping_items];

        return view('categories.view')->with($data);

    }

    public function getHairCare(){
        $header = "Hair Care";
        $shopping_items = ShoppingItem::whereStatus('Active')
            ->whereCategory('Hair Care')
            ->get();
        $data = ['header' => $header, 'shopping_items' => $shopping_items];

        return view('categories.view')->with($data);

    }

    public function getMakeUp(){
        $header = "Make Up";
        $shopping_items = ShoppingItem::whereStatus('Active')
            ->whereCategory('Make Up')
            ->get();
        $data = ['header' => $header, 'shopping_items' => $shopping_items];

        return view('categories.view')->with($data);

    }

    public function getSunProtection(){
        $header = "Sun Protection";
        $shopping_items = ShoppingItem::whereStatus('Active')
            ->whereCategory('Sun Protection')
            ->get();
        $data = ['header' => $header, 'shopping_items' => $shopping_items];

        return view('categories.view')->with($data);

    }

    public function getNappies(){
        $header = "Nappies";
        $shopping_items = ShoppingItem::whereStatus('Active')
            ->whereCategory('Nappies')
            ->get();
        $data = ['header' => $header, 'shopping_items' => $shopping_items];

        return view('categories.view')->with($data);

    }

    public function getBabyFeeding(){
        $header = "Baby Feeding";
        $shopping_items = ShoppingItem::whereStatus('Active')
            ->whereCategory('Baby Feeding')
            ->get();
        $data = ['header' => $header, 'shopping_items' => $shopping_items];

        return view('categories.view')->with($data);

    }
}
