<?php

namespace Tests\Browser;

use App\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class ExampleTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $user = factory(User::class)->create();

        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit($user->id)
                    ->assertSee($user->name);
        });

        $user->delete();

        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit($user->id)
                ->assertSee('Sorry, the page you are looking for could not be found.');
        });
    }
}
