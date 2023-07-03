<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookedService;
use App\Models\BookedProduct;
use App\Models\Product;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index()
    {
        // Retrieve the booked products and services for the authenticated user
        $userId = Auth::id();
        $bookedProducts = BookedProduct::where('user_id', $userId)->get();
        $bookedServices = BookedService::where('user_id', $userId)->get();

        $total = 0;
        // total services
        foreach($bookedServices as $bookedService){
            $total += Service::find($bookedService->service_id)->price;
        }
        // +total products
        foreach($bookedProducts as $bookedProduct){
            $total += Product::find($bookedProduct->product_id)->price;
        }
        

        // Retrieve all available services
        $services = Service::all();

        return view('booking', compact('bookedProducts', 'bookedServices', 'services', 'total'));
    }


    public function delete($bookedProductId)
    {
        $bookedProduct = BookedProduct::findOrFail($bookedProductId);
        $bookedProduct->delete();

        return redirect()->route('booking')->with('success', 'Product has been successfully deleted.');
    }


    public function book_service(Request $request){
        $request->validate([
            'service_id' => 'required',
            'book_date' => 'required',
            'book_time' => 'required',
        ]);
        
        // Data from post request
        $data = [
            'user_id' => Auth::user()->id,
            'service_id' => $request->service_id,
            'date' => $request->book_date,
            'time' => $request->book_time,
        ];

        // dd($data);

        // Retreiving all booked services to compare $data with
        $allBookedServicesCollection = BookedService::all();


        // Data to compare (unset id, user_id, created_at, updated_at cause we dont need them to be compared with booked services.
        $dataToCompare = $data;
        unset($dataToCompare['id']);
        unset($dataToCompare['user_id']);
        unset($dataToCompare['created_at']);
        unset($dataToCompare['updated_at']);


        // dump('dataToCompare');
        // dump($dataToCompare);
        

        foreach($allBookedServicesCollection as $bookedService){
            // Doing the same as in $dataToCompare but with current booked service we compare our $dataToCompare with
            $bookedService = $bookedService->toArray();
            unset($bookedService['id']);
            unset($bookedService['user_id']);
            unset($bookedService['created_at']);
            unset($bookedService['updated_at']);

            
            // dump('bookedService');
            // dump($bookedService);

            // Getting the differences of comparisaon
            $differences = array_diff($bookedService, $dataToCompare);
            
            
            // dump('differences');
            // dump($differences);

            // if there are no differences then our $dataToCompare == $bookedService. In this case we dont add new record to db and redirect back with message
            if(empty($differences)){
                return redirect()->route('booking')->withMessage('Please try another time or date');
            }
        }

        // if we didnt get empty differences looping through foreach, then new record is unique, so we add it to db
        BookedService::create($data);
        return redirect()->route('booking')->withMessage('Service has been booked successfully!');

    } 
}