<?php

namespace App\Traits\PxTraits\Policies\Items;

trait MainMenuPolicy {

    public function mainMenuPolicies(){
        return [
            'name' => 'Main Menus',
            'policies' => [
                [
                    'name' => 'Dyn Main Menu Crud',
                    'keys' => ['view','store','bulk_update','delete','pdf','excel','edit']
                ]
            ]
        ];
    }
}
