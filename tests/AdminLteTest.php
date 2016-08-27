<?php

use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;
use Illuminate\Auth\Access\Gate;
use Illuminate\Foundation\Application as App;

class AdminLteTest extends TestCase
{
	
    public function testMenu()
    {

        $adminLte = $this->makeAdminLte($this->gate);

        $this->getDispatcher()->listen(BuildingMenu::class, function (BuildingMenu $event) {
            $event->menu->add(['text' => 'Home']);
        });

        $menu = $adminLte->menu();

        $this->assertEquals('Home', $menu[0]['text']);
    }
}