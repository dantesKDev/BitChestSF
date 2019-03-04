<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}

// namespace App\DataFixtures;
// require_once '/path/to/Faker/src/autoload.php';


// use Doctrine\Bundle\FixturesBundle\Fixture;
// use Doctrine\Common\Persistence\ObjectManager;
// // use App\Repository\CotationsRepository;
// use Faker;
// use App\Entity\Users;
// use App\Entity\Cotations;
// use App\Entity\Cryptos;
// use App\Entity\Transactions;
// use App\Entity\Wallets;
//
// class AppFixtures extends Fixture
// {
//
//
//     public function load(ObjectManager $manager)
//     {
//       function getFirstCotation($cryptoname){
//         return ord(substr($cryptoname,0,1)) + rand(0, 10);
//       }
//
//     function getCotationFor($cryptoname){
//       return ((rand(0, 99)>40) ? 1 : -1) * ((rand(0, 99)>49) ? ord(substr($cryptoname,0,1)) : ord(substr($cryptoname,-1))) * (rand(1,10) * .01);
//     }
//
//       $faker = Faker\Factory::create('fr_FR');
//
//       for ($i=0; $i < 3; $i++) {
//         // code...
//         $users = new Users();
//         $users->setUsername('totmax75');
//         $users->setPassword(password_hash($faker->password, PASSWORD_DEFAULT));
//         $users->setRole('Client');
//         $users->setEmail('tit@gmail.com');
//         $users->setPrenom('Titi');
//         $users->setNom('TOTO');
//         $users->setVille('TotoCity');
//         $users->setAdresse('Toto Land');
//         $users->setCp(75600);
//         $users->setTelephone(678524598);
//         $users->setSolde(mt_rand(10000, 100000));
//         $manager->persist($users);
//         // $users->setUsername($faker->userName);
//         // $users->setPassword(password_hash($faker->password, PASSWORD_DEFAULT));
//         // $users->setRole('Client');
//         // $users->setEmail($faker->email);
//         // $users->setPrenom($faker->firstName);
//         // $users->setNom($faker->lastName);
//         // $users->setVille($faker->city);
//         // $users->setAdresse($faker->address);
//         // $users->setCp($faker->postcode);
//         // $users->setTelephone($faker->phoneNumber);
//         // $users->setSolde(randomFloat($nbMaxDecimals = NULL, $min = 10000, $max = NULL));
//         // $manager->persist($users);
//       }
//         // $product = new Product();
//         // $manager->persist($product);
//         $cryptosTabName = array('Bitcoin','Ethereum','Riple','Litecoin','Tron','Monero');
//         $cryptosTabSigle = array('BTC','ETH','XRP','LCN','TRO','MON');
//
//         for ($i=0; $i < 6; $i++) {
//           // code...
//           $cryptos = new Cryptos();
//           // $cryptos->setWallets($i);
//           $cryptos->setNom($cryptosTabName[$i]);
//           $cryptos->setImage('http://www.placehold.it/150x150');
//           $cryptos->setSigle($cryptosTabSigle[$i]);
//           $manager->persist($cryptos);
//         }
//
//
//       for ($i=0; $i < 3; $i++) {
//         // code...
//         $users = new Users();
//
//         $wallets = new Wallets();
//         $wallets->setIdUsers($users);
//         $wallets->setMontants(mt_rand(100, 1000));
//         $wallets->setMontantEuro($users);
//         $manager->persist($wallets);
//       }


      // $valeur_nominale = getFirstCotation($cryptosTabName[0]);
      // // $date = date('Y-m-d', time()+ (6*86400));
      // $valeur[] = $valeur_nominale;
      //
      // for ($i=1; $i < 30; $i++) {
      //   // code...
      //   $cotations = new Cotations();
      //   $cotations->setEvolution(getCotationFor($cryptosTabName[0]));
      //   $evolution = getCotationFor($cryptosTabName[0]);
      //   $valeur[$i] = $valeur[$i -1 ] + $evolution;
      //   $cotations->setIdCryptos(1);
      //   $cotations->setDate(date('Y-m-d', time() + (6*86400) + ($i * 86400)));
      //   $cotations->setValeur($valeur[$i]);
      //   $indice = $i - 1;
      //   $cotations->setCours($evolution / $valeur[$indice] * 100);
      //   $manager->persist($cryptos);
      //
      // }

//       $manager->flush();
//     }
// }
