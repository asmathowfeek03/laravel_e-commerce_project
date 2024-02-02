<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Product; // Import the Product model
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SearchProductest extends TestCase
{
    use WithFaker, RefreshDatabase;
    /**
     * Test searching for products with a valid search term.
     *
     * @return void
     */
    public function test_search_products()
    {   // Create two products with specific names
        $product1 = Product::factory()->create(['name' => 'Product One']);
        $product2 = Product::factory()->create(['name' => 'Product Two']);

        // Make a GET request to the search route with a valid search term
        $response = $this->get('/search?search=Product One');

        // Assert that the response should be a view named 'frontend.pages.search'
        $response->assertViewIs('frontend.pages.search');

        // Assert that the view has a variable named 'searchProducts'
        $response->assertViewHas('searchProducts');

        // Get the 'searchProducts' data from the original response
        $searchProducts = $response->original->getData()['searchProducts'];

        // Assert that the count of search products is 1
        $this->assertCount(1, $searchProducts);

        // Assert that the name of the first search product matches the expected name
        $this->assertEquals($product1->name, $searchProducts[0]->name);
    }

    /**
     * Test searching with an empty search term redirects back with a message.
     *
     * @return void
     */
    public function test_empty_search_redirects_back()
    {
        // Make a GET request to the search route with an empty search term
        $response = $this->get('/search?search=');

        // Assert that the response should be a redirect
        $response->assertRedirect();

        // Assert that the session has a 'message' with the value 'Empty Search'
        $response->assertSessionHas('message', 'Empty Search');
    }
}
