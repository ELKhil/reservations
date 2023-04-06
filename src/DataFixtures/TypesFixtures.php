<?php

namespace App\DataFixtures;

use App\Entity\Types;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TypesFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $types = [
            ['type'=>'comédien'],
            ['type'=>'scénographe'],
            ['type'=>'auteur'],
        ];

        foreach ($types as $record) {
            $type = new Types();
            $type->setType($record['type']);
            $manager->persist($type);
        }

        $manager->flush();
    }
}
