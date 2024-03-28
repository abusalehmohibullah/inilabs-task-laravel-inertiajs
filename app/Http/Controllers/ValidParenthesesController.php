<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class ValidParenthesesController extends Controller
{
    public function show()
    {
        return Inertia::render('ValidParentheses');
    }

    public function validateParentheses(Request $request)
    {
        $input = $request->input('parentheses_input');

        $isValid = $this->isValidParentheses($input);

        if ($isValid) {
            return redirect()->route('valid-parentheses.show')->with('toastMessage', 'The parentheses input is valid!')->with('toastStyle', 'success');
        } else {
            return redirect()->back()->withInput()->with('toastMessage', 'Invalid parentheses input!')->with('toastStyle', 'danger');
        }
        
    }

    private function isValidParentheses($input)
{
        $stack = [];
        $mapping = [
            '(' => ')',
            '{' => '}',
            '[' => ']',
        ];

        foreach (str_split($input) as $char) {
            if (array_key_exists($char, $mapping)) {
                $stack[] = $char;
            } elseif (in_array($char, $mapping)) {
                if (empty($stack) || $mapping[array_pop($stack)] !== $char) {
                    return false;
                }
            }
        }

        return empty($stack);
    }
}
