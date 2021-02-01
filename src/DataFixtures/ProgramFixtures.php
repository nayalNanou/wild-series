<?php

namespace App\DataFixtures;

use App\Entity\Program;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use App\Service\Slugify;

class ProgramFixtures extends Fixture implements DependentFixtureInterface
{
    const PROGRAMS = [
        'Walking Dead' => [
            'summary' => 'Le policier Rick Grimes se réveille après un long coma. Il découvre avec effarement que le monde, ravagé par une épidémie, est envahi par les morts-vivants.',
            'category' => 'category_4',
            'poster' => 'https://media.melty.fr/article-4289878-ajust_768/media.jpg',
        ],
        'The Haunting Of Hill House' => [
            'summary' => 'Plusieurs frères et sœurs qui, enfants, ont grandi dans la demeure qui allait devenir la maison hantée la plus célèbre des États-Unis, sont contraints de se réunir pour finalement affronter les fantômes de leur passé.',
            'category' => 'category_4',
            'poster' => 'https://fr.web.img2.acsta.net/pictures/18/09/19/18/46/2766026.jpg',
        ],
        'American Horror Story' => [
            'summary' => 'A chaque saison, son histoire. American Horror Story nous embarque dans des récits à la fois poignants et cauchemardesques, mêlant la peur, le gore et le politiquement correct.',
            'category' => 'category_4',
            'poster' => 'https://fr.web.img3.acsta.net/pictures/19/08/14/10/00/0580682.jpg',
        ],
        'Love Death And Robots' => [
            'summary' => 'Un yaourt susceptible, des soldats lycanthropes, des robots déchaînés, des monstres-poubelles, des chasseurs de primes cyborgs, des araignées extraterrestres et des démons assoiffés de sang : tout ce beau monde est réuni dans 18 courts métrages animés déconseillés aux âmes sensibles.',
            'category' => 'category_4',
            'poster' => 'https://fr.web.img2.acsta.net/pictures/19/02/15/09/58/1377321.jpg',
        ],
        'Penny Dreadful' => [
            'summary' => 'Dans le Londres ancien, Vanessa Ives, une jeune femme puissante aux pouvoirs hypnotiques, allie ses forces à celles de Ethan, un garçon rebelle et violent aux allures de cowboy, et de Sir Malcolm, un vieil homme riche aux ressources inépuisables. Ensemble, ils combattent un ennemi inconnu, presque invisible, qui ne semble pas humain et qui massacre la population.',
            'category' => 'category_4',
            'poster' => 'https://images-na.ssl-images-amazon.com/images/I/913w--3KLXL.jpg',
        ],
        'Fear The Walking Dead' => [
            'summary' => 'La série se déroule au tout début de l épidémie relatée dans la série mère The Walking Dead et se passe dans la ville de Los Angeles, et non à Atlanta. Madison est conseillère dans un lycée de Los Angeles. Depuis la mort de son mari, elle élève seule ses deux enfants : Alicia, excellente élève qui découvre les premiers émois amoureux, et son grand frère Nick qui a quitté la fac et a sombré dans la drogue.',
            'category' => 'category_4',
            'poster' => 'https://m.media-amazon.com/images/M/MV5BYWNmY2Y1NTgtYTExMS00NGUxLWIxYWQtMjU4MjNkZjZlZjQ3XkEyXkFqcGdeQXVyMzQ2MDI5NjU@._V1_.jpg',
        ],
        'Hunter X Hunter (2011)' => [
            'summary' => "Abandonné par son père, un aventurier et chasseur de primes, le jeune Gon décide à de partir pour devenir un Hunter. Il devra passer une suite de tests et examens en compagnie de milliers d'autres prétendants au titre. Il sera aidé par de nouvelles connaissances qui aspirent au même but que lui.",
            'category' => 'category_2',
            'poster' => 'https://www.nautiljon.com/images/anime/00/98/hunter_x_hunter_2011_2089.jpg',
        ],
        "L'Attaque des Titans" => [
            'summary' => "Dans un monde ravagé par des titans mangeurs d’homme depuis plus d’un siècle, les rares survivants de l’Humanité n’ont d’autre choix pour survivre que de se barricader dans une cité-forteresse. Le jeune Eren, témoin de la mort de sa mère dévorée par un titan, n’a qu’un rêve : entrer dans le corps d’élite chargé de découvrir l’origine des Titans et les annihiler jusqu’au dernier",
            'category' => 'category_2',
            'poster' => 'https://i.pinimg.com/564x/d1/c8/78/d1c878a5579b50d8d3d91575cc1e44ca.jpg',
        ],
        "Your Lie in April" => [
            'summary' => "Arima Kosei est un véritable prodige du piano. Mais, après la mort de sa mère, il sombre dans une forte dépression. Deux ans après le drame, Arima se contente de vivre sa vie sans réel but… jusqu'à ce qu'il rencontre Miyazono Kaori, une jeune violoniste extravertie qui, elle aussi, semble exceller dans son art…",
            'category' => 'category_2',
            'poster' => 'https://pictures.betaseries.com/fonds/poster/279830.jpg',
        ],
        "Warrior" => [
            'summary' => "Au lendemain de la Guerre de Sécession, la ville de San Francisco est en proie à un terrible conflit impliquant le clan des Tong. Un jeune prodige des arts martiaux, Ah Sahm, fraîchement arrivé de Chine, se retrouve impliqué. Il découvre alors le quotidien sanglant de Chinatown...",
            'category' => 'category_0',
            'poster' => 'https://fr.web.img6.acsta.net/pictures/19/03/05/08/39/2850939.jpg',
        ],
        "Marvel's Daredevil" => [
            'summary' => "Aveugle depuis l’enfance, mais doté de sens incroyablement développés, Matt combat l’injustice le jour en tant qu’avocat et la nuit en surveillant les rue de Hell’s Kitchen, à New York, dans le costume du super-héros Daredevil.",
            'category' => 'category_0',
            'poster' => 'http://vignette2.wikia.nocookie.net/marveldatabase/images/e/eb/Marvel\'s_Daredevil_poster_018.jpg',
        ],
        "Kingdom" => [
            'summary' => "Une plongée sans ménagement dans l’univers du MMA (Mixed Martial Arts), un sport de combat ultra-violent qui va être le cadre des affrontements d’une famille toute entière dans la ville de Venice, en Californie.",
            'category' => 'category_0',
            'poster' => 'http://fr.web.img5.acsta.net/pictures/18/12/10/17/30/0647488.jpg',
        ],
        "Vikings" => [
            'summary' => "Série à suivre en France à l'heure US sur Canal+ Séries - Scandinavie, à la fin du 8ème siècle. Ragnar Lodbrok, un jeune guerrier viking, lassé des pillages sur les terres de l'Est, se met en tête d'explorer l'Ouest. Il défie son chef, Haraldson, en construisant une nouvelle génération de vaisseaux.",
            'category' => 'category_1',
            'poster' => 'https://fr.web.img6.acsta.net/c_310_420/pictures/20/12/04/10/04/4859166.jpg',
        ],
        "The Mandalorian" => [
            'summary' => "Une série live-action dans l'univers Star Wars, développée pour la plateforme de streaming Disney+.",
            'category' => 'category_1',
            'poster' => 'https://fr.web.img3.acsta.net/c_310_420/pictures/20/09/16/09/09/4156636.jpg',
        ],
        "The Good Place" => [
            'summary' => "Percutée par un semi-remorque, Eleanor se réveille dans l'au-delà. Lorsque son mentor Michael lui apprend qu'elle est au \"bon endroit\", elle réalise qu'elle a été confondue avec quelqu'un d'autre. Eleanor va devoir devenir une meilleure personne si elle souhaite conserver sa place dans ce paradis.",
            'category' => 'category_1',
            'poster' => 'https://fr.web.img4.acsta.net/f_png/c_310_420/o_logo-netflix-n.png_5_se/pictures/18/11/26/12/29/3770421.jpg',
        ],
        "Stranger Things" => [
            'summary' => "983, à Hawkins dans l'Indiana. Après la disparition d'un garçon de 12 ans dans des circonstances mystérieuses, la petite ville du Midwest est témoin d'étranges phénomènes.",
            'category' => 'category_3',
            'poster' => 'https://fr.web.img6.acsta.net/f_png/c_310_420/o_logo-netflix-n.png_5_se/pictures/19/01/03/10/42/0987125.jpg',
        ],
        "Happy!" => [
            'summary' => "Ex-flic devenu tueur à gages et alcoolique, Nick Sax croit perdre la tête quand une licorne animée qu'il est le seul à voir le pousse à sauver une fillette enlevée par le père Noël.",
            'category' => 'category_3',
            'poster' => 'https://fr.web.img6.acsta.net/f_png/c_310_420/o_logo-netflix-n.png_5_se/pictures/17/10/30/17/15/4110970.jpg',
        ],
        "Outlander" => [
            'summary' => "Les aventures de Claire, une infirmière de guerre mariée qui se retrouve accidentellement propulsée en pleine campagne écossaise de 1743.",
            'category' => 'category_3',
            'poster' => 'https://fr.web.img6.acsta.net/f_png/c_310_420/o_logo-netflix-n.png_5_se/pictures/20/01/06/09/20/3653287.jpg',
        ],
        "The Promised Neverland" => [
            'summary' => "Emma, Norman et Ray coulent des jours heureux à l'orphelinat Grace Field House. Mais tout bascule le soir où ils découvrent l'abominable réalité qui se cache derrière la façade de leur vie paisible ! Ils doivent s'échapper !",
            'category' => 'category_2',
            'poster' => 'https://fr.web.img2.acsta.net/c_310_420/pictures/20/02/26/09/12/3483516.jpg',
        ],
    ];

    private $slugify;

    public function __construct(Slugify $slugify)
    {
        $this->slugify = $slugify;
    }

    public function load(ObjectManager $manager)
    {
        $i = 0;
        foreach (self::PROGRAMS as $title => $data) {
            $program = new Program();
            $program->setTitle($title);

            $slug = $this->slugify->generate($program->getTitle());
            $program->setSlug($slug);

            $program->setSummary($data['summary']);
            $program->setPoster($data['poster']);
            $program->setCategory($this->getReference($data['category']));
            $manager->persist($program);
            $this->addReference('program_' . $i, $program);
            $i++;
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [CategoryFixtures::class];
    }
}
