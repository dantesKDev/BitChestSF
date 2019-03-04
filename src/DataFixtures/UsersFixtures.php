<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class UsersFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}

// namespace App\DataFixtures;
// // require_once '/path/to/Faker/src/autoload.php';
//
//
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
//       $manager->flush();
//     }
// }
