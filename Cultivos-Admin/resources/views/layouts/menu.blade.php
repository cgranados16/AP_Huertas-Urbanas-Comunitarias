<li class="nav-main-heading">
    <span class="sidebar-mini-hidden">{{Lang::get('sidebar.catalogs')}}</span>
</li>
<li class="{{ Request::is('trees*') ? 'active' : '' }}">
    <a href="{!! route('trees.index') !!}">
        <i class="fa fa-tree"></i>
        <span>{{Lang::get('sidebar.trees')}}</span>
    </a>
</li>
<li>
    <a class="nav-submenu open" data-toggle="nav-submenu">
        <i class="fa fa-apple"></i>
        <span class="sidebar-mini-hide">{{Lang::get('sidebar.vegetable')}}</span>
    </a>
    <ul>
        <li>
            <a class="{{ Request::is('colorCatalogs*') ? 'active' : '' }}" href="{!! route('catalogs.colorCatalogs.index') !!}">
                <span>{{Lang::get('sidebar.vegetable.color')}}</span>
            </a>
        </li>
        <li>
            <a class="{{ Request::is('vegetableTypeCatalogs*') ? 'active' : '' }}" href="{!! route('catalogs.vegetableTypeCatalogs.index') !!}">
                <span>{{Lang::get('sidebar.vegetable.classification')}}</span>
            </a>
        </li>
        <li>
            <a class="{{ Request::is('vegetablePropertiesCatalogs*') ? 'active' : '' }}" href="{!! route('catalogs.vegetablePropertiesCatalogs.index') !!}">
                <span>{{Lang::get('sidebar.vegetable.properties')}}</span>
            </a>
        </li>
        <li>
            <a class="{{ Request::is('vegetables*') ? 'active' : '' }}" href="{!! route('vegetables.index') !!}">
                <span>{{Lang::get('sidebar.vegetable')}}</span>
            </a>
        </li>
    </ul>
</li>
<li>
    <li class="{{ Request::is('fertilizerCatalogs*') ? 'active' : '' }}">
        <a href="{!! route('catalogs.fertilizerCatalogs.index') !!}">
            <i class="fa fa-envira"></i>
            <span>{{Lang::get('sidebar.fertilizer')}}</span>
        </a>
    </li>
</li>
<li class="nav-main-heading">
    <span class="sidebar-mini-hidden">{{Lang::get('sidebar.system')}}</span>
</li>

<li>
    <li class="{{ Request::is('fertilizerCatalogs*') ? 'active' : '' }}">
        <a href="{!! route('admin.index') !!}">
            <i class="fa fa-user"></i>
            <span>{{Lang::get('sidebar.admins')}}</span>
        </a>
    </li>
</li>

