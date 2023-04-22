<?php

namespace App\DataFixtures;

use App\Entity\Role;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use function Sodium\add;

class UserFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $users = [
            [
                'login'=>'bob',
                'password'=>'123',
                'role'=>'admin',
                'firstname'=>'Bob',
                'lastname'=>'Sull',
                'email'=>'bob@sull.com',
                'langue'=>'fr',
            ],
            [
                'login'=>'fred',
                'password'=>'123',
                'role'=>'membre',
                'firstname'=>'Fred',
                'lastname'=>'Sull',
                'email'=>'fred@sull.com',
                'langue'=>'en',
            ],
        ];

        foreach ($users as $record) {
            $user = new User();
            $user->setLogin($record['login']);

            //Hasher le mot de passe
            $user->setPassword(password_hash($record['password'], PASSWORD_BCRYPT));
            //Assigner la référence du rôle correspondant
            $user->setRole($this->getReference($record['role']));

            $user->setFirstname($record['firstname']);
            $user->setLastname($record['lastname']);
            $user->setEmail($record['email']);
            $user->setLangue($record['langue']);
            $manager->persist($user);
        }


        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            RoleFixtures::class,
        ];

    }
}
