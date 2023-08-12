<?php

namespace App\Http\Requests;

use App\Enums\LengthUnits;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class IndexLocationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'radius' => 'required|numeric',
            'unit' => ['required', Rule::in([LengthUnits::KILOMETERS->value, LengthUnits::MILES->value])],
        ];
    }

    public function getLatitude(): float
    {
        return (float) $this->input('latitude');
    }

    public function getLongitude(): float
    {
        return (float) $this->input('longitude');
    }

    public function getRadius(): float
    {
        return (float) $this->input('radius');
    }

    public function getUnit(): string
    {
        return $this->input('unit');
    }
}
