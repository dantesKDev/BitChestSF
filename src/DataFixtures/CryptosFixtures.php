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

class CryptosFixtures extends Fixture
{
  public function load(ObjectManager $manager)
  {
    for ($i=0; $i < 6; $i++) {
        // code...
        $cryptosTabName = array('Bitcoin','Ethereum','Riple','Litecoin','Tron','Monero');
        $cryptosTabSigle = array('BTC','ETH','XRP','LCN','TRO','MON');
        $cryptos = new Cryptos();
        // $cryptos->setWallets($i);
        $cryptos->setNom($cryptosTabName[$i]);
        $cryptos->setImage('http://www.placehold.it/150x150');
        $cryptos->setSigle($cryptosTabSigle[$i]);
        $manager->persist($cryptos);
      }
      $manager->flush();
    }
}
