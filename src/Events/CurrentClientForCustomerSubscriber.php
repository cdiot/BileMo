<?php

declare(strict_types=1);

namespace App\Events;

use ApiPlatform\Core\EventListener\EventPriorities;
use App\Entity\User;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Security\Core\Security;

class CurrentClientForCustomerSubscriber implements EventSubscriberInterface
{
    private Security $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    public static function getSubscribedEvents()
    {
        // return the subscribed events, their methods and priorities
        return [
            KernelEvents::VIEW => ['currentClientForCustomer', EventPriorities::PRE_VALIDATE],
        ];
    }

    public function currentClientForCustomer(ViewEvent $event): void
    {
        $user = $event->getControllerResult();
        $method = $event->getRequest()->getMethod();

        if ($user instanceof User && Request::METHOD_POST === $method) {
            $user->setClient($this->security->getUser());
        }
    }
}
