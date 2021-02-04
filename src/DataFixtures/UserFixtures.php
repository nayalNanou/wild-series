<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\User;

class UserFixtures extends Fixture
{
    const USERS = [
        [
            'pseudo' => 'contributor',
            'email' => 'contributor@monsite.com',
            'roles' => ['ROLE_CONTRIBUTOR'],
            'password' => 'contributorpassword',
        ],
        [
            'pseudo' => 'emma',
            'email' => 'emma@monsite.com',
            'roles' => ['ROLE_CONTRIBUTOR'],
            'password' => 'emmapassword',
        ],
        [
            'pseudo' => 'jean',
            'email' => 'jean@monsite.com',
            'roles' => ['ROLE_CONTRIBUTOR'],
            'password' => 'jeanpassword',
        ],
        [
            'pseudo' => 'camille',
            'email' => 'camille@monsite.com',
            'roles' => ['ROLE_CONTRIBUTOR'],
            'password' => 'camillepassword',
        ],
        [
            'pseudo' => 'michel',
            'email' => 'michel@monsite.com',
            'roles' => ['ROLE_CONTRIBUTOR'],
            'password' => 'michelpassword',
        ],
        [
            'pseudo' => 'admin',
            'email' => 'admin@monsite.com',
            'roles' => ['ROLE_ADMIN'],
            'password' => 'adminpassword',
        ],
    ];

    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        foreach (self::USERS as $data) {
            $user = new User();
            $user->setPseudo($data['pseudo']);
            $user->setEmail($data['email']);
            $user->setRoles($data['roles']);
            $user->setPassword($this->passwordEncoder->encodePassword(
                $user,
                $data['password']
            ));

            $manager->persist($user);
        }

        $manager->flush();
    }
}
