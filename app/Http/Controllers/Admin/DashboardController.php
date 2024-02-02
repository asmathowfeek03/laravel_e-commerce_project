<?php

namespace App\Http\Controllers\Admin;


use App\Models\User;
use App\Models\Brand;
use App\Models\Order;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use App\Models\Orderitem;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function authenticated()
    {
        $user = Auth::user();

        if ($user && $user->role_id == 1) {
            $totalProducts = Product::count();
            $totalCategories = Category::count();
            $totalBrands = Brand::count();

            $totalAllUsers = User::count();
            $totalUser = User::where('role_id','0')->count();
            $totalAdmin = User::where('role_id','1')->count();

            //date formats
            $todayDate = Carbon::now()->format('d-m-Y');
            $thisMonth = Carbon::now()->format('m');
            $thisYear = Carbon::now()->format('Y');

            $totalOrder = Order::count();
            $todayOrder = Order::whereDate('created_at',$todayDate)->count();
            $thisMonthOrder = Order::whereMonth('created_at',$thisMonth)->count();
            $thisYearOrder = Order::whereYear('created_at',$thisYear)->count();

            return view('admin.dashboard',compact('totalProducts','totalCategories','totalBrands','totalAllUsers','totalUser','totalAdmin','totalOrder','todayOrder','thisMonthOrder','thisYearOrder'))->with('status', 'Welcome to Admin Dashboard');

        } else {
            $sliders = Slider::where('status','0')->get();
            $trendingProducts = Product::where('trending', '1')->latest()->take(10)->get();
            $newArrivalProducts = Product::latest()->take(16)->get();
            $featuredProducts = Product::where('featured','1')->latest()->get();
            return view('frontend.index', compact('sliders', 'trendingProducts','newArrivalProducts','featuredProducts'))->with('status', 'Logged In Successfully');
        }
    }

    public function index()
    {
        $totalProducts = Product::count();
        $totalCategories = Category::count();
        $totalBrands = Brand::count();

        $totalAllUsers = User::count();
        $totalUser = User::where('role_id','0')->count();
        $totalAdmin = User::where('role_id','1')->count();

        //date formats
        $todayDate = Carbon::now()->format('d-m-Y');
        $thisMonth = Carbon::now()->format('m');
        $thisYear = Carbon::now()->format('Y');

        $totalOrder = Order::count();
        $todayOrder = Order::whereDate('created_at', $todayDate)->count();
        $thisMonthOrder = Order::whereMonth('created_at',$thisMonth)->count();
        $thisYearOrder = Order::whereYear('created_at',$thisYear)->count();

        return view('admin.dashboard',compact('totalProducts','totalCategories','totalBrands','totalAllUsers','totalUser','totalAdmin','totalOrder','todayOrder','thisMonthOrder','thisYearOrder'))->with('status', 'Welcome to Admin Dashboard');


    }


    public function charts(){
            $thisYear = Carbon::now()->format('Y');

             // Monthly order analytics
            $monthlyOrderCounts = Order::select(DB::raw('MONTH(created_at) as month'), DB::raw('COUNT(id) as count'))
                ->whereYear('created_at', $thisYear)
                ->groupBy(DB::raw('MONTH(created_at)'))
                ->get();

            $months = [];
            $orderCounts = [];

            foreach ($monthlyOrderCounts as $monthlyOrderCount) {
                $months[] = Carbon::createFromDate($thisYear, $monthlyOrderCount->month, 1)->format('F');
                $orderCounts[] = $monthlyOrderCount->count;
            }

             // Yearly order analytics
            $yearlyOrderCounts = Order::select(DB::raw('YEAR(created_at) as year'), DB::raw('COUNT(id) as count'))
            ->groupBy(DB::raw('YEAR(created_at)'))
            ->get();

            $years = [];
            $yearlyOrderCountsData = [];

            foreach ($yearlyOrderCounts as $yearlyOrderCount) {
                $years[] = $yearlyOrderCount->year;
                $yearlyOrderCountsData[] = $yearlyOrderCount->count;
            }

            // Monthly income analytics with quantity calculation
            $monthlyIncome = OrderItem::select(
                DB::raw('MONTH(orders.created_at) as month'),
                DB::raw('SUM(order_items.quantity * order_items.price) as total_value')
            )
            ->join('orders', 'order_items.order_id', '=', 'orders.id')
            ->whereYear('orders.created_at', $thisYear)
            ->groupBy(DB::raw('MONTH(orders.created_at)'))
            ->get();

            $months = [];
            $totalValues = [];

            foreach ($monthlyIncome as $monthlyIncomeData) {
                $months[] = Carbon::createFromDate($thisYear, $monthlyIncomeData->month, 1)->format('F');
                $totalValues[] = $monthlyIncomeData->total_value;
            }


           // Yearly income analytics with quantity calculation
            $yearlyIncome = OrderItem::select(
                DB::raw('YEAR(orders.created_at) as year'),
                DB::raw('SUM(order_items.quantity * order_items.price) as total_value')
            )
            ->join('orders', 'order_items.order_id', '=', 'orders.id')
            ->groupBy(DB::raw('YEAR(orders.created_at)'))
            ->get();

            $yearlyTotalValues = $yearlyIncome->pluck('total_value', 'year')->toArray();



            // Monthly registered customers analytics
            $monthlyCustomerCounts = User::select(DB::raw('MONTH(created_at) as month'), DB::raw('COUNT(id) as count'))
            ->whereYear('created_at', $thisYear)
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->get();

            $monthlyCustomers = [];
            $monthlyCustomersCount = [];

            foreach ($monthlyCustomerCounts as $monthlyCustomerCount) {
                $monthlyCustomers[] = Carbon::createFromDate($thisYear, $monthlyCustomerCount->month, 1)->format('F');
                $monthlyCustomersCount[] = $monthlyCustomerCount->count;
            }

            // Monthly customers with role_id = 0 analytics
            $monthlyRole0Counts = User::select(DB::raw('MONTH(created_at) as month'), DB::raw('COUNT(id) as count'))
                ->where('role_id', 0)
                ->whereYear('created_at', $thisYear)
                ->groupBy(DB::raw('MONTH(created_at)'))
                ->get();

            $monthlyRole0Customers = [];
            $monthlyRole0CustomersCount = [];

            foreach ($monthlyRole0Counts as $monthlyRole0Count) {
                $monthlyRole0Customers[] = Carbon::createFromDate($thisYear, $monthlyRole0Count->month, 1)->format('F');
                $monthlyRole0CustomersCount[] = $monthlyRole0Count->count;
            }

            // Monthly customers with role_id = 1 analytics
            $monthlyRole1Counts = User::select(DB::raw('MONTH(created_at) as month'), DB::raw('COUNT(id) as count'))
                ->where('role_id', 1)
                ->whereYear('created_at', $thisYear)
                ->groupBy(DB::raw('MONTH(created_at)'))
                ->get();

            $monthlyRole1Customers = [];
            $monthlyRole1CustomersCount = [];

            foreach ($monthlyRole1Counts as $monthlyRole1Count) {
                $monthlyRole1Customers[] = Carbon::createFromDate($thisYear, $monthlyRole1Count->month, 1)->format('F');
                $monthlyRole1CustomersCount[] = $monthlyRole1Count->count;
            }

            return view('admin.chart', compact(
                'months',
                'orderCounts',
                'years',
                'totalValues',
                'yearlyTotalValues',
                'yearlyOrderCountsData',
                'monthlyCustomers',
                'monthlyCustomersCount',
                'monthlyRole0Customers',
                'monthlyRole0CustomersCount',
                'monthlyRole1Customers',
                'monthlyRole1CustomersCount',
            ));

    }

}
