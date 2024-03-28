<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VatCalculationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('vatCalculation');
    }

    /**
     * Calculate VAT.
     */
    public function vatCalculate(Request $request)
    {
        $validated = $request->validate([
            'amount' => 'required|numeric|min:0',
            'vatOption' => 'required',
            'taxPercentage' => 'required|numeric|min:0|max:100',
        ]);

        $amount = $request->amount;
        $vatOption = $request->vatOption;
        $taxPercentage = $request->taxPercentage;

        $vatAmount = 0;
        $grossAmount = 0;
        $netAmount = 0;

        if ($vatOption === 'include') {
            $vatAmount = intval(round($amount * (1 + $taxPercentage/100) - $amount));
            $grossAmount = intval(round($amount + $vatAmount));
        } else if ($vatOption === 'exclude') {
            $vatAmount = intval(round($amount - ($amount / (1 + $taxPercentage/100))));
            $netAmount = intval(round($amount - $vatAmount));
        }else {
            return redirect()->back()->withMessage('VAT option not supported');
        }
        $calculatedData = [
            'amount'=> $amount,
            'vatOption' => $vatOption,
            'vatAmount' => $vatAmount,
            'taxPercentage' => $taxPercentage,
            'grossAmount' => $grossAmount,
            'netAmount' => $netAmount,
            'isInclude' => 1
        ];

        if ($request->vatOption == 'exclude'){
            $calculatedData['isInclude'] = 0;
        }
        return redirect()->route('vatCalculation.index')->with($calculatedData);
    }

    
}
