<?php

use Doctrine\Common\Annotations\AnnotationRegistry;

$loader = @include __DIR__ . '/../vendor/autoload.php';
AnnotationRegistry::registerLoader('class_exists');
