<?php

namespace App\Http\Controllers;

use App\Imports\StocksImport;
use App\Models\Stock;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class HomeController extends Controller
{
    public function import()

    {
     //   Excel::import(new StocksImport(),request()->file('file'));
      //  return back();
        $stocks = Stock::all();
        $stocksUnique = $stocks->unique(['variant']);
        $stockDuplicates = $stocks->diff($stocksUnique);
        print("<pre>".print_r($stockDuplicates,true)."</pre>");
        $arrayitem['stock_id'] = [];
        foreach ($stocks as $stock)
        {
           foreach ($stockDuplicates as $duplicate)
           {
               if($stock->variant == $duplicate->variant && $duplicate->id !=$stock->id )
               {
               //  echo  $duplicated['id'] = $duplicate->stock .'|'.$stock->stock. 'id= '.$stock->id.'</br>';
                   $duplicated=$duplicate->id;
                 array_push($arrayitem['stock_id'],$duplicated);
               }
           }

        }

    }

}
