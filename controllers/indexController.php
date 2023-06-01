<?php
session_start();

// créer une variable, instensie avec une classe existante (créer au préalable dans le model)
$lastArticle = new post;
$lastArticles = $lastArticle->getLastArticle();

$activityArticle = new post;
$activityArticles = $activityArticle->getActivityArticle();

$transportArticle = new post;
$transportArticles = $transportArticle->getTransportArticle();

$securityArticle = new post;
$securityArticles = $securityArticle->getSecurityArticle();

$practicesArticle = new post;
$practicesArticles = $practicesArticle->getPracticesArticle();

$gastronomyArticle = new post;
$gastronomyArticles = $gastronomyArticle->getGastronomyArticle();

$proceduresArticle = new post;
$proceduresArticles = $proceduresArticle->getProceduresArticle();