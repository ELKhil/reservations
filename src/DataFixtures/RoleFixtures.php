<?php

namespace App\DataFixtures;

use App\Entity\Roles;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class RoleFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $roles = [
            ["role" => 'admin'],
            ["role" => 'member'],
            ["role" => 'affiliate'],
        ];

        foreach ($roles as $record){
            $role = new Roles();
            $role->setRole($record['role']);

            $manager->persist($role);

        }

        $manager->flush();
    }
}
