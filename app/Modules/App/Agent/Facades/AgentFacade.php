<?php
        namespace Modules\App\Agent\Facades;
        use Illuminate\Support\Facades\Facade;
        use Modules\App\Agent\Contracts\AgentServiceInterface;
        class AgentFacade extends Facade
        {
            protected static function getFacadeAccessor()
            {
                return AgentServiceInterface::class;
            }
        }

        