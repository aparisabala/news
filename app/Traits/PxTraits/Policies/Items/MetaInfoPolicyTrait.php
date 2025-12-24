<?php

namespace App\Traits\PxTraits\Policies\Items;

trait MetaInfoPolicyTrait {

    public function metainfoPolicies(){
        return [
            'name' => 'Meta Info Policy',
            'policies' => [
                [
                    'name' => 'System Meta Meta Info Update',
                    'keys' => ['view','update']
                ]
            ]
        ];
    }
}
