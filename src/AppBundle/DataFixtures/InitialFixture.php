<?php
namespace AppBundle\DataFixtures;
use Faker;
use AppBundle\Entity\Buyer;
use AppBundle\Entity\Motorcycle;
use AppBundle\Entity\Seller;
use AppBundle\Entity\TypeMotorcycle;
use AppBundle\Entity\User;
use Doctrine\Bundle\FixturesBundle\ORMFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class InitialFixture implements ORMFixtureInterface{
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 23; $i++)
        {
            $jobFaker = Faker\Factory::create();
            
                        
            // User
            //$user = new User();
            //$user->setEmail("mail_$i@cuatrovientos.org");
            //$user->setIsActive(false);
            //$user->setName("User $i");
            //$user->setPassword("1234");
            //$user->setRole("user");
            //$user->setSurname("User $i");
            //$user->setUsername("User $i");
            //$manager->persist($user);
            
            // Buyer
            $buyer = new Buyer();
            $buyer->setUsername($jobFaker->name);
            $buyer->setPassword("1234");
            $buyer->setName("buyer $i");
            $buyer->setSurname($jobFaker->lastName);
            $buyer->setEmail("buyer$i@mail.com");
            $buyer->setIsActive(false);
            $buyer->setRole("user");
            
            $manager->persist($buyer);
            
            // Seller
            $seller = new Seller();
            $seller->setUsername($jobFaker->name);
            $seller->setPassword("1234");
            $seller->setName("seller $i");
            $seller->setSurname($jobFaker->lastName);
            $seller->setEmail("seller$i@mail.com");
            $seller->setIsActive(false);
            $seller->setRole("user");

            $manager->persist($seller);
          
        }
        for ($i = 0; $i < 23; $i++)
        {
            // TypeMotorcycle
            $typemotorcycle = new TypeMotorcycle();
            $typemotorcycle->setType("Type $i");
            $manager->persist($typemotorcycle);
            
            // Motorcycle
            $motorcycle = new Motorcycle();
            $motorcycle->setCc("10$i");
            $motorcycle->setColor("Color $i");
            $motorcycle->setDescription($jobFaker->sentence);
            $motorcycle->setName("Moto $i");
            $motorcycle->setPhoto("");
            $motorcycle->setPrice("1000$i");
            $motorcycle->setTypeMotorcycle($typemotorcycle);
            $manager->persist($motorcycle);
        }

        $manager->flush();
    }
}