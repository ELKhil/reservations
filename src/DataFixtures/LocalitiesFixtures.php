<?php

namespace App\DataFixtures;

use App\Entity\Localities;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class LocalitiesFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $localities = [
            ['postalCode'=>'1000','locality'=>'Bruxelles'],
            ['postalCode'=>'1020','locality'=>'Laeken'],
            ['postalCode'=>'1030','locality'=>'Schaerbeek'],
            ['postalCode'=>'1050','locality'=>'Ixelles'],
            ['postalCode'=>'1070','locality'=>'Watermael-Boitsfort'],

        ];

        foreach ($localities as $record) {
            $locality = new Localities();
            $locality->setPostalCode($record['postalCode']);
            $locality->setLocality($record['locality']);

            $manager->persist($locality);
        }

        $manager->flush();
    }
}
