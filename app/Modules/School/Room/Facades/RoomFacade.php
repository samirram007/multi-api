<?php
        namespace Modules\School\Room\Facades;
        use Illuminate\Support\Facades\Facade;
        use Modules\School\Room\Contracts\RoomServiceInterface;
        class RoomFacade extends Facade
        {
            protected static function getFacadeAccessor()
            {
                return RoomServiceInterface::class;
            }
        }

        