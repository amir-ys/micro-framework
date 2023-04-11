<?php

namespace App\Enums;

enum ArticleEnums: int
{
    case PUBLISHED = 1;
    case DRAFT = 2;
    case ARCHIVED = 3;
}