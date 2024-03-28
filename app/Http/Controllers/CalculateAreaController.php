<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Shapes\Circle;
use App\Shapes\Rectangle;

class CalculateAreaController extends Controller
{
    public function showForm()
    {
        return Inertia::render('CalculateArea');
    }

    public function calculateArea (Request $request)
    {
        $shapeType = $request->input('shape');
        $radius = $request->input('radius');
        $width = $request->input('width');
        $height = $request->input('height');

        if ($shapeType === 'circle') {
            $circle = new Circle($radius);
            $area = $circle->calculateArea();
        } elseif ($shapeType === 'rectangle') {
            if ($height > $width) {
                return redirect()->back()->withInput()->with('toastMessage', 'Height can not be greater than Width!')->with('toastStyle', 'danger');
            }
            $rectangle = new Rectangle($width, $height);
            $area = $rectangle->calculateArea();
        } else {
            return redirect()->back()->withInput()->with('toastMessage', 'Invalid Shape Type!')->with('toastStyle', 'danger');
        }
        return Inertia::render('CalculateArea', [
            'area' => $area,
        ]);
    }
}
