{{-- This file is used for menu items by any Backpack v6 theme --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i
            class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<x-backpack::menu-item title="Users" icon="la la-question" :link="backpack_url('user')" />
<x-backpack::menu-item title="Student codes" icon="la la-question" :link="backpack_url('student-codes')" />
<x-backpack::menu-item title="Orders" icon="la la-question" :link="backpack_url('orders')" />
<x-backpack::menu-item title="Menu items" icon="la la-question" :link="backpack_url('menu-items')" />
<x-backpack::menu-item title="Categories" icon="la la-question" :link="backpack_url('categories')" />
