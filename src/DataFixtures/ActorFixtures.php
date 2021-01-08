<?php

namespace App\DataFixtures;

use App\Entity\Actor;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Faker;

class ActorFixtures extends Fixture implements DependentFixtureInterface
{
    const ACTORS = [
        'Andrew Lincoln',
        'Norman Reedus',
        'Danai Gurira',
        'Lauren Cohan',
    ];

    public function getDependencies()
    {
        return [ProgramFixtures::class];
    }

    public function load(ObjectManager $manager)
    {
        $nbPrograms = count(ProgramFixtures::PROGRAMS) - 1;

        foreach (self::ACTORS as $key => $actorName) {
            $actor = new Actor();
            $actor->setName($actorName);
            $actor->addProgram($this->getReference('program_' . rand(0, $nbPrograms)));
            $manager->persist($actor);
            $this->addReference('actor_' . $key, $actor);
        }

        $faker = Faker\Factory::create('en_US');
        $constActorsLen = count(self::ACTORS);

        for ($i = $constActorsLen; $i < 100 + $constActorsLen; $i++) {
            $actor = new Actor();
            $actor->setName($faker->name);
            $actor->addProgram($this->getReference('program_' . rand(0, $nbPrograms)));
            $manager->persist($actor);
            $this->addReference('actor_' . $i, $actor);
        }

        $manager->flush();
    }
}
