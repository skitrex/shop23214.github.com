<?php

namespace Tests\Feature\Admin\Items;

use Tests\Feature\Future;

class ListTest extends Future
{
    public function testVisitAdmin()
    {
        $this->visitAdmin('admin.items.list', ['server' => 1], 200);
    }

    public function testVisitUser()
    {
        $this->visitUser('admin.items.list', ['server' => 1], 403);
    }

    public function testVisitGuest()
    {
        $this->visitGuest('admin.items.list', ['server' => 1], 403);
    }
}
