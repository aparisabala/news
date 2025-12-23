<?php

namespace App\Traits\PxTraits\Policies\Items;

trait ArticlesPolicy {

    public function articlesPolicies(){
        return [
            'name' => 'Articles',
            'policies' => [
                [
                    'name' => 'Dyn Article Crud',
                    'keys' => ['view','store','bulk_update','delete','pdf','excel','edit']
                ]
            ]
        ];
    }
}
