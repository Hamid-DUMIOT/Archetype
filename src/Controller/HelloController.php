<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HelloController
{
    protected $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }


    /**
     * @Route("/hello/{prenom?World}", name="hello",
     *  methods={"GET","POST"}, host="localhost",
     * schemes={"http", "https"})
     */


    public function Hello(
        Request  $request,
        $prenom,
        LoggerInterface $logger
    ) {

        $logger->info("Mon message de log !");

        //$age = $request->attributes->get('age');

        return new Response("Hello $prenom");
    }
}
