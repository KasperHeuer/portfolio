<?php

namespace App\Http\Controllers;

use App\Models\PageViews;
use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    public function view()
    {
         PageViews::firstOrCreate(
                ['name' => '/math/calculator'],
                ['amount' => 0],
            )->increment('amount');
        return view('math.calculator', ['result' => null, 'number1' => null, 'number2' => null, 'operator' => "+"]);
    }

    public function create(Request $request)
    {

        $data = $request->validate(
            [
                "number" => "required|numeric",
                "operator" => "string|required|in:+,-,*,/,^,%",
                "number2" => "required|numeric",
            ]
        );
        switch ($data['operator']) {
            case "+":
                $result = $data['number'] + $data['number2'];
                break;
            case "-":
                $result = $data['number'] - $data['number2'];
                break;
            case "*":
                $result = $data['number'] * $data['number2'];
                break;
            case "/":
                if ($data['number'] === 0 || $data['number2'] == 0) {
                    $result = "Error";
                } else {
                    $result = $data['number'] / $data['number2'];
                }
                break;
            case "^":
                $result = pow($data['number'], $data['number2']);
                break;
            case '%':
                $result = $data['number'] * ($data['number2'] / 100);
                break;

            default:
                $result = "Invalid operator";
                break;
        }
        return view('math.calculator', ['result' => $result, 'number1' => $data['number'], 'number2' => $data['number2'], 'operator' => $data['operator']]);
    }
}
