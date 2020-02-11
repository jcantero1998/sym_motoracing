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
        // Creating 20 job offers
        for ($i = 0; $i < 20; $i++)
        {
            $jobFaker = Faker\Factory::create();
            
            // Buyer
            $buyer = new Buyer();
            $manager->persist($buyer);
            
            // Motorcycle
            $motorcycle = new Motorcycle();
            $motorcycle->setCc("10$i");
            $motorcycle->setColor("Color $i");
            $motorcycle->setDescription($jobFaker->sentence);
            $motorcycle->setName("Moto $i");
            $motorcycle->setPhoto("");
            $motorcycle->setPrice("1000$i");
            $manager->persist($motorcycle);
            
            // Seller
            $seller = new Seller();
            $manager->persist($seller);
            
            // TypeMotorcycle
            $typemotorcycle = new TypeMotorcycle();
            $typemotorcycle->setType("Type $i");
            $manager->persist($typemotorcycle);
            
            // User
            $user = new User();
            $user->setEmail("artean_$i@cuatrovientos.org");
            $user->setIsActive(false);
            $user->setName("User $i");
            $user->setPassword("4Vientos");
            $user->setRole("role");
            $user->setSurname("User $i");
            $user->setUsername("User $i");
            $manager->persist($user);
        }
        $manager->flush();
    }
}