<?php

namespace App\DataFixtures;

use App\Entity\Animal;
use App\Entity\Famille;
use App\Entity\RegimeAlimentaire;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $this->addUsers($manager);

        $this->addFamilies($manager);

        $this->addRegimes($manager);

        $this->addAnimaux($manager);


    }

    public function addUsers(ObjectManager $objectManager)
    {


        $users = [
            ['email' => 'admin@safariBrest.fr', 'roles' => 'ROLE_ADMIN', 'password' => '$2y$13$YtzKxZTZMALWoCeDxWlWyevcgSPB3jK7c51bE/iOYMj/S5Dpru68e', 'nom' => 'Admin', 'prenom' => 'Admin'],
            ['email' => 'user@safariBrest.fr', 'roles' => '', 'password' => '$2y$13$YtzKxZTZMALWoCeDxWlWyevcgSPB3jK7c51bE/iOYMj/S5Dpru68e', 'nom' => 'User', 'prenom' => 'User'],
        ];
        for ($i = 0; $i < count($users); $i++) {
            $user = new User();
            $user->setEmail($users[$i]['email']);

            $user->setRoles(explode(",", $users[$i]['roles']));
            $user->setPassword($users[$i]['password']);
            $user->setNom($users[$i]['nom']);
            $user->setPrenom($users[$i]['prenom']);
            $objectManager->persist($user);
//            $objectManager->flush();
        }
    }

    public function addFamilies(ObjectManager $objectManager)
    {
        $familles = ['Hominidés', 'Félidés', 'Eléphantidés', 'Hyénidés', 'Herpestidés', 'Ongulés', 'Equidés', 'Bovidés', 'Cordés'];

        for ($i = 0; $i < count($familles); $i++) {
            $famille = new Famille();
            $famille->setNom($familles[$i]);
            $objectManager->persist($famille);
           $objectManager->flush();
        }
    }

    public function addRegimes(ObjectManager $objectManager)
    {
        $regimes = [
            ['nom' => 'Carnivore', 'description' => 'Les animaux qui mangent exclusivement de la viande...'],
            ['nom' => 'Herbivore', 'description' => 'Qui ne mangent que de l\'herbe...'],
            ['nom' => 'Insectivore', 'description' => 'Qui ne mangent que des petites bêtes !'],
            ['nom' => 'Omnivore', 'description' => 'Qui mange de tout (même les petites bêtes !)'],
        ];
        for ($i = 0; $i < count($regimes); $i++) {
            $regime = new RegimeAlimentaire();
            $regime->setNom($regimes[$i]['nom']);
            $regime->setDescription($regimes[$i]['description']);
            $objectManager->persist($regime);
            $objectManager->flush();
        }
    }

    public function addAnimaux(ObjectManager $objectManager)
    {
        $animaux = [
            ['famille_id' => 1, 'regime_id' => 4, 'nom' => 'Chimpanzé', 'nomSc' => 'Pan troglodyte', 'photo' => 'chimpanze.jpg', 'lieuDeVie' => 'Forêt tropicale', 'description' => 'Le Chimpanzé, Pan, est un genre de Singes appartenant à la famille des Hominidés1. Ce genre comprend deux espèces : le Chimpanzé commun (Pan troglodytes) et le Chimpanzé nain, plus connu sous le nom de Bonobo (Pan paniscus). Ces hominidés d\'Afrique équatoriale sont les animaux génétiquement les plus proches d’Homo sapiens.', 'lienWiki' => 'https://fr.wikipedia.org/wiki/Chimpanz%C3%A9'],
            ['famille_id' => 6, 'regime_id' => 2, 'nom' => 'Girafe', 'nomSc' => 'Giraffa camelopardalis', 'photo' => 'girafe.jpg', 'lieuDeVie' => 'Savane africaine', 'description' => 'La Girafe (Giraffa camelopardalis) est une espèce de mammifères ongulés artiodactyles, du groupe des ruminants, vivant dans les savanes africaines et répandue du Tchad jusqu\'en Afrique du Sud. Son nom commun vient de l\'arabe زرافة, zarāfah, mais l\'animal fut anciennement appelé camélopard, du latin camelopardus1, contraction de camelus (chameau) en raison du long cou et de pardus (léopard) en raison des taches recouvrant son corps. Après des millions d\'années d\'évolution, la girafe a acquis une anatomie unique avec un cou particulièrement allongé qui lui permet notamment de brouter haut dans les arbres.', 'lienWiki' => 'https://fr.wikipedia.org/wiki/Girafe'],
            ['famille_id' => 7, 'regime_id' => 2, 'nom' => 'Zèbre', 'nomSc' => 'Dolichohippus', 'photo' => 'zebre.jpg', 'lieuDeVie' => 'Savane africaine', 'description' => 'Zèbre est un nom vernaculaire, ambigu en français, pouvant désigner plusieurs espèces différentes d\'herbivores de la famille des équidés, et du genre Equus, vivant en Afrique.', 'lienWiki' => 'https://fr.wikipedia.org/wiki/Z%C3%A8bre'],
            ['famille_id' => 2, 'regime_id' => 1, 'nom' => 'Lion', 'nomSc' => 'Panthera Ieo', 'photo' => 'lion.jpg', 'lieuDeVie' => 'Savane africaine', 'description' => 'Le Lion (Panthera leo) est une espèce de mammifères carnivores de la famille des Félidés. La femelle du lion est la lionne, son petit est le lionceau. ... Le lion mâle ne chasse qu\'occasionnellement, il est chargé de combattre les intrusions sur le territoire et les menaces contre la troupe. Le lion rugit.', 'lienWiki' => 'https://fr.wikipedia.org/wiki/Lion'],
            ['famille_id' => 3, 'regime_id' => 2, 'nom' => 'Elephant', 'nomSc' => 'Loxodonta', 'photo' => 'elephant.jpg', 'lieuDeVie' => 'Savane africaine', 'description' => 'Les éléphants sont des mammifères proboscidiens de la famille des Éléphantidés. Ils correspondent aujourd\'hui à trois espèces réparties en deux genres distincts. L\'Éléphant de savane d\'Afrique et l\'Éléphant de forêt d\'Afrique, autrefois regroupés sous la même espèce d\'« Éléphant d\'Afrique », appartiennent au genre Loxodonta, tandis que l\'Éléphant d\'Asie, anciennement appelé « éléphant indien », appartient au genre Elephas.', 'lienWiki' => 'https://fr.wikipedia.org/wiki/%C3%89l%C3%A9phant'],
            ['famille_id' => 4, 'regime_id' => 1, 'nom' => 'Hyène', 'nomSc' => 'Hyaenidae', 'photo' => 'hyene.jpg', 'lieuDeVie' => 'Savane africaine', 'description' => 'Les hyènes forment la famille des hyénidés, des carnivores terrestres. Bien que la hyène ressemble à un gros chien, elle n\'appartient pas au sous-ordre Caniformia mais à celui des Feliformia. Elle est connue pour son cri ressemblant à un rire désagréable qui signifie qu\'elle a trouvé de la nourriture', 'lienWiki' => 'https://fr.wikipedia.org/wiki/Hyaenidae'],
            ['famille_id' => 5, 'regime_id' => 1, 'nom' => 'Suricate', 'nomSc' => 'Suricata suricatta', 'photo' => 'suricate.jpg', 'lieuDeVie' => 'Savane africaine', 'description' => 'Le suricate, parfois surnommé « sentinelle du désert », est une espèce de mammifères diurnes de la famille des Herpestidae et la seule du genre Suricata. Ce petit carnivore vit dans le sud-ouest de l\'Afrique. Animal très prolifique, le suricate vit en grands groupes familiaux au sein d\'une colonie.', 'lienWiki' => 'https://fr.wikipedia.org/wiki/Suricate'],
            ['famille_id' => 8, 'regime_id' => 2, 'nom' => 'Antilope', 'nomSc' => 'Hippotagus equinus', 'photo' => 'antilope.jpg', 'lieuDeVie' => 'Savane africaine', 'description' => 'Les antilopes sont des mammifères ruminants de la famille des bovidés, aux pattes menues et aux cornes longues arquées et vivent dans les steppes d\'Afrique, d\'Asie ou même d\'Amérique du Nord pour l\'antilope d\'Amérique (Antilocapra americana) ou pronghorn, dans les forêts ou les déserts suivant les espèces.', 'lienWiki' => 'https://fr.wikipedia.org/wiki/Antilope'],
            ['famille_id' => 9, 'regime_id' => 3, 'nom' => 'Echidné', 'nomSc' => 'Tacchyglossidae', 'photo' => 'echidne.jpg', 'lieuDeVie' => 'Australie', 'description' => 'L\'échidné est un petit animal étrange et à part car comme l\'ornithorynque il fait partie de l\'ordre des monotrèmes, des mammifères qui ont la particularité de pondre des œufs (mais qui allaitent ensuite leurs petits).', 'lienWiki' => 'https://fr.wikipedia.org/wiki/%C3%89chidn%C3%A9'],
        ];
        for ($i = 0; $i < count($animaux); $i++) {
            $animal = new Animal();
            $animal->setFamille($objectManager->getRepository(Famille::class)->find($animaux[$i]['famille_id']));
            $animal->setRegimeAlimentaire($objectManager->getRepository(RegimeAlimentaire::class)->find($animaux[$i]['regime_id']));
            $animal->setNom($animaux[$i]['nom']);
            $animal->setNomScientifique($animaux[$i]['nomSc']);
            $animal->setPhoto($animaux[$i]['photo']);
            $animal->setLieuDeVie($animaux[$i]['lieuDeVie']);
            $animal->setDescription($animaux[$i]['description']);
            $animal->setLienWiki($animaux[$i]['lienWiki']);
            $objectManager->persist($animal);
            $objectManager->flush();
        }
    }
}
