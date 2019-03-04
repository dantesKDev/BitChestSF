<?php

namespace App\DataFixtures;
// require_once '/path/to/Faker/src/autoload.php';


use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
// use App\Repository\CotationsRepository;
use Faker;
use App\Entity\Users;
use App\Entity\Cotations;
use App\Entity\Cryptos;
use App\Entity\Transactions;
use App\Entity\Wallets;

class WalletsFixtures extends Fixture
{
  public function load(ObjectManager $manager)
  {
    for ($i=0; $i < 3; $i++) {
           // code...
           $users = new Users();

           $wallets = new Wallets();
           $wallets->setIdUsers($users);
           $wallets->setMontants(mt_rand(100, 1000));
           $wallets->setMontantEuro($users);
           $manager->persist($wallets);
         }
      $manager->flush();
    }
}
