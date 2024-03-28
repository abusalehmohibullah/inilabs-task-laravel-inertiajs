<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class ValidParenthesesController extends Controller
{
    public function showForm()
    {
        return Inertia::render('ValidParentheses');
    }

    public function validateParentheses(Request $request)
    {
        $input = $request->input('parentheses_input');
        if (!preg_match('/^[()\[\]{}]*$/', $input)) {
            return redirect()->back()->withInput()->with('toastMessage', "Only '(', ')', '{', '}', '[' and ']' characters are allowed!")->with('toastStyle', 'danger');
        }
        $isValid = $this->isValidParentheses($input);

        return Inertia::render('ValidParentheses', [
            'isValid' => $isValid,
        ]);
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
