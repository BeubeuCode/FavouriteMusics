<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Http\Controllers\ProfileController;
use App\Models\UserFavoriteSongs;
use Tests\TestCase;

class FavMusTests extends TestCase
{

    use RefreshDatabase;
    /**
     * Tests url generation for gravatar.
     *
     * @return void
     */
    public function testGravatarURL()
    {
        $gravatarUrl =  ProfileController::getGravatarProfilePicture('benar77@gmail.com', 150);
        $this->assertEquals('https://www.gravatar.com/avatar/1324e7524cf667841161eb66c5c228f1?s=150', $gravatarUrl);
    }

    /**
     * Tests navigating to index.
     *
     * @return void
     */

    public function testIndexNavigation()
    {
       $res = $this->get('/');
       $res->assertStatus(200);
    }
}
