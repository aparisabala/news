<?php

namespace App\Traits\PxTraits\Policies\Items;

trait PagePolicy {

    public function pagePolicies(){
        return [
            'name' => 'System Core',
            'policies' => [
                [
                    'name' => 'Dyn Page Crud',
                    'keys' => ['view','store','bulk_update','delete','pdf','excel','edit']
                ]
            ]
        ];
    }
}
