<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Service;
use App\Models\BookedService;
use App\Models\Master;
use Illuminate\Support\Facades\DB;
use App\Models\ProductCategory;
use Carbon\Carbon;

class AccountController extends Controller
{
    public function index()
    {
        $user = Auth::user(); // Get the authenticated user
        $categories = ProductCategory::all(); // Retrieve all product categories

        return view('account', compact('user', 'categories')); // Pass $categories to the view
    }

    public function update(Request $request)
    {
        $user = Auth::user(); // Get the authenticated user

        $updatedData = [
            'firstName' => $request->input('fName'),
            'lastName' => $request->input('sName'),
            'email' => $request->input('eMail'),
            'birthDate' => $request->input('bDate')
        ];

        DB::table('users')
            ->where('id', $user->id)
            ->update($updatedData);

        return response()->json(['message' => 'Account updated successfully']);
    }

    public function getUsersByVisitCount($visitCount)
    {
        $users = User::where('visitCount', '>', $visitCount)->get();
        return response()->json($users);
    }

    public function getAvailableProducts()
    {
        $products = Product::all();
        return response()->json($products);
    }

    public function popularServices()
    {
        $popularServices = DB::table('bookedservices')
            ->join('services', 'bookedservices.service_id', '=', 'services.id')
            ->select('services.name', DB::raw('COUNT(bookedservices.service_id) as count'))
            ->groupBy('bookedservices.service_id', 'services.name')
            ->orderByDesc('count')
            ->get();

        return response()->json($popularServices);
    }

    public function getTotalRevenue()
    {
        $services = DB::table('bookedservices')
            ->join('services', 'bookedservices.service_id', '=', 'services.id')
            ->select('services.name', DB::raw('SUM(services.price) as total'))
            ->groupBy('services.name')
            ->orderByDesc('total')
            ->limit(5)
            ->get();

        $products = DB::table('bookedproducts')
            ->join('products', 'bookedproducts.product_id', '=', 'products.id')
            ->select('products.name', DB::raw('SUM(products.price) as total'))
            ->groupBy('products.name')
            ->orderByDesc('total')
            ->limit(5)
            ->get();

        return response()->json([
            'services' => $services,
            'products' => $products,
        ]);
    }

    public function getEmployeesWithServiceCount()
    {
        $employees = DB::table('masters')
            ->join('masterCompitiences', 'masters.id', '=', 'masterCompitiences.masters_id')
            ->join('services', 'masterCompitiences.services_id', '=', 'services.id')
            ->join('bookedservices', 'services.id', '=', 'bookedservices.service_id')
            ->select('masters.firstName', 'masters.lastName', DB::raw('COUNT(bookedservices.id) as serviceCount'))
            ->groupBy('masters.id', 'masters.firstName', 'masters.lastName')
            ->get();

        return response()->json($employees);
    }

    public function getCustomersWithContactInfo()
    {
        $customers = User::select('firstName', 'lastName', 'sex', 'email', 'birthDate')->get();

        return response()->json($customers);
    }

    public function getServices()
    {
        $services = Service::all();
        return response()->json($services);
    }

    public function getMasters()
    {
        $masters = Master::with('services')->get();
        return response()->json($masters);
    }

    public function getClientsByDate(Request $request)
    {
        $selectedDate = $request->input('date');
        $clients = User::whereHas('bookedServices', function ($query) use ($selectedDate) {
            $query->where('date', $selectedDate);
        })->with(['bookedServices' => function ($query) use ($selectedDate) {
            $query->where('date', $selectedDate)->with('service');
        }])->get();

        return response()->json($clients);
    }

    public function getAvailableTimeSlots(Request $request)
    {
        $selectedDate = Carbon::parse($request->input('date'))->format('Y-m-d');
        $selectedServiceId = $request->input('service_id');

        // Получаем занятые временные слоты для выбранной даты и услуги
        $bookedTimeSlots = BookedService::where('date', $selectedDate)
            ->where('service_id', $selectedServiceId)
            ->pluck('time')
            ->map(function ($time) {
                return Carbon::parse($time)->format('H:i');
            })
            ->toArray();

        // Получаем все временные слоты
        $allTimeSlots = [
            '12:00', '13:00', '14:00', '15:00', '16:00', '17:00'
        ];

        // Определяем доступные временные слоты путем исключения занятых слотов
        $availableTimeSlots = array_diff($allTimeSlots, $bookedTimeSlots);

        return response()->json($availableTimeSlots);
    }
}
