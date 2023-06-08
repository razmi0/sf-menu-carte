<?php

namespace App\DataFixtures;

use App\Entity\Menu;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class MenuFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $name1 = 'Menu Midi Entrée/Plat';
        $name2 = 'Menu Midi Plat/Dessert';
        $name3 = 'Menu Enfant Entrée/Plat/Dessert';

        // $name1 = 'Menu Midi Entrée/Plat';
        $menu = new Menu();
        $menu->setName($name1);
        $menu->addCategory($this->getReference(CategoryFixtures::CATEGORY_REFERENCE_1));
        $menu->addCategory($this->getReference(CategoryFixtures::CATEGORY_REFERENCE_2));
        $manager->persist($menu);

        // $name2 = 'Menu Midi Plat/Dessert';
        $menu = new Menu();
        $menu->setName($name2);
        $menu->addCategory($this->getReference(CategoryFixtures::CATEGORY_REFERENCE_2));
        $menu->addCategory($this->getReference(CategoryFixtures::CATEGORY_REFERENCE_3));
        $manager->persist($menu);

        // $name3 = 'Menu Enfant Entrée/Plat/Dessert';
        $menu = new Menu();
        $menu->setName($name3);
        $menu->addCategory($this->getReference(CategoryFixtures::CATEGORY_REFERENCE_1));
        $menu->addCategory($this->getReference(CategoryFixtures::CATEGORY_REFERENCE_2));
        $menu->addCategory($this->getReference(CategoryFixtures::CATEGORY_REFERENCE_3));
        $manager->persist($menu);

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            CategoryFixtures::class,
        ];
    }
}
