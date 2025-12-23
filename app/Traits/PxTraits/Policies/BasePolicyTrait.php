<?php

namespace App\Traits\PxTraits\Policies;

use App\Traits\PxTraits\Policies\Items\CategoryPolicy;
use App\Traits\PxTraits\Policies\Items\MainMenuPolicy;
use App\Traits\PxTraits\Policies\Items\PagePolicy;
use App\Traits\PxTraits\Policies\Items\SytemUserPolicyTrait;

trait BasePolicyTrait {

    use SytemUserPolicyTrait,PagePolicy,CategoryPolicy,MainMenuPolicy;
    public function systemPolicies(){
        return [
            [
                'name' => 'Admin Panel',
                'policies' => [
                    [
                        ...$this->pagePolicies()
                    ],

                    [
                        ...$this->categoryPolicies()
                    ],
                    [
                        ...$this->mainMenuPolicies()
                    ],
                    [
                        ...$this->systemUserPolicies()
                    ]
                ]
            ]
        ];
    }
}
