<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class WebController extends Controller
{
    public function listProperties(Request $request)
    {
        try {
            $reqParams = $this->validate($request, [
                'brands' => 'filled|array|exists:brands,id|min:1',
                'max_price' => 'required|integer|between:1,99999|gte:min_price',
                'min_price' => 'required|integer|between:1,99999',
            ]);
        } catch (ValidationException $e) {
            // 如果使用者的過濾條件有問題，直接重設為預設值，好讓使用者繼續瀏覽所有產品
            $reqParams = [];
        }
        $brands = Brand::all();
        $reqParams = array_merge([
            'brands' => $brands->pluck('id'),
            'max_price' => 3000,
            'min_price' => 100,
        ], $reqParams);

        $properties = Property::with('brand')
            ->where('special_price', '<=', $reqParams['max_price'])
            ->where('special_price', '>=', $reqParams['min_price'])
            ->whereIn('brand_id', $reqParams['brands'])
            ->paginate(5);
        return view('search-properties', [
            'brands' => $brands,
            'properties' => $properties->appends($reqParams),
            'form' => [
                'brands' => collect($reqParams['brands'])->mapWithKeys(function ($item) {
                    return [$item => 'checked'];
                }),
                'max_price' => $reqParams['max_price'],
                'min_price' => $reqParams['min_price'],
            ],
        ]);
    }
}
