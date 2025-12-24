<?php

namespace App\Traits\PxTraits\Policies;

use App\Traits\PxTraits\Policies\Items\ArticlesPolicy;
use App\Traits\PxTraits\Policies\Items\CategoryPolicy;
use App\Traits\PxTraits\Policies\Items\MainMenuPolicy;
use App\Traits\PxTraits\Policies\Items\MetaInfoPolicyTrait;
use App\Traits\PxTraits\Policies\Items\PagePolicy;
use App\Traits\PxTraits\Policies\Items\SytemUserPolicyTrait;

trait BasePolicyTrait {

    use SytemUserPolicyTrait,PagePolicy,CategoryPolicy,MainMenuPolicy,ArticlesPolicy,MetaInfoPolicyTrait;
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
                        ...$this->articlesPolicies()
                    ],
                    [
                        ...$this->metainfoPolicies()
                    ],
                    [
                        ...$this->systemUserPolicies()
                    ]
                ]
            ]
        ];
    }
}
