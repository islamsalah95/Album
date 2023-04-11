<?php

namespace App\Rules;

use Closure;
use App\Models\Album;
use Illuminate\Contracts\Validation\ValidationRule;

class AlbumIdExi implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        return Album::where('id', $value)->exists();

    }
}
