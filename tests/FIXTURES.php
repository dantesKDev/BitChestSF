
<?php


public function load(ObjectManager $manager)
    {
        $users = new Users();
        $users
            -> setUsername('yakine')
            -> setPassword('123456')
            -> setRole('ROLE_ADMIN')
            -> setEmail('yakine.hamida@gmail.com')
            -> setNom('HAMIDA')
            -> setSalt('AAAAAAAA')
            -> setPrenom('Yakine')
            -> setVille('Montreuil')
            -> setAdresse('8 rue du progrès')
            -> setCp(93100)
            -> setTelephone('0689915269')
            -> setSolde(0.00);

        $manager -> persist($users);

        for($i = 0; $i < 10; $i++){
            $users = new Users();
            $users
                -> setUsername('Test' . $i)
                -> setPassword('123456')
                -> setRole('ROLE_USER')
                -> setEmail('test.test' . $i . '@gmail.com')
                -> setNom('TEST' . $i)
                -> setSalt('AAAAAAAA')
                -> setPrenom('test' . $i)
                -> setVille('Paris')
                -> setAdresse('8 rue du progrès')
                -> setCp(75001)
                -> setTelephone('0102030405')
                -> setSolde(0.00);

            $manager -> persist($users);
        }



        $cryptos = array(
            0 => array('nom' => 'BitCoin', 'image' => 'bitcoin.png', 'sigle' => 'BTC'),
            1 => array('nom' => 'Ethereum', 'image' => 'ethereum.png', 'sigle' =>'ETH'),
            2 => array('nom' => 'Ripple', 'image' => 'ripple.png', 'sigle' =>'XRP'),
            3 => array('nom' => 'Bitcoin Cash', 'image' => 'bitcoin-cash.png','sigle' => 'BT'),
            4 => array('nom' => 'Cardano', 'image' => 'cardano.png', 'sigle' =>'ADA'),
            5 => array('nom' => 'litecoin', 'image' => 'litecoin.png','sigle' => 'LTC'),
            6 => array('nom' => 'NEM', 'image' => 'nem.png', 'sigle' => 'NEM'),
            7 => array('nom' => 'Stellar', 'image' => 'stellar.png', 'sigle' =>'XLM'),
            8 => array('nom' => 'IOTA', 'image' => 'iota.png', 'sigle' =>'IOT'),
            9 => array('nom' => 'Dash', 'image' => 'dash.png', 'sigle' =>'DAS')
        );

        $currencies = [];
        foreach ($cryptos as $sample) {
          $currency = new Cryptos();
          $currency->setNom($sample['nom']);
          $currency->setSigle($sample['sigle']);
          $currency->setImage($sample['image']);
          $currencies[] = $currency;
          $manager->persist($currency);
        }
        $manager->flush();

        // Rates
        $rates = [];
        foreach ($currencies as $currency) {
          $priceReference = $this -> getFirstCotation($currency->getNom());
          for ($i = 1; $i <= 30; $i++) {

            $evolution  = $this -> getCotationFor($currency->getNom());
            $price = $priceReference + $this -> getCotationFor($currency->getNom());
            $variation = round((($price - $priceReference) / $priceReference) * 100, 2);
            if ($i === 1) {
              $date = new \DateTime('now');
            } else {
              $date->add(new \DateInterval('P1D'));
            }
            $rate = new Cotations();
            $rate
            -> setIdCryptos($currency)
            -> setValeur($price)
            -> setDate($date)
            -> setCours($variation)
            -> setEvolution($evolution);


            $manager->persist($rate);
            $manager->flush();
          }
        }


    }

    function getFirstCotation($cryptoname){
            return ord(substr($cryptoname,0,1)) + rand(0, 10);
    }

    function getCotationFor($cryptoname){
    	return ((rand(0, 99)>40) ? 1 : -1) * ((rand(0, 99)>49) ? ord(substr($cryptoname,0,1)) : ord(substr($cryptoname,-1))) * (rand(1,10) * .01);
    }