<?php

namespace App\Traits\PxTraits\Policies\Items;

trait CategoryPolicy {

    public function categoryPolicies(){
        return [
            'name' => 'Categories policy',
            'policies' => [
                [
                    'name' => 'Dyn Category Crud',
                    'keys' => ['view','store','bulk_update','delete','pdf','excel','edit']
                ]
            ]
        ];
    }
}
