<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FitnessAgentController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function process(Request $request)
    {
        $request->validate([
            'age' => 'required|numeric',
            'gender' => 'required',
            'height' => 'required|numeric',
            'weight' => 'required|numeric',
            'bpm' => 'required|numeric',
            'duration' => 'required|numeric',
            'activity' => 'required'
        ]);

        $age = $request->age;
        $gender = $request->gender;
        $height = $request->height;
        $weight = $request->weight;
        $bpm = $request->bpm;
        $duration = $request->duration;
        $activity = $request->activity;

        // ===============================
        // 1. HITUNG BMR
        // ===============================
        if ($gender == 'male') {
            $bmr = 88.36 + (13.4 * $weight) + (4.8 * $height) - (5.7 * $age);
        } else {
            $bmr = 447.6 + (9.2 * $weight) + (3.1 * $height) - (4.3 * $age);
        }

        // ===============================
        // 2. HITUNG TDEE
        // ===============================
        $activityFactor = [
            'low' => 1.2,
            'medium' => 1.55,
            'high' => 1.75
        ];

        $tdee = $bmr * $activityFactor[$activity];

        // ===============================
        // 3. ESTIMASI KALORI LATIHAN
        // ===============================
        $caloriesBurned = ($bpm / 100) * $duration * 5;

        // ===============================
        // 4. RULE-BASED FITNESS LEVEL
        // ===============================
        if ($bpm < 100 && $duration < 30) {
            $fitnessLevel = "Beginner";
            $workouts = ["Yoga", "Walking", "Light Cardio"];
            $intensity = "Ringan";
            $recommendedDuration = "20–30 menit";
        } elseif ($bpm < 140 && $duration < 60) {
            $fitnessLevel = "Intermediate";
            $workouts = ["Cardio", "Strength Training"];
            $intensity = "Sedang";
            $recommendedDuration = "30–45 menit";
        } else {
            $fitnessLevel = "Advanced";
            $workouts = ["HIIT", "Circuit Training", "Strength Intensive"];
            $intensity = "Tinggi";
            $recommendedDuration = "45–60 menit";
        }

        return view('result', compact(
            'fitnessLevel',
            'bmr',
            'tdee',
            'caloriesBurned',
            'workouts',
            'intensity',
            'recommendedDuration'
        ));
    }
}
