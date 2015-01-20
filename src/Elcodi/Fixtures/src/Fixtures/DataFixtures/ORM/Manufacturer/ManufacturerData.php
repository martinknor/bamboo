<?php

/*
 * This file is part of the Elcodi package.
 *
 * Copyright (c) 2014 Elcodi.com
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * Feel free to edit as you please, and have fun.
 *
 * @author Marc Morera <yuhu@mmoreram.com>
 * @author Aldo Chiecchia <zimage@tiscali.it>
 */

namespace Elcodi\Fixtures\DataFixtures\ORM\Category;

use Doctrine\Common\Persistence\ObjectManager;

use Elcodi\Bundle\CoreBundle\DataFixtures\ORM\Abstracts\AbstractFixture;
use Elcodi\Component\Product\Entity\Interfaces\ManufacturerInterface;
use Elcodi\Component\Product\Factory\ManufacturerFactory;

/**
 * Class ManufacturerData
 */
class ManufacturerData extends AbstractFixture
{
    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        /**
         * @var ManufacturerFactory $manufacturerFactory
         * @var ObjectManager       $manufacturerObjectManager
         */
        $manufacturerFactory = $this->get('elcodi.factory.manufacturer');
        $manufacturerObjectManager = $this->get('elcodi.object_manager.manufacturer');

        /**
         * Levis manufacturer
         *
         * @var ManufacturerInterface $levisManufacturer
         */
        $levisManufacturer = $manufacturerFactory
            ->create()
            ->setName('levis')
            ->setDescription('Levis manufacturer')
            ->setSlug('levis')
            ->setEnabled(true);

        $manufacturerObjectManager->persist($levisManufacturer);
        $this->addReference(
            'manufacturer-levis',
            $levisManufacturer
        );

        $manufacturerObjectManager->flush($levisManufacturer);
    }
}