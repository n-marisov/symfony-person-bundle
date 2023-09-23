<?php

namespace Maris\Symfony\Person\Model;

use Maris\interfaces\Person\Model\GenderInterface;

enum Gender implements GenderInterface
{
    case MAN;
    case GIRL;
    case UNKNOWN;
}