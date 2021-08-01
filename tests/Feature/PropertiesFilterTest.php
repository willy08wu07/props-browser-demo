<?php

namespace Tests\Feature;

use App\Models\Property;
use Database\Seeders\BrandAndPropertySeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PropertiesFilterTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_filter_by_both_prices()
    {
        // 這筆 seeder 固定會有 10 筆廠商
        $brandsCount = 10;
        $this->seed(BrandAndPropertySeeder::class);

        $response = $this->get("/?max_price=1500&min_price=1000");
        $response->assertOk();
        $this->assertCount($brandsCount, $response['brands']);
        /** @var Property $property */
        foreach ($response['properties'] as $property) {
            $this->assertGreaterThanOrEqual(1000, $property->special_price);
            $this->assertLessThanOrEqual(1500, $property->special_price);
        }
        // 完全未指定過濾廠商時，輸出所有廠商
        $this->assertCount($brandsCount, $response['form']['brands']);
        foreach ($response['form']['brands'] as $brand) {
            $this->assertEquals('checked', $brand);
        }
        $this->assertEquals(1500, $response['form']['max_price']);
        $this->assertEquals(1000, $response['form']['min_price']);
    }
}
