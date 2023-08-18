<?php 
namespace Workers\Consumers;

use Workers\RabbitMQ\RabbitMQConsumer;
use Workers\RabbitMQ\RabbitMQConsumerInterface;

use App\Auth\Domain\ValueObjects\EmailRequired;
use App\Auth\Infrastructure\Repositories\AuthDatabaseRepository;

final class  HelloConsumer extends RabbitMQConsumer implements RabbitMQConsumerInterface {

    public $queue_name = 'hello' ;

    public function handle( $msg ) {

        parent::handle( $msg ) ;

        $email = $msg->body ; 

        try {
            $email_param = EmailRequired::init( $email ) ; 

            $repositorio = new AuthDatabaseRepository();

            $user = $repositorio->findByEmailOrFail( $email_param ) ;
    
            $repositorio->userSuccessLogin( $user ) ;

            echo " 😄 " ;
    
        }catch(\Exception $e ) {

            echo "\n" , $e->getMessage() ; 

        }


    }

}