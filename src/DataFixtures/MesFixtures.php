<?php
namespace App\DataFixtures;

use App\Entity\Livre;
use App\Entity\Auteur;
use App\Entity\Marquepage;
use App\Entity\MotCle;
use App\Entity\Caillou;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MesFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // ========== LIVRES ==========
        $auteur1 = new Auteur();
        $auteur1->setNom('Oda');
        $auteur1->setPrenom('Eiichirō');

        $auteur2 = new Auteur();
        $auteur2->setNom('Rowling');
        $auteur2->setPrenom('J.K.');

        $manager->persist($auteur1);
        $manager->persist($auteur2);

        $livre1 = new Livre();
        $livre1->setTitre('One Piece');
        $livre1->setAnnee(1997);
        $livre1->setAuteur($auteur1);
        $manager->persist($livre1);

        $livre2 = new Livre();
        $livre2->setTitre('Harry Potter à l\'école des sorciers');
        $livre2->setAnnee(1997);
        $livre2->setAuteur($auteur2);
        $manager->persist($livre2);

        $livre3 = new Livre();
        $livre3->setTitre('Harry Potter et la chambre des secrets');
        $livre3->setAnnee(2002);
        $livre3->setAuteur($auteur2);
        $manager->persist($livre3);

        // ========== MOTS-CLES ==========
        $mc1 = new MotCle();
        $mc1->setLibelle('Symfony');
        $manager->persist($mc1);

        $mc2 = new MotCle();
        $mc2->setLibelle('MVC');
        $manager->persist($mc2);

        $mc3 = new MotCle();
        $mc3->setLibelle('PHP');
        $manager->persist($mc3);

        $mc4 = new MotCle();
        $mc4->setLibelle('Recherche');
        $manager->persist($mc4);

        $mc5 = new MotCle();
        $mc5->setLibelle('GitHub');
        $manager->persist($mc5);

        $mc6 = new MotCle();
        $mc6->setLibelle('Code');
        $manager->persist($mc6);

        //25 mots-clés supplémentaires
        $motsCles = [$mc1, $mc2, $mc3, $mc4, $mc5, $mc6];
        $listeMotsCles = [
            'Symfony', 'MVC', 'PHP', 'Recherche',
            'GitHub', 'Code', 'Drôle', 'Inutile',
            'Bizarre', 'Random', 'Fun', 'Weird',
            'Internet', 'Vintage', 'Nostalgique',
            'WTF', 'Insolite', 'Découverte',
            'Culture', 'Science', 'Art', 'Musique',
            'Cuisine', 'Voyage', 'Nature'
        ];

        foreach ($listeMotsCles as $libelle) {
            $mc = new MotCle();
            $mc->setLibelle($libelle);
            $manager->persist($mc);
            $motsCles[] = $mc;
        }

        // ========== MARQUE-PAGES ==========
        $mp1 = new Marquepage();
        $mp1->setUrl('https://symfony.com');
        $mp1->setDateCreation(new \DateTime());
        $mp1->setCommentaire('Le site officiel de Symfony');
        $mp1->addMotCle($mc1);
        $mp1->addMotCle($mc2);
        $mp1->addMotCle($mc3);
        $manager->persist($mp1);

        $mp2 = new Marquepage();
        $mp2->setUrl('https://www.qwant.com');
        $mp2->setDateCreation(new \DateTime());
        $mp2->setCommentaire('Moteur de recherche Qwant');
        $mp2->addMotCle($mc4);
        $manager->persist($mp2);

        $mp3 = new Marquepage();
        $mp3->setUrl('https://www.github.com');
        $mp3->setDateCreation(new \DateTime());
        $mp3->setCommentaire('GitHub');
        $mp3->addMotCle($mc5);
        $mp3->addMotCle($mc6);
        $manager->persist($mp3);

        // 22 marque-pages supplémentaires
        $urls = [
            'https://isitchristmas.com', 'https://theuselessweb.com',
            'https://boredbutton.com', 'https://pointerpointer.com',
            'https://staggeringbeauty.com', 'https://everynoise.com',
            'https://mapcrunch.com', 'https://geoguessr.com',
            'https://hackertyper.net', 'https://thispersondoesnotexist.com',
            'https://sporcle.com', 'https://neal.fun',
        ];

        foreach ($urls as $url) {
            $mp = new Marquepage();
            $mp->setUrl($url);
            $mp->setDateCreation(new \DateTime());
            $mp->setCommentaire('Commentaire pour ' . $url);

            $nbMotsCles = mt_rand(2, 5);
            $indexes = array_rand($motsCles, $nbMotsCles);
            foreach ((array)$indexes as $index) {
                $mp->addMotCle($motsCles[$index]);
            }

            $manager->persist($mp);
        }

        // ========== CAILLOUX ==========
        $c1 = new Caillou();
        $c1->setNom('Caillou 1');
        $c1->setDescription('Un caillou rare qui est un peu vert');
        $c1->setPhoto('caillou1.jpg');
        $c1->setCategorie('faune');
        $manager->persist($c1);

        $c2 = new Caillou();
        $c2->setNom('Caillou 2');
        $c2->setDescription('je suis un caillou');
        $c2->setPhoto('caillou2.jpg');
        $c2->setCategorie('faune');
        $manager->persist($c2);

        $c3 = new Caillou();
        $c3->setNom('Caillou 3');
        $c3->setDescription('un caillou très très blanc');
        $c3->setPhoto('caillou3.jpg');
        $c3->setCategorie('flore');
        $manager->persist($c3);

        $c4 = new Caillou();
        $c4->setNom('Caillou 4');
        $c4->setDescription('je suis un caillou joliement décoré');
        $c4->setPhoto('caillou4.jpg');
        $c4->setCategorie('flore');
        $manager->persist($c4);

        $manager->flush();
    }
}