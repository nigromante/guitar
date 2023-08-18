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

        $repositorio = new AuthDatabaseRepository();

        $user = $repositorio->findByEmailOrFail( EmailRequired::init( $email ) ) ;

        $repositorio->userSuccessLogin( $user ) ;
    }

}