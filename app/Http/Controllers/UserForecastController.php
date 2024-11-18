<?php

namespace App\Http\Controllers;

use App\Models\Forecasts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class UserForecastController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (session()->exists('users')) {
            $user = session()->pull('users');
            session()->put('users', $user);

            if ($user['userType'] != 2) {
                return redirect("/");
            }

            $allForecast = DB::table('forecasts')
                ->where('userID', '=', $user['userID'])
                ->orderBy('created_at', 'desc')
                ->paginate(10);

            return view('user.forecast', ['allForecast' => $allForecast]);
        }
        return redirect("/");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (session()->exists('users')) {
            $user = session()->pull('users');
            session()->put('users', $user);

            if ($user['userType'] != 2) {
                return redirect("/");
            }

            if ($request->btnForecast) {
                $inputData = $request->only(['temp', 'rainfall', 'humidity', 'windSpeed', 'forecastDate']);

                // Convert forecastDate to MM/dd/YYYY format
                $originalDate = strtotime($inputData['forecastDate']);
                $formattedDate = date('m/d/Y', $originalDate);

                // Determine if the date is a weekday or weekend
                $dayOfWeek = date('N', $originalDate); // 1 (Monday) to 7 (Sunday)
                $dayType = ($dayOfWeek >= 6) ? 'Weekend' : 'Weekday';

                // Define the type of day (you can customize this logic)
                $typeOfDay = 'Normal Day'; // Example: Define based on custom conditions

                // Prepare data for CSV
                $csvData = [
                    ['Date', 'Weekday or Weekend', 'Type Of Day', 'Mean Temperature', 'Rainfall', 'Relative Humidity', 'Windspeed'],
                    [
                        $formattedDate,
                        $dayType,
                        $typeOfDay,
                        $inputData['temp'],
                        $inputData['rainfall'],
                        $inputData['humidity'],
                        $inputData['windSpeed'],
                    ],
                ];

                // Create a temporary CSV file
                $filePath = storage_path('app/temp_input.csv');
                $file = fopen($filePath, 'w');
                foreach ($csvData as $row) {
                    fputcsv($file, $row);
                }
                fclose($file);

                try {
                    // Send the file to the API
                    $response = Http::attach(
                        'file', // The API's expected file input name
                        file_get_contents($filePath),
                        'input_data.csv'
                    )->post('http://localhost:5000/manual/predict', []);

                    // Check API response
                    if ($response->successful()) {
                        $data = $response->json()[0][$formattedDate];
                        $newForecast = new Forecasts();
                        $newForecast->userID = $user['userID'];
                        $det = date('Y-m-d', $originalDate);
                        $newForecast->forecastedDate = $det;
                        $newForecast->energy = $data;
                        $isSave = $newForecast->save();
                        if ($isSave) {
                            session()->put("successForecast", true);
                            return redirect("/forecast");
                        } else {
                            session()->put("errorForecast", true);
                            return redirect("/user_dashboard");
                        }
                    } else {
                        return response()->json(['error' => 'API request failed', 'response' => $response->body()], 500);
                    }
                } catch (\Exception $e) {
                    return response()->json(['error' => $e->getMessage()], 500);
                } finally {
                    // Clean up the temporary file
                    if (file_exists($filePath)) {
                        unlink($filePath);
                    }
                }
            } else if ($request->btnWithFile) {
                $request->validate([
                    'fFile' => 'required|file|mimes:csv,txt|max:3048', // Validate the file type and size
                ]);

                try {
                    // Get the uploaded file
                    $uploadedFile = $request->file('fFile');

                    // Send the uploaded file to the API
                    $response = Http::attach(
                        'file', // The API's expected file input name
                        file_get_contents($uploadedFile->getRealPath()),
                        $uploadedFile->getClientOriginalName()
                    )->post('http://localhost:5000/manual/predict', []);

                    // Check API response
                    if ($response->successful()) {
                        $data = $response->json();
                        // Process the response data as needed
                        // Assuming the response includes energy data and forecast date
                        $forecastDate = array_key_first($data);
                        $energy = $data[$forecastDate];

                        $newForecast = new Forecasts();
                        $newForecast->userID = $user['userID'];
                        $newForecast->forecastedDate = date('Y-m-d', strtotime($forecastDate));
                        $newForecast->energy = $energy;
                        $isSave = $newForecast->save();

                        if ($isSave) {
                            session()->put("successForecast", true);
                            return redirect("/forecast");
                        } else {
                            session()->put("errorForecast", true);
                            return redirect("/user_dashboard");
                        }
                    } else {
                        return response()->json(['error' => 'API request failed', 'response' => $response->body()], 500);
                    }
                } catch (\Exception $e) {
                    session()->put("errorForecast", true);
                    error_log($e);
                }
            }


            return view('user.forecast');
        }
        return redirect("/");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
