<?php
namespace Controller;


use League\Tactician\CommandBus;
use League\Tactician\Handler\CommandHandlerMiddleware;
use League\Tactician\Handler\CommandNameExtractor\ClassNameExtractor;
use League\Tactician\Handler\Locator\InMemoryLocator;
use League\Tactician\Handler\MethodNameInflector\ClassNameInflector;


class CommandHandler 
{
    private static $instance;
    
    private $config = null;


    public static function getInstance(): self
    {
        if (!isset(self::$instance)) {
            self::$instance = new static();
        }
        return self::$instance;
    }



    public function Configure( $config ) {
        if( $this->config == null )
            $this->config = $config ; 
    }

    public function handle( $command ) {

        $locator = new InMemoryLocator();

        $handler =  $this->config[ $command::class ] ; 
        $locator->addHandler(new $handler(),  $command::class );

        $handlerMiddleware = new CommandHandlerMiddleware(
            new ClassNameExtractor(),
            $locator,
            new MyHanfleInflector() 
        );

        $commandBus = new CommandBus([$handlerMiddleware]);
        return $commandBus->handle( $command );
    }


}


class MyHanfleInflector extends ClassNameInflector
{
    public function inflect($command, $commandHandler)
    {
        return 'handle' ;
    }
}

