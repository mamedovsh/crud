<?php

namespace Tests\Feature\Products;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Product;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    public function test_products_can_be_indexed()
    {
        $product = Product::factory()->create();

        $response = $this->get('/api/products');

        $response->assertStatus(200);
        $response->assertJsonFragment([
            'id' => $product->id,
            'name' => $product->name,
        ]);
    }

    public function test_product_can_be_shown()
    {
        $product = Product::factory()->create();

        $response = $this->get('/api/products/' . $product->id);

        $response->assertStatus(200);
        $response->assertJsonFragment([
            'id' => $product->id,
        ]);
    }

    public function test_product_can_be_stored()
    {
        $data = [
            'name' => 'New Product',
            'price' => 100,
        ];

        $response = $this->post('/api/products', $data);

        $response->assertStatus(201);
        $this->assertDatabaseHas('products', $data);
    }

    public function test_product_can_be_updated()
    {
        $product = Product::factory()->create();

        $data = [
            'name' => 'Updated Product',
            'price' => 150,
        ];

        $response = $this->put('/api/products/' . $product->id, $data);

        $response->assertStatus(200);
        $this->assertDatabaseHas('products', $data);
    }

    public function test_product_can_be_destroyed()
    {
        $product = Product::factory()->create();

        $response = $this->delete('/api/products/' . $product->id);

        $response->assertStatus(204);
        $this->assertDeleted($product);
    }
}