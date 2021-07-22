<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\Property
 *
 * @property int $id
 * @property string $display_name
 * @property int $brand_id
 * @property int $original_price
 * @property int $special_price
 * @property string $img_url
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Brand $brand
 * @method static Builder|Property newModelQuery()
 * @method static Builder|Property newQuery()
 * @method static Builder|Property query()
 * @method static Builder|Property whereBrandId($value)
 * @method static Builder|Property whereCreatedAt($value)
 * @method static Builder|Property whereDisplayName($value)
 * @method static Builder|Property whereId($value)
 * @method static Builder|Property whereImgUrl($value)
 * @method static Builder|Property whereOriginalPrice($value)
 * @method static Builder|Property whereSpecialPrice($value)
 * @method static Builder|Property whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Property extends Model
{
    use HasFactory;

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }
}
