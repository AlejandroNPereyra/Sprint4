<?php

namespace App\Providers;
use Faker\Provider\Base;
use Faker\Generator;

class FantasyPlaceProvider extends Base
{
    protected static $fantasyPlaces = [

        'Eldoria',
        'Mythrandor',
        'Glimmering Vale',
        'Dragonspire Keep',
        'Avalonria', 'Feywild Glade',
        'Mystic Citadel',
        'Shadowfen Grove',
        'Celestial Haven',
        'Arcane Summit',
        'Riftwood Forest',
        'Silvermoon Sanctuary',
        'Wraithholm Manor',
        'Abyssal Abyss',
        'Netherworld Nexus',
        'Elven Enclave',
        'Aurora Valley',
        'Shrouded Woods',
        'Phoenix Roost',
        'Thunderpeak Fortress',
        'Sylvan Grove',
        'Misty Moorland',
        'Rainbow Falls',
        'Ancient Ruins',
        'Starhaven Palace',
        'Whispering Pines',
         
    ];

    public function __construct(Generator $generator)
    {
        parent::__construct($generator);
    }

    public function fantasyPlace()
    {
        return static::randomElement(static::$fantasyPlaces);
    }
}
