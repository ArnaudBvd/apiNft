<?php

namespace App\DataFixtures;

use App\Entity\Nft;
use App\Entity\NftCollection;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;
use Doctrine\Common\Collections\Collection;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Générer 50 utilisateurs
        for ($i = 1; $i <= 50; $i++) {
            $user = new User();
            $user->setName("User" . $i);
            $manager->persist($user);
        }

        // Générer 1 collection
            $collection = new NftCollection();
            $collection->setName("Mask");
            $collection->setImage("uploads/img(1).jpeg ");
            $collection->setDescription(" Collection de Mask");
            $collection->setOwner($user);
            $manager->persist($collection);

        // Générer 15 NFTs
        for($i = 1; $i <= 15; $i++) {
            $nft = new Nft();
            $nft->setNftCollection($collection);
            $nft->setOwner($user);
            $nft->setName("Mask" . $i);
            $nft->setImage("uploads/img (".$i.")");
            $nft->setPrice(random_int(1200,12700)/100);
            $nft->setOnsale(random_int(0,1) === 1);
            $manager->persist($nft);
        }

            $manager->flush();
    }
}
