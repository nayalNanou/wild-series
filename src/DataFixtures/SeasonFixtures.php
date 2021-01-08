<?php

namespace App\DataFixtures;

use App\Entity\Season;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Faker;

class SeasonFixtures extends Fixture implements DependentFixtureInterface
{
    private static $nbSeasons;

    public static function nbSeasons() { return self::$nbSeasons; }

    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('en_US');

        $nbPrograms = count(ProgramFixtures::PROGRAMS);
        $seasonId = 0;

        for ($i = 0; $i < $nbPrograms; $i++) {
            $nbSeasons = rand(1, 6);

            for ($j = 0; $j < $nbSeasons; $j++) {
                $season = new Season();
                $season->setProgram($this->getReference('program_' . $i));
                $season->setNumber($j + 1);
                $season->setYear($faker->year());
                $season->setDescription($faker->paragraph(rand(2, 4)));
                $manager->persist($season);
                $this->addReference('season_' . $seasonId, $season);
                $seasonId++;
            }
        }

        $manager->flush();

        self::$nbSeasons = $seasonId;
    }

    public function getDependencies()
    {
        return [ProgramFixtures::class];
    }
}
