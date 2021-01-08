<?php

namespace App\DataFixtures;

use App\Entity\Episode;
use App\Entity\Season;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Faker;

use Doctrine\ORM\Query\ResultSetMapping;
use Doctrine\ORM\EntityManagerInterface;

class EpisodeFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('en_US');

        $nbSeasons = SeasonFixtures::nbSeasons();
        $episodeId = 0;

        for ($i = 0; $i < $nbSeasons; $i++) {
            $nbEpisodes = rand(6, 18);

            for ($j = 0; $j < $nbEpisodes; $j++) {
                $episode = new Episode();
                $episode->setSeason($this->getReference('season_' . $i));
                $episode->setTitle(implode(' ', $faker->words(3)));
                $episode->setNumber($j + 1);
                $episode->setSynopsis($faker->paragraph(rand(3, 5)));
                $manager->persist($episode);
                $this->addReference('episode_' . $episodeId, $episode);
                $episodeId++;
            }
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [SeasonFixtures::class];
    }
}
